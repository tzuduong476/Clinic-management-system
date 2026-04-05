<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'treatments';
$search = trim($_GET['search'] ?? '');
$filterCategory = trim($_GET['category'] ?? '');
$filterType = trim($_GET['type'] ?? ''); // single | combo

$stmt = $conn->query("SELECT id, name, tagline, category, duration, sessions, price, original_price, is_combo FROM services ORDER BY is_combo ASC, name ASC");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($search !== '') {
    $searchLower = mb_strtolower($search);
    $services = array_filter($services, function ($s) use ($searchLower) {
        return strpos(mb_strtolower($s['name'] ?? ''), $searchLower) !== false
            || strpos(mb_strtolower($s['category'] ?? ''), $searchLower) !== false
            || strpos(mb_strtolower($s['tagline'] ?? ''), $searchLower) !== false;
    });
    $services = array_values($services);
}
if ($filterCategory !== '') {
    $services = array_filter($services, function ($s) use ($filterCategory) {
        return trim($s['category'] ?? '') === $filterCategory;
    });
    $services = array_values($services);
}
if ($filterType === 'combo') {
    $services = array_filter($services, function ($s) { return !empty($s['is_combo']); });
    $services = array_values($services);
} elseif ($filterType === 'single') {
    $services = array_filter($services, function ($s) { return empty($s['is_combo']); });
    $services = array_values($services);
}

$categories = array_unique(array_filter($conn->query("SELECT category FROM services")->fetchAll(PDO::FETCH_COLUMN)));
$categories = array_map('trim', $categories);
$categories = array_filter($categories);
sort($categories);
$totalServices = (int)$conn->query("SELECT COUNT(*) FROM services")->fetchColumn();
$comboCount = (int)$conn->query("SELECT COUNT(*) FROM services WHERE is_combo = 1")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Treatments | Elysian Management Hub</title>
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
            <h1 class="text-xl font-bold text-slate-800">Treatments</h1>
            <div class="flex items-center gap-4">
                <form method="get" action="treatments.php" class="flex items-center gap-2">
                    <div class="relative w-64">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search by name or category..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold">Search</button>
                </form>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">notifications</span>
                <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center"><span class="material-symbols-outlined text-primary">person</span></div>
            </div>
        </header>
        <main class="flex-1 p-8 overflow-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center"><span class="material-symbols-outlined text-primary text-2xl">medical_services</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Total Treatments</p>
                        <p class="text-2xl font-bold text-slate-800"><?= $totalServices ?></p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center"><span class="material-symbols-outlined text-green-600 text-2xl">category</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Categories</p>
                        <p class="text-2xl font-bold text-slate-800"><?= count($categories) ?></p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center"><span class="material-symbols-outlined text-amber-600 text-2xl">layers</span></span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Combo Packages</p>
                        <p class="text-2xl font-bold text-slate-800"><?= $comboCount ?></p>
                    </div>
                </div>
            </div>

            <div class="mb-4 flex flex-wrap items-center gap-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filters:</span>
                <form method="get" action="treatments.php" class="flex flex-wrap items-center gap-2">
                    <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>"/>
                    <select name="category" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <option value="">Category: All</option>
                        <?php foreach ($categories as $cat): if ($cat === '') continue; ?>
                        <option value="<?= htmlspecialchars($cat) ?>" <?= $filterCategory === $cat ? 'selected' : '' ?>><?= htmlspecialchars($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="type" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <option value="">Type: All</option>
                        <option value="single" <?= $filterType === 'single' ? 'selected' : '' ?>>Single Service</option>
                        <option value="combo" <?= $filterType === 'combo' ? 'selected' : '' ?>>Combo Package</option>
                    </select>
                    <a href="treatments.php" class="text-sm text-primary font-semibold hover:underline">Clear Filters</a>
                </form>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">ID</th>
                                <th class="text-left px-6 py-3 font-semibold">Name</th>
                                <th class="text-left px-6 py-3 font-semibold">Category</th>
                                <th class="text-left px-6 py-3 font-semibold">Duration</th>
                                <th class="text-left px-6 py-3 font-semibold">Sessions</th>
                                <th class="text-left px-6 py-3 font-semibold">Price</th>
                                <th class="text-left px-6 py-3 font-semibold">Type</th>
                                <th class="text-left px-6 py-3 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($services)): ?>
                            <tr><td colspan="8" class="px-6 py-12 text-slate-500 text-center">No treatments match your filters.</td></tr>
                            <?php else: ?>
                            <?php foreach ($services as $s): ?>
                            <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                <td class="px-6 py-3 font-mono text-slate-600"><?= htmlspecialchars($s['id']) ?></td>
                                <td class="px-6 py-3">
                                    <p class="font-semibold text-slate-800"><?= htmlspecialchars($s['name']) ?></p>
                                    <?php if (!empty($s['tagline'])): ?><p class="text-xs text-slate-500"><?= htmlspecialchars($s['tagline']) ?></p><?php endif; ?>
                                </td>
                                <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars($s['category'] ?? '—') ?></td>
                                <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars($s['duration'] ?? '—') ?></td>
                                <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars($s['sessions'] ?? '—') ?></td>
                                <td class="px-6 py-3 font-semibold text-slate-800"><?= htmlspecialchars($s['price'] ?? '—') ?></td>
                                <td class="px-6 py-3">
                                    <?php if (!empty($s['is_combo'])): ?>
                                    <span class="px-2 py-0.5 rounded text-xs font-bold bg-amber-100 text-amber-800">Combo</span>
                                    <?php else: ?>
                                    <span class="px-2 py-0.5 rounded text-xs font-bold bg-slate-100 text-slate-700">Single</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-3"><a href="../frontend/service-detail.php?id=<?= urlencode($s['id']) ?>" target="_blank" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">View <span class="material-symbols-outlined text-lg">open_in_new</span></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-3 border-t border-slate-100 text-sm text-slate-500">Showing <?= count($services) ?> of <?= $totalServices ?> treatments</div>
            </div>
        </main>
    </div>
</body>
</html>
