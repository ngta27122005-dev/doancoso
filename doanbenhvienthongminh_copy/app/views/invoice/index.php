<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<main class="flex-grow-1 bg-light py-5">
    <div class="container">
        <!-- Tiêu đề trang -->
        <div class="text-center mb-5 animate-fade-in-up">
            <h1 class="text-primary fw-bolder">Tra Cứu Hóa Đơn Điện Tử</h1>
            <p class="text-muted">Nhập Mã tra cứu hoặc Số hóa đơn để tải file PDF hóa đơn VAT.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <!-- Form Tra cứu -->
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <form action="<?= BASE_URL ?>/invoice" method="POST">
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text bg-white border-end-0 text-primary">
                                    <i class="bi bi-file-earmark-text text-primary"></i>
                                </span>
                                <input type="text" name="code" class="form-control border-start-0 ps-0" 
                                       placeholder="Ví dụ: VAT-888" 
                                       value="<?= htmlspecialchars($code ?? '') ?>" required>
                                <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                    TRA CỨU
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Kết quả hiển thị -->
                <?php if (isset($searched) && $searched): ?>
                    <?php if (empty($data)): ?>
                        <div class="alert alert-warning border-0 shadow-sm rounded-4 text-center py-5">
                            <i class="bi bi-shield-exclamation fs-1 text-warning mb-3 d-block"></i>
                            <h4 class="alert-heading fw-bold">Không tìm thấy mã Hóa Đơn!</h4>
                            <p class="mb-0">Hóa đơn mang mã <strong><?= htmlspecialchars($code) ?></strong> không tồn tại.</p>
                        </div>
                    <?php else: ?>
                        <!-- Real Data -->
                        <div class="alert alert-success border-0 shadow rounded-4 p-4 text-center animate-fade-in-up">
                            <i class="bi bi-check-circle-fill fs-1 text-success mb-3 d-block"></i>
                            <h4 class="alert-heading fw-bold">Tìm thấy Hóa Đơn Hợp Lệ!</h4>
                            <p class="mb-2">Ký hiệu: <strong><?= htmlspecialchars($data['ky_hieu']) ?></strong> - Số HĐ: <strong><?= htmlspecialchars($data['so_hoa_don']) ?></strong></p>
                            <p class="mb-3 text-secondary">Ngày lập: <?= date('d/m/Y - H:i', strtotime($data['ngay_lap'])) ?> | Tổng tiền: <?= number_format($data['tong_tien'], 0, ',', '.') ?> VND</p>
                            <hr class="mx-auto" style="width: 50%;">
                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <a href="<?= BASE_URL ?>/invoice/view?code=<?= urlencode($data['ma_tra_cuu']) ?>" target="_blank" class="btn btn-outline-success fw-bold rounded-pill px-4">
                                    <i class="bi bi-eye me-2"></i> Xem trực tuyến
                                </a>
                                <a href="<?= BASE_URL ?>/invoice/view?code=<?= urlencode($data['ma_tra_cuu']) ?>&action=download" target="_blank" class="btn btn-success fw-bold rounded-pill px-4 shadow-sm">
                                    <i class="bi bi-download me-2"></i> Tải bản thể hiện (PDF)
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
