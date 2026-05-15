<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$isAdmin = (($currentUser['role'] ?? '') === 'admin');
$currentPage = 'treatments';

$search = trim($_GET['search'] ?? '');
$filterCategory = trim($_GET['category'] ?? '');
$filterType = trim($_GET['type'] ?? '');
$filterVisibility = trim($_GET['visibility'] ?? '');
$editId = trim($_GET['edit'] ?? '');

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

function typeBadgeClass(bool $isCombo): string
{
    return $isCombo
        ? 'bg-amber-50 text-amber-700 ring-amber-100'
        : 'bg-sky-50 text-sky-700 ring-sky-100';
}

function statusBadgeClass(string $status): string
{
    return $status === 'hidden'
        ? 'bg-slate-100 text-slate-500 ring-slate-200'
        : 'bg-emerald-50 text-emerald-700 ring-emerald-100';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$isAdmin) {
        http_response_code(403);
        exit('Forbidden');
    }

    $action = trim($_POST['action'] ?? '');
    $msgType = 'success';
    $msg = 'Saved successfully.';

    try {
        if ($action === 'add_service') {
            $id = trim($_POST['id'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $tagline = trim($_POST['tagline'] ?? '');
            $category = trim($_POST['category'] ?? '');
            $image = trim($_POST['image'] ?? '');
            $duration = trim($_POST['duration'] ?? '');
            $sessions = trim($_POST['sessions'] ?? '');
            $price = trim($_POST['price'] ?? '');
            $originalPrice = trim($_POST['original_price'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $isCombo = (int)($_POST['is_combo'] ?? 0) === 1 ? 1 : 0;

            if ($id === '' || $name === '' || $price === '') {
                throw new RuntimeException('ID, name and price are required.');
            }

            $stmt = $conn->prepare("SELECT COUNT(*) FROM services WHERE id = ?");
            $stmt->execute([$id]);

            if ((int)$stmt->fetchColumn() > 0) {
                throw new RuntimeException('Service ID already exists.');
            }

            $stmt = $conn->prepare("
                INSERT INTO services (
                    id,
                    name,
                    tagline,
                    category,
                    image,
                    duration,
                    sessions,
                    price,
                    original_price,
                    description,
                    benefits,
                    preparation,
                    is_combo,
                    status
                )
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NULL, ?, ?)
            ");

            $stmt->execute([
                $id,
                $name,
                $tagline,
                $category,
                $image,
                $duration,
                $sessions,
                $price,
                $originalPrice !== '' ? $originalPrice : null,
                $description,
                $isCombo,
                'active',
            ]);

            $msg = 'Service created successfully.';
        } elseif ($action === 'update_service') {
            $id = trim($_POST['id'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $tagline = trim($_POST['tagline'] ?? '');
            $category = trim($_POST['category'] ?? '');
            $image = trim($_POST['image'] ?? '');
            $duration = trim($_POST['duration'] ?? '');
            $sessions = trim($_POST['sessions'] ?? '');
            $price = trim($_POST['price'] ?? '');
            $originalPrice = trim($_POST['original_price'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $isCombo = (int)($_POST['is_combo'] ?? 0) === 1 ? 1 : 0;

            if ($id === '' || $name === '' || $price === '') {
                throw new RuntimeException('ID, name and price are required.');
            }

            $stmt = $conn->prepare("
                UPDATE services
                SET 
                    name = ?,
                    tagline = ?,
                    category = ?,
                    image = ?,
                    duration = ?,
                    sessions = ?,
                    price = ?,
                    original_price = ?,
                    description = ?,
                    is_combo = ?
                WHERE id = ?
            ");

            $stmt->execute([
                $name,
                $tagline,
                $category,
                $image,
                $duration,
                $sessions,
                $price,
                $originalPrice !== '' ? $originalPrice : null,
                $description,
                $isCombo,
                $id,
            ]);

            $msg = 'Service updated successfully.';
        } elseif ($action === 'toggle_service_status') {
            $id = trim($_POST['id'] ?? '');
            $nextStatus = trim($_POST['next_status'] ?? '');

            if ($id === '' || !in_array($nextStatus, ['active', 'hidden'], true)) {
                throw new RuntimeException('Invalid service.');
            }

            $stmt = $conn->prepare("UPDATE services SET status = ? WHERE id = ?");
            $stmt->execute([$nextStatus, $id]);

            if ($stmt->rowCount() < 1) {
                throw new RuntimeException('Service not found.');
            }

            $msg = $nextStatus === 'hidden'
                ? 'Service hidden successfully.'
                : 'Service is visible again.';
        } else {
            throw new RuntimeException('Invalid action.');
        }
    } catch (Throwable $e) {
        $msgType = 'error';
        $msg = $e->getMessage();
    }

    header('Location: service_management.php?flash=' . urlencode($msgType) . '&message=' . urlencode($msg));
    exit;
}

$flash = trim($_GET['flash'] ?? '');
$message = trim($_GET['message'] ?? '');

$stmt = $conn->query("
    SELECT 
        id,
        name,
        tagline,
        category,
        duration,
        sessions,
        price,
        original_price,
        is_combo,
        status
    FROM services
    ORDER BY is_combo ASC, name ASC
");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($search !== '') {
    $searchLower = lowerText($search);

    $services = array_values(array_filter($services, function ($service) use ($searchLower) {
        $text = ($service['id'] ?? '') . ' ' .
            ($service['name'] ?? '') . ' ' .
            ($service['category'] ?? '') . ' ' .
            ($service['tagline'] ?? '');

        return strpos(lowerText($text), $searchLower) !== false;
    }));
}

if ($filterCategory !== '') {
    $services = array_values(array_filter($services, function ($service) use ($filterCategory) {
        return trim($service['category'] ?? '') === $filterCategory;
    }));
}

if ($filterType === 'combo') {
    $services = array_values(array_filter($services, function ($service) {
        return !empty($service['is_combo']);
    }));
} elseif ($filterType === 'single') {
    $services = array_values(array_filter($services, function ($service) {
        return empty($service['is_combo']);
    }));
}

if ($filterVisibility === 'active' || $filterVisibility === 'hidden') {
    $services = array_values(array_filter($services, function ($service) use ($filterVisibility) {
        return ($service['status'] ?? 'active') === $filterVisibility;
    }));
}

$categories = array_unique(array_filter(array_map('trim', $conn->query("SELECT category FROM services")->fetchAll(PDO::FETCH_COLUMN))));
sort($categories);

$totalServices = (int)$conn->query("SELECT COUNT(*) FROM services")->fetchColumn();
$activeCount = (int)$conn->query("SELECT COUNT(*) FROM services WHERE status = 'active'")->fetchColumn();
$hiddenCount = (int)$conn->query("SELECT COUNT(*) FROM services WHERE status = 'hidden'")->fetchColumn();
$comboCount = (int)$conn->query("SELECT COUNT(*) FROM services WHERE is_combo = 1")->fetchColumn();
$singleCount = max(0, $totalServices - $comboCount);

$editService = null;

if ($editId !== '') {
    $stmt = $conn->prepare("SELECT * FROM services WHERE id = ? LIMIT 1");
    $stmt->execute([$editId]);
    $editService = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Service Management | Elysian Management Hub</title>

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
        $title = 'Services';
        $subtitle = 'Treatment catalog, pricing and packages.';
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
                                    Service catalog
                                </div>

                                <div class="inline-flex items-center gap-2 rounded-full bg-white/85 px-3 py-1.5 text-xs font-bold text-slate-400 ring-1 ring-slate-100">
                                    <span>Services</span>
                                    <span class="material-symbols-outlined text-[15px]">chevron_right</span>
                                    <span class="text-slate-600">Management</span>
                                </div>
                            </div>

                            <h2 class="max-w-4xl text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                                Service management for treatments, pricing and combo packages.
                            </h2>

                            <p class="mt-3 max-w-2xl text-base font-medium leading-relaxed text-slate-500">
                                Manage services used in booking, treatment plans and public service details.
                            </p>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            <div class="rounded-[1.5rem] border border-white/80 bg-white/85 p-4 shadow-sm backdrop-blur">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Visible results</p>
                                <p class="mt-2 text-3xl font-black tracking-tight text-slate-900"><?= h(count($services)) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-400">after filters</p>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/80 bg-slate-950 p-4 text-white shadow-glow">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-white/50">Catalog total</p>
                                <p class="mt-2 text-3xl font-black tracking-tight"><?= h($totalServices) ?></p>
                                <p class="text-sm font-semibold text-white/55"><?= h($hiddenCount) ?> hidden services</p>
                            </div>
                        </div>
                    </div>
                </section>

                <?php if ($message !== ''): ?>
                    <div class="mb-6 rounded-2xl border px-5 py-4 text-sm font-bold <?= $flash === 'success' ? 'border-emerald-100 bg-emerald-50 text-emerald-700' : 'border-rose-100 bg-rose-50 text-rose-700' ?>">
                        <?= h($message) ?>
                    </div>
                <?php endif; ?>

                <section class="mb-7 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-sky-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Total services</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($totalServices) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">All catalog records</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[24px]">medical_services</span>
                            </div>
                        </div>
                    </article>

                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-emerald-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Visible services</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($activeCount) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Shown to customers</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <span class="material-symbols-outlined text-[24px]">visibility</span>
                            </div>
                        </div>
                    </article>

                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-amber-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Hidden services</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($hiddenCount) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500">Can be shown again</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <span class="material-symbols-outlined text-[24px]">visibility_off</span>
                            </div>
                        </div>
                    </article>

                    <article class="relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="absolute right-0 top-0 h-24 w-24 rounded-bl-full bg-violet-50"></div>
                        <div class="relative flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Combo packages</p>
                                <p class="mt-3 text-3xl font-black tracking-tight text-slate-950"><?= h($comboCount) ?></p>
                                <p class="mt-1 text-sm font-semibold text-slate-500"><?= h($singleCount) ?> single services</p>
                            </div>
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <span class="material-symbols-outlined text-[24px]">layers</span>
                            </div>
                        </div>
                    </article>
                </section>

                <?php if ($editService && $isAdmin): ?>
                    <section class="mb-6 overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                            <div>
                                <h3 class="text-2xl font-black tracking-tight text-slate-950">Edit Service</h3>
                                <p class="mt-1 text-sm font-medium text-slate-500"><?= h($editService['id']) ?></p>
                            </div>

                            <a
                                href="service_management.php"
                                class="inline-flex h-10 items-center justify-center rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                            >
                                Close
                            </a>
                        </div>

                        <form method="post" class="grid gap-4 p-6 lg:grid-cols-2">
                            <input type="hidden" name="action" value="update_service"/>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Service ID</label>
                                <input
                                    name="id"
                                    readonly
                                    value="<?= h($editService['id']) ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-100 px-4 text-sm font-semibold text-slate-500 outline-none"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Name <span class="text-sky-500">*</span></label>
                                <input
                                    name="name"
                                    required
                                    value="<?= h($editService['name'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Category</label>
                                <input
                                    name="category"
                                    value="<?= h($editService['category'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Price <span class="text-sky-500">*</span></label>
                                <input
                                    name="price"
                                    required
                                    value="<?= h($editService['price'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Duration</label>
                                <input
                                    name="duration"
                                    value="<?= h($editService['duration'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Sessions</label>
                                <input
                                    name="sessions"
                                    value="<?= h($editService['sessions'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Original Price</label>
                                <input
                                    name="original_price"
                                    value="<?= h($editService['original_price'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">Type</label>
                                <select
                                    name="is_combo"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                >
                                    <option value="0" <?= empty($editService['is_combo']) ? 'selected' : '' ?>>Single Service</option>
                                    <option value="1" <?= !empty($editService['is_combo']) ? 'selected' : '' ?>>Combo Package</option>
                                </select>
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-2 block text-sm font-black text-slate-700">Tagline</label>
                                <input
                                    name="tagline"
                                    value="<?= h($editService['tagline'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-2 block text-sm font-black text-slate-700">Image URL</label>
                                <input
                                    name="image"
                                    value="<?= h($editService['image'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                />
                            </div>

                            <div class="lg:col-span-2">
                                <label class="mb-2 block text-sm font-black text-slate-700">Description</label>
                                <textarea
                                    name="description"
                                    rows="3"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                ><?= h($editService['description'] ?? '') ?></textarea>
                            </div>

                            <div class="lg:col-span-2 flex flex-wrap justify-end gap-3 border-t border-slate-100 pt-5">
                                <a
                                    href="service_management.php"
                                    class="inline-flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                                >
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                                >
                                    <span class="material-symbols-outlined text-[18px]">save</span>
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </section>
                <?php endif; ?>

                <section class="mb-6 rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-black tracking-tight text-slate-950">Service filters</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">Search and filter service records.</p>
                        </div>

                        <div class="flex flex-wrap items-center gap-2">
                            <a
                                href="service_management.php"
                                class="inline-flex h-11 items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                            >
                                <span class="material-symbols-outlined text-[18px]">refresh</span>
                                Reset
                            </a>

                            <?php if ($isAdmin): ?>
                                <button
                                    type="button"
                                    onclick="openAddModal()"
                                    class="inline-flex h-11 items-center justify-center gap-2 rounded-full bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                                >
                                    <span class="material-symbols-outlined text-[19px]">add_box</span>
                                    Add Service
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <form method="get" action="service_management.php" class="grid gap-3 lg:grid-cols-[1.2fr_0.7fr_0.7fr_0.7fr_auto]">
                        <div class="relative">
                            <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">search</span>
                            <input
                                type="text"
                                name="search"
                                value="<?= h($search) ?>"
                                placeholder="Search services..."
                                class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-12 pr-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                            />
                        </div>

                        <select
                            name="category"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Category: All</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= h($category) ?>" <?= $filterCategory === $category ? 'selected' : '' ?>>
                                    <?= h($category) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <select
                            name="type"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Type: All</option>
                            <option value="single" <?= $filterType === 'single' ? 'selected' : '' ?>>Single Service</option>
                            <option value="combo" <?= $filterType === 'combo' ? 'selected' : '' ?>>Combo Package</option>
                        </select>

                        <select
                            name="visibility"
                            class="h-12 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="">Visibility: All</option>
                            <option value="active" <?= $filterVisibility === 'active' ? 'selected' : '' ?>>Visible</option>
                            <option value="hidden" <?= $filterVisibility === 'hidden' ? 'selected' : '' ?>>Hidden</option>
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
                            <h3 class="text-2xl font-black tracking-tight text-slate-950">Service Management</h3>
                            <p class="mt-1 text-sm font-medium text-slate-500">
                                Showing <?= h(count($services)) ?> of <?= h($totalServices) ?> services.
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-3 py-2 text-xs font-black uppercase tracking-[0.16em] text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Catalog records
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1080px] text-left text-sm">
                            <thead>
                                <tr class="border-b border-slate-100 bg-slate-50/90 text-[11px] font-black uppercase tracking-[0.15em] text-slate-500">
                                    <th class="px-6 py-4">ID</th>
                                    <th class="px-6 py-4">Service</th>
                                    <th class="px-6 py-4">Category</th>
                                    <th class="px-6 py-4">Duration</th>
                                    <th class="px-6 py-4">Sessions</th>
                                    <th class="px-6 py-4">Price</th>
                                    <th class="px-6 py-4">Type</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right"><?= $isAdmin ? 'Actions' : 'View' ?></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">
                                <?php if (empty($services)): ?>
                                    <tr>
                                        <td colspan="9" class="px-6 py-16 text-center">
                                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-sky-500">
                                                <span class="material-symbols-outlined text-[30px]">medical_services</span>
                                            </div>
                                            <h4 class="mt-4 text-lg font-black text-slate-900">No services found</h4>
                                            <p class="mt-1 text-sm font-medium text-slate-500">Try changing the search keyword or filters.</p>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($services as $service): ?>
                                        <?php $isCombo = !empty($service['is_combo']); ?>
                                        <?php $status = $service['status'] ?? 'active'; ?>
                                        <tr class="group transition hover:bg-sky-50/35 <?= $status === 'hidden' ? 'bg-slate-50/70' : '' ?>">
                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-mono text-sm font-black text-slate-800"><?= h($service['id']) ?></p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <div class="min-w-0">
                                                    <p class="max-w-[280px] truncate font-black text-slate-900">
                                                        <?= h($service['name']) ?>
                                                    </p>
                                                    <?php if (!empty($service['tagline'])): ?>
                                                        <p class="mt-0.5 max-w-[280px] truncate text-xs font-semibold text-slate-400">
                                                            <?= h($service['tagline']) ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-bold text-slate-700"><?= h($service['category'] ?: '—') ?></p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-semibold text-slate-600"><?= h($service['duration'] ?: '—') ?></p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-semibold text-slate-600"><?= h($service['sessions'] ?: '—') ?></p>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <p class="font-black text-slate-950"><?= h($service['price'] ?: '—') ?></p>
                                                <?php if (!empty($service['original_price'])): ?>
                                                    <p class="mt-0.5 text-xs font-semibold text-slate-400 line-through">
                                                        <?= h($service['original_price']) ?>
                                                    </p>
                                                <?php endif; ?>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <span class="inline-flex rounded-full px-3 py-1.5 text-xs font-semibold ring-1 <?= h(typeBadgeClass($isCombo)) ?>">
                                                    <?= $isCombo ? 'Combo' : 'Single' ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <span class="inline-flex rounded-full px-3 py-1.5 text-xs font-semibold ring-1 <?= h(statusBadgeClass($status)) ?>">
                                                    <?= $status === 'hidden' ? 'Hidden' : 'Visible' ?>
                                                </span>
                                            </td>

                                            <td class="px-6 py-5 align-middle">
                                                <div class="flex justify-end gap-2">
                                                    <?php if ($status === 'active'): ?>
                                                        <a
                                                            href="../frontend/service-detail.php?id=<?= urlencode($service['id']) ?>"
                                                            target="_blank"
                                                            class="inline-flex h-9 items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 text-xs font-black text-slate-600 transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-600"
                                                        >
                                                            View
                                                            <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="inline-flex h-9 items-center rounded-full border border-slate-200 bg-slate-100 px-3 text-xs font-semibold text-slate-400">
                                                            Hidden
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if ($isAdmin): ?>
                                                        <a
                                                            href="service_management.php?edit=<?= urlencode($service['id']) ?>"
                                                            class="inline-flex h-9 items-center gap-1.5 rounded-full bg-sky-500 px-3 text-xs font-black text-white shadow-sm transition hover:bg-sky-600"
                                                        >
                                                            Edit
                                                        </a>

                                                        <form
                                                            method="post"
                                                            class="inline"
                                                            onsubmit="return confirm('<?= $status === 'active' ? 'Hide this service from the public catalog?' : 'Show this service again in the public catalog?' ?>');"
                                                        >
                                                            <input type="hidden" name="action" value="toggle_service_status"/>
                                                            <input type="hidden" name="id" value="<?= h($service['id']) ?>"/>
                                                            <input type="hidden" name="next_status" value="<?= $status === 'active' ? 'hidden' : 'active' ?>"/>
                                                            <button
                                                                type="submit"
                                                                class="inline-flex h-9 items-center rounded-full border px-3 text-xs font-black transition <?= $status === 'active' ? 'border-amber-100 bg-amber-50 text-amber-700 hover:bg-amber-100' : 'border-emerald-100 bg-emerald-50 text-emerald-700 hover:bg-emerald-100' ?>"
                                                            >
                                                                <?= $status === 'active' ? 'Hide' : 'Show' ?>
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="border-t border-slate-100 px-6 py-4 text-sm font-semibold text-slate-500">
                        Showing <?= h(count($services)) ?> of <?= h($totalServices) ?> services
                    </div>
                </section>
            </div>
        </main>
    </div>

    <?php if ($isAdmin): ?>
        <div id="modalAdd" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/55 p-4 backdrop-blur-sm">
            <div class="max-h-[92vh] w-full max-w-3xl overflow-y-auto rounded-[2rem] bg-white shadow-2xl">
                <div class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-100 bg-white/95 px-6 py-5 backdrop-blur">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-sky-500">Catalog</p>
                        <h3 class="mt-1 text-xl font-black tracking-tight text-slate-950">Add Service</h3>
                    </div>

                    <button
                        type="button"
                        onclick="closeAddModal()"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition hover:bg-rose-50 hover:text-rose-500"
                    >
                        <span class="material-symbols-outlined text-[20px]">close</span>
                    </button>
                </div>

                <form method="post" class="grid gap-4 p-6 md:grid-cols-2">
                    <input type="hidden" name="action" value="add_service"/>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Service ID <span class="text-sky-500">*</span></label>
                        <input
                            name="id"
                            required
                            placeholder="e.g. facial01"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Name <span class="text-sky-500">*</span></label>
                        <input
                            name="name"
                            required
                            placeholder="Service name"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Category</label>
                        <input
                            name="category"
                            placeholder="Facial, Acne, Laser..."
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Price <span class="text-sky-500">*</span></label>
                        <input
                            name="price"
                            required
                            placeholder="2.000.000 VND"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Duration</label>
                        <input
                            name="duration"
                            placeholder="60 minutes"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Sessions</label>
                        <input
                            name="sessions"
                            placeholder="1 session"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Original Price</label>
                        <input
                            name="original_price"
                            placeholder="Optional"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-black text-slate-700">Type</label>
                        <select
                            name="is_combo"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        >
                            <option value="0">Single Service</option>
                            <option value="1">Combo Package</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-black text-slate-700">Tagline</label>
                        <input
                            name="tagline"
                            placeholder="Short display tagline"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-black text-slate-700">Image URL</label>
                        <input
                            name="image"
                            placeholder="Image path or URL"
                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        />
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-black text-slate-700">Description</label>
                        <textarea
                            name="description"
                            rows="3"
                            placeholder="Brief service description"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                        ></textarea>
                    </div>

                    <div class="md:col-span-2 flex flex-wrap justify-end gap-3 border-t border-slate-100 pt-5">
                        <button
                            type="button"
                            onclick="closeAddModal()"
                            class="inline-flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                        >
                            <span class="material-symbols-outlined text-[18px]">add_box</span>
                            Add Service
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openAddModal() {
                const modal = document.getElementById('modalAdd');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function closeAddModal() {
                const modal = document.getElementById('modalAdd');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }

            document.getElementById('modalAdd').addEventListener('click', function(event) {
                if (event.target === this) {
                    closeAddModal();
                }
            });

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeAddModal();
                }
            });
        </script>
    <?php endif; ?>
</body>
</html>
