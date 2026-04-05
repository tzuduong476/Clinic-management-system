<?php
$currentPage = $currentPage ?? 'dashboard';
$userRole = $currentUser['role'] ?? 'admin';
$nav = function($page, $href, $icon, $label) use ($currentPage) {
    $active = $currentPage === $page;
    $cls = $active ? 'bg-primary/10 text-primary font-semibold' : 'text-slate-600 hover:bg-slate-100 font-medium';
    echo '<a href="' . htmlspecialchars($href) . '" class="flex items-center gap-3 px-4 py-3 rounded-lg ' . $cls . ' mb-1">';
    echo '<span class="material-symbols-outlined">' . $icon . '</span>' . $label . '</a>';
};
$roleLabel = $userRole === 'receptionist' ? 'Front Desk Manager' : ($userRole === 'doctor' ? 'Doctor' : 'Clinical Director');
?>
<aside class="w-64 bg-white border-r border-slate-200 flex flex-col shrink-0">
    <div class="p-6 border-b border-slate-100">
        <h1 class="text-lg font-bold text-slate-800">ELYSIAN MANAGEMENT HUB</h1>
    </div>
    <nav class="p-4 flex-1">
        <?php $nav('dashboard', 'index.php', 'dashboard', 'Dashboard'); ?>
        <?php $nav('calendar', 'calendar.php', 'calendar_today', 'Calendar'); ?>
        <?php $nav('customers', 'customers.php', 'people', 'Customers'); ?>
        <?php $nav('treatments', 'treatments.php', 'medical_services', 'Treatments'); ?>
        <?php $nav('billing', 'billing.php', 'payments', 'Billing'); ?>
        <?php $nav('reports', 'reports.php', 'bar_chart', 'Reports'); ?>
    </nav>
    <div class="p-4 border-t border-slate-100 flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
            <span class="material-symbols-outlined text-primary">person</span>
        </div>
        <div>
            <p class="font-bold text-slate-800"><?= htmlspecialchars($currentUser['full_name'] ?? 'Admin') ?></p>
            <p class="text-xs text-slate-500 uppercase tracking-wider"><?= htmlspecialchars($roleLabel) ?></p>
        </div>
    </div>
</aside>
