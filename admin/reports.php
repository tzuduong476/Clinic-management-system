<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || ($currentUser['role'] ?? '') !== 'admin') {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'reports';

$reportYear = max(2020, min(2030, (int)($_GET['year'] ?? date('Y'))));

$monthlyRevenue = [];
$monthlyPaidRevenue = [];
$monthlyAppointments = [];
$monthlyPaidAppointments = [];

for ($month = 1; $month <= 12; $month++) {
    $from = sprintf('%04d-%02d-01', $reportYear, $month);
    $to = date('Y-m-t', strtotime($from));

    $stmt = $conn->prepare("
        SELECT total_price, payment_status
        FROM appointments 
        WHERE appointment_date BETWEEN ? AND ? 
          AND status != 'cancelled'
    ");
    $stmt->execute([$from, $to]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $monthRevenue = 0;
    $monthPaidRevenue = 0;
    $monthPaidCount = 0;

    foreach ($rows as $row) {
        $amount = (int)preg_replace('/[^0-9]/', '', $row['total_price'] ?? '');

        $monthRevenue += $amount;

        if (($row['payment_status'] ?? '') === 'paid') {
            $monthPaidRevenue += $amount;
            $monthPaidCount++;
        }
    }

    $monthlyRevenue[$month] = $monthRevenue;
    $monthlyPaidRevenue[$month] = $monthPaidRevenue;
    $monthlyAppointments[$month] = count($rows);
    $monthlyPaidAppointments[$month] = $monthPaidCount;
}

$yearTotal = array_sum($monthlyRevenue);
$yearPaidTotal = array_sum($monthlyPaidRevenue);
$totalAppointments = array_sum($monthlyAppointments);
$totalPaidAppointments = array_sum($monthlyPaidAppointments);
$totalUnpaidAppointments = max(0, $totalAppointments - $totalPaidAppointments);

$averageMonthlyRevenue = $yearTotal > 0 ? (int)round($yearTotal / 12) : 0;
$averageMonthlyAppointments = $totalAppointments > 0 ? round($totalAppointments / 12, 1) : 0;

$bestMonthNumber = 1;
$bestMonthRevenue = 0;

foreach ($monthlyRevenue as $month => $revenue) {
    if ($revenue > $bestMonthRevenue) {
        $bestMonthRevenue = $revenue;
        $bestMonthNumber = $month;
    }
}

$paymentCompletionRate = $totalAppointments > 0
    ? round(($totalPaidAppointments / $totalAppointments) * 100, 1)
    : 0;

$stmt = $conn->prepare("
    SELECT service_name, total_price, payment_status
    FROM appointments 
    WHERE YEAR(appointment_date) = ?
      AND status != 'cancelled'
");
$stmt->execute([$reportYear]);

$byService = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $serviceName = trim($row['service_name'] ?? '');

    if ($serviceName === '') {
        $serviceName = 'Unnamed Service';
    }

    if (!isset($byService[$serviceName])) {
        $byService[$serviceName] = [
            'count' => 0,
            'revenue' => 0,
            'paid_revenue' => 0,
        ];
    }

    $amount = (int)preg_replace('/[^0-9]/', '', $row['total_price'] ?? '');

    $byService[$serviceName]['count']++;
    $byService[$serviceName]['revenue'] += $amount;

    if (($row['payment_status'] ?? '') === 'paid') {
        $byService[$serviceName]['paid_revenue'] += $amount;
    }
}

uasort($byService, function ($a, $b) {
    if ($a['count'] === $b['count']) {
        return $b['revenue'] <=> $a['revenue'];
    }

    return $b['count'] <=> $a['count'];
});

$topServices = [];
$rank = 0;

foreach ($byService as $serviceName => $data) {
    if ($rank >= 8) {
        break;
    }

    $topServices[] = [
        'service_name' => $serviceName,
        'count' => $data['count'],
        'revenue' => $data['revenue'],
        'paid_revenue' => $data['paid_revenue'],
    ];

    $rank++;
}

$stmt = $conn->prepare("
    SELECT specialist_name, COUNT(*) AS appointment_count
    FROM appointments
    WHERE YEAR(appointment_date) = ?
      AND status != 'cancelled'
      AND specialist_name IS NOT NULL
      AND specialist_name != ''
    GROUP BY specialist_name
    ORDER BY appointment_count DESC
    LIMIT 6
");
$stmt->execute([$reportYear]);
$topSpecialists = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("
    SELECT COUNT(*) 
    FROM appointments
    WHERE YEAR(appointment_date) = ?
      AND status = 'cancelled'
");
$stmt->execute([$reportYear]);
$cancelledAppointments = (int)$stmt->fetchColumn();

$completionRate = ($totalAppointments + $cancelledAppointments) > 0
    ? round(($totalAppointments / ($totalAppointments + $cancelledAppointments)) * 100, 1)
    : 0;

$monthNames = [
    1 => 'Jan',
    2 => 'Feb',
    3 => 'Mar',
    4 => 'Apr',
    5 => 'May',
    6 => 'Jun',
    7 => 'Jul',
    8 => 'Aug',
    9 => 'Sep',
    10 => 'Oct',
    11 => 'Nov',
    12 => 'Dec',
];

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function formatMoney($value): string
{
    return number_format((int)$value, 0, ',', '.') . ' VND';
}

function shortMoney($value): string
{
    $amount = (int)$value;

    if ($amount >= 1000000) {
        return number_format($amount / 1000000, 1) . 'M';
    }

    if ($amount >= 1000) {
        return number_format($amount / 1000, 0) . 'K';
    }

    return number_format($amount);
}

function getInitial(string $name): string
{
    $name = trim($name);

    if ($name === '') {
        return 'S';
    }

    if (function_exists('mb_substr')) {
        return mb_strtoupper(mb_substr($name, 0, 1, 'UTF-8'), 'UTF-8');
    }

    return strtoupper(substr($name, 0, 1));
}

$monthlyTable = [];

for ($month = 1; $month <= 12; $month++) {
    $monthlyTable[] = [
        'month' => $monthNames[$month],
        'revenue' => $monthlyRevenue[$month],
        'paid_revenue' => $monthlyPaidRevenue[$month],
        'appointments' => $monthlyAppointments[$month],
        'paid_appointments' => $monthlyPaidAppointments[$month],
    ];
}

$chartRevenue = array_values($monthlyRevenue);
$chartPaidRevenue = array_values($monthlyPaidRevenue);
$chartAppointments = array_values($monthlyAppointments);
$chartPaidAppointments = array_values($monthlyPaidAppointments);
$chartMonths = array_values($monthNames);

$topServiceLabels = array_map(function ($service) {
    return $service['service_name'];
}, $topServices);

$topServiceCounts = array_map(function ($service) {
    return $service['count'];
}, $topServices);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Reports & Analytics | Elysian Management Hub</title>

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        $title = 'Reports';
        $subtitle = 'Revenue, appointments and service performance.';
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
                                    Analytics workspace
                                </div>

                                <div class="inline-flex items-center gap-2 rounded-full bg-white/85 px-3 py-1.5 text-xs font-bold text-slate-400 ring-1 ring-slate-100">
                                    <span>Reports</span>
                                    <span class="material-symbols-outlined text-[15px]">chevron_right</span>
                                    <span class="text-slate-600"><?= h($reportYear) ?> Overview</span>
                                </div>
                            </div>

                            <h2 class="max-w-4xl text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                                Reports dashboard for revenue, appointments and service performance.
                            </h2>

                            <p class="mt-3 max-w-2xl text-base font-medium leading-relaxed text-slate-500">
                                Review yearly clinic performance using appointment records and payment data from the system.
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] border border-white/80 bg-white/85 p-4 shadow-sm backdrop-blur">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Report year</p>
                                <form method="get" action="reports.php" class="mt-2">
                                    <select
                                        name="year"
                                        onchange="this.form.submit()"
                                        class="h-11 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-black text-slate-800 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    >
                                        <?php for ($year = (int)date('Y'); $year >= 2020; $year--): ?>
                                            <option value="<?= h($year) ?>" <?= $reportYear === $year ? 'selected' : '' ?>>
                                                <?= h($year) ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </form>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/80 bg-slate-950 p-4 text-white shadow-glow">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/50">Recorded value</p>
                                <p class="mt-2 text-2xl font-black tracking-tight"><?= h(formatMoney($yearTotal)) ?></p>
                                <p class="text-sm font-semibold text-white/55"><?= h($totalAppointments) ?> non-cancelled appointments</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-7 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-5">
                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Total revenue</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatMoney($yearTotal)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Recorded service value</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[24px]">payments</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-emerald-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Paid revenue</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatMoney($yearPaidTotal)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($totalPaidAppointments) ?> paid appointments</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <span class="material-symbols-outlined text-[24px]">verified</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-violet-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Appointments</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($totalAppointments) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($averageMonthlyAppointments) ?> average/month</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <span class="material-symbols-outlined text-[24px]">calendar_month</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-amber-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Payment rate</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($paymentCompletionRate) ?>%</p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($totalUnpaidAppointments) ?> unpaid records</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <span class="material-symbols-outlined text-[24px]">receipt_long</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-cyan-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Best month</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($monthNames[$bestMonthNumber]) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h(formatMoney($bestMonthRevenue)) ?></p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-cyan-50 text-cyan-600">
                                <span class="material-symbols-outlined text-[24px]">trending_up</span>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="mb-6 grid gap-6 xl:grid-cols-[1.45fr_0.9fr]">
                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                            <div>
                                <h3 class="text-2xl font-black tracking-tight text-slate-950">Revenue & Appointments</h3>
                                <p class="mt-1 text-sm font-medium text-slate-500">Monthly recorded revenue and appointment volume.</p>
                            </div>

                            <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                                <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                <?= h($reportYear) ?>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="h-[360px]">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="border-b border-slate-100 px-6 py-5">
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Top Services</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">Ranked by booking count.</p>
                        </div>

                        <div class="space-y-3 p-5">
                            <?php if (empty($topServices)): ?>
                                <div class="rounded-2xl bg-slate-50 p-4 text-sm font-bold text-slate-500">
                                    No service data available for this year.
                                </div>
                            <?php else: ?>
                                <?php foreach ($topServices as $index => $service): ?>
                                    <?php
                                    $maxCount = max(1, $topServices[0]['count']);
                                    $width = min(100, (int)round(($service['count'] / $maxCount) * 100));
                                    ?>
                                    <div class="rounded-[1.5rem] border border-slate-200 bg-white p-4 shadow-sm">
                                        <div class="flex items-start justify-between gap-3">
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-2">
                                                    <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-sky-50 text-xs font-black text-sky-600 ring-1 ring-sky-100">
                                                        <?= h($index + 1) ?>
                                                    </span>
                                                    <p class="truncate font-black text-slate-900"><?= h($service['service_name']) ?></p>
                                                </div>

                                                <p class="mt-2 text-sm font-semibold text-slate-500">
                                                    <?= h($service['count']) ?> bookings · <?= h(formatMoney($service['revenue'])) ?>
                                                </p>
                                            </div>

                                            <p class="shrink-0 text-sm font-black text-slate-700">
                                                <?= h(shortMoney($service['revenue'])) ?>
                                            </p>
                                        </div>

                                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-slate-100">
                                            <div class="h-full rounded-full bg-sky-400" style="width: <?= h($width) ?>%"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <section class="mb-6 grid gap-6 xl:grid-cols-[0.9fr_1.1fr]">
                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="border-b border-slate-100 px-6 py-5">
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Service Mix</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">Booking distribution by top services.</p>
                        </div>

                        <div class="p-6">
                            <div class="h-[300px]">
                                <canvas id="serviceChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                            <div>
                                <h3 class="text-2xl font-black tracking-tight text-slate-950">Specialist Activity</h3>
                                <p class="mt-1 text-sm font-medium text-slate-500">Appointment volume by specialist.</p>
                            </div>

                            <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                                <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                Top 6
                            </div>
                        </div>

                        <div class="grid gap-4 p-5 md:grid-cols-2">
                            <?php if (empty($topSpecialists)): ?>
                                <div class="rounded-2xl bg-slate-50 p-4 text-sm font-bold text-slate-500">
                                    No specialist activity found.
                                </div>
                            <?php else: ?>
                                <?php foreach ($topSpecialists as $specialist): ?>
                                    <div class="rounded-[1.5rem] border border-slate-200 bg-white p-4 shadow-sm">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                                <?= h(getInitial($specialist['specialist_name'] ?? 'S')) ?>
                                            </div>

                                            <div class="min-w-0">
                                                <p class="truncate font-black text-slate-900">
                                                    <?= h($specialist['specialist_name'] ?? 'Specialist') ?>
                                                </p>
                                                <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                    <?= h($specialist['appointment_count'] ?? 0) ?> appointments
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <section class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Monthly Breakdown</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">Detailed monthly performance for <?= h($reportYear) ?>.</p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            12 months
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[980px] text-left text-sm">
                            <thead>
                                <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                    <th class="px-6 py-4">Month</th>
                                    <th class="px-6 py-4">Revenue</th>
                                    <th class="px-6 py-4">Paid Revenue</th>
                                    <th class="px-6 py-4">Appointments</th>
                                    <th class="px-6 py-4">Paid Appointments</th>
                                    <th class="px-6 py-4">Payment Rate</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                <?php foreach ($monthlyTable as $row): ?>
                                    <?php
                                    $monthPaymentRate = $row['appointments'] > 0
                                        ? round(($row['paid_appointments'] / $row['appointments']) * 100, 1)
                                        : 0;
                                    ?>
                                    <tr class="group transition hover:bg-sky-50/35">
                                        <td class="px-6 py-5">
                                            <p class="font-black text-slate-900"><?= h($row['month']) ?></p>
                                        </td>

                                        <td class="px-6 py-5">
                                            <p class="font-black text-slate-950"><?= h(formatMoney($row['revenue'])) ?></p>
                                        </td>

                                        <td class="px-6 py-5">
                                            <p class="font-bold text-emerald-700"><?= h(formatMoney($row['paid_revenue'])) ?></p>
                                        </td>

                                        <td class="px-6 py-5">
                                            <p class="font-bold text-slate-700"><?= h($row['appointments']) ?></p>
                                        </td>

                                        <td class="px-6 py-5">
                                            <p class="font-bold text-slate-700"><?= h($row['paid_appointments']) ?></p>
                                        </td>

                                        <td class="px-6 py-5">
                                            <span class="inline-flex rounded-full px-3 py-1.5 text-xs font-black ring-1 <?= $monthPaymentRate >= 80 ? 'bg-emerald-50 text-emerald-700 ring-emerald-100' : ($monthPaymentRate > 0 ? 'bg-amber-50 text-amber-700 ring-amber-100' : 'bg-slate-100 text-slate-600 ring-slate-200') ?>">
                                                <?= h($monthPaymentRate) ?>%
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="border-t border-slate-100 px-6 py-4 text-sm font-semibold text-slate-500">
                        Total completion rate: <?= h($completionRate) ?>% · Cancelled appointments: <?= h($cancelledAppointments) ?>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        const monthLabels = <?= json_encode($chartMonths) ?>;
        const monthlyRevenue = <?= json_encode($chartRevenue) ?>;
        const monthlyPaidRevenue = <?= json_encode($chartPaidRevenue) ?>;
        const monthlyAppointments = <?= json_encode($chartAppointments) ?>;
        const monthlyPaidAppointments = <?= json_encode($chartPaidAppointments) ?>;

        const serviceLabels = <?= json_encode($topServiceLabels) ?>;
        const serviceCounts = <?= json_encode($topServiceCounts) ?>;

        const revenueContext = document.getElementById('revenueChart').getContext('2d');

        new Chart(revenueContext, {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [
                    {
                        label: 'Recorded Revenue',
                        data: monthlyRevenue,
                        borderColor: '#0db9f2',
                        backgroundColor: 'rgba(13, 185, 242, 0.08)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.42,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        yAxisID: 'y'
                    },
                    {
                        label: 'Paid Revenue',
                        data: monthlyPaidRevenue,
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.08)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.42,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        yAxisID: 'y'
                    },
                    {
                        label: 'Appointments',
                        data: monthlyAppointments,
                        borderColor: '#64748b',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        borderDash: [6, 6],
                        tension: 0.42,
                        pointRadius: 3,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 8,
                            boxHeight: 8,
                            font: {
                                family: 'Inter',
                                weight: '700'
                            }
                        }
                    },
                    tooltip: {
                        padding: 12,
                        titleFont: {
                            family: 'Inter',
                            weight: '800'
                        },
                        bodyFont: {
                            family: 'Inter',
                            weight: '600'
                        },
                        callbacks: {
                            label: function(context) {
                                if (context.dataset.yAxisID === 'y') {
                                    return context.dataset.label + ': ' + Number(context.raw).toLocaleString('vi-VN') + ' VND';
                                }

                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(148, 163, 184, 0.16)'
                        },
                        ticks: {
                            font: {
                                family: 'Inter',
                                weight: '700'
                            },
                            callback: function(value) {
                                if (value >= 1000000) {
                                    return value / 1000000 + 'M';
                                }

                                if (value >= 1000) {
                                    return value / 1000 + 'K';
                                }

                                return value;
                            }
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false
                        },
                        ticks: {
                            precision: 0,
                            font: {
                                family: 'Inter',
                                weight: '700'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: 'Inter',
                                weight: '700'
                            }
                        }
                    }
                }
            }
        });

        const serviceContext = document.getElementById('serviceChart').getContext('2d');

        new Chart(serviceContext, {
            type: 'doughnut',
            data: {
                labels: serviceLabels,
                datasets: [
                    {
                        data: serviceCounts,
                        backgroundColor: [
                            '#0db9f2',
                            '#22c55e',
                            '#a78bfa',
                            '#f59e0b',
                            '#06b6d4',
                            '#fb7185',
                            '#64748b',
                            '#14b8a6'
                        ],
                        borderWidth: 0,
                        hoverOffset: 8
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 8,
                            boxHeight: 8,
                            padding: 14,
                            font: {
                                family: 'Inter',
                                weight: '700'
                            }
                        }
                    },
                    tooltip: {
                        padding: 12,
                        titleFont: {
                            family: 'Inter',
                            weight: '800'
                        },
                        bodyFont: {
                            family: 'Inter',
                            weight: '600'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>