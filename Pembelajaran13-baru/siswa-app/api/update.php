<?php
ob_start();

require_once '../config/database.php';
require_once '../includes/functions.php';

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Terima PUT atau POST
if ($_SERVER['REQUEST_METHOD'] !== 'PUT' && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method tidak diizinkan. Gunakan PUT atau POST', null, 405);
}

// Ambil data dari request
$data = json_decode(file_get_contents("php://input"), true);

// Jika tidak ada data JSON, coba dari POST
if (!$data) {
    $data = $_POST;
}

$id = isset($data['id']) ? (int)$data['id'] : null;

if (!$id) {
    jsonResponse(false, 'ID siswa tidak valid', null, 400);
}

$nama = sanitizeInput($data['nama'] ?? '');
$kelas = sanitizeInput($data['kelas'] ?? '');
$jurusan = sanitizeInput($data['jurusan'] ?? '');
$alamat = sanitizeInput($data['alamat'] ?? '');
$tanggal_lahir = sanitizeInput($data['tanggal_lahir'] ?? '');
$jenis_kelamin = sanitizeInput($data['jenis_kelamin'] ?? '');
$email = sanitizeInput($data['email'] ?? '');
$telepon = sanitizeInput($data['telepon'] ?? '');

// Validasi data wajib
if (empty($nama) || empty($kelas) || empty($jurusan) || empty($jenis_kelamin)) {
    jsonResponse(false, 'Data wajib tidak lengkap', null, 400);
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

    // Cek apakah siswa ada
    $checkQuery = "SELECT id FROM siswa WHERE id = :id";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindParam(':id', $id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() === 0) {
        jsonResponse(false, 'Data siswa tidak ditemukan', null, 404);
    }

    // Update data siswa
    $query = "UPDATE siswa SET 
              nama = :nama, 
              kelas = :kelas, 
              jurusan = :jurusan, 
              alamat = :alamat, 
              tanggal_lahir = :tanggal_lahir, 
              jenis_kelamin = :jenis_kelamin, 
              email = :email, 
              telepon = :telepon
              WHERE id = :id";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':kelas', $kelas);
    $stmt->bindParam(':jurusan', $jurusan);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
    $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telepon', $telepon);

    if ($stmt->execute()) {
        jsonResponse(true, 'Data siswa berhasil diupdate', ['id' => $id]);
    } else {
        jsonResponse(false, 'Gagal mengupdate data siswa', null, 500);
    }

} catch (PDOException $e) {
    jsonResponse(false, 'Database error: ' . $e->getMessage(), null, 500);
}