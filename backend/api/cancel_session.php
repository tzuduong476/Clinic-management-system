<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

// Only allow doctors and admins
$user = getCurrentUser();
if (!$user || !in_array($user['role'], ['doctor', 'admin'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (empty($data['schedule_id']) && empty($data['plan_session_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing schedule_id or plan_session_id']);
    exit;
}

$scheduleId = $data['schedule_id'] ?? null;
$planSessionId = $data['plan_session_id'] ?? null;
$reason = trim($data['reason'] ?? 'Không có lý do');

try {
    // Find schedule
    if ($scheduleId) {
        $stmt = $conn->prepare("SELECT * FROM treatment_session_schedules WHERE id = ?");
        $stmt->execute([$scheduleId]);
    } else {
        $stmt = $conn->prepare("SELECT * FROM treatment_session_schedules WHERE plan_session_id = ? AND status = 'scheduled'");
        $stmt->execute([$planSessionId]);
    }
    $schedule = $stmt->fetch();
    
    if (!$schedule) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Schedule not found']);
        exit;
    }

    if ($schedule['status'] === 'cancelled') {
        echo json_encode(['success' => true, 'message' => 'Schedule already cancelled']);
        exit;
    }

    $conn->beginTransaction();

    // Update schedule status
    $stmt = $conn->prepare("
        UPDATE treatment_session_schedules 
        SET status = 'cancelled', notes = CONCAT(IFNULL(notes, ''), '\nHủy: ', ?)
        WHERE id = ?
    ");
    $stmt->execute([$reason, $schedule['id']]);

    // Cancel related appointment if exists
    if ($schedule['appointment_id']) {
        $stmt = $conn->prepare("
            UPDATE appointments 
            SET status = 'cancelled'
            WHERE id = ?
        ");
        $stmt->execute([$schedule['appointment_id']]);

        // Create notification
        $stmt = $conn->prepare("
            INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_id, related_type)
            VALUES (?, NULL, 'session', ?, ?, 'medium', ?, 'appointment')
        ");
        
        $title = "Lịch hẹn đã bị hủy";
        $message = "Lịch hẹn buổi điều trị đã bị hủy. Lý do: " . $reason;
        
        $stmt->execute([$schedule['specialist_id'], $title, $message, $schedule['appointment_id']]);
    }

    $conn->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Session cancelled successfully'
    ]);

} catch (Exception $e) {
    $conn->rollBack();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
