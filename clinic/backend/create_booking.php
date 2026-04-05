<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

require_once __DIR__ . '/db.php';

$input = json_decode(file_get_contents('php://input'), true) ?? [];
$name = trim($input['customer_name'] ?? '');
$phone = trim($input['customer_phone'] ?? '');
$service_id = trim($input['service_id'] ?? '');
$service_name = trim($input['service_name'] ?? '');
$specialist_id = (int)($input['specialist_id'] ?? 0);
$specialist_name = trim($input['specialist_name'] ?? '');
$date = trim($input['appointment_date'] ?? '');
$time = trim($input['appointment_time'] ?? '');
$total_price = trim($input['total_price'] ?? '');

if (!$name || !$phone || !$service_id || !$service_name || !$specialist_id || !$specialist_name || !$date || !$time || !$total_price) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    echo json_encode(['success' => false, 'message' => 'Invalid date']);
    exit;
}

// Convert "9:00 AM" to "09:00:00"
$timeMap = [
    '9:00 AM' => '09:00:00', '9:30 AM' => '09:30:00', '10:00 AM' => '10:00:00', '10:30 AM' => '10:30:00',
    '11:00 AM' => '11:00:00', '11:30 AM' => '11:30:00', '12:00 PM' => '12:00:00', '12:30 PM' => '12:30:00',
    '1:00 PM' => '13:00:00', '1:30 PM' => '13:30:00', '2:00 PM' => '14:00:00', '2:30 PM' => '14:30:00',
    '3:00 PM' => '15:00:00', '3:30 PM' => '15:30:00', '4:00 PM' => '16:00:00', '4:30 PM' => '16:30:00',
];
$timeSql = $timeMap[$time] ?? null;
if (!$timeSql) {
    if (preg_match('/^(\d{1,2}):(\d{2})\s*(AM|PM)$/i', $time, $m)) {
        $h = (int)$m[1];
        if (strtoupper($m[3]) === 'PM' && $h < 12) $h += 12;
        if (strtoupper($m[3]) === 'AM' && $h === 12) $h = 0;
        $timeSql = sprintf('%02d:%02d:00', $h, (int)$m[2]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid time']);
        exit;
    }
}

// Check slot still available for this specialist (avoid overlap per specialist)
$stmt = $conn->prepare("
    SELECT id FROM appointments
    WHERE appointment_date = ? AND appointment_time = ? AND specialist_id = ? AND status != 'cancelled'
");
$stmt->execute([$date, $timeSql, $specialist_id]);
if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'Khung giờ này đã được đặt cho chuyên gia này. Vui lòng chọn giờ khác.']);
    exit;
}

$booking_code = 'ELY-' . str_pad((string)random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

// When admin/receptionist creates booking, do not attach to their account
$user_id = null;
if (isset($_SESSION['user_id']) && (($_SESSION['user_role'] ?? '') === 'patient')) {
    $user_id = (int)$_SESSION['user_id'];
}

$stmt = $conn->prepare("
    INSERT INTO appointments (booking_code, user_id, customer_name, customer_phone, service_id, service_name, specialist_id, specialist_name, appointment_date, appointment_time, total_price, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'confirmed')
");
$stmt->execute([$booking_code, $user_id, $name, $phone, $service_id, $service_name, $specialist_id, $specialist_name, $date, $timeSql, $total_price]);

echo json_encode([
    'success' => true,
    'booking_id' => $booking_code,
    'message' => 'Booking confirmed'
]);
