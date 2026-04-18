<?php

class InvoiceController
{
    public function index()
    {
        $code = '';
        $searched = false;
        $data = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = trim(filter_input(INPUT_POST, 'code', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
            if (!empty($code)) {
                $searched = true;
                $model = new InvoiceModel();
                $data = $model->findByCode($code);
            }
        }

        $viewFile = APP_DIR . '/views/invoice/index.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }

    public function view()
    {
        $code = isset($_GET['code']) ? trim($_GET['code']) : '';
        $action = isset($_GET['action']) ? trim($_GET['action']) : 'view';
        
        if (empty($code)) {
            die("Không tìm thấy mã hóa đơn.");
        }

        $model = new InvoiceModel();
        $data = $model->findByCode($code);

        if (!$data) {
            die("Hóa đơn không tồn tại.");
        }

        $viewFile = APP_DIR . '/views/invoice/view.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }
}
