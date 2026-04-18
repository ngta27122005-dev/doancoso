<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<!-- BANNER HERO CHÍNH -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10 col-xl-9 animate-fade-in-up">
                <div class="hero-badge px-3 py-1 rounded-pill d-inline-block mb-3">
                    <span class="fs-6 fw-bold">🌟 Top #1 Dịch Vụ Y Tế Trực Tuyến</span>
                </div>
                
                <h1 class="hero-title mb-4">
                    Chăm sóc Sức khỏe <br>
                    <span class="text-primary">Toàn Diện & Tận Tâm</span>
                </h1>
                
                <p class="hero-desc mb-0">
                    Được thành lập vào năm 2008, <strong>Liên Hoa Medical</strong> tự hào là một trong những hệ thống y tế tư nhân hiện đại hàng đầu. 
                    Với quy mô hơn 300 giường bệnh tại trung tâm thành phố, chúng tôi phục vụ hàng ngàn lượt bệnh nhân mỗi ngày bằng sự tận tâm 
                    và công nghệ kỹ thuật số tiên tiến nhất. Chúng tôi cam kết mang đến dịch vụ chăm sóc sức khỏe chất lượng cao, chi phí hợp lý 
                    và an toàn tuyệt đối cho mọi gia đình.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- KHU VỰC THẺ TÍNH NĂNG (DỊCH VỤ CHÍNH) -->
<section class="container pb-5 position-relative" style="margin-top: -60px; z-index: 10;">
    <div class="row g-4 px-3 px-lg-0">
        
        <!-- Chuyên Khoa Đa Dạng -->
        <div class="col-md-4">
            <div class="feature-card px-4 py-5 text-center d-flex flex-column justify-content-between h-100">
                <div>
                    <div class="icon-box icon-bg-primary mx-auto shadow-sm">
                        <i class="bi bi-heart-pulse-fill"></i>
                    </div>
                    <h4 class="fw-bolder mb-3 text-dark">Chuyên Khoa Đa Dạng</h4>
                    <p class="text-muted mb-4 px-2 lh-lg">Hệ thống khám chữa bệnh nội & khoa liên viện với hơn 50 chuyên khoa sâu, trang thiết bị tối tân chuẩn xác.</p>
                </div>
                <a href="<?= BASE_URL ?>/doctor" class="text-primary fw-bold text-decoration-none hover-link d-inline-block mx-auto position-relative">
                    Xem Chuyên Khoa & Bác Sĩ <i class="bi bi-arrow-right-short fs-5 vertical-align-middle border border-primary rounded-circle ms-1 p-1"></i>
                </a>
            </div>
        </div>

        <!-- Tầm Soát Sức Khoẻ -->
        <div class="col-md-4">
            <div class="feature-card px-4 py-5 text-center position-relative d-flex flex-column justify-content-between h-100 border-top border-4 border-info">
                <span class="position-absolute badge rounded-pill bg-danger shadow px-3 py-2 fw-bold" style="top: -15px; left: 50%; transform: translateX(-50%); letter-spacing: 0.5px;"><i class="bi bi-fire me-1"></i> HOT NHẤT</span>
                <div>
                    <div class="icon-box icon-bg-info mx-auto shadow-sm">
                        <i class="bi bi-prescription2"></i>
                    </div>
                    <h4 class="fw-bolder mb-3 text-dark">Tầm Soát Bệnh Lý</h4>
                    <p class="text-muted mb-4 px-2 lh-lg">Tương lai của y học dự phòng là bắt đầu từ hôm nay. Gói hệ đa dạng cho Nam, Nữ, Gia Đình và Doanh nghiệp.</p>
                </div>
                <a href="<?= BASE_URL ?>/package" class="text-info fw-bold text-decoration-none mt-auto hover-link mx-auto position-relative">
                    Tra Cứu Các Gói Khám <i class="bi bi-arrow-right-short fs-5 vertical-align-middle border border-info rounded-circle ms-1 p-1"></i>
                </a>
            </div>
        </div>

        <!-- Hỗ Trợ Trực Tuyến -->
        <div class="col-md-4">
            <div class="feature-card px-4 py-5 text-center d-flex flex-column justify-content-between h-100">
                <div>
                    <div class="icon-box icon-bg-success mx-auto shadow-sm">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4 class="fw-bolder mb-3 text-dark">Đặt Lịch Khám</h4>
                    <p class="text-muted mb-4 px-2 lh-lg">Dịch vụ xe cứu thương miễn phí nội thành. Hotline tư vấn triệu chứng và xử lý ngoại viện khẩn cấp hoạt động liên tục.</p>
                </div>
                <a href="<?= BASE_URL ?>/booking" class="text-success fw-bold text-decoration-none mt-auto hover-link mx-auto position-relative">
                    Liên Hệ Ngay Bây Giờ <i class="bi bi-arrow-right-short fs-5 vertical-align-middle border border-success rounded-circle ms-1 p-1"></i>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- NHÚNG CSS MỚI CHO GIAO DIỆN DỊCH VỤ -->
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/services.css">

