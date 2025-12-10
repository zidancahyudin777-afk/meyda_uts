# Petunjuk Upload ke Hosting

## Persiapan Sebelum Upload

1. Pastikan Anda memiliki akses FTP ke hosting Anda
2. Siapkan FileZilla atau aplikasi FTP client lainnya
3. Pastikan database sudah dibuat di hosting

## Langkah-langkah Upload

### 1. Konfigurasi Database
- Gunakan file `koneksi_hosting_final.php` sebagai `koneksi.php` di hosting
- Ganti nama file `koneksi_hosting_final.php` menjadi `koneksi.php` setelah diupload
- Letakkan di folder root (sama dengan `index.php`)

### 2. Upload File-file Berikut
- Semua file PHP (kecuali `koneksi.php` asli)
- Folder `admin/`, `auth/`, `includes/`, `user/`, `ajax/`
- Folder `assets/` (CSS, JS, Gambar)
- File `index.php`, `.htaccess`

### 3. Perhatikan Path URL
- Di file `header.php` dan file lainnya, path dimulai dengan `/meyda/`
- Jika aplikasi dihosting di subfolder lain, ubah path tersebut sesuai kebutuhan
- Jika dihosting di root domain, hapus `/meyda/` dan ganti dengan `/`

### 4. Hak Akses (Permissions)
- Set permission file `koneksi.php` ke 644
- Set permission folder ke 755
- Set permission file PHP ke 644

## Troubleshooting Umum

### Error Koneksi Database
- **Pastikan nama host, username, password, dan nama database benar**
- **Untuk AlwaysData:**
  - Host: `mysql-meyda-project.alwaysdata.net`
  - Username: `meyda-project`
  - Password: *ambil dari panel AlwaysData Anda*
  - Database: `meyda-project_db` (atau nama database lain yang terdaftar di panel)
- **Langkah-langkah perbaikan:**
  1. Login ke panel AlwaysData Anda: https://admin.alwaysdata.com/
  2. Klik menu 'Databases'
  3. Temukan database 'meyda-project' dan catat passwordnya
  4. Ganti password di file `includes/koneksi.php` (atau `koneksi_hosting_final.php`)
  5. Jika nama database default tidak bekerja, coba nama-nama berikut:
     - `meyda-project_meyda_db`
     - `meyda_db`
     - `meyda-project_test`
     - `meyda-project_main`
     - `meyda-project_data`
- Hubungi penyedia hosting jika tidak yakin dengan detail koneksi

### Halaman Tidak Ditemukan (404)
- Periksa file `.htaccess` apakah sudah diupload
- Pastikan mod_rewrite aktif di server

### CSS/JS Tidak Load
- Periksa path file di `header.php`
- Pastikan folder `assets/` diupload dengan benar

## File Penting
- `koneksi_hosting_final.php` - Versi konfigurasi untuk hosting
- `koneksi.php` - Versi lokal (jangan upload ini ke hosting)
- `.htaccess` - Konfigurasi server