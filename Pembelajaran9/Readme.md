# 🌐 Pengelolaan database dengan PHP

## Dokumentasi :

<img width="1920" height="1020" alt="Screenshot 2025-10-26 204216" src="https://github.com/user-attachments/assets/d2bb28dd-7884-441f-ae16-45ca7e273283" />

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/5c991e32-4673-45c9-bd58-acec8194c1a3" />

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/f060e90d-db6e-4050-8ffc-da078a282e0b" />

## Penjelasan :

* **Create:** Menambahkan data calon siswa melalui form pendaftaran (`form-daftar.php` → `proses-pendaftaran.php`).
* **Read:** Menampilkan seluruh data siswa yang telah mendaftar (`list-siswa.php`).
* **Update:** Mengubah informasi siswa yang sudah terdaftar (`form-edit.php` → `proses-edit.php`).
* **Delete:** Menghapus data siswa dari database (`hapus.php`).

## Persyaratan Sistem

* PHP versi 7.x atau lebih baru
* MySQL atau MariaDB
* Web server lokal seperti **Laragon**, **XAMPP**, atau **WAMP**

## Konfigurasi Awal

Atur koneksi ke database pada file `config.php` sesuai dengan server lokal Anda:

```php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "pendaftaran_siswa";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
```

## Pembuatan Database

Buat database dan tabel menggunakan perintah SQL berikut (jalankan melalui phpMyAdmin atau MySQL client):

```sql
CREATE DATABASE pendaftaran_siswa;
USE pendaftaran_siswa;

CREATE TABLE `pendaftaran_siswa`.`calon_siswa` (
    `id` INT NOT NULL AUTO_INCREMENT ,  
    `nama` VARCHAR(64) NOT NULL ,  
    `alamat` VARCHAR(255) NOT NULL ,  
    `jenis_kelamin` VARCHAR(16) NOT NULL ,  
    `agama` VARCHAR(16) NOT NULL ,  
    `sekolah_asal` VARCHAR(64) NOT NULL ,    
    PRIMARY KEY  (`id`)
) ENGINE = InnoDB;
```

Pastikan kredensial yang digunakan di `config.php` sesuai dengan pengaturan server lokal Anda.

## Cara Menjalankan Aplikasi

1. Salin folder proyek ini ke direktori web server Anda.
   Contoh (untuk XAMPP): `C:\xampp\htdocs\pendaftaran-siswa`
2. Aktifkan **Apache** dan **MySQL**.
3. Buka browser dan akses:
   `http://localhost/pendaftaran-siswa/`
4. Gunakan menu navigasi:

   * **Daftar Baru:** menambahkan data siswa.
   * **Pendaftar:** menampilkan, mengubah, atau menghapus data siswa.

## Struktur Direktori

| Berkas                   | Deskripsi                               |
| ------------------------ | --------------------------------------- |
| `index.php`              | Halaman utama dan navigasi menu         |
| `config.php`             | File konfigurasi database               |
| `form-daftar.php`        | Formulir input data calon siswa         |
| `proses-pendaftaran.php` | Proses penyimpanan data baru            |
| `list-siswa.php`         | Menampilkan daftar siswa yang terdaftar |
| `form-edit.php`          | Formulir pengeditan data siswa          |
| `proses-edit.php`        | Proses penyimpanan hasil edit           |
| `hapus.php`              | Menghapus data siswa                    |

### Sumber Kode : [Source Code](https://github.com/DarkDrago89/Belajar-PHP)
