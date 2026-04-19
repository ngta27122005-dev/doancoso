<?php

class NoticeModel {
    // Database connection
    private $conn;
    private $table = 'notices';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a notice
    public function create($title, $content, $type, $recipient_id) {
        $query = "INSERT INTO " . $this->table . " (title, content, type, recipient_id, is_read, created_at, updated_at) VALUES (:title, :content, :type, :recipient_id, 0, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':recipient_id', $recipient_id);
        return $stmt->execute();
    }

    // Retrieve all notices
    public function getAllNotices() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Retrieve unread notices
    public function getUnreadNotices() {
        $query = "SELECT * FROM " . $this->table . " WHERE is_read = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Mark a notice as read
    public function markAsRead($id) {
        $query = "UPDATE " . $this->table . " SET is_read = 1, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Update a notice
    public function update($id, $title, $content, $type, $recipient_id) {
        $query = "UPDATE " . $this->table . " SET title = :title, content = :content, type = :type, recipient_id = :recipient_id, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':recipient_id', $recipient_id);
        return $stmt->execute();
    }

    // Delete a notice
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
