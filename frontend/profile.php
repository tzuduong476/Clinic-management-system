<?php
require_once '../backend/db.php';

$currentUser = getCurrentUser();

if (!$currentUser) {
    header('Location: signin.php');
    exit;
}

$esc = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$userName = trim((string)($currentUser['full_name'] ?? 'User'));
$userInitial = strtoupper(substr($userName, 0, 1));

$icon = static function (string $name, string $class = 'h-5 w-5'): string {
    $icons = [
        'arrow' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'check' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6 9 17l-5-5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'user' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2.1"/><path d="M4.5 21a7.5 7.5 0 0 1 15 0" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'mail' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'phone' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.6 3.5 9.2 8c.4.7.3 1.5-.3 2.1l-1.1 1.1a13.5 13.5 0 0 0 5 5l1.1-1.1c.6-.6 1.4-.7 2.1-.3l4.5 2.6c.8.5 1.1 1.4.8 2.3-.5 1.5-1.9 2.6-3.5 2.6C9.1 22.3 1.7 14.9 1.7 6.2c0-1.6 1.1-3 2.6-3.5.9-.3 1.8 0 2.3.8Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
        'calendar' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3M17 3v3M4 9h16M6 5h12a2 2 0 0 1 2 2v11a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'clock' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'sparkle' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2l1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2Z" fill="currentColor"/><path d="M18.5 15l.8 3.2 3.2.8-3.2.8-.8 3.2-.8-3.2-3.2-.8 3.2-.8.8-3.2Z" fill="currentColor"/></svg>',
        'home' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.5 10.5V20h13v-9.5" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.5 20v-6h5v6" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/></svg>',
        'skin' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21a8 8 0 0 0 8-8V8.6A5.6 5.6 0 0 0 14.4 3H9.6A5.6 5.6 0 0 0 4 8.6V13a8 8 0 0 0 8 8Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/><path d="M8.5 11h.01M15.5 11h.01M9 16c1.8 1.2 4.2 1.2 6 0" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>',
        'empty' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3M17 3v3M4 9h16M6 5h12a2 2 0 0 1 2 2v11a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/><path d="m9 13 6 4M15 13l-6 4" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'error' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 7v6M12 17h.01" stroke="currentColor" stroke-width="2.8" stroke-linecap="round"/></svg>',
        'location' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-5.6 7-12a7 7 0 1 0-14 0c0 6.4 7 12 7 12Z" stroke="currentColor" stroke-width="2.1"/><circle cx="12" cy="9" r="2.4" fill="currentColor"/></svg>',
    ];

    return $icons[$name] ?? '';
};
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>My Profile | Elysian Skin Clinic</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#0db9f2",
                        "primary-soft": "#E7F8FE",
                        "background-light": "#FFFFFF",
                        "slate-heading": "#33475B",
                        "cool-gray": "#64748B",
                        "clinic-navy": "#0F1F3D"
                    },
                    fontFamily: {
                        display: ["Manrope", "sans-serif"]
                    },
                    boxShadow: {
                        soft: "0 24px 70px rgba(15, 31, 61, 0.10)",
                        glow: "0 24px 60px rgba(13, 185, 242, 0.22)"
                    },
                    borderRadius: {
                        "4xl": "2rem",
                        "5xl": "2.5rem"
                    }
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        body {
            font-family: 'Manrope', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(13, 185, 242, 0.10), transparent 34%),
                radial-gradient(circle at 85% 10%, rgba(125, 211, 252, 0.16), transparent 30%),
                #FFFFFF;
        }

        .section-label {
            @apply text-xs font-black uppercase tracking-[0.34em] text-primary;
        }

        .soft-card {
            @apply rounded-[2rem] border border-slate-100 bg-white shadow-[0_18px_55px_rgba(15,31,61,0.08)];
        }
    </style>
</head>

