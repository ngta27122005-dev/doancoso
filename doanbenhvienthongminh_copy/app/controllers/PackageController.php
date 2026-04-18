<?php

class PackageController
{
    public function index()
    {
        // Khởi tạo model và lấy danh sách các gói
        $packageModel = new PackageModel();
        $packages = $packageModel->all();

        // Gọi View hiển thị
        $viewFile = APP_DIR . '/views/packages/index.php';
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }
}
