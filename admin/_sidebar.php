<?php
$currentPage = $currentPage ?? 'dashboard';

$userRole = $currentUser['role'] ?? 'admin';

$isAdmin = $userRole === 'admin';
$isReceptionist = $userRole === 'receptionist';
$isDoctor = $userRole === 'doctor';

$roleLabel = $userRole === 'receptionist'
    ? 'Front Desk'
    : ($userRole === 'doctor' ? 'Doctor' : 'Director');

$userName = $currentUser['full_name'] ?? 'Admin';

$sidebarEscape = function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$sidebarInitials = function (string $name): string {
    $name = trim($name);

    if ($name === '') {
        return 'A';
    }

    $parts = preg_split('/\s+/', $name);
    $first = $parts[0] ?? '';
    $last = count($parts) > 1 ? $parts[count($parts) - 1] : '';

    if (function_exists('mb_substr')) {
        if ($last !== '') {
            return mb_strtoupper(
                mb_substr($first, 0, 1, 'UTF-8') . mb_substr($last, 0, 1, 'UTF-8'),
                'UTF-8'
            );
        }

        return mb_strtoupper(mb_substr($first, 0, 1, 'UTF-8'), 'UTF-8');
    }

    if ($last !== '') {
        return strtoupper(substr($first, 0, 1) . substr($last, 0, 1));
    }

    return strtoupper(substr($first, 0, 1));
};

$nav = function (string $page, string $href, string $icon, string $label) use ($currentPage, $sidebarEscape): void {
    $active = $currentPage === $page;

    $linkClass = $active
        ? 'bg-sky-500 text-white shadow-[0_14px_35px_rgba(14,165,233,0.24)]'
        : 'text-slate-500 hover:bg-sky-50 hover:text-sky-700';

    $iconClass = $active
        ? 'bg-white/20 text-white'
        : 'bg-slate-50 text-slate-400 group-hover:bg-white group-hover:text-sky-600';

    echo '<a href="' . $sidebarEscape($href) . '" class="group relative mb-1 flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-black transition-all duration-200 ' . $linkClass . '">';

    if ($active) {
        echo '<span class="absolute -left-4 top-1/2 h-8 w-1 -translate-y-1/2 rounded-r-full bg-sky-400"></span>';
    }

    echo '<span class="material-symbols-outlined flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-[20px] transition ' . $iconClass . '">' . $sidebarEscape($icon) . '</span>';
    echo '<span class="truncate">' . $sidebarEscape($label) . '</span>';
    echo '</a>';
};
?>

<aside class="flex h-screen w-72 shrink-0 flex-col overflow-hidden border-r border-sky-100 bg-white/95 shadow-[18px_0_60px_rgba(15,23,42,0.04)] backdrop-blur">
    <div class="border-b border-slate-100 px-5 py-5">
        <div class="relative overflow-hidden rounded-[1.5rem] border border-sky-100 bg-gradient-to-br from-sky-50 via-white to-cyan-50 p-4">
            <div class="pointer-events-none absolute -right-10 -top-10 h-28 w-28 rounded-full bg-sky-200/50 blur-2xl"></div>

            <div class="relative flex items-center justify-center">
                <?php $logoClass = 'h-12 w-auto max-w-full'; ?>
                <?php include __DIR__ . '/../shared/logo_svg.php'; ?>
            </div>
        </div>
    </div>

    <nav class="min-h-0 flex-1 overflow-y-auto px-4 py-5">
        <div class="mb-3 px-3 text-[10px] font-black uppercase tracking-[0.22em] text-slate-400">
            Main
        </div>

        <?php if (!$isDoctor): ?>
            <?php $nav('dashboard', 'index.php', 'dashboard', 'Dashboard'); ?>
        <?php endif; ?>
        <?php $nav('calendar', 'calendar.php', 'calendar_today', 'Calendar'); ?>
        <?php $nav('customers', 'customers.php', 'people', 'Customers'); ?>
        <?php $nav('treatments', 'service_management.php', 'medical_services', 'Services'); ?>
        <?php $nav('treatment_plans', 'treatment_plans.php', 'clinical_notes', 'Treatment Plans'); ?>

        <?php if ($isAdmin || $isReceptionist): ?>
            <div class="mb-3 mt-6 px-3 text-[10px] font-black uppercase tracking-[0.22em] text-slate-400">
                Finance
            </div>

            <?php $nav('billing', 'billing.php', 'payments', 'Billing'); ?>
        <?php endif; ?>

        <?php if ($isAdmin): ?>
            <div class="mb-3 mt-6 px-3 text-[10px] font-black uppercase tracking-[0.22em] text-slate-400">
                Insights
            </div>

            <?php $nav('reports', 'reports.php', 'bar_chart', 'Reports'); ?>
        <?php endif; ?>
    </nav>

    <div class="border-t border-slate-100 p-4">
        <div class="rounded-[1.5rem] border border-slate-100 bg-slate-50/80 p-3">
            <div class="flex min-w-0 items-center gap-3">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-500 text-sm font-black text-white shadow-[0_12px_28px_rgba(14,165,233,0.24)]">
                    <?= $sidebarEscape($sidebarInitials($userName)) ?>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="truncate text-sm font-black text-slate-900">
                        <?= $sidebarEscape($userName) ?>
                    </p>

                    <p class="mt-0.5 truncate text-[11px] font-black uppercase tracking-[0.16em] text-slate-400">
                        <?= $sidebarEscape($roleLabel) ?>
                    </p>
                </div>
            </div>

            <a
                href="../backend/logout.php"
                class="mt-3 flex h-10 items-center justify-center gap-2 rounded-2xl bg-white text-xs font-black text-slate-500 ring-1 ring-slate-200 transition hover:bg-rose-50 hover:text-rose-600 hover:ring-rose-100"
            >
                <span class="material-symbols-outlined text-[17px]">logout</span>
                Sign Out
            </a>
        </div>
    </div>
</aside>