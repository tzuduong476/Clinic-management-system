<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once __DIR__ . '/../backend/db.php';

$response = ['success' => false, 'message' => ''];
$action = $_POST['action'] ?? '';

if ($action === 'confirm_payment') {
    $bookingCode = trim($_POST['booking_code'] ?? '');
    $paymentMethod = trim($_POST['payment_method'] ?? 'cash');
    $paymentNote = trim($_POST['payment_note'] ?? '');
    
    if (empty($bookingCode)) {
        $response['message'] = 'Booking code is required.';
        echo json_encode($response);
        exit;
    }
    
    $currentUser = getCurrentUser();
    if (!$currentUser || ($currentUser['role'] !== 'admin' && $currentUser['role'] !== 'receptionist')) {
        $response['message'] = 'Unauthorized. Only admin or receptionist can confirm payments.';
        echo json_encode($response);
        exit;
    }
    
    try {
        $stmt = $conn->prepare("
            UPDATE appointments 
            SET payment_status = 'paid', 
                payment_method = ?, 
                payment_note = ?,
                confirmed_by = ?,
                confirmed_at = NOW()
            WHERE booking_code = ?
        ");
        $stmt->execute([$paymentMethod, $paymentNote, $currentUser['id'], $bookingCode]);
        
        if ($stmt->rowCount() === 0) {
            $response['message'] = 'Booking not found.';
            echo json_encode($response);
            exit;
        }
        
        $response['success'] = true;
        $response['message'] = 'Payment confirmed successfully!';
    } catch (PDOException $e) {
        $response['message'] = 'Error confirming payment: ' . $e->getMessage();
    }
}
elseif ($action === 'get_unpaid_appointments') {
    $stmt = $conn->query("
        SELECT a.*, u.full_name as confirmed_by_name
        FROM appointments a
        LEFT JOIN users u ON a.confirmed_by = u.id
        WHERE a.payment_status = 'unpaid' AND a.status != 'cancelled'
        ORDER BY a.appointment_date DESC, a.appointment_time DESC
    ");
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response['success'] = true;
    $response['data'] = $appointments;
}
elseif ($action === 'get_all_appointments_with_payment') {
    $dateFrom = trim($_GET['from'] ?? '');
    $dateTo = trim($_GET['to'] ?? '');
    $paymentStatus = trim($_GET['payment_status'] ?? '');
    
    $sql = "SELECT a.*, u.full_name as confirmed_by_name FROM appointments a LEFT JOIN users u ON a.confirmed_by = u.id WHERE 1=1";
    $params = [];
    
    if ($dateFrom) {
        $sql .= " AND a.appointment_date >= ?";
        $params[] = $dateFrom;
    }
    if ($dateTo) {
        $sql .= " AND a.appointment_date <= ?";
        $params[] = $dateTo;
    }
    if ($paymentStatus) {
        $sql .= " AND a.payment_status = ?";
        $params[] = $paymentStatus;
    }
    
    $sql .= " ORDER BY a.appointment_date DESC, a.appointment_time DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response['success'] = true;
    $response['data'] = $appointments;
}
else {
    $response['message'] = 'Invalid action.';
}

echo json_encode($response);
