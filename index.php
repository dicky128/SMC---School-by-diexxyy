<?php
require_once __DIR__ . '/includes/config.php';

// 1. Ambil data database
try {
    $profile       = db()->query("SELECT * FROM school_profile LIMIT 1")->fetch() ?: [];
    $siswa         = db()->query("SELECT SUM(`count`) FROM student_stats")->fetchColumn() ?: 0;
    $guru          = db()->query("SELECT COUNT(*) FROM teachers WHERE is_active = 1")->fetchColumn() ?: 0;
    $announcements = db()->query("SELECT * FROM announcements WHERE is_published=1 ORDER BY is_pinned DESC, published_at DESC LIMIT 4")->fetchAll();
    $facilities    = db()->query("SELECT * FROM facilities WHERE `condition`='baik' ORDER BY sort_order LIMIT 6")->fetchAll();
    $ekskuls       = db()->query("SELECT * FROM extracurricular WHERE is_active=1 ORDER BY sort_order LIMIT 6")->fetchAll();
    $galleryFeatured = db()->query("SELECT g.*, gc.name AS cat_name FROM gallery g LEFT JOIN gallery_categories gc ON g.category_id=gc.id WHERE g.is_featured=1 ORDER BY g.sort_order LIMIT 6")->fetchAll();
} catch (Exception $e) {
    $profile = $announcements = $facilities = $ekskuls = $galleryFeatured = [];
    $siswa = $guru = 0;
}

// 2. Header variables
$activePage  = 'beranda';
$pageTitle   = 'Beranda';

$siteName    = $profile['school_name'] ?? APP_NAME;
$heroTitle   = setting('hero_title', 'Sekolah Dasar Islam Unggulan');
$heroSub     = setting('hero_subtitle', 'Membentuk Generasi Cerdas Berakhlak Mulia');
$TeksTombol1 = setting('hero_cta_primary', 'Tentang Kami');
$TeksTombol2 = setting('hero_cta_secondary', 'Kontak Kami');

$statStudents = (int)$siswa;
$statTeachers = (int)$guru;
$statYears    = !empty($profile['tahun_berdiri']) ? (date('Y') - $profile['tahun_berdiri']) : 0;
$statEkskul   = $ekskuls ? count($ekskuls) : 0;
$logoSrc      = !empty($profile['logo']) ? UPLOAD_URL . 'logos/' . $profile['logo'] : null;

// 3. Hero image — dark cinematic overlay
$heroSetting = setting('hero_image');
$heroProfile = $profile['hero_image'] ?? null;

if (!empty($heroProfile)) {
    $heroImageUrl = UPLOAD_URL . 'heroes/' . $heroProfile;
} elseif (!empty($heroSetting) && $heroSetting !== 'assets/images/hero-default.jpg') {
    $heroImageUrl = UPLOAD_URL . 'heroes/' . $heroSetting;
} else {
    $heroImageUrl = UPLOAD_URL . 'heroes/img_6a041288 8b3ab7.58594022.jpg';
}

// Dark cinematic overlay — replaces pink-tinted overlay
$heroStyle = "background: linear-gradient(160deg, rgba(8,12,20,0.58) 0%, rgba(8,12,20,0.20) 55%, rgba(8,12,20,0.48) 100%), url('" . $heroImageUrl . "') center/cover no-repeat fixed; min-height:100svh;";

// Category label map
$catLabel = [
    'penting'  => 'section-label-pink',
    'akademik' => 'section-label-sky',
    'kegiatan' => 'section-label-gold',
    'umum'     => 'section-label-slate',
];

// 4. Panggil header
require_once __DIR__ . '/includes/header.php';
?>

<!-- ============================================================
     HERO — Cinematic Dark Overlay
     ============================================================ -->
