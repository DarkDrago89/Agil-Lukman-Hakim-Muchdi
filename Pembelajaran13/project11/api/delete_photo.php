<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');

require_once '../config/database.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE' && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method tidak diizinkan', null, 405);
}

// Get ID from URL or POST data
$id = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = isset($data['id']) ? (int)$data['id'] : null;
}

if (!$id) {
    jsonResponse(false, 'ID foto tidak valid', null, 400);
}

$database = new Database();
$db = $database->getConnection();

try {
    // Get file info
    $query = "SELECT file_path FROM photos WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        jsonResponse(false, 'Foto tidak ditemukan', null, 404);
    }

    $photo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Delete from database
    $deleteQuery = "DELETE FROM photos WHERE id = :id";
    $deleteStmt = $db->prepare($deleteQuery);
    $deleteStmt->bindParam(':id', $id);
    
    if ($deleteStmt->execute()) {
        // Delete physical file
        deleteFile($photo['file_path']);
        jsonResponse(true, 'Foto berhasil dihapus');
    } else {
        jsonResponse(false, 'Gagal menghapus foto', null, 500);
    }

} catch (PDOException $e) {
    jsonResponse(false, 'Database error: ' . $e->getMessage(), null, 500);
}
?>