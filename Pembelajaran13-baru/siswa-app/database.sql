CREATE DATABASE IF NOT EXISTS siswa_db;
USE siswa_db;

CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    alamat TEXT,
    tanggal_lahir DATE,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    email VARCHAR(100),
    telepon VARCHAR(15),
    foto VARCHAR(255) DEFAULT 'default.jpg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_nis (nis),
    INDEX idx_nama (nama),
    INDEX idx_kelas (kelas)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data
INSERT INTO siswa (nis, nama, kelas, jurusan, alamat, tanggal_lahir, jenis_kelamin, email, telepon) VALUES
('2024001', 'Ahmad Fauzi', '12', 'RPL', 'Jl. Merdeka No. 10, Surabaya', '2006-05-15', 'Laki-laki', 'ahmad@email.com', '081234567890'),
('2024002', 'Siti Nurhaliza', '12', 'TKJ', 'Jl. Diponegoro No. 25, Surabaya', '2006-08-20', 'Perempuan', 'siti@email.com', '081234567891'),
('2024003', 'Budi Santoso', '11', 'RPL', 'Jl. Sudirman No. 5, Surabaya', '2007-03-10', 'Laki-laki', 'budi@email.com', '081234567892');
