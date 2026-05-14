<?php
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}
require_once __DIR__ . '/db.php';
$user = getCurrentUser();
if (!$user || !in_array($user['role'] ?? '', ['doctor', 'admin'], true)) {
    echo json_encode(['success' => false, 'message' => 'Chỉ bác sĩ hoặc admin mới được cập nhật hồ sơ.']);
    exit;
}
$input = json_decode(file_get_contents('php://input'), true) ?? [];
$id = (int)($input['customer_id'] ?? 0);
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Thiếu ID khách hàng']);
    exit;
}
$name = trim($input['name'] ?? '');
$phone = trim($input['phone'] ?? '');
$email = trim($input['email'] ?? '');
$skin_type = trim($input['skin_type'] ?? '');
$skin_condition = trim($input['skin_condition'] ?? '');
$date_of_birth = trim($input['date_of_birth'] ?? '');
$patient_notes = trim($input['patient_notes'] ?? '');
if (!$name || !$email) {
    echo json_encode(['success' => false, 'message' => 'Họ tên và email không được để trống']);
    exit;
}
$dobSql = null;
if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_of_birth)) {
    $dobSql = $date_of_birth;
}
$stmt = $conn->prepare("UPDATE `Customer` SET Name = ?, Phone = ?, Email = ?, Skin_type = ?, Skin_condition = ?, Date_of_birth = ?, Patient_notes = ? WHERE Customer_ID = ?");
$stmt->execute([$name, $phone, $email, $skin_type, $skin_condition, $dobSql, $patient_notes, $id]);
if ($stmt->rowCount() === 0) {
    $stmt = $conn->prepare("SELECT Customer_ID FROM `Customer` WHERE Customer_ID = ?");
    $stmt->execute([$id]);
    if (!$stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Không tìm thấy khách hàng']);
        exit;
    }
}
echo json_encode(['success' => true, 'message' => 'Đã cập nhật hồ sơ']);