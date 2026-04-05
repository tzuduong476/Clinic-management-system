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

if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Thiếu ID lịch hẹn']);
    exit;
}

$stmt = $conn->prepare("UPDATE appointments SET status = 'cancelled' WHERE id = ?");
$stmt->execute([$id]);

if ($stmt->rowCount() === 0) {
    echo json_encode(['success' => false, 'message' => 'Không tìm thấy lịch hẹn']);
    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'Đã hủy lịch hẹn'
]);