<section class="relative" id="hero" style="<?= $heroStyle ?>">

    <!-- Subtle warm orbs — reduced size & opacity -->
    <div class="orb orb-cream w-56 h-56 orb-parallax animate-float-y" data-speed="0.10"
         style="top:-8%;right:-3%;opacity:.5;"></div>
    <div class="orb orb-gold w-48 h-48 orb-parallax animate-float-diagonal" data-speed="0.07"
         style="bottom:18%;left:-4%;animation-delay:2s;opacity:.6;"></div>

    <!-- Main content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full"
         style="min-height:100svh; display:flex; align-items:center; padding-top:6rem; padding-bottom:9rem;">
        <div class="grid lg:grid-cols-2 gap-16 items-center w-full">

            <!-- LEFT: Copy -->
            <div>
                <!-- Eyebrow label -->
                <div class="flex items-center gap-3 mb-6"
                     style="opacity:0; animation:fadeUp .8s .1s ease forwards;">
                    <span class="section-label section-label-light">
                        <i data-lucide="star" class="w-3 h-3"></i>
                        Akreditasi A · Est. <?= e($profile['tahun_berdiri'] ?? '1962') ?>
                    </span>
                </div>

                <!-- Section number — editorial touch -->
                <div class="mb-3" style="opacity:0; animation:fadeUp .8s .15s ease forwards;">
                    <span style="font-size:.65rem; font-weight:700; letter-spacing:.24em; color:rgba(255,255,255,.32); text-transform:uppercase;">
                        01 — Selamat Datang
                    </span>
                </div>

                <!-- Headline -->
                <h1 class="font-display font-bold text-white mb-3"
                    style="font-size:clamp(2.8rem,6.5vw,5.2rem); line-height:1.03; letter-spacing:-0.03em;
                           opacity:0; animation:fadeUp .9s .2s ease forwards;">
                    <?= e($heroTitle) ?>
                </h1>
                <h2 class="font-display mb-8"
                    style="font-size:clamp(2.2rem,5vw,4rem); line-height:1.05; letter-spacing:-0.03em;
                           color:rgba(255,255,255,.55); font-style:italic;
                           opacity:0; animation:fadeUp .9s .3s ease forwards;">
                    Terpercaya.
                </h2>

                <!-- Subtitle -->
                <p class="font-light leading-relaxed max-w-lg mb-10"
                   style="font-size:1.05rem; color:rgba(255,255,255,.62);
                          opacity:0; animation:fadeUp .9s .4s ease forwards;">
                    <?= e($heroSub) ?> — di bawah naungan
                    <span style="color:rgba(255,255,255,.85); font-weight:600;">Persyarikatan Muhammadiyah</span>.
                </p>

                <!-- CTAs -->
                <div class="flex flex-wrap gap-4"
                     style="opacity:0; animation:fadeUp .9s .5s ease forwards;">
                    <a href="pages/profile/sekolah.php" class="btn-primary-light group">
                        <?= e($TeksTombol1) ?>
                        <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                    </a>
                    <a href="pages/interaksi/kontak.php" class="btn-hero-outline">
                        <i data-lucide="phone" class="w-4 h-4"></i>
                        <?= e($TeksTombol2) ?>
                    </a>
                </div>
            </div>

            <!-- RIGHT: Floating Info Cards (hidden on mobile/tablet) -->
            <div class="hero-tilt-area relative hidden lg:block" style="height:440px; opacity:0; animation:fadeUp 1s .55s ease forwards;">

                <!-- Card 1 — Program Unggulan -->
                <div class="tilt-card absolute" style="width:270px; top:60px; left:80px; transform:rotate(-6deg);">
                    <div class="tilt-inner glass-card glass-card-sky p-5 rounded-2xl"
                         style="backdrop-filter:blur(16px); background:rgba(240,249,255,.88);">
                        <div class="tilt-shine"></div>
                        <div class="icon-badge icon-badge-sky mb-3">
                            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                        </div>
                        <p class="font-display text-lg font-semibold mb-1" style="color:#0369a1;">Program Unggulan</p>
                        <p style="color:#64748b; font-size:.8rem;">Kurikulum integratif islami</p>
                    </div>
                </div>

                <!-- Card 2 — Prestasi -->
                <div class="tilt-card absolute" style="width:290px; top:100px; left:5px; transform:rotate(4deg);">
                    <div class="tilt-inner glass-card glass-card-gold p-5 rounded-2xl"
                         style="backdrop-filter:blur(16px); background:rgba(254,249,231,.88);">
                        <div class="tilt-shine"></div>
                        <div class="icon-badge icon-badge-gold mb-3">
                            <i data-lucide="trophy" class="w-5 h-5"></i>
                        </div>
                        <p class="font-display text-lg font-semibold mb-1" style="color:#92600a;">Prestasi Nasional</p>
                        <p style="color:#64748b; font-size:.8rem;">Juara olimpiade sains & seni</p>
                    </div>
                </div>

                <!-- Card 3 — School Identity (top card) -->
                <div class="tilt-card absolute" style="width:310px; top:5px; left:40px;">
                    <div class="tilt-inner glass-card p-6 rounded-2xl"
                         style="backdrop-filter:blur(16px); background:rgba(255,255,255,.84);
                                box-shadow:0 20px 50px rgba(0,0,0,.15);">
                        <div class="tilt-shine"></div>
                        <div class="icon-badge icon-badge-gold mb-4">
                            <i data-lucide="heart" class="w-5 h-5"></i>
                        </div>
                        <p class="font-display text-xl font-semibold mb-0.5" style="color:#0f172a;">
                            <?= e($siteName) ?>
                        </p>
                        <p style="color:#94a3b8; font-size:.75rem; margin-bottom:1rem;">Gentasari, Kroya, Cilacap</p>
                        <div style="border-top:1px solid rgba(0,0,0,.06); padding-top:.75rem; display:flex; justify-content:space-between; align-items:center;">
                            <span style="font-size:.72rem; color:#94a3b8;">Siswa Aktif</span>
                            <span class="font-display font-bold text-2xl text-gradient-slate-gold">
                                <?= e($statStudents) ?>+
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Floating badge chips -->
                <div class="absolute animate-float-y" style="top:0; right:0; animation-delay:.8s;">
                    <div class="hero-badge-chip">⭐ Akreditasi A</div>
                </div>
                <div class="absolute animate-float-diagonal" style="bottom:60px; right:10px; animation-delay:2.2s;">
                    <div class="hero-badge-chip">🏫 Pilihan Keluarga</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Stats Bar — Dark glass variant -->
    <div class="absolute bottom-0 left-0 right-0 z-10 hero-stats-bar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4">
                <?php foreach([
                    ['users',          $statStudents, 'Siswa Aktif',       '+'],
                    ['graduation-cap', $statTeachers, 'Tenaga Pendidik',   ''],
                    ['calendar',       $statYears,    'Tahun Berdiri',     ' Thn'],
                    ['sparkles',       $statEkskul,   'Ekstrakurikuler',   ''],
                ] as $s): ?>
                <div class="hero-stat-item flex items-center gap-4 px-5 py-4 cursor-default"
                     style="border-right:1px solid rgba(255,255,255,.10);">
                    <div style="width:36px;height:36px;border-radius:10px;background:rgba(255,255,255,.10);border:1px solid rgba(255,255,255,.15); display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i data-lucide="<?= $s[0] ?>" class="w-4 h-4" style="color:rgba(255,255,255,.7);"></i>
                    </div>
                    <div>
                        <div class="font-display font-bold leading-none mb-0.5"
                             style="font-size:1.35rem; color:#fff;">
                            <span data-count="<?= e($s[1]) ?>">0</span><?= e($s[3]) ?>
                        </div>
                        <div style="font-size:.68rem; color:rgba(255,255,255,.45); letter-spacing:.05em;"><?= e($s[2]) ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute z-10 scroll-indicator" style="bottom:7rem; left:50%; transform:translateX(-50%); animation:fadeUp 1s 1s ease forwards; opacity:0;">
        <span class="scroll-indicator-text">Scroll</span>
        <div class="scroll-indicator-mouse">
            <div class="scroll-indicator-dot"></div>
        </div>
    </div>
