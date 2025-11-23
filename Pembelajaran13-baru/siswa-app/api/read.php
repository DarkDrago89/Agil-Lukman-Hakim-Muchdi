<?php
ob_start();

require_once '../config/database.php';
require_once '../includes/functions.php';

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    jsonResponse(false, 'Method tidak diizinkan', null, 405);
}

try {
    $database = new Database();
    $db = $database->getConnection();
    
    if (!$db) {
        jsonResponse(false, 'Koneksi database gagal', null, 500);
    }

    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($id) {
        $query = "SELECT * FROM siswa WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $siswa = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Generate foto URL
            $siswa['foto_url'] = getPhotoUrl($siswa['foto']);
            $siswa['foto_full_url'] = 'http://' . $_SERVER['HTTP_HOST'] . '/siswa-app/' . $siswa['foto_url'];
            
            jsonResponse(true, 'Data siswa ditemukan', $siswa);
        } else {
            jsonResponse(false, 'Data siswa tidak ditemukan', null, 404);
        }
    } else {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $offset = ($page - 1) * $limit;

        $whereClause = '';
        $params = [];
        
        if (!empty($search)) {
            $whereClause = "WHERE nis LIKE :search OR nama LIKE :search OR kelas LIKE :search OR jurusan LIKE :search";
            $params[':search'] = "%{$search}%";
        }

        $countQuery = "SELECT COUNT(*) as total FROM siswa " . $whereClause;
        $countStmt = $db->prepare($countQuery);
        foreach ($params as $key => $value) {
            $countStmt->bindValue($key, $value);
        }
        $countStmt->execute();
        $total = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

        $query = "SELECT * FROM siswa " . $whereClause . " ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $db->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $siswaList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Generate foto URL untuk setiap siswa
            $row['foto_url'] = getPhotoUrl($row['foto']);
            $row['foto_full_url'] = 'http://' . $_SERVER['HTTP_HOST'] . '/siswa-app/' . $row['foto_url'];
            $siswaList[] = $row;
        }

        jsonResponse(true, 'Data siswa berhasil diambil', [
            'siswa' => $siswaList,
            'pagination' => [
                'total' => (int)$total,
                'page' => $page,
                'limit' => $limit,
                'total_pages' => ceil($total / $limit)
            ]
        ]);
    }

} catch (PDOException $e) {
    jsonResponse(false, 'Database error: ' . $e->getMessage(), null, 500);
}
?>
