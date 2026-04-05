<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'reports';
$reportYear = max(2020, min(2030, (int)($_GET['year'] ?? date('Y'))));

// Revenue by month (selected year)
$monthlyRevenue = [];
for ($m = 1; $m <= 12; $m++) {
    $from = sprintf('%04d-%02d-01', $reportYear, $m);
    $to = date('Y-m-t', strtotime($from));
    $stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date BETWEEN ? AND ? AND status != 'cancelled'");
    $stmt->execute([$from, $to]);
    $prices = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $sum = 0;
    foreach ($prices as $p) {
        $sum += (int)preg_replace('/[^0-9]/', '', $p ?? '');
    }
    $monthlyRevenue[$m] = $sum;
}
$yearTotal = array_sum($monthlyRevenue);

// Appointments count by month
$monthlyAppointments = [];
for ($m = 1; $m <= 12; $m++) {
    $from = sprintf('%04d-%02d-01', $reportYear, $m);
    $to = date('Y-m-t', strtotime($from));
    $stmt = $conn->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date BETWEEN ? AND ? AND status != 'cancelled'");
    $stmt->execute([$from, $to]);
    $monthlyAppointments[$m] = (int)$stmt->fetchColumn();
}

// Top services by booking count & revenue (PHP aggregation for price string)
$stmt = $conn->query("SELECT service_name, total_price FROM appointments WHERE status != 'cancelled'");
$byService = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $sn = $row['service_name'];
    if (!isset($byService[$sn])) $byService[$sn] = ['cnt' => 0, 'rev' => 0];
    $byService[$sn]['cnt']++;
    $byService[$sn]['rev'] += (int)preg_replace('/[^0-9]/', '', $row['total_price'] ?? '');
}
uasort($byService, function ($a, $b) { return $b['cnt'] - $a['cnt']; });
$topServices = [];
$i = 0;
foreach ($byService as $name => $data) {
    if ($i++ >= 10) break;
    $topServices[] = ['service_name' => $name, 'cnt' => $data['cnt'], 'rev' => $data['rev']];
}

$monthNames = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Reports | Elysian Management Hub</title>
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
            <h1 class="text-xl font-bold text-slate-800">Reports</h1>
            <div class="flex items-center gap-4">
                <form method="get" action="reports.php" class="flex items-center gap-2">
                    <label class="text-sm text-slate-600">Year</label>
                    <select name="year" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <?php for ($y = date('Y'); $y >= 2020; $y--): ?>
                        <option value="<?= $y ?>" <?= $reportYear === $y ? 'selected' : '' ?>><?= $y ?></option>
                        <?php endfor; ?>
                    </select>
                </form>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">notifications</span>
                <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center"><span class="material-symbols-outlined text-primary">person</span></div>
            </div>
        </header>
        <main class="flex-1 p-8 overflow-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center"><span class="material-symbols-outlined text-primary text-2xl">bar_chart</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Revenue <?= $reportYear ?></p>
                        <p class="text-2xl font-bold text-slate-800"><?= number_format($yearTotal) ?> đ</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center"><span class="material-symbols-outlined text-green-600 text-2xl">event_available</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Appointments <?= $reportYear ?></p>
                        <p class="text-2xl font-bold text-slate-800"><?= number_format(array_sum($monthlyAppointments)) ?></p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center"><span class="material-symbols-outlined text-amber-600 text-2xl">trending_up</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Avg / Month</p>
                        <p class="text-2xl font-bold text-slate-800"><?= number_format(count($monthlyRevenue) ? $yearTotal / 12 : 0) ?> đ</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100">
                        <h3 class="font-bold text-slate-800">Revenue by Month (<?= $reportYear ?>)</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                                <tr>
                                    <th class="text-left px-6 py-3 font-semibold">Month</th>
                                    <th class="text-right px-6 py-3 font-semibold">Revenue</th>
                                    <th class="text-right px-6 py-3 font-semibold">Appointments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($m = 1; $m <= 12; $m++): ?>
                                <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                    <td class="px-6 py-3 font-medium text-slate-800"><?= $monthNames[$m] ?> <?= $reportYear ?></td>
                                    <td class="px-6 py-3 text-right font-semibold text-slate-800"><?= number_format($monthlyRevenue[$m]) ?> đ</td>
                                    <td class="px-6 py-3 text-right text-slate-600"><?= $monthlyAppointments[$m] ?></td>
                                </tr>
                                <?php endfor; ?>
                            </tbody>
                            <tfoot class="bg-slate-50 font-semibold">
                                <tr class="border-t-2 border-slate-200">
                                    <td class="px-6 py-3 text-slate-800">Total</td>
                                    <td class="px-6 py-3 text-right text-slate-800"><?= number_format($yearTotal) ?> đ</td>
                                    <td class="px-6 py-3 text-right text-slate-800"><?= array_sum($monthlyAppointments) ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100">
                        <h3 class="font-bold text-slate-800">Top Services by Bookings</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                                <tr>
                                    <th class="text-left px-6 py-3 font-semibold">Service</th>
                                    <th class="text-right px-6 py-3 font-semibold">Bookings</th>
                                    <th class="text-right px-6 py-3 font-semibold">Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($topServices)): ?>
                                <tr><td colspan="3" class="px-6 py-8 text-slate-500 text-center">No data.</td></tr>
                                <?php else: ?>
                                <?php foreach ($topServices as $r): ?>
                                <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                    <td class="px-6 py-3 font-medium text-slate-800"><?= htmlspecialchars($r['service_name']) ?></td>
                                    <td class="px-6 py-3 text-right text-slate-600"><?= (int)($r['cnt'] ?? 0) ?></td>
                                    <td class="px-6 py-3 text-right font-semibold text-slate-800"><?= number_format((int)($r['rev'] ?? 0)) ?> đ</td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
