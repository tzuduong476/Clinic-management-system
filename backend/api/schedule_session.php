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

if (empty($data['plan_session_id']) || empty($data['scheduled_date']) || empty($data['scheduled_time']) || empty($data['specialist_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

$planSessionId = (int)$data['plan_session_id'];
$scheduledDate = trim($data['scheduled_date']);
$scheduledTime = trim($data['scheduled_time']);
$specialistId = (int)$data['specialist_id'];
$notes = trim($data['notes'] ?? '');

// Validate date format
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $scheduledDate)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid date format. Use YYYY-MM-DD']);
    exit;
}

// Validate time format
if (!preg_match('/^\d{2}:\d{2}$/', $scheduledTime)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid time format. Use HH:MM']);
    exit;
}

// Check if session exists and belongs to a valid plan
$stmt = $conn->prepare("
    SELECT tps.*, tp.customer_id, tp.title as plan_title, 
           s.name as specialist_name
    FROM treatment_plan_sessions tps
    JOIN treatment_plans tp ON tps.plan_id = tp.id
    JOIN specialists s ON s.id = ?
    WHERE tps.id = ?
");
$stmt->execute([$specialistId, $planSessionId]);
$session = $stmt->fetch();

if (!$session) {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Session not found']);
    exit;
}

// Check if plan is still active
if ($session['status'] !== 'active') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Plan is not active']);
    exit;
}

// Check if session is already scheduled
$stmt = $conn->prepare("SELECT id FROM treatment_session_schedules WHERE plan_session_id = ? AND status = 'scheduled'");
$stmt->execute([$planSessionId]);
if ($stmt->fetch()) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Session is already scheduled']);
    exit;
}

// Check if there's already a completed or cancelled schedule
$stmt = $conn->prepare("SELECT id FROM treatment_session_schedules WHERE plan_session_id = ?");
$stmt->execute([$planSessionId]);
$existingSchedule = $stmt->fetch();

$scheduleId = null;
$appointmentId = null;

try {
    $conn->beginTransaction();

    // Create or update schedule
    if ($existingSchedule) {
        $stmt = $conn->prepare("
            UPDATE treatment_session_schedules 
            SET scheduled_date = ?, scheduled_time = ?, specialist_id = ?, status = 'scheduled', notes = ?
            WHERE plan_session_id = ?
        ");
        $stmt->execute([$scheduledDate, $scheduledTime, $specialistId, $notes, $planSessionId]);
        $scheduleId = $existingSchedule['id'];
    } else {
        $stmt = $conn->prepare("
            INSERT INTO treatment_session_schedules (plan_session_id, scheduled_date, scheduled_time, specialist_id, notes)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$planSessionId, $scheduledDate, $scheduledTime, $specialistId, $notes]);
        $scheduleId = $conn->lastInsertId();
    }

    // Get customer info
    $stmt = $conn->prepare("SELECT * FROM Customer WHERE Customer_ID = ?");
    $stmt->execute([$session['customer_id']]);
    $customer = $stmt->fetch();

    // Get service info for the session
    $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->execute([$session['service_id']]);
    $service = $stmt->fetch();

    // Create appointment
    $bookingCode = 'ELY-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    
    $stmt = $conn->prepare("
        INSERT INTO appointments (
            booking_code, customer_name, customer_phone, service_id, service_name,
            specialist_id, specialist_name, appointment_date, appointment_time,
            total_price, status, payment_status, appointment_type, plan_session_id
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'confirmed', 'unpaid', 'treatment', ?)
    ");
    
    $customerName = $customer ? $customer['Name'] : 'Unknown';
    $customerPhone = $customer ? $customer['Phone'] : '';
    $serviceName = $service ? $service['name'] : $session['service_name'];
    $servicePrice = $service ? $service['price'] : '0';
    
    $stmt->execute([
        $bookingCode,
        $customerName,
        $customerPhone,
        $session['service_id'],
        $serviceName,
        $specialistId,
        $session['specialist_name'],
        $scheduledDate,
        $scheduledTime,
        $servicePrice,
        $planSessionId
    ]);
    
    $appointmentId = $conn->lastInsertId();

    // Update schedule with appointment ID
    $stmt = $conn->prepare("UPDATE treatment_session_schedules SET appointment_id = ? WHERE id = ?");
    $stmt->execute([$appointmentId, $scheduleId]);

    // Create notification for the specialist
    $stmt = $conn->prepare("
        INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_id, related_type)
        VALUES (?, ?, 'session', ?, ?, 'medium', ?, 'appointment')
    ");
    
    $title = "Lịch hẹn buổi {$session['session_number']} - {$session['plan_title']}";
    $message = "Buổi điều trị #{$session['session_number']} của khách hàng {$customerName} đã được lên lịch vào ngày " . 
                date('d/m/Y', strtotime($scheduledDate)) . " lúc " . date('H:i', strtotime($scheduledTime));
    
    $stmt->execute([$specialistId, $session['customer_id'], $title, $message, $appointmentId]);

    // Create notification for customer if they have a user account
    if ($customer) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR phone = ? LIMIT 1");
        $stmt->execute([$customer['Email'], $customer['Phone']]);
        $customerUser = $stmt->fetch();
        
        if ($customerUser) {
            $stmt = $conn->prepare("
                INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_id, related_type)
                VALUES (?, ?, 'session', ?, ?, 'medium', ?, 'appointment')
            ");
            $customerTitle = "Nhắc lịch hẹn buổi {$session['session_number']}";
            $customerMessage = "Bạn có lịch hẹn buổi điều trị #{$session['session_number']} ({$serviceName}) vào ngày " . 
                             date('d/m/Y', strtotime($scheduledDate)) . " lúc " . date('H:i', strtotime($scheduledTime)) . 
                             ". Vui lòng đến đúng giờ.";
            $stmt->execute([$customerUser['id'], $session['customer_id'], $customerTitle, $customerMessage, $appointmentId]);
        }
    }

    $conn->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Session scheduled successfully',
        'data' => [
            'schedule_id' => $scheduleId,
            'appointment_id' => $appointmentId,
            'booking_code' => $bookingCode,
            'scheduled_date' => $scheduledDate,
            'scheduled_time' => $scheduledTime,
            'specialist_name' => $session['specialist_name']
        ]
    ]);

} catch (Exception $e) {
    $conn->rollBack();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
