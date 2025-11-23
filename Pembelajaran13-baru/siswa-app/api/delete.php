<?php
ob_start();

require_once '../config/database.php';
require_once '../includes/functions.php';

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Terima DELETE atau POST
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE' && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method tidak diizinkan. Gunakan DELETE atau POST', null, 405);
}

// Get ID
$id = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = isset($data['id']) ? (int)$data['id'] : null;
}

if (!$id) {
    jsonResponse(false, 'ID siswa tidak valid', null, 400);
}

try {
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        jsonResponse(false, 'Koneksi database gagal', null, 500);
    }

    // Get foto siswa untuk dihapus
    $query = "SELECT foto FROM siswa WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        jsonResponse(false, 'Data siswa tidak ditemukan', null, 404);
    }

    $siswa = $stmt->fetch(PDO::FETCH_ASSOC);

    // Delete dari database
    $deleteQuery = "DELETE FROM siswa WHERE id = :id";
    $deleteStmt = $db->prepare($deleteQuery);
    $deleteStmt->bindParam(':id', $id);
    
    if ($deleteStmt->execute()) {
        // Hapus foto jika ada
        deleteOldPhoto($siswa['foto']);
        jsonResponse(true, 'Data siswa berhasil dihapus');
    } else {
        jsonResponse(false, 'Gagal menghapus data siswa', null, 500);
    }

} catch (PDOException $e) {
    jsonResponse(false, 'Database error: ' . $e->getMessage(), null, 500);
}