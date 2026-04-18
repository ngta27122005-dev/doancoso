<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-info">Gói Khám Sức Khoẻ Định Kỳ</h1>
        <p class="lead text-muted">Lựa chọn gói khám lâm sàng chuyên sâu theo chuẩn y tế, tối ưu chi phí và theo dõi toàn diện cơ thể.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if (!empty($packages)): ?>
            <?php foreach ($packages as $pkg): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-info border-top border-4 rounded-4 transition-hover">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title fw-bold text-primary mb-3"><?= htmlspecialchars($pkg['ten_goi']) ?></h4>
                            <h2 class="card-subtitle mb-4 text-danger fw-bold">
                                <?= number_format($pkg['gia_tien'], 0, ',', '.') ?> VNĐ
                            </h2>
                            <p class="card-text text-muted mb-4"><?= htmlspecialchars($pkg['mo_ta']) ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-4 pt-0 text-center">
                            <a href="<?= BASE_URL ?>/booking" class="btn btn-outline-info rounded-pill px-4 fw-bold">ĐẶT GÓI NÀY</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 py-5 text-center text-muted bg-white rounded-3 shadow-sm w-100">
                <h4 class="fw-normal">Hiện chưa có gói khám nào được thiết lập.</h4>
                <p><i>(Dữ liệu bảng `goi_kham` trống hoặc bảng chưa được tạo trong CSDL)</i></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
/* CSS nội tuyến nhỏ bổ sung hiệu ứng hover cho package card */
.transition-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.transition-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
</style>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
