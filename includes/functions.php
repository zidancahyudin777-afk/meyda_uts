<?php
// Fungsi-fungsi bantuan untuk aplikasi

// Fungsi untuk membuat URL absolut berdasarkan struktur folder
function baseUrl($path = '') {
    // Jika dihosting di subfolder, ubah BASE_URL sesuai kebutuhan
    $base_url = '/meyda'; // Sesuaikan dengan nama folder di hosting
    
    // Jika aplikasi dihosting di root domain, gunakan:
    // $base_url = '';
    
    return $base_url . $path;
}

// Fungsi untuk redirect
function redirect($path) {
    header("Location: " . baseUrl($path));
    exit();
}

// Fungsi untuk cek apakah pengguna login
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Fungsi untuk cek role pengguna
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Fungsi untuk mendapatkan ID pengguna saat ini
function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

// Fungsi untuk mendapatkan nama pengguna saat ini
function getCurrentUserName() {
    return $_SESSION['nama'] ?? null;
}

// Fungsi untuk mendapatkan role pengguna saat ini
function getCurrentUserRole() {
    return $_SESSION['role'] ?? null;
}
?>