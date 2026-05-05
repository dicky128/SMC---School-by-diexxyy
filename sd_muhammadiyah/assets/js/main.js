/**
 * assets/js/main.js - SD Muhammadiyah 1 Gentasari
 * FINAL IMPROVED VERSION (The Interaction Engine)
 * ─────────────────────────────────────────────────────────────────────────────
 */

'use strict';

document.addEventListener('DOMContentLoaded', () => {
    // 0. INITIALIZE CORE ENGINES
    if (window.lucide) window.lucide.createIcons();
    
    // Auto-highlight active navigation link
    const path = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href') || '';
        if (href && path.endsWith(href.split('/').pop())) {
            link.classList.add('active');
        }
    });

    /* ══════════════════════════════════════════════════════════
       1. NAVBAR — Premium Scroll Effect
    ══════════════════════════════════════════════════════════ */
    const initNavbar = () => {
        const navbar = document.querySelector('nav');
        const inner = document.getElementById('navbar-inner');
        
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            if (scrollY > 50) {
                // Apply premium glassmorphism on scroll
                if (inner) {
                    inner.style.background = 'rgba(0, 0, 0, 0.75)';
                    inner.style.backdropFilter = 'blur(20px) saturate(1.8)';
                    inner.style.webkitBackdropFilter = 'blur(20px) saturate(1.8)';
                }
                navbar?.classList.add('border-b', 'border-white/10', 'shadow-2xl');
            } else {
                if (inner) {
                    inner.style.background = '';
                    inner.style.backdropFilter = '';
                    inner.style.webkitBackdropFilter = '';
                }
                navbar?.classList.remove('border-b', 'border-white/10', 'shadow-2xl');
            }
        }, { passive: true });
    };

    /* ══════════════════════════════════════════════════════════
       2. MOBILE MENU & OVERLAY
    ══════════════════════════════════════════════════════════ */
    const initMobileMenu = () => {
        const hamburger  = document.getElementById('hamburger');
        const closeBtn   = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const overlay    = document.getElementById('menu-overlay');

        if (!hamburger || !mobileMenu) return;

        const openMenu = () => {
            mobileMenu.classList.add('open');
            mobileMenu.classList.remove('hidden'); // Ensure flex/block consistency
            if (overlay) overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            if (window.lucide) window.lucide.createIcons();
        };

        const closeMenu = () => {
            mobileMenu.classList.remove('open');
            if (overlay) overlay.classList.add('hidden');
            document.body.style.overflow = '';
        };

        hamburger.addEventListener('click', openMenu);
        [closeBtn, overlay].forEach(el => el?.addEventListener('click', closeMenu));
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMenu(); });
    };

    /* ══════════════════════════════════════════════════════════
       3. SWEETALERT2 — Global Delete Confirmation & Toast
    ══════════════════════════════════════════════════════════ */
    const initSweetAlertHelpers = () => {
        // Global Confirmation for Delete Buttons
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const href = btn.getAttribute('href');
                
                if (window.Swal) {
                    Swal.fire({
                        title: 'Hapus Data?',
                        text: "Tindakan ini tidak dapat dibatalkan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444', // Tailwind red-500
                        cancelButtonColor: '#64748b',  // Tailwind slate-500
                        confirmButtonText: 'Ya, Hapus',
                        background: 'rgba(15, 23, 42, 0.95)',
                        color: '#fff',
                        backdrop: `rgba(0,0,0,0.4) blur(4px)`
                    }).then((result) => {
                        if (result.isConfirmed) window.location.href = href;
                    });
                } else {
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) window.location.href = href;
                }
            });
        });
    };

    // Global Toast Helper
    window.showToast = (icon, title, timer = 3000) => {
        if (window.Swal) {
            Swal.fire({
                toast: true, position: 'top-end',
                icon, title,
                showConfirmButton: false,
                timer, timerProgressBar: true,
                background: 'rgba(30, 41, 59, 0.95)', // Slate-800
                color: '#fff'
            });
        } else {
            console.info(`[Toast] ${icon}: ${title}`);
        }
    };

    /* ══════════════════════════════════════════════════════════
       4. COUNTER ANIMATION (Improved Easing)
    ══════════════════════════════════════════════════════════ */
    const initCounters = () => {
        const counters = document.querySelectorAll('[data-counter]');
        if (!counters.length) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const target = parseInt(el.dataset.counter, 10) || 0;
                const suffix = el.dataset.suffix || '';
                
                let start = 0;
                const duration = 2000;
                const startTime = performance.now();

                const animate = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easedProgress = 1 - Math.pow(1 - progress, 4); // Quart easing
                    
                    const currentValue = Math.floor(easedProgress * target);
                    el.textContent = currentValue.toLocaleString('id-ID') + suffix;

                    if (progress < 1) requestAnimationFrame(animate);
                };
                requestAnimationFrame(animate);
                observer.unobserve(el);
            });
        }, { threshold: 0.5 });

        counters.forEach(el => observer.observe(el));
    };

    /* ══════════════════════════════════════════════════════════
       5. FORM ENHANCEMENTS (UI/UX)
    ══════════════════════════════════════════════════════════ */
    const initForms = () => {
        // Auto-resize Textarea
        document.querySelectorAll('textarea.auto-resize').forEach(el => {
            el.addEventListener('input', () => {
                el.style.height = 'auto';
                el.style.height = el.scrollHeight + 'px';
            });
        });

        // Floating Label State
        document.querySelectorAll('.input-float').forEach(wrap => {
            const input = wrap.querySelector('input, textarea, select');
            if (!input) return;
            const check = () => wrap.classList.toggle('has-value', !!input.value);
            input.addEventListener('focus', () => wrap.classList.add('focused'));
            input.addEventListener('blur', () => { wrap.classList.remove('focused'); check(); });
            input.addEventListener('input', check);
            check();
        });
    };

    /* ══════════════════════════════════════════════════════════
       6. LIGHTBOX & UTILITIES
    ══════════════════════════════════════════════════════════ */
    // Smooth Anchor Scroll
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', e => {
            const id = link.getAttribute('href').slice(1);
            const el = document.getElementById(id);
            if (!el || id === "") return;
            e.preventDefault();
            window.scrollTo({ top: el.offsetTop - 90, behavior: 'smooth' });
        });
    });

    // Run All Modules
    initNavbar();
    initMobileMenu();
    initSweetAlertHelpers();
    initCounters();
    initForms();
});

// Global Utilities (Keep outside DOMContentLoaded if needed by inline scripts)
window.copyToClipboard = (text, feedbackEl) => {
    navigator.clipboard.writeText(text).then(() => {
        if (feedbackEl) {
            const old = feedbackEl.textContent;
            feedbackEl.textContent = 'Copied!';
            setTimeout(() => feedbackEl.textContent = old, 2000);
        }
    });
};