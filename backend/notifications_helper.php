<?php

function notificationNow(): DateTimeImmutable
{
    return new DateTimeImmutable('now');
}

function notificationDateTime(?string $date, ?string $time = null): ?DateTimeImmutable
{
    $date = trim((string)$date);
    $time = trim((string)$time);

    if ($date === '') {
        return null;
    }

    $raw = $time !== '' ? $date . ' ' . $time : $date;

    try {
        return new DateTimeImmutable($raw);
    } catch (Exception) {
        return null;
    }
}

function notificationRelativeTime(?DateTimeImmutable $dateTime): string
{
    if (!$dateTime) {
        return 'Unknown time';
    }

    $now = notificationNow();
    $diff = $now->getTimestamp() - $dateTime->getTimestamp();
    $future = $diff < 0;
    $seconds = abs($diff);

    if ($seconds < 60) {
        return $future ? 'Starting soon' : 'Just now';
    }

    $minutes = (int)floor($seconds / 60);
    if ($minutes < 60) {
        return $future ? 'In ' . $minutes . ' minute' . ($minutes === 1 ? '' : 's') : $minutes . ' minute' . ($minutes === 1 ? '' : 's') . ' ago';
    }

    $hours = (int)floor($minutes / 60);
    if ($hours < 24) {
        return $future ? 'In ' . $hours . ' hour' . ($hours === 1 ? '' : 's') : $hours . ' hour' . ($hours === 1 ? '' : 's') . ' ago';
    }

    $days = (int)floor($hours / 24);
    if ($days < 30) {
        return $future ? 'In ' . $days . ' day' . ($days === 1 ? '' : 's') : $days . ' day' . ($days === 1 ? '' : 's') . ' ago';
    }

    return $dateTime->format('d/m/Y H:i');
}

function notificationDisplayDate(?DateTimeImmutable $dateTime): string
{
    if (!$dateTime) {
        return '';
    }

    return $dateTime->format('d/m/Y H:i');
}

function notificationPriorityRank(string $priority): int
{
    if ($priority === 'urgent') {
        return 3;
    }

    if ($priority === 'high') {
        return 2;
    }

    if ($priority === 'medium') {
        return 1;
    }

    return 0;
}

function notificationStatusLabel(string $status): string
{
    $labels = [
        'pending' => 'pending',
        'confirmed' => 'confirmed',
        'checked_in' => 'checked in',
        'completed' => 'completed',
        'no_show' => 'no-show',
        'cancelled' => 'cancelled',
    ];

    return $labels[$status] ?? str_replace('_', ' ', $status);
}

function buildNotificationItem(
    string $id,
    string $title,
    string $message,
    ?DateTimeImmutable $dateTime,
    string $priority = 'medium',
    string $icon = 'notifications',
    string $href = '#',
    ?int $sortTs = null
): array {
    return [
        'id' => $id,
        'title' => $title,
        'message' => $message,
        'priority' => $priority,
        'icon' => $icon,
        'href' => $href,
        'created_at' => notificationDisplayDate($dateTime),
        'relative_time' => notificationRelativeTime($dateTime),
        'sort_ts' => $sortTs ?? ($dateTime ? $dateTime->getTimestamp() : 0),
        'priority_rank' => notificationPriorityRank($priority),
    ];
}

function finalizeNotificationItems(array $items, int $limit = 12): array
{
    usort($items, static function (array $left, array $right): int {
        if (($left['priority_rank'] ?? 0) === ($right['priority_rank'] ?? 0)) {
            return (int)($right['sort_ts'] ?? 0) <=> (int)($left['sort_ts'] ?? 0);
        }

        return (int)($right['priority_rank'] ?? 0) <=> (int)($left['priority_rank'] ?? 0);
    });

    $items = array_slice($items, 0, $limit);

    foreach ($items as &$item) {
        unset($item['sort_ts'], $item['priority_rank']);
    }

    return $items;
}

