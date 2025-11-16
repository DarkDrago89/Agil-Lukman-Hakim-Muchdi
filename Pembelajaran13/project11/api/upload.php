<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../config/database.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Method tidak diizinkan', null, 405);
}

if (!isset($_FILES['photos']) || empty($_FILES['photos']['name'][0])) {
    jsonResponse(false, 'Tidak ada file yang diupload', null, 400);
}

$uploadDir = '../uploads/photos/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$database = new Database();
$db = $database->getConnection();

$uploadedFiles = [];
$errors = [];

// Handle multiple files
$fileCount = count($_FILES['photos']['name']);

if ($fileCount > 10) {
    jsonResponse(false, 'Maksimal 10 file yang dapat diupload sekaligus', null, 400);
}

for ($i = 0; $i < $fileCount; $i++) {
    $file = [
        'name' => $_FILES['photos']['name'][$i],
        'type' => $_FILES['photos']['type'][$i],
        'tmp_name' => $_FILES['photos']['tmp_name'][$i],
        'error' => $_FILES['photos']['error'][$i],
        'size' => $_FILES['photos']['size'][$i]
    ];

    // Validasi file
    $validation = validateImage($file);
    if (!$validation['valid']) {
        $errors[] = [
            'file' => $file['name'],
            'error' => $validation['message']
        ];
        continue;
    }

    // Generate nama file unik
    $newFilename = generateUniqueFilename($file['name']);
    $targetPath = $uploadDir . $newFilename;

    // Upload file
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        try {
            // Simpan ke database
            $query = "INSERT INTO photos (filename, original_name, file_path, file_size, mime_type, uploaded_by) 
                      VALUES (:filename, :original_name, :file_path, :file_size, :mime_type, :uploaded_by)";
            
            $stmt = $db->prepare($query);
            $stmt->bindParam(':filename', $newFilename);
            $stmt->bindParam(':original_name', $file['name']);
            $stmt->bindParam(':file_path', $targetPath);
            $stmt->bindParam(':file_size', $file['size']);
            $stmt->bindParam(':mime_type', $file['type']);
            $uploadedBy = $_POST['uploaded_by'] ?? 'Guest';
            $stmt->bindParam(':uploaded_by', $uploadedBy);

            if ($stmt->execute()) {
                $uploadedFiles[] = [
                    'id' => $db->lastInsertId(),
                    'filename' => $newFilename,
                    'original_name' => $file['name'],
                    'size' => $file['size'],
                    'url' => str_replace('../', '', $targetPath)
                ];
            }
        } catch (PDOException $e) {
            $errors[] = [
                'file' => $file['name'],
                'error' => 'Database error: ' . $e->getMessage()
            ];
            deleteFile($targetPath);
        }
    } else {
        $errors[] = [
            'file' => $file['name'],
            'error' => 'Gagal memindahkan file'
        ];
    }
}

if (!empty($uploadedFiles)) {
    jsonResponse(true, count($uploadedFiles) . ' foto berhasil diupload', [
        'uploaded' => $uploadedFiles,
        'errors' => $errors
    ]);
} else {
    jsonResponse(false, 'Tidak ada file yang berhasil diupload', ['errors' => $errors], 400);
}
?>