</section>


<!-- ============================================================
     VISI & MISI
     ============================================================ -->
<?php if (!empty($profile['visi']) || !empty($profile['misi'])): ?>
<section class="depth-section py-24 relative overflow-hidden" style="background:#f8fafc;">
    <div class="orb orb-cream w-72 h-72 orb-parallax opacity-60" data-speed="0.06" style="top:-8%;right:3%;"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Section header -->
        <div class="text-center mb-16">
            <div style="font-size:.63rem;font-weight:700;letter-spacing:.24em;color:#94a3b8;text-transform:uppercase;margin-bottom:1rem;" class="reveal-fade">
                02 — Landasan Kami
            </div>
            <div class="flex items-center justify-center gap-4 mb-5 reveal-fade">
                <div class="ornament-line"></div>
                <span class="section-label section-label-gold">Landasan Kami</span>
                <div class="ornament-line"></div>
            </div>
            <h2 class="font-display font-bold reveal-heading"
                style="font-size:clamp(2rem,4vw,3.2rem); color:#0f172a; letter-spacing:-0.02em;">
                Visi & <em style="font-style:italic; color:#d4af37;">Misi</em>
            </h2>
        </div>

        <!-- Cards -->
        <div class="grid lg:grid-cols-2 gap-8 stagger-grid">
            <?php foreach([
                ['visi', 'eye',    'Visi', 'glass-card-sky',  'icon-badge-sky',  '#0369a1'],
                ['misi', 'target', 'Misi', 'glass-card-gold', 'icon-badge-gold', '#92600a'],
            ] as $vm):
                if (empty($profile[$vm[0]])) continue; ?>
            <div class="tilt-card glass-card <?= $vm[3] ?> rounded-3xl p-8 lg:p-10">
                <div class="tilt-inner">
                    <div class="tilt-shine"></div>
                    <div class="flex items-start gap-5">
                        <div class="icon-badge <?= $vm[4] ?> flex-shrink-0 mt-1">
                            <i data-lucide="<?= $vm[1] ?>" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-display text-2xl font-semibold mb-3" style="color:<?= $vm[5] ?>;">
                                <?= $vm[2] ?>
                            </h3>
                            <p class="text-gray-600 font-light leading-relaxed text-sm">
                                <?= nl2br(e($profile[$vm[0]])) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ============================================================
     PENGUMUMAN — Editorial Style
     ============================================================ -->
