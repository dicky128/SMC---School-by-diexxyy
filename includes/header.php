<?php
/**
 * includes/header.php — Versi Final Premium
 * SD Muhammadiyah 01 Gentasari
 * Improvement: Floating pill navbar, Instrument Serif, neutral chrome, no pink UI
 */

// ROOT_PATH
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__) . '/');
}

require_once ROOT_PATH . '/config.php';
if (!function_exists('formatDate')) {
    require_once ROOT_PATH . 'functions.php';
}

// Variabel default
$pageTitle     = $pageTitle     ?? APP_NAME;
$pageDesc      = $pageDesc      ?? 'Website resmi ' . APP_NAME;
$activePage    = $activePage    ?? '';
$pageHeroTitle = $pageHeroTitle ?? $pageTitle;
$pageHeroSub   = $pageHeroSub   ?? '';
$pageHeroLabel = $pageHeroLabel ?? '';
$pageHeroColor = $pageHeroColor ?? 'gold';

// Ambil profil sekolah
try {
    $profileData = db()->query("SELECT * FROM school_profile LIMIT 1")->fetch() ?: [];
    $logoSrc     = !empty($profileData['logo']) ? UPLOAD_URL . 'logos/' . $profileData['logo'] : null;
    $siteName    = $profileData['school_name'] ?? APP_NAME;
    $desa        = $profileData['district'] ?? 'Kroya';
    $kota        = $profileData['city'] ?? 'Cilacap';
    $schoolAddress = $desa . ' · ' . $kota;
    $tahunBerdiri  = $profileData['tahun_berdiri'] ?? '1962';
} catch (Exception $e) {
    $profileData = [];
    $logoSrc     = null;
    $siteName    = APP_NAME;
    $schoolAddress = '';
    $tahunBerdiri  = '1962';
}

