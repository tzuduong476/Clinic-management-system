<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . '/db.php';

$date = isset($_GET['date']) ? trim($_GET['date']) : '';
$service_id = isset($_GET['service_id']) ? trim($_GET['service_id']) : '';
$specialist_id = isset($_GET['specialist_id']) ? (int)$_GET['specialist_id'] : 0;
$exclude_appointment_id = isset($_GET['exclude_appointment_id']) ? (int)$_GET['exclude_appointment_id'] : 0;

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    echo json_encode(['success' => false, 'message' => 'Invalid date']);
    exit;
}

$dt = new DateTime($date);
$today = (new DateTime())->setTime(0, 0, 0);
if ($dt < $today) {
    echo json_encode(['success' => true, 'data' => []]);
    exit;
}

// All slots 09:00 - 17:00, step 30 min
$slots = [];
for ($h = 9; $h <= 16; $h++) {
    foreach ([0, 30] as $m) {
        if ($h === 16 && $m === 30) break;
        $t = sprintf('%02d:%02d:00', $h, $m);
        $slots[] = $t;
    }
}

// Remove slots already booked for this date (and this specialist if provided)
// When editing, exclude_appointment_id allows the current slot to stay available
if ($specialist_id > 0) {
    if ($exclude_appointment_id > 0) {
        $stmt = $conn->prepare("
            SELECT TIME(appointment_time) as t FROM appointments
            WHERE appointment_date = ? AND specialist_id = ? AND status != 'cancelled' AND id != ?
        ");
        $stmt->execute([$date, $specialist_id, $exclude_appointment_id]);
    } else {
        $stmt = $conn->prepare("
            SELECT TIME(appointment_time) as t FROM appointments
            WHERE appointment_date = ? AND specialist_id = ? AND status != 'cancelled'
        ");
        $stmt->execute([$date, $specialist_id]);
    }
} else {
    $stmt = $conn->prepare("
        SELECT TIME(appointment_time) as t FROM appointments
        WHERE appointment_date = ? AND status != 'cancelled'
    ");
    $stmt->execute([$date]);
}
$booked = $stmt->fetchAll(PDO::FETCH_COLUMN);

$available = array_values(array_diff($slots, $booked));
$formatted = array_map(function ($t) {
    $h = (int)substr($t, 0, 2);
    $m = substr($t, 3, 2);
    $ampm = $h >= 12 ? 'PM' : 'AM';
    $h12 = $h > 12 ? $h - 12 : ($h === 0 ? 12 : $h);
    return sprintf('%d:%s %s', $h12, $m, $ampm);
}, $available);

echo json_encode(['success' => true, 'data' => $formatted, 'raw' => $available]);
