<?php
echo "<h1>🔧 Setup Foto Sistem Siswa</h1>";
echo "<style>body{font-family:Arial;padding:20px;} .success{color:green;} .error{color:red;} .info{color:blue;}</style>";

// 1. Buat folder uploads/photos
$photoDir = 'uploads/photos';
if (!file_exists($photoDir)) {
    if (mkdir($photoDir, 0777, true)) {
        echo "<p class='success'>✅ Folder '$photoDir' berhasil dibuat</p>";
    } else {
        echo "<p class='error'>❌ Gagal membuat folder '$photoDir'</p>";
    }
} else {
    echo "<p class='info'>ℹ️ Folder '$photoDir' sudah ada</p>";
}

// 2. Set permission
if (chmod($photoDir, 0777)) {
    echo "<p class='success'>✅ Permission folder diset ke 0777 (writable)</p>";
} else {
    echo "<p class='error'>❌ Gagal set permission</p>";
}

// 3. Buat foto default
$defaultPhoto = $photoDir . '/default.jpg';
if (!file_exists($defaultPhoto)) {
    // Cek apakah GD library tersedia
    if (!extension_loaded('gd')) {
        echo "<p class='error'>❌ GD Library tidak tersedia. Silakan upload default.jpg secara manual.</p>";
    } else {
        $width = 300;
        $height = 300;
        $image = imagecreatetruecolor($width, $height);
        
        // Background abu-abu
        $bgColor = imagecolorallocate($image, 200, 200, 200);
        imagefill($image, 0, 0, $bgColor);
        
        // Text "NO PHOTO"
        $textColor = imagecolorallocate($image, 100, 100, 100);
        $text = "NO PHOTO";
        
        // Hitung posisi center
        $fontSize = 20;
        $fontPath = null; // Gunakan built-in font
        
        // Gambar text
        imagestring($image, 5, 100, 140, $text, $textColor);
        
        // Save
        if (imagejpeg($image, $defaultPhoto, 90)) {
            echo "<p class='success'>✅ Foto default berhasil dibuat: $defaultPhoto</p>";
        } else {
            echo "<p class='error'>❌ Gagal membuat foto default</p>";
        }
        imagedestroy($image);
    }
} else {
    echo "<p class='info'>ℹ️ Foto default sudah ada</p>";
}

// 4. Test write permission
$testFile = $photoDir . '/test_write.txt';
if (file_put_contents($testFile, 'test')) {
    unlink($testFile);
    echo "<p class='success'>✅ Folder writable - Siap untuk upload!</p>";
} else {
    echo "<p class='error'>❌ FOLDER TIDAK WRITABLE! Ubah permission ke 0777</p>";
    echo "<p>Cara fix:</p>";
    echo "<ul>";
    echo "<li><strong>Windows:</strong> Klik kanan folder → Properties → Security → Edit → Full Control</li>";
    echo "<li><strong>Linux/Mac:</strong> Jalankan: <code>chmod -R 777 uploads/photos</code></li>";
    echo "</ul>";
}

// 5. Cek konfigurasi PHP
echo "<h2>⚙️ Konfigurasi PHP</h2>";
echo "<table border='1' cellpadding='10' style='border-collapse:collapse;'>";
echo "<tr><th>Setting</th><th>Value</th><th>Status</th></tr>";

$uploadMaxSize = ini_get('upload_max_filesize');
$postMaxSize = ini_get('post_max_size');
$maxFileUploads = ini_get('max_file_uploads');

echo "<tr><td>upload_max_filesize</td><td>$uploadMaxSize</td><td>" . 
     (intval($uploadMaxSize) >= 2 ? "<span class='success'>✅ OK</span>" : "<span class='error'>❌ Terlalu kecil (min 2M)</span>") . 
     "</td></tr>";

echo "<tr><td>post_max_size</td><td>$postMaxSize</td><td>" . 
     (intval($postMaxSize) >= 8 ? "<span class='success'>✅ OK</span>" : "<span class='error'>❌ Terlalu kecil (min 8M)</span>") . 
     "</td></tr>";

echo "<tr><td>max_file_uploads</td><td>$maxFileUploads</td><td>" . 
     ($maxFileUploads >= 20 ? "<span class='success'>✅ OK</span>" : "<span class='info'>ℹ️ Cukup</span>") . 
     "</td></tr>";

echo "</table>";

// 6. Test akses foto
echo "<h2>🖼️ Test Akses Foto</h2>";
if (file_exists($defaultPhoto)) {
    echo "<p>Foto default:</p>";
    echo "<img src='$defaultPhoto' style='width:150px;height:150px;border:2px solid #ddd;border-radius:10px;'>";
    echo "<p class='success'>✅ Foto default dapat diakses</p>";
} else {
    echo "<p class='error'>❌ Foto default tidak ditemukan</p>";
}

echo "<hr>";
echo "<h2>✅ Setup Selesai!</h2>";
echo "<p><a href='index.html' style='padding:10px 20px;background:#007bff;color:white;text-decoration:none;border-radius:5px;'>← Kembali ke Aplikasi</a></p>";
?>