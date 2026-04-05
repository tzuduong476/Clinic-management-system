<?php
require_once '../backend/db.php';
if (isLoggedIn()) {
    redirect('home.php');
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Create Elysian Account</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
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
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen flex flex-col font-display">
<!-- Header / Navigation -->
<header class="sticky top-0 z-50 w-full border-b border-primary/10 bg-white/80 backdrop-blur-md">
<div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                <span class="material-symbols-outlined text-primary text-2xl">spa</span>
            </div>
            <span class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white">Elysian <span class="text-primary">Skin Clinic</span></span>
        </div>
<nav class="hidden md:flex items-center gap-10">
<a class="text-sm font-semibold hover:text-primary transition-colors" href="home.php">Home</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="dichvu.php">Service List</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">About US</a>
<a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Contact</a>
</nav>
<div class="flex items-center gap-4">
<a href="signin.php" class="px-6 py-2.5 text-sm font-bold text-slate-900 hover:bg-primary/10 transition-all rounded-full">Sign In</a>
<a href="signup.php" class="px-6 py-2.5 text-sm font-bold bg-primary text-white hover:shadow-lg hover:shadow-primary/30 transition-all rounded-full">Sign Up</a>
</div>
</div>
</header>
<div class="flex min-h-screen w-full flex-col lg:flex-row overflow-hidden">
        <!-- Left Side: Signup Form Section -->
        <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-16 bg-white dark:bg-background-dark">
            <div class="mx-auto w-full max-w-sm lg:max-w-md">
                <!-- Logo & Header -->
                <div class="flex flex-col items-center lg:items-start mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="size-8 text-primary">
                            <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-slate-100 uppercase">Elysian</h2>
                    </div>
                    <h1 class="text-2xl font-black text-slate-900 dark:text-slate-100 tracking-tight">Create your account</h1>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Start your journey with us</p>
                    <p id="signup-status" class="mt-4 text-sm font-medium text-slate-500 dark:text-slate-400 min-h-[1.25rem] transition-colors"></p>
                </div>
                <!-- Sign Up Form -->
                <form id="signup-form" class="space-y-4" method="POST">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide" for="full_name">Full Name</label>
                        <div class="relative group">
                            <input id="full_name" name="full_name" class="block w-full rounded-lg border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 py-2.5 px-4 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200 outline-none" placeholder="Enter your full name" required="" type="text"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide" for="email">Email</label>
                        <div class="relative group">
                            <input autocomplete="email" class="block w-full rounded-lg border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 py-2.5 px-4 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200 outline-none" id="email" name="email" placeholder="name@example.com" required="" type="email"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide" for="phone">Phone Number</label>
                        <div class="relative group">
                            <input class="block w-full rounded-lg border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 py-2.5 px-4 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200 outline-none" id="phone" name="phone" placeholder="Enter your phone number" required="" type="tel"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide" for="password">Password</label>
                        <div class="relative group">
                            <input autocomplete="new-password" class="block w-full rounded-lg border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 py-2.5 px-4 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200 outline-none" id="password" name="password" placeholder="Create a password" required="" type="password"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide" for="confirm_password">Confirm Password</label>
                        <div class="relative group">
                            <input autocomplete="new-password" class="block w-full rounded-lg border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 py-2.5 px-4 text-sm text-slate-900 dark:text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200 outline-none" id="confirm_password" name="confirm_password" placeholder="Re-enter password" required="" type="password"/>
                        </div>
                    </div>
                    <div class="flex items-start gap-2 pt-1">
                        <input class="mt-0.5 h-4 w-4 rounded border-slate-200 text-primary focus:ring-primary" id="terms" name="terms" required="" type="checkbox"/>
                        <label for="terms" class="text-xs text-slate-500 dark:text-slate-400">I agree to the <a class="text-primary font-bold hover:underline" href="#">Terms</a> and <a class="text-primary font-bold hover:underline" href="#">Privacy Policy</a></label>
                    </div>
                    <div class="pt-2">
                        <button class="rounded-lg bg-primary px-6 py-2.5 text-sm font-semibold leading-6 text-white hover:bg-primary/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all duration-200" type="submit">
                            Sign Up
                        </button>
                    </div>
                </form>
                <!-- Footer -->
                <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
                    Already have an account? <a class="font-bold leading-6 text-primary hover:underline ml-1" href="signin.php">Sign In</a>
                </p>
            </div>
        </div>
        <!-- Right Side: Editorial Image Section -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-slate-200">
        <div class="absolute inset-0 bg-cover bg-center" data-alt="Premium clinical skincare bottles on white marble with morning sunlight"
             style="background-image: url('assets/auth-cover.png');">
            </div>
            <!-- Aesthetic Overlay -->
            <div class="absolute inset-0 bg-primary/5 backdrop-blur-[2px]"></div>
            <div class="absolute bottom-12 left-12 max-w-md text-white">
                <h2 class="text-4xl font-bold tracking-tight mb-4 drop-shadow-md">Elevated Skincare Science</h2>
                <p class="text-lg font-medium opacity-90 drop-shadow-sm">Personalized treatments designed for your unique skin journey.</p>
            </div>
        </div>
    </div>
    <script>
        (function () {
            const form = document.getElementById('signup-form');
            const statusEl = document.getElementById('signup-status');
            if (!form || !statusEl) return;

            const setStatus = (message, isSuccess) => {
                statusEl.textContent = message;
                statusEl.classList.remove('text-primary', 'text-red-500');
                statusEl.classList.add(isSuccess ? 'text-primary' : 'text-red-500');
            };

            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                setStatus('Processing your registration...', true);

                try {
                    const formData = new FormData(form);
                    formData.append('action', 'register');
                    
                    const response = await fetch('../backend/auth.php', {
                        method: 'POST',
                        body: formData,
                    });
                    const text = await response.text();
                    console.log('Response:', text);
                    const data = JSON.parse(text);

                    setStatus(data.message, data.success);

                    if (data.success) {
                        setTimeout(() => {
                            window.location.href = 'signin.php';
                        }, 900);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    setStatus('Registration service unavailable. Please try again later.', false);
                }
            });
        })();
    </script>
</header>
</body>
</html>
