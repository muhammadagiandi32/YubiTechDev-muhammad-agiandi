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
