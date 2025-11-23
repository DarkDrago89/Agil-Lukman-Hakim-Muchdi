# 🌐 Aplikasi Manajemen Data Siswa Berbasis Web


<img width="1920" height="1020" alt="Screenshot 2025-11-23 224922" src="https://github.com/user-attachments/assets/0adb8fe1-97d7-488e-812e-d2516932bc9b" />

---

Sistem informasi berbasis web untuk mengelola data siswa yang dilengkapi dengan fitur CRUD (Create, Read, Update, Delete) dan upload foto profil. Aplikasi ini dibangun menggunakan arsitektur Three-Tier dengan pemisahan yang jelas antara presentation layer, logic layer, dan data layer.

---

## Deskripsi Proyek

Aplikasi Manajemen Data Siswa adalah sistem yang dirancang untuk memfasilitasi pengelolaan data siswa di institusi pendidikan. Sistem ini menyediakan antarmuka yang user-friendly untuk melakukan input, melihat, mengubah, dan menghapus data siswa, serta mengelola foto profil. Seluruh operasi dilakukan secara asynchronous menggunakan Fetch API untuk pengalaman pengguna yang responsif.

---

## Tujuan

* Menyediakan sistem manajemen data siswa yang terstruktur dan mudah digunakan
* Mengimplementasikan arsitektur Three-Tier untuk pemisahan concern yang jelas
* Menerapkan operasi CRUD lengkap dengan validasi data yang ketat
* Menyediakan fitur upload dan manajemen foto profil siswa
* Membangun RESTful API yang dapat diintegrasikan dengan sistem lain
* Menerapkan best practices dalam pengembangan aplikasi web

---

## Struktur Proyek

```
siswa-app/
├── config/
│   └── database.php              # Data Layer - Koneksi Database
├── includes/
│   └── functions.php             # Logic Layer - Helper Functions
├── uploads/
│   └── photos/                   # Storage untuk foto siswa
├── api/                          # Logic Layer - REST API Endpoints
│   ├── create.php                # Endpoint tambah siswa
│   ├── read.php                  # Endpoint baca data siswa
│   ├── update.php                # Endpoint update siswa
│   ├── delete.php                # Endpoint hapus siswa
│   └── upload_photo.php          # Endpoint upload foto
├── index.html                    # Presentation Layer - Main UI
├── setup_photos.php              # Setup otomatis folder foto
└── database.sql                  # Data Layer - Database Schema
```

---

## Arsitektur Sistem (Three-Tier Architecture)

### Layer 1: Presentation Layer (Front-End)

Menampilkan user interface dan menangani interaksi pengguna menggunakan HTML5, CSS3, dan JavaScript dengan Fetch API untuk komunikasi asynchronous dengan backend.

### Layer 2: Logic Layer (Back-End)

Mengelola business logic melalui PHP Native dan RESTful API endpoints. Bertanggung jawab untuk validasi data, processing, file upload management, dan mengirim response dalam format JSON.

### Layer 3: Data Layer (Database)

Mengelola persistensi data menggunakan MySQL dengan PDO untuk koneksi yang aman. Menggunakan prepared statements untuk mencegah SQL injection dan indexing untuk optimasi query.

**Alur Kerja:**
```
Browser → HTTP Request → API (PHP) → MySQL Database → Response (JSON) → Browser
```

---

## Teknologi yang Digunakan

| Teknologi       | Versi  | Fungsi                                    |
| --------------- | ------ | ----------------------------------------- |
| PHP             | 7.4+   | Backend API & Server-side Logic           |
| MySQL           | 5.7+   | Database Management System                |
| JavaScript (ES6)| -      | Frontend Interactivity & Fetch API        |
| HTML5           | -      | Structure & Semantic Markup               |
| CSS3            | -      | Styling, Layout & Responsive Design       |
| PDO             | -      | Database Connection & Prepared Statements |

---

## Instalasi

### 1. Prasyarat Sistem

* PHP versi 7.4 atau lebih tinggi
* MySQL versi 5.7 atau lebih tinggi
* Apache atau Nginx web server
* XAMPP/WAMP/LARAGON (untuk development lokal)

### 2. Clone Proyek

```bash
git clone <repository-url>
cd siswa-app
```

### 3. Setup Database

Buat database dan import schema:

