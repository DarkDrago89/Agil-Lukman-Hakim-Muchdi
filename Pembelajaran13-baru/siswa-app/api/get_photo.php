<?php
/**
 * Endpoint untuk serve foto siswa
 * URL: api/get_photo.php?file=siswa_2024001_xxx.jpg
 */

// Sanitize filename untuk keamanan
$filename = isset($_GET['file']) ? basename($_GET['file']) : 'default.jpg';

// Path ke foto
$photoPath = '../uploads/photos/' . $filename;

// Jika file tidak ada, gunakan default
if (!file_exists($photoPath)) {
    $photoPath = '../uploads/photos/default.jpg';
}

// Cek apakah file ada
if (!file_exists($photoPath)) {
    http_response_code(404);
    die('Foto tidak ditemukan');
}

// Get file info
$fileInfo = pathinfo($photoPath);
$extension = strtolower($fileInfo['extension']);

// Set content type berdasarkan ekstensi
$contentTypes = [
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    'webp' => 'image/webp'
];

$contentType = $contentTypes[$extension] ?? 'image/jpeg';

// Set headers
header('Content-Type: ' . $contentType);
header('Content-Length: ' . filesize($photoPath));
header('Cache-Control: public, max-age=86400'); // Cache 1 hari

// Output file
readfile($photoPath);
exit();
?>