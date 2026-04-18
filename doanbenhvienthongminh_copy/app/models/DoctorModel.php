<?php

class DoctorModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function all()
    {
        // Cập nhật truy vấn dùng các bảng chuẩn: bac_si, chuyen_khoa
        $query = "SELECT 
                    bac_si.id, 
                    bac_si.ho_ten, 
                    chuyen_khoa.ten_khoa as chuyen_khoa, 
                    bac_si.hinh_anh 
                  FROM bac_si 
                  LEFT JOIN chuyen_khoa ON bac_si.id_chuyen_khoa = chuyen_khoa.id";
                  
        $stmt = $this->conn->prepare($query);
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
