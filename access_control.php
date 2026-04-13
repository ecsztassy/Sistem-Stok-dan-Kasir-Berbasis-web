<?php
/**
 * File untuk mengontrol hak akses berdasarkan role
 * Simpan file ini sebagai access_control.php di root folder
 */

// Fungsi untuk cek apakah user adalah admin
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Fungsi untuk cek apakah user adalah karyawan
function isKaryawan() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'karyawan';
}

// Array halaman yang bisa diakses karyawan
$karyawan_allowed_pages = [
    'jual',        // Transaksi/kasir
    'user',        // Profil user
    'barang',      // Data barang
    'kategori'     // Data kategori
];

// Fungsi untuk cek akses halaman
function checkPageAccess($page) {
    global $karyawan_allowed_pages;
    
    // Jika admin, bisa akses semua halaman
    if (isAdmin()) {
        return true;
    }
    
    // Jika karyawan, cek apakah halaman diizinkan
    if (isKaryawan()) {
        return in_array($page, $karyawan_allowed_pages);
    }
    
    return false;
}

// Fungsi untuk redirect jika akses ditolak
function denyAccess() {
    echo '<script>
        alert("Akses ditolak! Anda tidak memiliki hak untuk mengakses halaman ini.");
        window.location="index.php";
    </script>';
    exit;
}

// Fungsi untuk mendapatkan nama role dalam bahasa Indonesia
function getRoleName($role) {
    $roles = [
        'admin' => 'Administrator',
        'karyawan' => 'Karyawan'
    ];
    return isset($roles[$role]) ? $roles[$role] : 'Unknown';
}

// Auto-check untuk halaman yang sedang diakses
if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
    if (!checkPageAccess($current_page)) {
        denyAccess();
    }
}
?>
