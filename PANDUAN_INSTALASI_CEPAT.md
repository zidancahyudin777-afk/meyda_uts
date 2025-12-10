# Panduan Instalasi Cepat Meyda Project

## Langkah-langkah Utama

1. **Login ke AlwaysData**
   - Buka https://admin.alwaysdata.com/
   - Masuk dengan akun Anda

2. **Temukan Kredensial Database**
   - Pilih situs Anda ('meyda-project')
   - Klik tab 'Databases'
   - Catat informasi berikut:
     - Hostname: `mysql-meyda-project.alwaysdata.net`
     - Username: `meyda-project`
     - Password: (lihat di kolom 'Password')
     - Database Name: (misalnya: `meyda-project_db`)

3. **Edit File Koneksi**
   - Buka file `includes/koneksi.php`
   - Ganti baris berikut:
   
   ```php
   $pass = '';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA
   ```
   
   Menjadi:
   
   ```php
   $pass = 'PASSWORD_ASLI_ANDA_DARI_ALWAYSDATA';  // GANTI DENGAN PASSWORD DATABASE ANDA DARI PANEL ALWAYSDATA
   ```

4. **Coba Nama Database Alternatif**
   Jika masih error, coba ganti nama database di file koneksi.php:
   
   ```php
   $db = 'meyda-project_db';  // Nama default
   ```
   
   Menjadi salah satu dari berikut:
   - `meyda-project_meyda_db`
   - `meyda_db`
   - `meyda-project_test`
   - `meyda-project_main`
   - `meyda-project_data`

5. **Upload File ke Hosting**
   - Upload semua file project ke folder `/www/Meyda/` di hosting Anda
   - Pastikan file `includes/koneksi.php` sudah diedit dengan kredensial yang benar

6. **Test Website**
   - Akses website Anda di browser
   - Jika masih ada error, periksa kembali langkah di atas

## Troubleshooting Umum

**Error "Access denied"**:
- Pastikan username dan password benar
- Pastikan nama database benar
- Pastikan IP Anda tidak diblokir oleh firewall

**Website tidak bisa diakses**:
- Pastikan file diupload ke folder yang benar
- Pastikan semua dependensi terupload

## File Penting
- File koneksi utama: `includes/koneksi.php`
- File alternatif: `koneksi_hosting.php`, `koneksi_hosting_final.php`

## Catatan Penting
- Jangan pernah share password database ke tempat umum
- Simpan kredensial dengan aman
- Backup file sebelum melakukan perubahan