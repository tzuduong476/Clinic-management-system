<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (empty($data['plan_session_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing plan_session_id']);
    exit;
}

$planSessionId = (int)$data['plan_session_id'];
$status = $data['status'] ?? 'completed'; // 'completed' or 'no_show'
$treatmentDate = $data['treatment_date'] ?? date('Y-m-d');

// Validate status
if (!in_array($status, ['completed', 'no_show'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid status. Use "completed" or "no_show"']);
    exit;
}

try {
    // Get session info
    $stmt = $conn->prepare("
        SELECT tps.*, tp.customer_id, tp.title as plan_title, tp.specialist_id as plan_specialist_id
        FROM treatment_plan_sessions tps
        JOIN treatment_plans tp ON tps.plan_id = tp.id
        WHERE tps.id = ?
    ");
    $stmt->execute([$planSessionId]);
    $session = $stmt->fetch();

    if (!$session) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Session not found']);
        exit;
    }

    $conn->beginTransaction();

    // Update session schedule if exists
    $stmt = $conn->prepare("
        SELECT * FROM treatment_session_schedules 
        WHERE plan_session_id = ? AND status = 'scheduled'
        LIMIT 1
    ");
    $stmt->execute([$planSessionId]);
    $schedule = $stmt->fetch();

    if ($schedule) {
        // Update schedule status
        $stmt = $conn->prepare("
            UPDATE treatment_session_schedules 
            SET status = ?
            WHERE id = ?
        ");
        $stmt->execute([$status, $schedule['id']]);

        // Update related appointment
        if ($schedule['appointment_id']) {
            $stmt = $conn->prepare("
                UPDATE appointments 
                SET status = ?
                WHERE id = ?
            ");
            $stmt->execute([$status === 'completed' ? 'completed' : 'no_show', $schedule['appointment_id']]);
        }
    }

    // Update session completion status
    if ($status === 'completed') {
        $stmt = $conn->prepare("
            UPDATE treatment_plan_sessions 
            SET completed_at = NOW()
            WHERE id = ?
        ");
        $stmt->execute([$planSessionId]);
    }

    // Update plan status
    syncTreatmentPlanStatus($conn, $session['plan_id']);

    // Create notification
    $customerName = '';
    $stmt = $conn->prepare("SELECT Name FROM Customer WHERE Customer_ID = ?");
    $stmt->execute([$session['customer_id']]);
    $customer = $stmt->fetch();
    if ($customer) {
        $customerName = $customer['Name'];
    }

    $stmt = $conn->prepare("
        INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_id, related_type)
        VALUES (?, ?, 'session', ?, ?, 'medium', ?, 'session')
    ");

    if ($status === 'completed') {
        $title = "Buổi {$session['session_number']} đã hoàn thành";
        $message = "Buổi điều trị #{$session['session_number']} của {$customerName} ({$session['plan_title']}) đã được hoàn thành.";
    } else {
        $title = "Buổi {$session['session_number']} - Khách vắng";
        $message = "Khách hàng {$customerName} không đến buổi điều trị #{$session['session_number']} ({$session['plan_title']}).";
    }
    
    $stmt->execute([$session['plan_specialist_id'], $session['customer_id'], $title, $message, $planSessionId]);

    $conn->commit();

    echo json_encode([
        'success' => true,
        'message' => "Session marked as {$status}",
        'data' => [
            'plan_session_id' => $planSessionId,
            'status' => $status,
            'treatment_date' => $treatmentDate
        ]
    ]);

} catch (Exception $e) {
    $conn->rollBack();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
