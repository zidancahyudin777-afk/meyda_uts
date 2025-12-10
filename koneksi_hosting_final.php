<?php
// KONFIGURASI UNTUK HOSTING - UPLOAD FILE INI KE ROOT FOLDER DI HOSTING
// GANTI NAMA MENJADI 'koneksi.php'
// Konfigurasi database untuk AlwaysData

// Informasi koneksi database - SESUAIKAN DENGAN KREDENSIAL ANDA DI ALWAYSDATA
$host = 'mysql-meyda-project.alwaysdata.net'; 
$user = 'meyda-project';            
$pass = 'ganti_password_anda_disini';  // PERLU DIGANTI DENGAN PASSWORD YANG BENAR
$db   = 'meyda-project_db'; 

echo "<!-- Mencoba koneksi ke: $host sebagai user: $user -->\n"; // Debug info

// Create connection
$conn = new mysqli();

// Attempt connection with error reporting
if (!$conn->real_connect($host, $user, $pass, $db)) {
    // Jika koneksi gagal, coba database alternatif
    $alt_dbs = ['meyda-project_meyda_db', 'meyda_db'];
    $connected = false;
    
    foreach($alt_dbs as $alt_db) {
        echo "<!-- Mencoba database alternatif: $alt_db -->\n"; // Debug info
        $conn = new mysqli();
        if ($conn->real_connect($host, $user, $pass, $alt_db)) {
            $db = $alt_db;
            $connected = true;
            echo "<!-- Berhasil terhubung ke database: $alt_db -->\n"; // Success info
            break;
        }
    }
    
    if (!$connected) {
        // Tampilkan error secara detail
        $error_msg = $conn->connect_error ? $conn->connect_error : "Gagal terhubung ke database";
        die("<h3>Kesalahan Koneksi Database:</h3><p><strong>Host:</strong> $host</p><p><strong>User:</strong> $user</p><p><strong>Database:</strong> $db</p><p><strong>Error:</strong> $error_msg</p><p><em>Periksa kembali kredensial database Anda di AlwaysData panel!</em></p>");
    } else {
        echo "<!-- Berhasil terhubung ke database alternatif: $db -->\n"; // Success info
    }
} else {
    echo "<!-- Koneksi berhasil ke database utama: $db -->\n"; // Success info
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