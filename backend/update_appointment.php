<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

require_once __DIR__ . '/db.php';

$user = getCurrentUser();
if (!$user || ($user['role'] !== 'admin' && $user['role'] !== 'receptionist')) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?? [];
$id = (int)($input['id'] ?? 0);
$name = trim($input['customer_name'] ?? '');
$phone = trim($input['customer_phone'] ?? '');
$service_id = trim($input['service_id'] ?? '');
$specialist_id = (int)($input['specialist_id'] ?? 0);
$date = trim($input['appointment_date'] ?? '');
$time = trim($input['appointment_time'] ?? '');
$status = trim($input['status'] ?? 'confirmed');

if ($id <= 0 || !$name || !$phone || !$service_id || !$specialist_id || !$date || !$time) {
    echo json_encode(['success' => false, 'message' => 'Thiếu thông tin bắt buộc']);
    exit;
}

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    echo json_encode(['success' => false, 'message' => 'Ngày không hợp lệ']);
    exit;
}

$timeMap = [
    '9:00 AM' => '09:00:00', '9:30 AM' => '09:30:00', '10:00 AM' => '10:00:00', '10:30 AM' => '10:30:00',
    '11:00 AM' => '11:00:00', '11:30 AM' => '11:30:00', '12:00 PM' => '12:00:00', '12:30 PM' => '12:30:00',
    '1:00 PM' => '13:00:00', '1:30 PM' => '13:30:00', '2:00 PM' => '14:00:00', '2:30 PM' => '14:30:00',
    '3:00 PM' => '15:00:00', '3:30 PM' => '15:30:00', '4:00 PM' => '16:00:00', '4:30 PM' => '16:30:00',
];
$timeSql = $timeMap[$time] ?? null;
if (!$timeSql && preg_match('/^(\d{1,2}):(\d{2})\s*(AM|PM)$/i', $time, $m)) {
    $h = (int)$m[1];
    if (strtoupper($m[3]) === 'PM' && $h < 12) $h += 12;
    if (strtoupper($m[3]) === 'AM' && $h === 12) $h = 0;
    $timeSql = sprintf('%02d:%02d:00', $h, (int)$m[2]);
}
if (!$timeSql) {
    echo json_encode(['success' => false, 'message' => 'Giờ không hợp lệ']);
    exit;
}

$allowedStatuses = ['pending', 'confirmed', 'checked_in', 'completed', 'no_show', 'cancelled'];

if (!in_array($status, $allowedStatuses, true)) {
    $status = 'confirmed';
}

// Check existing appointment
$stmt = $conn->prepare("
    SELECT id, status, arrival_status, confirmed_at, confirmed_by, checked_in_at, checked_in_by
    FROM appointments
    WHERE id = ?
");
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    echo json_encode(['success' => false, 'message' => 'Không tìm thấy lịch hẹn']);
    exit;
}

$currentStatus = (string)($appointment['status'] ?? 'confirmed');
$allowedTransitions = [
    'pending' => ['pending', 'confirmed', 'cancelled'],
    'confirmed' => ['confirmed', 'checked_in', 'no_show', 'cancelled'],
    'checked_in' => ['checked_in', 'completed'],
    'completed' => ['completed'],
    'no_show' => ['no_show'],
    'cancelled' => ['cancelled'],
];

$validNextStatuses = $allowedTransitions[$currentStatus] ?? $allowedStatuses;
if (!in_array($status, $validNextStatuses, true)) {
    echo json_encode([
        'success' => false,
        'message' => 'Chuyển trạng thái không hợp lệ theo workflow hiện tại',
    ]);
    exit;
}

// Check slot available for this specialist (exclude current appointment)
$stmt = $conn->prepare("
    SELECT id FROM appointments
    WHERE appointment_date = ? AND appointment_time = ? AND specialist_id = ? AND status != 'cancelled' AND id != ?
");
$stmt->execute([$date, $timeSql, $specialist_id, $id]);
if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'Khung giờ này đã được đặt cho chuyên gia này. Chọn giờ khác để tránh trùng lịch.']);
    exit;
}

$stmt = $conn->prepare("SELECT name, price FROM services WHERE id = ? LIMIT 1");
$stmt->execute([$service_id]);
$serviceRow = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$serviceRow) {
    echo json_encode(['success' => false, 'message' => 'Dịch vụ không tồn tại trong hệ thống']);
    exit;
}

$stmt = $conn->prepare("SELECT name FROM specialists WHERE id = ? LIMIT 1");
$stmt->execute([$specialist_id]);
$specialistRow = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$specialistRow) {
    echo json_encode(['success' => false, 'message' => 'Chuyên gia không tồn tại trong hệ thống']);
    exit;
}

$service_name = $serviceRow['name'];
$total_price = $serviceRow['price'];
$specialist_name = $specialistRow['name'];

$confirmedAt = $appointment['confirmed_at'] ?? null;
$confirmedBy = $appointment['confirmed_by'] ?? null;
$checkedInAt = $appointment['checked_in_at'] ?? null;
$checkedInBy = $appointment['checked_in_by'] ?? null;
$arrivalStatus = $appointment['arrival_status'] ?? 'not_arrived';
$currentUserId = (int)($user['id'] ?? 0);

if ($status === 'confirmed') {
    $confirmedAt = $confirmedAt ?: date('Y-m-d H:i:s');
    $confirmedBy = $confirmedBy ?: $currentUserId;
    $arrivalStatus = 'not_arrived';
} elseif ($status === 'checked_in') {
    $confirmedAt = $confirmedAt ?: date('Y-m-d H:i:s');
    $confirmedBy = $confirmedBy ?: $currentUserId;
    $checkedInAt = $checkedInAt ?: date('Y-m-d H:i:s');
    $checkedInBy = $checkedInBy ?: $currentUserId;
    $arrivalStatus = 'arrived';
} elseif ($status === 'completed') {
    $arrivalStatus = 'arrived';
} elseif (in_array($status, ['pending', 'no_show', 'cancelled'], true)) {
    $checkedInAt = null;
    $checkedInBy = null;
    $arrivalStatus = 'not_arrived';
}

$stmt = $conn->prepare("
    UPDATE appointments SET
        customer_name = ?, customer_phone = ?, service_id = ?, service_name = ?,
        specialist_id = ?, specialist_name = ?, appointment_date = ?, appointment_time = ?,
        total_price = ?, status = ?, arrival_status = ?, confirmed_at = ?, confirmed_by = ?, checked_in_at = ?, checked_in_by = ?
    WHERE id = ?
");
$stmt->execute([
    $name,
    $phone,
    $service_id,
    $service_name,
    $specialist_id,
    $specialist_name,
    $date,
    $timeSql,
    $total_price,
    $status,
    $arrivalStatus,
    $confirmedAt,
    $confirmedBy,
    $checkedInAt,
    $checkedInBy,
    $id
]);

echo json_encode([
    'success' => true,
    'message' => 'Đã cập nhật lịch hẹn'
]);
