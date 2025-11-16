# Latihan Membuat Backend Upload Poto

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/a5b6f934-2364-414d-8b72-9f3a5f357995" />

---

Sistem ini menyediakan layanan upload, pengambilan data, dan penghapusan foto melalui RESTful API berbasis PHP. Seluruh proses dilengkapi validasi file, penyimpanan metadata di database, serta antarmuka web sederhana untuk mengelola galeri foto.

---

## Deskripsi Proyek

Proyek ini dibuat untuk mempermudah pengelolaan file gambar di sisi backend. Pengguna dapat mengunggah foto, melihat daftar foto yang tersedia, dan menghapus foto yang tidak lagi dibutuhkan. Metadata disimpan dalam database MySQL, sementara file disimpan langsung pada server.

---

## Tujuan

* Menyediakan backend API yang stabil untuk proses upload gambar.
* Menerapkan validasi keamanan terhadap file yang diterima.
* Mengelola metadata foto melalui MySQL.
* Menawarkan antarmuka web agar pengguna dapat berinteraksi tanpa harus memanggil API secara manual.
* Menjadi contoh implementasi API PHP yang terstruktur dan mudah dikembangkan.

---

## Struktur Proyek

```
project/
├── config/
│   └── database.php
├── includes/
│   └── functions.php
├── uploads/
│   └── photos/
├── api/
│   ├── upload.php
│   ├── get_photos.php
│   └── delete_photo.php
├── index.php
├── database.sql
└── README.md
```

Struktur ini memisahkan konfigurasi, fungsi pendukung, endpoint API, file upload, dan frontend agar mudah dikelola dan dikembangkan.

---

## Arsitektur Sistem (Ringkas)

1. Browser atau client memanggil endpoint API (upload, ambil data, hapus foto).
2. Backend PHP memproses request, melakukan validasi, dan berinteraksi dengan database maupun file system.
3. Server mengembalikan hasil dalam format JSON.
4. File disimpan pada direktori khusus dan metadata tercatat dalam database.

---

## Teknologi yang Digunakan

| Teknologi  | Fungsi                        |
| ---------- | ----------------------------- |
| PHP 7.4+   | Logika server dan API backend |
| MySQL 5.7+ | Penyimpanan metadata gambar   |
| PDO        | Koneksi database yang aman    |
| JavaScript | Interaksi frontend            |
| HTML & CSS | Tampilan antarmuka            |

---

## Instalasi

### 1. Prasyarat

* PHP 7.4 atau lebih baru
* MySQL
* Apache atau Nginx
* XAMPP/WAMP/LAMP (opsional)

### 2. Clone Proyek

```bash
git clone <repository-url>
cd photo-upload-system
```

### 3. Buat Database

Import atau jalankan schema berikut:

```sql
CREATE DATABASE IF NOT EXISTS photo_upload_db;
USE photo_upload_db;

CREATE TABLE photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(500) NOT NULL,
    file_size INT NOT NULL,
    mime_type VARCHAR(100) NOT NULL,
    uploaded_by VARCHAR(100),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_uploaded_at (uploaded_at)
);
```

### 4. Konfigurasi Database

Edit pada `config/database.php`:

```php
private $host = "localhost";
private $db_name = "photo_upload_db";
private $username = "root";
private $password = "";
```

### 5. Buat Folder Upload

```bash
mkdir -p uploads/photos
chmod 777 uploads/photos
```

### 6. Jalankan Aplikasi

Akses melalui browser:

```
http://localhost/project/index.php
```

---

## Penggunaan

### Melalui Interface Web

* Unggah foto melalui formulir upload
* Foto otomatis tampil dalam galeri
* Setiap foto dapat dihapus melalui tombol yang tersedia

### Melalui API

**Upload Foto (POST):**

```bash
curl -X POST http://localhost/project/api/upload.php \
  -F "photos[]=@/path/to/photo.jpg" \
  -F "uploaded_by=John Doe"
```

**Ambil Data Foto (GET):**

```bash
curl -X GET "http://localhost/project/api/get_photos.php?page=1&limit=10"
```

**Hapus Foto (DELETE):**

```bash
curl -X DELETE "http://localhost/project/api/delete_photo.php?id=1"
```

---

## Fitur Keamanan

* Validasi file untuk memastikan hanya format gambar yang diterima
* Pembatasan ukuran file dan jumlah file per upload
* Nama file unik untuk menghindari duplikasi
* Prepared statements untuk mencegah SQL Injection
* Validasi path dan pengecekan file pada operasi delete

---

## Database Schema (Ringkas)

Tabel `photos` menyimpan informasi seperti:

* Nama file
* Nama asli
* Lokasi penyimpanan
* Ukuran file
* Tipe MIME
* Upload oleh siapa
* Waktu upload

Index pada `uploaded_at` membantu query yang membutuhkan sorting.

---

## Komponen Utama Sistem

### 1. config/database.php

Mengatur koneksi database menggunakan PDO.

### 2. includes/functions.php

Berisi fungsi seperti:

* Format respons JSON
* Validasi file gambar
* Pembuatan nama file unik
* Penghapusan file di server

### 3. api/upload.php

Memproses upload file, validasi, penyimpanan, dan pencatatan metadata.

### 4. api/get_photos.php

Mengambil daftar foto dengan pagination.

### 5. api/delete_photo.php

Menghapus metadata di database serta file fisiknya.

### 6. index.php

Antarmuka web untuk upload dan melihat galeri.

---

## Troubleshooting

**Tidak bisa konek database**
Periksa service MySQL dan kredensial di `config/database.php`.

**Gagal upload file**
Cek permission:

```bash
chmod 777 uploads/photos
```

**Ukuran file terlalu besar**
Atur pada `php.ini`:

```
upload_max_filesize
post_max_size
```

### Source Code : [https://github.com/DarkDrago89/Agil-Lukman-Hakim-Muchdi/tree/main/Pembelajaran13/project11](https://github.com/DarkDrago89/Agil-Lukman-Hakim-Muchdi/tree/main/Pembelajaran13/project11)
