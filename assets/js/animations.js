/**
 * assets/js/animations.js — SD Muhammadiyah 01 Gentasari
 * Micro-interactions & premium UI animations
 * Versi Final — Subtle, invisible, Apple-like
 */
(function () {
    'use strict';

    /* ── Button Ripple Effect ────────────────────────────────── */
    document.querySelectorAll('.btn-primary-light, .btn-outline-light, .btn-hero-outline').forEach(btn => {
        btn.addEventListener('click', function (e) {
            const rect   = this.getBoundingClientRect();
            const ripple = document.createElement('span');
            const size   = Math.max(rect.width, rect.height) * 2;
            const x      = e.clientX - rect.left - size / 2;
            const y      = e.clientY - rect.top  - size / 2;

            ripple.style.cssText = `
                position:absolute; border-radius:50%; pointer-events:none;
                width:${size}px; height:${size}px;
                left:${x}px; top:${y}px;
                background:rgba(255,255,255,0.25);
                transform:scale(0); animation:ripple-anim .55s ease forwards;
            `;

            // Ensure button has relative positioning
            const prevPos = getComputedStyle(this).position;
            if (prevPos === 'static') this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Ripple keyframe (injected once)
    if (!document.getElementById('ripple-style')) {
        const style = document.createElement('style');
        style.id    = 'ripple-style';
        style.textContent = `
            @keyframes ripple-anim {
                to { transform: scale(1); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    }


    /* ── Announcement Card — Arrow Color on Hover ─────────────── */
    document.querySelectorAll('.ann-card-light').forEach(card => {
        const arrow = card.querySelector('[id^="arr-"]');
        if (!arrow) return;

        card.addEventListener('mouseenter', () => {
            arrow.style.color = '#d4af37';
        });
        card.addEventListener('mouseleave', () => {
            arrow.style.color = '#94a3b8';
        });
    });


    /* ── Smooth Image Zoom on Gallery Grid ───────────────────── */
    // Already handled by CSS in light3d.css (.gallery-item:hover img)
    // This is a fallback for browsers without CSS transition support


    /* ── Social Icon subtle bounce ───────────────────────────── */
    document.querySelectorAll('footer a[aria-label]').forEach(icon => {
        icon.addEventListener('mouseenter', function () {
            this.style.transition = 'transform .3s cubic-bezier(.22,1,.36,1)';
            this.style.transform  = 'translateY(-3px) scale(1.12)';
        });
        icon.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });


    /* ── Navbar link hover underline (reinforce CSS) ─────────── */
    // Already handled purely in CSS — no JS needed.


    /* ── Ekskul card image zoom on hover ─────────────────────── */
    document.querySelectorAll('.grid-ekskul .tilt-card img').forEach(img => {
        const wrapper = img.closest('.h-40');
        if (!wrapper) return;
        img.style.transition = 'transform .5s cubic-bezier(.4,0,.2,1), filter .4s ease';
        wrapper.addEventListener('mouseenter', () => {
            img.style.transform = 'scale(1.08)';
            img.style.filter    = 'brightness(.88)';
        });
        wrapper.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
            img.style.filter    = 'brightness(1)';
        });
    });


    /* ── Hero stats bar — subtle icon bounce on hover ─────────── */
    document.querySelectorAll('.hero-stat-item').forEach(item => {
        const icon = item.querySelector('div > i, div > svg');
        if (!icon) return;
        item.addEventListener('mouseenter', () => {
            icon.style.transform  = 'scale(1.15)';
            icon.style.transition = 'transform .3s cubic-bezier(.22,1,.36,1)';
        });
        item.addEventListener('mouseleave', () => {
            icon.style.transform = 'scale(1)';
        });
    });


    /* ── Footer nav link — subtle translateX ─────────────────── */
    document.querySelectorAll('footer ul li a').forEach(link => {
        link.style.transition = 'color .2s, transform .25s cubic-bezier(.22,1,.36,1)';
        link.addEventListener('mouseenter', () => {
            link.style.transform = 'translateX(4px)';
        });
        link.addEventListener('mouseleave', () => {
            link.style.transform = 'translateX(0)';
        });
    });

})();