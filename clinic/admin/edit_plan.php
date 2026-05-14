<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || ($currentUser['role'] ?? '') !== 'doctor') {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'treatment_plans';

$planId = (int)($_GET['plan_id'] ?? 0);
$cid = (int)($_GET['customer_id'] ?? 0);

if ($planId <= 0 || $cid <= 0) {
    header('Location: customers.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM treatment_plans WHERE id = ? AND customer_id = ?");
$stmt->execute([$planId, $cid]);
$plan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$plan) {
    header('Location: customer_detail.php?id=' . $cid . '&tab=plan');
    exit;
}

$stmt = $conn->prepare("SELECT Customer_ID, Name, Phone FROM `Customer` WHERE Customer_ID = ?");
$stmt->execute([$cid]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$customer) {
    header('Location: customers.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM treatment_plan_sessions WHERE plan_id = ? ORDER BY session_number ASC");
$stmt->execute([$planId]);
$sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);

$specialists = $conn->query("SELECT id, name FROM specialists ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
$services = $conn->query("SELECT id, name FROM services ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
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

function formatDate($date): string
{
    if (!$date) {
        return '—';
    }

    return date('M j, Y', strtotime((string)$date));
}

$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $specialistId = (int)($_POST['specialist_id'] ?? 0);
    $goal = trim($_POST['overall_goal'] ?? '');
    $reason = trim($_POST['reason_adjustment'] ?? '');

    if ($title === '' || $specialistId <= 0) {
        $err = 'Please complete title and specialist.';
    } else {
        try {
            $stmt = $conn->prepare("
                UPDATE treatment_plans
                SET title = ?, specialist_id = ?, overall_goal = ?, updated_at = NOW()
                WHERE id = ?
            ");
            $stmt->execute([$title, $specialistId, $goal, $planId]);

            foreach ($sessions as $session) {
                $sessionNumber = (int)($session['session_number'] ?? 0);
                $sessionId = (int)($session['id'] ?? 0);

                if ($sessionNumber <= 0 || $sessionId <= 0) {
                    continue;
                }

                $serviceId = trim($_POST["service_id_$sessionNumber"] ?? '');
                $serviceName = trim($_POST["service_name_$sessionNumber"] ?? '');
                $focus = trim($_POST["focus_$sessionNumber"] ?? '');

                if ($serviceId === '') {
                    continue;
                }

                if ($serviceName === '') {
                    $stmt = $conn->prepare("SELECT name FROM services WHERE id = ?");
                    $stmt->execute([$serviceId]);
                    $serviceName = $stmt->fetchColumn() ?: $serviceId;
                }

                $stmt = $conn->prepare("
                    UPDATE treatment_plan_sessions
                    SET service_id = ?, service_name = ?, focus_notes = ?
                    WHERE id = ?
                ");
                $stmt->execute([$serviceId, $serviceName, $focus, $sessionId]);
            }

            // Sync status after updates
            syncTreatmentPlanStatus($conn, $planId);

            header('Location: customer_detail.php?id=' . $cid . '&tab=plan');
            exit;
        } catch (Throwable $e) {
            $err = 'Unable to update treatment plan.';
        }
    }
}

$selectedSpecialistName = '—';

foreach ($specialists as $specialist) {
    if ((int)$specialist['id'] === (int)($plan['specialist_id'] ?? 0)) {
        $selectedSpecialistName = $specialist['name'] ?? '—';
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Treatment Plan | Elysian Management Hub</title>

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
        $title = 'Edit Treatment Plan';
        $subtitle = 'Update pathway details.';
        $backLink = 'customer_detail.php?id=' . $cid . '&tab=plan';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1380px] px-8 py-8">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Treatment Plan
                        </div>

                        <h2 class="text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                            Edit treatment plan
                        </h2>
                    </div>

                    <a
                        href="customer_detail.php?id=<?= h($cid) ?>&tab=plan"
                        class="inline-flex h-11 items-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 shadow-sm transition hover:bg-slate-50"
                    >
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        Back
                    </a>
                </div>

                <?php if ($err !== ''): ?>
                    <div class="mb-5 rounded-2xl border border-rose-100 bg-rose-50 px-5 py-4 text-sm font-bold text-rose-700">
                        <?= h($err) ?>
                    </div>
                <?php endif; ?>

                <form method="post" class="grid gap-6 xl:grid-cols-[1fr_360px]">
                    <section class="space-y-5">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                    <span class="material-symbols-outlined text-[22px]">clinical_notes</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Plan details</h3>
                                    <p class="text-sm font-medium text-slate-500">Update core fields.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-5 p-6 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Title <span class="text-sky-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="title"
                                        required
                                        value="<?= h($_POST['title'] ?? ($plan['title'] ?? '')) ?>"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Lead Specialist <span class="text-sky-500">*</span>
                                    </label>
                                    <select
                                        name="specialist_id"
                                        required
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    >
                                        <?php foreach ($specialists as $specialist): ?>
                                            <option
                                                value="<?= h((int)$specialist['id']) ?>"
                                                <?= (int)($_POST['specialist_id'] ?? ($plan['specialist_id'] ?? 0)) === (int)$specialist['id'] ? 'selected' : '' ?>
                                            >
                                                <?= h($specialist['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="lg:col-span-2">
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Goal
                                    </label>
                                    <textarea
                                        name="overall_goal"
                                        rows="3"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    ><?= h($_POST['overall_goal'] ?? ($plan['overall_goal'] ?? '')) ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                    <span class="material-symbols-outlined text-[22px]">timeline</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Sessions</h3>
                                    <p class="text-sm font-medium text-slate-500">Update services and focus.</p>
                                </div>
                            </div>

                            <div class="space-y-3 p-6">
                                <?php if (empty($sessions)): ?>
                                    <div class="rounded-2xl bg-slate-50 p-5 text-sm font-bold text-slate-500">
                                        No sessions found.
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($sessions as $session): ?>
                                        <?php
                                        $number = (int)($session['session_number'] ?? 0);
                                        $selectedServiceId = $_POST["service_id_$number"] ?? ($session['service_id'] ?? '');
                                        ?>
                                        <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50/70 p-4">
                                            <div class="grid grid-cols-1 gap-3 lg:grid-cols-[70px_1fr_1.25fr] lg:items-end">
                                                <div>
                                                    <p class="mb-2 text-xs font-black uppercase tracking-[0.18em] text-slate-400">No.</p>
                                                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white text-sm font-black text-slate-700 ring-1 ring-slate-200">
                                                        <?= h($number) ?>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                        Service
                                                    </label>
                                                    <select
                                                        name="service_id_<?= h($number) ?>"
                                                        class="session-service h-11 w-full rounded-2xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:ring-4 focus:ring-sky-100"
                                                        data-target="service_name_<?= h($number) ?>"
                                                    >
                                                        <?php foreach ($services as $service): ?>
                                                            <option
                                                                value="<?= h($service['id']) ?>"
                                                                data-name="<?= h($service['name']) ?>"
                                                                <?= (string)$selectedServiceId === (string)$service['id'] ? 'selected' : '' ?>
                                                            >
                                                                <?= h($service['name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                    <input
                                                        type="hidden"
                                                        name="service_name_<?= h($number) ?>"
                                                        value="<?= h($_POST["service_name_$number"] ?? ($session['service_name'] ?? '')) ?>"
                                                    />
                                                </div>

                                                <div>
                                                    <label class="mb-2 block text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                        Focus
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="focus_<?= h($number) ?>"
                                                        value="<?= h($_POST["focus_$number"] ?? ($session['focus_notes'] ?? '')) ?>"
                                                        placeholder="Session focus"
                                                        class="h-11 w-full rounded-2xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:ring-4 focus:ring-sky-100"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                    <span class="material-symbols-outlined text-[22px]">edit_note</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Note</h3>
                                    <p class="text-sm font-medium text-slate-500">Optional.</p>
                                </div>
                            </div>

                            <div class="p-6">
                                <textarea
                                    name="reason_adjustment"
                                    rows="3"
                                    placeholder="Adjustment reason"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                ><?= h($_POST['reason_adjustment'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </section>

                    <aside class="xl:sticky xl:top-6 h-fit">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="relative overflow-hidden bg-slate-950 p-6 text-white">
                                <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-sky-400/25 blur-3xl"></div>

                                <div class="relative">
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-sky-300">Summary</p>
                                    <h3 class="mt-3 text-2xl font-black tracking-tight">Review plan</h3>
                                </div>
                            </div>

                            <div class="space-y-3 p-5">
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sm font-black text-sky-600 ring-1 ring-sky-100">
                                            <?= h(getInitial($customer['Name'] ?? '')) ?>
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate text-base font-black text-slate-900">
                                                <?= h($customer['Name'] ?? 'Unknown') ?>
                                            </p>
                                            <p class="mt-0.5 text-xs font-semibold text-slate-400">
                                                #ELC<?= h(str_pad((string)$customer['Customer_ID'], 5, '0', STR_PAD_LEFT)) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-2xl bg-sky-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-sky-500">Current plan</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h($plan['title'] ?? 'Untitled plan') ?>
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-emerald-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-emerald-600">Specialist</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h($selectedSpecialistName) ?>
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-violet-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-violet-600">Sessions</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h(count($sessions)) ?> sessions
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Last update</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h(formatDate($plan['updated_at'] ?? null)) ?>
                                    </p>
                                </div>

                                <div class="grid gap-3 pt-2">
                                    <button
                                        type="submit"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                                    >
                                        <span class="material-symbols-outlined text-[19px]">save</span>
                                        Save Changes
                                    </button>

                                    <a
                                        href="customer_detail.php?id=<?= h($cid) ?>&tab=plan"
                                        class="inline-flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                                    >
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.querySelectorAll('.session-service').forEach(function(select) {
            function syncServiceName() {
                const targetName = select.getAttribute('data-target');
                const target = document.querySelector('[name="' + targetName + '"]');
                const option = select.options[select.selectedIndex];

                if (target && option) {
                    target.value = option.getAttribute('data-name') || '';
                }
            }

            select.addEventListener('change', syncServiceName);
            syncServiceName();
        });
    </script>
</body>
</html>