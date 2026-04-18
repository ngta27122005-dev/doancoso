<?php

class PackageModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function all()
    {
        // Cập nhật truy vấn gọi bảng goi_kham và các cột tiếng Việt
        $query = "SELECT id, ten_goi, mo_ta, gia_tien FROM goi_kham";
        $stmt = $this->conn->prepare($query);
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
