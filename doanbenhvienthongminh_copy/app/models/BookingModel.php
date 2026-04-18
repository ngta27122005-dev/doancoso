<?php

class BookingModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($data)
    {
        // Cập nhật bảng dat_lich và các cột tiếng Việt
        $query = "INSERT INTO dat_lich (ten_benh_nhan, so_dien_thoai, ngay_hen, ghi_chu) 
                  VALUES (:ten_benh_nhan, :so_dien_thoai, :ngay_hen, :ghi_chu)";
                  
        $stmt = $this->conn->prepare($query);

        // Bind data lấy từ form gửi qua (chưa đổi key form nên dùng key cũ bên controller)
        $stmt->bindParam(':ten_benh_nhan', $data['patient_name']);
        $stmt->bindParam(':so_dien_thoai', $data['phone']);
        $stmt->bindParam(':ngay_hen', $data['appointment_date']);
        $stmt->bindParam(':ghi_chu', $data['notes']);

        return $stmt->execute();
    }

    public function findByPhone($phone)
    {
        $query = "SELECT d.*, b.ho_ten as ten_bac_si 
                  FROM dat_lich d 
                  LEFT JOIN bac_si b ON d.id_bac_si = b.id 
                  WHERE d.so_dien_thoai = :so_dien_thoai 
                  ORDER BY d.ngay_hen DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':so_dien_thoai', $phone);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
