<?php
class Database {
    private $host = "localhost";
    private $db_name = "siswa_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8mb4");
        } catch(PDOException $e) {
            // Jangan echo di sini untuk production
            error_log("Connection error: " . $e->getMessage());
            return null;
        }
        return $this->conn;
    }
}
// JANGAN tutup dengan ?>