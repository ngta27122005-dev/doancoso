<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<main class="flex-grow-1 bg-light py-5">
    <div class="container">
        <div class="text-center mb-4 animate-fade-in-up">
            <h2 class="text-primary fw-bolder"><i class="bi bi-bank me-2"></i>Chọn Ngân Hàng</h2>
            <p class="text-muted">Lựa chọn ngân hàng bạn muốn sử dụng để chuyển khoản.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow border-0 rounded-4 animate-fade-in-up">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                            <div>
                                <span class="text-muted d-block small">Mã Hóa Đơn</span>
                                <strong class="text-dark fs-5"><?= htmlspecialchars($data['ma_ho_so']) ?></strong>
                            </div>
                            <div class="text-end">
                                <span class="text-muted d-block small">Cần Thanh Toán</span>
                                <strong class="text-danger fs-5"><?= number_format($data['tong_tien'], 0, ',', '.') ?> VND</strong>
                            </div>
                        </div>

                        <h6 class="fw-bold text-dark mb-3">Ngân hàng hỗ trợ thanh toán 24/7:</h6>
                        
                        <div class="list-group list-group-flush rounded-3 border">
                            <a href="<?= BASE_URL ?>/payment/checkout?code=<?= urlencode($data['ma_ho_so']) ?>&method=vcb" class="list-group-item list-group-item-action p-3 d-flex align-items-center gap-3">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;">
                                    <i class="bi bi-wallet-fill"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold">Vietcombank</h6>
                                    <small class="text-muted">Ngân hàng TMCP Ngoại Thương</small>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </a>
                            
                            <a href="<?= BASE_URL ?>/payment/checkout?code=<?= urlencode($data['ma_ho_so']) ?>&method=mb" class="list-group-item list-group-item-action p-3 d-flex align-items-center gap-3">
                                <div class="text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px; background-color: #0b5fb3;">
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold">MB Bank</h6>
                                    <small class="text-muted">Ngân hàng TMCP Quân Đội</small>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </a>

                            <a href="<?= BASE_URL ?>/payment/checkout?code=<?= urlencode($data['ma_ho_so']) ?>&method=agribank" class="list-group-item list-group-item-action p-3 d-flex align-items-center gap-3">
                                <div class="text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px; background-color: #b52c20;">
                                    <i class="bi bi-flower1"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold">Agribank</h6>
                                    <small class="text-muted">Ngân hàng Nông nghiệp</small>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </a>

                            <a href="<?= BASE_URL ?>/payment/checkout?code=<?= urlencode($data['ma_ho_so']) ?>&method=techcombank" class="list-group-item list-group-item-action p-3 d-flex align-items-center gap-3 border-bottom-0">
                                <div class="text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px; background-color: #e31837;">
                                    <i class="bi bi-boxes"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold">Techcombank</h6>
                                    <small class="text-muted">Ngân hàng TMCP Kỹ Thương</small>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </a>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="<?= BASE_URL ?>/payment" class="btn btn-link text-secondary text-decoration-none">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
