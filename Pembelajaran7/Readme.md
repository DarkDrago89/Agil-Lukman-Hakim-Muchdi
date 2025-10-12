# 🌐 Latihan AJAX
[Klik disini](https://darkdrago89.github.io/ajax7/)

Proyek ini merupakan implementasi sederhana penggunaan **AJAX (Asynchronous JavaScript and XML)** untuk mengirim data form tanpa melakukan *page reload*.
Pada proyek ini terdapat dua form berbeda dalam satu halaman, yang masing-masing mengirim data ke **database yang berbeda** melalui dua berkas JavaScript dan dua *endpoint* PHP yang terpisah.

---

## Form 1 – Basic AJAX Contact Form

### Konsep

Form pertama dibuat sebagai contoh dasar AJAX.
Strukturnya sederhana: terdiri dari tiga input — **Name**, **Email**, dan **Message** — yang dikirim ke server tanpa me-*reload* halaman.
Form ini menunjukkan bagaimana *client-side JavaScript* dapat memanfaatkan `fetch()` API untuk mengirim data secara asinkron ke file PHP yang kemudian menyimpannya ke database.

### Cara Kerja

1. Saat tombol **Submit** ditekan, fungsi `preventDefault()` mencegah halaman di-*reload*.
2. Data form dikemas dalam objek `FormData()` yang aman untuk dikirim.
3. JavaScript (`ajaxForm1.js`) mengirim data menggunakan:

   ```javascript
   fetch("db1_handler.php", {
       method: "POST",
       body: data
   });
   ```
4. File `db1_handler.php` menerima data, melakukan koneksi ke database pertama (`db1`), dan mengeksekusi perintah `INSERT` menggunakan `prepare()` agar aman dari *SQL injection*.
5. Setelah penyimpanan berhasil, server mengembalikan pesan konfirmasi ke pengguna, yang langsung ditampilkan di halaman tanpa *refresh*.

### Tujuan Pembelajaran

* Memahami dasar AJAX menggunakan `fetch()`.
* Melatih proses pengiriman data asinkron dari browser ke server.
* Menerapkan prinsip keamanan dasar dalam pemrosesan input.

---

## Form 2 – Contact Form dengan Validasi Input

### Konsep

Form kedua mengambil inspirasi dari desain *contact form* modern seperti yang digunakan pada situs-situs profesional.
Desainnya terdiri dari dua kolom: sebelah kiri untuk input data (**Name**, **Email**, **Phone**), dan sebelah kanan untuk elemen visual bertuliskan **CONTACT US**.
Form ini tidak hanya mengirim data secara asinkron, tetapi juga memiliki **validasi input sisi klien (client-side validation)** agar data yang dikirim lebih terjamin kualitasnya.

### Mekanisme dan Validasi

1. JavaScript pada file `ajaxForm2.js` menangani event `submit`.
2. Sebelum data dikirim, dilakukan pemeriksaan:

   * Nama minimal 3 karakter.
   * Format email harus sesuai dengan pola umum (`^[^@\s]+@[^@\s]+\.[^@\s]+$`).
3. Jika ditemukan kesalahan, elemen input akan ditandai dengan **warna merah** dan pesan error muncul tepat di bawahnya — tanpa reload halaman.
4. Jika semua valid, data dikirim melalui `fetch()` ke `db2_handler.php`, yang menyimpan data ke database kedua (`db2`).
5. Respons dari server ditampilkan di bawah form dengan pesan sukses seperti *“Contact data saved successfully!”*.

### Tujuan Pembelajaran

* Mengimplementasikan validasi form dinamis tanpa library tambahan.
* Memisahkan logika form dan pengolahan data ke file JavaScript terpisah.
* Membiasakan penggunaan `fetch()` modern alih-alih `XMLHttpRequest`.
* Memahami struktur komunikasi antara front-end dan back-end dalam sistem multi-database.

---

## Aspek Keamanan

* Tidak ada penggunaan `eval()` atau manipulasi DOM yang berisiko.
* Komunikasi antar form dan server hanya melalui `fetch()` menggunakan metode POST.
* Semua query SQL diproses menggunakan **prepared statement** (`$stmt->bind_param`) untuk mencegah *SQL Injection*.
* Validasi dilakukan baik di sisi klien (JavaScript) maupun di sisi server (PHP).

---

## Kesimpulan

Proyek ini memperlihatkan bagaimana AJAX dapat digunakan untuk:

* Membuat pengalaman pengguna yang lebih halus (tanpa reload halaman).
* Mengelola beberapa form berbeda dalam satu halaman.
* Menyambungkan setiap form ke database yang berbeda.
* Menjaga keamanan input serta kejelasan struktur kode.

Dengan pendekatan ini, pengembang dapat memahami prinsip dasar komunikasi asinkron antara **front-end dan back-end**, sekaligus menguasai praktik baik dalam menulis kode web yang modular dan aman.
