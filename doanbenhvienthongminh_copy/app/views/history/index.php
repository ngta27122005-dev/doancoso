<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<main class="flex-grow-1 bg-light py-5">
    <div class="container">
        <!-- Tiêu đề trang -->
        <div class="text-center mb-5 animate-fade-in-up">
            <h1 class="text-primary fw-bolder">Lịch Sử Đặt Khám</h1>
            <p class="text-muted">Nhập số điện thoại của bạn để tra cứu các lần hẹn và trạng thái đặt khám.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Form Tra cứu -->
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <form action="<?= BASE_URL ?>/history" method="POST" class="d-flex gx-3 align-items-center">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-white border-end-0 text-primary">
                                    <i class="bi bi-telephone text-primary"></i>
                                </span>
                                <input type="tel" name="phone" id="phone" class="form-control border-start-0 ps-0" 
                                       placeholder="Nhập số điện thoại đã đăng ký..." 
                                       value="<?= htmlspecialchars($phone ?? '') ?>" required>
                                <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                    <i class="bi bi-search me-2"></i> TRA CỨU
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Kết quả hiển thị -->
                <?php if (isset($searched) && $searched): ?>
                    <?php if (empty($historyData)): ?>
                        <div class="alert alert-warning border-0 shadow-sm rounded-4 text-center py-5">
                            <i class="bi bi-clipboard-x fs-1 text-warning mb-3 d-block"></i>
                            <h4 class="alert-heading fw-bold">Không tìm thấy dữ liệu!</h4>
                            <p class="mb-0">Số điện thoại <strong><?= htmlspecialchars($phone) ?></strong> chưa từng đặt lịch khám tại hệ thống của chúng tôi.</p>
                        </div>
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h4 class="fw-bold mb-0 text-dark"><i class="bi bi-journal-text text-primary me-2"></i>Kết Quả Tra Cứu</h4>
                            <span class="badge bg-success rounded-pill px-3 py-2">Trùng khớp <?= count($historyData) ?> lịch hẹn</span>
                        </div>

                        <!-- Danh sách lịch hẹn -->
                        <?php foreach($historyData as $item): ?>
                            <?php
                                // Chuyển đổi trạng thái sang text và màu
                                $statusBadge = 'bg-secondary';
                                $statusText = 'Đang chờ';
                                if ($item['trang_thai'] === 'da_xac_nhan') { $statusBadge = 'bg-primary'; $statusText = 'Đã xác nhận'; }
                                elseif ($item['trang_thai'] === 'hoan_thanh') { $statusBadge = 'bg-success'; $statusText = 'Hoàn thành'; }
                                elseif ($item['trang_thai'] === 'da_huy') { $statusBadge = 'bg-danger'; $statusText = 'Đã hủy'; }
                            ?>
                            <div class="card shadow-sm border-0 rounded-4 mb-3 position-relative overflow-hidden transition-hover">
                                <div class="position-absolute top-0 start-0 w-100 <?= str_replace('bg-', 'bg-', $statusBadge) ?>" style="height: 4px;"></div>
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <h5 class="fw-bold mb-0 text-dark"><?= htmlspecialchars($item['ten_benh_nhan']) ?></h5>
                                                <span class="badge <?= $statusBadge ?> rounded-pill"><?= $statusText ?></span>
                                            </div>
                                            <p class="text-muted mb-2"><i class="bi bi-calendar-event me-2"></i> Lịch hẹn: <strong class="text-dark"><?= date('d/m/Y - H:i', strtotime($item['ngay_hen'])) ?></strong></p>
                                            <p class="text-muted mb-0"><i class="bi bi-person-badge me-2"></i> Bác sĩ: <strong class="text-primary"><?= $item['ten_bac_si'] ? htmlspecialchars($item['ten_bac_si']) : 'Đang sắp xếp' ?></strong></p>
                                        </div>
                                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                            <?php if (!empty($item['ghi_chu'])): ?>
                                                <button class="btn btn-sm btn-outline-secondary rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#note-<?= $item['id'] ?>">
                                                    Xem Ghi Chú <i class="bi bi-chevron-down ms-1"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($item['ghi_chu'])): ?>
                                        <div class="collapse mt-3" id="note-<?= $item['id'] ?>">
                                            <div class="p-3 bg-light rounded-3 text-secondary border">
                                                <strong>Ghi chú:</strong> <?= nl2br(htmlspecialchars($item['ghi_chu'])) ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<style>
.transition-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
.transition-hover:hover { transform: translateY(-3px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
</style>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
