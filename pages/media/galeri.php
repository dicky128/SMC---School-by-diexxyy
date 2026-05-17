<?php
require_once __DIR__ . '/../../includes/config.php';

$pageTitle     = $pageHeroTitle = 'Galeri Foto';
$pageHeroLabel = 'Media Visual';
$pageHeroSub   = 'Kumpulan momen berharga kegiatan belajar, prestasi, dan kehidupan sekolah kami.';
$pageHeroColor = 'gold';
$activePage    = 'galeri';
$breadcrumbParent = 'Media';

require_once ROOT_PATH . 'header.php';

$catSlug = $_GET['cat'] ?? '';

try {
    $categories = db()->query("SELECT * FROM gallery_categories ORDER BY sort_order")->fetchAll();
    $where  = $catSlug ? "WHERE gc.slug=?" : "";
    $params = $catSlug ? [$catSlug] : [];
    $stmt   = db()->prepare(
        "SELECT g.*, gc.name AS cat_name, gc.slug AS cat_slug
         FROM gallery g
         LEFT JOIN gallery_categories gc ON g.category_id = gc.id
         $where
         ORDER BY g.is_featured DESC, g.sort_order, g.created_at DESC"
    );
    $stmt->execute($params);
    $photos = $stmt->fetchAll();
} catch (Exception $e) {
    $categories = [];
    $photos     = [];
}
?>

<!-- ============================================================
     CINEMATIC LIGHTBOX — Full Overlay
     ============================================================ -->
<div id="cinema-lightbox" role="dialog" aria-modal="true" aria-label="Galeri foto">

    <!-- TOP BAR -->
    <div id="lb-topbar">
        <div style="font-family:'Plus Jakarta Sans',sans-serif; font-size:.65rem; font-weight:700;
                    letter-spacing:.22em; text-transform:uppercase; color:rgba(255,255,255,.35);">
            SD Muhammadiyah 01 Gentasari
        </div>
        <button id="lb-close-btn" aria-label="Tutup galeri">✕</button>
    </div>

    <!-- MAIN STAGE -->
    <div id="lb-stage">

        <!-- Prev -->
        <button class="lb-nav-btn" id="lb-prev" aria-label="Foto sebelumnya">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>

        <!-- Main Image -->
        <img id="lb-main-img" src="" alt="" draggable="false">

        <!-- Next -->
        <button class="lb-nav-btn" id="lb-next" aria-label="Foto berikutnya">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>
    </div>

    <!-- BOTTOM: Title + Counter + Thumbnails -->
    <div id="lb-bottom">
        <div id="lb-title"></div>
        <div id="lb-counter"></div>
        <div id="lb-thumbs"></div>
    </div>
</div>


<!-- ============================================================
     GALLERY PAGE CONTENT
     ============================================================ -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Category Filter -->
    <?php if (!empty($categories)): ?>
    <div class="flex flex-wrap gap-3 mb-10 reveal-fade">
        <a href="?" class="gallery-filter-btn <?= !$catSlug ? 'active' : '' ?>">
            Semua
        </a>
        <?php foreach ($categories as $cat): ?>
        <a href="?cat=<?= urlencode($cat['slug']) ?>"
           class="gallery-filter-btn <?= $catSlug === $cat['slug'] ? 'active' : '' ?>">
            <?= e($cat['name']) ?>
        </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Empty state -->
    <?php if (empty($photos)): ?>
    <div class="glass-card rounded-3xl p-16 text-center">
        <i data-lucide="image" class="w-10 h-10 mx-auto mb-3" style="color:#cbd5e1;"></i>
        <p style="color:#94a3b8;">Belum ada foto<?= $catSlug ? ' dalam kategori ini' : '' ?>.</p>
    </div>

    <?php else: ?>

    <!-- Masonry Grid -->
    <div class="gallery-masonry columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
        <?php foreach ($photos as $i => $ph):
            $imgSrc = UPLOAD_URL . 'gallery/' . $ph['image'];
        ?>
        <div class="gallery-item break-inside-avoid rounded-2xl overflow-hidden cursor-none group relative glass-card"
             style="animation-delay:<?= $i * .04 ?>s;"
             data-gallery-index="<?= $i ?>"
             data-src="<?= e($imgSrc) ?>"
             data-title="<?= e($ph['title']) ?>"
             data-caption="<?= e($ph['cat_name'] ?? '') ?>">

            <img src="<?= e($imgSrc) ?>" alt="<?= e($ph['title']) ?>"
                 loading="lazy" class="w-full object-cover lazy-blur"
                 style="min-height:120px; display:block;">

            <!-- Hover overlay -->
            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3"
                 style="background:linear-gradient(to top, rgba(8,12,20,.72), transparent);">
                <div class="flex-1 min-w-0">
                    <p class="text-white text-xs font-semibold line-clamp-1 mb-0.5">
                        <?= e($ph['title']) ?>
                    </p>
                    <?php if (!empty($ph['cat_name'])): ?>
                    <p style="color:rgba(255,255,255,.6); font-size:.65rem; letter-spacing:.06em; text-transform:uppercase;">
                        <?= e($ph['cat_name']) ?>
                    </p>
                    <?php endif; ?>
                </div>
                <div class="w-8 h-8 rounded-lg flex items-center justify-center ml-2 flex-shrink-0"
                     style="background:rgba(255,255,255,.18); backdrop-filter:blur(8px);">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        <line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/>
                    </svg>
                </div>
            </div>

            <!-- Featured badge -->
            <?php if ($ph['is_featured']): ?>
            <div class="absolute top-2 left-2">
                <span style="font-size:.62rem; padding:.2rem .55rem; border-radius:100px; font-weight:700;
                             background:rgba(212,175,55,.22); color:#92600a; border:1px solid rgba(212,175,55,.4);">
                    ★
                </span>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div><!-- /container -->


