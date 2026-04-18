    </main> <!-- Đóng Content Main Layout -->
    
    <!-- Chân trang (Footer Premium) -->
    <footer class="footer-premium text-white pt-5 pb-3 mt-auto">
        <div class="container">
            <div class="row mb-5 mt-3">
                <!-- Về Bệnh Viện -->
                <div class="col-lg-4 pe-lg-5 mb-4 mb-lg-0">
                    <h4 class="fw-bolder mb-4 d-flex align-items-center gap-2">
                        <i class="bi bi-flower1 text-info"></i> Liên Hoa HOSPITAL
                    </h4>
                    <p class="text-white-50 lh-lg pe-3">Ứng dụng chuyển đổi số toàn diện trong y tế. Với thông điệp "Tận tâm chữa trị, ân cần chăm sóc", chúng tôi luôn mang lại dịch vụ nhanh chóng, tối ưu và hiệu quả nhất cho từng bệnh nhân.</p>
                </div>
                
                <!-- Liên hệ -->
                <div class="col-lg-4 px-lg-4 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-4 border-bottom border-secondary d-inline-block pb-2">Thông Tin Liên Hệ</h5>
                    <ul class="list-unstyled text-white-50 lh-lg">
                        <li class="mb-3 d-flex align-items-start gap-3">
                            <i class="bi bi-geo-alt-fill text-info mt-1 fs-5"></i> 
                            <span>123 Đường Lê Lợi, Phường Bến Thành, Quận 1, TP.HCM</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-3">
                            <i class="bi bi-telephone-fill text-info fs-5"></i> 
                            <span>Hotline/Cấp cứu: <strong class="text-white text-decoration-underline">1900 1515</strong> (24/7)</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-3">
                            <i class="bi bi-envelope-fill text-info fs-5"></i> 
                            <span>cskh@lienhoamedical.vn</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Giờ làm việc -->
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4 border-bottom border-secondary d-inline-block pb-2">Giờ Làm Việc</h5>
                    <ul class="list-unstyled text-white-50 flex-column lh-lg">
                        <li class="d-flex justify-content-between border-bottom border-secondary pb-2 mb-3">
                            <span><i class="bi bi-clock me-2"></i>Thứ 2 - Thứ 6:</span> <span class="fw-semibold">07:00 - 20:00</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-secondary pb-2 mb-3">
                            <span><i class="bi bi-clock me-2"></i>Thứ 7, Chủ Nhật:</span> <span class="fw-semibold">07:00 - 17:00</span>
                        </li>
                        <li class="d-flex justify-content-between text-warning fw-bold bg-dark bg-opacity-25 px-3 py-2 rounded-3 mt-3">
                            <span><i class="bi bi-activity mt-1 me-2"></i>Trực Cấp Cứu:</span> <span>Hỗ Trợ 24/7</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="border-secondary mb-4">
            
            <!-- Bản Quyền -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-white-50 fs-6">
                <p class="mb-2 mb-md-0 d-flex align-items-center gap-1">&copy; <?= date('Y') ?> Liên Hoa Medical. Đã đăng ký bản quyền. <i class="bi bi-shield-check"></i></p>
                <div class="d-flex gap-3 fs-5">
                    <a href="#" class="text-white-50 text-decoration-none dropdown-toggle-hover" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white-50 text-decoration-none" title="Youtube"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="text-white-50 text-decoration-none" title="Zalo"><i class="bi bi-chat-text"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS Client -->
    <script src="<?= BASE_URL ?>/assets/js/script.js"></script>
</body>
</html>
