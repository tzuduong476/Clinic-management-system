<?php
$publicNavbarUser = null;

if (function_exists('getCurrentUser')) {
    $publicNavbarUser = getCurrentUser();
}

$publicNavbarName = trim((string)($publicNavbarUser['full_name'] ?? ''));
$publicNavbarEmail = trim((string)($publicNavbarUser['email'] ?? ''));

$publicNavbarDisplayName = $publicNavbarName !== ''
    ? $publicNavbarName
    : ($publicNavbarEmail !== '' ? $publicNavbarEmail : 'User');

$publicNavbarInitial = strtoupper(substr($publicNavbarDisplayName, 0, 1));
$publicNavbarCurrentFile = basename($_SERVER['PHP_SELF'] ?? '');

$publicNavbarEscape = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$publicNavbarIsActive = static function (array $files) use ($publicNavbarCurrentFile): bool {
    return in_array($publicNavbarCurrentFile, $files, true);
};

$publicNavbarLinkClass = static function (array $files) use ($publicNavbarIsActive): string {
    return $publicNavbarIsActive($files)
        ? 'text-sm font-extrabold text-primary transition-colors'
        : 'text-sm font-extrabold text-slate-heading hover:text-primary transition-colors';
};

$renderPublicLogo = static function (): string {
    $possibleLogoPaths = [
        __DIR__ . '/shared/logo_svg.php',
        dirname(__DIR__) . '/shared/logo_svg.php',
        __DIR__ . '/logo_svg.php',
    ];

    foreach ($possibleLogoPaths as $logoPath) {
        if (file_exists($logoPath)) {
            ob_start();
            include $logoPath;
            return (string)ob_get_clean();
        }
    }

    return '
        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)]">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 3s6.5 6.7 6.5 11.3A6.5 6.5 0 0 1 5.5 14.3C5.5 9.7 12 3 12 3Z" fill="white"/>
                </svg>
            </div>
            <div class="leading-tight">
                <p class="text-lg font-black tracking-[0.18em] text-slate-heading">ELYSIAN</p>
                <p class="text-[10px] font-black tracking-[0.34em] text-cool-gray">SKIN CLINIC</p>
            </div>
        </div>
    ';
};
?>

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<style>
    .material-symbols-outlined {
        font-family: 'Material Symbols Outlined';
        font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
        line-height: 1;
    }
</style>

