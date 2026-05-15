<?php
require_once '../backend/db.php';

$currentUser = getCurrentUser();
$userName = $currentUser['full_name'] ?? 'Guest';

$esc = static function ($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};

$icon = static function (string $name, string $class = 'h-5 w-5'): string {
    $icons = [
        'arrow' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'check' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6 9 17l-5-5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'shield' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 19 6v5.5c0 4.6-2.9 7.9-7 9.5-4.1-1.6-7-4.9-7-9.5V6l7-3Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m8.7 12.1 2.1 2.1 4.7-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'sparkle' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2l1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2Z" fill="currentColor"/><path d="M18.5 15l.8 3.2 3.2.8-3.2.8-.8 3.2-.8-3.2-3.2-.8 3.2-.8.8-3.2Z" fill="currentColor"/></svg>',
        'heart' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20.5 5.8a5.1 5.1 0 0 0-7.2 0L12 7.1l-1.3-1.3a5.1 5.1 0 0 0-7.2 7.2L12 21l8.5-8a5.1 5.1 0 0 0 0-7.2Z" fill="currentColor"/></svg>',
        'chart' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V5M4 19h16" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/><path d="M8 15v-4M12 15V8M16 15v-6" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'user' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2.1"/><path d="M4.5 21a7.5 7.5 0 0 1 15 0" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'mail' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'location' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-5.6 7-12a7 7 0 1 0-14 0c0 6.4 7 12 7 12Z" stroke="currentColor" stroke-width="2.1"/><circle cx="12" cy="9" r="2.4" fill="currentColor"/></svg>',
        'clock' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    ];

    return $icons[$name] ?? '';
};

$values = [
    [
        'icon' => 'shield',
        'title' => 'Clinical Precision',
        'description' => 'Treatment decisions are guided by skin condition, history, tolerance, and expected progress.',
    ],
    [
        'icon' => 'sparkle',
        'title' => 'Personalized Care',
        'description' => 'Each course is tailored to the client’s concern, schedule, and treatment goal.',
    ],
    [
        'icon' => 'heart',
        'title' => 'Long-term Support',
        'description' => 'Progress is followed session by session, not treated as a one-time visit.',
    ],
];

$steps = [
    [
        'number' => '01',
        'title' => 'Consult',
        'description' => 'Understand skin concern, history, and treatment expectation.',
    ],
    [
        'number' => '02',
        'title' => 'Plan',
        'description' => 'Create a treatment course with clear sessions and goals.',
    ],
    [
        'number' => '03',
        'title' => 'Track',
        'description' => 'Record progress, response, and aftercare after each session.',
    ],
];
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>About Us | Elysian Skin Clinic</title>

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

