# MVC PHP Native - Data Film

Aplikasi CRUD sederhana untuk mengelola data film dengan pola Model-View-Controller pada PHP Native.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git

## Instalasi
1. Clone atau salin project ke folder `htdocs`.
2. Import `database/film.sql`.
3. Sesuaikan koneksi pada `config/database.php`.
4. Buka `http://localhost/mvc-film-109062500007/public/index.php`.

## Struktur MVC
- `app/models/` : akses dan operasi data.
- `app/controllers/` : alur request dan pemanggilan Model/View.
- `app/views/` : tampilan HTML.
- `config/` : konfigurasi koneksi database.
- `database/` : skema dan data awal SQL.
- `public/` : entry point aplikasi.

## Fitur
- Menampilkan data film
- Menambah data film
- Mengubah data film
- Menghapus data film
- Validasi input dan notifikasi berhasil/gagal

## Histori Git
Hasil `git log --oneline`:

```
e5e0671 (HEAD -> master) feat: add delete film feature
c99c2b0 feat: add edit and update film feature
379cf1e feat: add create film feature with validation
09f17ab feat: add film list page
115bdff feat: add PDO database connection
8b57362 feat: add film database schema and seed data
239f150 chore: initialize mvc php native film project
```