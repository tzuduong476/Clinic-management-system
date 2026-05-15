<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'treatment_plans';
$isDoctor = (($currentUser['role'] ?? '') === 'doctor');

$search = trim($_GET['search'] ?? '');
$filterStatus = trim($_GET['status'] ?? '');

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function lowerText($value): string
{
    $value = (string)$value;

    return function_exists('mb_strtolower')
        ? mb_strtolower($value, 'UTF-8')
        : strtolower($value);
}

function formatDate($date): string
{
    if (!$date) {
        return '—';
    }

    return date('M j, Y', strtotime((string)$date));
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

function statusBadgeClass(string $status): string
{
    if ($status === 'completed') {
        return 'bg-emerald-50 text-emerald-700 ring-emerald-100';
    }

    if ($status === 'cancelled') {
        return 'bg-slate-100 text-slate-600 ring-slate-200';
    }

    return 'bg-sky-50 text-sky-700 ring-sky-100';
}

$sql = "
    SELECT
        tp.id,
        tp.customer_id,
        c.Name AS customer_name,
        c.Phone AS customer_phone,
        tp.title,
        tp.specialist_id,
        s.name AS specialist_name,
        tp.start_date,
        tp.status,
        tp.updated_at,
        (
            SELECT COUNT(*)
            FROM treatment_plan_sessions tps
            WHERE tps.plan_id = tp.id
        ) AS session_count,
        (
            SELECT COUNT(*)
            FROM treatment_plan_sessions tps
            WHERE tps.plan_id = tp.id AND tps.completed_at IS NOT NULL
        ) AS completed_sessions,
        (
            SELECT CONCAT(tss.scheduled_date, ' ', tss.scheduled_time)
            FROM treatment_plan_sessions tps2
            LEFT JOIN treatment_session_schedules tss ON tps2.id = tss.plan_session_id
            WHERE tps2.plan_id = tp.id 
              AND tss.status = 'scheduled'
              AND (tss.scheduled_date > CURDATE() OR (tss.scheduled_date = CURDATE() AND tss.scheduled_time > CURTIME()))
            ORDER BY tss.scheduled_date ASC, tss.scheduled_time ASC
            LIMIT 1
        ) AS next_session
    FROM treatment_plans tp
    LEFT JOIN `Customer` c ON c.Customer_ID = tp.customer_id
    LEFT JOIN specialists s ON s.id = tp.specialist_id
    ORDER BY tp.updated_at DESC, tp.id DESC
";

$plans = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if ($search !== '') {
    $needle = lowerText($search);

    $plans = array_values(array_filter($plans, function ($plan) use ($needle) {
        $customerId = '#ELC' . str_pad((string)($plan['customer_id'] ?? ''), 5, '0', STR_PAD_LEFT);

        $text = ($plan['customer_name'] ?? '') . ' ' .
            ($plan['customer_phone'] ?? '') . ' ' .
            ($plan['title'] ?? '') . ' ' .
            ($plan['specialist_name'] ?? '') . ' ' .
            $customerId;

        return strpos(lowerText($text), $needle) !== false;
    }));
}

if ($filterStatus !== '' && in_array($filterStatus, ['active', 'completed', 'cancelled'], true)) {
    $plans = array_values(array_filter($plans, function ($plan) use ($filterStatus) {
        return ($plan['status'] ?? '') === $filterStatus;
    }));
}

$totalPlans = (int)$conn->query("SELECT COUNT(*) FROM treatment_plans")->fetchColumn();
$activePlans = (int)$conn->query("SELECT COUNT(*) FROM treatment_plans WHERE status = 'active'")->fetchColumn();
$completedPlans = (int)$conn->query("SELECT COUNT(*) FROM treatment_plans WHERE status = 'completed'")->fetchColumn();
$cancelledPlans = (int)$conn->query("SELECT COUNT(*) FROM treatment_plans WHERE status = 'cancelled'")->fetchColumn();

$totalVisiblePlans = count($plans);

$customersWithoutActivePlan = [];

if ($isDoctor) {
    $customersWithoutActivePlan = $conn->query("
        SELECT c.Customer_ID, c.Name, c.Phone
        FROM `Customer` c
        WHERE NOT EXISTS (
            SELECT 1
            FROM treatment_plans tp
            WHERE tp.customer_id = c.Customer_ID
              AND tp.status = 'active'
        )
        ORDER BY c.Name ASC
        LIMIT 10
    ")->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Treatment Plans | Elysian Management Hub</title>

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
        $title = 'Treatment Plans';
        $subtitle = 'Patient pathways and session progress.';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1500px] px-8 py-8">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Treatment Plans
                        </div>

                        <h2 class="text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                            Treatment plan management
                        </h2>
                    </div>

                    <?php if ($isDoctor): ?>
                        <a
                            href="create_plan.php"
                            class="inline-flex h-11 items-center justify-center gap-2 rounded-full bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                        >
                            <span class="material-symbols-outlined text-[19px]">add_circle</span>
                            Create Plan
                        </a>
                    <?php endif; ?>
                </div>

                <section class="mb-7 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>

                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Total</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($totalPlans) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">All plans</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[24px]">clinical_notes</span>
                            </div>
                        </div>
                    </article>

                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-emerald-50"></div>

                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Active</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($activePlans) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">In progress</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <span class="material-symbols-outlined text-[24px]">timeline</span>
                            </div>
                        </div>
                    </article>

                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-violet-50"></div>

                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Completed</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($completedPlans) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Finished</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <span class="material-symbols-outlined text-[24px]">task_alt</span>
                            </div>
                        </div>
                    </article>

                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-soft">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-slate-100"></div>

                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Visible</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($totalVisiblePlans) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">After filters</p>
                            </div>

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">
                                <span class="material-symbols-outlined text-[24px]">filter_alt</span>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="mb-6 rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
                        <h3 class="text-lg font-black tracking-tight text-slate-950">Filters</h3>

                        <a
                            href="treatment_plans.php"
                            class="inline-flex h-11 items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                        >
                            <span class="material-symbols-outlined text-[18px]">refresh</span>
                            Reset
                        </a>
                    </div>

                    <form method="get" action="treatment_plans.php" class="grid gap-3 lg:grid-cols-[1.2fr_0.7fr_auto]">
                        <div class="relative">
                            <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">search</span>
                            <input
                                type="text"
                                name="search"
                                value="<?= h($search) ?>"
                                placeholder="Search plans..."
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-12 pr-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                            />
                        </div>

                        <select
                            name="status"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Status: All</option>
                            <option value="active" <?= $filterStatus === 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="completed" <?= $filterStatus === 'completed' ? 'selected' : '' ?>>Completed</option>
                            <option value="cancelled" <?= $filterStatus === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
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
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Treatment Plans</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                <?= h($totalVisiblePlans) ?> records
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Plans
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1080px] text-left text-sm">
                            <thead>
                                <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                    <th class="px-6 py-4">Patient</th>
                                    <th class="px-6 py-4">Plan</th>
                                    <th class="px-6 py-4">Specialist</th>
                                    <th class="px-6 py-4">Next Session</th>
                                    <th class="px-6 py-4">Progress</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                <?php if (empty($plans)): ?>
                                    <tr>
                                        <td colspan="7" class="px-6 py-16 text-center">
                                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-sky-500">
                                                <span class="material-symbols-outlined text-[30px]">clinical_notes</span>
                                            </div>
                                            <h4 class="mt-4 text-lg font-black text-slate-900">No plans found</h4>
                                            <p class="mt-1 text-sm font-medium text-slate-500">Try another keyword or status.</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($plans as $plan): ?>
                                        <?php
                                        $sessionCount = (int)($plan['session_count'] ?? 0);
                                        $completedSessions = (int)($plan['completed_sessions'] ?? 0);
                                        $progress = $sessionCount > 0 ? (int)round(($completedSessions / $sessionCount) * 100) : 0;
                                        $status = $plan['status'] ?? 'active';
                                        $customerName = $plan['customer_name'] ?? 'Unknown';
                                        $customerId = '#ELC' . str_pad((string)($plan['customer_id'] ?? ''), 5, '0', STR_PAD_LEFT);
                                        ?>
                                        <tr class="group transition hover:bg-sky-50/35">
                                            <td class="px-6 py-5 align-middle">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                                        <?= h(getInitial($customerName)) ?>
                                                    </div>

                                                    <div class="min-w-0">
                                                        <p class="max-w-[210px] truncate font-black text-slate-900">
                                                            <?= h($customerName) ?>
                                                        </p>
                                                        <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                            <?= h($customerId) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="max-w-[260px] truncate font-black text-slate-900">
                                                    <?= h($plan['title'] ?? 'Untitled plan') ?>
                                                </p>
                                                <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                    <?= h(formatDate($plan['start_date'] ?? null)) ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-bold text-slate-700">
                                                    <?= h($plan['specialist_name'] ?? '—') ?>
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <?php 
                                                $nextSession = $plan['next_session'] ?? null;
                                                if ($nextSession): 
                                                    $nextDateTime = strtotime($nextSession);
                                                    $isToday = date('Y-m-d', $nextDateTime) === date('Y-m-d');
                                                    $isTomorrow = date('Y-m-d', $nextDateTime) === date('Y-m-d', strtotime('+1 day'));
                                                ?>
                                                    <div class="<?= $isToday ? 'bg-amber-50 text-amber-700' : 'bg-emerald-50 text-emerald-700' ?> rounded-xl px-3 py-2 text-xs font-black">
                                                        <?php if ($isToday): ?>
                                                            <span class="flex items-center gap-1">
                                                                <span class="relative flex h-2 w-2">
                                                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-75"></span>
                                                                    <span class="relative inline-flex h-2 w-2 rounded-full bg-amber-500"></span>
                                                                </span>
                                                                Today, <?= date('H:i', $nextDateTime) ?>
                                                            </span>
                                                        <?php elseif ($isTomorrow): ?>
                                                            Tomorrow, <?= date('H:i', $nextDateTime) ?>
                                                        <?php else: ?>
                                                            <?= date('M j', $nextDateTime) ?>, <?= date('H:i', $nextDateTime) ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-xs font-semibold text-slate-400">No schedule</span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <div class="flex items-center gap-3">
                                                    <div class="h-2 min-w-[120px] flex-1 overflow-hidden rounded-full bg-slate-100">
                                                        <div class="h-full rounded-full bg-sky-500" style="width: <?= h($progress) ?>%"></div>
                                                    </div>

                                                    <span class="text-xs font-black text-slate-600">
                                                        <?= h($progress) ?>%
                                                    </span>
                                                </div>

                                                <p class="mt-1 text-xs font-semibold text-slate-400">
                                                    <?= h($completedSessions) ?> / <?= h($sessionCount) ?> sessions
                                                </p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <span class="inline-flex rounded-full px-3 py-1.5 text-xs font-black uppercase ring-1 <?= h(statusBadgeClass($status)) ?>">
                                                    <?= h($status) ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <div class="flex justify-end">
                                                    <a
                                                        href="customer_detail.php?id=<?= h((int)$plan['customer_id']) ?>&tab=plan"
                                                        class="inline-flex h-9 items-center gap-1.5 rounded-full bg-sky-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-sky-600"
                                                    >
                                                        View
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
                        Showing <?= h($totalVisiblePlans) ?> of <?= h($totalPlans) ?> plans
                    </div>
                </section>

                <?php if ($isDoctor): ?>
                    <section class="mt-6 overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                            <div>
                                <h3 class="text-2xl font-black tracking-tight text-slate-950">Patients Without Active Plans</h3>
                                <p class="mt-1 text-sm font-medium text-slate-500">
                                    <?= h(count($customersWithoutActivePlan)) ?> patients
                                </p>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[760px] text-left text-sm">
                                <thead>
                                    <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                        <th class="px-6 py-4">PID</th>
                                        <th class="px-6 py-4">Patient</th>
                                        <th class="px-6 py-4">Phone</th>
                                        <th class="px-6 py-4 text-right">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-slate-100">
                                    <?php if (empty($customersWithoutActivePlan)): ?>
                                        <tr>
                                            <td colspan="4" class="px-6 py-12 text-center text-sm font-semibold text-slate-500">
                                                All patients have active plans.
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($customersWithoutActivePlan as $customer): ?>
                                            <?php
                                            $customerId = '#ELC' . str_pad((string)$customer['Customer_ID'], 5, '0', STR_PAD_LEFT);
                                            ?>
                                            <tr class="transition hover:bg-sky-50/35">
                                                <td class="px-6 py-5 font-mono text-sm font-black text-slate-800">
                                                    <?= h($customerId) ?>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <p class="font-black text-slate-900">
                                                        <?= h($customer['Name'] ?? 'Unknown') ?>
                                                    </p>
                                                </td>

                                                <td class="px-6 py-5 font-bold text-slate-700">
                                                    <?= h($customer['Phone'] ?: '—') ?>
                                                </td>

                                                <td class="px-6 py-5">
                                                    <div class="flex justify-end">
                                                        <a
                                                            href="create_plan.php?customer_id=<?= h((int)$customer['Customer_ID']) ?>"
                                                            class="inline-flex h-9 items-center rounded-full bg-sky-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-sky-600"
                                                        >
                                                            Create
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>