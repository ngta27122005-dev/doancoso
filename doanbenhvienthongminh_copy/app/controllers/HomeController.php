<?php
class HomeController {
    public function index() {
        $viewFile = APP_DIR . '/views/home/index.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }
}
