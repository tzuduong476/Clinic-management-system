<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

$user = getCurrentUser();
if (!$user) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

// Get notifications
if ($method === 'GET') {
    $userId = $user['id'];
    $role = $user['role'];
    $limit = (int)($_GET['limit'] ?? 20);
    $unreadOnly = ($_GET['unread'] ?? 'false') === 'true';
    
    try {
        $where = [];
        $params = [];
        
        // Filter by user role
        if ($role === 'doctor') {
            $where[] = "(user_id = ? OR user_id IS NULL)";
            $params[] = $userId;
        } elseif ($role === 'patient') {
            $where[] = "user_id = ?";
            $params[] = $userId;
        } elseif ($role === 'receptionist') {
            $where[] = "(user_id = ? OR user_id IS NULL OR type IN ('appointment', 'payment'))";
            $params[] = $userId;
        } else {
            $where[] = "1=1";
        }
        
        // Unread filter
        if ($unreadOnly) {
            $where[] = "is_read = FALSE";
        }
        
        $whereClause = $where ? 'WHERE ' . implode(' AND ', $where) : '';
        
        $stmt = $conn->prepare("
            SELECT * FROM notifications
            $whereClause
            ORDER BY created_at DESC
            LIMIT ?
        ");
        $params[] = $limit;
        $stmt->execute($params);
        $notifications = $stmt->fetchAll();
        
        // Count unread
        $unreadCount = 0;
        $countParams = array_slice($params, 0, -1); // Remove limit
        $countWhere = array_slice($where, 0, -1); // Remove unread filter if exists
        $countWhere[] = "is_read = FALSE";
        $countWhereClause = $countWhere ? 'WHERE ' . implode(' AND ', $countWhere) : 'WHERE 1=1';
        
        $countStmt = $conn->prepare("SELECT COUNT(*) FROM notifications $countWhereClause");
        $countStmt->execute($countParams);
        $unreadCount = (int)$countStmt->fetchColumn();
        
        echo json_encode([
            'success' => true,
            'data' => $notifications,
            'unread_count' => $unreadCount
        ]);
        
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
    exit;
}

// Mark notification as read
if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $action = $data['action'] ?? '';
    
    if ($action === 'mark_read') {
        $notificationId = (int)($data['id'] ?? 0);
        
        if ($notificationId > 0) {
            try {
                $stmt = $conn->prepare("UPDATE notifications SET is_read = TRUE WHERE id = ?");
                $stmt->execute([$notificationId]);
                echo json_encode(['success' => true, 'message' => 'Marked as read']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            }
        } else {
            // Mark all as read
            try {
                $stmt = $conn->prepare("UPDATE notifications SET is_read = TRUE WHERE user_id = ?");
                $stmt->execute([$user['id']]);
                echo json_encode(['success' => true, 'message' => 'All marked as read']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            }
        }
        exit;
    }
    
    // Create notification
    $title = trim($data['title'] ?? '');
    $message = trim($data['message'] ?? '');
    $type = $data['type'] ?? 'system';
    $priority = $data['priority'] ?? 'medium';
    $customerId = $data['customer_id'] ?? null;
    
    if (empty($title) || empty($message)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Title and message are required']);
        exit;
    }
    
    try {
        $stmt = $conn->prepare("
            INSERT INTO notifications (user_id, customer_id, type, title, message, priority)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $user['id'],
            $customerId,
            $type,
            $title,
            $message,
            $priority
        ]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Notification created',
            'id' => $conn->lastInsertId()
        ]);
        
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    exit;
}

http_response_code(405);
echo json_encode(['success' => false, 'message' => 'Method not allowed']);
