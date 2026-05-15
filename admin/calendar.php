<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'calendar';

$weekParam = $_GET['week'] ?? '';

if ($weekParam && preg_match('/^\d{4}-\d{2}-\d{2}$/', $weekParam)) {
    $monday = new DateTime($weekParam);
} else {
    $monday = new DateTime('today');
    $dow = (int)$monday->format('w');

    if ($dow === 0) {
        $dow = 7;
    }

    $monday->modify('-' . ($dow - 1) . ' days');
}

$days = [];

for ($i = 0; $i < 7; $i++) {
    $day = clone $monday;
    $day->modify("+$i days");
    $days[] = $day;
}

$weekStart = $days[0]->format('Y-m-d');
$weekEnd = $days[6]->format('Y-m-d');

$filterSpecialist = (int)($_GET['specialist'] ?? 0);
$filterStatus = trim($_GET['status'] ?? '');
$filterService = trim($_GET['service'] ?? '');

$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->query("SELECT DISTINCT service_name FROM appointments WHERE service_name != '' ORDER BY service_name");
$serviceNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

$stmt = $conn->prepare("
    SELECT 
        id,
        booking_code,
        customer_name,
        customer_phone,
        service_id,
        service_name,
        specialist_id,
        specialist_name,
        appointment_date,
        appointment_time,
        total_price,
        status
    FROM appointments
    WHERE appointment_date BETWEEN ? AND ?
    ORDER BY appointment_date ASC, appointment_time ASC
");
$stmt->execute([$weekStart, $weekEnd]);
$allAppointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$appointments = array_values(array_filter($allAppointments, function ($appointment) use ($filterSpecialist, $filterStatus, $filterService) {
    if ($filterSpecialist && (int)($appointment['specialist_id'] ?? 0) !== $filterSpecialist) {
        return false;
    }

    if ($filterStatus !== '' && ($appointment['status'] ?? '') !== $filterStatus) {
        return false;
    }

    if ($filterService !== '' && ($appointment['service_name'] ?? '') !== $filterService) {
        return false;
    }

    return true;
}));

$today = date('Y-m-d');

$stmt = $conn->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
$stmt->execute([$today]);
$todayCount = (int)$stmt->fetchColumn();

$stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
$stmt->execute([$today]);
$prices = $stmt->fetchAll(PDO::FETCH_COLUMN);

$revenueToday = 0;

foreach ($prices as $price) {
    $revenueToday += (int)preg_replace('/[^0-9]/', '', $price ?? '');
}

$stmt = $conn->query("SELECT id FROM specialists");
$specialistCount = $stmt->rowCount();

$totalSlots = $specialistCount * 12;
$occupancyRate = $totalSlots > 0 ? min(100, (int)round(($todayCount / $totalSlots) * 100)) : 0;

$weekTotal = count($appointments);

$pendingCount = count(array_filter($appointments, function ($appointment) {
    return ($appointment['status'] ?? '') === 'pending';
}));

$confirmedCount = count(array_filter($appointments, function ($appointment) {
    return ($appointment['status'] ?? '') === 'confirmed';
}));

$cancelledCount = count(array_filter($appointments, function ($appointment) {
    return ($appointment['status'] ?? '') === 'cancelled';
}));

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function formatCurrencyVnd(int $amount): string
{
    return number_format($amount, 0, ',', '.') . ' VND';
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

function buildWeekUrl(DateTime $date, int $specialist, string $status, string $service): string
{
    return '?' . http_build_query([
        'week' => $date->format('Y-m-d'),
        'specialist' => $specialist,
        'status' => $status,
        'service' => $service,
    ]);
}

function statusClasses(string $status): string
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

    if ($status === 'cancelled') {
        return 'bg-slate-100 text-slate-600 ring-slate-200';
    }

    if ($status === 'no_show') {
        return 'bg-rose-50 text-rose-700 ring-rose-100';
    }

    return 'bg-sky-50 text-sky-700 ring-sky-100';
}

function appointmentCardClasses(string $status): string
{
    if ($status === 'checked_in') {
        return 'border-cyan-100 bg-cyan-50/80 hover:bg-cyan-50';
    }

    if ($status === 'completed') {
        return 'border-sky-100 bg-sky-50/80 hover:bg-sky-50';
    }

    if ($status === 'confirmed') {
        return 'border-emerald-100 bg-emerald-50/75 hover:bg-emerald-50';
    }

    if ($status === 'pending') {
        return 'border-amber-100 bg-amber-50/80 hover:bg-amber-50';
    }

    if ($status === 'cancelled') {
        return 'border-slate-200 bg-slate-100/80 opacity-75';
    }

    if ($status === 'no_show') {
        return 'border-rose-100 bg-rose-50/80';
    }

    return 'border-sky-100 bg-sky-50/80 hover:bg-sky-50';
}

function statusLabel(string $status): string
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

$dayShort = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];