<section class="depth-section py-24 relative" style="background:#fff;">
    <div class="orb orb-gold w-60 h-60 orb-parallax opacity-20" data-speed="0.10" style="bottom:0;left:3%;"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-end justify-between mb-14">
            <div>
                <div style="font-size:.63rem;font-weight:700;letter-spacing:.24em;color:#94a3b8;text-transform:uppercase;margin-bottom:.75rem;" class="reveal-fade">
                    03 — Info Terkini
                </div>
                <span class="section-label section-label-gold mb-3 inline-flex reveal-fade">Info Terkini</span>
                <h2 class="font-display font-bold reveal-heading"
                    style="font-size:clamp(1.8rem,3.5vw,2.8rem); color:#0f172a; letter-spacing:-0.02em;">
                    Pengumuman
                </h2>
            </div>
            <a href="pages/aktivitas/pengumuman.php"
               class="hidden sm:flex items-center gap-2 text-sm font-semibold transition-colors group reveal-fade"
               style="color:#d4af37;"
               onmouseover="this.style.color='#b48608'" onmouseout="this.style.color='#d4af37'">
                Lihat Semua
                <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <?php if (empty($announcements)): ?>
        <div class="glass-card rounded-3xl p-16 text-center">
            <i data-lucide="bell-off" class="w-10 h-10 mx-auto mb-3" style="color:#cbd5e1;"></i>
            <p style="color:#94a3b8; font-size:.9rem;">Belum ada pengumuman saat ini.</p>
        </div>
        <?php else: ?>
        <!-- Editorial list style — no number decorations -->
        <div class="stagger-grid">
            <?php foreach ($announcements as $i => $ann):
                $isNew = isNew($ann['published_at']);
                $cc = $catLabel[$ann['category']] ?? 'section-label-slate';
            ?>
            <a href="pages/aktivitas/pengumuman.php?id=<?= $ann['id'] ?>"
               class="ann-card-light glass-card block rounded-2xl p-5 reveal-fade group"
               style="animation-delay:<?= $i * .08 ?>s; text-decoration:none;">
                <div class="flex items-center gap-5">

                    <!-- Left: Category + Title -->
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-2">
                            <span class="section-label <?= $cc ?>">
                                <?= ucfirst(e($ann['category'])) ?>
                            </span>
                            <?php if ($isNew): ?>
                            <span class="badge-new-light">● Terbaru</span>
                            <?php endif; ?>
                            <?php if ($ann['is_pinned']): ?>
                            <span class="section-label section-label-gold">📌 Pin</span>
                            <?php endif; ?>
                        </div>
                        <h3 class="font-semibold text-sm line-clamp-2 transition-colors"
                            style="color:#1e293b;" onmouseover="this.style.color='#0f172a'" onmouseout="this.style.color='#1e293b'">
                            <?= e($ann['title']) ?>
                        </h3>
                        <?php if (!empty($ann['excerpt'])): ?>
                        <p class="text-xs mt-1 line-clamp-1" style="color:#94a3b8;">
                            <?= e($ann['excerpt']) ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Right: Date + Arrow -->
                    <div class="flex-shrink-0 text-right">
                        <div style="font-size:.7rem; color:#94a3b8; white-space:nowrap; margin-bottom:.3rem;">
                            <?= date('d M Y', strtotime($ann['published_at'])) ?>
                        </div>
                        <div class="flex items-center justify-end">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center transition-all group-hover:bg-slate-800 group-hover:scale-110"
                                 style="background:#f1f5f9;">
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-colors"
                                   style="color:#94a3b8;" id="arr-<?= $i ?>"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>


