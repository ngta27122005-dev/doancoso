<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeModel extends Model {
    protected $table = 'notifications';
    protected $fillable = ['title', 'message', 'is_read', 'created_at', 'updated_at'];

    // Create a notification
    public function createNotification($data) {
        return $this->create($data);
    }

    // Read all notifications
    public function getAllNotifications() {
        return $this->all();
    }

    // Read a single notification by id
    public function getNotificationById($id) {
        return $this->find($id);
    }

    // Update a notification
    public function updateNotification($id, $data) {
        $notification = $this->find($id);
        if ($notification) {
            $notification->update($data);
            return $notification;
        }
        return null;
    }

    // Delete a notification
    public function deleteNotification($id) {
        $notification = $this->find($id);
        if ($notification) {
            return $notification->delete();
        }
        return false;
    }
}
