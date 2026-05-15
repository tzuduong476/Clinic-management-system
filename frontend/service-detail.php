<?php
require_once '../backend/db.php';

$currentUser = getCurrentUser();

$esc = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$icon = static function (string $name, string $class = 'h-5 w-5'): string {
    $icons = [
        'arrow' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'chevron' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m9 18 6-6-6-6" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'check' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6 9 17l-5-5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'clock' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'notes' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2.1"/><path d="M8.5 8h7M8.5 12h7M8.5 16h4" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'sparkle' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2l1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2Z" fill="currentColor"/><path d="M18.5 15l.8 3.2 3.2.8-3.2.8-.8 3.2-.8-3.2-3.2-.8 3.2-.8.8-3.2Z" fill="currentColor"/></svg>',
        'info' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 10.5V17M12 7h.01" stroke="currentColor" stroke-width="2.8" stroke-linecap="round"/></svg>',
        'calendar' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3M17 3v3M4 9h16M6 5h12a2 2 0 0 1 2 2v11a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'mail' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'location' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-5.6 7-12a7 7 0 1 0-14 0c0 6.4 7 12 7 12Z" stroke="currentColor" stroke-width="2.1"/><circle cx="12" cy="9" r="2.4" fill="currentColor"/></svg>',
    ];

    return $icons[$name] ?? '';
};

$decodeList = static function ($value): array {
    if (!$value) {
        return [];
    }

    $decoded = json_decode((string)$value, true);

    if (!is_array($decoded)) {
        return [];
    }

    return array_values(array_filter($decoded, static function ($item): bool {
        return trim((string)$item) !== '';
    }));
};

$services = [];

try {
    $stmt = $conn->query("SELECT * FROM services ORDER BY is_combo DESC, id ASC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        $serviceId = (string)($row['id'] ?? '');

        if ($serviceId === '') {
            continue;
        }

        $services[$serviceId] = [
            'id' => $serviceId,
            'name' => $row['name'] ?? 'Untitled Service',
            'tagline' => $row['tagline'] ?? '',
            'category' => $row['category'] ?? 'Treatment',
            'image' => $row['image'] ?? 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=1200&q=85',
            'duration' => $row['duration'] ?? 'Consultation',
            'sessions' => $row['sessions'] ?? 'Personalized',
            'price' => $row['price'] ?? 'Contact clinic',
            'original_price' => $row['original_price'] ?? null,
            'description' => $row['description'] ?? '',
            'benefits' => $decodeList($row['benefits'] ?? null),
            'preparation' => $decodeList($row['preparation'] ?? null),
            'is_combo' => (bool)($row['is_combo'] ?? false),
        ];
    }
} catch (Throwable $exception) {
    $services = [];
}

$serviceId = isset($_GET['id']) ? (string)$_GET['id'] : '1';
$service = $services[$serviceId] ?? reset($services);

if (!$service) {
    $service = [
        'id' => '1',
        'name' => 'Elysian Treatment',
        'tagline' => 'Personalized skincare treatment guided by consultation.',
        'category' => 'Treatment',
        'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=1200&q=85',
        'duration' => 'Consultation',
        'sessions' => 'Personalized',
        'price' => 'Contact clinic',
        'original_price' => null,
        'description' => 'This service is currently being updated. Please contact Elysian Skin Clinic for consultation and treatment guidance.',
        'benefits' => [
            'Personalized consultation',
            'Clear treatment planning',
            'Session-by-session follow-up',
            'Aftercare guidance',
        ],
        'preparation' => [
            'Arrive 10 minutes before your appointment.',
            'Share your skin history and current products with the specialist.',
            'Avoid strong exfoliation before consultation.',
        ],
        'is_combo' => false,
    ];
}

if (empty($service['benefits'])) {
    $service['benefits'] = [
        'Personalized treatment recommendation',
        'Clear session planning',
        'Progress-focused skincare support',
        'Professional aftercare guidance',
    ];
}

if (empty($service['preparation'])) {
    $service['preparation'] = [
        'Arrive 10 minutes before your appointment.',
        'Inform the specialist about allergies or recent treatments.',
        'Avoid strong exfoliation before your visit.',
    ];
}