<!-- ============================================================
     FASILITAS
     ============================================================ -->
<?php if (!empty($facilities)): ?>
<section class="depth-section py-24 relative overflow-hidden" style="background:#f8fafc;">
    <div class="orb orb-sky w-56 h-56 orb-parallax opacity-30" data-speed="0.12" style="top:10%;right:4%;"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div style="font-size:.63rem;font-weight:700;letter-spacing:.24em;color:#94a3b8;text-transform:uppercase;margin-bottom:.75rem;" class="reveal-fade">
                04 — Sarana & Prasarana
            </div>
            <span class="section-label section-label-sky mb-4 inline-flex reveal-fade">Sarana & Prasarana</span>
            <h2 class="font-display font-bold reveal-heading"
                style="font-size:clamp(1.8rem,3.5vw,2.8rem); color:#0f172a; letter-spacing:-0.02em;">
                Fasilitas <em style="font-style:italic; color:#0369a1;">Unggulan</em>
            </h2>
        </div>

        <!-- 3 columns — more breathing room than original 6 -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-5 stagger-grid">
            <?php
            $fColors = ['baik' => 'icon-badge-sky', 'cukup' => 'icon-badge-gold'];
            foreach ($facilities as $i => $f): ?>
            <div class="tilt-card glass-card rounded-2xl p-6 text-center lift-card" style="animation-delay:<?= $i*.07 ?>s;">
                <div class="tilt-inner">
                    <div class="tilt-shine"></div>
                    <div class="<?= $fColors[$f['condition']] ?? 'icon-badge-slate' ?> icon-badge mx-auto mb-4">
                        <i data-lucide="<?= e($f['icon'] ?? 'square') ?>" class="w-5 h-5"></i>
                    </div>
                    <div class="font-display font-bold text-3xl mb-1" style="color:#0f172a;">
                        <?= e($f['count']) ?>
                    </div>
                    <div style="font-size:.8rem; color:#64748b; line-height:1.4;">
                        <?= e($f['name']) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10 reveal-fade">
            <a href="pages/media/fasilitas.php" class="btn-outline-light">
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                Lihat Semua Fasilitas
            </a>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ============================================================
     EKSTRAKURIKULER
     ============================================================ -->
