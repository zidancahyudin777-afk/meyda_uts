# Panduan Perbaikan Koneksi Database untuk Meyda Project

## Masalah yang Terjadi
Error: `mysqli_sql_exception: Access denied for user 'meyda-project'@'2a00:b6e0:1:20:19::1' (using password: YES)`

Ini menunjukkan bahwa kredensial database (username/password) yang digunakan salah saat mengakses database di AlwaysData.

## Solusi yang Telah Dilakukan

### 1. Memperbarui File Koneksi
Semua file koneksi telah dimodifikasi agar:
- Menyediakan informasi debugging yang lebih jelas
- Menggunakan password placeholder yang harus diganti
- Memiliki pesan error yang lebih informatif

File yang telah dimodifikasi:
- `/includes/koneksi.php`
- `/koneksi_hosting.php`
- `/koneksi_hosting_final.php`
- `/koneksi.php` (versi lokal)

### 2. Langkah-langkah untuk Memperbaiki Koneksi

#### A. Mendapatkan Kredensial Database yang Benar dari AlwaysData:
1. Login ke akun AlwaysData Anda
2. Pergi ke panel kontrol
3. Buka bagian "Databases" atau "MySQL"
4. Temukan database Anda (`meyda-project`)
5. Catat:
   - Hostname/Server: contohnya `mysql-meyda-project.alwaysdata.net`
   - Username: `meyda-project`
   - Password: (yang sebenarnya dari panel AlwaysData)
   - Database name: biasanya `meyda-project_db` atau nama lain yang Anda tentukan

#### B. Mengganti Password di File Koneksi:
1. Buka file `/includes/koneksi.php` di hosting Anda
2. Ganti baris berikut:
   ```php
   $pass = 'ganti_password_anda_disini';  // PERLU DIGANTI DENGAN PASSWORD YANG BENAR
   ```
   dengan password aktual dari panel AlwaysData Anda:
   ```php
   $pass = 'password_sebenarnya_dari_alwaysdata';  // PERLU DIGANTI DENGAN PASSWORD YANG BENAR
   ```

#### C. Alternatif Nama Database:
Jika koneksi tetap gagal, coba ubah nama database di file koneksi:
- `meyda-project_db`
- `meyda-project_meyda_db`
- `meyda_db`
- Atau nama database yang Anda buat di AlwaysData

### 3. Proses Troubleshooting
Setelah mengganti kredensial:
1. Upload ulang file `includes/koneksi.php` ke hosting
2. Akses halaman yang menggunakan koneksi database
3. Perhatikan pesan error yang muncul (akan lebih informatif)
4. Jika masih gagal, periksa kembali:
   - Apakah username dan password benar
   - Apakah nama database benar
   - Apakah host database benar
   - Apakah IP Anda diizinkan mengakses database (beberapa hosting membatasi akses IP)

### 4. Tips Tambahan
- Pastikan database Anda sudah dibuat di AlwaysData
- Pastikan pengguna database memiliki hak akses penuh ke database tersebut
- Jika menggunakan IP statis, pastikan firewall database mengizinkan koneksi dari IP Anda

## File Koneksi Yang Tersedia

- `koneksi.php` - Versi untuk lokal development
- `koneksi_hosting.php` - Template untuk hosting
- `koneksi_hosting_final.php` - Template final untuk hosting
- `includes/koneksi.php` - File yang digunakan oleh aplikasi di hosting (file ini yang harus diperbarui di hosting)

## Catatan Penting
**Jangan pernah menyimpan password database dalam bentuk teks biasa di kode yang diupload ke GitHub atau tempat publik.**