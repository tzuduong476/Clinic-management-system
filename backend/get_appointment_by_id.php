<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/db.php';

$user = getCurrentUser();
if (!$user || ($user['role'] !== 'admin' && $user['role'] !== 'receptionist')) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid ID']);
    exit;
}

$stmt = $conn->prepare("
    SELECT id, booking_code, user_id, customer_name, customer_phone, service_id, service_name,
           specialist_id, specialist_name, appointment_date, appointment_time, total_price, status
    FROM appointments WHERE id = ?
");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo json_encode(['success' => false, 'message' => 'Không tìm thấy lịch hẹn']);
    exit;
}

// Format time for display (e.g. 09:00:00 -> 9:00 AM)
$t = $row['appointment_time'];
if (preg_match('/^(\d{2}):(\d{2})/', $t, $m)) {
    $h = (int)$m[1];
    $ampm = $h >= 12 ? 'PM' : 'AM';
    $h12 = $h > 12 ? $h - 12 : ($h === 0 ? 12 : $h);
    $row['appointment_time_display'] = sprintf('%d:%s %s', $h12, $m[2], $ampm);
} else {
    $row['appointment_time_display'] = $t;
}

echo json_encode(['success' => true, 'appointment' => $row]);