<?php if (!empty($ekskuls)): ?>
<section class="depth-section py-24 relative" style="background:#fff;">
    <div class="orb orb-cream w-72 h-72 orb-parallax opacity-50" data-speed="0.08" style="top:15%;left:-5%;"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-end justify-between mb-14">
            <div>
                <div style="font-size:.63rem;font-weight:700;letter-spacing:.24em;color:#94a3b8;text-transform:uppercase;margin-bottom:.75rem;" class="reveal-fade">
                    05 — Pengembangan Diri
                </div>
                <span class="section-label section-label-gold mb-3 inline-flex reveal-fade">Pengembangan Diri</span>
                <h2 class="font-display font-bold reveal-heading"
                    style="font-size:clamp(1.8rem,3.5vw,2.8rem); color:#0f172a; letter-spacing:-0.02em;">
                    Ekstra<em style="font-style:italic; color:#d4af37;">kurikuler</em>
                </h2>
            </div>
            <a href="pages/aktivitas/ekskul.php"
               class="hidden sm:flex items-center gap-2 text-sm font-semibold group reveal-fade transition-colors"
               style="color:#d4af37;"
               onmouseover="this.style.color='#b48608'" onmouseout="this.style.color='#d4af37'">
                Lihat Semua
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 stagger-grid grid-ekskul">
            <?php
            $eColors = ['icon-badge-slate', 'icon-badge-gold', 'icon-badge-sky'];
            foreach ($ekskuls as $i => $e): ?>
            <div class="tilt-card glass-card rounded-2xl overflow-hidden lift-card reveal-fade"
                 style="animation-delay:<?= $i*.07 ?>s;">
                <div class="tilt-inner h-full">
                    <div class="tilt-shine"></div>
                    <?php if (!empty($e['image'])): ?>
                    <div class="h-40 overflow-hidden">
                        <img src="<?= UPLOAD_URL ?>ekskul/<?= htmlspecialchars($e['image']) ?>"
                             loading="lazy" alt="<?= e($e['name']) ?>"
                             class="lazy-blur w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <?php endif; ?>
                    <div class="p-5">
                        <div class="flex items-start gap-3 mb-2">
                            <div class="<?= $eColors[$i % 3] ?> icon-badge flex-shrink-0">
                                <i data-lucide="<?= e($e['icon'] ?? 'star') ?>" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <h3 class="font-display font-semibold" style="color:#0f172a;">
                                    <?= e($e['name']) ?>
                                </h3>
                                <?php if (!empty($e['coach'])): ?>
                                <p style="font-size:.72rem; color:#94a3b8;">Pembina: <?= e($e['coach']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($e['schedule'])): ?>
                        <div class="schedule-line flex items-center gap-1.5">
                            <i data-lucide="clock" class="w-3 h-3" style="color:#cbd5e1;"></i>
                            <span style="font-size:.72rem; color:#94a3b8;"><?= e($e['schedule']) ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ============================================================
     TESTIMONIAL (NEW — tidak ada di versi asli)
     ============================================================ -->
