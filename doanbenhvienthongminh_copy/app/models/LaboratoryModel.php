<?php

class LaboratoryModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findByCode($code)
    {
        $query = "SELECT * FROM can_lam_sang WHERE ma_phieu = :ma_phieu";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_phieu', $code);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
