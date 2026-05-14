<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'customers';

$search = trim($_GET['search'] ?? '');
$filterSkin = trim($_GET['skin'] ?? '');
$filterVisit = trim($_GET['visit'] ?? '');

$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = 10;

$stmt = $conn->query("SELECT Customer_ID, Name, Phone, Email, Skin_type, Created_at FROM `Customer` ORDER BY Name ASC");
$allCustomers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$appointmentsByCustomer = [];

$stmt = $conn->query("SELECT customer_name, customer_phone, appointment_date, total_price FROM appointments WHERE status != 'cancelled'");

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

$customersWithStats = [];

foreach ($allCustomers as $customer) {
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

    $customersWithStats[] = $customer;
}

if ($search !== '') {
    $searchLower = function_exists('mb_strtolower')
        ? mb_strtolower($search, 'UTF-8')
        : strtolower($search);

    $customersWithStats = array_filter($customersWithStats, function ($customer) use ($searchLower, $search) {
        $name = function_exists('mb_strtolower')
            ? mb_strtolower($customer['Name'] ?? '', 'UTF-8')
            : strtolower($customer['Name'] ?? '');

        $phone = function_exists('mb_strtolower')
            ? mb_strtolower($customer['Phone'] ?? '', 'UTF-8')
            : strtolower($customer['Phone'] ?? '');

        $email = function_exists('mb_strtolower')
            ? mb_strtolower($customer['Email'] ?? '', 'UTF-8')
            : strtolower($customer['Email'] ?? '');

        $customerId = '#ELC' . str_pad((string)($customer['Customer_ID'] ?? ''), 5, '0', STR_PAD_LEFT);

        return strpos($name, $searchLower) !== false
            || strpos($phone, $searchLower) !== false
            || strpos($email, $searchLower) !== false
            || strpos($customerId, $search) !== false;
    });
}

if ($filterSkin !== '') {
    $customersWithStats = array_filter($customersWithStats, function ($customer) use ($filterSkin) {
        return strtoupper(trim($customer['Skin_type'] ?? '')) === strtoupper($filterSkin);
    });
}

if ($filterVisit === 'week') {
    $weekAgo = date('Y-m-d', strtotime('-7 days'));

    $customersWithStats = array_filter($customersWithStats, function ($customer) use ($weekAgo) {
        return !empty($customer['last_visit']) && $customer['last_visit'] >= $weekAgo;
    });
} elseif ($filterVisit === 'month') {
    $monthAgo = date('Y-m-d', strtotime('-30 days'));

    $customersWithStats = array_filter($customersWithStats, function ($customer) use ($monthAgo) {
        return !empty($customer['last_visit']) && $customer['last_visit'] >= $monthAgo;
    });
}

$customersWithStats = array_values($customersWithStats);

$totalCount = count($customersWithStats);
$totalCustomers = count($allCustomers);

$newThisMonth = 0;
$monthStart = date('Y-m-01');

foreach ($allCustomers as $customer) {
    if (!empty($customer['Created_at']) && $customer['Created_at'] >= $monthStart) {
        $newThisMonth++;
    }
}

$activeCustomers = 0;
$monthAgo = date('Y-m-d', strtotime('-30 days'));

foreach ($allCustomers as $customer) {
    $name = $customer['Name'] ?? '';
    $phone = $customer['Phone'] ?? '';

    $key1 = $name . '|' . $phone;
    $key2 = $name . '|';
    $key3 = '|' . $phone;

    $stats = $appointmentsByCustomer[$key1]
        ?? $appointmentsByCustomer[$key2]
        ?? $appointmentsByCustomer[$key3]
        ?? null;

    if ($stats && !empty($stats['last_visit']) && $stats['last_visit'] >= $monthAgo) {
        $activeCustomers++;
    }
}