<!-- DỊCH VỤ CỦA CHÚNG TÔI -->
<section class="container py-5 mt-4">
    <div class="text-center mb-5">
        <h2 class="fw-bolder text-dark">Dịch Vụ Của Chúng Tôi</h2>
        <p class="text-muted">Mang đến trải nghiệm chăm sóc sức khỏe toàn diện và tiện ích nhất.</p>
    </div>
    
    <div class="medical-service-grid">
        <!-- 1 -->

        
        <!-- 2 -->
        <a href="<?= BASE_URL ?>/payment" class="medical-service-card">
            <div class="medical-icon-circle icon-orange-pastel">
                <i class="bi bi-credit-card"></i>
            </div>
            <h3 class="medical-service-title">Thanh toán viện phí</h3>
        </a>
        
        <!-- 3 -->
        <a href="<?= BASE_URL ?>/invoice" class="medical-service-card">
            <div class="medical-icon-circle icon-orange-pastel">
                <i class="bi bi-receipt"></i>
            </div>
            <h3 class="medical-service-title">Hóa đơn điện tử</h3>
        </a>
        
        <!-- 4 -->
        <a href="<?= BASE_URL ?>/record" class="medical-service-card">
            <div class="medical-icon-circle icon-teal-pastel">
                <i class="bi bi-file-earmark-medical"></i>
            </div>
            <h3 class="medical-service-title">Hồ sơ sức khỏe</h3>
        </a>
        
        <!-- 5 -->
        <a href="<?= BASE_URL ?>/laboratory" class="medical-service-card">
            <div class="medical-icon-circle icon-teal-pastel">
                <i class="bi bi-clipboard2-pulse"></i>
            </div>
            <h3 class="medical-service-title">Kết quả cận lâm sàng</h3>
        </a>
        
        <!-- 6 -->
        <a href="#" class="medical-service-card">
            <div class="medical-icon-circle icon-pink-pastel">
                <i class="bi bi-hospital"></i>
            </div>
            <h3 class="medical-service-title">Đăng ký nhập viện</h3>
        </a>
        
        <!-- 7 -->
        
        <!-- 8 -->
        
        <!-- 9 -->
        
        <!-- 10 -->
        <a href="#" class="medical-service-card position-relative" style="background: linear-gradient(145deg, #ffffff, #f4fbff); border: 1px solid rgba(13, 202, 240, 0.3);">
            <span class="position-absolute badge rounded-pill bg-primary shadow-sm px-2 py-1" style="top: -12px; right: -10px; font-size: 0.75rem; letter-spacing: 0.5px;">
                <i class="bi bi-stars text-warning"></i> SMART
            </span>
            <div class="medical-icon-circle" style="background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%); color: white; box-shadow: 0 8px 20px rgba(13, 202, 240, 0.4);">
                <i class="bi bi-robot"></i>
            </div>
            <h3 class="medical-service-title fw-bold" style="background: linear-gradient(90deg, #0d6efd, #0dcaf0); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">AI Liên Hoa</h3>
        </a>
    </div>
</section>

