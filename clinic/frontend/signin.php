<?php
require_once '../backend/db.php';
if (isLoggedIn()) {
    redirect('home.php');
}
?>

<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Elysian Clinic Sign In</title>
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
<div class="bg-primary p-2 rounded-lg">
<span class="material-symbols-outlined text-white">spa</span>
</div>
<h1 class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white">Elysian <span class="text-primary">Skin Clinic</span></h1>
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
<!-- Left Side: Editorial Image Section -->
<div class="hidden lg:flex lg:w-1/2 relative bg-slate-200">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Premium clinical skincare bottles on white marble with morning sunlight" style="background-image: url('assets/auth-cover.png');">
</div>
<!-- Aesthetic Overlay -->
<div class="absolute inset-0 bg-primary/5 backdrop-blur-[2px]"></div>
<div class="absolute bottom-12 left-12 max-w-md text-white">
<h2 class="text-4xl font-bold tracking-tight mb-4 drop-shadow-md">Elevated Skincare Science</h2>
<p class="text-lg font-medium opacity-90 drop-shadow-sm">Personalized treatments designed for your unique skin journey.</p>
</div>
</div>
<!-- Right Side: Login Form Section -->
<div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-24 bg-white dark:bg-background-dark">
<div class="mx-auto w-full max-w-sm lg:max-w-md">
<!-- Logo & Header -->
                <div class="flex flex-col items-center lg:items-start mb-10">
<h1 class="text-3xl font-black text-slate-900 dark:text-slate-100 tracking-tight">Welcome Back to Elysian</h1>
<p class="mt-2 text-slate-500 dark:text-slate-400 font-medium">Please enter your details to access your portal.</p>
<p id="signin-status" class="mt-4 text-sm font-medium text-slate-500 dark:text-slate-400 min-h-[1.25rem] transition-colors"></p>
</div>
<!-- Sign In Form -->
<form id="signin-form" class="space-y-6" method="POST">
<div>
<label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2" for="email">Email or Phone Number</label>
<div class="relative group">
<input autocomplete="email" class="block w-full rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800/50 py-3 px-4 text-slate-900 dark:text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200 outline-none" id="email" name="email" placeholder="name@example.com" required="" type="text"/>
</div>
</div>
<div>
<div class="flex items-center justify-between mb-2">
<label class="block text-sm font-semibold text-slate-700 dark:text-slate-300" for="password">Password</label>
<a class="text-xs font-bold text-primary hover:opacity-80 transition-opacity" href="#">Forgot Password?</a>
</div>
<div class="relative group">
<input autocomplete="current-password" class="block w-full rounded-xl border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800/50 py-3 px-4 text-slate-900 dark:text-white placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-200 outline-none" id="password" name="password" placeholder="••••••••" required="" type="password"/>
<button class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-primary transition-colors" type="button">
<span class="material-symbols-outlined text-[20px]">visibility</span>
</button>
</div>
</div>
<div>
<button class="flex w-full justify-center rounded-full bg-primary px-6 py-4 text-sm font-bold leading-6 text-white shadow-lg shadow-primary/20 hover:bg-primary/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all duration-300 transform active:scale-[0.98]" type="submit">
                            Sign In
                        </button>
</div>
</form>
<!-- Footer -->
<p class="mt-10 text-center text-sm text-slate-500 dark:text-slate-400">
                    Don't have an account?
                    <a class="font-bold leading-6 text-primary hover:underline ml-1" href="signup.php">Sign Up</a>
</p>
<!-- Compliance/Footnote -->
<div class="mt-16 pt-8 border-t border-slate-100 dark:border-slate-800 text-center">
<p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">
                        Clinical Standard • Secure Authentication • Privacy First
                    </p>
</div>
<script>
    (function () {
        const form = document.getElementById('signin-form');
        const statusEl = document.getElementById('signin-status');
        if (!form || !statusEl) return;

        const setStatus = (message, isSuccess) => {
            statusEl.textContent = message;
            statusEl.classList.remove('text-primary', 'text-red-500');
            statusEl.classList.add(isSuccess ? 'text-primary' : 'text-red-500');
        };

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            setStatus('Signing you in...', true);

            try {
                const formData = new FormData(form);
                formData.append('action', 'login');
                
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
                        window.location.href = data.redirect || 'home.php';
                    }, 700);
                }
            } catch (error) {
                console.error('Error:', error);
                setStatus('Login service unavailable. Please try again later.', false);
            }
        });
    })();
</script>
</div>
</div>
</div>
</body></html>
