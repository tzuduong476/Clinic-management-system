<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'billing';

$dateFrom = trim($_GET['from'] ?? '');
$dateTo = trim($_GET['to'] ?? '');
$filterStatus = trim($_GET['status'] ?? '');
$filterPayment = trim($_GET['payment'] ?? '');
$searchQuery = trim($_GET['q'] ?? '');

$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = 15;
$offset = ($page - 1) * $perPage;

$today = date('Y-m-d');
$monthStart = date('Y-m-01');
$monthEnd = date('Y-m-t');

if ($dateFrom === '') {
    $dateFrom = $monthStart;
}

if ($dateTo === '') {
    $dateTo = $monthEnd;
}

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function js($value): string
{
    return json_encode(
        (string)$value,
        JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
    );
}

function parseRevenue(PDO $conn, string $dateFrom, string $dateTo, bool $excludeCancelled = true): int
{
    $statusCond = $excludeCancelled ? " AND status != 'cancelled'" : '';
    $paymentCond = " AND payment_status = 'paid'";

    $stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date BETWEEN ? AND ? $statusCond $paymentCond");
    $stmt->execute([$dateFrom, $dateTo]);

    $prices = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $sum = 0;

    foreach ($prices as $price) {
        $sum += (int)preg_replace('/[^0-9]/', '', $price ?? '');
    }

    return $sum;
}

function formatCurrencyVnd(int $amount): string
{
    return number_format($amount, 0, ',', '.') . ' VND';
}