<header class="sticky top-0 z-[100] bg-white/95 backdrop-blur-md border-b border-slate-100">
    <nav class="container mx-auto px-6 py-4 flex items-center justify-between" style="position: relative; z-index: 100;">
        <a href="home.php" class="flex items-center gap-3">
            <?= $renderPublicLogo(); ?>
        </a>

        <div class="hidden lg:flex items-center gap-10">
            <a class="<?= $publicNavbarLinkClass(['home.php']); ?>" href="home.php">Home</a>
            <a class="<?= $publicNavbarLinkClass(['dichvu.php', 'service-detail.php']); ?>" href="dichvu.php">Services</a>
            <a class="<?= $publicNavbarLinkClass(['about.php']); ?>" href="about.php">About</a>
            <a class="<?= $publicNavbarLinkClass(['contact.php']); ?>" href="contact.php">Contact</a>
        </div>

        <div class="hidden lg:flex items-center gap-3">
            <?php if ($publicNavbarUser): ?>
                <div class="relative" data-notifications-root data-api="../backend/get_notifications.php">
                    <button
                        type="button"
                        class="group relative inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-heading shadow-sm transition hover:border-primary/40 hover:text-primary hover:shadow-[0_14px_35px_rgba(13,185,242,0.14)]"
                        aria-label="Notifications"
                        aria-expanded="false"
                        data-notifications-toggle
                    >
                        <span class="material-symbols-outlined text-[20px] transition group-hover:scale-105">notifications</span>
                        <span
                            class="absolute -right-1 -top-1 hidden min-w-[20px] rounded-full bg-rose-500 px-1.5 py-0.5 text-[10px] font-black leading-none text-white shadow-sm"
                            data-notifications-badge
                        ></span>
                    </button>

                    <div
                        class="absolute right-0 top-14 z-[110] hidden w-[360px] max-w-[calc(100vw-2rem)] overflow-hidden rounded-[1.75rem] border border-slate-100 bg-white shadow-[0_28px_80px_rgba(15,23,42,0.16)]"
                        data-notifications-panel
                    >
                        <div class="border-b border-slate-100 bg-gradient-to-r from-primary-soft via-white to-sky-50 px-5 py-4">
                            <div class="flex items-center justify-between gap-3">
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-primary">Notifications</p>
                                    <h3 class="mt-1 text-lg font-black text-slate-heading">Your updates</h3>
                                </div>
                                <span
                                    class="rounded-full bg-primary-soft px-3 py-1 text-xs font-black text-primary"
                                    data-notifications-count
                                >0</span>
                            </div>
                        </div>

                        <div class="max-h-[420px] overflow-y-auto px-3 py-3" data-notifications-list>
                            <div class="rounded-[1.5rem] border border-slate-100 bg-slate-50 px-4 py-5 text-sm font-semibold text-cool-gray">
                                Loading notifications...
                            </div>
                        </div>
                    </div>
                </div>

                <a href="profile.php" class="group flex items-center gap-3 rounded-full border border-slate-200 bg-white px-3 py-2 shadow-sm transition hover:border-primary/40 hover:shadow-[0_14px_35px_rgba(13,185,242,0.14)]">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary-soft text-sm font-black text-primary">
                        <?= $publicNavbarEscape($publicNavbarInitial); ?>
                    </div>

                    <div class="max-w-[150px] leading-tight">
                        <p class="truncate text-[11px] font-bold text-cool-gray">Signed in</p>
                        <p class="truncate text-sm font-black text-slate-heading group-hover:text-primary transition">
                            <?= $publicNavbarEscape($publicNavbarDisplayName); ?>
                        </p>
                    </div>
                </a>

            

                <a class="rounded-full border border-slate-200 px-5 py-2.5 text-sm font-extrabold text-slate-heading hover:border-primary hover:text-primary transition-colors" href="../backend/logout.php">
                    Sign Out
                </a>
            <?php else: ?>
                <a class="text-sm font-extrabold text-slate-heading hover:text-primary transition-colors" href="signin.php">
                    Sign In
                </a>

                <a class="rounded-full bg-primary px-6 py-2.5 text-sm font-extrabold text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)] hover:-translate-y-0.5 hover:shadow-[0_18px_45px_rgba(13,185,242,0.35)] transition-all" href="signup.php">
                    Sign Up
                </a>
            <?php endif; ?>
        </div>

        <button
            id="mobile-menu-btn"
            type="button"
            class="lg:hidden rounded-full border border-slate-200 p-3 text-slate-heading"
            onclick="toggleMobileMenu()"
            aria-label="Toggle menu"
        >
            <span class="block h-0.5 w-6 bg-current mb-1.5"></span>
            <span class="block h-0.5 w-6 bg-current mb-1.5"></span>
            <span class="block h-0.5 w-6 bg-current"></span>
        </button>

        <div id="mobile-menu" class="hidden fixed inset-0 bg-white z-50" style="display: none;">
            <div class="flex flex-col h-full p-6">
                <div class="flex items-center justify-between">
                    <a href="home.php" class="flex items-center gap-3">
                        <?= $renderPublicLogo(); ?>
                    </a>

                    <button
                        type="button"
                        onclick="toggleMobileMenu()"
                        class="rounded-full border border-slate-200 p-3 text-slate-heading"
                        aria-label="Close menu"
                    >
                        <span class="relative block h-5 w-5">
                            <span class="absolute left-0 top-1/2 h-0.5 w-5 -translate-y-1/2 rotate-45 bg-current"></span>
                            <span class="absolute left-0 top-1/2 h-0.5 w-5 -translate-y-1/2 -rotate-45 bg-current"></span>
                        </span>
                    </button>
                </div>

                <div class="flex flex-col gap-6 mt-12">
                    <a class="text-3xl font-black <?= $publicNavbarIsActive(['home.php']) ? 'text-primary' : 'text-slate-heading hover:text-primary'; ?> transition-colors" href="home.php">
                        Home
                    </a>

                    <a class="text-3xl font-black <?= $publicNavbarIsActive(['dichvu.php', 'service-detail.php']) ? 'text-primary' : 'text-slate-heading hover:text-primary'; ?> transition-colors" href="dichvu.php">
                        Services
                    </a>

                    <a class="text-3xl font-black <?= $publicNavbarIsActive(['about.php']) ? 'text-primary' : 'text-slate-heading hover:text-primary'; ?> transition-colors" href="about.php">
                        About
                    </a>

                    <a class="text-3xl font-black <?= $publicNavbarIsActive(['contact.php']) ? 'text-primary' : 'text-slate-heading hover:text-primary'; ?> transition-colors" href="contact.php">
                        Contact
                    </a>
                </div>

                <div class="mt-auto border-t border-slate-100 pt-6">
                    <?php if ($publicNavbarUser): ?>
                        <div class="mb-4 rounded-[1.75rem] border border-slate-200 bg-slate-50 p-4">
                            <div class="mb-3 flex items-center justify-between gap-3">
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-primary">Notifications</p>
                                    <p class="text-sm font-bold text-cool-gray">Open your latest activity from the top bell icon.</p>
                                </div>
                                <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-black text-primary" data-mobile-notification-indicator>0</span>
                            </div>
                            <a href="profile.php" class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-black text-slate-heading shadow-sm ring-1 ring-slate-200">
                                <span class="material-symbols-outlined text-[18px] text-primary">notifications</span>
                                View updates
                            </a>
                        </div>

                        <a href="profile.php" class="mb-4 flex items-center gap-3 rounded-3xl border border-slate-200 bg-white p-4 shadow-sm">
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-primary-soft text-base font-black text-primary">
                                <?= $publicNavbarEscape($publicNavbarInitial); ?>
                            </div>

                            <div class="min-w-0">
                                <p class="text-xs font-bold text-cool-gray">Signed in</p>
                                <p class="truncate text-base font-black text-slate-heading">
                                    <?= $publicNavbarEscape($publicNavbarDisplayName); ?>
                                </p>
                            </div>
                        </a>

                       

                        <a class="block rounded-full border border-slate-200 text-slate-heading text-center px-6 py-4 font-black" href="../backend/logout.php">
                            Sign Out
                        </a>
                    <?php else: ?>
                        <a class="block rounded-full border border-slate-200 text-slate-heading text-center px-6 py-4 font-black mb-3" href="signin.php">
                            Sign In
                        </a>

                        <a class="block rounded-full bg-primary text-white text-center px-6 py-4 font-black shadow-[0_14px_35px_rgba(13,185,242,0.25)]" href="signup.php">
                            Sign Up
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>

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

    (() => {
        const roots = document.querySelectorAll('[data-notifications-root]');

        if (!roots.length) {
            return;
        }

        const priorityClassMap = {
            urgent: 'border-rose-100 bg-rose-50/80',
            high: 'border-amber-100 bg-amber-50/80',
            medium: 'border-sky-100 bg-sky-50/70',
            low: 'border-slate-100 bg-white'
        };

        const countLabel = (count) => count > 99 ? '99+' : String(count);
        const mobileIndicator = document.querySelector('[data-mobile-notification-indicator]');

        const escapeHtml = (value) => String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

        const updateMobileIndicator = (count) => {
            if (mobileIndicator) {
                mobileIndicator.textContent = countLabel(count);
            }
        };

        const renderItems = (root, payload) => {
            const list = root.querySelector('[data-notifications-list]');
            const badge = root.querySelector('[data-notifications-badge]');
            const count = root.querySelector('[data-notifications-count]');
            const items = Array.isArray(payload?.notifications) ? payload.notifications : [];
            const highlightCount = Number(payload?.highlight_count || items.length || 0);

            count.textContent = countLabel(items.length);
            updateMobileIndicator(highlightCount);

            if (highlightCount > 0) {
                badge.textContent = countLabel(highlightCount);
                badge.classList.remove('hidden');
            } else {
                badge.textContent = '';
                badge.classList.add('hidden');
            }

            if (!items.length) {
                list.innerHTML = `
                    <div class="rounded-[1.5rem] border border-slate-100 bg-slate-50 px-4 py-5 text-sm font-semibold text-cool-gray">
                        No notifications yet.
                    </div>
                `;
                return;
            }

            list.innerHTML = items.map((item) => {
                const priorityClass = priorityClassMap[item.priority] || priorityClassMap.low;
                const href = item.href ? escapeHtml(item.href) : '#';

                return `
                    <a href="${href}" class="mb-2 block rounded-[1.5rem] border px-4 py-4 transition hover:-translate-y-0.5 hover:shadow-sm ${priorityClass}">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined mt-0.5 rounded-2xl bg-white/80 p-2 text-[18px] text-primary shadow-sm ring-1 ring-white">
                                ${escapeHtml(item.icon || 'notifications')}
                            </span>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-black text-slate-heading">${escapeHtml(item.title)}</p>
                                    <span class="shrink-0 text-[11px] font-bold text-cool-gray">${escapeHtml(item.relative_time)}</span>
                                </div>
                                <p class="mt-1 text-sm leading-6 text-cool-gray">${escapeHtml(item.message)}</p>
                            </div>
                        </div>
                    </a>
                `;
            }).join('');
        };

        const loadItems = async (root) => {
            const list = root.querySelector('[data-notifications-list]');
            const api = root.getAttribute('data-api');

            if (!api) {
                return;
            }

            try {
                const response = await fetch(`${api}?limit=10`, {
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                const payload = await response.json();

                if (!response.ok || !payload.success) {
                    throw new Error(payload.message || 'Unable to load notifications.');
                }

                renderItems(root, payload);
            } catch (error) {
                list.innerHTML = `
                    <div class="rounded-[1.5rem] border border-rose-100 bg-rose-50 px-4 py-5 text-sm font-semibold text-rose-600">
                        ${escapeHtml(error.message || 'Unable to load notifications.')}
                    </div>
                `;
            }
        };

        roots.forEach((root) => {
            const toggle = root.querySelector('[data-notifications-toggle]');
            const panel = root.querySelector('[data-notifications-panel]');

            if (!toggle || !panel) {
                return;
            }

            let loaded = false;

            toggle.addEventListener('click', () => {
                const isHidden = panel.classList.contains('hidden');

                document.querySelectorAll('[data-notifications-panel]').forEach((otherPanel) => {
                    if (otherPanel !== panel) {
                        otherPanel.classList.add('hidden');
                    }
                });

                document.querySelectorAll('[data-notifications-toggle]').forEach((otherToggle) => {
                    if (otherToggle !== toggle) {
                        otherToggle.setAttribute('aria-expanded', 'false');
                    }
                });

                panel.classList.toggle('hidden', !isHidden);
                toggle.setAttribute('aria-expanded', isHidden ? 'true' : 'false');

                if (isHidden && !loaded) {
                    loaded = true;
                    loadItems(root);
                }
            });

            document.addEventListener('click', (event) => {
                if (!root.contains(event.target)) {
                    panel.classList.add('hidden');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });

            loadItems(root);
            loaded = true;
        });
    })();
</script>