<section class="py-24 relative overflow-hidden" style="background:#f8fafc;">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div style="font-size:.63rem;font-weight:700;letter-spacing:.24em;color:#94a3b8;text-transform:uppercase;margin-bottom:.75rem;" class="reveal-fade">
                06 — Kepercayaan Orang Tua
            </div>
            <span class="section-label section-label-gold mb-4 inline-flex reveal-fade">Kepercayaan Orang Tua</span>
            <h2 class="font-display font-bold reveal-heading"
                style="font-size:clamp(1.8rem,3.5vw,2.8rem); color:#0f172a; letter-spacing:-0.02em;">
                Kata Mereka
            </h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6 stagger-grid">
            <?php
            $testimonials = [
                ['Bapak Ahmad S.', 'Orang Tua Siswa Kelas 4', 'Anak saya berkembang pesat, tidak hanya akademik tapi juga karakter dan akhlaknya. Guru-gurunya sabar dan berdedikasi.'],
                ['Ibu Sari W.', 'Orang Tua Siswa Kelas 2', 'Fasilitas lengkap, lingkungan islami yang kondusif. Kami sangat puas dengan perkembangan anak di sini.'],
                ['Bapak Hendra K.', 'Orang Tua Alumni', 'Anak saya kini berhasil masuk SMP favorit. Fondasi yang kuat dari SD Muhammadiyah 01 sangat membantu.'],
            ];
            foreach ($testimonials as $t): ?>
            <div class="testimonial-card reveal-fade">
                <div class="mb-4" style="color:#d4af37; font-size:1.5rem; font-family:'Instrument Serif',serif;">"</div>
                <p class="testimonial-quote"><?= $t[2] ?></p>
                <div class="flex items-center gap-3">
                    <div class="testimonial-avatar flex items-center justify-center"
                         style="background:linear-gradient(135deg,#fef9e7,#d4af37);">
                        <span style="font-family:'Instrument Serif',serif; color:#92600a; font-weight:700; font-size:.9rem;">
                            <?= substr($t[0], 0, 1) ?>
                        </span>
                    </div>
                    <div>
                        <div style="font-weight:600; font-size:.85rem; color:#0f172a;"><?= $t[0] ?></div>
                        <div style="font-size:.72rem; color:#94a3b8;"><?= $t[1] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================================
     CTA — Premium Clean (no cyber-line, no grid pattern)
     ============================================================ -->
<section class="py-24 relative overflow-hidden reveal-fade"
         style="background:linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);">

    <!-- Subtle orb decoration -->
    <div class="orb orb-gold w-72 h-72 opacity-20" style="position:absolute;top:-20%;right:-5%;"></div>
    <div class="orb orb-sky w-56 h-56 opacity-10" style="position:absolute;bottom:-15%;left:-3%;"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="section-label section-label-light mb-6 inline-flex">Bergabung Bersama Kami</span>
        <h2 class="font-display font-bold text-white mb-5"
            style="font-size:clamp(1.8rem,4vw,3rem); line-height:1.15; letter-spacing:-0.02em;">
            Bersama kami, buah hati Anda akan tumbuh menjadi
            <em style="font-style:italic; color:#d4af37;"> yang terbaik.</em>
        </h2>
        <p class="font-light mb-10 max-w-2xl mx-auto" style="color:rgba(255,255,255,.55); font-size:1rem; line-height:1.7;">
            Hubungi kami untuk informasi penerimaan siswa baru atau kunjungi sekolah kami secara langsung.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="pages/interaksi/kontak.php" class="btn-primary-light">
                <i data-lucide="phone-call" class="w-4 h-4"></i> Hubungi Sekarang
            </a>
            <a href="pages/aktivitas/pengumuman.php" class="btn-hero-outline">
                <i data-lucide="newspaper" class="w-4 h-4"></i> Info Terkini
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>