<!-- ============================================================
     GALLERY + LIGHTBOX JAVASCRIPT
     ============================================================ -->
<script>
(function () {
    'use strict';

    /* ── Data ────────────────────────────────────────────────── */
    const items   = Array.from(document.querySelectorAll('[data-gallery-index]'));
    const gallery = items.map(el => ({
        src:     el.dataset.src,
        title:   el.dataset.title   || '',
        caption: el.dataset.caption || '',
    }));

    let currentIdx = 0;
    let touchStartX = null;
    let isOpen = false;

    /* ── DOM refs ─────────────────────────────────────────────── */
    const lb       = document.getElementById('cinema-lightbox');
    const lbImg    = document.getElementById('lb-main-img');
    const lbTitle  = document.getElementById('lb-title');
    const lbCount  = document.getElementById('lb-counter');
    const lbThumbs = document.getElementById('lb-thumbs');
    const lbClose  = document.getElementById('lb-close-btn');
    const lbPrev   = document.getElementById('lb-prev');
    const lbNext   = document.getElementById('lb-next');

    /* ── Build thumbnails ─────────────────────────────────────── */
    function buildThumbs() {
        lbThumbs.innerHTML = gallery.map((g, i) => `
            <div class="lb-thumb" data-thumb="${i}">
                <img src="${g.src}" alt="${g.title}" loading="lazy">
            </div>
        `).join('');

        lbThumbs.querySelectorAll('[data-thumb]').forEach(t => {
            t.addEventListener('click', () => showImage(parseInt(t.dataset.thumb)));
        });
    }

    /* ── Show image ───────────────────────────────────────────── */
    function showImage(idx) {
        currentIdx = ((idx % gallery.length) + gallery.length) % gallery.length;
        const item = gallery[currentIdx];

        // Fade out image
        lbImg.classList.remove('lb-img-loaded');

        // Slight delay for transition
        setTimeout(() => {
            lbImg.src = item.src;
            lbImg.alt = item.title;

            // Caption
            lbTitle.textContent = item.title.toUpperCase();
            lbCount.textContent = `${currentIdx + 1}  /  ${gallery.length}`;

            // Active thumb
            lbThumbs.querySelectorAll('.lb-thumb').forEach((t, i) => {
                t.classList.toggle('active', i === currentIdx);
                if (i === currentIdx) {
                    t.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                }
            });
        }, 80);

        // Fade in when loaded
        lbImg.onload = () => {
            lbImg.classList.add('lb-img-loaded');
        };
        if (lbImg.complete && lbImg.src === item.src) {
            lbImg.classList.add('lb-img-loaded');
        }
    }

    /* ── Open ─────────────────────────────────────────────────── */
    function open(idx) {
        isOpen = true;
        buildThumbs();
        lb.classList.add('lb-open');
        document.body.style.overflow = 'hidden';
        if (window.lenis) window.lenis.stop();
        showImage(idx);

        // Focus trap
        setTimeout(() => lbClose?.focus(), 100);
    }

    /* ── Close ────────────────────────────────────────────────── */
    function close() {
        isOpen = false;
        lb.classList.remove('lb-open');
        lbImg.classList.remove('lb-img-loaded');
        document.body.style.overflow = '';
        if (window.lenis) window.lenis.start();

        // Clear src after transition
        setTimeout(() => { if (!isOpen) lbImg.src = ''; }, 550);
    }

    /* ── Navigate ─────────────────────────────────────────────── */
    function prev() { showImage(currentIdx - 1); }
    function next() { showImage(currentIdx + 1); }

    /* ── Event listeners ──────────────────────────────────────── */

    // Gallery item click
    items.forEach((el, i) => {
        el.addEventListener('click', () => open(i));
    });

    // Controls
    lbClose?.addEventListener('click', close);
    lbPrev?.addEventListener('click', prev);
    lbNext?.addEventListener('click', next);

    // Background click to close
    lb.addEventListener('click', e => {
        if (e.target === lb || e.target === document.getElementById('lb-stage')) close();
    });

    // Keyboard
    document.addEventListener('keydown', e => {
        if (!isOpen) return;
        if (e.key === 'Escape')      close();
        if (e.key === 'ArrowLeft')   prev();
        if (e.key === 'ArrowRight')  next();
    });

    // Touch / Swipe
    lb.addEventListener('touchstart', e => {
        touchStartX = e.touches[0].clientX;
    }, { passive: true });

    lb.addEventListener('touchend', e => {
        if (touchStartX === null) return;
        const delta = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(delta) > 50) delta < 0 ? next() : prev();
        touchStartX = null;
    }, { passive: true });

    // Expose lenis reference for stop/start
    document.addEventListener('DOMContentLoaded', () => {
        // Lenis is initialized in footer.php's inline script
        // We access it via the global if available
        if (typeof Lenis !== 'undefined') {
            // Already handled in footer.php global script
        }
    });

})();
</script>

<?php require_once ROOT_PATH . 'footer.php'; ?>