function fetchPatientNotifications(PDO $conn, array $currentUser): array
{
    $items = [];
    $now = notificationNow();

    // Use session user_id directly as Customer_ID for reliable matching
    $userId = (int)($currentUser['id'] ?? 0);
    
    if ($userId <= 0) {
        return $items;
    }
    
    // Verify this customer exists
    $stmt = $conn->prepare("SELECT Customer_ID, Name FROM `Customer` WHERE Customer_ID = ? LIMIT 1");
    $stmt->execute([$userId]);
    $customer = $stmt->fetch();
    
    if (!$customer) {
        return $items;
    }
    
    $customerId = (int)$customer['Customer_ID'];

    // Fetch notifications from notifications table for this customer only
    $stmt = $conn->prepare("
        SELECT id, type, title, message, priority, is_read, created_at
        FROM notifications
        WHERE (user_id = ? OR customer_id = ?) AND type IN ('session', 'appointment', 'reminder', 'system')
        ORDER BY created_at DESC
        LIMIT 10
    ");
    $stmt->execute([$userId, $customerId]);
    
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $createdAt = notificationDateTime($row['created_at'] ?? null);
        $priority = (string)($row['priority'] ?? 'medium');
        
        $items[] = buildNotificationItem(
            'notif-' . (string)($row['id'] ?? uniqid('', true)),
            (string)($row['title'] ?? 'Notification'),
            (string)($row['message'] ?? ''),
            $createdAt,
            $priority,
            $row['type'] === 'session' ? 'clinical_notes' : ($row['type'] === 'appointment' ? 'calendar_month' : 'notifications'),
            'profile.php'
        );
    }

    // Treatment plan sessions reminders
    if ($customerId > 0) {
        $stmt = $conn->prepare("
            SELECT 
                sched.id as schedule_id,
                sched.scheduled_date,
                sched.scheduled_time,
                tps.session_number,
                tps.service_name,
                tp.title as plan_title,
                s.name as specialist_name
            FROM treatment_session_schedules sched
            JOIN treatment_plan_sessions tps ON sched.plan_session_id = tps.id
            JOIN treatment_plans tp ON tps.plan_id = tp.id
            JOIN specialists s ON sched.specialist_id = s.id
            WHERE tp.customer_id = ?
              AND sched.status = 'scheduled'
              AND sched.scheduled_date >= CURDATE()
              AND sched.scheduled_date <= DATE_ADD(CURDATE(), INTERVAL 1 DAY)
            ORDER BY sched.scheduled_date ASC, sched.scheduled_time ASC
            LIMIT 4
        ");
        $stmt->execute([$customerId]);
        
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $sessionDateTime = notificationDateTime($row['scheduled_date'] ?? null, $row['scheduled_time'] ?? null);
            if (!$sessionDateTime) continue;
            
            $isToday = ($row['scheduled_date'] ?? '') === date('Y-m-d');
            
            $items[] = buildNotificationItem(
                'patient-plan-session-' . ($row['schedule_id'] ?? ''),
                $isToday ? 'Hẹn buổi điều trị hôm nay!' : 'Nhắc hẹn buổi điều trị ngày mai',
                sprintf(
                    'Buổi #%d (%s) của kế hoạch "%s" vào lúc %s. Chuyên gia: %s.',
                    (int)($row['session_number'] ?? 0),
                    (string)($row['service_name'] ?? ''),
                    (string)($row['plan_title'] ?? ''),
                    $sessionDateTime->format('H:i'),
                    (string)($row['specialist_name'] ?? '')
                ),
                $sessionDateTime,
                $isToday ? 'urgent' : 'high',
                'clinical_notes',
                'profile.php',
                $sessionDateTime->getTimestamp()
            );
        }
    }

    // Get appointments for this customer (matched by customer_id)
    if ($customerId > 0) {
        $stmt = $conn->prepare("
            SELECT booking_code, service_name, specialist_name, appointment_date, appointment_time, status, payment_status
            FROM appointments
            WHERE customer_id = ?
              AND status <> 'cancelled'
              AND TIMESTAMP(appointment_date, appointment_time) BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 3 DAY)
            ORDER BY appointment_date ASC, appointment_time ASC
            LIMIT 4
        ");
        $stmt->execute([$customerId]);
    } else {
        $stmt = $conn->prepare("SELECT 1 WHERE 1=0"); // Empty result
        $stmt->execute();
    }

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $appointmentAt = notificationDateTime($row['appointment_date'] ?? null, $row['appointment_time'] ?? null);
        if (!$appointmentAt) {
            continue;
        }

        $secondsUntil = $appointmentAt->getTimestamp() - $now->getTimestamp();
        $priority = $secondsUntil <= 86400 ? 'urgent' : 'high';
        $message = sprintf(
            'Bạn có lịch hẹn %s với %s vào lúc %s. Trạng thái: %s.',
            (string)($row['service_name'] ?? 'dịch vụ'),
            (string)($row['specialist_name'] ?? 'bác sĩ'),
            $appointmentAt->format('d/m/Y H:i'),
            notificationStatusLabel((string)($row['status'] ?? 'confirmed'))
        );

        if (($row['payment_status'] ?? '') === 'unpaid') {
            $message .= ' Lịch hẹn chưa thanh toán.';
        }

        $items[] = buildNotificationItem(
            'patient-upcoming-' . (string)($row['booking_code'] ?? uniqid('', true)),
            'Nhắc lịch hẹn sắp tới',
            $message,
            $appointmentAt,
            $priority,
            'calendar_month',
            'profile.php',
            $now->getTimestamp() + max(0, (4 * 86400) - $secondsUntil)
        );
    }

    // Get appointment history for this customer
    if ($customerId > 0) {
        $stmt = $conn->prepare("
            SELECT booking_code, service_name, specialist_name, appointment_date, appointment_time, status, payment_status, created_at
            FROM appointments
            WHERE customer_id = ?
            ORDER BY created_at DESC, appointment_date DESC, appointment_time DESC
            LIMIT 6
        ");
        $stmt->execute([$customerId]);
    } else {
        $stmt = $conn->prepare("SELECT 1 WHERE 1=0");
        $stmt->execute();
    }

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $createdAt = notificationDateTime($row['created_at'] ?? null);
        $status = (string)($row['status'] ?? 'confirmed');
        $paymentStatus = (string)($row['payment_status'] ?? 'unpaid');
        $title = 'Appointment activity';
        $message = sprintf(
            'Appointment %s for %s with %s is currently marked as %s.',
            (string)($row['booking_code'] ?? ''),
            (string)($row['service_name'] ?? 'service'),
            (string)($row['specialist_name'] ?? 'specialist'),
            notificationStatusLabel($status)
        );

        if ($paymentStatus === 'paid') {
            $title = 'Payment recorded';
            $message .= ' The system has recorded the payment successfully.';
        } elseif ($status === 'pending') {
            $title = 'Appointment awaiting confirmation';
        }

        $items[] = buildNotificationItem(
            'patient-appointment-' . (string)($row['booking_code'] ?? uniqid('', true)),
            $title,
            $message,
            $createdAt,
            $paymentStatus === 'unpaid' && $status !== 'cancelled' ? 'medium' : 'low',
            $paymentStatus === 'paid' ? 'payments' : 'event_available',
            'profile.php'
        );
    }

    $stmt = $conn->prepare("
        SELECT tp.id, tp.title, tp.status, tp.updated_at
        FROM treatment_plans tp
        WHERE tp.customer_id = ?
        ORDER BY tp.updated_at DESC
        LIMIT 4
    ");
    $stmt->execute([$customerId]);

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $updatedAt = notificationDateTime($row['updated_at'] ?? null);
        $items[] = buildNotificationItem(
            'patient-plan-' . (string)($row['id'] ?? uniqid('', true)),
            'Treatment plan update',
            sprintf(
                'Treatment plan "%s" is currently %s.',
                (string)($row['title'] ?? 'Untitled plan'),
                (string)($row['status'] ?? 'active')
            ),
            $updatedAt,
            ($row['status'] ?? '') === 'active' ? 'medium' : 'low',
            'clinical_notes',
            'profile.php'
        );
    }

    $stmt = $conn->prepare("
        SELECT tp.id AS plan_id, tp.title, tps.id AS session_id, tps.session_number, tps.service_name, tps.completed_at
        FROM treatment_plan_sessions tps
        INNER JOIN treatment_plans tp ON tp.id = tps.plan_id
        WHERE tp.customer_id = ?
          AND tps.completed_at IS NOT NULL
        ORDER BY tps.completed_at DESC
        LIMIT 4
    ");
    $stmt->execute([$customerId]);

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $completedAt = notificationDateTime($row['completed_at'] ?? null);
        $items[] = buildNotificationItem(
            'patient-session-' . (string)($row['session_id'] ?? uniqid('', true)),
            'Treatment session completed',
            sprintf(
                'Session %d in treatment plan "%s" for %s has been updated.',
                (int)($row['session_number'] ?? 0),
                (string)($row['title'] ?? 'Untitled plan'),
                (string)($row['service_name'] ?? 'service')
            ),
            $completedAt,
            'medium',
            'task_alt',
            'profile.php'
        );
    }

    return $items;
}

