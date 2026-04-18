<?php

/**
 * Controller xử lý chức năng Đặt Lịch Khám
 */
class BookingController
{
    /**
     * Action hiển thị giao diện form đặt lịch
     */
    public function index()
    {
        $viewFile = APP_DIR . '/views/booking/index.php';
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }

    /**
     * Action tiếp nhận dữ liệu POST từ form và gọi Model để lưu
     */
    public function store()
    {
        // Chỉ chấp nhận request dạng POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Xóa khoảng trắng và kiểm tra, lọc dữ liệu đầu vào (Phòng chống XSS)
            // Lưu ý: FILTER_SANITIZE_FULL_SPECIAL_CHARS sẽ decode các kí tự đặc biệt thành thực thể HTML
            $patient_name = trim(filter_input(INPUT_POST, 'patient_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
            $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
            $appointment_date = trim(filter_input(INPUT_POST, 'appointment_date', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');
            $notes = trim(filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '');

            // Validate đơn giản: Đảm bảo các field bắt buộc có chứa dữ liệu
            if (empty($patient_name) || empty($phone) || empty($appointment_date)) {
                die("<h2>Lỗi:</h2> <p>Vui lòng điền đầy đủ Tên, Số điện thoại và Ngày khám.</p>");
            }

            // Gói dữ liệu an toàn vào mảng
            $data = [
                'patient_name' => $patient_name,
                'phone' => $phone,
                'appointment_date' => $appointment_date,
                'notes' => $notes
            ];

            // Gọi model xử lý lưu trữ CSDL
            $bookingModel = new BookingModel();
            
            if ($bookingModel->create($data)) {
                // Đặt lịch thành công, hiển thị Alert thông báo và Redirect về Trang Chủ
                echo "<script>
                        alert('✅ Đặt lịch khám thành công! Bệnh viện sẽ liên hệ lại qua số điện thoại của bạn trong thời gian sớm nhất.');
                        window.location.href = '" . BASE_URL . "/';
                      </script>";
            } else {
                echo "<script>
                        alert('❌ Đã xảy ra lỗi trong quá trình đặt lịch. Vui lòng thử lại sau.');
                        window.history.back();
                      </script>";
            }

        } else {
            // Nếu người dùng gõ URL thủ công /booking/store, đẩy họ về lại form
            header("Location: " . BASE_URL . "/booking");
            exit;
        }
    }
}
