<?php
// FILE INI KHUSUS UNTUK HOSTING
// Silakan upload file ini ke folder 'includes' di hosting (via FileZilla)
// Lalu ganti namanya menjadi 'koneksi.php' di sana.

$host = 'mysql-meyda-project.alwaysdata.net'; 
$user = 'meyda-project';            
$pass = 'zidancah27';       
$db   = 'meyda-project_db'; // Coba 'meyda-project_db' atau 'meyda-project_meyda_db'

// Create connection with improved error handling
$conn = new mysqli();
if (!$conn->real_connect($host, $user, $pass, $db, null, null, MYSQLI_CLIENT_COMPRESS)) {
    // Try alternative database names if the primary one fails
    $alt_dbs = ['meyda-project_meyda_db', 'meyda_db'];
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
        die("Koneksi Hosting Gagal: " . $conn->connect_error . "<br/>Host: " . $host . "<br/>Database: " . $db . "<br/>User: " . $user);
    }
}

if ($conn->connect_error) {
    die("Koneksi Hosting Gagal: " . $conn->connect_error);
}

// Set charset to prevent issues
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
