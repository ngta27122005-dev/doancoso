<?php

class RecordController
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
                $model = new RecordModel();
                $data = $model->findByPid($code);
            }
        }

        $viewFile = APP_DIR . '/views/record/index.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy file view {$viewFile}";
        }
    }
}