```sql
CREATE DATABASE IF NOT EXISTS siswa_db;
USE siswa_db;

CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    alamat TEXT,
    tanggal_lahir DATE,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    email VARCHAR(100),
    telepon VARCHAR(15),
    foto VARCHAR(255) DEFAULT 'default.jpg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_nis (nis),
    INDEX idx_nama (nama),
    INDEX idx_kelas (kelas)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### 4. Konfigurasi Database

Edit file `config/database.php`:

```php
private $host = "localhost";
private $db_name = "siswa_db";
private $username = "root";
private $password = "";
```

### 5. Setup Folder Upload

Jalankan setup otomatis:

```
http://localhost/siswa-app/setup_photos.php
```

File ini akan membuat folder uploads/photos, set permission, dan generate foto default.

### 6. Jalankan Aplikasi

```
http://localhost/siswa-app/index.html
```

---

## Penggunaan

### Melalui Interface Web

**Menambah Siswa:** Klik tombol "Tambah Siswa Baru", isi form, upload foto (opsional), simpan data.

**Melihat Data:** Daftar siswa ditampilkan dalam tabel dengan pagination (10 data per halaman).

**Mencari Data:** Gunakan search box untuk mencari berdasarkan NIS, nama, kelas, atau jurusan.

**Update Data:** Klik tombol "Edit", ubah data yang diperlukan, simpan perubahan.

**Hapus Data:** Klik tombol "Hapus", konfirmasi penghapusan.

### Melalui API

**Create (POST):**
```
POST /api/create.php
Body: nis, nama, kelas, jurusan, jenis_kelamin (wajib)
```

**Read (GET):**
```
GET /api/read.php?page=1&limit=10
GET /api/read.php?id=1
GET /api/read.php?search=keyword
```

**Update (PUT):**
```
PUT /api/update.php
Body: JSON dengan field yang akan diupdate
```

**Delete (DELETE):**
```
DELETE /api/delete.php?id=1
```

**Upload Foto (POST):**
```
POST /api/upload_photo.php
Body: siswa_id, foto (file)
```

---

## Fitur Keamanan

* **Input Validation:** Validasi NIS (angka 7-20 digit), email format, dan jenis kelamin
* **SQL Injection Prevention:** Menggunakan PDO prepared statements untuk semua query database
* **XSS Prevention:** Sanitasi input dengan htmlspecialchars dan strip_tags
* **File Upload Security:** Validasi tipe file (JPG, PNG, GIF, WEBP), ukuran maksimal 2MB, dan verifikasi real image
* **Unique Filename:** Generate nama file dengan timestamp dan random hash untuk mencegah konflik
* **CORS Handling:** Proper CORS headers dan OPTIONS request handling

---

## Database Schema

### Tabel: siswa

| Field          | Type         | Description                    | Constraint            |
| -------------- | ------------ | ------------------------------ | --------------------- |
| id             | INT          | Primary key                    | AUTO_INCREMENT        |
| nis            | VARCHAR(20)  | Nomor Induk Siswa              | NOT NULL, UNIQUE      |
| nama           | VARCHAR(100) | Nama lengkap siswa             | NOT NULL              |
| kelas          | VARCHAR(10)  | Kelas siswa (10, 11, 12)       | NOT NULL              |
| jurusan        | VARCHAR(50)  | Jurusan siswa                  | NOT NULL              |
| alamat         | TEXT         | Alamat lengkap                 | NULL                  |
| tanggal_lahir  | DATE         | Tanggal lahir                  | NULL                  |
| jenis_kelamin  | ENUM         | Laki-laki atau Perempuan       | NOT NULL              |
| email          | VARCHAR(100) | Email siswa                    | NULL                  |
| telepon        | VARCHAR(15)  | Nomor telepon                  | NULL                  |
| foto           | VARCHAR(255) | Nama file foto                 | DEFAULT 'default.jpg' |
| created_at     | TIMESTAMP    | Waktu pembuatan record         | AUTO                  |
| updated_at     | TIMESTAMP    | Waktu update record            | AUTO                  |

**Indexes:** Primary key pada id, unique index pada nis, index pada nis, nama, dan kelas untuk optimasi query.

---

## Komponen Utama Sistem

### 1. config/database.php
Mengelola koneksi database menggunakan PDO dengan error handling dan character set UTF8MB4.

### 2. includes/functions.php
Berisi helper functions seperti jsonResponse, validateNIS, validateEmail, validatePhoto, generatePhotoFilename, deleteOldPhoto, dan sanitizeInput.

### 3. api/create.php
Handle pembuatan data siswa baru dengan validasi input, pengecekan duplikasi NIS, dan insert ke database.

### 4. api/read.php
Handle pengambilan data siswa dengan fitur pagination, search, dan generate foto URL untuk setiap record.

### 5. api/update.php
Handle update data siswa dengan validasi data input dan pengecekan keberadaan siswa sebelum update.

### 6. api/delete.php
Handle penghapusan data siswa dari database dan menghapus file foto dari server.

### 7. api/upload_photo.php
Handle upload foto profil siswa dengan validasi file, generate unique filename, dan update database.

### 8. index.html
User interface utama dengan komponen header, search bar, table data, pagination, dan modal form.

---

## Alur Kerja Aplikasi

### Alur CREATE
User input form → Client validation → POST ke create.php → Server validation → Check duplicate NIS → Insert database → Upload foto (jika ada) → Response → Update UI

### Alur READ
Page load → GET ke read.php → Query database dengan filter → Generate photo URLs → Response dengan pagination → Render table

### Alur UPDATE
Click edit → GET detail → Populate form → User modify → PUT ke update.php → Validate → Update database → Upload foto baru (jika ada) → Delete foto lama → Response → Reload table

### Alur DELETE
Click delete → Confirmation → DELETE ke delete.php → Get foto info → Delete dari database → Delete file foto → Response → Reload table

### Alur UPLOAD PHOTO
Select file → Preview → Submit → POST ke upload_photo.php → Validate file → Generate unique filename → Move file → Update database → Delete old photo → Response → Update display

---

Source : [https://github.com/DarkDrago89/Agil-Lukman-Hakim-Muchdi/tree/main/Pembelajaran13-baru/siswa-app](https://github.com/DarkDrago89/Agil-Lukman-Hakim-Muchdi/tree/main/Pembelajaran13-baru/siswa-app)
