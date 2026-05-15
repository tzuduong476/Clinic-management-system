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
$newDate = trim($data['scheduled_date'] ?? '');
$newTime = trim($data['scheduled_time'] ?? '');

// Validate date format
if ($newDate && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $newDate)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid date format. Use YYYY-MM-DD']);
    exit;
}

// Validate time format
if ($newTime && !preg_match('/^\d{2}:\d{2}$/', $newTime)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid time format. Use HH:MM']);
    exit;
}

// Find schedule
try {
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

    // If same date/time, do nothing
    if ($newDate === $schedule['scheduled_date'] && $newTime === $schedule['scheduled_time']) {
        echo json_encode(['success' => true, 'message' => 'No changes needed']);
        exit;
    }

    $conn->beginTransaction();

    // Update schedule
    $updateFields = [];
    $updateValues = [];
    
    if ($newDate) {
        $updateFields[] = 'scheduled_date = ?';
        $updateValues[] = $newDate;
    }
    if ($newTime) {
        $updateFields[] = 'scheduled_time = ?';
        $updateValues[] = $newTime;
    }
    
    $updateFields[] = 'status = ?';
    $updateValues[] = 'rescheduled';
    
    $updateValues[] = $schedule['id'];
    
    $stmt = $conn->prepare("UPDATE treatment_session_schedules SET " . implode(', ', $updateFields) . " WHERE id = ?");
    $stmt->execute($updateValues);

    // Create new schedule entry
    $stmt = $conn->prepare("
        INSERT INTO treatment_session_schedules (plan_session_id, scheduled_date, scheduled_time, specialist_id, status, notes)
        VALUES (?, ?, ?, ?, 'scheduled', ?)
    ");
    $stmt->execute([
        $schedule['plan_session_id'],
        $newDate ?: $schedule['scheduled_date'],
        $newTime ?: $schedule['scheduled_time'],
        $schedule['specialist_id'],
        $schedule['notes']
    ]);
    
    $newScheduleId = $conn->lastInsertId();

    // Update related appointment if exists
    if ($schedule['appointment_id']) {
        $stmt = $conn->prepare("
            UPDATE appointments 
            SET appointment_date = ?, appointment_time = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $newDate ?: $schedule['scheduled_date'],
            $newTime ?: $schedule['scheduled_time'],
            $schedule['appointment_id']
        ]);

        // Create notification about reschedule
        $stmt = $conn->prepare("
            INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_id, related_type)
            VALUES (?, NULL, 'session', ?, ?, 'high', ?, 'appointment')
        ");
        
        $title = "Lịch hẹn đã được đổi";
        $message = "Lịch hẹn của bạn đã được đổi sang ngày " . 
                  date('d/m/Y', strtotime($newDate ?: $schedule['scheduled_date'])) . 
                  " lúc " . date('H:i', strtotime($newTime ?: $schedule['scheduled_time']));
        
        $stmt->execute([$schedule['specialist_id'], $title, $message, $schedule['appointment_id']]);
    }

    $conn->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Session rescheduled successfully',
        'data' => [
            'old_schedule_id' => $schedule['id'],
            'new_schedule_id' => $newScheduleId,
            'scheduled_date' => $newDate ?: $schedule['scheduled_date'],
            'scheduled_time' => $newTime ?: $schedule['scheduled_time']
        ]
    ]);

} catch (Exception $e) {
    $conn->rollBack();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
