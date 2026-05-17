<?php
// includes/footer.php — Versi Final Premium
// SD Muhammadiyah 01 Gentasari

try {
    if (empty($profileData)) {
        $profileData = db()->query("SELECT * FROM school_profile LIMIT 1")->fetch() ?: [];
    }
} catch (Exception $e) {
    $profileData = [];
}

$siteName = $profileData['school_name'] ?? APP_NAME;
?>
</main>

<footer class="footer-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Brand Column -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-5">
                    <a href="<?= APP_URL ?>/index.php"
                       class="w-10 h-10 rounded-2xl flex items-center justify-center hover:scale-105 transition-transform"
                       style="background:linear-gradient(135deg,#d4af37,#b48608); border:1px solid rgba(212,175,55,.25);">
                        <span style="font-family:'Instrument Serif',serif; color:#fff; font-weight:700; font-size:1rem;">م</span>
                    </a>
                    <div>
                        <div class="text-sm font-semibold" style="color:#0f172a;"><?= e($siteName) ?></div>
                        <div class="text-[9px] tracking-widest uppercase font-bold" style="color:#94a3b8; letter-spacing:.15em;">
                            Gentasari · Cilacap
                        </div>
                    </div>
                </div>

                <p class="text-sm font-light leading-relaxed max-w-xs mb-6" style="color:#64748b;">
                    Menjadi sekolah Islam unggulan yang membentuk generasi cerdas berkarakter dan berakhlak mulia.
                </p>

                <!-- Social Icons -->
                <?php
                $socials = [
                    'instagram' => $profileData['instagram'] ?? '',
                    'facebook'  => $profileData['facebook']  ?? '',
                    'youtube'   => $profileData['youtube']   ?? '',
                ];
                $svgIcons = [
                    'instagram' => '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
                    'facebook'  => '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
                    'youtube'   => '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>',
                ];
                $hasSocial = array_filter($socials);
                if ($hasSocial): ?>
                <div class="flex gap-2.5 mt-1">
                    <?php foreach ($socials as $key => $url): if (!$url) continue; ?>
                    <a href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 rounded-xl flex items-center justify-center hover:scale-110 transition-all duration-200"
                       style="background:rgba(0,0,0,0.04); border:1px solid rgba(0,0,0,0.08); color:#64748b;"
                       onmouseover="this.style.background='#fef9e7'; this.style.borderColor='rgba(212,175,55,.3)'; this.style.color='#92600a';"
                       onmouseout="this.style.background='rgba(0,0,0,.04)'; this.style.borderColor='rgba(0,0,0,.08)'; this.style.color='#64748b';"
                       aria-label="<?= ucfirst($key) ?>">
                        <?= $svgIcons[$key] ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Navigasi -->
            <div>
                <h4 class="text-xs tracking-widest uppercase font-semibold mb-5" style="color:#94a3b8; letter-spacing:.18em;">Navigasi</h4>
                <ul class="space-y-3">
                    <?php foreach ([
                        [APP_URL.'/pages/profile/sekolah.php',   'Profil Sekolah'],
                        [APP_URL.'/pages/profile/guru-staff.php','Guru & Staff'],
                        [APP_URL.'/pages/media/galeri.php',      'Galeri Foto'],
                        [APP_URL.'/pages/aktivitas/ekskul.php',  'Ekstrakurikuler'],
                        [APP_URL.'/pages/aktivitas/pengumuman.php','Pengumuman'],
                        [APP_URL.'/pages/interaksi/kontak.php',  'Kontak Kami'],
                    ] as $l): ?>
                    <li>
                        <a href="<?= $l[0] ?>"
                           class="text-sm flex items-center gap-2 transition-colors"
                           style="color:#94a3b8;"
                           onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#94a3b8'">
                            <i data-lucide="chevron-right" class="w-3 h-3 flex-shrink-0"></i>
                            <?= $l[1] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h4 class="text-xs tracking-widest uppercase font-semibold mb-5" style="color:#94a3b8; letter-spacing:.18em;">Kontak</h4>
                <ul class="space-y-4">
                    <?php if (!empty($profileData['address'])): ?>
                    <li class="flex gap-3 text-sm" style="color:#64748b;">
                        <i data-lucide="map-pin" class="w-4 h-4 flex-shrink-0 mt-0.5" style="color:#d4af37;"></i>
                        <span class="leading-relaxed">
                            <?= e($profileData['address'].', '.($profileData['district']??'').', '.($profileData['city']??'')) ?>
                        </span>
                    </li>
                    <?php endif; ?>
                    <?php if (!empty($profileData['phone'])): ?>
                    <li class="flex gap-3 text-sm" style="color:#64748b;">
                        <i data-lucide="phone" class="w-4 h-4 flex-shrink-0" style="color:#d4af37;"></i>
                        <a href="tel:<?= e($profileData['phone']) ?>" class="hover:text-gray-800 transition-colors">
                            <?= e($profileData['phone']) ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (!empty($profileData['email'])): ?>
                    <li class="flex gap-3 text-sm" style="color:#64748b;">
                        <i data-lucide="mail" class="w-4 h-4 flex-shrink-0" style="color:#d4af37;"></i>
                        <a href="mailto:<?= e($profileData['email']) ?>" class="hover:text-gray-800 transition-colors">
                            <?= e($profileData['email']) ?>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>

                <!-- Akreditasi Badge -->
                <div class="mt-6 inline-flex items-center gap-2 px-3 py-2 rounded-xl"
                     style="background:#fef9e7; border:1px solid rgba(212,175,55,.2);">
                    <span style="color:#d4af37; font-size:.85rem;">⭐</span>
                    <span style="font-size:.72rem; font-weight:700; color:#92600a; letter-spacing:.06em;">Akreditasi A</span>
                </div>
            </div>

        </div><!-- /grid -->

        <!-- Footer Bottom -->
        <div class="mt-14 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4"
             style="border-top:1px solid rgba(0,0,0,0.06);">
            <p style="color:#cbd5e1; font-size:.78rem;">
                &copy; <?= date('Y') ?> <?= e($siteName) ?>. All rights reserved.
            </p>
            <div class="flex items-center gap-5">
                <span style="font-size:.72rem; color:#e2e8f0; letter-spacing:.06em;">
                    Dibuat dengan ❤️ untuk pendidikan
                </span>
                <a href="<?= APP_URL ?>/admin/login.php"
                   class="flex items-center gap-1.5 transition-colors"
                   style="color:#cbd5e1; font-size:.72rem;"
                   onmouseover="this.style.color='#94a3b8'" onmouseout="this.style.color='#cbd5e1'">
                    <i data-lucide="lock" class="w-3 h-3"></i> Admin
                </a>
            </div>
        </div>
    </div>