$totalPages = max(1, (int)ceil($totalCount / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;

$paginated = array_slice($customersWithStats, $offset, $perPage);

$skinTypes = array_unique(array_filter(array_map(function ($customer) {
    return trim($customer['Skin_type'] ?? '');
}, $allCustomers)));

sort($skinTypes);

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
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
    return number_format((int)$value, 0, ',', '.') . ' đ';
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

function buildPageUrl(int $targetPage, string $search, string $filterSkin, string $filterVisit): string
{
    return '?' . http_build_query([
        'page' => $targetPage,
        'search' => $search,
        'skin' => $filterSkin,
        'visit' => $filterVisit,
    ]);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Customer Management | Elysian Management Hub</title>

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
        $title = 'Customers';
        $subtitle = 'Customer profiles, visit history and treatment records.';
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
                                    Customer workspace
                                </div>

                                <div class="inline-flex items-center gap-2 rounded-full bg-white/85 px-3 py-1.5 text-xs font-bold text-slate-400 ring-1 ring-slate-100">
                                    <span>Customers</span>
                                    <span class="material-symbols-outlined text-[15px]">chevron_right</span>
                                    <span class="text-slate-600">Management</span>
                                </div>
                            </div>

                            <h2 class="max-w-4xl text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                                Customer management for profiles, visits and treatment history.
                            </h2>

                            <p class="mt-3 max-w-2xl text-base font-medium leading-relaxed text-slate-500">
                                Search customer records, review recent visits and open detailed profiles for appointment and treatment tracking.
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] border border-white/80 bg-white/85 p-4 shadow-sm backdrop-blur">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Total profiles</p>
                                <p class="mt-2 text-3xl font-black tracking-tight text-slate-900"><?= h($totalCustomers) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-400"><?= h($newThisMonth) ?> new this month</p>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/80 bg-slate-950 p-4 text-white shadow-glow">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/50">Visible results</p>
                                <p class="mt-2 text-3xl font-black tracking-tight"><?= h($totalCount) ?></p>
                                <p class="text-sm font-semibold text-white/55">after filters</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-7 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Total customers</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($totalCustomers) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">All customer profiles</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[24px]">people</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-emerald-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Active customers</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($activeCustomers) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Visited in last 30 days</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <span class="material-symbols-outlined text-[24px]">check_circle</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-violet-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">New this month</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($newThisMonth) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Profiles created this month</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <span class="material-symbols-outlined text-[24px]">person_add</span>
                            </div>
                        </div>
                    </article>

                    <article class="group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-amber-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Filtered results</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($totalCount) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Matching current filters</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <span class="material-symbols-outlined text-[24px]">filter_alt</span>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="mb-6 rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-black tracking-tight text-slate-950">Customer filters</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">Search by name, phone, email or customer ID.</p>
                        </div>

                        <div class="flex flex-wrap items-center gap-2">
                            <a
                                href="customers.php"
                                class="inline-flex h-11 items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                            >
                                <span class="material-symbols-outlined text-[18px]">refresh</span>
                                Reset
                            </a>

                            <a
                                href="create_customer.php"
                                class="inline-flex h-11 items-center justify-center gap-2 rounded-full bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                            >
                                <span class="material-symbols-outlined text-[19px]">person_add</span>
                                New Customer
                            </a>
                        </div>
                    </div>

                    <form method="get" action="customers.php" class="grid gap-3 lg:grid-cols-[1.2fr_0.7fr_0.7fr_auto]">
                        <div class="relative">
                            <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">search</span>
                            <input
                                type="text"
                                name="search"
                                value="<?= h($search) ?>"
                                placeholder="Search customers..."
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-12 pr-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                            />
                        </div>

                        <select
                            name="visit"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Last Visit: All</option>
                            <option value="week" <?= $filterVisit === 'week' ? 'selected' : '' ?>>This Week</option>
                            <option value="month" <?= $filterVisit === 'month' ? 'selected' : '' ?>>This Month</option>
                        </select>

                        <select
                            name="skin"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Skin Type: All</option>
                            <?php foreach ($skinTypes as $skinType): ?>
                                <?php if ($skinType === '') continue; ?>
                                <option value="<?= h($skinType) ?>" <?= $filterSkin === $skinType ? 'selected' : '' ?>>
                                    <?= h($skinType) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

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
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Customer Management</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                Showing <?= h($totalCount ? $offset + 1 : 0) ?>–<?= h(min($offset + $perPage, $totalCount)) ?> of <?= h($totalCount) ?> customers
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Customer database
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1120px] text-left text-sm">
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
                                <?php if (empty($paginated)): ?>
                                    <tr>
                                        <td colspan="7" class="px-6 py-16 text-center">
                                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-sky-500">
                                                <span class="material-symbols-outlined text-[30px]">person_search</span>
                                            </div>
                                            <h4 class="mt-4 text-lg font-black text-slate-900">No customers found</h4>
                                            <p class="mt-1 text-sm font-medium text-slate-500">Try changing the search keyword or removing some filters.</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($paginated as $customer): ?>
                                        <?php
                                        $customerId = '#ELC' . str_pad((string)($customer['Customer_ID'] ?? ''), 5, '0', STR_PAD_LEFT);
                                        $customerName = $customer['Name'] ?? 'Customer';
                                        $initial = getInitial($customerName);
                                        $skinType = trim($customer['Skin_type'] ?? '');
                                        $skinLabel = $skinType !== '' ? $skinType : '—';
                                        $contactLine = !empty($customer['Email']) ? $customer['Email'] : 'No email';
                                        ?>
                                        <tr class="group transition hover:bg-sky-50/35">
                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-mono text-sm font-black text-slate-800">
                                                    <?= h($customerId) ?>
                                                </p>
                                                <p class="mt-1 text-xs font-semibold text-slate-400">
                                                    <?= h(formatDate($customer['Created_at'] ?? null)) ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                                        <?= h($initial) ?>
                                                    </div>

                                                    <div class="min-w-0">
                                                        <p class="max-w-[220px] truncate font-black text-slate-900">
                                                            <?= h($customerName) ?>
                                                        </p>
                                                        <p class="mt-0.5 max-w-[220px] truncate text-xs font-semibold text-slate-400">
                                                            <?= h($contactLine) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-bold text-slate-700">
                                                    <?= h($customer['Phone'] ?: '—') ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <span class="inline-flex items-center rounded-full px-3 py-1.5 text-xs font-black ring-1 <?= h(skinBadgeClass($skinType)) ?>">
                                                    <?= h($skinLabel) ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-bold text-slate-700">
                                                    <?= h(formatDate($customer['last_visit'] ?? null)) ?>
                                                </p>
                                                <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                    <?= h((int)($customer['visit_count'] ?? 0)) ?> visits
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-black text-slate-950">
                                                    <?= h(formatMoney($customer['total_spent'] ?? 0)) ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
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

                    <div class="flex flex-wrap items-center justify-between gap-4 border-t border-slate-100 px-6 py-4">
                        <p class="text-sm font-semibold text-slate-500">
                            Showing <?= h($totalCount ? $offset + 1 : 0) ?>–<?= h(min($offset + $perPage, $totalCount)) ?> of <?= h($totalCount) ?> customers
                        </p>

                        <div class="flex items-center gap-2">
                            <a
                                href="<?= h(buildPageUrl($page - 1, $search, $filterSkin, $filterVisit)) ?>"
                                class="inline-flex h-10 items-center rounded-full px-4 text-sm font-black transition <?= $page <= 1 ? 'pointer-events-none text-slate-300' : 'text-slate-600 hover:bg-slate-100' ?>"
                            >
                                Previous
                            </a>

                            <?php for ($i = 1; $i <= min($totalPages, 5); $i++): ?>
                                <a
                                    href="<?= h(buildPageUrl($i, $search, $filterSkin, $filterVisit)) ?>"
                                    class="inline-flex h-10 w-10 items-center justify-center rounded-full text-sm font-black transition <?= $i === $page ? 'bg-sky-500 text-white shadow-glow' : 'text-slate-600 hover:bg-slate-100' ?>"
                                >
                                    <?= h($i) ?>
                                </a>
                            <?php endfor; ?>

                            <a
                                href="<?= h(buildPageUrl($page + 1, $search, $filterSkin, $filterVisit)) ?>"
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
</body>
</html>