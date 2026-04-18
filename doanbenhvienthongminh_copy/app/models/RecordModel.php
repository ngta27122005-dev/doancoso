<?php

class RecordModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findByPid($pid)
    {
        $query = "SELECT * FROM ho_so_suc_khoe WHERE pid = :pid";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
