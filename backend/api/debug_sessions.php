<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../db.php';

$user = getCurrentUser();
if (!$user) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Debug: Check if tables exist and have data
$debug = [];
try {
    // Check treatment_session_schedules
    $stmt = $conn->query("SELECT COUNT(*) FROM treatment_session_schedules");
    $debug['schedule_count'] = (int)$stmt->fetchColumn();
    
    // Check appointments with plan_session_id
    $stmt = $conn->query("SELECT COUNT(*) FROM appointments WHERE plan_session_id IS NOT NULL");
    $debug['appointment_with_plan'] = (int)$stmt->fetchColumn();
    
    // Check if user has matching customer
    $stmt = $conn->prepare("SELECT Customer_ID, Name FROM `Customer` WHERE Email = ? OR Phone = ? LIMIT 1");
    $stmt->execute([$user['email'] ?? '', $user['phone'] ?? '']);
    $debug['matched_customer'] = $stmt->fetch();
    
} catch (Exception $e) {
    $debug['error'] = $e->getMessage();
}

echo json_encode(['debug' => $debug, 'user_id' => $user['id'], 'user_email' => $user['email'] ?? '']);
