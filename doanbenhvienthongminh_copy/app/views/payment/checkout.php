<?php 
require_once APP_DIR . '/views/layouts/header.php'; 

// Determine Theme
$themeColor = 'danger'; // Default Momo
$icon = 'bi-wallet2';
$methodName = 'Momo';
$accountNo = '0987.654.321';

if ($method === 'vcb') {
    $themeColor = 'success';
    $icon = 'bi-bank';
    $methodName = 'Vietcombank';
    $accountNo = '0331000123456';
} elseif ($method === 'mb') {
    $themeColor = 'primary';
    $icon = 'bi-building';
    $methodName = 'MB Bank';
    $accountNo = '999988887777';
} elseif ($method === 'agribank') {
    $themeColor = 'warning';
    $icon = 'bi-tree';
    $methodName = 'Agribank';
    $accountNo = '1500201234567';
} elseif ($method === 'techcombank') {
    $themeColor = 'danger';
    $icon = 'bi-boxes';
    $methodName = 'Techcombank';
    $accountNo = '19031234567890';
}
?>

<main class="flex-grow-1 bg-light py-5">
    <div class="container">
        <!-- Tiêu đề trang -->
        <div class="text-center mb-4 animate-fade-in-up">
            <h2 class="text-<?= $themeColor ?> fw-bolder"><i class="bi <?= $icon ?> me-2"></i>Thanh Toán <?= $methodName ?></h2>
            <p class="text-muted">Vui lòng mở ứng dụng <?= $methodName ?> tương ứng và quét mã QR bên dưới.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <!-- QR Box -->
                <div class="card shadow-lg border-0 rounded-4 mb-4 text-center overflow-hidden animate-fade-in-up">
                    <div class="card-header bg-<?= $themeColor ?> text-white py-3 border-0">
                        <h5 class="mb-0 fw-bold">Thông tin chuyển khoản</h5>
                    </div>
                    <div class="card-body p-5 bg-white position-relative">
                        <!-- Tạo giao diện thẻ ngân hàng giả lập QR -->
                        <div class="border rounded-4 p-4 d-inline-block border-2 border-<?= $themeColor ?> mb-4 shadow-sm" style="border-style: dashed !important;">
                            <!-- Thay bằng ảnh QR Momo thật hoặc placeholder QR sinh ra -->
                            <i class="bi bi-qr-code text-<?= $themeColor ?>" style="font-size: 8rem; line-height: 1;"></i>
                        </div>
                        
                        <h4 class="fw-bold text-dark mb-1">LIÊN HOA HOSPITAL</h4>
                        <p class="text-muted mb-4 fs-5"><?= $methodName ?>: <?= $accountNo ?></p>

                        <div class="bg-light p-3 rounded-3 text-start">
                            <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                                <span class="text-secondary">Số tiền:</span>
                                <strong class="text-danger fs-5"><?= number_format($data['tong_tien'], 0, ',', '.') ?> VND</strong>
                            </div>
                            <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                                <span class="text-secondary">Nội dung:</span>
                                <strong class="text-dark"><?= htmlspecialchars($data['ma_ho_so']) ?> THANH TOAN</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-secondary">Bệnh nhân:</span>
                                <strong class="text-dark"><?= htmlspecialchars($data['ten_benh_nhan']) ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nút Xác nhận giả lập -->
                <div class="card shadow-sm border-0 rounded-4 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="card-body p-4 text-center">
                        <p class="text-muted small mb-3"><i class="bi bi-info-circle me-1"></i>Hệ thống tự động duyệt sau 1-3 phút. Nếu bạn đang test đồ án, bấm nút bên dưới để bỏ qua vòng chờ duyệt.</p>
                        <form action="<?= BASE_URL ?>/payment/confirm" method="POST">
                            <input type="hidden" name="code" value="<?= htmlspecialchars($data['ma_ho_so']) ?>">
                            <button type="submit" class="btn btn-<?= $themeColor ?> btn-lg w-100 fw-bold shadow-sm rounded-pill">
                                <i class="bi bi-check2-circle me-2"></i> Xác Nhận Đã Chuyển Khoản
                            </button>
                        </form>
                        <a href="<?= BASE_URL ?>/payment" class="btn btn-link text-secondary mt-2 text-decoration-none"><i class="bi bi-arrow-left me-1"></i> Hủy giao dịch</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
