<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<main class="flex-grow-1 bg-light py-5">
    <div class="container">
        <!-- Tiêu đề trang -->
        <div class="text-center mb-5 animate-fade-in-up">
            <h1 class="text-primary fw-bolder">Hồ Sơ Sức Khỏe Điện Tử</h1>
            <p class="text-muted">Nhập Mã y tế (PID) hoặc Quét mã QR thẻ BHYT để tra cứu hồ sơ khám chữa bệnh.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Form Tra cứu -->
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <form action="<?= BASE_URL ?>/record" method="POST">
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text bg-white border-end-0 text-primary">
                                    <i class="bi bi-person-vcard text-primary"></i>
                                </span>
                                <input type="text" name="code" class="form-control border-start-0 ps-0" 
                                       placeholder="Ví dụ: PID-987654321" 
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
                            <h4 class="alert-heading fw-bold">Không tìm thấy Hồ sơ!</h4>
                            <p class="mb-0">Bệnh nhân mang mã số <strong><?= htmlspecialchars($code) ?></strong> không có hồ sơ tại đây.</p>
                        </div>
                    <?php else: ?>
                        <!-- Real Data -->
                        <div class="card shadow border-0 rounded-4 animate-fade-in-up overflow-hidden">
                            <div class="card-header bg-primary text-white p-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="bi bi-person-fill fs-2"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 fw-bold">Bệnh nhân: <?= htmlspecialchars($data['ho_ten']) ?></h4>
                                        <p class="mb-0 opacity-75">PID: <?= htmlspecialchars($data['pid']) ?> | Nhóm máu: <?= htmlspecialchars($data['nhom_mau']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 p-md-5">
                                <h5 class="fw-bold mb-4 text-dark border-bottom pb-2">Lịch sử khám chữa bệnh</h5>
                                
                                <?php 
                                    $chi_tiet = json_decode($data['chi_tiet'], true);
                                    if(is_array($chi_tiet)): 
                                ?>
                                    <?php foreach($chi_tiet as $index => $record): ?>
                                        <?php 
                                        // Xen kẽ màu
                                        $colors = ['primary', 'success', 'danger', 'warning'];
                                        $color = $colors[$index % count($colors)];
                                        ?>
                                        <div class="position-relative border-start border-2 border-<?= $color ?> ms-3 ps-4 pb-4">
                                            <div class="position-absolute bg-<?= $color ?> rounded-circle" style="width: 16px; height: 16px; left: -9px; top: 0;"></div>
                                            <span class="badge bg-light text-<?= $color ?> border border-<?= $color ?> mb-2"><?= date('d/m/Y', strtotime($record['ngay'])) ?></span>
                                            <h6 class="fw-bold fs-5 text-dark"><?= htmlspecialchars($record['tieu_de']) ?></h6>
                                            <p class="text-muted mb-1">Chẩn đoán: <?= htmlspecialchars($record['chan_doan']) ?></p>
                                            <p class="text-muted"><i class="bi bi-file-medical"></i> Bác sĩ: <strong class="text-dark"><?= htmlspecialchars($record['bac_si']) ?></strong></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-muted text-center italic">Biểu ghi y tế chưa cập nhật</p>
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
