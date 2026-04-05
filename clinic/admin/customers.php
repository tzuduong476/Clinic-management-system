<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$search = trim($_GET['search'] ?? '');
$filterSkin = trim($_GET['skin'] ?? '');
$filterVisit = trim($_GET['visit'] ?? '');
$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = 10;
$offset = ($page - 1) * $perPage;

$stmt = $conn->query("SELECT Customer_ID, Name, Phone, Email, Skin_type, Created_at FROM `Customer` ORDER BY Name ASC");
$allCustomers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$appointmentsByCustomer = [];
$stmt = $conn->query("SELECT customer_name, customer_phone, appointment_date, total_price FROM appointments WHERE status != 'cancelled'");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $key = $row['customer_name'] . '|' . $row['customer_phone'];
    if (!isset($appointmentsByCustomer[$key])) {
        $appointmentsByCustomer[$key] = ['last_visit' => null, 'total_spent' => 0, 'visits' => 0];
    }
    $d = $row['appointment_date'];
    if (!$appointmentsByCustomer[$key]['last_visit'] || $d > $appointmentsByCustomer[$key]['last_visit']) {
        $appointmentsByCustomer[$key]['last_visit'] = $d;
    }
    $appointmentsByCustomer[$key]['visits']++;
    $num = preg_replace('/[^0-9]/', '', $row['total_price']);
    if ($num !== '') $appointmentsByCustomer[$key]['total_spent'] += (int)$num;
}

$customersWithStats = [];
foreach ($allCustomers as $c) {
    $key1 = $c['Name'] . '|' . ($c['Phone'] ?? '');
    $key2 = $c['Name'] . '|';
    $key3 = '|' . ($c['Phone'] ?? '');
    $stats = $appointmentsByCustomer[$key1] ?? $appointmentsByCustomer[$key2] ?? $appointmentsByCustomer[$key3] ?? ['last_visit' => null, 'total_spent' => 0, 'visits' => 0];
    $c['last_visit'] = $stats['last_visit'];
    $c['total_spent'] = $stats['total_spent'];
    $c['visit_count'] = $stats['visits'];
    $customersWithStats[] = $c;
}

if ($search !== '') {
    $searchLower = mb_strtolower($search);
    $customersWithStats = array_filter($customersWithStats, function ($c) use ($searchLower) {
        return strpos(mb_strtolower($c['Name']), $searchLower) !== false
            || strpos(mb_strtolower($c['Phone'] ?? ''), $searchLower) !== false
            || strpos(mb_strtolower($c['Email'] ?? ''), $searchLower) !== false
            || strpos('#' . str_pad((string)$c['Customer_ID'], 5, '0', STR_PAD_LEFT), $search) !== false;
    });
}
if ($filterSkin !== '') {
    $customersWithStats = array_filter($customersWithStats, function ($c) use ($filterSkin) {
        return mb_strtoupper(trim($c['Skin_type'] ?? '')) === mb_strtoupper($filterSkin);
    });
}
$now = date('Y-m-d');
if ($filterVisit === 'week') {
    $weekAgo = date('Y-m-d', strtotime('-7 days'));
    $customersWithStats = array_filter($customersWithStats, function ($c) use ($weekAgo) {
        return $c['last_visit'] && $c['last_visit'] >= $weekAgo;
    });
} elseif ($filterVisit === 'month') {
    $monthAgo = date('Y-m-d', strtotime('-30 days'));
    $customersWithStats = array_filter($customersWithStats, function ($c) use ($monthAgo) {
        return $c['last_visit'] && $c['last_visit'] >= $monthAgo;
    });
}
$customersWithStats = array_values($customersWithStats);
$totalCount = count($customersWithStats);
$totalCustomers = count($allCustomers);
$newThisMonth = 0;
$monthStart = date('Y-m-01');
foreach ($allCustomers as $c) {
    if (($c['Created_at'] ?? '') >= $monthStart) $newThisMonth++;
}
$activePlans = 0;
$monthAgo = date('Y-m-d', strtotime('-30 days'));
foreach ($customersWithStats as $c) {
    if (($c['last_visit'] ?? '') >= $monthAgo) $activePlans++;
}

$paginated = array_slice($customersWithStats, $offset, $perPage);
$totalPages = $perPage > 0 ? (int)ceil($totalCount / $perPage) : 1;

