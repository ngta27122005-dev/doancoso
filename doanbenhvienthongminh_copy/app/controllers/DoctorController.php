<?php

/**
 * Controller xử lý các chức năng liên quan đến Bác sĩ
 */
class DoctorController
{
    /**
     * Action mặc định: Hiển thị danh sách bác sĩ
     */
    public function index()
    {
        // 1. Khởi tạo Model
        $doctorModel = new DoctorModel();

        // 2. Lấy dữ liệu từ database thông qua Model
        // Dữ liệu này sẽ được truyền thẳng sang file view
        $doctors = $doctorModel->all();

        // 3. Load file View và nhúng trang HTML
        // Do được include ở đây, file view sẽ có thể truy cập mảng $doctors
        $viewFile = APP_DIR . '/views/doctors/index.php';
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }
}
