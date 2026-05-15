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
        'drop' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3s6 6.2 6 11a6 6 0 0 1-12 0c0-4.8 6-11 6-11Z" fill="currentColor"/></svg>',
        'sparkle' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2l1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2Z" fill="currentColor"/><path d="M18.5 15l.8 3.2 3.2.8-3.2.8-.8 3.2-.8-3.2-3.2-.8 3.2-.8.8-3.2Z" fill="currentColor"/></svg>',
        'science' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 3h6M10 3v5.5L5.8 17a3 3 0 0 0 2.7 4.3h7a3 3 0 0 0 2.7-4.3L14 8.5V3" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 16h8" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'face' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21a8 8 0 0 0 8-8V8.6A5.6 5.6 0 0 0 14.4 3H9.6A5.6 5.6 0 0 0 4 8.6V13a8 8 0 0 0 8 8Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/><path d="M8.5 11h.01M15.5 11h.01M9 16c1.8 1.2 4.2 1.2 6 0" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>',
        'bubble' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="8" cy="14" r="3.5" stroke="currentColor" stroke-width="2.1"/><circle cx="15.5" cy="8.5" r="4" stroke="currentColor" stroke-width="2.1"/><circle cx="17" cy="17" r="2.5" fill="currentColor"/></svg>',
        'light' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18h6M10 22h4M8 14.5A6 6 0 1 1 16 14.5c-.8.7-1.2 1.5-1.3 2.5H9.3c-.1-1-.5-1.8-1.3-2.5Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'calendar' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3M17 3v3M4 9h16M6 5h12a2 2 0 0 1 2 2v11a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'mail' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'location' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-5.6 7-12a7 7 0 1 0-14 0c0 6.4 7 12 7 12Z" stroke="currentColor" stroke-width="2.1"/><circle cx="12" cy="9" r="2.4" fill="currentColor"/></svg>',
        'clock' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    ];

    return $icons[$name] ?? '';
};

