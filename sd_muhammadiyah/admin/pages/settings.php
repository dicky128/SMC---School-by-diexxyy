<?php
// admin/pages/settings.php — Site Settings Manager
require_once __DIR__ . '/../../includes/config.php'; // Path disesuaikan
require_once __DIR__ . '/../includes/auth.php';

$activeSidebar = 'settings';
$pageTitle     = 'Konfigurasi Situs';
$pageSubtitle  = 'Kelola konten dinamis dan identitas sekolah';

// ── SAVE HANDLER ──────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $group  = $_POST['group'] ?? 'general';
    $saved  = 0;

    // Filter key yang tidak perlu disimpan ke DB settings
    $skip = ['group', '_method'];
    
    foreach ($_POST as $key => $value) {
        if (in_array($key, $skip)) continue;
        
        $value = trim($value);
        try {
            // Sinkron dengan kolom: setting_key & setting_value
            $stmt = $pdo->prepare(
                "INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)
                 ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)"
            );
            $stmt->execute([$key, $value]);
            $saved++;
        } catch (Exception $e) {
            // Silent error or log
        }
    }

    $_SESSION['flash'] = ['type' => 'success', 'msg' => "Konfigurasi $group berhasil diperbarui."];
    header("Location: settings.php?tab=$group");
    exit;
}

// ── LOAD DATA ─────────────────────────────────────────────────────────────
$allSettings = [];
try {
    $stmt = $pdo->query("SELECT setting_key, setting_value FROM settings");
    while ($row = $stmt->fetch()) {
        $allSettings[$row['setting_key']] = $row['setting_value'];
    }
} catch (Exception $e) {}

$tab = $_GET['tab'] ?? 'general';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

// Definisi Group & Field
$groups = [
    'general' => [
        'label' => 'Identitas',
        'icon' => 'home',
        'fields' => [
            ['key' => 'school_name', 'label' => 'Nama Sekolah', 'type' => 'text', 'placeholder' => 'SD Muhammadiyah 1 Gentasari'],
            ['key' => 'hero_title', 'label' => 'Judul Hero', 'type' => 'text', 'placeholder' => 'Membentuk Generasi Qurani'],
            ['key' => 'hero_subtitle', 'label' => 'Sub-judul Hero', 'type' => 'textarea', 'placeholder' => 'Deskripsi singkat di bawah judul utama'],
        ]
    ],
    'contact' => [
        'label' => 'Kontak',
        'icon' => 'phone',
        'fields' => [
            ['key' => 'contact_email', 'label' => 'Email Resmi', 'type' => 'email', 'placeholder' => 'info@sdmuh1gentasari.sch.id'],
            ['key' => 'school_address', 'label' => 'Alamat Lengkap', 'type' => 'textarea', 'placeholder' => 'Jl. Raya Gentasari...'],
            ['key' => 'school_phone', 'label' => 'Nomor Telepon', 'type' => 'text', 'placeholder' => '(0282) 123456'],
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="id" class="bg-black text-white">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> — Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <style>
        .input-glass {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }
        .input-glass:focus {
            border-color: #d4aa3a;
            background: rgba(255,255,255,0.08);
            outline: none;
            box-shadow: 0 0 15px rgba(212,170,58,0.2);
        }
    </style>
</head>
<body class="min-h-screen flex">

    <?php include '../includes/sidebar.php'; ?>

    <main class="flex-1 p-8 lg:p-12 overflow-y-auto">
        <!-- Header -->
        <div class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-display text-shimmer mb-2"><?= $pageTitle ?></h1>
                <p class="text-white/40 text-sm"><?= $pageSubtitle ?></p>
            </div>
            <div class="flex gap-2">
                <?php foreach($groups as $key => $g): ?>
                    <a href="?tab=<?= $key ?>" class="px-4 py-2 rounded-xl text-xs uppercase tracking-widest transition-all <?= $tab === $key ? 'bg-white/10 border border-gold-500 text-gold-300' : 'text-white/40 hover:text-white' ?>">
                        <?= $g['label'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if ($flash): ?>
            <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 text-sm animate-fade-up">
                <?= $flash['msg'] ?>
            </div>
        <?php endif; ?>

        <!-- Form Area -->
        <div class="max-w-3xl">
            <form action="" method="POST" class="space-y-6">
                <input type="hidden" name="group" value="<?= $tab ?>">
                
                <?php 
                $currentFields = $groups[$tab]['fields'] ?? $groups['general']['fields'];
                foreach ($currentFields as $field): 
                    $val = $allSettings[$field['key']] ?? '';
                ?>
                <div class="glass-card p-6 rounded-2xl">
                    <label class="block text-xs font-medium text-gold-400 uppercase tracking-widest mb-3">
                        <?= $field['label'] ?>
                    </label>
                    
                    <?php if ($field['type'] === 'textarea'): ?>
                        <textarea name="<?= $field['key'] ?>" rows="4" class="input-glass w-full rounded-xl p-4 text-sm text-white/80" placeholder="<?= $field['placeholder'] ?>"><?= htmlspecialchars($val) ?></textarea>
                    <?php else: ?>
                        <input type="<?= $field['type'] ?>" name="<?= $field['key'] ?>" value="<?= htmlspecialchars($val) ?>" class="input-glass w-full rounded-xl p-4 text-sm text-white/80" placeholder="<?= $field['placeholder'] ?>">
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>

                <div class="pt-4">
                    <button type="submit" class="btn-premium w-full justify-center py-4 bg-gold-500 text-black font-bold uppercase tracking-widest hover:scale-[1.02] active:scale-95 transition-all">
                        <i data-lucide="save" class="w-5 h-5"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>