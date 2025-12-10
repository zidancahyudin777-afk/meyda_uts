<?php
// FILE KONEKSI SEDERHANA UNTUK HOSTING
// Konfigurasi database untuk AlwaysData

// Informasi koneksi database - SESUAIKAN DENGAN KREDENSIAL ANDA DI ALWAYSDATA
$host = 'mysql-meyda-project.alwaysdata.net'; 
$user = 'meyda-project';            
$pass = '';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA
$db   = 'meyda-project_db';

// Create connection
$conn = new mysqli();

// Attempt connection
if (!$conn->real_connect($host, $user, $pass, $db)) {
    // Jika koneksi gagal, coba database alternatif
    $alt_dbs = [
        'meyda-project_meyda_db', 
        'meyda_db',
        'meyda-project_test',
        'meyda-project_main',
        'meyda-project_data'
    ];
    
    $connected = false;
    
    foreach($alt_dbs as $alt_db) {
        $conn = new mysqli();
        if ($conn->real_connect($host, $user, $pass, $alt_db)) {
            $db = $alt_db;
            $connected = true;
            break;
        }
    }
    
    if (!$connected) {
        // Tampilkan error tanpa informasi sensitif
        die("<h3>Kesalahan Koneksi Database:</h3><p>Periksa kembali kredensial database Anda di AlwaysData panel!</p>");
    }
}

// Periksa status koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Set charset untuk mencegah masalah karakter
$conn->set_charset("utf8mb4");

// Function to sanitize input
function sanitize($data) {
    global $conn;
    return htmlspecialchars(strip_tags(trim(mysqli_real_escape_string($conn, $data))));
}

// Format Rupiah
function formatRupiah($angka){
    return "Rp " . number_format($angka,0,',','.');
}
?>