function formatDate($d) {
    if (!$d) return '—';
    $t = strtotime($d);
    return date('M j, Y', $t);
}
function formatMoney($v) {
    return number_format($v) . ' đ';
}
$skinTypes = array_unique(array_filter(array_map(function ($c) { return trim($c['Skin_type'] ?? ''); }, $allCustomers)));
sort($skinTypes);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Customer Management | Elysian Management Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style> body { font-family: 'Inter', sans-serif; } .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; } </style>
    <script> tailwind.config = { theme: { extend: { colors: { primary: '#0db9f2', 'primary-dark': '#0a9ad4' } } } } </script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex">
    <?php include __DIR__ . '/_sidebar.php'; ?>
    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
            <h1 class="text-xl font-bold text-slate-800">Customer Management</h1>
            <div class="flex items-center gap-4">
                <div class="relative w-80">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <form method="get" action="customers.php" class="flex">
                        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search by Name, Phone, or PID..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                        <button type="submit" class="ml-2 px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold">Search</button>
                    </form>
                </div>
                <a href="../frontend/signup.php" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary-dark">
                    <span class="material-symbols-outlined text-lg">person_add</span> + New Customer
                </a>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">notifications</span>
                <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center"><span class="material-symbols-outlined text-primary">person</span></div>
            </div>
        </header>
        <main class="flex-1 p-8 overflow-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center"><span class="material-symbols-outlined text-primary text-2xl">people</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Total Customers</p>
                        <p class="text-2xl font-bold text-slate-800"><?= $totalCustomers ?></p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center"><span class="material-symbols-outlined text-green-600 text-2xl">check_circle</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Active Plans</p>
                        <p class="text-2xl font-bold text-slate-800"><?= $activePlans ?></p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center"><span class="material-symbols-outlined text-primary text-2xl">person_add</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">New This Month</p>
                        <p class="text-2xl font-bold text-slate-800"><?= $newThisMonth ?></p>
                    </div>
                </div>
            </div>

            <div class="mb-4 flex flex-wrap items-center gap-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filters:</span>
                <form method="get" action="customers.php" class="flex flex-wrap items-center gap-2">
                    <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>"/>
                    <select name="visit" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <option value="">Last Visit: All</option>
                        <option value="week" <?= $filterVisit === 'week' ? 'selected' : '' ?>>This Week</option>
                        <option value="month" <?= $filterVisit === 'month' ? 'selected' : '' ?>>This Month</option>
                    </select>
                    <select name="skin" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <option value="">Skin Type: All</option>
                        <?php foreach ($skinTypes as $st): if ($st === '') continue; ?>
                        <option value="<?= htmlspecialchars($st) ?>" <?= $filterSkin === $st ? 'selected' : '' ?>><?= htmlspecialchars($st) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="customers.php" class="text-sm text-primary font-semibold hover:underline">Clear Filters</a>
                </form>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">PID</th>
                                <th class="text-left px-6 py-3 font-semibold">Full Name</th>
                                <th class="text-left px-6 py-3 font-semibold">Phone Number</th>
                                <th class="text-left px-6 py-3 font-semibold">Skin Type</th>
                                <th class="text-left px-6 py-3 font-semibold">Last Visit</th>
                                <th class="text-left px-6 py-3 font-semibold">Total Spent</th>
                                <th class="text-left px-6 py-3 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($paginated)): ?>
                            <tr><td colspan="7" class="px-6 py-12 text-slate-500 text-center">No customers match your filters.</td></tr>
                            <?php else: ?>
                            <?php foreach ($paginated as $c): ?>
                            <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                <td class="px-6 py-3 font-mono text-slate-600">#ELC<?= str_pad((string)$c['Customer_ID'], 5, '0', STR_PAD_LEFT) ?></td>
                                <td class="px-6 py-3">
                                    <span class="w-8 h-8 rounded-full bg-primary/10 inline-flex items-center justify-center text-primary text-xs font-bold mr-2"><?= mb_substr($c['Name'], 0, 1) ?></span>
                                    <?= htmlspecialchars($c['Name']) ?>
                                </td>
                                <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars($c['Phone'] ?: ('(' . $c['Email'] . ')')) ?></td>
                                <td class="px-6 py-3">
                                    <?php
                                    $st = trim($c['Skin_type'] ?? '');
                                    $stClass = $st === 'OILY' ? 'bg-amber-100 text-amber-800' : ($st === 'DRY' ? 'bg-blue-100 text-blue-800' : ($st === 'SENSITIVE' ? 'bg-pink-100 text-pink-800' : ($st === 'COMBINATION' ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-700')));
                                    ?>
                                    <span class="px-2 py-0.5 rounded text-xs font-bold <?= $stClass ?>"><?= $st ? htmlspecialchars($st) : '—' ?></span>
                                </td>
                                <td class="px-6 py-3 text-slate-600"><?= formatDate($c['last_visit']) ?></td>
                                <td class="px-6 py-3 font-semibold text-slate-800"><?= formatMoney($c['total_spent']) ?></td>
                                <td class="px-6 py-3"><a href="customer_detail.php?id=<?= (int)$c['Customer_ID'] ?>" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">View Details <span class="material-symbols-outlined text-lg">arrow_forward</span></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-3 border-t border-slate-100 flex items-center justify-between text-sm text-slate-500">
                    <span>Showing <?= $totalCount ? $offset + 1 : 0 ?>–<?= min($offset + $perPage, $totalCount) ?> of <?= $totalCount ?> customers</span>
                    <div class="flex items-center gap-2">
                        <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>&skin=<?= urlencode($filterSkin) ?>&visit=<?= urlencode($filterVisit) ?>" class="px-3 py-1 rounded <?= $page <= 1 ? 'text-slate-300 pointer-events-none' : 'text-primary hover:bg-primary/10' ?>">Previous</a>
                        <?php for ($i = 1; $i <= min($totalPages, 5); $i++): ?>
                        <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&skin=<?= urlencode($filterSkin) ?>&visit=<?= urlencode($filterVisit) ?>" class="px-3 py-1 rounded <?= $i === $page ? 'bg-primary text-white' : 'text-slate-600 hover:bg-slate-100' ?>"><?= $i ?></a>
                        <?php endfor; ?>
                        <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>&skin=<?= urlencode($filterSkin) ?>&visit=<?= urlencode($filterVisit) ?>" class="px-3 py-1 rounded <?= $page >= $totalPages ? 'text-slate-300 pointer-events-none' : 'text-primary hover:bg-primary/10' ?>">Next</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