// Load services and packages from database
$stmt = $conn->query("SELECT * FROM services WHERE status = 'active' ORDER BY is_combo DESC, id ASC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$comboPackages = [];
$services = [];

foreach ($rows as $row) {
    $item = [
        'id' => $row['id'],
        'title' => $row['name'],
        'description' => $row['description'] ?? '',
        'image' => $row['image'],
        'price' => $row['price'],
        'old_price' => $row['original_price'] ?? null,
        'sessions' => $row['sessions'],
        'badge' => ($row['is_combo'] && $row['id'] === 'combo2') ? 'BEST VALUE' : (($row['is_combo'] && $row['id'] === 'combo1') ? 'POPULAR' : ''),
        'items' => $row['benefits'] ? json_decode($row['benefits'], true) : [],
        'featured' => ($row['is_combo'] && $row['id'] === 'combo2'),
        'icon' => $row['category'] === 'Hydration Therapy' ? 'drop' : 
                 ($row['category'] === 'Laser Therapy' ? 'sparkle' : 
                 ($row['category'] === 'Dermatological Precision' ? 'science' : 
                 ($row['category'] === 'Injectable Therapy' ? 'face' : 
                 ($row['category'] === 'Skin Renewal' ? 'bubble' : 'light'))))
    ];

    if ($row['is_combo']) {
        $comboPackages[] = $item;
    } else {
        $services[] = $item;
    }
}
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Services | Elysian Skin Clinic</title>

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
        <!-- Hero Section -->
        <section class="relative overflow-hidden py-16 lg:py-24">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                    <div class="relative order-2 lg:order-1">
                        <div class="absolute -top-8 -left-8 w-48 h-48 bg-primary/10 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-8 -right-8 w-56 h-56 bg-sky-200/30 rounded-full blur-3xl"></div>

                        <div class="relative rounded-[2.25rem] overflow-hidden shadow-soft border border-slate-100 bg-white p-3">
                            <img
                                alt="Skincare service at Elysian Skin Clinic"
                                class="rounded-[1.75rem] w-full h-[520px] object-cover"
                                src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=1000&q=85"
                            />

                            <div class="absolute left-7 bottom-7 rounded-[1.5rem] bg-white/92 backdrop-blur-xl p-5 shadow-xl border border-white/80 max-w-[310px]">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-primary-soft rounded-2xl flex items-center justify-center shrink-0 text-primary">
                                        <?= $icon('drop', 'h-7 w-7'); ?>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-[0.22em] text-primary">Personalized Care</p>
                                        <p class="font-black text-slate-heading leading-snug">Treatment options for each skin goal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 order-1 lg:order-2">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-soft border border-sky-100 rounded-full">
                            <span class="w-2 h-2 bg-primary rounded-full"></span>
                            <span class="text-xs font-black text-slate-heading uppercase tracking-[0.22em]">Our Services</span>
                        </div>

                        <div class="space-y-5">
                            <h1 class="text-5xl lg:text-7xl font-black text-slate-heading leading-[1.04] tracking-[-0.055em]">
                                Skin treatments, <br/>
                                <span class="text-primary">Clearly Guided.</span>
                            </h1>
                            <p class="text-lg text-cool-gray leading-8 max-w-xl font-medium">
                                Precision medical therapies utilizing state-of-the-art clinical technology for targeted skin transformation.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="booking.php" class="inline-flex items-center justify-center gap-2 bg-primary text-white px-8 py-4 rounded-full font-black text-base hover:shadow-glow hover:-translate-y-0.5 transition-all">
                                Book Appointment
                                <?= $icon('arrow', 'h-5 w-5'); ?>
                            </a>
                            <a href="#individual-services" class="inline-flex items-center justify-center border-2 border-slate-200 text-slate-heading bg-white px-8 py-4 rounded-full font-black text-base hover:border-primary hover:text-primary transition-all">
                                View Treatments
                            </a>
                        </div>

                        <div class="grid grid-cols-3 gap-3 max-w-xl pt-4">
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">6</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Treatments</p>
                            </div>
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">3</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Packages</p>
                            </div>
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">1:1</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Consultation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Packages -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
                    <div>
                        <p class="section-label">Special Packages</p>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                            Signature Combos
                        </h2>
                    </div>
                    <p class="max-w-md text-cool-gray leading-7 font-medium">
                        Curated treatment combinations for comprehensive skin transformation and lasting results.
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-6">
                    <?php foreach ($comboPackages as $combo): ?>
                        <article class="<?= $combo['featured'] ? 'border-2 border-primary/30' : 'border border-slate-100'; ?> bg-white rounded-[2rem] overflow-hidden shadow-soft hover:-translate-y-1 transition-all duration-300 group relative">
                            <?php if ($combo['badge'] !== ''): ?>
                                <div class="<?= $combo['featured'] ? 'bg-clinic-navy' : 'bg-primary'; ?> absolute top-5 right-5 z-10 text-white text-xs font-black px-3 py-1.5 rounded-full">
                                    <?= $esc($combo['badge']); ?>
                                </div>
                            <?php endif; ?>

                            <div class="h-72 overflow-hidden relative">
                                <img
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                    src="<?= $esc($combo['image']); ?>"
                                    alt="<?= $esc($combo['title']); ?>"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-clinic-navy/80 via-clinic-navy/20 to-transparent"></div>
                                <div class="absolute bottom-6 left-6 text-white">
                                    <span class="text-xs font-black uppercase tracking-[0.22em] text-white/75">
                                        <?= $esc($combo['sessions']); ?>
                                    </span>
                                    <h3 class="text-2xl font-black mt-1">
                                        <?= $esc($combo['title']); ?>
                                    </h3>
                                </div>
                            </div>

                            <div class="p-7">
                                <div class="mb-5">
                                    <p class="text-3xl font-black text-primary"><?= $esc($combo['price']); ?></p>
                                    <p class="text-sm text-cool-gray line-through font-semibold mt-1"><?= $esc($combo['old_price']); ?></p>
                                </div>

                                <ul class="space-y-3 mb-7">
                                    <?php foreach ($combo['items'] as $item): ?>
                                        <li class="flex items-center gap-3 text-sm font-semibold text-cool-gray">
                                            <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary-soft text-primary">
                                                <?= $icon('check', 'h-3.5 w-3.5'); ?>
                                            </span>
                                            <span><?= $esc($item); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <a href="service-detail.php?id=<?= $esc($combo['id']); ?>" class="<?= $combo['featured'] ? 'bg-gradient-to-r from-primary to-cyan-400' : 'bg-primary'; ?> block w-full rounded-full py-4 text-center font-black text-white transition-all hover:shadow-glow">
                                    Book Package
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Individual Services -->
        <section id="individual-services" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
                    <div>
                        <p class="section-label">Individual Services</p>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                            Choose by skin concern.
                        </h2>
                    </div>
                    <p class="max-w-md text-cool-gray leading-7 font-medium">
                        Each treatment can be booked individually or added into a personalized treatment course.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($services as $service): ?>
                        <a href="service-detail.php?id=<?= $esc($service['id']); ?>" class="bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-soft hover:-translate-y-1 transition-all duration-300 group block">
                            <div class="h-64 overflow-hidden relative">
                                <img
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                    src="<?= $esc($service['image']); ?>"
                                    alt="<?= $esc($service['title']); ?>"
                                />
                            </div>

                            <div class="p-7">
                                <div class="w-14 h-14 bg-primary-soft rounded-2xl flex items-center justify-center mb-5 text-primary">
                                    <?= $icon($service['icon'], 'h-7 w-7'); ?>
                                </div>

                                <h3 class="font-black text-xl text-slate-heading mb-3">
                                    <?= $esc($service['title']); ?>
                                </h3>
                                <p class="text-sm text-cool-gray mb-6 leading-6 min-h-[72px]">
                                    <?= $esc($service['description']); ?>
                                </p>

                                <span class="inline-flex items-center gap-2 text-primary text-sm font-black">
                                    View Details
                                    <?= $icon('arrow', 'h-4 w-4'); ?>
                                </span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Treatment Guidance -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="rounded-[2.5rem] bg-clinic-navy text-white overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-[0.92fr_1.08fr] gap-0 items-stretch">
                        <div class="p-8 lg:p-12">
                            <p class="text-xs font-black uppercase tracking-[0.34em] text-primary">Treatment Guidance</p>
                            <h2 class="mt-4 text-4xl lg:text-5xl font-black leading-tight tracking-[-0.04em]">
                                Not sure what to choose?
                            </h2>
                            <p class="mt-5 text-white/70 leading-8 text-base">
                                Start with a consultation. The clinic team can review your concern and suggest a suitable service or treatment course.
                            </p>
                            <a href="booking.php" class="mt-8 inline-flex items-center justify-center rounded-full bg-white px-7 py-4 font-black text-clinic-navy hover:text-primary transition-colors">
                                Book Consultation
                            </a>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 p-6 lg:p-8 bg-white/5">
                            <div class="rounded-[1.75rem] bg-white/10 border border-white/10 p-6">
                                <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center text-primary">
                                    <?= $icon('drop', 'h-6 w-6'); ?>
                                </div>
                                <p class="mt-5 text-lg font-black">01. Assess</p>
                                <p class="mt-2 text-sm leading-6 text-white/65">Review skin concern and history.</p>
                            </div>

                            <div class="rounded-[1.75rem] bg-white/10 border border-white/10 p-6">
                                <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center text-primary">
                                    <?= $icon('calendar', 'h-6 w-6'); ?>
                                </div>
                                <p class="mt-5 text-lg font-black">02. Book</p>
                                <p class="mt-2 text-sm leading-6 text-white/65">Choose service and schedule time.</p>
                            </div>

                            <div class="rounded-[1.75rem] bg-white/10 border border-white/10 p-6">
                                <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center text-primary">
                                    <?= $icon('check', 'h-6 w-6'); ?>
                                </div>
                                <p class="mt-5 text-lg font-black">03. Track</p>
                                <p class="mt-2 text-sm leading-6 text-white/65">Follow treatment progress clearly.</p>
                            </div>
                        </div>
                    </div>
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
                                Start your skincare journey with a clear treatment plan.
                            </h2>
                            <p class="mt-4 text-cool-gray leading-7 max-w-2xl">
                                Book your appointment and let Elysian guide the next step based on your skin goal.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
                            <a href="booking.php" class="inline-flex items-center justify-center rounded-full bg-primary text-white px-8 py-4 font-black hover:shadow-glow transition-all">
                                Book Appointment
                            </a>
                            <a href="contact.php" class="inline-flex items-center justify-center rounded-full border-2 border-slate-200 bg-white text-slate-heading px-8 py-4 font-black hover:border-primary hover:text-primary transition-colors">
                                Contact Clinic
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