$labelClass = [
    'pink' => 'section-label-pink',
    'gold' => 'section-label-gold',
    'sky'  => 'section-label-sky',
];
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= e($pageDesc) ?>">
    <title><?= e($pageTitle) ?> — <?= e($siteName) ?></title>

    <!-- Open Graph -->
    <meta property="og:title"       content="<?= e($pageTitle) ?> — <?= e($siteName) ?>">
    <meta property="og:description" content="<?= e($pageDesc) ?>">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="<?= APP_URL ?>">
    <?php if ($logoSrc): ?>
    <meta property="og:image"       content="<?= e($logoSrc) ?>">
    <?php endif; ?>
    <meta name="twitter:card"       content="summary_large_image">

    <!-- Fonts: Instrument Serif (display) + Plus Jakarta Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Instrument Serif"', 'Georgia', 'serif'],
                        body:    ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        gold: {
                            100: '#fef9e7',
                            300: '#fce08f',
                            400: '#e8c860',
                            500: '#d4af37',
                            600: '#b48608',
                            700: '#92600a',
                        },
                        primary: {
                            50:  '#f8fafc',
                            100: '#f1f5f9',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        cream: '#ffffff',
                    }
                }
            }
        }
    </script>

    <!-- Icons & Alerts -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Premium CSS -->
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/light3d.css">
    <link rel="stylesheet"
      href="<?= APP_URL ?>/assets/css/neo-future-system.css">
    <link rel="stylesheet"
      href="<?= APP_URL ?>/assets/css/neo-future-atmosphere.css">
    <link rel="stylesheet"
      href="<?= APP_URL ?>/assets/css/neo-future-cards.css">
    <link rel="stylesheet"
      href="<?= APP_URL ?>/assets/css/neo-future-cursor.css">
    <link rel="stylesheet"
      href="<?= APP_URL ?>/assets/css/neo-future-loader.css">

    <style>
        /* Base font override */
        * { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display {
            font-family: 'Instrument Serif', Georgia, serif;
        }

        /* Dropdown glitch fix */
        .dropdown-menu-light {
            pointer-events: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px) scale(0.97);
            transition: opacity .22s cubic-bezier(.16,1,.3,1),
                        transform .22s cubic-bezier(.16,1,.3,1),
                        visibility .22s;
            will-change: transform, opacity;
        }
        .dropdown:hover .dropdown-menu-light {
            pointer-events: auto;
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        /* Mobile menu slide */
        #mobile-menu { transform: translateX(100%); transition: transform .38s cubic-bezier(.16,1,.3,1); }
        #mobile-menu.open { transform: translateX(0); }

        /* fadeUp keyframe for hero */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="light-mode bg-white overflow-x-hidden">

<?php include ROOT_PATH . 'includes/components/futuristic-loader.php'; ?>

<!-- Scroll Progress Bar -->
<div id="scroll-progress"></div>

<!-- Custom Cursor -->
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>

<!-- ============================================================
     NAVBAR — Floating Pill Premium
     ============================================================ -->
<nav id="navbar" class="navbar-light transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-5">
        <div class="flex items-center justify-between" style="height:58px; transition: height .3s cubic-bezier(.22,1,.36,1);">

            <!-- Logo -->
            <a href="<?= APP_URL ?>/index.php" class="flex items-center gap-3 group flex-shrink-0">
                <?php if ($logoSrc): ?>
                    <img src="<?= $logoSrc ?>" alt="Logo <?= e($siteName) ?>"
                         class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
                <?php else: ?>
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform"
                         style="background: linear-gradient(135deg, #d4af37, #b48608); border: 1px solid rgba(212,175,55,.3);">
                        <span style="font-family:'Instrument Serif',serif; color:#fff; font-weight:700; font-size:1rem;">م</span>
                    </div>
                <?php endif; ?>
                <div class="hidden sm:block">
                    <div class="text-sm font-semibold leading-tight" style="color:#0f172a;"><?= e($siteName) ?></div>
                    <div class="text-[9px] tracking-widest uppercase font-bold" style="color:#94a3b8; letter-spacing:.15em;"><?= e($schoolAddress) ?></div>
                </div>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center gap-7">
                <a href="<?= APP_URL ?>/index.php"
                   class="nav-link-light <?= $activePage === 'beranda' ? 'active' : '' ?>">Beranda</a>

                <?php
                $menuItems = [
                    ['Profil',    ['sekolah','guru','siswa'],
                     [
                       [APP_URL.'/pages/profile/sekolah.php',    'building-2',    'Profil Sekolah'],
                       [APP_URL.'/pages/profile/guru-staff.php', 'users',         'Guru & Staff'],
                       [APP_URL.'/pages/profile/siswa.php',      'graduation-cap','Siswa'],
                     ]
                    ],
                    ['Media',     ['galeri','fasilitas'],
                     [
                       [APP_URL.'/pages/media/galeri.php',    'image',       'Galeri Foto'],
                       [APP_URL.'/pages/media/fasilitas.php', 'layout-grid', 'Fasilitas'],
                     ]
                    ],
                    ['Aktivitas', ['ekskul','pengumuman'],
                     [
                       [APP_URL.'/pages/aktivitas/ekskul.php',      'sparkles', 'Ekstrakurikuler'],
                       [APP_URL.'/pages/aktivitas/pengumuman.php',  'bell',     'Pengumuman'],
                     ]
                    ],
                ];
                foreach ($menuItems as [$label, $subs, $links]): ?>
                <div class="dropdown relative group">
                    <button class="nav-link-light outline-none focus:outline-none flex items-center gap-1 <?= in_array($activePage, $subs) ? 'active' : '' ?>">
                        <?= $label ?>
                        <i data-lucide="chevron-down"
                           class="w-3 h-3 opacity-40 mt-0.5 transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>
                    <div class="dropdown-menu-light absolute top-full left-1/2 -translate-x-1/2 pt-4 w-52">
                        <div class="rounded-2xl overflow-hidden shadow-xl py-2"
                             style="background:rgba(255,255,255,0.96); backdrop-filter:blur(20px); border:1px solid rgba(0,0,0,0.06);">
                            <?php foreach ($links as $l): ?>
                            <a href="<?= $l[0] ?>" class="dropdown-item-light">
                                <i data-lucide="<?= $l[1] ?>" class="w-4 h-4 item-icon"></i>
                                <?= $l[2] ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <a href="<?= APP_URL ?>/pages/interaksi/kontak.php"
                   class="nav-link-light <?= $activePage === 'kontak' ? 'active' : '' ?>">Kontak</a>

                <a href="<?= APP_URL ?>/pages/interaksi/pengaduan.php"
                   class="btn-primary-light !px-5 !py-2 !text-[.72rem] ml-1">
                    <i data-lucide="send" class="w-3.5 h-3.5"></i> Pengaduan
                </a>
            </div>

            <!-- Hamburger (mobile) -->
            <button id="hamburger" class="lg:hidden w-10 h-10 rounded-xl flex items-center justify-center transition-all"
                    style="background:rgba(0,0,0,0.05); border:1px solid rgba(0,0,0,0.08);"
                    aria-label="Buka menu">
                <i data-lucide="menu" class="w-5 h-5" style="color:#475569;"></i>
            </button>

        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="menu-overlay" class="fixed inset-0 z-[55] hidden" style="background:rgba(0,0,0,0.35); backdrop-filter:blur(4px);"></div>

<!-- Mobile Menu Panel -->
<div id="mobile-menu" class="fixed inset-y-0 right-0 w-80 z-[60] flex flex-col shadow-2xl"
     style="background:rgba(255,255,255,0.98); backdrop-filter:blur(24px); border-left:1px solid rgba(0,0,0,0.06);">

    <!-- Mobile menu header -->
    <div class="flex items-center justify-between px-5 py-4" style="border-bottom:1px solid rgba(0,0,0,0.06);">
        <div class="flex items-center gap-2.5">
            <?php if ($logoSrc): ?>
                <img src="<?= $logoSrc ?>" alt="Logo" class="w-7 h-7 object-contain">
            <?php endif; ?>
            <span style="font-family:'Instrument Serif',serif; font-size:1.05rem; color:#0f172a; letter-spacing:-0.01em;">
                Navigasi
            </span>
        </div>
        <button id="close-menu" class="w-9 h-9 rounded-xl flex items-center justify-center transition-all"
                style="background:rgba(0,0,0,0.04); border:1px solid rgba(0,0,0,0.07);"
                aria-label="Tutup menu">
            <i data-lucide="x" class="w-4 h-4" style="color:#64748b;"></i>
        </button>
    </div>

    <!-- Mobile nav links -->
    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-0.5">
        <?php
        $mobileLinks = [
            ['index.php',                              'home',                    'Beranda'],
            ['pages/profile/sekolah.php',              'building-2',              'Profil Sekolah'],
            ['pages/profile/guru-staff.php',           'users',                   'Guru & Staff'],
            ['pages/profile/siswa.php',                'graduation-cap',          'Siswa'],
            ['pages/media/galeri.php',                 'image',                   'Galeri Foto'],
            ['pages/media/fasilitas.php',              'layout-grid',             'Fasilitas'],
            ['pages/aktivitas/ekskul.php',             'sparkles',                'Ekstrakurikuler'],
            ['pages/aktivitas/pengumuman.php',         'bell',                    'Pengumuman'],
            ['pages/interaksi/pengaduan.php',          'message-square-warning',  'Pengaduan'],
            ['pages/interaksi/kontak.php',             'mail',                    'Kontak Kami'],
        ];
        foreach ($mobileLinks as $ml): ?>
        <a href="<?= APP_URL . '/' . $ml[0] ?>"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all"
           style="color:#334155;"
           onmouseover="this.style.background='#f8fafc'; this.style.color='#0f172a'"
           onmouseout="this.style.background=''; this.style.color='#334155'">
            <i data-lucide="<?= $ml[1] ?>" class="w-4 h-4 flex-shrink-0" style="color:#94a3b8;"></i>
            <?= $ml[2] ?>
        </a>
        <?php endforeach; ?>
    </nav>

    <!-- Mobile menu footer -->
    <div class="px-4 py-4" style="border-top:1px solid rgba(0,0,0,0.06);">
        <a href="<?= APP_URL ?>/pages/interaksi/pengaduan.php" class="btn-primary-light w-full justify-center">
            <i data-lucide="send" class="w-3.5 h-3.5"></i> Kirim Pengaduan
        </a>
        <div class="mt-3 text-center text-[10px] tracking-widest uppercase" style="color:#cbd5e1;">
            Akreditasi A · <?= e($tahunBerdiri) ?> — <?= date('Y') ?>
        </div>
    </div>
</div>

<!-- Page content wrapper -->
<div class="page-wrapper <?= $activePage === 'beranda' ? '' : 'pt-20 md:pt-24' ?>">
<?php if ($activePage !== 'beranda'): ?>
<section class="page-hero-light relative overflow-hidden py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs mb-5" style="color:#94a3b8; opacity:0; animation:fadeUp .6s ease forwards;">
            <a href="<?= APP_URL ?>/index.php"
               class="transition-colors hover:text-gold-600" style="color:inherit;">Beranda</a>
            <i data-lucide="chevron-right" class="w-3 h-3"></i>
            <?php if (!empty($breadcrumbParent)): ?>
            <span><?= e($breadcrumbParent) ?></span>
            <i data-lucide="chevron-right" class="w-3 h-3"></i>
            <?php endif; ?>
            <span style="color:#d4af37; font-weight:600;"><?= e($pageTitle) ?></span>
        </nav>

        <!-- Section label -->
        <?php if ($pageHeroLabel): ?>
        <div class="mb-3" style="opacity:0; animation:fadeUp .6s .1s ease forwards;">
            <span class="section-label <?= $labelClass[$pageHeroColor] ?? 'section-label-gold' ?>">
                <?= e($pageHeroLabel) ?>
            </span>
        </div>
        <?php endif; ?>

        <!-- Title -->
        <h1 class="font-display font-bold mb-4"
            style="font-size:clamp(2.2rem, 5vw, 3.6rem); line-height:1.08; letter-spacing:-0.02em; color:#0f172a;
                   opacity:0; animation:fadeUp .7s .15s ease forwards;">
            <?= e($pageHeroTitle) ?>
        </h1>

        <!-- Subtitle -->
        <?php if ($pageHeroSub): ?>
        <p class="font-light max-w-2xl leading-relaxed"
           style="font-size:1.05rem; color:#64748b; opacity:0; animation:fadeUp .7s .25s ease forwards;">
            <?= e($pageHeroSub) ?>
        </p>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>

<main>