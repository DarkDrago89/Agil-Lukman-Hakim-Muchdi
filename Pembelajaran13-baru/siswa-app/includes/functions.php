<?php
function jsonResponse($success, $message, $data = null, $statusCode = 200) {
    if (ob_get_length()) ob_clean();
    
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    
    $response = [
        'success' => $success,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    if ($data !== null) {
        $response['data'] = $data;
    }
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit();
}

function validateNIS($nis) {
    if (empty($nis)) {
        return ['valid' => false, 'message' => 'NIS tidak boleh kosong'];
    }
    if (!preg_match('/^[0-9]{7,20}$/', $nis)) {
        return ['valid' => false, 'message' => 'NIS harus berupa angka 7-20 digit'];
    }
    return ['valid' => true];
}

function validateEmail($email) {
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['valid' => false, 'message' => 'Format email tidak valid'];
    }
    return ['valid' => true];
}

function validatePhoto($file) {
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'File terlalu besar (php.ini)',
            UPLOAD_ERR_FORM_SIZE => 'File terlalu besar (form)',
            UPLOAD_ERR_PARTIAL => 'File hanya terupload sebagian',
            UPLOAD_ERR_NO_FILE => 'Tidak ada file yang diupload',
            UPLOAD_ERR_NO_TMP_DIR => 'Folder temporary tidak ada',
            UPLOAD_ERR_CANT_WRITE => 'Gagal menulis file ke disk',
            UPLOAD_ERR_EXTENSION => 'Upload dihentikan oleh ekstensi'
        ];
        $errorMsg = $errors[$file['error']] ?? 'Error tidak diketahui';
        return ['valid' => false, 'message' => 'Error upload: ' . $errorMsg];
    }

    if ($file['size'] > $maxSize) {
        return ['valid' => false, 'message' => 'Ukuran foto terlalu besar. Maksimal 2MB'];
    }

    if (!in_array($file['type'], $allowedTypes)) {
        return ['valid' => false, 'message' => 'Tipe file tidak diizinkan. Hanya JPG, PNG, GIF, WEBP'];
    }

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExtensions)) {
        return ['valid' => false, 'message' => 'Ekstensi file tidak valid'];
    }

    // Validasi apakah file benar-benar gambar
    $imageInfo = @getimagesize($file['tmp_name']);
    if ($imageInfo === false) {
        return ['valid' => false, 'message' => 'File bukan gambar yang valid'];
    }

    return ['valid' => true, 'extension' => $extension];
}

function generatePhotoFilename($nis, $extension) {
    return 'siswa_' . $nis . '_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
}

function deleteOldPhoto($filename) {
    if ($filename && $filename !== 'default.jpg') {
        $filepath = __DIR__ . '/../uploads/photos/' . $filename;
        if (file_exists($filepath)) {
            unlink($filepath);
            return true;
        }
    }
    return false;
}

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function getPhotoUrl($filename) {
    if (empty($filename) || $filename === 'default.jpg') {
        return 'uploads/photos/default.jpg';
    }
    return 'uploads/photos/' . $filename;
}
?>