<body class="min-h-screen bg-white text-slate-900 font-display antialiased">
    <?php include __DIR__ . '/public_navbar.php'; ?>

    <main>
        <!-- Hero -->
        <section class="relative overflow-hidden py-12 lg:py-16">
            <div class="container mx-auto px-6">
                <div class="relative overflow-hidden rounded-[2.5rem] border border-sky-100 bg-gradient-to-br from-sky-50 via-white to-primary-soft p-8 shadow-soft lg:p-12">
                    <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-primary/20 blur-3xl"></div>
                    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-sky-200/30 blur-3xl"></div>

                    <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                        <div class="flex flex-col gap-6 md:flex-row md:items-center">
                            <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-[2rem] bg-primary text-4xl font-black text-white shadow-[0_18px_45px_rgba(13,185,242,0.28)]">
                                <?= $esc($userInitial); ?>
                            </div>

                            <div>
                                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-white/80 px-4 py-2 shadow-sm">
                                    <span class="h-2 w-2 rounded-full bg-primary"></span>
                                    <span class="text-xs font-black uppercase tracking-[0.22em] text-primary">My Profile</span>
                                </div>

                                <h1 class="text-4xl font-black leading-tight tracking-[-0.04em] text-slate-heading lg:text-6xl">
                                    Welcome, <?= $esc($userName); ?>
                                </h1>
                                <p class="mt-3 max-w-2xl text-base font-medium leading-7 text-cool-gray">
                                    View your profile details, appointment history, and continue your skincare journey with Elysian.
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                            <a href="dichvu.php" class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-8 py-4 font-black text-white transition-all hover:-translate-y-0.5 hover:shadow-glow">
                                Book New Visit
                                <?= $icon('arrow', 'h-5 w-5'); ?>
                            </a>
                            <a href="home.php" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-slate-200 bg-white px-8 py-4 font-black text-slate-heading transition-all hover:border-primary hover:text-primary">
                                <?= $icon('home', 'h-5 w-5'); ?>
                                Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Profile Content -->
        <section class="pb-16 lg:pb-20">
            <div class="container mx-auto px-6">
                <div class="grid gap-8 lg:grid-cols-[0.9fr_1.4fr]">
                    <!-- Sidebar -->
                    <aside class="space-y-6">
                        <div class="soft-card sticky top-28 overflow-hidden">
                            <div class="bg-clinic-navy p-7 text-white">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-3xl bg-white/12 text-2xl font-black text-primary">
                                        <?= $esc($userInitial); ?>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-xs font-black uppercase tracking-[0.24em] text-white/45">Signed in as</p>
                                        <h2 id="user-name" class="truncate text-2xl font-black text-white">
                                            <?= $esc($userName); ?>
                                        </h2>
                                        <p id="user-email" class="mt-1 truncate text-sm font-semibold text-white/58">Loading...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 p-7">
                                <div class="flex items-start gap-4 rounded-3xl bg-slate-50 p-5">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                        <?= $icon('phone', 'h-6 w-6'); ?>
                                    </span>
                                    <div>
                                        <p class="text-xs font-black uppercase tracking-[0.18em] text-cool-gray">Phone</p>
                                        <p id="user-phone" class="mt-1 text-sm font-black text-slate-heading">-</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4 rounded-3xl bg-slate-50 p-5">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                        <?= $icon('skin', 'h-6 w-6'); ?>
                                    </span>
                                    <div>
                                        <p class="text-xs font-black uppercase tracking-[0.18em] text-cool-gray">Skin Type</p>
                                        <p id="user-skin-type" class="mt-1 text-sm font-black text-slate-heading">Not set</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4 rounded-3xl bg-slate-50 p-5">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                        <?= $icon('calendar', 'h-6 w-6'); ?>
                                    </span>
                                    <div>
                                        <p class="text-xs font-black uppercase tracking-[0.18em] text-cool-gray">Member Since</p>
                                        <p id="user-created" class="mt-1 text-sm font-black text-slate-heading">-</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-[2rem] border border-slate-100 bg-gradient-to-br from-primary via-sky-400 to-cyan-300 p-7 text-white shadow-glow">
                            <p class="text-xs font-black uppercase tracking-[0.24em] text-white/70">Next Step</p>
                            <h3 class="mt-3 text-2xl font-black">Ready for your next visit?</h3>
                            <p class="mt-2 text-sm font-semibold leading-6 text-white/75">
                                Explore services and book a new appointment with the clinic team.
                            </p>
                            <a href="dichvu.php" class="mt-6 inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 font-black text-primary transition hover:-translate-y-0.5">
                                Browse Services
                                <?= $icon('arrow', 'h-4 w-4'); ?>
                            </a>
                        </div>
                    </aside>

                    <!-- Main Content -->
                    <div class="space-y-6">
                        <div class="soft-card p-7 lg:p-8">
                            <div class="mb-7 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                                <div>
                                    <p class="section-label">Appointments</p>
                                    <h2 class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-heading lg:text-4xl">
                                        My Appointments
                                    </h2>
                                </div>

                                <span id="appointment-count" class="w-fit rounded-full bg-primary-soft px-4 py-2 text-sm font-black text-primary">
                                    0 appointments
                                </span>
                            </div>

                            <div id="appointments-list" class="space-y-4">
                                <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center">
                                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                        <?= $icon('calendar', 'h-7 w-7'); ?>
                                    </div>
                                    <p class="font-black text-slate-heading">Loading appointments...</p>
                                    <p class="mt-1 text-sm font-medium text-cool-gray">Please wait a moment.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Treatment Plans Section -->
                        <div class="soft-card p-7 lg:p-8">
                            <div class="mb-7 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                                <div>
                                    <p class="section-label">Treatment Pathway</p>
                                    <h2 class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-heading lg:text-4xl">
                                        My Treatment Plans
                                    </h2>
                                </div>

                                <span id="plan-count" class="w-fit rounded-full bg-emerald-soft px-4 py-2 text-sm font-black text-emerald-600">
                                    0 plans
                                </span>
                            </div>

                            <div id="treatment-plans-list" class="space-y-4">
                                <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center">
                                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </div>
                                    <p class="font-black text-slate-heading">Loading treatment plans...</p>
                                    <p class="mt-1 text-sm font-medium text-cool-gray">Please wait a moment.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications Section -->
                        <div class="soft-card p-7 lg:p-8">
                            <div class="mb-7 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                                <div>
                                    <p class="section-label">Alerts</p>
                                    <h2 class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-heading lg:text-4xl">
                                        Notifications
                                    </h2>
                                </div>

                                <span id="notification-count" class="w-fit rounded-full bg-amber-soft px-4 py-2 text-sm font-black text-amber-600">
                                    0 new
                                </span>
                            </div>

                            <div id="notifications-list" class="space-y-4">
                                <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center">
                                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </div>
                                    <p class="font-black text-slate-heading">Loading notifications...</p>
                                    <p class="mt-1 text-sm font-medium text-cool-gray">Please wait a moment.</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-5 md:grid-cols-3">
                            <div class="soft-card p-6">
                                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                    <?= $icon('calendar', 'h-6 w-6'); ?>
                                </div>
                                <p id="stat-total" class="text-3xl font-black text-slate-heading">0</p>
                                <p class="mt-1 text-sm font-bold text-cool-gray">Total visits</p>
                            </div>

                            <div class="soft-card p-6">
                                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                    <?= $icon('check', 'h-6 w-6'); ?>
                                </div>
                                <p id="stat-confirmed" class="text-3xl font-black text-slate-heading">0</p>
                                <p class="mt-1 text-sm font-bold text-cool-gray">Confirmed</p>
                            </div>

                            <div class="soft-card p-6">
                                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                    <?= $icon('clock', 'h-6 w-6'); ?>
                                </div>
                                <p id="stat-pending" class="text-3xl font-black text-slate-heading">0</p>
                                <p class="mt-1 text-sm font-bold text-cool-gray">Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="pb-20">
            <div class="container mx-auto px-6">
                <div class="relative overflow-hidden rounded-[2.5rem] bg-clinic-navy p-8 text-white shadow-soft lg:p-12">
                    <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-primary/25 blur-3xl"></div>

                    <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.34em] text-primary">Treatment Pathway</p>
                            <h2 class="mt-3 max-w-3xl text-4xl font-black tracking-[-0.04em] lg:text-5xl">
                                Keep your skincare journey organized.
                            </h2>
                            <p class="mt-4 max-w-2xl leading-7 text-white/65">
                                Your appointment history helps Elysian understand your treatment progress and support the next step clearly.
                            </p>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                            <a href="dichvu.php" class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 font-black text-clinic-navy transition hover:text-primary">
                                Book Appointment
                            </a>
                            <a href="contact.php" class="inline-flex items-center justify-center rounded-full border border-white/20 px-8 py-4 font-black text-white transition hover:bg-white/10">
                                Contact Clinic
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer giống public pages -->
    <footer class="bg-clinic-navy text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <?php
                        if (file_exists(__DIR__ . '/shared/logo_svg.php')) {
                            include __DIR__ . '/shared/logo_svg.php';
                        }
                        ?>
                    </div>
                    <p class="text-white/60 max-w-md leading-7">
                        Elysian Skin Clinic provides personalized skincare treatment, appointment booking, and treatment pathway management in one organized clinic experience.
                    </p>
                </div>

                <div>
                    <h4 class="font-black mb-6 text-white">Clinic</h4>
                    <ul class="space-y-4 text-sm text-white/60 font-semibold">
                        <li><a href="home.php" class="hover:text-primary transition-colors">Home</a></li>
                        <li><a href="dichvu.php" class="hover:text-primary transition-colors">Services</a></li>
                        <li><a href="about.php" class="hover:text-primary transition-colors">About</a></li>
                        <li><a href="contact.php" class="hover:text-primary transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-black mb-6 text-white">Contact</h4>
                    <ul class="space-y-4 text-sm text-white/60 font-semibold">
                        <li class="flex gap-3">
                            <span class="shrink-0 text-primary"><?= $icon('mail', 'h-5 w-5'); ?></span>
                            <span>elysian@group4.com.vn</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="shrink-0 text-primary"><?= $icon('location', 'h-5 w-5'); ?></span>
                            <span>So 1 Phan Tay Nhac, Hanoi, Vietnam</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="shrink-0 text-primary"><?= $icon('clock', 'h-5 w-5'); ?></span>
                            <span>Mon - Sat, 9:00 AM - 7:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between gap-4 text-xs text-white/40 uppercase tracking-widest">
                <p>© 2026 Elysian Skin Clinic. All rights reserved.</p>
                <p>Integrated Treatment and Appointment Management System</p>
            </div>
        </div>
    </footer>

    <script>
        const icons = {
            calendar: <?= json_encode($icon('calendar', 'h-5 w-5')); ?>,
            clock: <?= json_encode($icon('clock', 'h-5 w-5')); ?>,
            user: <?= json_encode($icon('user', 'h-5 w-5')); ?>,
            arrow: <?= json_encode($icon('arrow', 'h-4 w-4')); ?>,
            empty: <?= json_encode($icon('empty', 'h-8 w-8')); ?>,
            error: <?= json_encode($icon('error', 'h-8 w-8')); ?>
        };

        function escapeHtml(value) {
            return String(value ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }

        function formatDate(value) {
            if (!value) {
                return '-';
            }

            const date = new Date(value);

            if (Number.isNaN(date.getTime())) {
                return escapeHtml(value);
            }

            return date.toLocaleDateString('en-US', {
                weekday: 'short',
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        }

        function formatMemberSince(value) {
            if (!value) {
                return '-';
            }

            const date = new Date(value);

            if (Number.isNaN(date.getTime())) {
                return '-';
            }

            return date.toLocaleDateString('en-US', {
                month: 'short',
                year: 'numeric'
            });
        }

        function getStatusClass(status) {
            const normalized = String(status || '').toLowerCase();

            if (normalized === 'confirmed') {
                return 'bg-emerald-50 text-emerald-700 border-emerald-100';
            }

            if (normalized === 'checked_in') {
                return 'bg-cyan-50 text-cyan-700 border-cyan-100';
            }

            if (normalized === 'pending') {
                return 'bg-amber-50 text-amber-700 border-amber-100';
            }

            if (normalized === 'no_show') {
                return 'bg-rose-50 text-rose-700 border-rose-100';
            }

            if (normalized === 'cancelled' || normalized === 'canceled') {
                return 'bg-red-50 text-red-700 border-red-100';
            }

            if (normalized === 'completed') {
                return 'bg-sky-50 text-sky-700 border-sky-100';
            }

            return 'bg-slate-100 text-slate-700 border-slate-200';
        }

        async function loadUserData() {
            try {
                const response = await fetch('../backend/get_user.php');
                const data = await response.json();

                if (data.success && data.user) {
                    document.getElementById('user-name').textContent = data.user.Name || 'User';
                    document.getElementById('user-email').textContent = data.user.Email || '-';
                    document.getElementById('user-phone').textContent = data.user.Phone || '-';
                    document.getElementById('user-skin-type').textContent = data.user.Skin_type || 'Not set';
                    document.getElementById('user-created').textContent = formatMemberSince(data.user.Created_at);
                }
            } catch (error) {
                console.error('Failed to load user data:', error);
            }
        }

        async function loadAppointments() {
            const container = document.getElementById('appointments-list');
            const countEl = document.getElementById('appointment-count');
            const statTotal = document.getElementById('stat-total');
            const statConfirmed = document.getElementById('stat-confirmed');
            const statPending = document.getElementById('stat-pending');

            try {
                const response = await fetch('../backend/get_appointments.php');
                const data = await response.json();

                const appointments = Array.isArray(data.appointments) ? data.appointments : [];

                if (data.success && appointments.length > 0) {
                    const confirmedCount = appointments.filter(function (apt) {
                        return String(apt.status || '').toLowerCase() === 'confirmed';
                    }).length;

                    const pendingCount = appointments.filter(function (apt) {
                        return String(apt.status || '').toLowerCase() === 'pending';
                    }).length;

                    countEl.textContent = appointments.length + ' appointment' + (appointments.length !== 1 ? 's' : '');
                    statTotal.textContent = appointments.length;
                    statConfirmed.textContent = confirmedCount;
                    statPending.textContent = pendingCount;

                    container.innerHTML = appointments.map(function (apt) {
                        const formattedDate = formatDate(apt.appointment_date);
                        const time = apt.appointment_time ? String(apt.appointment_time).substring(0, 5) : '-';
                        const status = apt.status || 'pending';
                        const statusClass = getStatusClass(status);

                        return `
                            <article class="group rounded-[2rem] border border-slate-100 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-[0_18px_55px_rgba(15,31,61,0.08)]">
                                <div class="flex flex-col gap-5 md:flex-row md:items-start md:justify-between">
                                    <div class="min-w-0 flex-1">
                                        <div class="mb-3 flex flex-wrap items-center gap-2">
                                            <span class="rounded-full border px-3 py-1 text-xs font-black uppercase tracking-[0.12em] ${statusClass}">
                                                ${escapeHtml(status)}
                                            </span>
                                            <span class="rounded-full bg-slate-50 px-3 py-1 text-xs font-bold text-cool-gray">
                                                ${escapeHtml(apt.booking_code || 'No code')}
                                            </span>
                                        </div>

                                        <h3 class="text-xl font-black text-slate-heading">
                                            ${escapeHtml(apt.service_name || 'Service')}
                                        </h3>

                                        <p class="mt-2 flex items-center gap-2 text-sm font-semibold text-cool-gray">
                                            <span class="text-primary">${icons.user}</span>
                                            ${escapeHtml(apt.specialist_name || 'Specialist')}
                                        </p>

                                        <div class="mt-4 flex flex-wrap gap-3 text-sm font-bold text-slate-heading">
                                            <span class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-4 py-2">
                                                <span class="text-primary">${icons.calendar}</span>
                                                ${formattedDate}
                                            </span>

                                            <span class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-4 py-2">
                                                <span class="text-primary">${icons.clock}</span>
                                                ${escapeHtml(time)}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="rounded-3xl bg-primary-soft px-5 py-4 text-right">
                                        <p class="text-xs font-black uppercase tracking-[0.18em] text-primary">Total</p>
                                        <p class="mt-1 text-lg font-black text-slate-heading">
                                            ${escapeHtml(apt.total_price || '-')}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        `;
                    }).join('');
                } else {
                    countEl.textContent = '0 appointments';
                    statTotal.textContent = '0';
                    statConfirmed.textContent = '0';
                    statPending.textContent = '0';

                    container.innerHTML = `
                        <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center">
                            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                ${icons.empty}
                            </div>
                            <p class="text-xl font-black text-slate-heading">No appointments yet</p>
                            <p class="mx-auto mt-2 max-w-md text-sm font-medium leading-6 text-cool-gray">
                                Book your first appointment to start your Elysian treatment journey.
                            </p>
                            <a href="dichvu.php" class="mt-6 inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 font-black text-white transition hover:-translate-y-0.5">
                                Browse Services
                                ${icons.arrow}
                            </a>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Failed to load appointments:', error);

                container.innerHTML = `
                    <div class="rounded-[2rem] border border-red-100 bg-red-50 p-10 text-center text-red-600">
                        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-red-500">
                            ${icons.error}
                        </div>
                        <p class="text-xl font-black">Failed to load appointments</p>
                        <p class="mt-2 text-sm font-semibold">Please refresh the page or try again later.</p>
                    </div>
                `;
            }
        }

        loadUserData();
        loadAppointments();
        loadTreatmentPlans();
        loadNotifications();

        // Load Treatment Plans
        async function loadTreatmentPlans() {
            const container = document.getElementById('treatment-plans-list');
            const countEl = document.getElementById('plan-count');

            try {
                const response = await fetch('../backend/get_treatment_plans.php');
                const data = await response.json();

                if (data.success && data.plans && data.plans.length > 0) {
                    const plans = data.plans;
                    countEl.textContent = plans.length + ' plan' + (plans.length !== 1 ? 's' : '');

                    container.innerHTML = plans.map(function(plan) {
                        const sessions = plan.sessions || [];
                        const completedCount = sessions.filter(function(s) { return s.completed_at; }).length;
                        const progress = sessions.length > 0 ? Math.round((completedCount / sessions.length) * 100) : 0;
                        
                        // Get next upcoming session
                        const upcomingSession = sessions.find(function(s) { return !s.completed_at && s.scheduled_date; });
                        
                        return `
                            <article class="rounded-[2rem] border border-slate-100 bg-white p-5 shadow-sm transition-all hover:shadow-[0_18px_55px_rgba(15,31,61,0.08)]">
                                <div class="flex flex-col gap-5 md:flex-row md:items-start md:justify-between">
                                    <div class="min-w-0 flex-1">
                                        <div class="mb-3 flex flex-wrap items-center gap-2">
                                            <span class="rounded-full border px-3 py-1 text-xs font-black uppercase tracking-[0.12em] ${plan.status === 'active' ? 'bg-emerald-50 text-emerald-700 border-emerald-100' : 'bg-slate-100 text-slate-600 border-slate-200'}">
                                                ${escapeHtml(plan.status || 'active')}
                                            </span>
                                            <span class="rounded-full bg-slate-50 px-3 py-1 text-xs font-bold text-cool-gray">
                                                ${escapeHtml(plan.specialist_name || 'Specialist')}
                                            </span>
                                        </div>

                                        <h3 class="text-xl font-black text-slate-heading">
                                            ${escapeHtml(plan.title || 'Treatment Plan')}
                                        </h3>

                                        ${plan.overall_goal ? '<p class="mt-2 text-sm font-semibold text-cool-gray">' + escapeHtml(plan.overall_goal) + '</p>' : ''}

                                        <div class="mt-4 flex flex-wrap gap-3 text-sm font-bold text-slate-heading">
                                            <span class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-4 py-2">
                                                <span class="text-primary">${icons.calendar}</span>
                                                Started: ${formatDate(plan.start_date)}
                                            </span>
                                            <span class="inline-flex items-center gap-2 rounded-full bg-slate-50 px-4 py-2">
                                                <span class="text-primary">${icons.clock}</span>
                                                ${completedCount}/${sessions.length} sessions completed
                                            </span>
                                        </div>

                                        ${upcomingSession ? `
                                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                                <span class="inline-flex items-center gap-1.5 rounded-xl bg-amber-50 px-3 py-1.5 text-xs font-black text-amber-700">
                                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                    Next: ${formatDate(upcomingSession.scheduled_date)} at ${upcomingSession.scheduled_time ? upcomingSession.scheduled_time.substring(0, 5) : ''}
                                                </span>
                                                <span class="text-xs font-semibold text-cool-gray">
                                                    with ${escapeHtml(plan.specialist_name || 'Doctor')}
                                                </span>
                                            </div>
                                        ` : ''}

                                        <!-- Progress bar -->
                                        <div class="mt-4">
                                            <div class="h-2 w-full overflow-hidden rounded-full bg-slate-100">
                                                <div class="h-full rounded-full bg-emerald-500 transition-all" style="width: ${progress}%"></div>
                                            </div>
                                            <p class="mt-1 text-xs font-semibold text-cool-gray">${progress}% completed</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        `;
                    }).join('');
                } else {
                    countEl.textContent = '0 plans';
                    container.innerHTML = `
                        <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center">
                            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <p class="text-xl font-black text-slate-heading">No treatment plans yet</p>
                            <p class="mx-auto mt-2 max-w-md text-sm font-medium leading-6 text-cool-gray">
                                When your doctor creates a treatment plan for you, it will appear here.
                            </p>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Failed to load treatment plans:', error);
                container.innerHTML = `
                    <div class="rounded-[2rem] border border-red-100 bg-red-50 p-10 text-center text-red-600">
                        <p class="text-xl font-black">Failed to load treatment plans</p>
                        <p class="mt-2 text-sm font-semibold">Please refresh the page or try again later.</p>
                    </div>
                `;
            }
        }

        // Load Notifications
        async function loadNotifications() {
            const container = document.getElementById('notifications-list');
            const countEl = document.getElementById('notification-count');

            try {
                const response = await fetch('../backend/get_notifications.php');
                const data = await response.json();

                const notifications = data.notifications || [];
                const newCount = notifications.filter(function(n) { return !n.is_read; }).length;

                countEl.textContent = newCount + ' new';

                if (notifications.length > 0) {
                    container.innerHTML = notifications.slice(0, 6).map(function(notif) {
                        const priorityClass = notif.priority === 'urgent' ? 'bg-red-50 border-red-100' :
                                              notif.priority === 'high' ? 'bg-amber-50 border-amber-100' :
                                              'bg-slate-50 border-slate-100';
                        const priorityBadge = notif.priority === 'urgent' ? 'bg-red-500 text-white' :
                                             notif.priority === 'high' ? 'bg-amber-500 text-white' :
                                             'bg-slate-400 text-white';
                        
                        // Format message with line breaks
                        const messageLines = (notif.message || '').split('\n');
                        const formattedMessage = messageLines.map(function(line) {
                            // Handle emoji + text format
                            if (line.trim().startsWith('📅') || line.trim().startsWith('🕐')) {
                                return '<span class="block text-sm font-bold text-slate-700">' + escapeHtml(line.trim()) + '</span>';
                            }
                            return escapeHtml(line);
                        }).join('');

                        return `
                            <article class="rounded-[2rem] border p-5 ${priorityClass} transition-all hover:shadow-sm">
                                <div class="flex items-start gap-4">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl ${priorityBadge}">
                                        ${notif.type === 'session' ? '<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>' : 
                                          notif.type === 'appointment' ? '<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>' :
                                          '<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="mb-2 flex flex-wrap items-center gap-2">
                                            <h4 class="text-sm font-black text-slate-heading">${escapeHtml(notif.title || 'Notification')}</h4>
                                            <span class="rounded-full px-2 py-0.5 text-[10px] font-black uppercase ${priorityBadge}">
                                                ${escapeHtml(notif.priority || 'medium')}
                                            </span>
                                            ${!notif.is_read ? '<span class="h-2 w-2 rounded-full bg-primary"></span>' : ''}
                                        </div>
                                        <div class="text-sm font-semibold text-cool-gray leading-relaxed space-y-1">
                                            ${formattedMessage}
                                        </div>
                                        <p class="mt-3 text-xs font-medium text-slate-400">${escapeHtml(notif.relative_time || notif.created_at || '')}</p>
                                    </div>
                                </div>
                            </article>
                        `;
                    }).join('');
                } else {
                    countEl.textContent = '0 new';
                    container.innerHTML = `
                        <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-10 text-center">
                            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <p class="text-xl font-black text-slate-heading">No notifications</p>
                            <p class="mx-auto mt-2 max-w-md text-sm font-medium leading-6 text-cool-gray">
                                You will receive notifications when your doctor creates a treatment plan or schedules appointments.
                            </p>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Failed to load notifications:', error);
                container.innerHTML = `
                    <div class="rounded-[2rem] border border-red-100 bg-red-50 p-10 text-center text-red-600">
                        <p class="text-xl font-black">Failed to load notifications</p>
                        <p class="mt-2 text-sm font-semibold">Please refresh the page or try again later.</p>
                    </div>
                `;
            }
        }
    </script>
</body>
</html>
