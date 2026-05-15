<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once __DIR__ . '/db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$user_id = (int)($_SESSION['user_id'] ?? 0);

if ($user_id <= 0) {
    echo json_encode(['success' => true, 'appointments' => []]);
    exit;
}

try {
    // Use session user_id directly as Customer_ID
    // This is the most reliable way since user_id = Customer_ID for customers
    
    // Get appointments by customer_id (primary) OR by user_id (secondary)
    // This handles both new appointments (with customer_id) and legacy appointments
    $stmt = $conn->prepare("
        SELECT DISTINCT id, booking_code, service_name, specialist_name, 
               appointment_date, appointment_time, total_price, status, payment_status, created_at
        FROM appointments 
        WHERE customer_id = ? 
           OR user_id = ?
           OR plan_session_id IN (
               SELECT tss.appointment_id 
               FROM treatment_session_schedules tss
               JOIN treatment_plan_sessions tps ON tss.plan_session_id = tps.id
               JOIN treatment_plans tp ON tps.plan_id = tp.id
               WHERE tp.customer_id = ?
           )
        ORDER BY appointment_date DESC, appointment_time DESC
    ");
    $stmt->execute([$user_id, $user_id, $user_id]);
    $appointments = $stmt->fetchAll();

    echo json_encode([
        'success' => true,
        'appointments' => $appointments
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch appointments: ' . $e->getMessage()
    ]);
}
