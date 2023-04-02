# Dokumentasi Project

## Deskripsi
Ini adalah dokumentasi untuk Project ini dengan minimal requirement PHP 8.1 dan Node minimal versi 16.

## Persyaratan
Untuk menjalankan Project ini, pastikan bahwa komputer Anda memenuhi persyaratan minimal berikut:
- PHP 8.1
- Node minimal versi 16
- Composer
- MySQL atau database lainnya

## Instalasi
Berikut adalah langkah-langkah untuk menginstal Laravel:

1. Buka terminal atau command prompt pada komputer Anda.
2. Clone repository Project yang sudah disediakan atau download dari https://github.com/daisnurfaizi/daisnurfaizi-wings.git
3. Masuk ke direktori project Laravel.
4. Jalankan perintah `composer install` untuk menginstal dependensi Project.
5. Salin file `.env.example` ke file `.env`.
6. Buat database kosong dengan nama yang sesuai pada MySQL.
7. Edit file `.env` dan ubah konfigurasi database agar sesuai dengan yang Anda gunakan.
8. Jalankan perintah `php artisan key:generate` untuk menghasilkan key Laravel yang unik.
9. Jalankan perintah `php artisan migrate` untuk menjalankan migrasi database.
10. Jalankan perintah `php artisan db:seed --class=Admin` untuk menjalankan seeder Untuk Membuat user.
11. Jalankan perintah `php artisan db:seed --class=ProductSeeder` untuk menjalankan seeder ProductSeeder untuk membuat dummy product.
12. Jalankan perintah `php artisan serve` untuk menjalankan server Laravel.


Setelah seeder dijalankan, data Admin dan ProductSeeder akan dimasukkan ke dalam database yang sudah dibuat pada tahap instalasi.

## Live Demo
https://daisnurfaizi.inginjadiprogrammer.com/
login dengan 
username :admin
password : admin

