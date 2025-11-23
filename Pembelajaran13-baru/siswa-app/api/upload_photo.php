<?php
ob_start();

require_once '../config/database.php';
require_once '../includes/functions.php';

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method tidak diizinkan. Gunakan POST', null, 405);
}

$siswa_id = isset($_POST['siswa_id']) ? (int)$_POST['siswa_id'] : null;

if (!$siswa_id) {
    jsonResponse(false, 'ID siswa tidak valid', null, 400);
}

if (!isset($_FILES['foto']) || $_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE) {
    jsonResponse(false, 'Tidak ada foto yang diupload', null, 400);
}

// Path absolut untuk upload
$uploadDir = __DIR__ . '/../uploads/photos/';

// Buat folder jika belum ada
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

try {
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        jsonResponse(false, 'Koneksi database gagal', null, 500);
    }

    // Cek apakah siswa ada dan ambil NIS dan foto lama
    $checkQuery = "SELECT nis, foto FROM siswa WHERE id = :id";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindParam(':id', $siswa_id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() === 0) {
        jsonResponse(false, 'Data siswa tidak ditemukan', null, 404);
    }

    $siswa = $checkStmt->fetch(PDO::FETCH_ASSOC);

    // Validasi foto
    $validation = validatePhoto($_FILES['foto']);
    if (!$validation['valid']) {
        jsonResponse(false, $validation['message'], null, 400);
    }

    // Generate nama file unik
    $newFilename = generatePhotoFilename($siswa['nis'], $validation['extension']);
    $targetPath = $uploadDir . $newFilename;

    // Upload foto
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetPath)) {
        // Update database
        $updateQuery = "UPDATE siswa SET foto = :foto WHERE id = :id";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindParam(':foto', $newFilename);
        $updateStmt->bindParam(':id', $siswa_id);

        if ($updateStmt->execute()) {
            // Hapus foto lama (kecuali default.jpg)
            if ($siswa['foto'] && $siswa['foto'] !== 'default.jpg') {
                $oldPhotoPath = $uploadDir . $siswa['foto'];
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            jsonResponse(true, 'Foto berhasil diupload', [
                'filename' => $newFilename,
                'url' => 'uploads/photos/' . $newFilename,
                'full_url' => $_SERVER['HTTP_HOST'] . '/siswa-app/uploads/photos/' . $newFilename
            ]);
        } else {
            // Hapus foto baru jika gagal update database
            unlink($targetPath);
            jsonResponse(false, 'Gagal menyimpan foto ke database', null, 500);
        }
    } else {
        jsonResponse(false, 'Gagal mengupload foto. Cek permission folder uploads/photos/', null, 500);
    }

} catch (PDOException $e) {
    jsonResponse(false, 'Database error: ' . $e->getMessage(), null, 500);
}
?>