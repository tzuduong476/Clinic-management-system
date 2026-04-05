<?php
require_once '../backend/db.php';

$currentUser = getCurrentUser();
if (!$currentUser) {
    header('Location: signin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>My Profile | Elysian Skin Clinic</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0db9f2",
                        "background-light": "#FFFFFF",
                        "background-dark": "#FFFFFF",
                        "slate-heading": "#33475B",
                        "cool-gray": "#64748B",
                    },
                    fontFamily: { "display": ["Manrope"] },
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        body { font-family: 'Manrope', sans-serif; background-color: #FFFFFF; }
        .material-symbols-outlined { font-family: 'Material Symbols Outlined'; font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-display">
    <header class="sticky top-0 z-[100] bg-white/95 backdrop-blur-md border-b border-slate-100">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between" style="position: relative; z-index: 100;">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                </div>
                <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
            </div>
            <div class="hidden lg:flex items-center gap-10">
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="home.php">Home</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="dichvu.php">Service List</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="about.php">About Us</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="contact.php">Contact</a>
            </div>
            <button id="mobile-menu-btn" class="lg:hidden p-2 text-slate-heading" onclick="toggleMobileMenu()">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden fixed inset-0 bg-white z-50" style="display: none;">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                            </div>
                            <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
                        </div>
                        <button onclick="toggleMobileMenu()" class="p-2">
                            <span class="material-symbols-outlined text-3xl">close</span>
                        </button>
                    </div>
                    <div class="flex flex-col gap-6">
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="home.php" onclick="toggleMobileMenu()">Home</a>
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="dichvu.php" onclick="toggleMobileMenu()">Service List</a>
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="about.php" onclick="toggleMobileMenu()">About Us</a>
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="contact.php" onclick="toggleMobileMenu()">Contact</a>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-sm font-bold text-slate-heading"><?= htmlspecialchars($currentUser['full_name']); ?></span>
                <a class="text-sm font-bold text-primary hover:text-primary/80 transition-colors" href="profile.php">Profile</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="../backend/logout.php">Sign Out</a>
            </div>
        </nav>
    </header>

    <main class="py-12">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Sidebar - User Info -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm sticky top-24">
                        <div class="text-center mb-6">
                            <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="material-symbols-outlined text-primary text-5xl">person</span>
                            </div>
                            <h2 class="text-xl font-bold text-slate-heading" id="user-name">Loading...</h2>
                            <p class="text-sm text-cool-gray" id="user-email">Loading...</p>
                        </div>
                        <div class="space-y-4 pt-6 border-t border-slate-100">
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-primary">phone</span>
                                <span id="user-phone" class="text-slate-600">-</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-primary">face</span>
                                <span class="text-slate-600">Skin Type: <span id="user-skin-type" class="font-medium">-</span></span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="material-symbols-outlined text-primary">event</span>
                                <span class="text-slate-600">Member since: <span id="user-created" class="font-medium">-</span></span>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-slate-100">
                            <a href="home.php" class="flex items-center justify-center gap-2 w-full py-3 bg-slate-100 text-slate-heading rounded-xl font-medium hover:bg-primary hover:text-white transition-colors">
                                <span class="material-symbols-outlined">home</span>
                                Back to Home
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content - Appointments -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-slate-heading">My Appointments</h3>
                            <span class="text-sm text-cool-gray" id="appointment-count">0 appointments</span>
                        </div>

                        <div id="appointments-list" class="space-y-4">
                            <div class="text-center py-12 text-cool-gray">
                                <span class="material-symbols-outlined text-5xl mb-3">event_busy</span>
                                <p>Loading appointments...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-gradient-to-r from-primary to-cyan-400 rounded-2xl p-8 text-white">
                        <div class="flex items-start justify-between">
                            <div>
                                <h4 class="text-xl font-bold mb-2">Ready for your next visit?</h4>
                                <p class="text-white/80 mb-4">Book a new appointment with our specialists</p>
                            </div>
                            <span class="material-symbols-outlined text-6xl opacity-20">calendar_month</span>
                        </div>
                        <a href="dichvu.php" class="inline-flex items-center gap-2 bg-white text-primary px-6 py-3 rounded-full font-bold hover:shadow-lg transition-all">
                            Book Now <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-8 mt-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
                <p>© 2024 Elysian Skin Clinic. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }
            document.body.classList.toggle('overflow-hidden');
        }

        // Load user data
        async function loadUserData() {
            try {
                const response = await fetch('../backend/get_user.php');
                const data = await response.json();
                if (data.success && data.user) {
                    document.getElementById('user-name').textContent = data.user.Name || 'User';
                    document.getElementById('user-email').textContent = data.user.Email || '-';
                    document.getElementById('user-phone').textContent = data.user.Phone || '-';
                    document.getElementById('user-skin-type').textContent = data.user.Skin_type || 'Not set';
                    if (data.user.Created_at) {
                        const date = new Date(data.user.Created_at);
                        document.getElementById('user-created').textContent = date.toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
                    }
                }
            } catch (error) {
                console.error('Failed to load user data:', error);
            }
        }

        // Load appointments
        async function loadAppointments() {
            try {
                const response = await fetch('../backend/get_appointments.php');
                const data = await response.json();
                const container = document.getElementById('appointments-list');
                const countEl = document.getElementById('appointment-count');

                if (data.success && data.appointments && data.appointments.length > 0) {
                    countEl.textContent = `${data.appointments.length} appointment${data.appointments.length !== 1 ? 's' : ''}`;
                    
                    container.innerHTML = data.appointments.map(apt => {
                        const date = new Date(apt.appointment_date);
                        const time = apt.appointment_time ? apt.appointment_time.substring(0, 5) : '';
                        const formattedDate = date.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' });
                        
                        const statusColors = {
                            'confirmed': 'bg-green-100 text-green-700',
                            'pending': 'bg-yellow-100 text-yellow-700',
                            'cancelled': 'bg-red-100 text-red-700'
                        };
                        const statusClass = statusColors[apt.status] || 'bg-slate-100 text-slate-700';

                        return `
                            <div class="bg-slate-50 rounded-xl p-5 border border-slate-100 hover:border-primary/30 transition-colors">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="text-xs font-bold px-2 py-1 rounded-full uppercase ${statusClass}">${apt.status}</span>
                                            <span class="text-xs text-cool-gray">${apt.booking_code}</span>
                                        </div>
                                        <h4 class="font-bold text-slate-heading text-lg mb-1">${apt.service_name}</h4>
                                        <p class="text-sm text-cool-gray mb-2">
                                            <span class="material-symbols-outlined text-base align-middle">person</span>
                                            ${apt.specialist_name}
                                        </p>
                                        <div class="flex flex-wrap items-center gap-4 text-sm text-slate-600">
                                            <span class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-base">calendar_today</span>
                                                ${formattedDate}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-base">schedule</span>
                                                ${time}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-primary">${apt.total_price}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('');
                } else {
                    countEl.textContent = '0 appointments';
                    container.innerHTML = `
                        <div class="text-center py-12 text-cool-gray">
                            <span class="material-symbols-outlined text-5xl mb-3">event_busy</span>
                            <p class="font-medium mb-1">No appointments yet</p>
                            <p class="text-sm mb-4">Book your first appointment to get started</p>
                            <a href="dichvu.php" class="inline-flex items-center gap-2 text-primary font-bold hover:underline">
                                Browse Services <span class="material-symbols-outlined">arrow_forward</span>
                            </a>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Failed to load appointments:', error);
                document.getElementById('appointments-list').innerHTML = `
                    <div class="text-center py-12 text-red-500">
                        <span class="material-symbols-outlined text-5xl mb-3">error</span>
                        <p>Failed to load appointments. Please try again.</p>
                    </div>
                `;
            }
        }

        // Initialize
        loadUserData();
        loadAppointments();
    </script>
</body>
</html>
