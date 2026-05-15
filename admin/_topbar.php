<?php
$currentUser = getCurrentUser();

$title = $title ?? 'Management Hub';
$subtitle = $subtitle ?? '';

$userRole = $currentUser['role'] ?? 'admin';

$roleLabel = $userRole === 'receptionist'
    ? 'Front Desk'
    : ($userRole === 'doctor' ? 'Specialist' : 'Director');

$fullName = trim($currentUser['full_name'] ?? 'Admin');

$parts = preg_split('/\s+/', $fullName);
$first = $parts[0] ?? 'A';
$last = count($parts) > 1 ? $parts[count($parts) - 1] : '';
$initials = strtoupper(substr($first, 0, 1) . substr($last, 0, 1));

if ($initials === '') {
    $initials = 'A';
}
?>

<header class="relative z-40 shrink-0 overflow-visible border-b border-sky-100 bg-gradient-to-r from-sky-50 via-white to-cyan-50">
    <div class="pointer-events-none absolute -left-16 -top-24 h-48 w-48 rounded-full bg-sky-200/35 blur-3xl"></div>
    <div class="pointer-events-none absolute right-32 top-0 h-24 w-64 rounded-full bg-cyan-100/70 blur-3xl"></div>
    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-sky-200 to-transparent"></div>

    <div class="relative flex items-center justify-between gap-6 px-8 py-4">
        <div class="flex min-w-0 items-center gap-3">
            <?php if (isset($backLink)): ?>
                <a
                    href="<?= htmlspecialchars($backLink) ?>"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-white/80 text-sky-600 shadow-sm ring-1 ring-sky-100 transition hover:-translate-x-0.5 hover:bg-white hover:text-sky-700"
                    aria-label="Go back"
                >
                    <span class="material-symbols-outlined text-[22px]">arrow_back</span>
                </a>
            <?php endif; ?>

            <div class="min-w-0">
                <div class="mb-1 flex items-center gap-2">
                    <span class="h-1.5 w-8 rounded-full bg-gradient-to-r from-sky-400 to-cyan-300"></span>
                    <span class="text-[11px] font-black uppercase tracking-[0.22em] text-sky-500/80">
                        Management Hub
                    </span>
                </div>

                <h1 class="truncate text-[30px] font-black leading-tight tracking-[-0.045em] text-sky-600 drop-shadow-[0_1px_0_rgba(255,255,255,0.9)]">
                    <?= htmlspecialchars($title) ?>
                </h1>

                <?php if (!empty($subtitle)): ?>
                    <p class="mt-1 truncate text-sm font-semibold text-slate-500">
                        <?= htmlspecialchars($subtitle) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="flex shrink-0 items-center gap-2.5">
            <div class="hidden items-center gap-2 rounded-full bg-white/75 px-3 py-2 text-sm font-bold text-slate-600 shadow-sm ring-1 ring-sky-100/80 backdrop-blur md:flex">
                <span class="h-2 w-2 rounded-full bg-sky-400 shadow-[0_0_0_4px_rgba(56,189,248,0.14)]"></span>
                <?= htmlspecialchars($roleLabel) ?>
            </div>

            <div class="relative" data-notifications-root data-api="../backend/get_notifications.php">
                <button
                    type="button"
                    class="group relative inline-flex h-11 w-11 items-center justify-center rounded-full bg-white/80 text-slate-500 shadow-sm ring-1 ring-sky-100/80 backdrop-blur transition hover:bg-white hover:text-sky-600 hover:shadow-md"
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
                    class="absolute right-0 top-14 z-[9999] hidden w-[380px] max-w-[calc(100vw-2rem)] overflow-hidden rounded-[1.75rem] border border-sky-100 bg-white shadow-[0_28px_80px_rgba(15,23,42,0.16)] ring-1 ring-slate-950/5"
                    data-notifications-panel
                >
                    <div class="border-b border-slate-100 bg-gradient-to-r from-sky-50 via-white to-cyan-50 px-5 py-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-sky-500">Notifications</p>
                                <h3 class="mt-1 text-lg font-black text-slate-900">Recent activity</h3>
                            </div>
                            <span
                                class="rounded-full bg-sky-100 px-3 py-1 text-xs font-black text-sky-700"
                                data-notifications-count
                            >0</span>
                        </div>
                    </div>

                    <div class="max-h-[420px] overflow-y-auto px-3 py-3" data-notifications-list>
                        <div class="rounded-[1.5rem] border border-slate-100 bg-slate-50 px-4 py-5 text-sm font-semibold text-slate-500">
                            Loading notifications...
                        </div>
                    </div>
                </div>
            </div>

            <div class="group flex items-center gap-2.5 rounded-full bg-white/80 px-2.5 py-2 shadow-sm ring-1 ring-sky-100/80 backdrop-blur transition hover:bg-white hover:shadow-md">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-br from-sky-100 to-cyan-100 text-sm font-black text-sky-600 ring-1 ring-white">
                    <?= htmlspecialchars($initials) ?>
                </div>

                <div class="hidden min-w-0 sm:block">
                    <p class="max-w-[130px] truncate text-sm font-black text-slate-800">
                        <?= htmlspecialchars($fullName) ?>
                    </p>
                    <p class="text-[10px] font-black uppercase tracking-[0.16em] text-slate-400">
                        <?= htmlspecialchars($userRole) ?>
                    </p>
                </div>
            </div>

            <a
                href="../backend/logout.php"
                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/75 text-slate-500 shadow-sm ring-1 ring-sky-100/80 backdrop-blur transition hover:bg-rose-50 hover:text-rose-500 hover:ring-rose-100"
                aria-label="Sign out"
                title="Sign out"
            >
                <span class="material-symbols-outlined text-[20px]">logout</span>
            </a>
        </div>
    </div>
</header>

<script>
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

        const countLabel = (count) => {
            if (count > 99) {
                return '99+';
            }

            return String(count);
        };

        const escapeHtml = (value) => String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

        const renderItems = (root, payload) => {
            const list = root.querySelector('[data-notifications-list]');
            const badge = root.querySelector('[data-notifications-badge]');
            const count = root.querySelector('[data-notifications-count]');
            const items = Array.isArray(payload?.notifications) ? payload.notifications : [];
            const highlightCount = Number(payload?.highlight_count || items.length || 0);

            count.textContent = countLabel(items.length);

            if (highlightCount > 0) {
                badge.textContent = countLabel(highlightCount);
                badge.classList.remove('hidden');
            } else {
                badge.textContent = '';
                badge.classList.add('hidden');
            }

            if (!items.length) {
                list.innerHTML = `
                    <div class="rounded-[1.5rem] border border-slate-100 bg-slate-50 px-4 py-5 text-sm font-semibold text-slate-500">
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
                            <span class="material-symbols-outlined mt-0.5 rounded-2xl bg-white/80 p-2 text-[18px] text-sky-600 shadow-sm ring-1 ring-white">
                                ${escapeHtml(item.icon || 'notifications')}
                            </span>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-start justify-between gap-3">
                                    <p class="text-sm font-black text-slate-900">${escapeHtml(item.title)}</p>
                                    <span class="shrink-0 text-[11px] font-bold text-slate-400">${escapeHtml(item.relative_time)}</span>
                                </div>
                                <p class="mt-1 text-sm leading-6 text-slate-600">${escapeHtml(item.message)}</p>
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