$appointmentsByDay = [];

foreach ($days as $day) {
    $key = $day->format('Y-m-d');

    $appointmentsByDay[$key] = array_values(array_filter($appointments, function ($appointment) use ($key) {
        return ($appointment['appointment_date'] ?? '') === $key;
    }));
}

$hours = [8, 10, 12, 14, 16, 18];

$previousWeek = clone $monday;
$previousWeek->modify('-7 days');

$nextWeek = clone $monday;
$nextWeek->modify('+7 days');

$thisWeek = new DateTime('today');
$thisDow = (int)$thisWeek->format('w');

if ($thisDow === 0) {
    $thisDow = 7;
}

$thisWeek->modify('-' . ($thisDow - 1) . ' days');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Calendar | Elysian Management Hub</title>

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
        $title = 'Calendar';
        $subtitle = 'Weekly appointments, specialist schedules and clinic capacity.';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1500px] px-8 py-8">
                <section class="relative mb-7 overflow-hidden rounded-[2rem] border border-sky-100 bg-white shadow-soft">
                    <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-cyan-100/80 blur-3xl"></div>
                    <div class="pointer-events-none absolute -left-24 bottom-0 h-64 w-64 rounded-full bg-sky-100/80 blur-3xl"></div>

                    <div class="relative grid gap-6 p-7 xl:grid-cols-[1.1fr_0.9fr] xl:items-center">
                        <div>
                            <div class="mb-4 flex flex-wrap items-center gap-3">
                                <div class="inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                                    <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                    Scheduling workspace
                                </div>

                                <div class="inline-flex items-center gap-2 rounded-full bg-white/85 px-3 py-1.5 text-xs font-bold text-slate-400 ring-1 ring-slate-100">
                                    <span>Calendar</span>
                                    <span class="material-symbols-outlined text-[15px]">chevron_right</span>
                                    <span class="text-slate-600">Weekly Schedule</span>
                                </div>
                            </div>

                            <h2 class="max-w-4xl text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                                Weekly appointment schedule and specialist capacity.
                            </h2>

                            <p class="mt-3 max-w-2xl text-base font-medium leading-relaxed text-slate-500">
                                Review confirmed appointments, pending bookings, specialist assignments and available clinic capacity across the selected week.
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] border border-white/80 bg-white/85 p-4 shadow-sm backdrop-blur">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Current week</p>
                                <p class="mt-2 text-lg font-black text-slate-900">
                                    <?= h($days[0]->format('M j')) ?> — <?= h($days[6]->format('M j, Y')) ?>
                                </p>
                                <p class="mt-1 text-sm font-semibold text-slate-400">
                                    <?= h($weekTotal) ?> appointments shown
                                </p>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/80 bg-slate-950 p-4 text-white shadow-glow">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/50">Today capacity</p>
                                <p class="mt-2 text-3xl font-black tracking-tight"><?= h($occupancyRate) ?>%</p>
                                <p class="text-sm font-semibold text-white/55">
                                    <?= h($todayCount) ?> bookings · <?= h($specialistCount) ?> specialists
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-7 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-5">
                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Today's appointments</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($todayCount) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Non-cancelled bookings</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[24px]">event</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-emerald-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Today's revenue</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatCurrencyVnd($revenueToday)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">From today appointments</p>
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
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Occupancy rate</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($occupancyRate) ?>%</p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($totalSlots) ?> estimated slots/day</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <span class="material-symbols-outlined text-[24px]">pending_actions</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-violet-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Week appointments</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($weekTotal) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($confirmedCount) ?> confirmed · <?= h($pendingCount) ?> pending</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <span class="material-symbols-outlined text-[24px]">calendar_month</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-cyan-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Specialists</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($specialistCount) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($cancelledCount) ?> cancelled this week</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-cyan-50 text-cyan-600">
                                <span class="material-symbols-outlined text-[24px]">clinical_notes</span>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="mb-6 rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-black tracking-tight text-slate-950">Schedule filters</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                Filter weekly appointments by specialist, status or service.
                            </p>
                        </div>

                        <div class="flex flex-wrap items-center gap-2">
                            <a
                                href="<?= h(buildWeekUrl($previousWeek, $filterSpecialist, $filterStatus, $filterService)) ?>"
                                class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 transition hover:bg-sky-50 hover:text-sky-600"
                                aria-label="Previous week"
                            >
                                <span class="material-symbols-outlined text-[22px]">chevron_left</span>
                            </a>

                            <div class="inline-flex h-11 items-center rounded-full border border-slate-200 bg-slate-50 px-4 text-sm font-black text-slate-700">
                                <?= h($days[0]->format('M j')) ?> — <?= h($days[6]->format('M j, Y')) ?>
                            </div>

                            <a
                                href="<?= h(buildWeekUrl($nextWeek, $filterSpecialist, $filterStatus, $filterService)) ?>"
                                class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 transition hover:bg-sky-50 hover:text-sky-600"
                                aria-label="Next week"
                            >
                                <span class="material-symbols-outlined text-[22px]">chevron_right</span>
                            </a>

                            <a
                                href="<?= h(buildWeekUrl($thisWeek, $filterSpecialist, $filterStatus, $filterService)) ?>"
                                class="inline-flex h-11 items-center justify-center rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                            >
                                Today
                            </a>

                            <a
                                href="create_appointment.php"
                                class="inline-flex h-11 items-center justify-center gap-2 rounded-full bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                            >
                                <span class="material-symbols-outlined text-[19px]">add_circle</span>
                                New Appointment
                            </a>
                        </div>
                    </div>

                    <form method="get" action="calendar.php" class="grid gap-3 lg:grid-cols-[0.8fr_1fr_0.8fr_1fr_auto]">
                        <input type="hidden" name="week" value="<?= h($weekStart) ?>"/>

                        <select
                            name="specialist"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="0">All Specialists</option>
                            <?php foreach ($specialists as $specialist): ?>
                                <option value="<?= h($specialist['id']) ?>" <?= $filterSpecialist === (int)$specialist['id'] ? 'selected' : '' ?>>
                                    <?= h($specialist['name']) ?><?= !empty($specialist['title']) ? ' · ' . h($specialist['title']) : '' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select
                            name="service"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">All Services</option>
                            <?php foreach ($serviceNames as $serviceName): ?>
                                <option value="<?= h($serviceName) ?>" <?= $filterService === $serviceName ? 'selected' : '' ?>>
                                    <?= h($serviceName) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select
                            name="status"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">All Statuses</option>
                            <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="confirmed" <?= $filterStatus === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                            <option value="checked_in" <?= $filterStatus === 'checked_in' ? 'selected' : '' ?>>Checked in</option>
                            <option value="completed" <?= $filterStatus === 'completed' ? 'selected' : '' ?>>Completed</option>
                            <option value="no_show" <?= $filterStatus === 'no_show' ? 'selected' : '' ?>>No-show</option>
                            <option value="cancelled" <?= $filterStatus === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>

                        <a
                            href="calendar.php?week=<?= h($weekStart) ?>"
                            class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                        >
                            <span class="material-symbols-outlined text-[18px]">refresh</span>
                            Reset
                        </a>

                        <button
                            type="submit"
                            class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                        >
                            <span class="material-symbols-outlined text-[19px]">tune</span>
                            Apply
                        </button>
                    </form>
                </section>

                <section class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Weekly Schedule</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                Appointment blocks are grouped into two-hour scheduling windows.
                            </p>
                        </div>

                        <div class="flex flex-wrap items-center gap-3 text-xs font-black">
                            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-2 text-emerald-700 ring-1 ring-emerald-100">
                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                Confirmed
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-full bg-cyan-50 px-3 py-2 text-cyan-700 ring-1 ring-cyan-100">
                                <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
                                Checked in
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-2 text-amber-700 ring-1 ring-amber-100">
                                <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                                Pending
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-full bg-rose-50 px-3 py-2 text-rose-700 ring-1 ring-rose-100">
                                <span class="h-2 w-2 rounded-full bg-rose-400"></span>
                                No-show
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-2 text-slate-600 ring-1 ring-slate-200">
                                <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                                Cancelled
                            </span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1180px] border-collapse text-sm">
                            <thead>
                                <tr class="border-b border-slate-100 bg-slate-50/90">
                                    <th class="w-24 px-4 py-4 text-left text-[11px] font-black uppercase tracking-[0.16em] text-slate-400">
                                        Time
                                    </th>

                                    <?php foreach ($days as $index => $day): ?>
                                        <?php
                                        $dateKey = $day->format('Y-m-d');
                                        $isToday = $dateKey === $today;
                                        $dayCount = count($appointmentsByDay[$dateKey] ?? []);
                                        ?>
                                        <th class="min-w-[150px] border-l border-slate-100 px-3 py-4 text-left">
                                            <div class="flex items-center justify-between gap-2">
                                                <div>
                                                    <p class="text-[10px] font-black uppercase tracking-[0.2em] <?= $isToday ? 'text-sky-500' : 'text-slate-400' ?>">
                                                        <?= h($dayShort[$index]) ?>
                                                    </p>
                                                    <p class="mt-1 text-2xl font-black tracking-tight <?= $isToday ? 'text-sky-600' : 'text-slate-900' ?>">
                                                        <?= h($day->format('j')) ?>
                                                    </p>
                                                </div>

                                                <span class="inline-flex h-8 min-w-8 items-center justify-center rounded-full px-2 text-xs font-black <?= $isToday ? 'bg-sky-500 text-white shadow-glow' : 'bg-white text-slate-500 ring-1 ring-slate-200' ?>">
                                                    <?= h($dayCount) ?>
                                                </span>
                                            </div>
                                        </th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                <?php foreach ($hours as $hour): ?>
                                    <?php $hourEnd = $hour + 2; ?>

                                    <tr class="align-top">
                                        <td class="bg-white px-4 py-4">
                                            <p class="font-black text-slate-700"><?= h(sprintf('%02d:00', $hour)) ?></p>
                                            <p class="mt-1 text-xs font-semibold text-slate-400"><?= h(sprintf('%02d:00', $hourEnd)) ?></p>
                                        </td>

                                        <?php foreach ($days as $day): ?>
                                            <?php
                                            $dateKey = $day->format('Y-m-d');

                                            $dayAppointments = array_values(array_filter($appointmentsByDay[$dateKey] ?? [], function ($appointment) use ($hour, $hourEnd) {
                                                $time = $appointment['appointment_time'] ?? '';

                                                if (preg_match('/^(\d{2}):/', $time, $matches)) {
                                                    $appointmentHour = (int)$matches[1];

                                                    return $appointmentHour >= $hour && $appointmentHour < $hourEnd;
                                                }

                                                return false;
                                            }));
                                            ?>

                                            <td class="min-w-[150px] border-l border-slate-100 bg-white/70 p-2">
                                                <?php if (empty($dayAppointments)): ?>
                                                    <div class="flex min-h-[86px] items-center justify-center rounded-2xl border border-dashed border-slate-200 bg-slate-50/50 text-xs font-bold text-slate-300">
                                                        Available
                                                    </div>
                                                <?php else: ?>
                                                    <div class="space-y-2">
                                                        <?php foreach ($dayAppointments as $appointment): ?>
                                                            <?php
                                                            $status = $appointment['status'] ?? 'confirmed';
                                                            $canEdit = !in_array($status, ['cancelled', 'completed', 'no_show'], true);
                                                            $canCheckIn = $status === 'confirmed';
                                                            ?>

                                                            <div class="group rounded-2xl border p-3 text-xs shadow-sm transition <?= h(appointmentCardClasses($status)) ?>">
                                                                <div class="flex items-start justify-between gap-2">
                                                                    <div class="min-w-0">
                                                                        <p class="truncate text-sm font-black text-slate-900">
                                                                            <?= h($appointment['customer_name'] ?? 'Customer') ?>
                                                                        </p>
                                                                        <p class="mt-1 truncate font-semibold text-slate-600">
                                                                            <?= h($appointment['service_name'] ?? 'Service') ?>
                                                                        </p>
                                                                    </div>

                                                                    <span class="inline-flex shrink-0 rounded-full px-2 py-0.5 text-[10px] font-black uppercase tracking-[0.12em] ring-1 <?= h(statusClasses($status)) ?>">
                                                                        <?= h(statusLabel($status)) ?>
                                                                    </span>
                                                                </div>

                                                                <div class="mt-2 flex items-center gap-1.5 text-slate-500">
                                                                    <span class="material-symbols-outlined text-[15px]">schedule</span>
                                                                    <span class="font-bold"><?= h(formatTime($appointment['appointment_time'] ?? '')) ?></span>
                                                                </div>

                                                                <?php if (!empty($appointment['specialist_name'])): ?>
                                                                    <div class="mt-1 flex items-center gap-1.5 text-slate-500">
                                                                        <span class="material-symbols-outlined text-[15px]">stethoscope</span>
                                                                        <span class="truncate font-semibold"><?= h($appointment['specialist_name']) ?></span>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if ($canCheckIn): ?>
                                                                    <form action="../backend/mark_appointment_arrived.php" method="post" class="mt-3">
                                                                        <input type="hidden" name="id" value="<?= h((int)$appointment['id']) ?>"/>
                                                                        <input type="hidden" name="redirect" value="calendar.php?<?= h(http_build_query($_GET + ['week' => $weekStart])) ?>"/>
                                                                        <button
                                                                            type="submit"
                                                                            class="inline-flex items-center gap-1 rounded-full bg-cyan-500 px-3 py-1.5 text-xs font-black text-white shadow-sm transition hover:bg-cyan-600"
                                                                        >
                                                                            <span class="material-symbols-outlined text-[15px]">how_to_reg</span>
                                                                            Check in
                                                                        </button>
                                                                    </form>
                                                                <?php endif; ?>

                                                                <?php if ($canEdit): ?>
                                                                    <a
                                                                        href="edit_appointment.php?id=<?= h((int)$appointment['id']) ?>"
                                                                        class="mt-3 inline-flex items-center gap-1 rounded-full bg-white/80 px-3 py-1.5 text-xs font-black text-sky-600 ring-1 ring-sky-100 transition hover:bg-white hover:text-sky-700"
                                                                    >
                                                                        <span class="material-symbols-outlined text-[15px]">edit</span>
                                                                        Edit
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="mt-6 overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Appointments this week</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                Detailed appointment list for the selected weekly schedule.
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            <?= h($weekTotal) ?> records
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1050px] text-left text-sm">
                            <thead>
                                <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">Time</th>
                                    <th class="px-6 py-4">Patient</th>
                                    <th class="px-6 py-4">Service</th>
                                    <th class="px-6 py-4">Specialist</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                <?php if (empty($appointments)): ?>
                                    <tr>
                                        <td colspan="7" class="px-6 py-16 text-center">
                                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-sky-500">
                                                <span class="material-symbols-outlined text-[30px]">event_busy</span>
                                            </div>
                                            <h4 class="mt-4 text-lg font-black text-slate-900">No appointments found</h4>
                                            <p class="mt-1 text-sm font-medium text-slate-500">No appointments match the selected week and filters.</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($appointments as $appointment): ?>
                                        <?php
                                        $status = $appointment['status'] ?? 'confirmed';
                                        $canEdit = !in_array($status, ['cancelled', 'completed', 'no_show'], true);
                                        $canCheckIn = $status === 'confirmed';
                                        $patientName = $appointment['customer_name'] ?? 'Patient';
                                        $patientInitial = getInitial($patientName);
                                        ?>

                                        <tr class="group transition hover:bg-sky-50/35">
                                            <td class="px-6 py-5">
                                                <p class="font-black text-slate-800">
                                                    <?= h(date('D M j', strtotime((string)$appointment['appointment_date']))) ?>
                                                </p>
                                                <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                    <?= h($appointment['appointment_date']) ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5">
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-50 px-3 py-1.5 text-xs font-black text-slate-600 ring-1 ring-slate-200">
                                                    <span class="material-symbols-outlined text-[15px]">schedule</span>
                                                    <?= h(formatTime($appointment['appointment_time'] ?? '')) ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                                        <?= h($patientInitial) ?>
                                                    </div>

                                                    <div class="min-w-0">
                                                        <p class="max-w-[190px] truncate font-black text-slate-900">
                                                            <?= h($patientName) ?>
                                                        </p>
                                                        <p class="mt-0.5 truncate text-xs font-semibold text-slate-400">
                                                            <?= h($appointment['customer_phone'] ?? '—') ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-5">
                                                <p class="max-w-[240px] truncate font-bold text-slate-700">
                                                    <?= h($appointment['service_name'] ?? '—') ?>
                                                </p>
                                                <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                    <?= h($appointment['booking_code'] ?? '—') ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5">
                                                <p class="font-bold text-slate-700">
                                                    <?= h($appointment['specialist_name'] ?? '—') ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5">
                                                <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1.5 text-xs font-black uppercase ring-1 <?= h(statusClasses($status)) ?>">
                                                    <?= h(statusLabel($status)) ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5">
                                                <div class="flex justify-end gap-2">
                                                    <?php if ($canCheckIn): ?>
                                                        <form action="../backend/mark_appointment_arrived.php" method="post">
                                                            <input type="hidden" name="id" value="<?= h((int)$appointment['id']) ?>"/>
                                                            <input type="hidden" name="redirect" value="calendar.php?<?= h(http_build_query($_GET + ['week' => $weekStart])) ?>"/>
                                                            <button
                                                                type="submit"
                                                                class="inline-flex h-9 items-center gap-1.5 rounded-full bg-cyan-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-cyan-600"
                                                            >
                                                                <span class="material-symbols-outlined text-[16px]">how_to_reg</span>
                                                                Check in
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>

                                                    <?php if ($canEdit): ?>
                                                        <a
                                                            href="edit_appointment.php?id=<?= h((int)$appointment['id']) ?>"
                                                            class="inline-flex h-9 items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 text-xs font-black text-slate-600 transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-600"
                                                        >
                                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                                            Edit
                                                        </a>

                                                        <a
                                                            href="edit_appointment.php?id=<?= h((int)$appointment['id']) ?>#cancel"
                                                            class="inline-flex h-9 items-center gap-1.5 rounded-full border border-rose-100 bg-rose-50 px-3 text-xs font-black text-rose-600 transition hover:bg-rose-100"
                                                        >
                                                            <span class="material-symbols-outlined text-[16px]">cancel</span>
                                                            Cancel
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="inline-flex h-9 items-center rounded-full bg-slate-100 px-3 text-xs font-black text-slate-400">
                                                            No action
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>
