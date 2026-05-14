<?php
header('Content-Type: text/plain; charset=utf-8');
require_once __DIR__ . '/../db.php';

echo "=== DEBUG SESSION SCHEDULES ===\n\n";

// 1. Check if tables exist
try {
    $stmt = $conn->query("SHOW TABLES LIKE 'treatment_session_schedules'");
    echo "1. treatment_session_schedules exists: " . ($stmt->rowCount() > 0 ? 'YES' : 'NO') . "\n";
} catch (Exception $e) {
    echo "1. Error: " . $e->getMessage() . "\n";
}

// 2. Count records
try {
    $stmt = $conn->query("SELECT COUNT(*) FROM treatment_session_schedules");
    echo "2. Total schedules: " . $stmt->fetchColumn() . "\n";
    
    $stmt = $conn->query("SELECT COUNT(*) FROM appointments WHERE plan_session_id IS NOT NULL");
    echo "3. Appointments with plan_session_id: " . $stmt->fetchColumn() . "\n";
} catch (Exception $e) {
    echo "Error counting: " . $e->getMessage() . "\n";
}

// 3. Show sample schedules
try {
    $stmt = $conn->query("
        SELECT 
            sched.id,
            sched.plan_session_id,
            sched.scheduled_date,
            sched.scheduled_time,
            sched.status,
            tps.session_number,
            tp.customer_id,
            c.Name as customer_name
        FROM treatment_session_schedules sched
        JOIN treatment_plan_sessions tps ON sched.plan_session_id = tps.id
        JOIN treatment_plans tp ON tps.plan_id = tp.id
        JOIN `Customer` c ON tp.customer_id = c.Customer_ID
        ORDER BY sched.scheduled_date DESC
        LIMIT 5
    ");
    echo "\n4. Sample schedules:\n";
    while ($row = $stmt->fetch()) {
        echo "   - Schedule ID: {$row['id']}, Session: {$row['session_number']}, Date: {$row['scheduled_date']} {$row['scheduled_time']}, Status: {$row['status']}, Customer: {$row['customer_name']} (ID: {$row['customer_id']})\n";
    }
} catch (Exception $e) {
    echo "Error fetching schedules: " . $e->getMessage() . "\n";
}

// 4. Check appointments
try {
    echo "\n5. Appointments from treatment plans:\n";
    $stmt = $conn->query("
        SELECT id, booking_code, customer_name, service_name, appointment_date, plan_session_id
        FROM appointments 
        WHERE plan_session_id IS NOT NULL
        ORDER BY appointment_date DESC
        LIMIT 5
    ");
    while ($row = $stmt->fetch()) {
        echo "   - ID: {$row['id']}, Code: {$row['booking_code']}, Customer: {$row['customer_name']}, Date: {$row['appointment_date']}, Plan Session: {$row['plan_session_id']}\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// 5. Check user matching
echo "\n6. User <-> Customer matching:\n";
$stmt = $conn->query("SELECT id, email, full_name, role FROM users LIMIT 5");
while ($user = $stmt->fetch()) {
    // Try to find matching customer
    $stmt2 = $conn->prepare("SELECT Customer_ID, Name FROM `Customer` WHERE Email = ? LIMIT 1");
    $stmt2->execute([$user['email']]);
    $customer = $stmt2->fetch();
    
    if ($customer) {
        echo "   User {$user['email']} ({$user['role']}) -> Customer: {$customer['Name']} (ID: {$customer['Customer_ID']})\n";
    } else {
        echo "   User {$user['email']} ({$user['role']}) -> NO MATCHING CUSTOMER\n";
    }
}
