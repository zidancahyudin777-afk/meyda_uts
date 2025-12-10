#!/bin/bash

echo "==========================================="
echo "Skrip Pengganti Password Database Meyda"
echo "==========================================="

echo ""
echo "Sebelum menjalankan skrip ini, pastikan Anda sudah:"
echo "1. Login ke panel AlwaysData Anda"
echo "2. Membuka menu Databases"
echo "3. Menemukan database 'meyda-project'"
echo "4. Mencatat password yang sebenarnya"
echo ""

read -p "Masukkan password database Anda dari panel AlwaysData: " db_password

echo ""
echo "Mengganti password di file koneksi..."
sed -i "s|\$pass = '';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA|\$pass = '$db_password';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA|g" /workspace/includes/koneksi.php

sed -i "s|\$pass = '';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA|\$pass = '$db_password';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA|g" /workspace/koneksi_hosting.php

sed -i "s|\$pass = '';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA|\$pass = '$db_password';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA|g" /workspace/koneksi_hosting_final.php

echo ""
echo "Password telah diganti di semua file koneksi."
echo ""
echo "File yang telah diperbarui:"
echo "- /workspace/includes/koneksi.php"
echo "- /workspace/koneksi_hosting.php" 
echo "- /workspace/koneksi_hosting_final.php"
echo ""
echo "Langkah selanjutnya:"
echo "1. Upload file-file tersebut ke hosting Anda"
echo "2. Pastikan Anda meng-upload file includes/koneksi.php ke folder /includes/ di hosting"
echo "3. Test website Anda"
echo ""
echo "Jika masih ada error, coba ganti nama database di file koneksi dari 'meyda-project_db' ke salah satu dari berikut:"
echo "- meyda-project_meyda_db"
echo "- meyda_db" 
echo "- meyda-project_test"
echo "- meyda-project_main"
echo "- meyda-project_data"
echo ""