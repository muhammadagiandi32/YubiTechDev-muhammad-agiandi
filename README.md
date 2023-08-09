# Project Title

Test Kompetensi - YubiTechDev.

## Getting Started

Aplikasi CRUD Sederhana dengan open API

### Prerequisites

- PHP >8.1
- Laravel 10x
- Composer
- JWT Auth

### Installation

Berikut Langkah untuk menjalanankan.

Buka folder test-backend/.env.example Copy seluruh isi file lalu paste dalam file test-backend/.env
Buka folder test-frontend/.env.example Copy seluruh isi file lalu paste dalam file test-frontend/.env

jalankan composer update dua folder tersebut

```
composer update
```

jalankan printah di bawah pada folder test-backend

```
php artisan migrate:fresh --seed
php artisan serve --port 8000
```

jalankan printah di bawah pada folder test-frontend

```
php artisan serve --port 8001
```

[Buka halaman Frontend](http://127.0.0.1:8001/auth/login)

## [Dokumentasi Postman](https://documenter.getpostman.com/view/15005997/2s9Xy2QY43)
## Perhatikan Gambar Berikut
pastikan value  JWT_SECRET pada .env backend dan frontend sama. <br />
Perhatikan cara menjalankan artisan pada terminal VSCode pada gambar <br />
![image](https://github.com/muhammadagiandi32/YubiTechDev-muhammad-agiandi/assets/59462709/0129cdd4-b114-41df-b581-d08d82492d65)

Tamilan Awal  <br />
![image](https://github.com/muhammadagiandi32/YubiTechDev-muhammad-agiandi/assets/59462709/6481d2ef-7256-4e5a-af04-8dece787d963)

## Login
### email:
```
muhammadagiandi@gmail.com
```
### Password:
```
password
```

