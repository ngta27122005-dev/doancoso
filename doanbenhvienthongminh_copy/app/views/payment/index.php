<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<main class="flex-grow-1 bg-light py-5">
    <div class="container">
        <!-- Tiêu đề trang -->
        <div class="text-center mb-5 animate-fade-in-up">
            <h1 class="text-primary fw-bolder">Thanh Toán Viện Phí</h1>
            <p class="text-muted">Nhập Mã hồ sơ hoặc Mã biên lai để thanh toán trực tuyến nhanh chóng.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <!-- Kết quả gửi success từ xác nhận -->
                <?php if (isset($successMsg) && !empty($successMsg)): ?>
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> <strong><?= htmlspecialchars($successMsg) ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Form Tra cứu -->
                <?php if (!isset($searched) || !$searched): ?>
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <form action="<?= BASE_URL ?>/payment" method="POST">
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text bg-white border-end-0 text-primary">
                                    <i class="bi bi-qr-code-scan text-primary"></i>
                                </span>
                                <input type="text" name="code" class="form-control border-start-0 ps-0" 
                                       placeholder="Ví dụ: HS-123456" 
                                       value="<?= htmlspecialchars($code ?? '') ?>" required>
                                <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                    TRA CỨU
                                </button>
                            </div>
                            <div class="form-text text-center"><i class="bi bi-info-circle me-1"></i> Mã hồ sơ thường được in trên phiếu khám bệnh.</div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Kết quả hiển thị -->
                <?php if (isset($searched) && $searched): ?>
                    <?php if (empty($data)): ?>
                        <div class="alert alert-warning border-0 shadow-sm rounded-4 text-center py-5">
                            <i class="bi bi-shield-exclamation fs-1 text-warning mb-3 d-block"></i>
                            <h4 class="alert-heading fw-bold">Không tìm thấy mã hồ sơ này!</h4>
                            <p class="mb-0">Khoản viện phí mang mã <strong><?= htmlspecialchars($code) ?></strong> không tồn tại.</p>
                        </div>
                    <?php else: ?>
                        <!-- Real Data -->
                        <div class="card shadow border-0 rounded-4 animate-fade-in-up">
                            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4 text-center">
                                <?php if($data['trang_thai'] === 'da_thanh_toan'): ?>
                                    <i class="bi bi-patch-check-fill fs-1 text-success mb-2 d-block"></i>
                                    <h4 class="fw-bold text-success">Đã Thanh Toán Thành Công</h4>
                                <?php else: ?>
                                    <i class="bi bi-receipt fs-1 text-primary mb-2 d-block"></i>
                                    <h4 class="fw-bold text-dark">Thông tin Viện phí</h4>
                                <?php endif; ?>
                            </div>
                            <div class="card-body p-4">
                                <div class="bg-light p-3 rounded-3 mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Mã hồ sơ:</span>
                                        <strong class="text-dark"><?= htmlspecialchars($data['ma_ho_so']) ?></strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Bệnh nhân:</span>
                                        <strong class="text-dark"><?= htmlspecialchars($data['ten_benh_nhan']) ?></strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Nội dung:</span>
                                        <strong class="text-dark"><?= htmlspecialchars($data['noi_dung']) ?></strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Ngày tạo:</span>
                                        <strong class="text-dark"><?= date('d/m/Y - H:i', strtotime($data['ngay_tao'])) ?></strong>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted fs-5">Tổng tiền:</span>
                                        <strong class="text-danger fs-4"><?= number_format($data['tong_tien'], 0, ',', '.') ?> VND</strong>
                                    </div>
                                </div>
                                
                                <?php if($data['trang_thai'] !== 'da_thanh_toan'): ?>
                                    <h6 class="fw-bold mb-3">Chọn Cổng Thanh Toán:</h6>
                                    <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                                        <a href="<?= BASE_URL ?>/payment/checkout?code=<?= urlencode($data['ma_ho_so']) ?>" class="btn btn-outline-danger btn-lg flex-grow-1 fw-bold">
                                            <i class="bi bi-wallet2 me-2"></i> Momo
                                        </a>
                                        <a href="<?= BASE_URL ?>/payment/selectBank?code=<?= urlencode($data['ma_ho_so']) ?>" class="btn btn-outline-primary btn-lg flex-grow-1 fw-bold">
                                            <i class="bi bi-bank me-2"></i> Chuyển khoản
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