function formatDate($date): string
{
    if (!$date) {
        return '—';
    }

    return date('M j, Y', strtotime((string)$date));
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

function buildPageUrl(
    int $targetPage,
    string $dateFrom,
    string $dateTo,
    string $filterStatus,
    string $filterPayment,
    string $searchQuery
): string {
    return '?' . http_build_query([
        'page' => $targetPage,
        'from' => $dateFrom,
        'to' => $dateTo,
        'status' => $filterStatus,
        'payment' => $filterPayment,
        'q' => $searchQuery,
    ]);
}

$revenueToday = parseRevenue($conn, $today, $today);
$revenueThisMonth = parseRevenue($conn, $monthStart, $monthEnd);

$stmt = $conn->query("SELECT total_price FROM appointments WHERE status != 'cancelled' AND payment_status = 'paid'");
$allPrices = $stmt->fetchAll(PDO::FETCH_COLUMN);

$revenueTotal = 0;
foreach ($allPrices as $price) {
    $revenueTotal += (int)preg_replace('/[^0-9]/', '', $price ?? '');
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
$stmt->execute([$today]);
$todayCount = (int)$stmt->fetchColumn();

$stmt = $conn->query("SELECT total_price FROM appointments WHERE status != 'cancelled' AND (payment_status = 'unpaid' OR payment_status IS NULL)");
$unpaidPrices = $stmt->fetchAll(PDO::FETCH_COLUMN);

$overdueAmount = 0;
foreach ($unpaidPrices as $price) {
    $overdueAmount += (int)preg_replace('/[^0-9]/', '', $price ?? '');
}
$overdueCount = count($unpaidPrices);

$stmt = $conn->prepare("
    SELECT 
        id,
        booking_code,
        customer_name,
        customer_phone,
        service_name,
        specialist_name,
        appointment_date,
        appointment_time,
        total_price,
        status,
        payment_status,
        payment_method,
        created_at
    FROM appointments
    WHERE appointment_date BETWEEN ? AND ?
    ORDER BY appointment_date DESC, appointment_time DESC
");
$stmt->execute([$dateFrom, $dateTo]);
$allBills = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($filterStatus !== '') {
    $allBills = array_values(array_filter($allBills, function ($bill) use ($filterStatus) {
        return ($bill['status'] ?? '') === $filterStatus;
    }));
}

if ($filterPayment !== '') {
    $allBills = array_values(array_filter($allBills, function ($bill) use ($filterPayment) {
        return ($bill['payment_status'] ?? 'unpaid') === $filterPayment;
    }));
}

if ($searchQuery !== '') {
    $needle = function_exists('mb_strtolower')
        ? mb_strtolower($searchQuery, 'UTF-8')
        : strtolower($searchQuery);

    $allBills = array_values(array_filter($allBills, function ($bill) use ($needle) {
        $text = ($bill['booking_code'] ?? '') . ' ' .
            ($bill['customer_name'] ?? '') . ' ' .
            ($bill['customer_phone'] ?? '') . ' ' .
            ($bill['service_name'] ?? '') . ' ' .
            ($bill['specialist_name'] ?? '');

        $haystack = function_exists('mb_strtolower')
            ? mb_strtolower($text, 'UTF-8')
            : strtolower($text);

        return str_contains($haystack, $needle);
    }));
}

$totalBills = count($allBills);
$totalPages = max(1, (int)ceil($totalBills / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;
$paginated = array_slice($allBills, $offset, $perPage);

$paidBillsInPeriod = count(array_filter($allBills, function ($bill) {
    return ($bill['payment_status'] ?? 'unpaid') === 'paid';
}));

$unpaidBillsInPeriod = count(array_filter($allBills, function ($bill) {
    return ($bill['payment_status'] ?? 'unpaid') !== 'paid';
}));

$paymentCompletionRate = $totalBills > 0
    ? round(($paidBillsInPeriod / $totalBills) * 100, 1)
    : 0;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Billing | Elysian Management Hub</title>

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

        @media print {
            body * {
                visibility: hidden;
            }

            #statementModal,
            #statementModal * {
                visibility: visible;
            }

            #statementModal {
                position: absolute;
                inset: 0;
                background: white !important;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="h-screen bg-slate-50 text-slate-800 flex overflow-hidden">
    <?php include __DIR__ . '/_sidebar.php'; ?>

    <div class="flex min-w-0 flex-1 flex-col min-h-0">
        <?php
        $title = 'Billing';
        $subtitle = 'Client invoices, payment status and service statements.';
        include __DIR__ . '/_topbar.php';
        ?>

       <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1500px] px-8 py-8">
                <section class="relative mb-7 overflow-hidden rounded-[2rem] border border-sky-100 bg-white shadow-soft">
                    <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-cyan-100/75 blur-3xl"></div>
                    <div class="pointer-events-none absolute -left-24 bottom-0 h-60 w-60 rounded-full bg-sky-100/75 blur-3xl"></div>

                    <div class="relative grid gap-6 p-7 xl:grid-cols-[1.2fr_0.8fr] xl:items-center">
                        <div>
                            <div class="mb-4 flex flex-wrap items-center gap-3">
                                <div class="inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                                    <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                    Finance workspace
                                </div>

                                <div class="inline-flex items-center gap-2 rounded-full bg-white/85 px-3 py-1.5 text-xs font-bold text-slate-400 ring-1 ring-slate-100">
                                    <span>Billing &amp; Invoices</span>
                                    <span class="material-symbols-outlined text-[15px]">chevron_right</span>
                                    <span class="text-slate-600">Client Billing Inquiries</span>
                                </div>
                            </div>

                            <h2 class="max-w-4xl text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                                Client billing, invoice records and payment resolution.
                            </h2>

                            <p class="mt-3 max-w-2xl text-base font-medium leading-relaxed text-slate-500">
                                Review client invoices, service statements, payment modes and unpaid balances in a single clinic billing workspace.
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] border border-white/80 bg-white/85 p-4 shadow-sm backdrop-blur">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Current period</p>
                                <p class="mt-2 text-lg font-black text-slate-900"><?= h(formatDate($dateFrom)) ?></p>
                                <p class="text-sm font-semibold text-slate-400">to <?= h(formatDate($dateTo)) ?></p>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/80 bg-slate-950 p-4 text-white shadow-glow">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/50">Client invoices</p>
                                <p class="mt-2 text-3xl font-black tracking-tight"><?= h($totalBills) ?></p>
                                <p class="text-sm font-semibold text-white/55">
                                    <?= h($paidBillsInPeriod) ?> paid · <?= h($unpaidBillsInPeriod) ?> unpaid
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-7 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-5">
                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-emerald-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Today's client payments</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatCurrencyVnd($revenueToday)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($todayCount) ?> active appointments today</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <span class="material-symbols-outlined text-[24px]">payments</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">This month revenue</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatCurrencyVnd($revenueThisMonth)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h(formatDate($monthStart)) ?> — <?= h(formatDate($monthEnd)) ?></p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[24px]">monitoring</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-amber-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Client overdue balances</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatCurrencyVnd($overdueAmount)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($overdueCount) ?> pending accounts</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <span class="material-symbols-outlined text-[24px]">warning</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-violet-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Total paid revenue</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h(formatCurrencyVnd($revenueTotal)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">All paid appointment records</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <span class="material-symbols-outlined text-[24px]">account_balance_wallet</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-cyan-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Payment completion</p>
                                <p class="mt-3 text-2xl font-black tracking-tight text-slate-950"><?= h($paymentCompletionRate) ?>%</p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($paidBillsInPeriod) ?> paid of <?= h($totalBills) ?> invoices</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-cyan-50 text-cyan-600">
                                <span class="material-symbols-outlined text-[24px]">thumb_up</span>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="mb-6 rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-black tracking-tight text-slate-950">Client invoice filters</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                Filter invoice records by payment status, appointment status, date range or client information.
                            </p>
                        </div>

                        <a
                            href="billing.php"
                            class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 transition hover:bg-slate-50"
                        >
                            <span class="material-symbols-outlined text-[18px]">refresh</span>
                            Reset Filters
                        </a>
                    </div>

                    <form method="get" action="billing.php" class="grid gap-3 xl:grid-cols-[1.1fr_0.7fr_0.7fr_0.7fr_0.7fr_auto]">
                        <div class="relative">
                            <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">search</span>
                            <input
                                type="text"
                                name="q"
                                value="<?= h($searchQuery) ?>"
                                placeholder="Search billing inquiries..."
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-12 pr-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                            />
                        </div>

                        <select
                            name="payment"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Payment Status: All</option>
                            <option value="paid" <?= $filterPayment === 'paid' ? 'selected' : '' ?>>Paid</option>
                            <option value="unpaid" <?= $filterPayment === 'unpaid' ? 'selected' : '' ?>>Unpaid</option>
                        </select>

                        <select
                            name="status"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Appointment: All</option>
                            <option value="confirmed" <?= $filterStatus === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                            <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="cancelled" <?= $filterStatus === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>

                        <div class="relative">
                            <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm font-black uppercase tracking-[0.16em] text-slate-400">From</span>
                            <input
                                type="date"
                                name="from"
                                value="<?= h($dateFrom) ?>"
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-20 pr-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                            />
                        </div>

                        <div class="relative">
                            <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm font-black uppercase tracking-[0.16em] text-slate-400">To</span>
                            <input
                                type="date"
                                name="to"
                                value="<?= h($dateTo) ?>"
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-14 pr-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                            />
                        </div>

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
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Client Invoices</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                Showing <?= h($totalBills ? $offset + 1 : 0) ?>–<?= h(min($offset + $perPage, $totalBills)) ?> of <?= h($totalBills) ?> invoices
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Client invoice ledger
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1220px] text-left text-sm">
                            <thead>
                                <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                    <th class="px-6 py-4">Client Invoice ID</th>
                                    <th class="px-6 py-4">Customer Name</th>
                                    <th class="px-6 py-4">Service Provided Date</th>
                                    <th class="px-6 py-4">Service Details</th>
                                    <th class="px-6 py-4">Total Bill (VND)</th>
                                    <th class="px-6 py-4">Client Payment Mode</th>
                                    <th class="px-6 py-4">Payment Outcome</th>
                                    <th class="px-6 py-4 text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                <?php if (empty($paginated)): ?>
                                    <tr>
                                        <td colspan="8" class="px-6 py-16 text-center">
                                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-sky-500">
                                                <span class="material-symbols-outlined text-[30px]">receipt_long</span>
                                            </div>
                                            <h4 class="mt-4 text-lg font-black text-slate-900">No client invoices found</h4>
                                            <p class="mt-1 text-sm font-medium text-slate-500">Try changing the date range or removing some filters.</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($paginated as $bill): ?>
                                        <?php
                                        $status = $bill['status'] ?? 'confirmed';
                                        $paymentStatus = $bill['payment_status'] ?? 'unpaid';

                                        $paymentClass = $paymentStatus === 'paid'
                                            ? 'bg-emerald-50 text-emerald-700 ring-emerald-100'
                                            : 'bg-amber-50 text-amber-700 ring-amber-100';

                                        $paymentIcon = $paymentStatus === 'paid' ? 'check_circle' : 'schedule';
                                        $paymentLabel = $paymentStatus === 'paid' ? 'PAID' : 'UNPAID';

                                        $statusClass = $status === 'confirmed'
                                            ? 'bg-sky-50 text-sky-700 ring-sky-100'
                                            : ($status === 'pending'
                                                ? 'bg-amber-50 text-amber-700 ring-amber-100'
                                                : 'bg-slate-100 text-slate-600 ring-slate-200');

                                        $invoiceId = '#INV-' . preg_replace('/[^0-9]/', '', $bill['booking_code'] ?? '');
                                        if ($invoiceId === '#INV-') {
                                            $invoiceId = '#INV-' . ($bill['id'] ?? '');
                                        }

                                        $customerName = $bill['customer_name'] ?? 'Customer';
                                        $customerInitial = getInitial($customerName);
                                        $serviceDateForModal = formatDate($bill['appointment_date'] ?? null);
                                        ?>

                                        <tr class="group transition hover:bg-sky-50/35">
                                            <td class="px-6 py-5 align-middle">
                                                <div class="font-mono text-sm font-black text-slate-800"><?= h($invoiceId) ?></div>
                                                <div class="mt-2 inline-flex rounded-full px-2.5 py-1 text-[10px] font-black uppercase tracking-[0.14em] ring-1 <?= h($statusClass) ?>">
                                                    <?= h($status) ?>
                                                </div>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                                        <?= h($customerInitial) ?>
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="max-w-[190px] truncate font-black text-slate-900"><?= h($customerName) ?></p>
                                                        <p class="mt-0.5 truncate text-xs font-semibold text-slate-400"><?= h($bill['customer_phone'] ?? '—') ?></p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-bold text-slate-700"><?= h(formatDate($bill['appointment_date'] ?? null)) ?></p>
                                                <p class="mt-0.5 text-xs font-semibold text-slate-400"><?= h(formatTime($bill['appointment_time'] ?? null)) ?></p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="max-w-[240px] truncate font-bold text-slate-700"><?= h($bill['service_name'] ?? '—') ?></p>
                                                <p class="mt-0.5 max-w-[240px] truncate text-xs font-semibold text-slate-400">
                                                    <?= h($bill['specialist_name'] ?? 'No specialist assigned') ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-black leading-relaxed text-slate-950"><?= h($bill['total_price'] ?? '—') ?></p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-bold text-slate-600">
                                                    <?= h(!empty($bill['payment_method']) ? ucwords(str_replace('_', ' ', $bill['payment_method'])) : '—') ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1.5 text-xs font-black ring-1 <?= h($paymentClass) ?>">
                                                    <span class="material-symbols-outlined text-[16px]"><?= h($paymentIcon) ?></span>
                                                    <?= h($paymentLabel) ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <div class="flex justify-end gap-2">
                                                    <a
                                                        href="customers.php?search=<?= urlencode($bill['customer_phone'] ?? '') ?>"
                                                        class="inline-flex h-9 items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 text-xs font-black text-slate-600 transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-600"
                                                    >
                                                        <span class="material-symbols-outlined text-[16px]">history</span>
                                                        Client History
                                                    </a>

                                                    <button
                                                        type="button"
                                                        onclick='openStatementModal(
                                                            <?= js($bill['booking_code'] ?? '') ?>,
                                                            <?= js($bill['customer_name'] ?? '') ?>,
                                                            <?= js($bill['service_name'] ?? '') ?>,
                                                            <?= js($bill['total_price'] ?? '') ?>,
                                                            <?= js($serviceDateForModal) ?>
                                                        )'
                                                        class="inline-flex h-9 items-center gap-1.5 rounded-full bg-sky-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-sky-600"
                                                    >
                                                        <span class="material-symbols-outlined text-[16px]">receipt_long</span>
                                                        Statement
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4 border-t border-slate-100 px-6 py-4">
                        <p class="text-sm font-semibold text-slate-500">
                            Showing <?= h($totalBills ? $offset + 1 : 0) ?>–<?= h(min($offset + $perPage, $totalBills)) ?> of <?= h($totalBills) ?> invoices
                        </p>

                        <div class="flex items-center gap-2">
                            <a
                                href="<?= h(buildPageUrl($page - 1, $dateFrom, $dateTo, $filterStatus, $filterPayment, $searchQuery)) ?>"
                                class="inline-flex h-10 items-center rounded-full px-4 text-sm font-black transition <?= $page <= 1 ? 'pointer-events-none text-slate-300' : 'text-slate-600 hover:bg-slate-100' ?>"
                            >
                                Previous
                            </a>

                            <?php for ($i = 1; $i <= min($totalPages, 5); $i++): ?>
                                <a
                                    href="<?= h(buildPageUrl($i, $dateFrom, $dateTo, $filterStatus, $filterPayment, $searchQuery)) ?>"
                                    class="inline-flex h-10 w-10 items-center justify-center rounded-full text-sm font-black transition <?= $i === $page ? 'bg-sky-500 text-white shadow-glow' : 'text-slate-600 hover:bg-slate-100' ?>"
                                >
                                    <?= h($i) ?>
                                </a>
                            <?php endfor; ?>

                            <a
                                href="<?= h(buildPageUrl($page + 1, $dateFrom, $dateTo, $filterStatus, $filterPayment, $searchQuery)) ?>"
                                class="inline-flex h-10 items-center rounded-full px-4 text-sm font-black transition <?= $page >= $totalPages ? 'pointer-events-none text-slate-300' : 'text-slate-600 hover:bg-slate-100' ?>"
                            >
                                Next
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <div id="statementModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/55 p-4 backdrop-blur-sm">
        <div class="max-h-[92vh] w-full max-w-2xl overflow-y-auto rounded-[2rem] bg-white shadow-2xl">
            <div class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-100 bg-white/95 px-6 py-5 backdrop-blur">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-sky-500">Official Document</p>
                    <h3 class="mt-1 text-xl font-black tracking-tight text-slate-950">Client Service Statement</h3>
                </div>

                <div class="flex items-center gap-2 no-print">
                    <button
                        onclick="printStatement()"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition hover:bg-slate-50"
                        type="button"
                    >
                        <span class="material-symbols-outlined text-[20px]">print</span>
                    </button>

                    <button
                        onclick="closeStatementModal()"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition hover:bg-rose-50 hover:text-rose-500"
                        type="button"
                    >
                        <span class="material-symbols-outlined text-[20px]">close</span>
                    </button>
                </div>
            </div>

            <div class="p-6">
                <div class="rounded-[1.75rem] border border-sky-100 bg-gradient-to-br from-sky-50 to-white p-5">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Statement ID</p>
                            <p id="stmtId" class="mt-1 font-mono text-lg font-black text-slate-950">#STMT-</p>
                        </div>

                        <div class="text-left sm:text-right">
                            <p class="text-sm font-semibold text-slate-500">Service Date</p>
                            <p id="stmtDate" class="mt-1 text-lg font-black text-slate-950">—</p>
                        </div>
                    </div>

                    <div class="mt-5 rounded-2xl bg-white/85 p-4 ring-1 ring-white">
                        <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Client Profile</p>
                        <p id="stmtClientName" class="mt-2 text-xl font-black text-slate-950">—</p>
                        <p class="mt-1 text-sm font-semibold text-slate-500">
                            Associated Booking:
                            <span id="stmtBooking" class="font-mono text-slate-800">—</span>
                        </p>
                    </div>
                </div>

                <div class="mt-5 overflow-hidden rounded-[1.5rem] border border-slate-200">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-left text-xs font-black uppercase tracking-[0.14em] text-slate-400">
                            <tr>
                                <th class="px-4 py-3">Service Description</th>
                                <th class="px-4 py-3">Unit Price</th>
                                <th class="px-4 py-3">Qty</th>
                                <th class="px-4 py-3 text-right">Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td id="stmtServiceDesc" class="px-4 py-4 font-bold text-slate-800">—</td>
                                <td id="stmtUnitPrice" class="px-4 py-4 font-semibold text-slate-600">—</td>
                                <td class="px-4 py-4 font-semibold text-slate-600">1</td>
                                <td id="stmtTotal" class="px-4 py-4 text-right font-black text-slate-950">—</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-5 rounded-[1.5rem] bg-slate-950 p-5 text-white">
                    <div class="flex items-center justify-between gap-4">
                        <p class="text-sm font-semibold text-white/60">Subtotal</p>
                        <p id="stmtSubtotal" class="font-bold">—</p>
                    </div>

                    <div class="mt-3 flex items-center justify-between gap-4 border-t border-white/10 pt-4">
                        <p class="text-sm font-black uppercase tracking-[0.18em] text-white/50">Total Amount Due</p>
                        <div class="text-right">
                            <p id="stmtAmountDue" class="text-2xl font-black tracking-tight">—</p>
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/40">VND</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 grid gap-4 sm:grid-cols-2 no-print">
                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Accepted Payment Method</label>
                        <select id="stmtPaymentMethod" class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none focus:border-sky-300 focus:ring-4 focus:ring-sky-100">
                            <option value="cash">Cash</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="momo">MoMo</option>
                            <option value="vnpay">VNPay</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Payment Resolution Status</label>
                        <select id="stmtPaymentStatus" class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none focus:border-sky-300 focus:ring-4 focus:ring-sky-100">
                            <option value="unpaid">Unpaid</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap justify-end gap-3 no-print">
                    <button
                        type="button"
                        onclick="closeStatementModal()"
                        class="inline-flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                    >
                        Close Statement
                    </button>

                    <button
                        type="button"
                        onclick="registerPayment()"
                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:bg-sky-600"
                    >
                        <span class="material-symbols-outlined text-[18px]">check_circle</span>
                        Register Payment
                    </button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="stmtBookingCode" value=""/>

    <script>
        function openStatementModal(bookingCode, clientName, serviceName, totalPrice, serviceDate) {
            document.getElementById('stmtBookingCode').value = bookingCode;
            document.getElementById('stmtId').textContent = '#STMT-' + String(bookingCode || '').replace(/[^0-9A-Za-z]/g, '');
            document.getElementById('stmtDate').textContent = serviceDate || '—';
            document.getElementById('stmtClientName').textContent = clientName || '—';
            document.getElementById('stmtBooking').textContent = bookingCode ? '#' + bookingCode : '—';
            document.getElementById('stmtServiceDesc').textContent = (serviceName || '—') + ' (session)';

            var numericValue = String(totalPrice || '').replace(/[^0-9]/g, '');
            var formatted = numericValue ? parseInt(numericValue, 10).toLocaleString('vi-VN') + ' VND' : '—';

            document.getElementById('stmtUnitPrice').textContent = formatted;
            document.getElementById('stmtTotal').textContent = totalPrice || formatted;
            document.getElementById('stmtSubtotal').textContent = totalPrice || formatted;
            document.getElementById('stmtAmountDue').textContent = totalPrice || formatted;

            document.getElementById('statementModal').classList.remove('hidden');
            document.getElementById('statementModal').classList.add('flex');
        }

        function closeStatementModal() {
            document.getElementById('statementModal').classList.add('hidden');
            document.getElementById('statementModal').classList.remove('flex');
        }

        function printStatement() {
            window.print();
        }

        function registerPayment() {
            var bookingCode = document.getElementById('stmtBookingCode').value;
            var paymentMethod = document.getElementById('stmtPaymentMethod').value;

            var form = new FormData();
            form.append('action', 'confirm_payment');
            form.append('booking_code', bookingCode);
            form.append('payment_method', paymentMethod);
            form.append('payment_note', '');

            fetch('../backend/payments_api.php', {
                method: 'POST',
                body: form
            })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    if (data.success) {
                        alert('Payment registered successfully.');
                        closeStatementModal();
                        window.location.reload();
                    } else {
                        alert(data.message || 'Failed to register payment.');
                    }
                })
                .catch(function() {
                    alert('Network error.');
                });
        }

        var statementModal = document.getElementById('statementModal');

        statementModal.addEventListener('click', function(event) {
            if (event.target === statementModal) {
                closeStatementModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeStatementModal();
            }
        });
    </script>

    <?php
    $bookingParam = trim($_GET['booking'] ?? '');

    if ($bookingParam !== '') {
        $match = null;

        foreach ($paginated as $bill) {
            if (($bill['booking_code'] ?? '') === $bookingParam) {
                $match = $bill;
                break;
            }
        }

        if (!$match) {
            $stmtOne = $conn->prepare("
                SELECT booking_code, customer_name, service_name, total_price, appointment_date 
                FROM appointments 
                WHERE booking_code = ? 
                LIMIT 1
            ");
            $stmtOne->execute([$bookingParam]);
            $match = $stmtOne->fetch(PDO::FETCH_ASSOC);
        }

        if ($match):
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                openStatementModal(
                    <?= js($match['booking_code'] ?? '') ?>,
                    <?= js($match['customer_name'] ?? '') ?>,
                    <?= js($match['service_name'] ?? '') ?>,
                    <?= js($match['total_price'] ?? '') ?>,
                    <?= js(isset($match['appointment_date']) ? formatDate($match['appointment_date']) : '') ?>
                );
            });
        </script>
    <?php
        endif;
    }
    ?>
</body>
</html>