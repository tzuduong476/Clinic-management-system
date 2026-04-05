<?php
require_once '../backend/db.php';

// Load services from database
$stmt = $conn->query("SELECT * FROM services ORDER BY is_combo DESC, id ASC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$services = [];
foreach ($rows as $row) {
    $benefits = $row['benefits'] ? json_decode($row['benefits'], true) : null;
        $preparation = $row['preparation'] ? json_decode($row['preparation'], true) : null;
        $services[$row['id']] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'tagline' => $row['tagline'],
        'category' => $row['category'],
        'image' => $row['image'],
        'duration' => $row['duration'],
        'sessions' => $row['sessions'],
        'price' => $row['price'],
        'original_price' => $row['original_price'] ?? null,
        'description' => $row['description'] ?? '',
        'benefits' => is_array($benefits) ? $benefits : [],
        'preparation' => is_array($preparation) ? $preparation : [],
        'is_combo' => (bool)$row['is_combo']
    ];
}

// Get service ID from URL
$service_id = isset($_GET['id']) ? $_GET['id'] : '1';

// Get service data or default to first service
$service = isset($services[$service_id]) ? $services[$service_id] : reset($services);
$currentUser = getCurrentUser();
?>
<!DOCTYPE html>

<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo htmlspecialchars($service['name']); ?> | Elysian Skin Clinic</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0db9f2",
                        "background-light": "#f5f8f8",
                        "background-dark": "#101e22",
                        "slate-custom": "#1e293b",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-custom dark:text-slate-100 antialiased">
    <!-- Header / Navigation -->
    <header class="sticky top-0 z-50 w-full border-b border-primary/10 bg-white/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                </div>
                <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
            </div>
            <nav class="hidden md:flex items-center gap-10">
                <a class="text-sm font-semibold hover:text-primary transition-colors" href="home.php">Home</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors" href="dichvu.php">Service List</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors" href="about.php">About Us</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors" href="contact.php">Contact</a>
            </nav>
            <div class="flex items-center gap-4">
                <?php if ($currentUser): ?>
                    <span class="text-sm font-bold text-slate-custom">Hi, <?= htmlspecialchars($currentUser['full_name']); ?></span>
                    <a href="../backend/logout.php" class="px-6 py-2.5 text-sm font-bold text-slate-custom hover:bg-primary/10 transition-all rounded-full">Sign Out</a>
                <?php else: ?>
                    <a href="signin.php" class="px-6 py-2.5 text-sm font-bold text-slate-custom hover:bg-primary/10 transition-all rounded-full">Sign In</a>
                    <a href="signup.php" class="px-6 py-2.5 text-sm font-bold bg-primary text-white hover:shadow-lg hover:shadow-primary/30 transition-all rounded-full">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-6 py-8">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 mb-10 text-sm font-medium text-slate-custom/50">
            <a class="hover:text-primary transition-colors" href="home.php">Home</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="dichvu.php">Services</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-slate-custom"><?php echo htmlspecialchars($service['name']); ?></span>
        </nav>

        <!-- Hero Split-Layout -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-24">
            <div class="relative group">
                <div class="absolute -inset-4 bg-primary/5 rounded-xl blur-2xl group-hover:bg-primary/10 transition duration-1000"></div>
                <div class="relative overflow-hidden rounded-xl aspect-[4/3] bg-slate-200">
                    <img class="w-full h-full object-cover" alt="<?php echo htmlspecialchars($service['name']); ?>" src="<?php echo htmlspecialchars($service['image']); ?>"/>
                </div>
            </div>

            <div class="flex flex-col gap-8">
                <div>
                    <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-widest mb-4"><?php echo htmlspecialchars($service['category']); ?></span>
                    <h1 class="text-5xl lg:text-6xl font-black text-slate-custom leading-[1.1]"><?php echo htmlspecialchars($service['name']); ?></h1>
                    <p class="text-xl text-cool-gray mt-2"><?php echo htmlspecialchars($service['tagline']); ?></p>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl border border-primary/10 bg-white shadow-sm flex flex-col items-center text-center gap-2">
                        <span class="material-symbols-outlined text-primary">schedule</span>
                        <span class="text-xs font-bold"><?php echo htmlspecialchars($service['duration']); ?></span>
                    </div>
                    <div class="p-4 rounded-xl border border-primary/10 bg-white shadow-sm flex flex-col items-center text-center gap-2">
                        <span class="material-symbols-outlined text-primary">clinical_notes</span>
                        <span class="text-xs font-bold"><?php echo htmlspecialchars($service['sessions']); ?></span>
                    </div>
                    <div class="p-4 rounded-xl border border-primary/10 bg-white shadow-sm flex flex-col items-center text-center gap-2">
                        <span class="material-symbols-outlined text-primary">auto_graph</span>
                        <span class="text-xs font-bold">Personalized</span>
                    </div>
                </div>

                <div class="flex items-center justify-between py-6 border-y border-primary/10">
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-slate-custom/60">Total Treatment Cost</span>
                        <div class="flex items-center gap-3">
                            <span class="text-3xl font-black text-primary"><?php echo htmlspecialchars($service['price']); ?></span>
                            <?php if (isset($service['original_price'])): ?>
                                <span class="text-lg text-cool-gray line-through"><?php echo htmlspecialchars($service['original_price']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <a href="booking.php?id=<?php echo urlencode($service_id); ?>" class="inline-flex px-10 py-4 bg-primary text-white rounded-full font-bold text-lg hover:shadow-xl hover:shadow-primary/40 transition-all hover:-translate-y-1">
                        Book This Treatment
                    </a>
                </div>
            </div>
        </section>

        <!-- Treatment Overview & Key Benefits -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-16 mb-24">
            <div class="lg:col-span-2 space-y-8">
                <h2 class="text-3xl font-bold text-slate-custom">Treatment Overview</h2>
                <div class="prose prose-slate max-w-none">
                    <p class="text-lg leading-relaxed text-slate-custom/70">
                        <?php echo htmlspecialchars($service['description']); ?>
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-8">
                    <?php foreach ($service['benefits'] as $benefit): ?>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary text-xl">check_circle</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-custom"><?php echo htmlspecialchars($benefit); ?></h4>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Pre-Treatment Instructions -->
            <aside class="bg-white rounded-xl p-8 border border-primary/10 shadow-sm h-fit">
                <div class="flex items-center gap-3 mb-6">
                    <span class="material-symbols-outlined text-primary">info</span>
                    <h3 class="text-xl font-bold">Preparation</h3>
                </div>
                <ul class="space-y-4">
                    <?php foreach ($service['preparation'] as $prep): ?>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                        <span class="text-sm font-medium"><?php echo htmlspecialchars($prep); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="mt-8 pt-6 border-t border-slate-100">
                    <p class="text-xs text-slate-custom/40 uppercase font-bold tracking-widest">Questions?</p>
                    <p class="text-sm font-bold text-primary mt-1">Consult with our specialist</p>
                </div>
            </aside>
        </section>

        <!-- Structured Journey Timeline -->
        <section class="mb-24">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-4xl font-black text-slate-custom mb-4">Your Treatment Journey</h2>
                <p class="text-slate-custom/60">A structured clinical process to ensure optimal results and long-term skin health.</p>
            </div>

            <div class="relative">
                <div class="absolute top-1/2 left-0 w-full h-0.5 bg-primary/10 -translate-y-1/2 hidden lg:block"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">
                    <!-- Step 1 -->
                    <div class="bg-white p-8 rounded-xl border border-primary/10 relative shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-black text-xl mb-6 shadow-lg shadow-primary/30 mx-auto">1</div>
                        <h3 class="text-lg font-bold text-center mb-2">Consultation</h3>
                        <p class="text-sm text-center text-slate-custom/60 leading-relaxed">Personalized analysis of skin concerns and medical history with our dermatologist.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="bg-white p-8 rounded-xl border border-primary/10 relative shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-black text-xl mb-6 shadow-lg shadow-primary/30 mx-auto">2</div>
                        <h3 class="text-lg font-bold text-center mb-2">Treatment</h3>
                        <p class="text-sm text-center text-slate-custom/60 leading-relaxed">Professional clinical treatment tailored to your specific skin needs.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="bg-white p-8 rounded-xl border border-primary/10 relative shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-black text-xl mb-6 shadow-lg shadow-primary/30 mx-auto">3</div>
                        <h3 class="text-lg font-bold text-center mb-2">Recovery</h3>
                        <p class="text-sm text-center text-slate-custom/60 leading-relaxed">Post-treatment care with soothing products to accelerate healing.</p>
                    </div>
                    <!-- Step 4 -->
                    <div class="bg-white p-8 rounded-xl border border-primary/10 relative shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-black text-xl mb-6 shadow-lg shadow-primary/30 mx-auto">4</div>
                        <h3 class="text-lg font-bold text-center mb-2">Review</h3>
                        <p class="text-sm text-center text-slate-custom/60 leading-relaxed">Progress review to monitor results and plan future sessions.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-primary/10 py-16">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="bg-primary p-2 rounded-lg">
                        <span class="material-symbols-outlined text-white">spa</span>
                    </div>
                    <h1 class="text-xl font-extrabold tracking-tight text-slate-custom">Elysian Skin Clinic</h1>
                </div>
                <p class="text-slate-custom/50 max-w-sm">
                    Luxury clinical dermatology for those who demand precision and excellence in skin care. Your skin's health is our clinical priority.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-slate-custom mb-6">Clinic Info</h4>
                <ul class="space-y-4 text-sm font-medium text-slate-custom/60">
                    <li><a class="hover:text-primary transition-colors" href="dichvu.php">Service Menu</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Our Doctors</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Locations</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-slate-custom mb-6">Contact</h4>
                <ul class="space-y-4 text-sm font-medium text-slate-custom/60">
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-xs">call</span> +84 (0) 123 456 789</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-xs">mail</span> care@elysian.clinic</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-bold text-slate-custom/40 uppercase tracking-widest">
            <p>© 2024 Elysian Skin Clinic. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
