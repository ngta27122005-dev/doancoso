<?php

class HistoryController
{
    public function index()
    {
        $phone = '';
        $historyData = [];
        $searched = false;

        // Nếu người dùng submit form tìm kiếm
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
            
            if (!empty($phone)) {
                $bookingModel = new BookingModel();
                $historyData = $bookingModel->findByPhone($phone);
                $searched = true;
            }
        }

        $viewFile = APP_DIR . '/views/history/index.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }
}