function fetchAdminNotifications(PDO $conn): array
{
    $items = [];

    $stmt = $conn->query("
        SELECT id, booking_code, customer_name, service_name, appointment_date, appointment_time, created_at
        FROM appointments
        WHERE status = 'pending'
        ORDER BY created_at DESC, appointment_date ASC, appointment_time ASC
        LIMIT 5
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $createdAt = notificationDateTime($row['created_at'] ?? null);
        $items[] = buildNotificationItem(
            'admin-pending-' . (string)($row['id'] ?? uniqid('', true)),
            'Appointments pending confirmation',
            sprintf(
                'Booking %s for %s, %s on %s is waiting for staff review.',
                (string)($row['booking_code'] ?? ''),
                (string)($row['customer_name'] ?? 'customer'),
                (string)($row['service_name'] ?? 'service'),
                notificationDisplayDate(notificationDateTime($row['appointment_date'] ?? null, $row['appointment_time'] ?? null))
            ),
            $createdAt,
            'urgent',
            'pending_actions',
            'calendar.php'
        );
    }

    $stmt = $conn->query("
        SELECT id, booking_code, customer_name, service_name, appointment_time
        FROM appointments
        WHERE appointment_date = CURDATE()
          AND status NOT IN ('cancelled', 'no_show', 'completed')
        ORDER BY appointment_time ASC
        LIMIT 6
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $appointmentAt = notificationDateTime(date('Y-m-d'), $row['appointment_time'] ?? null);
        $items[] = buildNotificationItem(
            'admin-today-' . (string)($row['id'] ?? uniqid('', true)),
            'Today\'s schedule',
            sprintf(
                '%s is booked for %s at %s.',
                (string)($row['customer_name'] ?? 'Customer'),
                (string)($row['service_name'] ?? 'service'),
                $appointmentAt ? $appointmentAt->format('H:i') : '--:--'
            ),
            $appointmentAt,
            'high',
            'today',
            'calendar.php',
            $appointmentAt ? (time() + max(0, 86400 - abs($appointmentAt->getTimestamp() - time()))) : null
        );
    }

    $stmt = $conn->query("
        SELECT id, name, subject, status, created_at
        FROM feedback
        ORDER BY created_at DESC
        LIMIT 4
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $createdAt = notificationDateTime($row['created_at'] ?? null);
        $items[] = buildNotificationItem(
            'admin-contact-' . (string)($row['id'] ?? uniqid('', true)),
            ($row['status'] ?? '') === 'new' ? 'New customer inquiry' : 'Contact status updated',
            sprintf(
                '%s submitted "%s" and it is currently marked as %s.',
                (string)($row['name'] ?? 'Customer'),
                (string)($row['subject'] ?? 'No subject'),
                (string)($row['status'] ?? 'new')
            ),
            $createdAt,
            ($row['status'] ?? '') === 'new' ? 'high' : 'low',
            'mail',
            '#'
        );
    }

    $stmt = $conn->query("
        SELECT id, booking_code, customer_name, total_price, payment_status, confirmed_at, created_at
        FROM appointments
        WHERE payment_status = 'paid'
        ORDER BY COALESCE(confirmed_at, created_at) DESC
        LIMIT 4
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $eventAt = notificationDateTime($row['confirmed_at'] ?: $row['created_at']);
        $items[] = buildNotificationItem(
            'admin-payment-' . (string)($row['id'] ?? uniqid('', true)),
            'Payment recorded',
            sprintf(
                'Booking %s for %s has been paid: %s.',
                (string)($row['booking_code'] ?? ''),
                (string)($row['customer_name'] ?? 'customer'),
                (string)($row['total_price'] ?? '')
            ),
            $eventAt,
            'medium',
            'payments',
            'billing.php'
        );
    }

    $stmt = $conn->query("
        SELECT tp.id, tp.title, tp.status, tp.updated_at, c.Name
        FROM treatment_plans tp
        LEFT JOIN `Customer` c ON c.Customer_ID = tp.customer_id
        ORDER BY tp.updated_at DESC
        LIMIT 4
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $updatedAt = notificationDateTime($row['updated_at'] ?? null);
        $items[] = buildNotificationItem(
            'admin-plan-' . (string)($row['id'] ?? uniqid('', true)),
            'Treatment plan updated',
            sprintf(
                '%s has treatment plan "%s" in %s status.',
                (string)($row['Name'] ?? 'customer'),
                (string)($row['title'] ?? 'Untitled plan'),
                (string)($row['status'] ?? 'active')
            ),
            $updatedAt,
            'medium',
            'clinical_notes',
            'treatment_plans.php'
        );
    }

    return $items;
}

