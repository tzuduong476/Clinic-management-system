<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'customers';
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '123456';
    $skin_type = trim($_POST['skin_type'] ?? '');

    if (!$name || !$email || !$phone || !$password) {
        $err = 'Please complete all required fields.';
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO `Customer` (Name, Email, Phone, Password, Skin_type) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $hashed, $skin_type]);

            header('Location: customers.php');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $err = 'This email has already been registered.';
            } else {
                $err = 'Error: ' . $e->getMessage();
            }
        }
    }
}

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register Customer | Elysian Management Hub</title>

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
        $title = 'Register Customer';
        $subtitle = 'Create a new customer profile.';
        $backLink = 'customers.php';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1240px] px-8 py-8">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Customer
                        </div>

                        <h2 class="text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                            New customer
                        </h2>

                        <p class="mt-2 text-sm font-medium text-slate-500">
                            Add profile details for booking and treatment tracking.
                        </p>
                    </div>

                    <a
                        href="customers.php"
                        class="inline-flex h-11 items-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 shadow-sm transition hover:bg-slate-50"
                    >
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        Back to Customers
                    </a>
                </div>

                <?php if ($err): ?>
                    <div class="mb-5 rounded-2xl border border-rose-100 bg-rose-50 px-5 py-4 text-sm font-bold text-rose-700">
                        <?= h($err) ?>
                    </div>
                <?php endif; ?>

                <form method="post" class="grid gap-6 xl:grid-cols-[1fr_340px]">
                    <section class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                        <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                <span class="material-symbols-outlined text-[22px]">person_add</span>
                            </div>

                            <div>
                                <h3 class="text-xl font-black tracking-tight text-slate-950">Profile details</h3>
                                <p class="text-sm font-medium text-slate-500">Required fields are marked with *.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-black text-slate-700">
                                    Full Name <span class="text-sky-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    required
                                    value="<?= h($_POST['name'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    placeholder="Customer name"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">
                                    Email Address <span class="text-sky-500">*</span>
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    required
                                    value="<?= h($_POST['email'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    placeholder="customer@example.com"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">
                                    Phone Number <span class="text-sky-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    name="phone"
                                    required
                                    value="<?= h($_POST['phone'] ?? '') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    placeholder="090xxxxxxx"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">
                                    Access Password <span class="text-sky-500">*</span>
                                </label>
                                <input
                                    type="password"
                                    name="password"
                                    required
                                    value="<?= h($_POST['password'] ?? '123456') ?>"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    placeholder="Create password"
                                />
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-black text-slate-700">
                                    Skin Type
                                </label>
                                <select
                                    name="skin_type"
                                    class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                >
                                    <?php $selectedSkinType = $_POST['skin_type'] ?? ''; ?>
                                    <option value="">Select skin type</option>
                                    <option value="Oily" <?= $selectedSkinType === 'Oily' ? 'selected' : '' ?>>Oily</option>
                                    <option value="Dry" <?= $selectedSkinType === 'Dry' ? 'selected' : '' ?>>Dry</option>
                                    <option value="Combination" <?= $selectedSkinType === 'Combination' ? 'selected' : '' ?>>Combination</option>
                                    <option value="Sensitive" <?= $selectedSkinType === 'Sensitive' ? 'selected' : '' ?>>Sensitive</option>
                                    <option value="Normal" <?= $selectedSkinType === 'Normal' ? 'selected' : '' ?>>Normal</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    <aside class="h-fit xl:sticky xl:top-6">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="relative overflow-hidden bg-slate-950 p-6 text-white">
                                <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-sky-400/25 blur-3xl"></div>

                                <div class="relative">
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-sky-300">Profile</p>
                                    <h3 class="mt-3 text-2xl font-black tracking-tight">Customer record</h3>
                                </div>
                            </div>

                            <div class="space-y-3 p-5">
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Purpose</p>
                                    <p class="mt-2 text-sm font-bold leading-relaxed text-slate-700">
                                        Used for appointments, treatment plans and customer history.
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-sky-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-sky-500">Access</p>
                                    <p class="mt-2 text-sm font-bold leading-relaxed text-slate-700">
                                        Customer can sign in with email and password.
                                    </p>
                                </div>

                                <div class="grid gap-3 pt-2">
                                    <button
                                        type="submit"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600"
                                    >
                                        <span class="material-symbols-outlined text-[19px]">person_add</span>
                                        Create Profile
                                    </button>

                                    <a
                                        href="customers.php"
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
</body>
</html>