<!-- ĐỘI NGŨ BÁC SĨ -->
<section class="doctor-team-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bolder" style="color: var(--primary-color);">Đội ngũ bác sĩ chuyên gia</h2>
            <p class="text-muted fs-5">Gặp gỡ các bác sĩ chuyên khoa phụ trách giàu kinh nghiệm của Liên Hoa Medical, luôn tận tụy vì sức khỏe cộng đồng.</p>
        </div>
        
        <div class="row g-4">
            <!-- Bác sĩ 1 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="doctor-card-modern">
                    <div class="doctor-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/doctor1.jpg?v=1" alt="BS. CKII Nguyễn Văn A">
                    </div>
                    <div class="doctor-card-body">
                        <span class="doctor-badge">Khoa Nội tổng quát</span>
                        <h3 class="doctor-name">BS. CKII Nguyễn Văn A</h3>
                        <div class="doctor-desc">Hơn 15 năm kinh nghiệm trong khám và điều trị các bệnh lý nội khoa chuyên sâu.</div>
                        <a href="<?= BASE_URL ?>/doctor/detail/1" class="doctor-card-link">Xem chi tiết <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Bác sĩ 2 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="doctor-card-modern">
                    <div class="doctor-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/doctor1.jpg?v=1" alt="ThS. BS Trần Thị B">
                    </div>
                    <div class="doctor-card-body">
                        <span class="doctor-badge">Khoa Nhi</span>
                        <h3 class="doctor-name">ThS. BS Trần Thị B</h3>
                        <div class="doctor-desc">Chuyên gia hàng đầu về dinh dưỡng và chẩn đoán điều trị hô hấp nhi khoa.</div>
                        <a href="<?= BASE_URL ?>/doctor/detail/2" class="doctor-card-link">Xem chi tiết <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Bác sĩ 3 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="doctor-card-modern">
                    <div class="doctor-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/doctor2.jpg?v=1" alt="BS. CKI Lê Văn C">
                    </div>
                    <div class="doctor-card-body">
                        <span class="doctor-badge">Khoa Ngoại</span>
                        <h3 class="doctor-name">BS. CKI Lê Minh Tâm</h3>
                        <div class="doctor-desc">Nhiều năm kinh nghiệm trong thực hiện phẫu thuật nội soi ổ bụng và lồng ngực.</div>
                        <a href="<?= BASE_URL ?>/doctor/detail/3" class="doctor-card-link">Xem chi tiết <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Bác sĩ 4 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="doctor-card-modern">
                    <div class="doctor-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/doctor2.jpg?v=1" alt="BS. CKII Phạm Thị D">
                    </div>
                    <div class="doctor-card-body">
                        <span class="doctor-badge">Khoa Tim mặt</span>
                        <h3 class="doctor-name">BS. CKII Phạm Thị D</h3>
                        <div class="doctor-desc">Chuyên gia điều trị các bệnh lý tim mạch phức tạp, huyết áp, tiểu đường.</div>
                        <a href="<?= BASE_URL ?>/doctor/detail/4" class="doctor-card-link">Xem chi tiết <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CHUYÊN KHOA MŨI NHỌN -->