function fetchReceptionistNotifications(PDO $conn): array
{
    $items = [];

    $stmt = $conn->query("
        SELECT id, booking_code, customer_name, service_name, appointment_date, appointment_time, status
        FROM appointments
        WHERE status <> 'cancelled'
          AND appointment_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)
          AND status NOT IN ('cancelled', 'no_show', 'completed')
        ORDER BY appointment_date ASC, appointment_time ASC
        LIMIT 8
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $appointmentAt = notificationDateTime($row['appointment_date'] ?? null, $row['appointment_time'] ?? null);
        if (!$appointmentAt) {
            continue;
        }

        $items[] = buildNotificationItem(
            'reception-upcoming-' . (string)($row['id'] ?? uniqid('', true)),
            'Upcoming front desk arrival',
            sprintf(
                '%s is booked for %s at %s.',
                (string)($row['customer_name'] ?? 'Customer'),
                (string)($row['service_name'] ?? 'service'),
                $appointmentAt->format('d/m/Y H:i')
            ),
            $appointmentAt,
            'high',
            'event_upcoming',
            'calendar.php',
            time() + max(0, (2 * 86400) - max(0, $appointmentAt->getTimestamp() - time()))
        );
    }

    $stmt = $conn->query("
        SELECT id, booking_code, customer_name, total_price, appointment_date, payment_status, status, created_at
        FROM appointments
        WHERE status <> 'cancelled'
          AND payment_status = 'unpaid'
        ORDER BY appointment_date ASC, created_at DESC
        LIMIT 6
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $eventAt = notificationDateTime($row['created_at'] ?? null);
        $appointmentDate = notificationDateTime($row['appointment_date'] ?? null);
        $priority = 'medium';

        if ($appointmentDate) {
            $daysDiff = (int)$appointmentDate->diff(notificationNow())->format('%r%a');
            $priority = $daysDiff <= 0 ? 'urgent' : ($daysDiff <= 2 ? 'high' : 'medium');
        }

        $items[] = buildNotificationItem(
            'reception-payment-' . (string)($row['id'] ?? uniqid('', true)),
            'Payment follow-up needed',
            sprintf(
                'Booking %s for %s still has %s unpaid.',
                (string)($row['booking_code'] ?? ''),
                (string)($row['customer_name'] ?? 'customer'),
                (string)($row['total_price'] ?? '')
            ),
            $eventAt,
            $priority,
            'payments',
            'billing.php'
        );
    }

    $stmt = $conn->query("
        SELECT id, booking_code, customer_name, service_name, created_at
        FROM appointments
        ORDER BY created_at DESC
        LIMIT 5
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $createdAt = notificationDateTime($row['created_at'] ?? null);
        $items[] = buildNotificationItem(
            'reception-booking-' . (string)($row['id'] ?? uniqid('', true)),
            'New booking created',
            sprintf(
                '%s created booking %s for %s.',
                (string)($row['customer_name'] ?? 'Customer'),
                (string)($row['booking_code'] ?? ''),
                (string)($row['service_name'] ?? 'service')
            ),
            $createdAt,
            'medium',
            'add_alert',
            'calendar.php'
        );
    }

    return $items;
}

