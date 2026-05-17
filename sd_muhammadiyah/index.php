<?php
/**
 * index.php — Halaman Utama Publik
 * SD Muhammadiyah 1 Gentasari
 * ─────────────────────────────────────────────────────────────────────────────
 */
require_once __DIR__ . '/includes/config.php';

// 1. Ambil data profil & pengaturan dinamis
try {
    // Fungsi get_setting() mengambil data dari tabel 'settings'
    $school_name = get_setting($pdo, 'school_name') ?: 'SD Muhammadiyah 1 Gentasari';
    $hero_title  = get_setting($pdo, 'hero_title')  ?: 'Membentuk Generasi Qurani';
    $hero_sub    = get_setting($pdo, 'hero_subtitle') ?: 'Cerdas, Berkarakter, dan Berakhlak Mulia';
    
    // Statistik (Dinamis dari CMS)
    $stat_students = get_setting($pdo, 'stats_students') ?: '380';
    $stat_teachers = get_setting($pdo, 'stats_teachers') ?: '24';
    
    // Ambil Pengumuman terbaru (limit 4)[cite: 5]
    $announcements = $pdo->query("SELECT * FROM announcements WHERE is_published = 1 ORDER BY published_at DESC LIMIT 4")->fetchAll();
    
    // Ambil Profil Sekolah[cite: 5]
    $profile = $pdo->query("SELECT * FROM school_profile LIMIT 1")->fetch() ?: [];
} catch (Exception $e) {
    // Fallback jika database belum siap
    $school_name = "SD Muhammadiyah 1 Gentasari";
    $announcements = [];
}
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($school_name) ?> — Official Website</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;600&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Custom CSS (Wajib dipanggil terakhir)[cite: 2] -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-black text-white selection:bg-gold-500/30">

    <!-- NAVBAR GLASSMORPHISM[cite: 5] -->
    <nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-500">
        <div id="navbar-inner" class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="index.php" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl glass-card flex items-center justify-center border-gold-500/30">
                    <span class="text-gold-400 font-display font-bold text-xl">ص</span>
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-xs tracking-[0.2em] uppercase font-bold text-white"><?= htmlspecialchars($school_name) ?></h1>
                    <p class="text-[9px] tracking-widest text-gold-500 uppercase">Gentasari · Cilacap</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="index.php" class="nav-link active">Beranda</a>
                <div class="dropdown relative group">
                    <button class="nav-link flex items-center gap-1">Profil <i data-lucide="chevron-down" class="w-3 h-3"></i></button>
                    <div class="dropdown-menu absolute top-full left-0 mt-2 w-48 glass-card rounded-2xl overflow-hidden p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                        <a href="pages/profile/sekolah.php" class="block p-3 text-xs hover:bg-white/10 rounded-xl">Profil Sekolah</a>
                        <a href="pages/profile/guru-staff.php" class="block p-3 text-xs hover:bg-white/10 rounded-xl">Guru & Staff</a>
                    </div>
                </div>
                <a href="pages/aktivitas/pengumuman.php" class="nav-link">Pengumuman</a>
                <a href="pages/interaksi/kontak.php" class="btn-premium text-[10px] uppercase font-bold">Hubungi Kami</a>
            </div>
            
            <!-- Mobile Toggle -->
            <button id="hamburger" class="lg:hidden text-white"><i data-lucide="menu"></i></button>
        </div>
    </nav>

    <!-- HERO SECTION[cite: 5] -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden hero-bg">
        <div class="absolute inset-0 bg-black/50 z-0"></div>
        
        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center reveal">
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="h-px w-8 bg-gold-500"></div>
                <span class="text-gold-400 text-xs tracking-[0.3em] uppercase">Terakreditasi A</span>
                <div class="h-px w-8 bg-gold-500"></div>
            </div>
            <h1 class="text-6xl md:text-8xl font-display leading-tight mb-6">
                <?= htmlspecialchars($hero_title) ?> <br>
                <em class="text-shimmer not-italic">Terpercaya.</em>
            </h1>
            <p class="text-white/60 text-lg max-w-2xl mx-auto mb-10 font-light">
                <?= htmlspecialchars($hero_sub) ?>
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#visi" class="btn-premium bg-gold-500 text-black border-none">Kenali Kami</a>
                <a href="pages/aktivitas/pengumuman.php" class="btn-premium">Info Terkini</a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce opacity-40">
            <i data-lucide="chevron-down"></i>
        </div>
    </section>

    <!-- STATS BAR[cite: 5] -->
    <div class="relative z-20 -mt-16 max-w-6xl mx-auto px-6">
        <div class="glass-card grid grid-cols-2 md:grid-cols-4 rounded-3xl overflow-hidden border-white/10">
            <div class="p-8 text-center border-r border-white/5">
                <h3 class="text-3xl font-display text-gold-400" data-counter="<?= $stat_students ?>"><?= $stat_students ?></h3>
                <p class="text-[10px] uppercase tracking-widest text-white/40 mt-1">Siswa Aktif</p>
            </div>
            <div class="p-8 text-center border-r border-white/5">
                <h3 class="text-3xl font-display text-gold-400" data-counter="<?= $stat_teachers ?>"><?= $stat_teachers ?></h3>
                <p class="text-[10px] uppercase tracking-widest text-white/40 mt-1">Tenaga Pendidik</p>
            </div>
            <div class="p-8 text-center border-r border-white/5">
                <h3 class="text-3xl font-display text-gold-400" data-counter="62">62</h3>
                <p class="text-[10px] uppercase tracking-widest text-white/40 mt-1">Tahun Berdiri</p>
            </div>
            <div class="p-8 text-center">
                <h3 class="text-3xl font-display text-gold-400" data-counter="12">12</h3>
                <p class="text-[10px] uppercase tracking-widest text-white/40 mt-1">Ekstrakurikuler</p>
            </div>
        </div>
    </div>

    <!-- ANNOUNCEMENT PREVIEW[cite: 5] -->
    <section class="py-24 max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-12 reveal">
            <div>
                <h2 class="text-4xl font-display text-shimmer">Pengumuman <br> <span class="text-white">Terbaru</span></h2>
            </div>
            <a href="pages/aktivitas/pengumuman.php" class="text-xs text-gold-500 uppercase tracking-widest border-b border-gold-500/30 pb-1 hover:text-white transition-all">Lihat Semua</a>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <?php foreach ($announcements as $ann): ?>
            <a href="pages/aktivitas/pengumuman.php?id=<?= $ann['id'] ?>" class="glass-card p-6 rounded-2xl flex items-center justify-between group reveal">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center group-hover:bg-gold-500/20 transition-all">
                        <i data-lucide="bell" class="w-5 h-5 text-gold-400"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold group-hover:text-gold-400 transition-all"><?= htmlspecialchars($ann['title']) ?></h4>
                        <p class="text-[10px] text-white/40 mt-1"><?= date('d F Y', strtotime($ann['published_at'])) ?></p>
                    </div>
                </div>
                <?= get_badge_new($ann['published_at']) ?> <!-- Fungsi dari config.php -->
            </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- FOOTER[cite: 5] -->
    <footer class="bg-zinc-950 border-t border-white/5 py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12">
            <div>
                <h4 class="font-display text-2xl text-gold-400 mb-4"><?= htmlspecialchars($school_name) ?></h4>
                <p class="text-sm text-white/40 leading-relaxed"><?= htmlspecialchars($profile['school_address'] ?? 'Gentasari, Cilacap') ?></p>
            </div>
            <div>
                <h5 class="text-xs uppercase tracking-widest text-white/20 mb-6">Navigasi</h5>
                <ul class="space-y-3 text-sm text-white/60">
                    <li><a href="pages/profile/sekolah.php" class="hover:text-gold-400 transition-all">Profil Sekolah</a></li>
                    <li><a href="pages/aktivitas/pengumuman.php" class="hover:text-gold-400 transition-all">Pengumuman</a></li>
                    <li><a href="admin/login.php" class="hover:text-gold-400 transition-all">Admin Login</a></li>
                </ul>
            </div>
            <div class="text-right">
                <p class="text-[10px] text-white/20 uppercase tracking-widest">&copy; <?= date('Y') ?> SD Muhammadiyah 1 Gentasari</p>
                <p class="text-[10px] text-white/10 mt-2 italic">Crafted for Excellence</p>
            </div>
        </div>
    </footer>

    <!-- Scripts (Wajib panggil terakhir)[cite: 1] -->
    <!-- 1. Library tambahan -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>