</footer>

</div><!-- /page-wrapper -->

<!-- ============================================================
     SCRIPTS — Lenis, Cursor, Reveal, Counter, Parallax, Page Transition
     ============================================================ -->

<!-- Lenis Smooth Scroll -->
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/bundled/lenis.min.js"></script>

<script>
(function () {
    'use strict';

    /* ----------------------------------------------------------
       1. LENIS SMOOTH SCROLL
    ---------------------------------------------------------- */
    const lenis = new Lenis({
        duration: 1.15,
        easing: t => 1 - Math.pow(1 - t, 4),
        smoothWheel: true,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // Lenis + hash links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                lenis.scrollTo(target, { offset: -80, duration: 1.2 });
            }
        });
    });


    /* ----------------------------------------------------------
       2. SCROLL PROGRESS BAR
    ---------------------------------------------------------- */
    const progressBar = document.getElementById('scroll-progress');
    if (progressBar) {
        lenis.on('scroll', ({ progress }) => {
            progressBar.style.width = (progress * 100) + '%';
        });
    }


    /* ----------------------------------------------------------
       3. NAVBAR — Float pill + shrink on scroll
    ---------------------------------------------------------- */
    const nav = document.getElementById('navbar');
    if (nav) {
        lenis.on('scroll', ({ scroll }) => {
            nav.classList.toggle('scrolled', scroll > 50);
            // Shrink inner height on scroll
            const inner = nav.querySelector('.flex');
            if (inner) {
                inner.style.height = scroll > 50 ? '50px' : '58px';
            }
        });
    }


    /* ----------------------------------------------------------
       4. CUSTOM CURSOR
    ---------------------------------------------------------- */
    const dot  = document.getElementById('cursor-dot');
    const ring = document.getElementById('cursor-ring');

    if (dot && ring && window.matchMedia('(pointer: fine)').matches) {
        let mx = 0, my = 0, rx = 0, ry = 0;

        document.addEventListener('mousemove', e => {
            mx = e.clientX;
            my = e.clientY;
        }, { passive: true });

        (function cursorLoop() {
            dot.style.left  = mx + 'px';
            dot.style.top   = my + 'px';
            rx += (mx - rx) * 0.13;
            ry += (my - ry) * 0.13;
            ring.style.left = rx + 'px';
            ring.style.top  = ry + 'px';
            requestAnimationFrame(cursorLoop);
        })();

        // Hover state
        document.addEventListener('mouseover', e => {
            const el = e.target.closest('a, button, [data-gallery], .gallery-filter-btn, .lb-nav-btn, .lb-thumb');
            document.body.classList.toggle('cursor-hover', !!el);
        });

        document.addEventListener('mouseleave', () => {
            dot.style.opacity  = '0';
            ring.style.opacity = '0';
        });

        document.addEventListener('mouseenter', () => {
            dot.style.opacity  = '1';
            ring.style.opacity = '1';
        });
    } else {
        // Touch device — remove cursor elements
        if (dot)  dot.remove();
        if (ring) ring.remove();
    }


    /* ----------------------------------------------------------
       5. SCROLL REVEAL — IntersectionObserver
    ---------------------------------------------------------- */
    const revealEls = document.querySelectorAll('.reveal-fade, .reveal-heading');
    const staggerEls = document.querySelectorAll('.stagger-grid > *');

    // Apply stagger delays
    document.querySelectorAll('.stagger-grid').forEach(grid => {
        [...grid.children].forEach((child, i) => {
            if (!child.dataset.delay) {
                child.style.transitionDelay = (i * 0.08) + 's';
            }
        });
    });

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.10, rootMargin: '0px 0px -60px 0px' });

    [...revealEls, ...staggerEls].forEach(el => revealObserver.observe(el));


    /* ----------------------------------------------------------
       6. COUNTER ANIMATION
    ---------------------------------------------------------- */
    const counterEls = document.querySelectorAll('[data-count]');

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el     = entry.target;
            const target = parseInt(el.dataset.count) || 0;
            const dur    = 1400;
            const start  = performance.now();

            function tick(now) {
                const elapsed  = now - start;
                const progress = Math.min(elapsed / dur, 1);
                // Ease out cubic
                const ease     = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(ease * target);
                if (progress < 1) requestAnimationFrame(tick);
                else el.textContent = target;
            }

            requestAnimationFrame(tick);
            counterObserver.unobserve(el);
        });
    }, { threshold: 0.5 });

    counterEls.forEach(el => counterObserver.observe(el));


    /* ----------------------------------------------------------
       7. PARALLAX ORBS ON SCROLL
    ---------------------------------------------------------- */
    const orbs = document.querySelectorAll('.orb-parallax');
    if (orbs.length) {
        lenis.on('scroll', ({ scroll }) => {
            orbs.forEach(orb => {
                const speed = parseFloat(orb.dataset.speed) || 0.10;
                orb.style.transform = `translateY(${scroll * speed}px)`;
            });
        });
    }


    /* ----------------------------------------------------------
       8. TILT CARD — Mouse 3D Tilt
    ---------------------------------------------------------- */
    document.querySelectorAll('.tilt-card').forEach(card => {
        const inner = card.querySelector('.tilt-inner');
        if (!inner) return;

        card.addEventListener('mousemove', e => {
            const r    = card.getBoundingClientRect();
            const x    = (e.clientX - r.left) / r.width  - 0.5;
            const y    = (e.clientY - r.top)  / r.height - 0.5;
            inner.style.transform = `rotateY(${x * 10}deg) rotateX(${y * -10}deg) translateZ(12px)`;
        });

        card.addEventListener('mouseleave', () => {
            inner.style.transform = 'rotateY(0deg) rotateX(0deg) translateZ(0)';
            inner.style.transition = 'transform 0.6s cubic-bezier(.22,1,.36,1)';
        });

        card.addEventListener('mouseenter', () => {
            inner.style.transition = 'transform 0.15s ease';
        });
    });


    /* ----------------------------------------------------------
       9. IMAGE LAZY BLUR-UP
    ---------------------------------------------------------- */
    document.querySelectorAll('img[loading="lazy"]').forEach(img => {
        img.classList.add('lazy-blur');
        if (img.complete) {
            img.classList.add('lb-loaded');
        } else {
            img.addEventListener('load', () => img.classList.add('lb-loaded'));
        }
    });


    /* ----------------------------------------------------------
       10. PAGE TRANSITION
    ---------------------------------------------------------- */
    document.querySelectorAll('a[href]').forEach(link => {
        const href = link.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('javascript') ||
            href.startsWith('mailto') || href.startsWith('tel') ||
            link.target === '_blank' || link.hasAttribute('data-no-transition')) return;

        link.addEventListener('click', e => {
            // Skip modifier keys
            if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

            e.preventDefault();
            document.body.style.animation = 'page-out 0.22s ease forwards';
            setTimeout(() => { location.href = href; }, 210);
        });
    });


    /* ----------------------------------------------------------
       11. MOBILE MENU
    ---------------------------------------------------------- */
    const hamburger  = document.getElementById('hamburger');
    const closeBtn   = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const overlay    = document.getElementById('menu-overlay');

    function openMenu() {
        mobileMenu?.classList.add('open');
        overlay?.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        lenis.stop();
    }

    function closeMenu() {
        mobileMenu?.classList.remove('open');
        overlay?.classList.add('hidden');
        document.body.style.overflow = '';
        lenis.start();
    }

    hamburger?.addEventListener('click', openMenu);
    closeBtn?.addEventListener('click', closeMenu);
    overlay?.addEventListener('click', closeMenu);

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeMenu();
    });


    /* ----------------------------------------------------------
       12. INIT LUCIDE ICONS
    ---------------------------------------------------------- */
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

})();
</script>
<script src="<?= APP_URL ?>/assets/js/neo-future-motion.js"></script>

<!-- External scripts (existing) -->
<script src="<?= APP_URL ?>/assets/js/scroll3d.js"   defer></script>
<script src="<?= APP_URL ?>/assets/js/animations.js" defer></script>

</body>
</html>