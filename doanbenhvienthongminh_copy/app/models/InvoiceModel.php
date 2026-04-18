<?php

class InvoiceModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findByCode($code)
    {
        $query = "SELECT * FROM hoa_don WHERE ma_tra_cuu = :ma_tra_cuu";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_tra_cuu', $code);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
