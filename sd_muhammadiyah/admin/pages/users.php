<?php
// admin/pages/users.php — Admin User Management
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

// Proteksi: Hanya Superadmin yang boleh mengelola user
// Anda bisa menyesuaikan fungsi is_superadmin() di auth.php Anda
if ($_SESSION['admin_role'] !== 'superadmin') {
    header("Location: ../index.php");
    exit;
}

$activeSidebar = 'users';
$pageTitle     = 'Manajemen Akun';
$pageSubtitle  = 'Kelola hak akses administrator dan editor';

// ── AJAX HANDLER ──────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $action = $_POST['action'] ?? '';

    // DELETE USER
    if ($action === 'delete') {
        $id = (int)$_POST['id'];
        if ($id === (int)$_SESSION['admin_id']) { 
            echo json_encode(['ok' => false, 'msg' => 'Anda tidak bisa menghapus akun sendiri.']); exit; 
        }
        $pdo->prepare("DELETE FROM admin_users WHERE id = ?")->execute([$id]);
        echo json_encode(['ok' => true, 'msg' => 'User berhasil dihapus.']); exit;
    }

    // CREATE USER
    if ($action === 'create') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role     = $_POST['role'];
        $fullName = $_POST['full_name'];

        try {
            $pdo->prepare("INSERT INTO admin_users (username, password, role, full_name) VALUES (?, ?, ?, ?)")
                ->execute([$username, $password, $role, $fullName]);
            echo json_encode(['ok' => true, 'msg' => 'User berhasil ditambahkan.']); exit;
        } catch (Exception $e) {
            echo json_encode(['ok' => false, 'msg' => 'Username sudah digunakan.']); exit;
        }
    }
}

// FETCH DATA
$users = $pdo->query("SELECT id, username, role, full_name, last_login FROM admin_users ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id" class="bg-black text-white">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> — Admin CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../../assets/css/custom.css">
</head>
<body class="min-h-screen flex">

    <?php include '../includes/sidebar.php'; ?>

    <main class="flex-1 p-8 lg:p-12 overflow-y-auto">
        <div class="mb-10 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-display text-shimmer mb-2"><?= $pageTitle ?></h1>
                <p class="text-white/40 text-sm"><?= $pageSubtitle ?></p>
            </div>
            <button onclick="openModal()" class="btn-premium bg-gold-500 text-black font-bold text-xs uppercase tracking-tighter">
                <i data-lucide="user-plus" class="w-4 h-4"></i> Tambah User
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($users as $u): ?>
            <div class="glass-card p-6 rounded-2xl relative overflow-hidden group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gold-400 font-bold">
                        <?= strtoupper(substr($u['full_name'], 0, 1)) ?>
                    </div>
                    <div>
                        <h3 class="font-medium text-white/90"><?= $u['full_name'] ?></h3>
                        <span class="text-[10px] uppercase tracking-widest text-white/30"><?= $u['role'] ?></span>
                    </div>
                </div>
                
                <div class="space-y-2 mb-6">
                    <div class="flex justify-between text-xs">
                        <span class="text-white/20">Username</span>
                        <span class="text-white/60">@<?= $u['username'] ?></span>
                    </div>
                    <div class="flex justify-between text-xs">
                        <span class="text-white/20">Login Terakhir</span>
                        <span class="text-white/60"><?= $u['last_login'] ?? 'Belum pernah' ?></span>
                    </div>
                </div>

                <?php if ($u['id'] != $_SESSION['admin_id']): ?>
                <button onclick="confirmDelete(<?= $u['id'] ?>)" class="w-full py-2 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-xs hover:bg-red-500 hover:text-white transition-all">
                    Hapus Akses
                </button>
                <?php else: ?>
                    <div class="w-full py-2 text-center rounded-lg bg-gold-500/10 border border-gold-500/20 text-gold-400 text-[10px] uppercase tracking-widest">
                        Akun Anda
                    </div>
                <?php <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Simple Modal Create User -->
    <div id="userModal" class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-[99] flex items-center justify-center p-6">
        <div class="glass-card w-full max-w-md p-8 rounded-3xl border-white/20">
            <h2 class="text-2xl font-display text-gold-400 mb-6">Tambah Admin Baru</h2>
            <form id="addForm" class="space-y-4">
                <input type="hidden" name="action" value="create">
                <input type="text" name="full_name" placeholder="Nama Lengkap" class="w-full bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none focus:border-gold-500" required>
                <input type="text" name="username" placeholder="Username" class="w-full bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none focus:border-gold-500" required>
                <input type="password" name="password" placeholder="Password" class="w-full bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none focus:border-gold-500" required>
                <select name="role" class="w-full bg-white/5 border border-white/10 p-3 rounded-xl text-sm outline-none focus:border-gold-500 text-white/60">
                    <option value="editor" class="bg-black">Editor</option>
                    <option value="admin" class="bg-black">Admin</option>
                </select>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="flex-1 py-3 text-sm text-white/40">Batal</button>
                    <button type="submit" class="flex-1 py-3 bg-gold-500 rounded-xl text-black font-bold text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function openModal() { document.getElementById('userModal').classList.remove('hidden'); }
        function closeModal() { document.getElementById('userModal').classList.add('hidden'); }

        async function confirmDelete(id) {
            const res = await fetch('', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: `action=delete&id=${id}`
            });
            const data = await res.json();
            if(data.ok) location.reload();
        }

        document.getElementById('addForm').onsubmit = async (e) => {
            e.preventDefault();
            const formData = new URLSearchParams(new FormData(e.target));
            const res = await fetch('', { method: 'POST', body: formData });
            const data = await res.json();
            if(data.ok) location.reload();
            else alert(data.msg);
        };
    </script>
</body>
</html>