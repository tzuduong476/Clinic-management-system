<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || ($currentUser['role'] ?? '') !== 'doctor') {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'treatment_plans';

$planId = (int)($_GET['plan_id'] ?? 0);
$sessionId = (int)($_GET['session_id'] ?? 0);

if ($sessionId <= 0) {
    header('Location: customers.php');
    exit;
}

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

function ensureColumn(PDO $conn, string $table, string $column, string $definition): void
{
    try {
        $stmt = $conn->prepare("SHOW COLUMNS FROM `$table` LIKE ?");
        $stmt->execute([$column]);
        $exists = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$exists) {
            $conn->exec("ALTER TABLE `$table` ADD COLUMN $definition");
        }
    } catch (Throwable $e) {
        // Keep page usable if schema migration is restricted.
    }
}

function ensureSessionSchema(PDO $conn): void
{
    try {
        $conn->exec("
            CREATE TABLE IF NOT EXISTS session_records (
                id INT AUTO_INCREMENT PRIMARY KEY,
                plan_session_id INT NOT NULL,
                clinical_observations TEXT NULL,
                outcome_rating INT NULL,
                next_focus TEXT NULL,
                treatment_date DATE NULL,
                skin_response VARCHAR(100) NULL,
                pain_level INT NULL,
                products_used TEXT NULL,
                home_care TEXT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                UNIQUE KEY uniq_plan_session_id (plan_session_id)
            )
        ");
    } catch (Throwable $e) {
        // Keep page usable if table already exists with a different shape.
    }

    ensureColumn($conn, 'treatment_plan_sessions', 'before_image_path', "before_image_path VARCHAR(500) DEFAULT NULL AFTER focus_notes");
    ensureColumn($conn, 'treatment_plan_sessions', 'after_image_path', "after_image_path VARCHAR(500) DEFAULT NULL AFTER before_image_path");
    ensureColumn($conn, 'treatment_plan_sessions', 'completed_at', "completed_at DATETIME DEFAULT NULL");

    ensureColumn($conn, 'session_records', 'treatment_date', "treatment_date DATE NULL");
    ensureColumn($conn, 'session_records', 'skin_response', "skin_response VARCHAR(100) NULL");
    ensureColumn($conn, 'session_records', 'pain_level', "pain_level INT NULL");
    ensureColumn($conn, 'session_records', 'products_used', "products_used TEXT NULL");
    ensureColumn($conn, 'session_records', 'home_care', "home_care TEXT NULL");
    ensureColumn($conn, 'session_records', 'updated_at', "updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
}

ensureSessionSchema($conn);

if ($planId > 0) {
    $stmt = $conn->prepare("
        SELECT 
            s.*,
            p.customer_id,
            p.title AS plan_title,
            p.status AS plan_status
        FROM treatment_plan_sessions s
        JOIN treatment_plans p ON p.id = s.plan_id
        WHERE s.id = ? AND s.plan_id = ?
        LIMIT 1
    ");
    $stmt->execute([$sessionId, $planId]);
} else {
    $stmt = $conn->prepare("
        SELECT 
            s.*,
            p.customer_id,
            p.title AS plan_title,
            p.status AS plan_status
        FROM treatment_plan_sessions s
        JOIN treatment_plans p ON p.id = s.plan_id
        WHERE s.id = ?
        LIMIT 1
    ");
    $stmt->execute([$sessionId]);
}

$session = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$session) {
    header('Location: customers.php');
    exit;
}

$planId = (int)$session['plan_id'];
$cid = (int)$session['customer_id'];

$stmt = $conn->prepare("SELECT Customer_ID, Name, Phone FROM `Customer` WHERE Customer_ID = ? LIMIT 1");
$stmt->execute([$cid]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$customer) {
    header('Location: customers.php');
    exit;
}

$record = null;

try {
    $stmt = $conn->prepare("SELECT * FROM session_records WHERE plan_session_id = ? LIMIT 1");
    $stmt->execute([$sessionId]);
    $record = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
} catch (Throwable $e) {
    $record = null;
}

$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $treatmentDate = trim($_POST['treatment_date'] ?? date('Y-m-d'));
    $observations = trim($_POST['clinical_observations'] ?? '');
    $skinResponse = trim($_POST['skin_response'] ?? '');
    $rating = (int)($_POST['outcome_rating'] ?? 0);
    $painLevel = (int)($_POST['pain_level'] ?? 0);
    $productsUsed = trim($_POST['products_used'] ?? '');
    $homeCare = trim($_POST['home_care'] ?? '');
    $nextFocus = trim($_POST['next_focus'] ?? '');

    if ($rating < 1 || $rating > 5) {
        $rating = null;
    }

    if ($painLevel < 0 || $painLevel > 10) {
        $painLevel = null;
    }

    if ($treatmentDate !== '' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $treatmentDate)) {
        $err = 'Invalid treatment date.';
    } else {
        $beforeImagePath = $session['before_image_path'] ?? null;
        $afterImagePath = $session['after_image_path'] ?? null;

        if (
            isset($_FILES['before_image']) &&
            is_array($_FILES['before_image']) &&
            ($_FILES['before_image']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK
        ) {
            $tmp = $_FILES['before_image']['tmp_name'];
            $original = $_FILES['before_image']['name'] ?? '';
            $extension = strtolower(pathinfo($original, PATHINFO_EXTENSION));

            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                $uploadDir = __DIR__ . '/../uploads/treatment_sessions';

                if (!is_dir($uploadDir)) {
                    @mkdir($uploadDir, 0775, true);
                }

                $filename = 'session_' . $sessionId . '_before_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
                $target = $uploadDir . '/' . $filename;

                if (@move_uploaded_file($tmp, $target)) {
                    $beforeImagePath = 'uploads/treatment_sessions/' . $filename;
                }
            }
        }

        if (
            isset($_FILES['after_image']) &&
            is_array($_FILES['after_image']) &&
            ($_FILES['after_image']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK
        ) {
            $tmp = $_FILES['after_image']['tmp_name'];
            $original = $_FILES['after_image']['name'] ?? '';
            $extension = strtolower(pathinfo($original, PATHINFO_EXTENSION));

            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                $uploadDir = __DIR__ . '/../uploads/treatment_sessions';

                if (!is_dir($uploadDir)) {
                    @mkdir($uploadDir, 0775, true);
                }

                $filename = 'session_' . $sessionId . '_after_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
                $target = $uploadDir . '/' . $filename;

                if (@move_uploaded_file($tmp, $target)) {
                    $afterImagePath = 'uploads/treatment_sessions/' . $filename;
                }
            }
        }

        try {
            $conn->beginTransaction();

            if ($record) {
                $stmt = $conn->prepare("
                    UPDATE session_records
                    SET 
                        treatment_date = ?,
                        clinical_observations = ?,
                        skin_response = ?,
                        outcome_rating = ?,
                        pain_level = ?,
                        products_used = ?,
                        home_care = ?,
                        next_focus = ?
                    WHERE plan_session_id = ?
                ");

                $stmt->execute([
                    $treatmentDate !== '' ? $treatmentDate : null,
                    $observations,
                    $skinResponse,
                    $rating,
                    $painLevel,
                    $productsUsed,
                    $homeCare,
                    $nextFocus,
                    $sessionId,
                ]);
            } else {
                $stmt = $conn->prepare("
                    INSERT INTO session_records (
                        plan_session_id,
                        treatment_date,
                        clinical_observations,
                        skin_response,
                        outcome_rating,
                        pain_level,
                        products_used,
                        home_care,
                        next_focus
                    )
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
                ");

                $stmt->execute([
                    $sessionId,
                    $treatmentDate !== '' ? $treatmentDate : null,
                    $observations,
                    $skinResponse,
                    $rating,
                    $painLevel,
                    $productsUsed,
                    $homeCare,
                    $nextFocus,
                ]);
            }

            $stmt = $conn->prepare("
                UPDATE treatment_plan_sessions
                SET completed_at = NOW(), before_image_path = ?, after_image_path = ?
                WHERE id = ?
            ");
            $stmt->execute([$beforeImagePath, $afterImagePath, $sessionId]);

            syncTreatmentPlanStatus($conn, $planId);

            $conn->commit();

            header('Location: customer_detail.php?id=' . $cid . '&tab=plan');
            exit;
        } catch (Throwable $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }
            $err = 'Unable to update session.';
        }
    }
}

$selectedRating = (int)($_POST['outcome_rating'] ?? ($record['outcome_rating'] ?? 0));
$selectedPain = (int)($_POST['pain_level'] ?? ($record['pain_level'] ?? 0));
$selectedSkinResponse = $_POST['skin_response'] ?? ($record['skin_response'] ?? '');
$currentBeforeImage = $session['before_image_path'] ?? '';
$currentAfterImage = $session['after_image_path'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Update Treatment Session | Elysian Management Hub</title>

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
        $title = 'Update Session';
        $subtitle = 'Treatment record and progress note.';
        $backLink = 'customer_detail.php?id=' . $cid . '&tab=plan';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1380px] px-8 py-8">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Treatment Session
                        </div>

                        <h2 class="text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                            Update session
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

                <form method="post" enctype="multipart/form-data" class="grid gap-6 xl:grid-cols-[1fr_360px]">
                    <section class="space-y-5">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                    <span class="material-symbols-outlined text-[22px]">edit_note</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Session note</h3>
                                    <p class="text-sm font-medium text-slate-500">Clinical update.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-5 p-6 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Treatment Date
                                    </label>
                                    <input
                                        type="date"
                                        name="treatment_date"
                                        value="<?= h($_POST['treatment_date'] ?? ($record['treatment_date'] ?? date('Y-m-d'))) ?>"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Skin Response
                                    </label>
                                    <select
                                        name="skin_response"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    >
                                        <option value="">Select response</option>
                                        <?php foreach (['Improved', 'Stable', 'Mild redness', 'Irritated', 'Purging', 'Sensitive'] as $response): ?>
                                            <option value="<?= h($response) ?>" <?= $selectedSkinResponse === $response ? 'selected' : '' ?>>
                                                <?= h($response) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="lg:col-span-2">
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Clinical Observations
                                    </label>
                                    <textarea
                                        name="clinical_observations"
                                        rows="5"
                                        placeholder="Treatment observations"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    ><?= h($_POST['clinical_observations'] ?? ($record['clinical_observations'] ?? '')) ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                    <span class="material-symbols-outlined text-[22px]">monitoring</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Outcome</h3>
                                    <p class="text-sm font-medium text-slate-500">Rating and follow-up.</p>
                                </div>
                            </div>

                            <div class="space-y-5 p-6">
                                <div>
                                    <label class="mb-3 block text-sm font-black text-slate-700">
                                        Outcome Rating
                                    </label>

                                    <div class="grid grid-cols-5 gap-2">
                                        <?php for ($rating = 1; $rating <= 5; $rating++): ?>
                                            <label class="cursor-pointer">
                                                <input
                                                    type="radio"
                                                    name="outcome_rating"
                                                    value="<?= h($rating) ?>"
                                                    class="peer sr-only"
                                                    <?= $selectedRating === $rating ? 'checked' : '' ?>
                                                />
                                                <span class="flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 text-sm font-black text-slate-500 transition peer-checked:border-sky-500 peer-checked:bg-sky-500 peer-checked:text-white peer-checked:shadow-glow hover:border-sky-200 hover:bg-sky-50">
                                                    <?= h($rating) ?>
                                                </span>
                                            </label>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-3 block text-sm font-black text-slate-700">
                                        Pain Level
                                    </label>

                                    <div class="grid grid-cols-6 gap-2 md:grid-cols-11">
                                        <?php for ($pain = 0; $pain <= 10; $pain++): ?>
                                            <label class="cursor-pointer">
                                                <input
                                                    type="radio"
                                                    name="pain_level"
                                                    value="<?= h($pain) ?>"
                                                    class="peer sr-only"
                                                    <?= $selectedPain === $pain ? 'checked' : '' ?>
                                                />
                                                <span class="flex h-10 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-xs font-black text-slate-500 transition peer-checked:border-violet-500 peer-checked:bg-violet-500 peer-checked:text-white hover:border-violet-200 hover:bg-violet-50">
                                                    <?= h($pain) ?>
                                                </span>
                                            </label>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Next Focus
                                    </label>
                                    <input
                                        type="text"
                                        name="next_focus"
                                        value="<?= h($_POST['next_focus'] ?? ($record['next_focus'] ?? '')) ?>"
                                        placeholder="Next session focus"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                    <span class="material-symbols-outlined text-[22px]">spa</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Care details</h3>
                                    <p class="text-sm font-medium text-slate-500">Products and home care.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-5 p-6 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Products Used
                                    </label>
                                    <textarea
                                        name="products_used"
                                        rows="4"
                                        placeholder="Products or devices"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    ><?= h($_POST['products_used'] ?? ($record['products_used'] ?? '')) ?></textarea>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Home Care
                                    </label>
                                    <textarea
                                        name="home_care"
                                        rows="4"
                                        placeholder="After-care notes"
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    ><?= h($_POST['home_care'] ?? ($record['home_care'] ?? '')) ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                    <span class="material-symbols-outlined text-[22px]">image</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Progress Images</h3>
                                    <p class="text-sm font-medium text-slate-500">Upload before and after treatment photos.</p>
                                </div>
                            </div>

                            <div class="grid gap-5 p-6 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Before Treatment Image
                                    </label>
                                    <input
                                        id="beforeImageInput"
                                        type="file"
                                        name="before_image"
                                        accept=".jpg,.jpeg,.png,.webp,image/*"
                                        class="block h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-500 file:mr-3 file:rounded-full file:border-0 file:bg-amber-50 file:px-3 file:py-1.5 file:text-xs file:font-black file:text-amber-600"
                                    />
                                    <div class="mt-3 rounded-2xl border border-slate-200 bg-slate-50 p-3">
                                        <?php if ($currentBeforeImage !== ''): ?>
                                            <img
                                                id="beforeImagePreview"
                                                src="../<?= h($currentBeforeImage) ?>"
                                                alt="Before image"
                                                class="h-32 w-full rounded-xl object-cover"
                                            />
                                            <div id="beforeImageEmpty" class="hidden flex h-32 items-center justify-center rounded-xl bg-white text-center text-xs font-bold text-slate-400">
                                                No image
                                            </div>
                                        <?php else: ?>
                                            <div id="beforeImageEmpty" class="flex h-32 items-center justify-center rounded-xl bg-white text-center text-xs font-bold text-slate-400">
                                                No before image
                                            </div>
                                            <img
                                                id="beforeImagePreview"
                                                src=""
                                                alt="Preview"
                                                class="hidden h-32 w-full rounded-xl object-cover"
                                            />
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        After Treatment Image
                                    </label>
                                    <input
                                        id="afterImageInput"
                                        type="file"
                                        name="after_image"
                                        accept=".jpg,.jpeg,.png,.webp,image/*"
                                        class="block h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-500 file:mr-3 file:rounded-full file:border-0 file:bg-emerald-50 file:px-3 file:py-1.5 file:text-xs file:font-black file:text-emerald-600"
                                    />
                                    <div class="mt-3 rounded-2xl border border-slate-200 bg-slate-50 p-3">
                                        <?php if ($currentAfterImage !== ''): ?>
                                            <img
                                                id="afterImagePreview"
                                                src="../<?= h($currentAfterImage) ?>"
                                                alt="After image"
                                                class="h-32 w-full rounded-xl object-cover"
                                            />
                                            <div id="afterImageEmpty" class="hidden flex h-32 items-center justify-center rounded-xl bg-white text-center text-xs font-bold text-slate-400">
                                                No image
                                            </div>
                                        <?php else: ?>
                                            <div id="afterImageEmpty" class="flex h-32 items-center justify-center rounded-xl bg-white text-center text-xs font-bold text-slate-400">
                                                No after image
                                            </div>
                                            <img
                                                id="afterImagePreview"
                                                src=""
                                                alt="Preview"
                                                class="hidden h-32 w-full rounded-xl object-cover"
                                            />
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <aside class="xl:sticky xl:top-6 h-fit">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="relative overflow-hidden bg-slate-950 p-6 text-white">
                                <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-sky-400/25 blur-3xl"></div>

                                <div class="relative">
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-sky-300">Session</p>
                                    <h3 class="mt-3 text-2xl font-black tracking-tight">Review update</h3>
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
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-sky-500">Plan</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h($session['plan_title'] ?? 'Treatment plan') ?>
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-emerald-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-emerald-600">Session</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        #<?= h((int)$session['session_number']) ?> · <?= h($session['service_name'] ?? 'Service') ?>
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-violet-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-violet-600">Focus</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h($session['focus_notes'] ?: '—') ?>
                                    </p>
                                </div>

                                <?php 
                                // Check if there's a scheduled appointment
                                $stmt = $conn->prepare("
                                    SELECT tss.*, ap.booking_code, ap.status as appt_status
                                    FROM treatment_session_schedules tss
                                    LEFT JOIN appointments ap ON tss.appointment_id = ap.id
                                    WHERE tss.plan_session_id = ?
                                    ORDER BY tss.id DESC
                                    LIMIT 1
                                ");
                                $stmt->execute([$sessionId]);
                                $schedule = $stmt->fetch();
                                
                                if ($schedule && $schedule['status'] === 'scheduled'): 
                                ?>
                                <div class="rounded-2xl bg-amber-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-amber-600">Scheduled</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= date('M j, Y', strtotime($schedule['scheduled_date'])) ?> · <?= date('H:i', strtotime($schedule['scheduled_time'])) ?>
                                    </p>
                                    <?php if ($schedule['booking_code']): ?>
                                    <p class="mt-1 text-xs font-semibold text-amber-600">
                                        Code: <?= h($schedule['booking_code']) ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Completed</p>
                                    <p class="mt-2 text-sm font-bold text-slate-700">
                                        <?= h(formatDate($session['completed_at'] ?? null)) ?>
                                    </p>
                                </div>

                                <?php if (!$session['completed_at'] && $schedule && $schedule['status'] === 'scheduled'): ?>
                                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-amber-600 mb-3">Mark Attendance</p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button
                                            type="button"
                                            onclick="markSession('completed')"
                                            class="h-10 rounded-xl bg-emerald-500 text-xs font-black text-white hover:bg-emerald-600 transition"
                                        >
                                            <span class="flex items-center justify-center gap-1">
                                                <span class="material-symbols-outlined text-[16px]">check_circle</span>
                                                Completed
                                            </span>
                                        </button>
                                        <button
                                            type="button"
                                            onclick="markSession('no_show')"
                                            class="h-10 rounded-xl bg-red-500 text-xs font-black text-white hover:bg-red-600 transition"
                                        >
                                            <span class="flex items-center justify-center gap-1">
                                                <span class="material-symbols-outlined text-[16px]">cancel</span>
                                                No Show
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="grid gap-3 pt-2">
                                    <button
                                        type="submit"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                                    >
                                        <span class="material-symbols-outlined text-[19px]">check_circle</span>
                                        Save Session
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
        const beforeImageInput = document.getElementById('beforeImageInput');
        const beforeImagePreview = document.getElementById('beforeImagePreview');
        const beforeImageEmpty = document.getElementById('beforeImageEmpty');
        const afterImageInput = document.getElementById('afterImageInput');
        const afterImagePreview = document.getElementById('afterImagePreview');
        const afterImageEmpty = document.getElementById('afterImageEmpty');

        if (beforeImageInput && beforeImagePreview) {
            beforeImageInput.addEventListener('change', function() {
                const file = this.files && this.files[0];

                if (!file) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(event) {
                    beforeImagePreview.src = event.target.result;
                    beforeImagePreview.classList.remove('hidden');

                    if (beforeImageEmpty) {
                        beforeImageEmpty.classList.add('hidden');
                    }
                };

                reader.readAsDataURL(file);
            });
        }

        if (afterImageInput && afterImagePreview) {
            afterImageInput.addEventListener('change', function() {
                const file = this.files && this.files[0];

                if (!file) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(event) {
                    afterImagePreview.src = event.target.result;
                    afterImagePreview.classList.remove('hidden');

                    if (afterImageEmpty) {
                        afterImageEmpty.classList.add('hidden');
                    }
                };

                reader.readAsDataURL(file);
            });
        }

        async function markSession(status) {
            if (!confirm(status === 'completed' ? 'Mark this session as completed?' : 'Mark this customer as no-show?')) {
                return;
            }

            try {
                const response = await fetch('../backend/api/complete_session.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        plan_session_id: <?= $sessionId ?>,
                        status: status,
                        treatment_date: document.querySelector('input[name="treatment_date"]').value
                    })
                });

                const result = await response.json();

                if (result.success) {
                    alert(status === 'completed' ? 'Session marked as completed!' : 'Customer marked as no-show');
                    window.location.href = 'customer_detail.php?id=<?= $cid ?>&tab=plan';
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                alert('Error: ' + error.message);
            }
        }
    </script>
</body>
</html>
