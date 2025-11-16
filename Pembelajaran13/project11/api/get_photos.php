<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once '../config/database.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    jsonResponse(false, 'Method tidak diizinkan', null, 405);
}

$database = new Database();
$db = $database->getConnection();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$offset = ($page - 1) * $limit;

try {
    // Get total count
    $countQuery = "SELECT COUNT(*) as total FROM photos";
    $countStmt = $db->prepare($countQuery);
    $countStmt->execute();
    $total = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Get photos
    $query = "SELECT id, filename, original_name, file_path, file_size, mime_type, uploaded_by, uploaded_at 
              FROM photos 
              ORDER BY uploaded_at DESC 
              LIMIT :limit OFFSET :offset";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $photos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $photos[] = [
            'id' => $row['id'],
            'filename' => $row['filename'],
            'original_name' => $row['original_name'],
            'url' => str_replace('../', '', $row['file_path']),
            'size' => $row['file_size'],
            'mime_type' => $row['mime_type'],
            'uploaded_by' => $row['uploaded_by'],
            'uploaded_at' => $row['uploaded_at']
        ];
    }

    jsonResponse(true, 'Data berhasil diambil', [
        'photos' => $photos,
        'pagination' => [
            'total' => (int)$total,
            'page' => $page,
            'limit' => $limit,
            'total_pages' => ceil($total / $limit)
        ]
    ]);

} catch (PDOException $e) {
    jsonResponse(false, 'Database error: ' . $e->getMessage(), null, 500);
}
?>