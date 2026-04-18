<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="text-center text-success mb-4 fw-bold">📝 Đặt Dịch vụ xe cứu thương miễn phí</h2>
                    <p class="text-center text-muted mb-4">Vui lòng điền đầy đủ và chính xác thông tin để chúng tôi sắp xếp lịch tốt nhất cho bạn.</p>

                    <form action="<?= BASE_URL ?>/booking/store" method="POST">
                        <div class="mb-3">
                            <label for="patient_name" class="form-label fw-semibold text-danger">Họ và Tên Bệnh Nhân *</label>
                            <input type="text" class="form-control form-control-lg" id="patient_name" name="patient_name" required placeholder="Ví dụ: Nguyễn Văn A">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold text-danger">Số Điện Thoại Liên Hệ *</label>
                            <input type="tel" class="form-control form-control-lg" id="phone" name="phone" required placeholder="Nhập số điện thoại...">
                        </div>

                        <div class="mb-3">
                            <label for="appointment_date" class="form-label fw-semibold text-danger">Ngày và Giờ Khám Dự Kiến *</label>
                            <input type="datetime-local" class="form-control form-control-lg" id="appointment_date" name="appointment_date" required>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="form-label fw-semibold">Ghi Chú Triệu Chứng / Yêu Cầu Chọn Bác Sĩ</label>
                            <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Nếu có yêu cầu về chuyên khoa hoặc triệu chứng bệnh... (Tùy chọn)"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold fs-5 rounded-pill shadow">XÁC NHẬN ĐẶT LỊCH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
