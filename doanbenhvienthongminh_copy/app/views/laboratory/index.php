<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<main class="flex-grow-1 bg-light py-5">
    <div class="container">
        <!-- Tiêu đề trang -->
        <div class="text-center mb-5 animate-fade-in-up">
            <h1 class="text-primary fw-bolder">Kết Quả Cận Lâm Sàng</h1>
            <p class="text-muted">Nhập Mã Phiếu Chỉ Định để xem Tờ kết quả Xét nghiệm, Siêu âm, X-Quang.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <!-- Form Tra cứu -->
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <form action="<?= BASE_URL ?>/laboratory" method="POST">
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text bg-white border-end-0 text-primary">
                                    <i class="bi bi-file-medical text-primary"></i>
                                </span>
                                <input type="text" name="code" class="form-control border-start-0 ps-0" 
                                       placeholder="Ví dụ: CLS-2026" 
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
                            <h4 class="alert-heading fw-bold">Không tìm thấy mã phiếu!</h4>
                            <p class="mb-0">Phiếu kiểm tra mang mã số <strong><?= htmlspecialchars($code) ?></strong> không tồn tại trong hệ thống máy chủ Cận lâm sàng.</p>
                        </div>
                    <?php else: ?>
                        <!-- Real Data -->
                        <div class="card shadow border-0 rounded-4 animate-fade-in-up overflow-hidden">
                            <div class="card-header bg-white border-bottom p-4">
                                <h4 class="mb-0 fw-bold text-dark"><i class="bi bi-clipboard2-pulse text-danger me-2"></i>Chỉ định của BN: <span class="text-primary"><?= htmlspecialchars($data['ten_benh_nhan']) ?></span></h4>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush border-0">
                                    <?php 
                                        $ket_qua = json_decode($data['ket_qua'], true);
                                        if(is_array($ket_qua)): 
                                            foreach($ket_qua as $item): 
                                    ?>
                                        <li class="list-group-item p-4 border-0 border-bottom">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h5 class="fw-bold mb-0 text-dark"><?= htmlspecialchars($item['ten_xet_nghiem']) ?></h5>
                                                <?php if($item['trang_thai'] === 'da_co_ket_qua'): ?>
                                                    <span class="badge bg-success rounded-pill px-3 py-2">Đã có kết quả</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2"><i class="bi bi-hourglass-split me-1"></i> Đang phân tích</span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <?php if($item['trang_thai'] === 'da_co_ket_qua'): ?>
                                                <p class="text-muted mb-3"><i class="bi bi-calendar-check me-1"></i> Đã hoàn tất phân tích số liệu.</p>
                                                <button class="btn btn-sm btn-outline-primary fw-bold"><i class="bi bi-cloud-download me-1"></i> File Gốc (PDF)</button>
                                            <?php else: ?>
                                                <p class="text-muted mb-0">Vui lòng chờ khoảng 15-30 phút sau khi thực hiện dịch vụ.</p>
                                            <?php endif; ?>
                                        </li>
                                    <?php 
                                            endforeach;
                                        endif; 
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