<section class="specialty-section">
    <div class="container">
        <div class="specialty-header">
            <h2 class="fw-bolder">Chuyên khoa mũi nhọn</h2>
            <p>Liên Hoa Medical cung cấp một loạt chuyên khoa và dịch vụ y tế đa dạng, kết hợp kinh nghiệm y tế với công nghệ tiên tiến để cung cấp sự chăm sóc cao nhất cho bệnh nhân.</p>
        </div>
        
        <div class="row g-4">
            <!-- Tim mạch -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="specialty-card">
                    <div class="specialty-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/image_11.png?v=1" alt="Tim mạch">
                    </div>
                    <div class="specialty-info">
                        <h3>Trung tâm Tim mạch</h3>
                    </div>
                </div>
            </div>
            
            <!-- Tiêu hóa -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="specialty-card">
                    <div class="specialty-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/pakage_nam.jpg?v=1" alt="Tiêu hóa">
                    </div>
                    <div class="specialty-info">
                        <h3>Khoa Tiêu hóa</h3>
                    </div>
                </div>
            </div>

            <!-- Phụ sản -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="specialty-card">
                    <div class="specialty-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/package_tiensan.jpg?v=1" alt="Phụ sản">
                    </div>
                    <div class="specialty-info">
                        <h3>Khoa Phụ sản</h3>
                    </div>
                </div>
            </div>

            <!-- Nhi khoa -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="specialty-card">
                    <div class="specialty-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/pakage_nhi.jpg?v=1" alt="Nhi khoa">
                    </div>
                    <div class="specialty-info">
                        <h3>Khoa Nhi</h3>
                    </div>
                </div>
            </div>

            <!-- Cơ xương khớp -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="specialty-card">
                    <div class="specialty-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/pakage_sinh.jpg?v=1" alt="Cơ xương khớp">
                    </div>
                    <div class="specialty-info">
                        <h3>Cơ xương khớp</h3>
                    </div>
                </div>
            </div>

            <!-- Ung bướu -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="specialty-card">
                    <div class="specialty-img-wrap">
                        <img src="<?= BASE_URL ?>/assets/images/image_11.png?v=1" alt="Ung bướu">
                    </div>
                    <div class="specialty-info">
                        <h3>Khoa Ung bướu</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GÓI KHÁM ƯU ĐÃI NỔI BẬT -->
<section class="promo-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bolder" style="color: var(--primary-color);">Gói khám ưu đãi</h2>
            <p class="text-muted fs-5">Lựa chọn chăm sóc sức khỏe thông minh hơn với các gói dịch vụ giá trị tuyệt vời của Liên Hoa Medical.</p>
        </div>
        
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-card">
                    <div class="promo-img-wrap">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=400&q=80" alt="Gói khám tổng quát Nam">
                    </div>
                    <div class="promo-card-body">
                        <span class="promo-badge-hospital"><i class="bi bi-hospital me-1"></i>Bệnh viện Liên Hoa</span>
                        <h3 class="promo-title">Gói khám tổng quát Nam</h3>
                        <div class="promo-desc">Chủ động phòng bệnh, sống khỏe trọn vẹn cả thanh xuân.</div>
                        <a href="<?= BASE_URL ?>/package/detail/1" class="promo-card-link">Xem thêm <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-card">
                    <div class="promo-img-wrap">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=400&q=80" alt="Gói khám tiền sản">
                    </div>
                    <div class="promo-card-body">
                        <span class="promo-badge-hospital"><i class="bi bi-hospital me-1"></i>Bệnh viện Liên Hoa</span>
                        <h3 class="promo-title">Gói khám tiền sản</h3>
                        <div class="promo-desc">Chuẩn bị hành trang thai kỳ khỏe mạnh, chào đón thiên thần.</div>
                        <a href="<?= BASE_URL ?>/package/detail/2" class="promo-card-link">Xem thêm <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-card">
                    <div class="promo-img-wrap">
                        <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=400&q=80" alt="Gói sinh">
                    </div>
                    <div class="promo-card-body">
                        <span class="promo-badge-hospital"><i class="bi bi-hospital me-1"></i>Bệnh viện Liên Hoa</span>
                        <h3 class="promo-title">Gói sinh</h3>
                        <div class="promo-desc">Gửi trọn yêu thương, vượt cạn an toàn cùng dịch vụ cao cấp.</div>
                        <a href="<?= BASE_URL ?>/package/detail/3" class="promo-card-link">Xem thêm <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-card">
                    <div class="promo-img-wrap">
                        <img src="https://plus.unsplash.com/premium_photo-1661766718556-13c2efac1388?auto=format&fit=crop&w=400&q=80" alt="Gói khám tổng quát Nhi">
                    </div>
                    <div class="promo-card-body">
                        <span class="promo-badge-hospital"><i class="bi bi-hospital me-1"></i>Bệnh viện Liên Hoa</span>
                        <h3 class="promo-title">Gói khám tổng quát Nhi</h3>
                        <div class="promo-desc">Chăm sóc toàn diện, chắp cánh cho con tương lai khỏe mạnh.</div>
                        <a href="<?= BASE_URL ?>/package/detail/4" class="promo-card-link">Xem thêm <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