function fetchDoctorNotifications(PDO $conn): array
{
    $items = [];

    // Upcoming treatment sessions from treatment plans
    $stmt = $conn->prepare("
        SELECT 
            sched.id as schedule_id,
            sched.scheduled_date,
            sched.scheduled_time,
            tps.session_number,
            tps.service_name,
            tp.title as plan_title,
            c.Name as customer_name
        FROM treatment_session_schedules sched
        JOIN treatment_plan_sessions tps ON sched.plan_session_id = tps.id
        JOIN treatment_plans tp ON tps.plan_id = tp.id
        JOIN `Customer` c ON tp.customer_id = c.Customer_ID
        WHERE sched.status = 'scheduled'
          AND sched.scheduled_date >= CURDATE()
          AND sched.scheduled_date <= DATE_ADD(CURDATE(), INTERVAL 3 DAY)
        ORDER BY sched.scheduled_date ASC, sched.scheduled_time ASC
        LIMIT 6
    ");
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $sessionDateTime = notificationDateTime($row['scheduled_date'] ?? null, $row['scheduled_time'] ?? null);
        if (!$sessionDateTime) continue;
        
        $isToday = ($row['scheduled_date'] ?? '') === date('Y-m-d');
        
        $items[] = buildNotificationItem(
            'doctor-session-' . ($row['schedule_id'] ?? ''),
            $isToday ? 'Buổi điều trị hôm nay' : 'Nhắc lịch buổi điều trị',
            sprintf(
                'Buổi #%d (%s) của %s - %s vào lúc %s',
                (int)($row['session_number'] ?? 0),
                (string)($row['service_name'] ?? ''),
                (string)($row['customer_name'] ?? 'customer'),
                (string)($row['plan_title'] ?? ''),
                $sessionDateTime->format('H:i')
            ),
            $sessionDateTime,
            $isToday ? 'urgent' : 'high',
            'clinical_notes',
            'customers.php',
            $sessionDateTime->getTimestamp()
        );
    }

    // Regular appointments
    $stmt = $conn->query("
        SELECT id, customer_name, service_name, specialist_name, appointment_date, appointment_time, status
        FROM appointments
        WHERE status = 'confirmed'
          AND appointment_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 DAY)
        ORDER BY appointment_date ASC, appointment_time ASC
        LIMIT 8
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $appointmentAt = notificationDateTime($row['appointment_date'] ?? null, $row['appointment_time'] ?? null);
        if (!$appointmentAt) {
            continue;
        }

        $items[] = buildNotificationItem(
            'doctor-appointment-' . ($row['id'] ?? ''),
            'Upcoming consultation',
            sprintf(
                '%s is scheduled for %s on %s with %s.',
                (string)($row['customer_name'] ?? 'Customer'),
                (string)($row['service_name'] ?? 'service'),
                $appointmentAt->format('d/m/Y H:i'),
                (string)($row['specialist_name'] ?? 'specialist')
            ),
            $appointmentAt,
            'high',
            'medical_services',
            'calendar.php',
            time() + max(0, (3 * 86400) - max(0, $appointmentAt->getTimestamp() - time()))
        );
    }

    $stmt = $conn->query("
        SELECT tp.id, tp.title, tp.status, tp.updated_at, c.Name
        FROM treatment_plans tp
        LEFT JOIN `Customer` c ON c.Customer_ID = tp.customer_id
        WHERE tp.status <> 'cancelled'
        ORDER BY tp.updated_at DESC
        LIMIT 6
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $updatedAt = notificationDateTime($row['updated_at'] ?? null);
        $items[] = buildNotificationItem(
            'doctor-plan-' . (string)($row['id'] ?? uniqid('', true)),
            'Treatment plan needs review',
            sprintf(
                'Treatment plan "%s" for %s is currently %s.',
                (string)($row['title'] ?? 'Untitled plan'),
                (string)($row['Name'] ?? 'customer'),
                (string)($row['status'] ?? 'active')
            ),
            $updatedAt,
            ($row['status'] ?? '') === 'active' ? 'high' : 'medium',
            'clinical_notes',
            'treatment_plans.php'
        );
    }

    $stmt = $conn->query("
        SELECT sr.id, sr.created_at, sr.next_focus, c.Name, tp.title, tps.session_number, tps.service_name
        FROM session_records sr
        INNER JOIN treatment_plan_sessions tps ON tps.id = sr.plan_session_id
        INNER JOIN treatment_plans tp ON tp.id = tps.plan_id
        LEFT JOIN `Customer` c ON c.Customer_ID = tp.customer_id
        ORDER BY sr.created_at DESC
        LIMIT 5
    ");

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $createdAt = notificationDateTime($row['created_at'] ?? null);
        $nextFocus = trim((string)($row['next_focus'] ?? ''));
        if ($nextFocus === '') {
            $nextFocus = 'Follow-up notes were added and are ready for review.';
        }

        $items[] = buildNotificationItem(
            'doctor-session-record-' . (string)($row['id'] ?? uniqid('', true)),
            'New session record',
            sprintf(
                'Session %d for %s (%s) now includes: %s',
                (int)($row['session_number'] ?? 0),
                (string)($row['Name'] ?? 'customer'),
                (string)($row['service_name'] ?? 'service'),
                $nextFocus
            ),
            $createdAt,
            'medium',
            'description',
            'customers.php'
        );
    }

    return $items;
}

function getNotificationsPayload(PDO $conn, array $currentUser, int $limit = 12): array
{
    $role = (string)($currentUser['role'] ?? 'patient');

    if (function_exists('syncAllTreatmentPlanStatuses')) {
        syncAllTreatmentPlanStatuses($conn);
    }

    if ($role === 'admin') {
        $items = fetchAdminNotifications($conn);
    } elseif ($role === 'receptionist') {
        $items = fetchReceptionistNotifications($conn);
    } elseif ($role === 'doctor') {
        $items = fetchDoctorNotifications($conn);
    } else {
        $items = fetchPatientNotifications($conn, $currentUser);
    }

    $items = finalizeNotificationItems($items, $limit);
    $priorityCount = 0;

    foreach ($items as $item) {
        if (in_array((string)($item['priority'] ?? ''), ['urgent', 'high'], true)) {
            $priorityCount++;
        }
    }

    return [
        'role' => $role,
        'count' => count($items),
        'highlight_count' => $priorityCount,
        'notifications' => $items,
    ];
}
