<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$planId = $_GET['plan_id'] ?? null;
$sessionId = $_GET['session_id'] ?? null;
$specialistId = $_GET['specialist_id'] ?? null;
$dateFrom = $_GET['date_from'] ?? null;
$dateTo = $_GET['date_to'] ?? null;
$status = $_GET['status'] ?? null;

try {
    $where = [];
    $params = [];

    if ($planId) {
        $where[] = "ts.plan_id = ?";
        $params[] = $planId;
    }

    if ($sessionId) {
        $where[] = "tss.id = ?";
        $params[] = $sessionId;
    }

    if ($specialistId) {
        $where[] = "sched.specialist_id = ?";
        $params[] = $specialistId;
    }

    if ($dateFrom) {
        $where[] = "sched.scheduled_date >= ?";
        $params[] = $dateFrom;
    }

    if ($dateTo) {
        $where[] = "sched.scheduled_date <= ?";
        $params[] = $dateTo;
    }

    if ($status) {
        $where[] = "sched.status = ?";
        $params[] = $status;
    }

    $whereClause = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    $stmt = $conn->prepare("
        SELECT 
            sched.id as schedule_id,
            sched.plan_session_id,
            sched.scheduled_date,
            sched.scheduled_time,
            sched.specialist_id,
            sched.status as schedule_status,
            sched.notes,
            sched.appointment_id,
            sched.created_at,
            
            tps.session_number,
            tps.service_id,
            tps.service_name,
            tps.focus_notes,
            tps.before_image_path,
            tps.after_image_path,
            tps.completed_at,
            
            tp.id as plan_id,
            tp.title as plan_title,
            tp.customer_id,
            tp.status as plan_status,
            
            c.Name as customer_name,
            c.Phone as customer_phone,
            
            s.name as specialist_name,
            s.title as specialist_title,
            
            ap.booking_code,
            ap.status as appointment_status,
            ap.payment_status
            
        FROM treatment_plans tp
        JOIN treatment_plan_sessions tps ON tp.id = tps.plan_id
        LEFT JOIN treatment_session_schedules sched ON tps.id = sched.plan_session_id
        LEFT JOIN Customer c ON tp.customer_id = c.Customer_ID
        LEFT JOIN specialists s ON sched.specialist_id = s.id
        LEFT JOIN appointments ap ON sched.appointment_id = ap.id
        $whereClause
        ORDER BY sched.scheduled_date ASC, sched.scheduled_time ASC
    ");
    
    $stmt->execute($params);
    $schedules = $stmt->fetchAll();

    // Group by plan if plan_id is provided
    if ($planId && count($schedules) > 0) {
        $grouped = [];
        foreach ($schedules as $schedule) {
            $sessionNum = $schedule['session_number'];
            if (!isset($grouped[$sessionNum])) {
                $grouped[$sessionNum] = $schedule;
            }
        }
        $schedules = array_values($grouped);
    }

    echo json_encode([
        'success' => true,
        'data' => $schedules
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
