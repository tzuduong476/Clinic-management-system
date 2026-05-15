<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/db.php';

function redirectToAdmin(string $redirect): void
{
    $redirect = trim($redirect);
    if ($redirect === '') {
        return;
    }

    if (
        preg_match('/^(https?:)?\/\//i', $redirect) === 1 ||
        str_starts_with($redirect, '/') ||
        str_starts_with($redirect, '../')
    ) {
        header('Location: ' . $redirect);
        exit;
    }

    header('Location: ../admin/' . ltrim($redirect, '/'));
    exit;
}

$user = getCurrentUser();
if (!$user || !in_array($user['role'] ?? '', ['admin', 'receptionist'], true)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$isJsonRequest = str_contains((string)($_SERVER['CONTENT_TYPE'] ?? ''), 'application/json');
$input = $isJsonRequest
    ? (json_decode(file_get_contents('php://input'), true) ?? [])
    : $_POST;

$id = (int)($input['id'] ?? 0);
$redirect = trim((string)($input['redirect'] ?? ''));

if ($id <= 0) {
    $response = ['success' => false, 'message' => 'Invalid appointment ID'];
    if ($redirect !== '') {
        redirectToAdmin($redirect);
    }
    echo json_encode($response);
    exit;
}

$stmt = $conn->prepare("
    SELECT id, appointment_date, status, arrival_status
    FROM appointments
    WHERE id = ?
    LIMIT 1
");
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    $response = ['success' => false, 'message' => 'Appointment not found'];
    if ($redirect !== '') {
        redirectToAdmin($redirect);
    }
    echo json_encode($response);
    exit;
}

if (($appointment['status'] ?? '') === 'pending') {
    $response = ['success' => false, 'message' => 'Please confirm the appointment before check-in'];
    if ($redirect !== '') {
        redirectToAdmin($redirect);
    }
    echo json_encode($response);
    exit;
}

if (in_array(($appointment['status'] ?? ''), ['cancelled', 'no_show', 'completed'], true)) {
    $response = ['success' => false, 'message' => 'This appointment cannot be checked in'];
    if ($redirect !== '') {
        redirectToAdmin($redirect);
    }
    echo json_encode($response);
    exit;
}

if (($appointment['status'] ?? '') === 'checked_in' || ($appointment['arrival_status'] ?? 'not_arrived') === 'arrived') {
    $response = ['success' => true, 'message' => 'Appointment already checked in'];
    if ($redirect !== '') {
        redirectToAdmin($redirect);
    }
    echo json_encode($response);
    exit;
}

$stmt = $conn->prepare("
    UPDATE appointments
    SET status = 'checked_in',
        arrival_status = 'arrived',
        checked_in_at = NOW(),
        checked_in_by = ?
    WHERE id = ?
");
$stmt->execute([(int)$user['id'], $id]);

$response = ['success' => true, 'message' => 'Customer checked in successfully'];

if ($redirect !== '') {
    redirectToAdmin($redirect);
}

echo json_encode($response);
