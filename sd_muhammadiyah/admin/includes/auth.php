<?php
/**
 * admin/includes/auth.php — Admin Session Guard
 * Gunakan di bagian paling atas setiap halaman admin.
 * ─────────────────────────────────────────────────────────────────────────────
 */

// 1. Pastikan config.php terpanggil untuk koneksi DB dan session_start()
require_once __DIR__ . '/../../includes/config.php';

// 2. Cek apakah user sudah login
// Kita menggunakan 'admin_logged_in' agar sinkron dengan logic login.php[cite: 6]
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Jika belum login, tendang kembali ke halaman login[cite: 6]
    // Menggunakan konstanta APP_URL agar path selalu absolut dan aman[cite: 6]
    header('Location: ' . APP_URL . '/admin/login.php');
    exit;
}

// 3. Update aktivitas terakhir untuk keamanan session[cite: 6]
$_SESSION['last_activity'] = time();

/**
 * ROLE HELPERS
 * Fungsi-fungsi pembantu untuk mengecek hak akses di halaman admin[cite: 6]
 */

// Mengambil role user saat ini (default: editor)[cite: 6]
function admin_role(): string { 
    return $_SESSION['admin_role'] ?? 'editor'; 
}

// Cek apakah user adalah Superadmin (Akses penuh ke Manajemen User)
function is_superadmin(): bool { 
    return admin_role() === 'superadmin'; 
}

// Cek apakah user minimal memiliki role Admin[cite: 6]
function is_admin(): bool { 
    return in_array(admin_role(), ['superadmin', 'admin']); 
}

/**
 * GATEKEEPER
 * Gunakan fungsi ini di halaman sensitif seperti users.php[cite: 4, 6]
 */
function require_superadmin(): void {
    if (!is_superadmin()) {
        http_response_code(403);
        // Tampilan error minimalis berestetika glassmorphism
        die('<div style="background:#000;color:#fff;display:flex;height:100vh;align-items:center;justify-content:center;font-family:sans-serif;text-align:center;">
                <div>
                    <h1 style="color:#d4aa3a;font-size:3rem;margin:0;">403</h1>
                    <p style="opacity:0.5;">Akses Ditolak. Hanya Superadmin yang diizinkan.</p>
                    <a href="'.APP_URL.'/admin/index.php" style="color:#fff;text-decoration:none;border:1px solid #333;padding:10px 20px;border-radius:10px;">Kembali ke Dashboard</a>
                </div>
            </div>');
    }
}