<?php

class PaymentModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findByCode($code)
    {
        $query = "SELECT * FROM vien_phi WHERE ma_ho_so = :ma_ho_so";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_ho_so', $code);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function markAsPaid($code)
    {
        $query = "UPDATE vien_phi SET trang_thai = 'da_thanh_toan' WHERE ma_ho_so = :ma_ho_so";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_ho_so', $code);
        return $stmt->execute();
    }
}
