<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once __DIR__ . '/../db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'doctor', 'receptionist'], true)) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$planId = (int)($_GET['plan_id'] ?? 0);

if ($planId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid plan ID']);
    exit;
}

try {
    // Get plan details
    $stmt = $conn->prepare("
        SELECT tp.*, s.name as specialist_name, s.title as specialist_title
        FROM treatment_plans tp
        LEFT JOIN specialists s ON tp.specialist_id = s.id
        WHERE tp.id = ?
    ");
    $stmt->execute([$planId]);
    $plan = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$plan) {
        echo json_encode(['success' => false, 'message' => 'Plan not found']);
        exit;
    }

    // Get customer info
    $stmt = $conn->prepare("SELECT Customer_ID, Name, Phone, Email, Skin_type, Skin_condition FROM `Customer` WHERE Customer_ID = ?");
    $stmt->execute([$plan['customer_id']]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get sessions with images and clinical notes
    $stmt = $conn->prepare("
        SELECT tps.*, 
               sr.clinical_observations, sr.outcome_rating, sr.next_focus, sr.treatment_date,
               sr.skin_response, sr.pain_level, sr.products_used, sr.home_care,
               tss.scheduled_date, tss.scheduled_time,
               ap.booking_code, ap.total_price
        FROM treatment_plan_sessions tps
        LEFT JOIN session_records sr ON tps.id = sr.plan_session_id
        LEFT JOIN treatment_session_schedules tss ON tps.id = tss.plan_session_id
        LEFT JOIN appointments ap ON tss.appointment_id = ap.id
        WHERE tps.plan_id = ?
        ORDER BY tps.session_number
    ");
    $stmt->execute([$planId]);
    $sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get completion date
    $completedDate = null;
    $lastSession = end($sessions);
    if ($lastSession && !empty($lastSession['completed_at'])) {
        $completedDate = $lastSession['completed_at'];
    }

    echo json_encode([
        'success' => true,
        'data' => [
            'id' => $plan['id'],
            'title' => $plan['title'],
            'specialist_name' => $plan['specialist_name'],
            'specialist_title' => $plan['specialist_title'],
            'overall_goal' => $plan['overall_goal'],
            'start_date' => $plan['start_date'],
            'status' => $plan['status'],
            'clinical_notes' => $plan['clinical_notes'],
            'completed_date' => $completedDate,
            'customer' => $customer,
            'sessions' => $sessions
        ]
    ]);
} catch (Throwable $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch plan: ' . $e->getMessage()
    ]);
}
