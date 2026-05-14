<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || ($currentUser['role'] ?? '') !== 'doctor') {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'treatment_plans';

$cid = (int)($_GET['customer_id'] ?? 0);

if ($cid <= 0) {
    header('Location: customers.php');
    exit;
}

$stmt = $conn->prepare("SELECT Customer_ID, Name, Phone FROM `Customer` WHERE Customer_ID = ?");
$stmt->execute([$cid]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$customer) {
    header('Location: customers.php');
    exit;
}

$specialists = $conn->query("SELECT id, name FROM specialists ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
$services = $conn->query("SELECT id, name FROM services ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

// Get specialist name for appointment
$specialistName = '';
foreach ($specialists as $sp) {
    if ((int)$sp['id'] === $specialistId) {
        $specialistName = $sp['name'];
        break;
    }
}

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function getInitial(string $name): string
{
    $name = trim($name);

    if ($name === '') {
        return 'P';
    }

    if (function_exists('mb_substr')) {
        return mb_strtoupper(mb_substr($name, 0, 1, 'UTF-8'), 'UTF-8');
    }

    return strtoupper(substr($name, 0, 1));
}

$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $specialistId = (int)($_POST['specialist_id'] ?? 0);
    $goal = trim($_POST['overall_goal'] ?? '');
    $startDate = trim($_POST['start_date'] ?? '');
    $clinicalNotes = trim($_POST['clinical_notes'] ?? '');
    $selectedSessions = [];

    for ($i = 1; $i <= 6; $i++) {
        $serviceId = trim($_POST["service_id_$i"] ?? '');

        if ($serviceId === '') {
            continue;
        }

        $selectedSessions[] = [
            'index' => $i,
            'service_id' => $serviceId,
            'service_name' => trim($_POST["service_name_$i"] ?? ''),
            'focus' => trim($_POST["focus_$i"] ?? ''),
            'scheduled_date' => trim($_POST["scheduled_date_$i"] ?? ''),
            'scheduled_time' => trim($_POST["scheduled_time_$i"] ?? ''),
        ];
    }

    if ($title === '' || $specialistId <= 0 || $startDate === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $startDate)) {
        $err = 'Please complete title, specialist and start date.';
    } elseif (empty($selectedSessions)) {
        $err = 'Please add at least one treatment session.';
    } else {
        try {
            $stmt = $conn->prepare("SELECT id FROM treatment_plans WHERE customer_id = ? ORDER BY id DESC");
            $stmt->execute([$cid]);
            foreach ($stmt->fetchAll(PDO::FETCH_COLUMN) as $existingPlanId) {
                syncTreatmentPlanStatus($conn, (int)$existingPlanId);
            }
        } catch (Throwable $e) {
            // Ignore self-healing issues and rely on explicit check below.
        }

        try {
            $stmt = $conn->prepare("SELECT id FROM treatment_plans WHERE customer_id = ? AND status = 'active' ORDER BY id DESC LIMIT 1");
            $stmt->execute([$cid]);
            $activePlanId = (int)($stmt->fetchColumn() ?: 0);

            if ($activePlanId > 0) {
                $err = 'This customer already has an active treatment plan.';
            } else {
                $conn->beginTransaction();

                $stmt = $conn->prepare("
                    INSERT INTO treatment_plans (
                        customer_id,
                        title,
                        specialist_id,
                        overall_goal,
                        start_date,
                        clinical_notes,
                        status
                    )
                    VALUES (?, ?, ?, ?, ?, ?, 'active')
                ");

                $stmt->execute([
                    $cid,
                    $title,
                    $specialistId,
                    $goal,
                    $startDate,
                    $clinicalNotes,
                ]);

                $planId = (int)$conn->lastInsertId();

                foreach ($selectedSessions as $sessionData) {
                    $i = (int)$sessionData['index'];
                    $serviceId = $sessionData['service_id'];
                    $serviceName = $sessionData['service_name'];
                    $focus = $sessionData['focus'];
                    $scheduledDate = $sessionData['scheduled_date'];
                    $scheduledTime = $sessionData['scheduled_time'];
                    $sessionImagePath = null;

                    if ($serviceName === '') {
                        $stmt = $conn->prepare("SELECT name FROM services WHERE id = ?");
                        $stmt->execute([$serviceId]);
                        $serviceName = $stmt->fetchColumn() ?: $serviceId;
                    }

                    $beforeImagePath = null;
                    $afterImagePath = null;

                    if (
                        isset($_FILES["before_image_$i"]) &&
                        is_array($_FILES["before_image_$i"]) &&
                        ($_FILES["before_image_$i"]['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK
                    ) {
                        $tmp = $_FILES["before_image_$i"]['tmp_name'];
                        $original = $_FILES["before_image_$i"]['name'] ?? '';
                        $ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
    
                        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                            $uploadDir = __DIR__ . '/../uploads/treatment_sessions';
    
                            if (!is_dir($uploadDir)) {
                                @mkdir($uploadDir, 0775, true);
                            }
    
                            $filename = 'plan_' . $planId . '_session_' . $i . '_before_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                            $target = $uploadDir . '/' . $filename;
    
                            if (@move_uploaded_file($tmp, $target)) {
                                $beforeImagePath = 'uploads/treatment_sessions/' . $filename;
                            }
                        }
                    }

                    if (
                        isset($_FILES["after_image_$i"]) &&
                        is_array($_FILES["after_image_$i"]) &&
                        ($_FILES["after_image_$i"]['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK
                    ) {
                        $tmp = $_FILES["after_image_$i"]['tmp_name'];
                        $original = $_FILES["after_image_$i"]['name'] ?? '';
                        $ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
    
                        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                            $uploadDir = __DIR__ . '/../uploads/treatment_sessions';
    
                            if (!is_dir($uploadDir)) {
                                @mkdir($uploadDir, 0775, true);
                            }
    
                            $filename = 'plan_' . $planId . '_session_' . $i . '_after_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                            $target = $uploadDir . '/' . $filename;
    
                            if (@move_uploaded_file($tmp, $target)) {
                                $afterImagePath = 'uploads/treatment_sessions/' . $filename;
                            }
                        }
                    }
    
                    $stmt = $conn->prepare("
                        INSERT INTO treatment_plan_sessions (
                            plan_id,
                            session_number,
                            service_id,
                            service_name,
                            focus_notes,
                            before_image_path,
                            after_image_path
                        )
                        VALUES (?, ?, ?, ?, ?, ?, ?)
                    ");
    
                    $stmt->execute([
                        $planId,
                        $i,
                        $serviceId,
                        $serviceName,
                        $focus,
                        $beforeImagePath,
                        $afterImagePath,
                    ]);

                    $planSessionId = (int)$conn->lastInsertId();

                    // Create schedule and appointment if date/time provided
                    if ($scheduledDate && $scheduledTime && preg_match('/^\d{4}-\d{2}-\d{2}$/', $scheduledDate) && preg_match('/^\d{2}:\d{2}$/', $scheduledTime)) {
                        $stmt = $conn->prepare("SELECT name, price FROM services WHERE id = ?");
                        $stmt->execute([$serviceId]);
                        $service = $stmt->fetch();
                        $servicePrice = $service ? $service['price'] : '0';

                        $stmt = $conn->prepare("SELECT Name, Phone FROM Customer WHERE Customer_ID = ?");
                        $stmt->execute([$cid]);
                        $customer = $stmt->fetch();

                        // Get specialist name
                        $stmt = $conn->prepare("SELECT name FROM specialists WHERE id = ?");
                        $stmt->execute([$specialistId]);
                        $spName = $stmt->fetchColumn() ?: '';

                        $bookingCode = 'ELY-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

                        // Create appointment with customer_id for reliable matching
                        $stmt = $conn->prepare("
                            INSERT INTO appointments (
                                booking_code, customer_id, user_id, customer_name, customer_phone, service_id, service_name,
                                specialist_id, specialist_name, appointment_date, appointment_time,
                                total_price, status, payment_status, appointment_type, plan_session_id
                            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'confirmed', 'unpaid', 'treatment', ?)
                        ");
                        $stmt->execute([
                            $bookingCode,
                            $cid,           // customer_id
                            $cid,           // user_id (same as customer_id for customers)
                            $customer['Name'] ?? 'Unknown',
                            $customer['Phone'] ?? '',
                            $serviceId,
                            $serviceName,
                            $specialistId,
                            $spName,
                            $scheduledDate,
                            $scheduledTime,
                            $servicePrice,
                            $planSessionId
                        ]);
                        $appointmentId = $conn->lastInsertId();

                        // Create schedule
                        $stmt = $conn->prepare("
                            INSERT INTO treatment_session_schedules (plan_session_id, scheduled_date, scheduled_time, specialist_id, appointment_id)
                            VALUES (?, ?, ?, ?, ?)
                        ");
                        $stmt->execute([$planSessionId, $scheduledDate, $scheduledTime, $specialistId, $appointmentId]);
                    }
                }

                $conn->commit();
                
                // Create notification for the customer about their new treatment plan
                // Note: customer_id is required, user_id is optional (customers don't have users table entry)
                
                // Get specialist name
                $specialistStmt = $conn->prepare("SELECT name FROM specialists WHERE id = ?");
                $specialistStmt->execute([$specialistId]);
                $spName = $specialistStmt->fetchColumn() ?: 'Bác sĩ';
                
                // Get session count
                $sessionCount = count($selectedSessions);
                
                // Build notification message for plan creation
                $notificationMessage = "Bác sĩ $spName đã tạo kế hoạch điều trị \"$title\" cho bạn với $sessionCount buổi điều trị. Vui lòng kiểm tra profile để xem chi tiết.";
                
                // Create notification for the customer - using customer_id only (user_id is NULL for customers)
                $notifStmt = $conn->prepare("
                    INSERT INTO notifications (customer_id, type, title, message, priority, related_id, related_type)
                    VALUES (?, 'session', 'Kế hoạch điều trị mới được tạo', ?, 'high', ?, 'treatment_plan')
                ");
                $notifStmt->execute([
                    $cid,
                    $notificationMessage,
                    $planId
                ]);
                
                // Create detailed notifications for each scheduled session
                // These show exactly when each session will take place and are "sent" 1 day before
                foreach ($selectedSessions as $sessionData) {
                    if (!empty($sessionData['scheduled_date']) && !empty($sessionData['scheduled_time'])) {
                        $sessionNum = (int)$sessionData['index'];
                        $serviceName = $sessionData['service_name'];
                        $schedDate = $sessionData['scheduled_date'];
                        $schedTime = $sessionData['scheduled_time'];
                        
                        // Format date for display (e.g., "Thứ Hai, 20/05/2024")
                        $dayOfWeek = date('l', strtotime($schedDate));
                        $dayNames = [
                            'Monday' => 'Thứ Hai',
                            'Tuesday' => 'Thứ Ba', 
                            'Wednesday' => 'Thứ Tư',
                            'Thursday' => 'Thứ Năm',
                            'Friday' => 'Thứ Sáu',
                            'Saturday' => 'Thứ Bảy',
                            'Sunday' => 'Chủ Nhật'
                        ];
                        $dayName = $dayNames[$dayOfWeek] ?? $dayOfWeek;
                        $formattedDate = $dayName . ', ' . date('d/m/Y', strtotime($schedDate));
                        
                        // Calculate reminder date (1 day before appointment)
                        $reminderDate = date('Y-m-d H:i:s', strtotime($schedDate . ' ' . $schedTime . ' -1 day'));
                        
                        // Create notification for this session - using customer_id only
                        $sessionNotifStmt = $conn->prepare("
                            INSERT INTO notifications (customer_id, type, title, message, priority, related_id, related_type, created_at)
                            VALUES (?, 'session', 'Nhắc hẹn điều trị ngày mai', ?, 'high', ?, 'treatment_plan', ?)
                        ");
                        $sessionNotifStmt->execute([
                            $cid,
                            "📅 Hẹn buổi #$sessionNum ($serviceName) với bác sĩ $spName\n🕐 $schedTime - Ngày " . date('d/m/Y', strtotime($schedDate)) . " ($dayName)\n\nVui lòng đến đúng giờ!",
                            $planId,
                            $reminderDate
                        ]);
                    }
                }
                
                header('Location: customer_detail.php?id=' . $cid . '&tab=plan');
                exit;
            }
        } catch (Throwable $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }
            $err = 'Unable to create treatment plan.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create Treatment Plan | Elysian Management Hub</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0db9f2',
                        'primary-dark': '#0a9ad4'
                    },
                    boxShadow: {
                        soft: '0 18px 50px rgba(15, 23, 42, 0.08)',
                        glow: '0 18px 60px rgba(14, 165, 233, 0.18)'
                    }
                }
            }
        };
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
        }

        .session-scheduled {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0) !important;
            color: #065f46 !important;
        }
    </style>
</head>

<body class="h-screen bg-slate-50 text-slate-800 flex overflow-hidden">
    <?php include __DIR__ . '/_sidebar.php'; ?>

    <div class="flex min-w-0 flex-1 flex-col min-h-0">
        <?php
        $title = 'Create Treatment Plan';
        $subtitle = 'New patient pathway.';
        $backLink = 'customer_detail.php?id=' . $cid . '&tab=plan';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1380px] px-8 py-8">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Treatment Plan
                        </div>

                        <h2 class="text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                            Create treatment plan
                        </h2>
                    </div>

                    <a
                        href="customer_detail.php?id=<?= h($cid) ?>&tab=plan"
                        class="inline-flex h-11 items-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 shadow-sm transition hover:bg-slate-50"
                    >
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        Back
                    </a>
                </div>

                <?php if ($err !== ''): ?>
                    <div class="mb-5 rounded-2xl border border-rose-100 bg-rose-50 px-5 py-4 text-sm font-bold text-rose-700">
                        <?= h($err) ?>
                    </div>
                <?php endif; ?>

                <form method="post" enctype="multipart/form-data" class="grid gap-6 xl:grid-cols-[1fr_360px]">
                    <section class="space-y-5">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                    <span class="material-symbols-outlined text-[22px]">clinical_notes</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Plan details</h3>
                                    <p class="text-sm font-medium text-slate-500">Required fields are marked with *.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-5 p-6 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Title <span class="text-sky-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="title"
                                        required
                                        value="<?= h($_POST['title'] ?? '') ?>"
                                        placeholder="e.g. Acne Recovery Plan"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Lead Specialist <span class="text-sky-500">*</span>
                                    </label>
                                    <select
                                        name="specialist_id"
                                        required
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    >
                                        <option value="">Select specialist</option>
                                        <?php foreach ($specialists as $specialist): ?>
                                            <option
                                                value="<?= h((int)$specialist['id']) ?>"
                                                <?= (int)($_POST['specialist_id'] ?? 0) === (int)$specialist['id'] ? 'selected' : '' ?>
                                            >
                                                <?= h($specialist['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Start Date <span class="text-sky-500">*</span>
                                    </label>
                                    <input
                                        type="date"
                                        name="start_date"
                                        required
                                        value="<?= h($_POST['start_date'] ?? date('Y-m-d')) ?>"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Goal
                                    </label>
                                    <input
                                        type="text"
                                        name="overall_goal"
                                        value="<?= h($_POST['overall_goal'] ?? '') ?>"
                                        placeholder="Main treatment goal"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>

                                <div class="lg:col-span-2">
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Clinical Notes
                                    </label>
                                    <textarea
                                        name="clinical_notes"
                                        rows="3"
                                        placeholder="Assessment notes"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    ><?= h($_POST['clinical_notes'] ?? '') ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                        <span class="material-symbols-outlined text-[22px]">timeline</span>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-black tracking-tight text-slate-950">Sessions</h3>
                                        <p class="text-sm font-medium text-slate-500">Add up to 6 sessions.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3 p-6">
                                <div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4">
                                    <div class="mb-3 flex items-center justify-between">
                                        <p class="text-xs font-black uppercase tracking-wide text-slate-500">
                                            Schedule automatically generates appointments
                                        </p>
                                    </div>
                                </div>
                                <?php for ($i = 1; $i <= 6; $i++): ?>
                                    <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-4">
                                        <div class="mb-3 flex items-center gap-2">
                                            <span class="flex h-7 w-7 items-center justify-center rounded-xl bg-slate-800 text-xs font-black text-white">
                                                <?= h($i) ?>
                                            </span>
                                            <p class="text-sm font-black text-slate-600">Session <?= h($i) ?></p>
                                        </div>
                                        <div class="grid grid-cols-1 gap-3 lg:grid-cols-[1fr_1fr_1.25fr_100px_120px_100px] lg:items-end">
                                            <div>
                                                <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                    Service
                                                </label>
                                                <select
                                                    name="service_id_<?= h($i) ?>"
                                                    onchange="updateSessionName(this, <?= h($i) ?>)"
                                                    class="h-11 w-full rounded-2xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:ring-4 focus:ring-sky-100"
                                                >
                                                    <option value="">Skip</option>
                                                    <?php foreach ($services as $service): ?>
                                                        <option
                                                            value="<?= h($service['id']) ?>"
                                                            <?= ($_POST["service_id_$i"] ?? '') === (string)$service['id'] ? 'selected' : '' ?>
                                                        >
                                                            <?= h($service['name']) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                    Date
                                                </label>
                                                <input
                                                    type="date"
                                                    name="scheduled_date_<?= h($i) ?>"
                                                    value="<?= h($_POST["scheduled_date_$i"] ?? '') ?>"
                                                    min="<?= date('Y-m-d') ?>"
                                                    class="h-11 w-full rounded-2xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:ring-4 focus:ring-sky-100"
                                                />
                                            </div>

                                            <div>
                                                <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                    Time
                                                </label>
                                                <input
                                                    type="time"
                                                    name="scheduled_time_<?= h($i) ?>"
                                                    value="<?= h($_POST["scheduled_time_$i"] ?? '') ?>"
                                                    class="h-11 w-full rounded-2xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:ring-4 focus:ring-sky-100"
                                                />
                                            </div>

                                            <div>
                                                <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                    Focus
                                                </label>
                                                <input
                                                    type="text"
                                                    name="focus_<?= h($i) ?>"
                                                    value="<?= h($_POST["focus_$i"] ?? '') ?>"
                                                    placeholder="Focus"
                                                    class="h-11 w-full rounded-2xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:ring-4 focus:ring-sky-100"
                                                />
                                            </div>

                                            <div>
                                                <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                    Before Image
                                                </label>
                                                <input
                                                    type="file"
                                                    name="before_image_<?= h($i) ?>"
                                                    accept=".jpg,.jpeg,.png,.webp,image/*"
                                                    class="block h-11 w-full rounded-2xl border border-slate-200 bg-white px-2 py-2 text-[11px] font-semibold text-slate-500 file:mr-2 file:rounded-full file:border-0 file:bg-sky-50 file:px-2 file:py-1 file:text-[10px] file:font-black file:text-sky-600"
                                                />
                                            </div>

                                            <div>
                                                <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                    After Image
                                                </label>
                                                <input
                                                    type="file"
                                                    name="after_image_<?= h($i) ?>"
                                                    accept=".jpg,.jpeg,.png,.webp,image/*"
                                                    class="block h-11 w-full rounded-2xl border border-slate-200 bg-white px-2 py-2 text-[11px] font-semibold text-slate-500 file:mr-2 file:rounded-full file:border-0 file:bg-emerald-50 file:px-2 file:py-1 file:text-[10px] file:font-black file:text-emerald-600"
                                                />
                                            </div>

                                            <div>
                                                <div id="status_<?= h($i) ?>" class="flex h-11 items-center justify-center rounded-2xl bg-emerald-50 text-xs font-black text-emerald-600">
                                                    Pending
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </section>

                    <aside class="xl:sticky xl:top-6 h-fit">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="relative overflow-hidden bg-slate-950 p-6 text-white">
                                <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-sky-400/25 blur-3xl"></div>
                                <div class="relative">
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-sky-300">Patient</p>
                                    <h3 class="mt-3 text-2xl font-black tracking-tight">Plan summary</h3>
                                </div>
                            </div>

                            <div class="space-y-3 p-5">
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                            <?= h(getInitial($customer['Name'] ?? '')) ?>
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate text-base font-black text-slate-900">
                                                <?= h($customer['Name'] ?? 'Unknown') ?>
                                            </p>
                                            <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                #ELC<?= h(str_pad((string)$customer['Customer_ID'], 5, '0', STR_PAD_LEFT)) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-2xl bg-sky-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-sky-500">Phone</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h($customer['Phone'] ?: '—') ?>
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-emerald-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-emerald-600">Status</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        Active after creation
                                    </p>
                                </div>

                                <div class="grid gap-3 pt-2">
                                    <button
                                        type="submit"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                                    >
                                        <span class="material-symbols-outlined text-[19px]">add_circle</span>
                                        Create Plan
                                    </button>

                                    <a
                                        href="customer_detail.php?id=<?= h($cid) ?>&tab=plan"
                                        class="inline-flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                                    >
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
