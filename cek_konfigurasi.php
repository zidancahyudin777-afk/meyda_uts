<?php
// File untuk mengecek informasi konfigurasi dasar
echo "<h2>Informasi Konfigurasi Meyda Project</h2>";

echo "<h3>Environment Information:</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Server: " . $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' . "<br>";
echo "Hostname: " . gethostname() . "<br>";

echo "<h3>Current Connection Parameters:</h3>";
echo "Host: mysql-meyda-project.alwaysdata.net<br>";
echo "User: meyda-project<br>";
echo "Database: meyda-project_db (and alternatives)<br>";

echo "<h3>Petunjuk:</h3>";
echo "<ol>";
echo "<li>Login ke panel AlwaysData Anda: https://admin.alwaysdata.com/</li>";
echo "<li>Buka menu Databases</li>";
echo "<li>Cari database 'meyda-project'</li>";
echo "<li>Catat PASSWORD yang sebenarnya (yang saat ini disembunyikan sebagai '***')</li>";
echo "<li>Ganti password di file includes/koneksi.php</li>";
echo "</ol>";

echo "<h3>File Koneksi:</h3>";
echo "<ul>";
echo "<li>Primary: includes/koneksi.php</li>";
echo "<li>Alternative: koneksi_hosting.php, koneksi_hosting_final.php</li>";
echo "</ul>";

echo "<p><strong>INGAT:</strong> Ganti 'ganti_password_anda_disini' dengan password ASLI dari panel AlwaysData Anda!</p>";
?>