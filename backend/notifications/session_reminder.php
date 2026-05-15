<?php
/**
 * Session Reminder Notifications
 * Run this script periodically (e.g., via cron every hour or daily)
 * Or call it on page load for immediate notifications
 * 
 * Cron example: 0 8,12,18 * * * php /path/to/backend/notifications/session_reminder.php
 */

require_once __DIR__ . '/../db.php';

// Create notifications for upcoming sessions
function createSessionReminders(PDO $conn): array {
    $created = [];
    
    // Get sessions scheduled for tomorrow and today
    $stmt = $conn->prepare("
        SELECT 
            sched.id as schedule_id,
            sched.plan_session_id,
            sched.scheduled_date,
            sched.scheduled_time,
            sched.specialist_id,
            tps.session_number,
            tps.service_id,
            tps.service_name,
            tp.id as plan_id,
            tp.title as plan_title,
            tp.customer_id,
            c.Name as customer_name,
            c.Email as customer_email,
            c.Phone as customer_phone,
            s.name as specialist_name
        FROM treatment_session_schedules sched
        JOIN treatment_plan_sessions tps ON sched.plan_session_id = tps.id
        JOIN treatment_plans tp ON tps.plan_id = tp.id
        JOIN Customer c ON tp.customer_id = c.Customer_ID
        JOIN specialists s ON sched.specialist_id = s.id
        WHERE sched.status = 'scheduled'
          AND sched.scheduled_date >= CURDATE()
          AND sched.scheduled_date <= DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        ORDER BY sched.scheduled_date, sched.scheduled_time
    ");
    $stmt->execute();
    $upcomingSessions = $stmt->fetchAll();
    
    foreach ($upcomingSessions as $session) {
        $sessionDateTime = strtotime($session['scheduled_date'] . ' ' . $session['scheduled_time']);
        $now = time();
        $hoursUntil = ($sessionDateTime - $now) / 3600;
        
        // Determine notification type based on timing
        $isToday = $session['scheduled_date'] === date('Y-m-d');
        $isTomorrow = $session['scheduled_date'] === date('Y-m-d', strtotime('+1 day'));
        
        // Skip if more than 48 hours away or already passed
        if ($hoursUntil > 48 || $hoursUntil < -2) {
            continue;
        }
        
        // Check if notification already exists for this session today
        $stmt = $conn->prepare("
            SELECT id FROM notifications 
            WHERE related_id = ? 
              AND related_type = 'session_reminder'
              AND DATE(created_at) = CURDATE()
        ");
        $stmt->execute([$session['schedule_id']]);
        if ($stmt->fetch()) {
            continue; // Already notified today
        }
        
        // Create notification message
        if ($isToday) {
            $priority = 'urgent';
            if ($hoursUntil <= 0) {
                $title = "Buổi điều trị bắt đầu ngay bây giờ!";
                $message = "Buổi #{$session['session_number']} ({$session['service_name']}) của {$session['customer_name']} đang chờ. Vui lòng kiểm tra.";
            } elseif ($hoursUntil <= 1) {
                $title = "Buổi điều trị trong 1 giờ";
                $message = "Buổi #{$session['session_number']} ({$session['service_name']}) của {$session['customer_name']} sẽ bắt đầu lúc " . date('H:i', $sessionDateTime) . ".";
            } else {
                $title = "Buổi điều trị hôm nay";
                $message = "Buổi #{$session['session_number']} ({$session['service_name']}) của {$session['customer_name']} vào lúc " . date('H:i', $sessionDateTime) . ".";
            }
        } else {
            $priority = 'medium';
            $title = "Nhắc lịch: Buổi điều trị ngày mai";
            $message = "Buổi #{$session['session_number']} ({$session['service_name']}) của {$session['customer_name']} được lên lịch vào lúc " . date('H:i', $sessionDateTime) . " ngày mai.";
        }
        
        // Create notification for specialist
        try {
            $stmt = $conn->prepare("
                INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_id, related_type)
                VALUES (?, ?, 'session', ?, ?, ?, ?, 'session_reminder')
            ");
            $stmt->execute([
                $session['specialist_id'],
                $session['customer_id'],
                $title,
                $message,
                $priority,
                $session['schedule_id']
            ]);
            $created[] = $session['schedule_id'];
        } catch (Exception $e) {
            // Log error but continue
        }
        
        // Also notify admin/receptionist for today's sessions
        if ($isToday) {
            $stmt = $conn->prepare("
                SELECT id FROM users WHERE role IN ('admin', 'receptionist')
            ");
            $stmt->execute();
            $admins = $stmt->fetchAll();
            
            foreach ($admins as $admin) {
                try {
                    $stmt = $conn->prepare("
                        INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_id, related_type)
                        VALUES (?, ?, 'session', ?, ?, 'high', ?, 'session_reminder')
                    ");
                    $stmt->execute([
                        $admin['id'],
                        $session['customer_id'],
                        $title,
                        $message,
                        $session['schedule_id']
                    ]);
                } catch (Exception $e) {
                    // Ignore duplicates
                }
            }
        }
    }
    
    return $created;
}

// Run if called directly
if (php_sapi_name() === 'cli' || isset($argv[0]) && realpath($argv[0]) === __FILE__) {
    $created = createSessionReminders($conn);
    echo "Created " . count($created) . " reminder notifications\n";
}

// Export for use in other files
return createSessionReminders($conn);
