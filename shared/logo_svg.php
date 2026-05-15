<?php $logoClass = $logoClass ?? 'h-11 w-auto max-w-full'; ?>
<span class="inline-flex items-center max-w-full" aria-label="Elysian Skin Clinic">
  <svg viewBox="0 0 220 48" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" class="<?= htmlspecialchars($logoClass) ?>">
    <defs>
      <linearGradient id="elysianOrb" x1="8" y1="8" x2="40" y2="40" gradientUnits="userSpaceOnUse">
        <stop stop-color="#5fd9ff"/>
        <stop offset="1" stop-color="#0db9f2"/>
      </linearGradient>
    </defs>
    <g transform="translate(2 2)">
      <circle cx="22" cy="22" r="20" fill="url(#elysianOrb)"/>
      <path d="M22 9.5c4.6 6 8.6 9.8 8.6 14.8 0 4.8-3.8 8.6-8.6 8.6s-8.6-3.8-8.6-8.6c0-5 4-8.8 8.6-14.8z" fill="#ffffff" fill-opacity=".92"/>
      <circle cx="16.2" cy="16.6" r="2.2" fill="#ffffff" fill-opacity=".58"/>
    </g>
    <text x="56" y="24" font-size="16" font-weight="800" letter-spacing="1.2" fill="currentColor" style="font-family: Manrope, Inter, system-ui, sans-serif;">ELYSIAN</text>
    <text x="56" y="37" font-size="8.8" font-weight="700" letter-spacing="2.2" fill="currentColor" fill-opacity=".75" style="font-family: Manrope, Inter, system-ui, sans-serif;">SKIN CLINIC</text>
  </svg>
</span>
