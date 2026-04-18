<?php

class PaymentController
{
    public function index()
    {
        $code = '';
        $searched = false;
        $data = null;
        $successMsg = '';

        // Handle success flash message if coming from confirm
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            $successMsg = "Thanh toán hệ thống nội bộ thành công!";
            // Auto look up the code if passed back
            if (isset($_GET['code'])) {
                $_POST['code'] = $_GET['code'];
                $_SERVER['REQUEST_METHOD'] = 'POST';
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = trim(filter_input(INPUT_POST, 'code', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
            if (!empty($code)) {
                $searched = true;
                $model = new PaymentModel();
                $data = $model->findByCode($code);
            }
        }

        $viewFile = APP_DIR . '/views/payment/index.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }

    public function selectBank()
    {
        $code = isset($_GET['code']) ? trim($_GET['code']) : '';
        if (empty($code)) {
            header('Location: ' . BASE_URL . '/payment');
            exit;
        }

        $model = new PaymentModel();
        $data = $model->findByCode($code);

        if (!$data || $data['trang_thai'] === 'da_thanh_toan') {
            header('Location: ' . BASE_URL . '/payment');
            exit;
        }

        $viewFile = APP_DIR . '/views/payment/select_bank.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }

    public function checkout()
    {
        $code = isset($_GET['code']) ? trim($_GET['code']) : '';
        $method = isset($_GET['method']) ? trim($_GET['method']) : 'momo';
        
        if (empty($code)) {
            header('Location: ' . BASE_URL . '/payment');
            exit;
        }

        $model = new PaymentModel();
        $data = $model->findByCode($code);

        if (!$data || $data['trang_thai'] === 'da_thanh_toan') {
            header('Location: ' . BASE_URL . '/payment');
            exit;
        }

        $viewFile = APP_DIR . '/views/payment/checkout.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }

    public function confirm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = isset($_POST['code']) ? trim($_POST['code']) : '';
            if (!empty($code)) {
                $model = new PaymentModel();
                $model->markAsPaid($code);
                
                // Redirect back to index with success
                header('Location: ' . BASE_URL . '/payment/index?success=1&code=' . urlencode($code));
                exit;
            }
        }
        header('Location: ' . BASE_URL . '/payment');
        exit;
    }
}
