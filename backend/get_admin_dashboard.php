<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/db.php';

$user = getCurrentUser();
if (!$user || ($user['role'] ?? '') !== 'admin') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Access denied']);
    exit;
}

$today = date('Y-m-d');

// Today's appointments
$stmt = $conn->prepare("
    SELECT id, booking_code, customer_name, customer_phone, service_name, specialist_name, appointment_time, status
    FROM appointments
    WHERE appointment_date = ?
    ORDER BY appointment_time ASC
");
$stmt->execute([$today]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format time for display
foreach ($appointments as &$a) {
    $t = $a['appointment_time'];
    if (is_string($t) && preg_match('/^(\d{2}):(\d{2})/', $t, $m)) {
        $h = (int)$m[1];
        $min = $m[2];
        $ampm = $h >= 12 ? 'PM' : 'AM';
        $h12 = $h > 12 ? $h - 12 : ($h === 0 ? 12 : $h);
        $a['time_display'] = sprintf('%d:%s %s', $h12, $min, $ampm);
    } else {
        $a['time_display'] = $t;
    }
}
unset($a);

// Pending count
$pending = 0;
foreach ($appointments as $a) {
    if (($a['status'] ?? '') === 'pending') $pending++;
}

// Daily revenue (sum of today's bookings - total_price is string like "1.800.000 VND")
$stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
$stmt->execute([$today]);
$prices = $stmt->fetchAll(PDO::FETCH_COLUMN);
$revenue = 0;
foreach ($prices as $p) {
    $num = preg_replace('/[^0-9]/', '', $p);
    if ($num !== '') $revenue += (int)$num;
}

// Specialists for availability (from DB)
$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY id");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'success' => true,
    'date' => $today,
    'appointments' => $appointments,
    'pending_count' => $pending,
    'revenue' => $revenue,
    'specialists' => $specialists,
]);