<body class="bg-white text-slate-900 font-display antialiased">
    <!-- Header -->
    <?php include __DIR__ . '/public_navbar.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden py-16 lg:py-24">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                    <div class="relative order-2 lg:order-1">
                        <div class="absolute -top-8 -left-8 w-48 h-48 bg-primary/10 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-8 -right-8 w-56 h-56 bg-sky-200/30 rounded-full blur-3xl"></div>

                        <div class="relative rounded-[2.25rem] overflow-hidden shadow-soft border border-slate-100 bg-white p-3">
                            <img
                                alt="Elysian Skin Clinic treatment room"
                                class="rounded-[1.75rem] w-full h-[520px] object-cover"
                                src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=1200&q=85"
                            />

                            <div class="absolute inset-x-3 bottom-3 rounded-b-[1.75rem] bg-gradient-to-t from-clinic-navy/80 via-clinic-navy/20 to-transparent h-56 pointer-events-none"></div>

                            <div class="absolute left-7 bottom-7 rounded-[1.5rem] bg-white/92 backdrop-blur-xl p-5 shadow-xl border border-white/80 max-w-[330px]">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-primary-soft rounded-2xl flex items-center justify-center shrink-0 text-primary">
                                        <?= $icon('shield', 'h-7 w-7'); ?>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-[0.22em] text-primary">Evidence-Based Care</p>
                                        <p class="font-black text-slate-heading leading-snug">Clear treatment pathways for lasting results</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 order-1 lg:order-2">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-soft border border-sky-100 rounded-full">
                            <span class="w-2 h-2 bg-primary rounded-full"></span>
                            <span class="text-xs font-black text-slate-heading uppercase tracking-[0.22em]">About Elysian</span>
                        </div>

                        <div class="space-y-5">
                            <h1 class="text-5xl lg:text-7xl font-black text-slate-heading leading-[1.04] tracking-[-0.055em]">
                                Clinical skincare, <br/>
                                <span class="text-primary">designed with care.</span>
                            </h1>
                            <p class="text-lg text-cool-gray leading-8 max-w-xl font-medium">
                                Elysian Skin Clinic combines personalized consultation, treatment planning, appointment booking, and progress tracking into one organized clinic experience.
                            </p>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-3 max-w-xl">
                            <div class="flex items-center gap-3 rounded-2xl bg-white border border-slate-100 px-4 py-3 shadow-sm">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-soft text-primary">
                                    <?= $icon('check', 'h-4 w-4'); ?>
                                </span>
                                <span class="text-sm font-extrabold text-slate-heading">Personalized treatment courses</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl bg-white border border-slate-100 px-4 py-3 shadow-sm">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-soft text-primary">
                                    <?= $icon('check', 'h-4 w-4'); ?>
                                </span>
                                <span class="text-sm font-extrabold text-slate-heading">Session-by-session tracking</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl bg-white border border-slate-100 px-4 py-3 shadow-sm">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-soft text-primary">
                                    <?= $icon('check', 'h-4 w-4'); ?>
                                </span>
                                <span class="text-sm font-extrabold text-slate-heading">Customer profile history</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl bg-white border border-slate-100 px-4 py-3 shadow-sm">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-soft text-primary">
                                    <?= $icon('check', 'h-4 w-4'); ?>
                                </span>
                                <span class="text-sm font-extrabold text-slate-heading">Clear booking workflow</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="booking.php" class="inline-flex items-center justify-center gap-2 bg-primary text-white px-8 py-4 rounded-full font-black text-base hover:shadow-glow hover:-translate-y-0.5 transition-all">
                                Book Consultation
                                <?= $icon('arrow', 'h-5 w-5'); ?>
                            </a>
                            <a href="dichvu.php" class="inline-flex items-center justify-center border-2 border-slate-200 text-slate-heading bg-white px-8 py-4 rounded-full font-black text-base hover:border-primary hover:text-primary transition-all">
                                View Services
                            </a>
                        </div>

                        <div class="grid grid-cols-3 gap-3 max-w-xl pt-4">
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">1:1</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Consultation</p>
                            </div>
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">6+</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Care Sessions</p>
                            </div>
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">24/7</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Record Access</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clinic Story -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <p class="section-label">Our Approach</p>
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-heading leading-tight tracking-[-0.04em]">
                            A clinic workflow built around clarity and continuity.
                        </h2>
                        <p class="text-lg text-cool-gray leading-8">
                            Elysian is designed for clients who need more than a single appointment. From the first consultation to follow-up sessions, each treatment course is documented and reviewed so progress is easier to continue.
                        </p>

                        <div class="grid sm:grid-cols-2 gap-4 pt-2">
                            <div class="soft-card p-5">
                                <div class="w-11 h-11 rounded-2xl bg-primary-soft text-primary flex items-center justify-center mb-4">
                                    <?= $icon('user', 'h-6 w-6'); ?>
                                </div>
                                <h3 class="font-black text-slate-heading">Customer-centered</h3>
                                <p class="mt-2 text-sm leading-6 text-cool-gray">Profile, concerns, and history stay connected.</p>
                            </div>

                            <div class="soft-card p-5">
                                <div class="w-11 h-11 rounded-2xl bg-primary-soft text-primary flex items-center justify-center mb-4">
                                    <?= $icon('chart', 'h-6 w-6'); ?>
                                </div>
                                <h3 class="font-black text-slate-heading">Progress-focused</h3>
                                <p class="mt-2 text-sm leading-6 text-cool-gray">Each session supports the next treatment decision.</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2.25rem] overflow-hidden shadow-soft border border-slate-100 bg-white relative">
                        <img
                            class="w-full h-[460px] object-cover"
                            src="https://images.unsplash.com/photo-1579684453423-f84349ef60b0?w=1200&q=85"
                            alt="Dermatology consultation in clinic"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-clinic-navy/75 via-clinic-navy/10 to-transparent"></div>
                        <div class="absolute left-7 bottom-7 text-white space-y-2 max-w-md">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/70">Treatment Pathway</p>
                            <p class="text-2xl font-black">Clear care from first visit to follow-up.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
                    <div>
                        <p class="section-label">Why Choose Us</p>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                            What Elysian stands for.
                        </h2>
                    </div>
                    <p class="max-w-md text-cool-gray leading-7 font-medium">
                        The clinic focuses on structured care, practical treatment planning, and reliable follow-up.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-6">
                    <?php foreach ($values as $value): ?>
                        <div class="soft-card p-8 hover:-translate-y-1 hover:shadow-soft transition-all duration-300">
                            <div class="w-14 h-14 bg-primary-soft rounded-2xl flex items-center justify-center mb-6 text-primary">
                                <?= $icon($value['icon'], 'h-7 w-7'); ?>
                            </div>
                            <h3 class="text-xl font-black text-slate-heading mb-3">
                                <?= $esc($value['title']); ?>
                            </h3>
                            <p class="text-sm text-cool-gray leading-6">
                                <?= $esc($value['description']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Process Navy -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="rounded-[2.5rem] bg-clinic-navy text-white overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-[0.92fr_1.08fr] gap-0 items-stretch">
                        <div class="p-8 lg:p-12">
                            <p class="text-xs font-black uppercase tracking-[0.34em] text-primary">Care Process</p>
                            <h2 class="mt-4 text-4xl lg:text-5xl font-black leading-tight tracking-[-0.04em]">
                                Simple steps, clearer treatment journey.
                            </h2>
                            <p class="mt-5 text-white/70 leading-8 text-base">
                                Elysian connects consultation, appointment booking, treatment planning, and progress updates into one consistent workflow.
                            </p>
                            <a href="booking.php" class="mt-8 inline-flex items-center justify-center rounded-full bg-white px-7 py-4 font-black text-clinic-navy hover:text-primary transition-colors">
                                Start Booking
                            </a>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 p-6 lg:p-8 bg-white/5">
                            <?php foreach ($steps as $step): ?>
                                <div class="rounded-[1.75rem] bg-white/10 border border-white/10 p-6">
                                    <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center text-primary font-black">
                                        <?= $esc($step['number']); ?>
                                    </div>
                                    <p class="mt-5 text-lg font-black"><?= $esc($step['title']); ?></p>
                                    <p class="mt-2 text-sm leading-6 text-white/65"><?= $esc($step['description']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="mb-10 text-center max-w-3xl mx-auto">
                    <p class="section-label">Inside Our Clinic</p>
                    <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                        Calm, private, and organized.
                    </h2>
                    <p class="mt-4 text-cool-gray leading-7">
                        A soft clinical environment designed for consultation, treatment, and follow-up care.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <img class="w-full h-56 object-cover rounded-[1.75rem] shadow-sm" src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=700&q=85" alt="Clinic reception"/>
                    <img class="w-full h-56 object-cover rounded-[1.75rem] shadow-sm" src="https://images.unsplash.com/photo-1666214277654-73a8f5fca7f9?w=700&q=85" alt="Consultation room"/>
                    <img class="w-full h-56 object-cover rounded-[1.75rem] shadow-sm" src="https://images.unsplash.com/photo-1631815589968-fdb09a223b1e?w=700&q=85" alt="Treatment equipment"/>
                    <img class="w-full h-56 object-cover rounded-[1.75rem] shadow-sm" src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?w=700&q=85" alt="Clinic corridor"/>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-sky-50 via-white to-primary-soft border border-sky-100 p-8 lg:p-12 shadow-soft">
                    <div class="absolute -right-20 -top-20 w-72 h-72 bg-primary/20 rounded-full blur-3xl"></div>

                    <div class="relative grid lg:grid-cols-[1fr_auto] gap-8 items-center">
                        <div>
                            <p class="section-label">Ready to begin?</p>
                            <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em] max-w-3xl">
                                Start a more organized skincare journey with Elysian.
                            </h2>
                            <p class="mt-4 text-cool-gray leading-7 max-w-2xl">
                                Book your appointment and let the clinic team guide each step through a clear treatment pathway.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
                            <a href="booking.php" class="inline-flex items-center justify-center rounded-full bg-primary text-white px-8 py-4 font-black hover:shadow-glow transition-all">
                                Book Appointment
                            </a>
                            <a href="dichvu.php" class="inline-flex items-center justify-center rounded-full border-2 border-slate-200 bg-white text-slate-heading px-8 py-4 font-black hover:border-primary hover:text-primary transition-colors">
                                View Services
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer giống home -->
    <footer class="bg-clinic-navy text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <?php include __DIR__ . '/../shared/logo_svg.php'; ?>
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
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');

            if (!menu) {
                return;
            }

            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
                document.body.classList.add('overflow-hidden');
            } else {
                menu.style.display = 'none';
                document.body.classList.remove('overflow-hidden');
            }
        }
    </script>
</body>
</html>