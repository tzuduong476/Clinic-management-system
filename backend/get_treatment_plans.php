<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once __DIR__ . '/db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$user_id = (int)($_SESSION['user_id'] ?? 0);
$currentUser = getCurrentUser();

if (!$currentUser || $user_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid session']);
    exit;
}

try {
    // Use session user_id directly as Customer_ID
    // This is the most reliable way since user_id = Customer_ID for customers
    $customerId = $user_id;
    
    // Verify this customer exists
    $stmt = $conn->prepare("SELECT Customer_ID, Name FROM `Customer` WHERE Customer_ID = ? LIMIT 1");
    $stmt->execute([$customerId]);
    $customer = $stmt->fetch();
    
    if (!$customer) {
        echo json_encode(['success' => true, 'plans' => [], 'debug' => 'Customer not found']);
        exit;
    }
    
    // Get treatment plans for this customer
    $stmt = $conn->prepare("
        SELECT tp.id, tp.title, tp.overall_goal, tp.start_date, tp.status, tp.created_at,
               s.name as specialist_name
        FROM treatment_plans tp
        LEFT JOIN specialists s ON tp.specialist_id = s.id
        WHERE tp.customer_id = ?
        ORDER BY tp.created_at DESC
    ");
    $stmt->execute([$customerId]);
    $plans = $stmt->fetchAll();
    
    // Get sessions for each plan
    foreach ($plans as &$plan) {
        $stmt = $conn->prepare("
            SELECT tps.id, tps.session_number, tps.service_name, tps.focus_notes, tps.completed_at,
                   tps.before_image_path, tps.after_image_path,
                   tss.scheduled_date, tss.scheduled_time, tss.status as schedule_status
            FROM treatment_plan_sessions tps
            LEFT JOIN treatment_session_schedules tss ON tps.id = tss.plan_session_id
            WHERE tps.plan_id = ?
            ORDER BY tps.session_number
        ");
        $stmt->execute([$plan['id']]);
        $plan['sessions'] = $stmt->fetchAll();
    }
    
    echo json_encode([
        'success' => true,
        'plans' => $plans
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch treatment plans: ' . $e->getMessage()
    ]);
}
