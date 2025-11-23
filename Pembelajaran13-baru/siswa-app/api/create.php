<?php
ob_start();

require_once '../config/database.php';
require_once '../includes/functions.php';

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Cek method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method tidak diizinkan. Gunakan POST', null, 405);
}

// Ambil data dari request
$nis = sanitizeInput($_POST['nis'] ?? '');
$nama = sanitizeInput($_POST['nama'] ?? '');
$kelas = sanitizeInput($_POST['kelas'] ?? '');
$jurusan = sanitizeInput($_POST['jurusan'] ?? '');
$alamat = sanitizeInput($_POST['alamat'] ?? '');
$tanggal_lahir = sanitizeInput($_POST['tanggal_lahir'] ?? '');
$jenis_kelamin = sanitizeInput($_POST['jenis_kelamin'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$telepon = sanitizeInput($_POST['telepon'] ?? '');

// Validasi data wajib
if (empty($nis) || empty($nama) || empty($kelas) || empty($jurusan) || empty($jenis_kelamin)) {
    jsonResponse(false, 'Data wajib tidak lengkap (NIS, Nama, Kelas, Jurusan, Jenis Kelamin)', null, 400);
}

// Validasi NIS
$nisValidation = validateNIS($nis);
if (!$nisValidation['valid']) {
    jsonResponse(false, $nisValidation['message'], null, 400);
}

// Validasi email
if (!empty($email)) {
    $emailValidation = validateEmail($email);
    if (!$emailValidation['valid']) {
        jsonResponse(false, $emailValidation['message'], null, 400);
    }
}

try {
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        jsonResponse(false, 'Koneksi database gagal', null, 500);
    }

    // Cek apakah NIS sudah ada
    $checkQuery = "SELECT id FROM siswa WHERE nis = :nis";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindParam(':nis', $nis);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        jsonResponse(false, 'NIS sudah terdaftar', null, 409);
    }

    // Insert data siswa
    $query = "INSERT INTO siswa (nis, nama, kelas, jurusan, alamat, tanggal_lahir, jenis_kelamin, email, telepon) 
              VALUES (:nis, :nama, :kelas, :jurusan, :alamat, :tanggal_lahir, :jenis_kelamin, :email, :telepon)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nis', $nis);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':kelas', $kelas);
    $stmt->bindParam(':jurusan', $jurusan);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
    $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telepon', $telepon);

    if ($stmt->execute()) {
        $siswaId = $db->lastInsertId();
        
        jsonResponse(true, 'Data siswa berhasil ditambahkan', [
            'id' => $siswaId,
            'nis' => $nis,
            'nama' => $nama
        ], 201);
    } else {
        jsonResponse(false, 'Gagal menambahkan data siswa', null, 500);
    }

} catch (PDOException $e) {
    jsonResponse(false, 'Database error: ' . $e->getMessage(), null, 500);
}