$originalPrice = trim((string)($service['original_price'] ?? ''));
$bookingUrl = 'booking.php?id=' . urlencode((string)$service['id']);
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= $esc($service['name']); ?> | Elysian Skin Clinic</title>

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
    <?php include __DIR__ . '/public_navbar.php'; ?>

    <main>
        <!-- Hero -->
        <section class="relative overflow-hidden py-10 lg:py-16">
            <div class="container mx-auto px-6">
                <!-- Breadcrumb -->
                <nav class="mb-8 flex flex-wrap items-center gap-2 text-sm font-bold text-cool-gray">
                    <a href="home.php" class="hover:text-primary transition-colors">Home</a>
                    <span class="text-primary"><?= $icon('chevron', 'h-4 w-4'); ?></span>
                    <a href="dichvu.php" class="hover:text-primary transition-colors">Services</a>
                    <span class="text-primary"><?= $icon('chevron', 'h-4 w-4'); ?></span>
                    <span class="text-slate-heading"><?= $esc($service['name']); ?></span>
                </nav>

                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                    <div class="relative order-2 lg:order-1">
                        <div class="absolute -top-8 -left-8 w-48 h-48 bg-primary/10 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-8 -right-8 w-56 h-56 bg-sky-200/30 rounded-full blur-3xl"></div>

                        <div class="relative rounded-[2.25rem] overflow-hidden shadow-soft border border-slate-100 bg-white p-3">
                            <img
                                alt="<?= $esc($service['name']); ?>"
                                class="rounded-[1.75rem] w-full h-[520px] object-cover"
                                src="<?= $esc($service['image']); ?>"
                            />

                            <div class="absolute inset-x-3 bottom-3 h-56 rounded-b-[1.75rem] bg-gradient-to-t from-clinic-navy/80 via-clinic-navy/20 to-transparent"></div>

                            <div class="absolute left-7 bottom-7 rounded-[1.5rem] bg-white/92 backdrop-blur-xl p-5 shadow-xl border border-white/80 max-w-[330px]">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-primary-soft rounded-2xl flex items-center justify-center shrink-0 text-primary">
                                        <?= $icon($service['is_combo'] ? 'sparkle' : 'notes', 'h-7 w-7'); ?>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-[0.22em] text-primary">
                                            <?= $service['is_combo'] ? 'Signature Combo' : 'Clinical Treatment'; ?>
                                        </p>
                                        <p class="font-black text-slate-heading leading-snug">
                                            Personalized plan with guided follow-up
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 order-1 lg:order-2">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-soft border border-sky-100 rounded-full">
                            <span class="w-2 h-2 bg-primary rounded-full"></span>
                            <span class="text-xs font-black text-slate-heading uppercase tracking-[0.22em]">
                                <?= $esc($service['category']); ?>
                            </span>
                        </div>

                        <div class="space-y-5">
                            <h1 class="text-5xl lg:text-7xl font-black text-slate-heading leading-[1.04] tracking-[-0.055em]">
                                <?= $esc($service['name']); ?>
                            </h1>

                            <?php if (trim((string)$service['tagline']) !== ''): ?>
                                <p class="text-lg lg:text-xl text-cool-gray leading-8 max-w-xl font-medium">
                                    <?= $esc($service['tagline']); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="grid grid-cols-3 gap-3 max-w-xl">
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <div class="mb-3 text-primary"><?= $icon('clock', 'h-6 w-6'); ?></div>
                                <p class="text-xs font-bold text-cool-gray">Duration</p>
                                <p class="mt-1 text-sm font-black text-slate-heading"><?= $esc($service['duration']); ?></p>
                            </div>

                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <div class="mb-3 text-primary"><?= $icon('notes', 'h-6 w-6'); ?></div>
                                <p class="text-xs font-bold text-cool-gray">Sessions</p>
                                <p class="mt-1 text-sm font-black text-slate-heading"><?= $esc($service['sessions']); ?></p>
                            </div>

                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <div class="mb-3 text-primary"><?= $icon('sparkle', 'h-6 w-6'); ?></div>
                                <p class="text-xs font-bold text-cool-gray">Care</p>
                                <p class="mt-1 text-sm font-black text-slate-heading">Personalized</p>
                            </div>
                        </div>

                        <div class="rounded-[2rem] border border-slate-100 bg-white p-6 shadow-soft max-w-xl">
                            <p class="text-sm font-bold text-cool-gray">Treatment Cost</p>
                            <div class="mt-2 flex flex-wrap items-end gap-3">
                                <p class="text-3xl lg:text-4xl font-black text-primary"><?= $esc($service['price']); ?></p>

                                <?php if ($originalPrice !== ''): ?>
                                    <p class="text-lg font-bold text-cool-gray line-through"><?= $esc($originalPrice); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="mt-6 flex flex-col sm:flex-row gap-3">
                                <a href="<?= $esc($bookingUrl); ?>" class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-8 py-4 font-black text-white transition-all hover:-translate-y-0.5 hover:shadow-glow">
                                    Book This Treatment
                                    <?= $icon('arrow', 'h-5 w-5'); ?>
                                </a>

                                <a href="contact.php" class="inline-flex items-center justify-center rounded-full border-2 border-slate-200 bg-white px-8 py-4 font-black text-slate-heading transition-all hover:border-primary hover:text-primary">
                                    Ask Specialist
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Overview -->
        <section class="py-16 lg:py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-[1.05fr_0.95fr] gap-8 lg:gap-10 items-start">
                    <div class="rounded-[2.5rem] bg-white border border-slate-100 p-8 lg:p-10 shadow-soft">
                        <p class="section-label">Treatment Overview</p>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                            What this treatment supports.
                        </h2>

                        <p class="mt-6 text-lg text-cool-gray leading-8">
                            <?= $esc($service['description']); ?>
                        </p>

                        <div class="mt-9 grid md:grid-cols-2 gap-4">
                            <?php foreach ($service['benefits'] as $benefit): ?>
                                <div class="flex items-start gap-3 rounded-3xl bg-slate-50 p-5">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary-soft text-primary">
                                        <?= $icon('check', 'h-4.5 w-4.5'); ?>
                                    </span>
                                    <p class="text-sm font-extrabold leading-6 text-slate-heading">
                                        <?= $esc($benefit); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <aside class="rounded-[2.5rem] bg-clinic-navy text-white p-8 lg:p-10 shadow-soft sticky top-28">
                        <div class="flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/20 text-primary">
                                <?= $icon('info', 'h-7 w-7'); ?>
                            </div>
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.24em] text-white/50">Before Visit</p>
                                <h3 class="text-2xl font-black">Preparation</h3>
                            </div>
                        </div>

                        <ul class="mt-8 space-y-4">
                            <?php foreach ($service['preparation'] as $prep): ?>
                                <li class="flex items-start gap-3 rounded-2xl bg-white/10 p-4">
                                    <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/20 text-primary">
                                        <?= $icon('check', 'h-3.5 w-3.5'); ?>
                                    </span>
                                    <span class="text-sm font-semibold leading-6 text-white/72">
                                        <?= $esc($prep); ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="mt-8 border-t border-white/10 pt-6">
                            <p class="text-xs font-black uppercase tracking-[0.24em] text-white/40">Questions?</p>
                            <a href="contact.php" class="mt-2 inline-flex items-center gap-2 font-black text-primary">
                                Consult with our specialist
                                <?= $icon('arrow', 'h-4 w-4'); ?>
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Journey -->
        <section class="py-16 lg:py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="mx-auto mb-12 max-w-3xl text-center">
                    <p class="section-label">Treatment Journey</p>
                    <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                        A clear process from consultation to review.
                    </h2>
                    <p class="mt-4 text-cool-gray leading-7">
                        Each treatment follows a structured journey so the clinic can track progress and guide the next step clearly.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                    <div class="soft-card p-7">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary text-lg font-black text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)]">
                            1
                        </div>
                        <h3 class="mt-6 text-xl font-black text-slate-heading">Consultation</h3>
                        <p class="mt-2 text-sm leading-6 text-cool-gray">
                            Review skin concern, history, and treatment expectation.
                        </p>
                    </div>

                    <div class="soft-card p-7">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary text-lg font-black text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)]">
                            2
                        </div>
                        <h3 class="mt-6 text-xl font-black text-slate-heading">Treatment</h3>
                        <p class="mt-2 text-sm leading-6 text-cool-gray">
                            Perform the selected service with clinical guidance.
                        </p>
                    </div>

                    <div class="soft-card p-7">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary text-lg font-black text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)]">
                            3
                        </div>
                        <h3 class="mt-6 text-xl font-black text-slate-heading">Recovery</h3>
                        <p class="mt-2 text-sm leading-6 text-cool-gray">
                            Follow aftercare instructions and monitor skin response.
                        </p>
                    </div>

                    <div class="soft-card p-7">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary text-lg font-black text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)]">
                            4
                        </div>
                        <h3 class="mt-6 text-xl font-black text-slate-heading">Review</h3>
                        <p class="mt-2 text-sm leading-6 text-cool-gray">
                            Update progress and plan the next session when needed.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-16 lg:py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-sky-50 via-white to-primary-soft border border-sky-100 p-8 lg:p-12 shadow-soft">
                    <div class="absolute -right-20 -top-20 w-72 h-72 bg-primary/20 rounded-full blur-3xl"></div>

                    <div class="relative grid lg:grid-cols-[1fr_auto] gap-8 items-center">
                        <div>
                            <p class="section-label">Ready to begin?</p>
                            <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em] max-w-3xl">
                                Book this treatment and start with clear guidance.
                            </h2>
                            <p class="mt-4 text-cool-gray leading-7 max-w-2xl">
                                Elysian will help you choose the right treatment path based on your skin goal.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
                            <a href="<?= $esc($bookingUrl); ?>" class="inline-flex items-center justify-center rounded-full bg-primary text-white px-8 py-4 font-black hover:shadow-glow transition-all">
                                Book Treatment
                            </a>
                            <a href="dichvu.php" class="inline-flex items-center justify-center rounded-full border-2 border-slate-200 bg-white text-slate-heading px-8 py-4 font-black hover:border-primary hover:text-primary transition-colors">
                                Back to Services
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
</body>
</html>