<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

// Chặn Doctor truy cập Dashboard
if (($currentUser['role'] ?? '') === 'doctor') {
    header('Location: customers.php'); // Chuyển hướng bác sĩ sang trang Khách hàng
    exit;
}

$currentPage = 'dashboard';
$userRole = $currentUser['role'] ?? 'admin';
$isReceptionist = $userRole === 'receptionist';
$isDoctor = $userRole === 'doctor';

$today = date('Y-m-d');
$monthStart = date('Y-m-01');
$monthEnd = date('Y-m-t');

$stmt = $conn->prepare("
    SELECT 
        id,
        booking_code,
        customer_name,
        customer_phone,
        service_name,
        specialist_name,
        appointment_time,
        status,
        payment_status,
        total_price
    FROM appointments 
    WHERE appointment_date = ? 
      AND status != 'cancelled'
    ORDER BY appointment_time ASC
");
$stmt->execute([$today]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pendingCount = 0;
$confirmedCount = 0;
$paidTodayCount = 0;
$unpaidTodayCount = 0;

foreach ($appointments as $appointment) {
    if (($appointment['status'] ?? '') === 'pending') {
        $pendingCount++;
    }

    if (($appointment['status'] ?? '') === 'confirmed') {
        $confirmedCount++;
    }

    if (($appointment['payment_status'] ?? '') === 'paid') {
        $paidTodayCount++;
    } else {
        $unpaidTodayCount++;
    }
}

$stmt = $conn->prepare("
    SELECT total_price 
    FROM appointments 
    WHERE appointment_date = ? 
      AND status != 'cancelled' 
      AND payment_status = 'paid'
");
$stmt->execute([$today]);
$prices = $stmt->fetchAll(PDO::FETCH_COLUMN);

$revenueToday = 0;

foreach ($prices as $price) {
    $number = preg_replace('/[^0-9]/', '', $price ?? '');

    if ($number !== '') {
        $revenueToday += (int)$number;
    }
}

$stmt = $conn->prepare("
    SELECT total_price 
    FROM appointments 
    WHERE appointment_date = ? 
      AND status != 'cancelled' 
      AND (payment_status = 'unpaid' OR payment_status IS NULL)
");
$stmt->execute([$today]);
$pendingPrices = $stmt->fetchAll(PDO::FETCH_COLUMN);

$pendingTodayAmount = 0;

foreach ($pendingPrices as $price) {
    $number = preg_replace('/[^0-9]/', '', $price ?? '');

    if ($number !== '') {
        $pendingTodayAmount += (int)$number;
    }
}

$stmt = $conn->prepare("
    SELECT total_price 
    FROM appointments 
    WHERE appointment_date BETWEEN ? AND ?
      AND status != 'cancelled' 
      AND payment_status = 'paid'
");
$stmt->execute([$monthStart, $monthEnd]);
$monthPrices = $stmt->fetchAll(PDO::FETCH_COLUMN);

$revenueThisMonth = 0;

foreach ($monthPrices as $price) {
    $number = preg_replace('/[^0-9]/', '', $price ?? '');

    if ($number !== '') {
        $revenueThisMonth += (int)$number;
    }
}

$stmt = $conn->prepare("
    SELECT COUNT(*) 
    FROM appointments 
    WHERE appointment_date BETWEEN ? AND ? 
      AND status != 'cancelled'
");
$stmt->execute([$monthStart, $monthEnd]);
$monthAppointmentCount = (int)$stmt->fetchColumn();

$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY id");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
$specialistCount = count($specialists);

$slotsPerSpecialist = 12;
$totalSlots = $specialistCount * $slotsPerSpecialist;
$occupancyRate = $totalSlots > 0 ? min(100, (int)round((count($appointments) / $totalSlots) * 100)) : 0;

$appointmentsBySpecialist = [];

foreach ($appointments as $appointment) {
    $name = $appointment['specialist_name'] ?? '';

    if ($name === '') {
        continue;
    }

    if (!isset($appointmentsBySpecialist[$name])) {
        $appointmentsBySpecialist[$name] = 0;
    }

    $appointmentsBySpecialist[$name]++;
}

$stmt = $conn->query("
    SELECT 
        a.booking_code,
        a.customer_name,
        a.payment_status,
        a.status,
        a.confirmed_at,
        a.created_at,
        a.service_name
    FROM appointments a
    WHERE a.status != 'cancelled'
    ORDER BY COALESCE(a.confirmed_at, a.created_at) DESC
    LIMIT 8
");
$recentActivities = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->query("
    SELECT 
        Customer_ID,
        Name,
        Phone,
        Email,
        Skin_type,
        Created_at 
    FROM `Customer` 
    ORDER BY Created_at DESC 
    LIMIT 8
");
$recentCustomers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$appointmentsByCustomer = [];

$stmt = $conn->query("
    SELECT 
        customer_name,
        customer_phone,
        appointment_date,
        total_price 
    FROM appointments 
    WHERE status != 'cancelled'
");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $key = ($row['customer_name'] ?? '') . '|' . ($row['customer_phone'] ?? '');

    if (!isset($appointmentsByCustomer[$key])) {
        $appointmentsByCustomer[$key] = [
            'last_visit' => null,
            'total_spent' => 0,
            'visits' => 0,
        ];
    }

    $appointmentDate = $row['appointment_date'] ?? null;

    if (!$appointmentsByCustomer[$key]['last_visit'] || $appointmentDate > $appointmentsByCustomer[$key]['last_visit']) {
        $appointmentsByCustomer[$key]['last_visit'] = $appointmentDate;
    }

    $appointmentsByCustomer[$key]['visits']++;

    $number = preg_replace('/[^0-9]/', '', $row['total_price'] ?? '');

    if ($number !== '') {
        $appointmentsByCustomer[$key]['total_spent'] += (int)$number;
    }
}

foreach ($recentCustomers as &$customer) {
    $name = $customer['Name'] ?? '';
    $phone = $customer['Phone'] ?? '';

    $key1 = $name . '|' . $phone;
    $key2 = $name . '|';
    $key3 = '|' . $phone;

    $stats = $appointmentsByCustomer[$key1]
        ?? $appointmentsByCustomer[$key2]
        ?? $appointmentsByCustomer[$key3]
        ?? [
            'last_visit' => null,
            'total_spent' => 0,
            'visits' => 0,
        ];

    $customer['last_visit'] = $stats['last_visit'];
    $customer['total_spent'] = $stats['total_spent'];
    $customer['visit_count'] = $stats['visits'];
}
unset($customer);

$totalCustomers = (int)$conn->query("SELECT COUNT(*) FROM `Customer`")->fetchColumn();

$stmt = $conn->prepare("SELECT COUNT(*) FROM `Customer` WHERE Created_at >= ?");
$stmt->execute([$monthStart]);
$newCustomersThisMonth = (int)$stmt->fetchColumn();

$stmt = $conn->prepare("
    SELECT COUNT(DISTINCT CONCAT(customer_name, '|', customer_phone))
    FROM appointments 
    WHERE appointment_date >= ?
      AND status != 'cancelled'
");
$stmt->execute([date('Y-m-d', strtotime('-30 days'))]);
$activeCustomers = (int)$stmt->fetchColumn();

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function formatTime($time): string
{
    if (!is_string($time) || trim($time) === '') {
        return '—';
    }

    if (preg_match('/^(\d{2}):(\d{2})/', $time, $matches)) {
        $hour = (int)$matches[1];
        $minute = $matches[2];
        $period = $hour >= 12 ? 'PM' : 'AM';
        $hour12 = $hour > 12 ? $hour - 12 : ($hour === 0 ? 12 : $hour);

        return sprintf('%d:%s %s', $hour12, $minute, $period);
    }

    return $time;
}

function formatDate($date): string
{
    if (!$date) {
        return '—';
    }

    return date('M j, Y', strtotime((string)$date));
}

function formatMoney($value): string
{
    return number_format((int)$value, 0, ',', '.') . ' VND';
}

function getInitial(string $name): string
{
    $name = trim($name);

    if ($name === '') {
        return 'C';
    }

    if (function_exists('mb_substr')) {
        return mb_strtoupper(mb_substr($name, 0, 1, 'UTF-8'), 'UTF-8');
    }

    return strtoupper(substr($name, 0, 1));
}

function statusBadgeClass(string $status): string
{
    if ($status === 'checked_in') {
        return 'bg-cyan-50 text-cyan-700 ring-cyan-100';
    }

    if ($status === 'completed') {
        return 'bg-sky-50 text-sky-700 ring-sky-100';
    }

    if ($status === 'confirmed') {
        return 'bg-emerald-50 text-emerald-700 ring-emerald-100';
    }

    if ($status === 'pending') {
        return 'bg-amber-50 text-amber-700 ring-amber-100';
    }

    if ($status === 'no_show') {
        return 'bg-rose-50 text-rose-700 ring-rose-100';
    }

    return 'bg-slate-100 text-slate-600 ring-slate-200';
}

function appointmentStatusLabel(string $status): string
{
    $labels = [
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'checked_in' => 'Checked in',
        'completed' => 'Completed',
        'no_show' => 'No-show',
        'cancelled' => 'Cancelled',
    ];

    return $labels[$status] ?? ucfirst(str_replace('_', ' ', $status));
}

function paymentBadgeClass(string $status): string
{
    if ($status === 'paid') {
        return 'bg-emerald-50 text-emerald-700 ring-emerald-100';
    }

    return 'bg-amber-50 text-amber-700 ring-amber-100';
}

function skinBadgeClass(string $skinType): string
{
    $skin = strtoupper(trim($skinType));

    if ($skin === 'OILY') {
        return 'bg-amber-50 text-amber-700 ring-amber-100';
    }

    if ($skin === 'DRY') {
        return 'bg-sky-50 text-sky-700 ring-sky-100';
    }

    if ($skin === 'SENSITIVE') {
        return 'bg-rose-50 text-rose-700 ring-rose-100';
    }

    if ($skin === 'COMBINATION') {
        return 'bg-emerald-50 text-emerald-700 ring-emerald-100';
    }

    if ($skin === 'NORMAL') {
        return 'bg-violet-50 text-violet-700 ring-violet-100';
    }

    return 'bg-slate-100 text-slate-600 ring-slate-200';
}

$reportDate = date('l, F j, Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard | Elysian Management Hub</title>

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
    </style>
</head>

<body class="h-screen bg-slate-50 text-slate-800 flex overflow-hidden">
    <?php include __DIR__ . '/_sidebar.php'; ?>

    <div class="flex min-w-0 flex-1 flex-col min-h-0">
        <?php
        $title = 'Dashboard';
        $subtitle = 'Clinic operations, appointments and customer activity.';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1500px] px-8 py-8">
                <section class="relative mb-7 overflow-hidden rounded-[2rem] border border-sky-100 bg-white shadow-soft">
                    <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-cyan-100/80 blur-3xl"></div>
                    <div class="pointer-events-none absolute -left-24 bottom-0 h-64 w-64 rounded-full bg-sky-100/80 blur-3xl"></div>

                    <div class="relative grid gap-6 p-7 xl:grid-cols-[1.15fr_0.85fr] xl:items-center">
                        <div>
                            <div class="mb-4 flex flex-wrap items-center gap-3">
                                <div class="inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                                    <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                    Management hub
                                </div>

                                <div class="inline-flex items-center gap-2 rounded-full bg-white/85 px-3 py-1.5 text-xs font-bold text-slate-400 ring-1 ring-slate-100">
                                    <span>Dashboard</span>
                                    <span class="material-symbols-outlined text-[15px]">chevron_right</span>
                                    <span class="text-slate-600">Daily Overview</span>
                                </div>
                            </div>

                            <h2 class="max-w-4xl text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                                Clinic dashboard for today’s appointments, payments and customer activity.
                            </h2>

                            <p class="mt-3 max-w-2xl text-base font-medium leading-relaxed text-slate-500">
                                <?= h($reportDate) ?> · <?= h(count($appointments)) ?> appointments scheduled today.
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] border border-white/80 bg-white/85 p-4 shadow-sm backdrop-blur">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Today schedule</p>
                                <p class="mt-2 text-3xl font-black tracking-tight text-slate-900"><?= h(count($appointments)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-400"><?= h($confirmedCount) ?> confirmed · <?= h($pendingCount) ?> pending</p>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/80 bg-slate-950 p-4 text-white shadow-glow">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/50">Today revenue</p>
                                <p class="mt-2 text-2xl font-black tracking-tight"><?= h(formatMoney($revenueToday)) ?></p>
                                <p class="text-sm font-semibold text-white/55"><?= h($paidTodayCount) ?> paid · <?= h($unpaidTodayCount) ?> unpaid</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-7 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-5">
                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Today bookings</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h(count($appointments)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($pendingCount) ?> pending</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[24px]">event_available</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-emerald-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Paid today</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatMoney($revenueToday)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($paidTodayCount) ?> paid appointments</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <span class="material-symbols-outlined text-[24px]">payments</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-amber-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Pending payment</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatMoney($pendingTodayAmount)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($unpaidTodayCount) ?> unpaid today</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <span class="material-symbols-outlined text-[24px]">receipt_long</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-violet-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Occupancy</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($occupancyRate) ?>%</p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($totalSlots) ?> estimated slots</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <span class="material-symbols-outlined text-[24px]">groups</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-cyan-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Customers</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($totalCustomers) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($newCustomersThisMonth) ?> new this month</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-cyan-50 text-cyan-600">
                                <span class="material-symbols-outlined text-[24px]">people</span>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="mb-6 grid gap-6 xl:grid-cols-[1.45fr_0.9fr]">
                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                            <div>
                                <h3 class="text-2xl font-black tracking-tight text-slate-950">Today’s Appointments</h3>
                                <p class="mt-1 text-sm font-medium text-slate-500">Appointments scheduled for <?= h(formatDate($today)) ?>.</p>
                            </div>

                            <a
                                href="calendar.php"
                                class="inline-flex h-10 items-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-xs font-black text-slate-600 transition hover:bg-sky-50 hover:text-sky-600"
                            >
                                View Schedule
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[900px] text-left text-sm">
                                <thead>
                                    <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                        <th class="px-6 py-4">Patient</th>
                                        <th class="px-6 py-4">Time</th>
                                        <th class="px-6 py-4">Treatment</th>
                                        <th class="px-6 py-4">Specialist</th>
                                        <th class="px-6 py-4">Status</th>
                                        <th class="px-6 py-4">Payment</th>
                                        <th class="px-6 py-4 text-right">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-slate-100">
                                    <?php if (empty($appointments)): ?>
                                        <tr>
                                            <td colspan="7" class="px-6 py-16 text-center">
                                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-sky-500">
                                                    <span class="material-symbols-outlined text-[30px]">event_busy</span>
                                                </div>
                                                <h4 class="mt-4 text-lg font-black text-slate-900">No appointments today</h4>
                                                <p class="mt-1 text-sm font-medium text-slate-500">New bookings will appear here automatically.</p>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($appointments as $appointment): ?>
                                            <?php
                                            $status = $appointment['status'] ?? 'pending';
                                            $paymentStatus = $appointment['payment_status'] ?? 'unpaid';
                                            $patientName = $appointment['customer_name'] ?? 'Customer';
                                            $specialistName = $appointment['specialist_name'] ?? 'Specialist';
                                            $canCheckIn = $status === 'confirmed';
                                            $canEdit = !in_array($status, ['cancelled', 'completed', 'no_show'], true);
                                            ?>
                                            <tr class="group transition hover:bg-sky-50/35">
                                                <td class="px-6 py-5">
                                                    <div class="flex items-center gap-3">
                                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                                            <?= h(getInitial($patientName)) ?>
                                                        </div>
                                                        <div class="min-w-0">
                                                            <p class="max-w-[190px] truncate font-black text-slate-900"><?= h($patientName) ?></p>
                                                            <p class="mt-0.5 truncate text-xs font-semibold text-slate-400"><?= h($appointment['booking_code'] ?? '—') ?></p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-50 px-3 py-1.5 text-xs font-black text-slate-600 ring-1 ring-slate-200">
                                                        <span class="material-symbols-outlined text-[15px]">schedule</span>
                                                        <?= h(formatTime($appointment['appointment_time'] ?? '')) ?>
                                                    </span>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <p class="max-w-[220px] truncate font-bold text-slate-700"><?= h($appointment['service_name'] ?? '—') ?></p>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-slate-50 text-xs font-black text-slate-500 ring-1 ring-slate-200">
                                                            <?= h(getInitial($specialistName)) ?>
                                                        </div>
                                                        <span class="max-w-[160px] truncate font-bold text-slate-700"><?= h($specialistName) ?></span>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <span class="inline-flex items-center rounded-full px-3 py-1.5 text-xs font-black uppercase ring-1 <?= h(statusBadgeClass($status)) ?>">
                                                        <?= h(appointmentStatusLabel($status)) ?>
                                                    </span>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <span class="inline-flex items-center rounded-full px-3 py-1.5 text-xs font-black uppercase ring-1 <?= h(paymentBadgeClass($paymentStatus)) ?>">
                                                        <?= h($paymentStatus === 'paid' ? 'Paid' : 'Unpaid') ?>
                                                    </span>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <div class="flex justify-end gap-2">
                                                        <?php if ($canCheckIn): ?>
                                                            <form action="../backend/mark_appointment_arrived.php" method="post">
                                                                <input type="hidden" name="id" value="<?= h((int)$appointment['id']) ?>"/>
                                                                <input type="hidden" name="redirect" value="index.php"/>
                                                                <button
                                                                    type="submit"
                                                                    class="inline-flex h-9 items-center gap-1.5 rounded-full bg-cyan-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-cyan-600"
                                                                >
                                                                    Check in
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>

                                                        <?php if ($canEdit): ?>
                                                            <a
                                                                href="edit_appointment.php?id=<?= h((int)$appointment['id']) ?>"
                                                                class="inline-flex h-9 items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 text-xs font-black text-slate-600 transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-600"
                                                            >
                                                                Edit
                                                            </a>
                                                        <?php endif; ?>

                                                        <?php if ($isReceptionist): ?>
                                                            <a
                                                                href="billing.php?booking=<?= urlencode($appointment['booking_code'] ?? '') ?>"
                                                                class="inline-flex h-9 items-center gap-1.5 rounded-full bg-sky-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-sky-600"
                                                            >
                                                                Billing
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="border-b border-slate-100 px-6 py-5">
                                <h3 class="text-xl font-black tracking-tight text-slate-950">Payment Summary</h3>
                                <p class="mt-1 text-sm font-medium text-slate-500">Collected and pending payments today.</p>
                            </div>

                            <div class="space-y-3 p-5">
                                <div class="rounded-2xl bg-slate-950 p-5 text-white">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-white/45">Collected today</p>
                                    <p class="mt-3 text-2xl font-black tracking-tight"><?= h(formatMoney($revenueToday)) ?></p>
                                    <p class="mt-1 text-sm font-semibold text-white/50"><?= h($paidTodayCount) ?> paid appointments</p>
                                </div>

                                <div class="rounded-2xl bg-amber-50 p-5">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-amber-600">Pending today</p>
                                    <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatMoney($pendingTodayAmount)) ?></p>
                                    <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($unpaidTodayCount) ?> unpaid appointments</p>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="border-b border-slate-100 px-6 py-5">
                                <h3 class="text-xl font-black tracking-tight text-slate-950">Recent Activity</h3>
                                <p class="mt-1 text-sm font-medium text-slate-500">Latest appointment and payment updates.</p>
                            </div>

                            <div class="space-y-3 p-5">
                                <?php if (empty($recentActivities)): ?>
                                    <div class="rounded-2xl bg-slate-50 p-4 text-sm font-bold text-slate-500">
                                        No recent activity.
                                    </div>
                                <?php else: ?>
                                    <?php foreach (array_slice($recentActivities, 0, 5) as $activity): ?>
                                        <?php
                                        $isPaid = ($activity['payment_status'] ?? '') === 'paid';
                                        $icon = $isPaid ? 'check_circle' : 'event';
                                        $iconClass = $isPaid ? 'bg-emerald-50 text-emerald-600' : 'bg-sky-50 text-sky-600';
                                        $when = $activity['confirmed_at'] ?? $activity['created_at'] ?? null;
                                        $whenLabel = $when ? date('M j, g:i A', strtotime((string)$when)) : '—';
                                        ?>
                                        <div class="flex items-start gap-3 rounded-2xl bg-slate-50 p-4">
                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl <?= h($iconClass) ?>">
                                                <span class="material-symbols-outlined text-[20px]"><?= h($icon) ?></span>
                                            </div>

                                            <div class="min-w-0">
                                                <p class="text-sm font-black text-slate-800">
                                                    <?= $isPaid ? 'Payment received' : 'Appointment updated' ?>
                                                </p>
                                                <p class="mt-0.5 truncate text-sm font-semibold text-slate-500">
                                                    <?= h($activity['customer_name'] ?? 'Customer') ?> · <?= h($activity['service_name'] ?? 'Service') ?>
                                                </p>
                                                <p class="mt-1 text-xs font-bold text-slate-400"><?= h($whenLabel) ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-6 overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Specialist Availability</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">Today’s appointment load by specialist.</p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            <?= h($specialistCount) ?> specialists
                        </div>
                    </div>

                    <div class="grid gap-4 p-5 md:grid-cols-2 xl:grid-cols-4">
                        <?php if (empty($specialists)): ?>
                            <div class="rounded-2xl bg-slate-50 p-4 text-sm font-bold text-slate-500">
                                No specialists found.
                            </div>
                        <?php else: ?>
                            <?php foreach ($specialists as $specialist): ?>
                                <?php
                                $name = $specialist['name'] ?? 'Specialist';
                                $assignedCount = $appointmentsBySpecialist[$name] ?? 0;
                                $statusText = $assignedCount > 0 ? $assignedCount . ' appointments today' : 'No appointments today';
                                ?>
                                <div class="rounded-[1.5rem] border border-slate-200 bg-white p-4 shadow-sm">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                            <?= h(getInitial($name)) ?>
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate font-black text-slate-900"><?= h($name) ?></p>
                                            <p class="mt-0.5 truncate text-xs font-semibold text-slate-400"><?= h($specialist['title'] ?? 'Specialist') ?></p>
                                        </div>
                                    </div>

                                    <div class="mt-4 rounded-2xl <?= $assignedCount > 0 ? 'bg-amber-50 text-amber-700' : 'bg-emerald-50 text-emerald-700' ?> px-3 py-2 text-xs font-black">
                                        <?= h($statusText) ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </section>

                <section class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Recent Customer Profiles</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">Latest customer records and visit information.</p>
                        </div>

                        <a
                            href="customers.php"
                            class="inline-flex h-10 items-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-xs font-black text-slate-600 transition hover:bg-sky-50 hover:text-sky-600"
                        >
                            View All
                            <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1050px] text-left text-sm">
                            <thead>
                                <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                    <th class="px-6 py-4">PID</th>
                                    <th class="px-6 py-4">Full Name</th>
                                    <th class="px-6 py-4">Phone Number</th>
                                    <th class="px-6 py-4">Skin Type</th>
                                    <th class="px-6 py-4">Last Visit</th>
                                    <th class="px-6 py-4">Total Spent</th>
                                    <th class="px-6 py-4 text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                <?php if (empty($recentCustomers)): ?>
                                    <tr>
                                        <td colspan="7" class="px-6 py-16 text-center">
                                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-sky-500">
                                                <span class="material-symbols-outlined text-[30px]">person_search</span>
                                            </div>
                                            <h4 class="mt-4 text-lg font-black text-slate-900">No customer profiles found</h4>
                                            <p class="mt-1 text-sm font-medium text-slate-500">New customer profiles will appear here.</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($recentCustomers as $customer): ?>
                                        <?php
                                        $skinType = trim($customer['Skin_type'] ?? '');
                                        $customerName = $customer['Name'] ?? 'Customer';
                                        ?>
                                        <tr class="group transition hover:bg-sky-50/35">
                                            <td class="px-6 py-5">
                                                <p class="font-mono text-sm font-black text-slate-800">
                                                    #ELC<?= h(str_pad((string)$customer['Customer_ID'], 5, '0', STR_PAD_LEFT)) ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                                        <?= h(getInitial($customerName)) ?>
                                                    </div>

                                                    <div class="min-w-0">
                                                        <p class="max-w-[220px] truncate font-black text-slate-900"><?= h($customerName) ?></p>
                                                        <p class="mt-0.5 max-w-[220px] truncate text-xs font-semibold text-slate-400"><?= h($customer['Email'] ?? 'No email') ?></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-5">
                                                <p class="font-bold text-slate-700"><?= h($customer['Phone'] ?: '—') ?></p>
                                            </td>

                                            <td class="px-6 py-5">
                                                <span class="inline-flex items-center rounded-full px-3 py-1.5 text-xs font-black ring-1 <?= h(skinBadgeClass($skinType)) ?>">
                                                    <?= h($skinType !== '' ? $skinType : '—') ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5">
                                                <p class="font-bold text-slate-700"><?= h(formatDate($customer['last_visit'] ?? null)) ?></p>
                                                <p class="mt-0.5 text-xs font-semibold text-slate-400"><?= h((int)($customer['visit_count'] ?? 0)) ?> visits</p>
                                            </td>

                                            <td class="px-6 py-5">
                                                <p class="font-black text-slate-950"><?= h(formatMoney($customer['total_spent'] ?? 0)) ?></p>
                                            </td>

                                            <td class="px-6 py-5">
                                                <div class="flex justify-end">
                                                    <a
                                                        href="customer_detail.php?id=<?= h((int)$customer['Customer_ID']) ?>"
                                                        class="inline-flex h-9 items-center gap-1.5 rounded-full bg-sky-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-sky-600"
                                                    >
                                                        View Details
                                                        <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="border-t border-slate-100 px-6 py-4 text-sm font-semibold text-slate-500">
                        Showing <?= h(count($recentCustomers)) ?> of <?= h($totalCustomers) ?> customers
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
