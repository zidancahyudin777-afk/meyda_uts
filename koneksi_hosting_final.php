<?php
// KONFIGURASI UNTUK HOSTING - UPLOAD FILE INI KE ROOT FOLDER DI HOSTING
// GANTI NAMA MENJADI 'koneksi.php'

$host = 'mysql-meyda-project.alwaysdata.net'; 
$user = 'meyda-project';            
$pass = 'zidancah27';       
$db   = 'meyda-project_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Hosting Gagal: " . $conn->connect_error);
}

// Function to sanitize input
function sanitize($data) {
    global $conn;
    return htmlspecialchars(strip_tags(trim($conn->real_escape_string($data))));
}

// Format Rupiah
function formatRupiah($angka){
    return "Rp " . number_format($angka,0,',','.');
}
?>