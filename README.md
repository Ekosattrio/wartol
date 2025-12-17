# Warteg Jaya

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## Tentang Proyek

**Warteg Jaya** adalah aplikasi web berbasis Laravel yang digunakan untuk mengelola dan menampilkan informasi warteg secara modern. Proyek ini mencakup pengelolaan menu, harga, dan tampilan publik yang responsif sehingga mudah diakses oleh pengguna.

Aplikasi ini sudah **live/production** dan dapat diakses melalui:

🔗 **[https://wartegjaya.my.id/](https://wartegjaya.my.id/)**
# Dashboard Admin
<img width="1917" height="1134" alt="image" src="https://github.com/user-attachments/assets/fd4c9073-3851-440f-bd66-dfb35591ceb4" />
<img width="1919" height="1125" alt="image" src="https://github.com/user-attachments/assets/12bc57c3-3c0f-41e0-9afe-cc73139b10e9" />
<img width="1919" height="1129" alt="image" src="https://github.com/user-attachments/assets/53f47bf0-cc1d-4663-aef3-74ab8b82d01b" />
<img width="1919" height="1136" alt="image" src="https://github.com/user-attachments/assets/e8eb8bf7-dbc4-4d1b-84b5-f5a122f768f0" />
<img width="1919" height="1061" alt="image" src="https://github.com/user-attachments/assets/cb062f43-0cab-485e-9410-bcc812db873a" />

# User
<img width="1919" height="1143" alt="image" src="https://github.com/user-attachments/assets/490fb5d1-b0a7-47c0-946d-b4ba24a52c4f" />





## Fitur Utama

* Manajemen menu makanan dan minuman 
* Manajemen Pemasukan
* Tampilan website publik yang responsif
* Backend berbasis Laravel dengan struktur MVC yang rapi
* Payment Gateway (Sandbox)

## Teknologi yang Digunakan

* PHP 8+
* Laravel Framework
* MySQL 
* HTML, CSS, JavaScript,scss
* Web server (Apache / Nginx)

## Instalasi & Setup (Local Development)

1. Clone repository

   ```bash
   git clone https://github.com/username/warteg-jaya.git
   cd warteg-jaya
   ```

2. Install dependency

   ```bash
   composer install
   ```

3. Copy file environment

   ```bash
   cp .env.example .env
   ```

4. Generate application key

   ```bash
   php artisan key:generate
   ```

5. Atur konfigurasi database di file `.env`

6. Jalankan migrasi (jika ada)

   ```bash
   php artisan migrate
   ```

7. Jalankan server lokal

   ```bash
   php artisan serve
   ```

Aplikasi dapat diakses melalui `http://127.0.0.1:8000`

## Deployment

Proyek ini telah dideploy ke hosting Selama Satu bulan Ke depan  dan dapat diakses publik di Untuk Payment Gateway Masih Berupa Sandbox:

[https://wartegjaya.my.id/](https://wartegjaya.my.id/)

Konfigurasi deployment mengikuti standar Laravel (environment production, cache config, route, dan view).

## Kontribusi

Kontribusi sangat terbuka. Silakan fork repository ini, buat branch baru, dan ajukan pull request.

## Keamanan

Jika menemukan celah keamanan pada aplikasi ini, silakan hubungi pengembang secara langsung. Mohon tidak mempublikasikan isu keamanan secara terbuka.

## Lisensi

Proyek ini menggunakan lisensi **MIT**. Bebas digunakan dan dikembangkan sesuai kebutuhan.
