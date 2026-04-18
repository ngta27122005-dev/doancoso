<!-- HEADER ĐẦY ĐỦ: Đã hỗ trợ chuyển đổi giao diện ngôn ngữ VI/EN toàn bộ -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-lang="pageTitle">Liên Hoa Medical - Tinh Hoa Y Tế</title>
    <!-- Các link cần thiết -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body class="bg-light">

<!-- Thanh điều hướng Navbar (Header) -->
<nav class="navbar navbar-expand-lg navbar-glass sticky-top py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand text-primary fw-bolder d-flex align-items-center gap-2" href="<?= BASE_URL ?>/">
            <i class="bi bi-flower1 fs-2" style="color: var(--primary-color)"></i> 
            <span class="fs-4">
                <span data-lang="brand">LIÊN HOA</span>
                <span class="text-info" data-lang="brand_sub"> HOSPITAL</span>
            </span>
        </a>
        
        <!-- Nút Toggle Mobile -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <i class="bi bi-list fs-1 text-primary"></i>
        </button>
        
        <!-- Menu liên kết -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-semibold fs-6">
                <li class="nav-item">
                    <a class="nav-link px-3 active text-primary" href="<?= BASE_URL ?>/" data-lang="nav_home">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="#" data-lang="nav_notice">Thông báo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="<?= BASE_URL ?>/package" data-lang="nav_package">Gói Khám Thể Chất</a>
                </li>
            </ul>
            
            <!-- Nút Call to action + Đăng nhập + Đổi ngôn ngữ -->
            <div class="d-flex align-items-center gap-5">
                <!-- Nút Đăng nhập -->
                <button class="btn btn-outline-primary rounded-pill px-4 py-2 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="bi bi-box-arrow-in-right"></i> <span data-lang="btn_login">Đăng nhập</span>
                </button>

                <!-- Nút Đặt Lịch Ngay -->
                <a href="<?= BASE_URL ?>/booking" class="btn btn-booking-nav text-white shadow-sm rounded-pill px-4 py-2 d-flex align-items-center gap-2 text-decoration-none">
                    <i class="bi bi-calendar2-check-fill"></i> <span data-lang="btn_book">ĐẶT LỊCH KHÁM</span>
                </a>
                
                <!-- Nút chọn ngôn ngữ VI/EN -->
                <div class="form-check form-switch ms-2">
                  <input class="form-check-input" type="checkbox" id="langSwitch" />
                  <label class="form-check-label fw-bold" for="langSwitch"><span id="langLabel">VI</span></label>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Modal Đăng nhập / Đăng ký lựa chọn -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-2">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel" data-lang="login_title">Đăng nhập tài khoản</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- Form Đăng nhập -->
        <form id="loginForm">
          <div class="mb-3">
            <label for="loginIdentifier" class="form-label" data-lang="login_email_phone">Email/SĐT</label>
            <input type="text" class="form-control" id="loginIdentifier" required autofocus />
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label" data-lang="login_password">Mật khẩu</label>
            <input type="password" class="form-control" id="loginPassword" required/>
          </div>
          <button type="submit" class="btn btn-primary w-100" data-lang="btn_login">Đăng nhập</button>
        </form>
        
        <div class="text-center mt-4">
          <p class="text-muted mb-3" data-lang="welcome_msg">Chào mừng bạn đến với hệ thống chăm sóc sức khỏe Liên Hoa</p>
          <button type="button" class="btn btn-primary rounded-pill w-100 py-2 fw-semibold shadow-sm" id="btnRegisterAccount" data-lang="register_account">Tham gia Liên Hoa Medical</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Đăng ký chung (User/Admin) -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-2">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel" data-lang="register_title">Đăng ký tài khoản</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="registerForm">
          <!-- Mặc định ẩn Role, gán sẵn là Bệnh nhân trong CSDL khi submit -->
          <input type="hidden" name="role" value="patient">
          <div class="mb-3">
            <label for="registerEmail" class="form-label" data-lang="register_email">Email</label>
            <input type="email" class="form-control rounded-3" id="registerEmail" required>
          </div>
          <div class="mb-3">
            <label for="registerPhone" class="form-label" data-lang="register_phone">Số điện thoại</label>
            <input type="text" class="form-control rounded-3" id="registerPhone" required>
          </div>
          <div class="mb-3">
            <label for="registerPassword" class="form-label" data-lang="register_password">Mật khẩu</label>
            <input type="password" class="form-control rounded-3" id="registerPassword" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 mt-2 fw-semibold shadow-sm" data-lang="btn_register">Đăng ký ngay</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPT xử lý các modal, nút, và chuyển đổi ngôn ngữ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Bản dịch
  const translations = {
    VI: {
      pageTitle: "Liên Hoa Medical - Tinh Hoa Y Tế",
      brand: "LIÊN HOA",
      brand_sub: " HOSPITAL",
      nav_home: "Trang Chủ",
      nav_notice: "Thông báo",
      nav_package: "Gói Khám Thể Chất",
      btn_login: "Đăng nhập",
      btn_book: "ĐẶT LỊCH NGAY",
      login_title: "Đăng nhập",
      login_email_phone: "Email/SĐT",
      login_password: "Mật khẩu",
      welcome_msg: "Chào mừng bạn đến với hệ thống chăm sóc sức khỏe Liên Hoa",
      register_account: "Tham gia Liên Hoa Medical",
      register_title: "Đăng ký tài khoản",
      register_email: "Email",
      register_phone: "Số điện thoại",
      register_password: "Mật khẩu",
      btn_register: "Đăng ký ngay"
    },
    EN: {
      pageTitle: "Lien Hoa Medical - The Essence of Healthcare",
      brand: "LIEN HOA",
      brand_sub: " HOSPITAL",
      nav_home: "Home",
      nav_notice: "Notifications",
      nav_package: "Physical Exam Packages",
      btn_login: "Login",
      btn_book: "BOOK NOW",
      login_title: "Login",
      login_email_phone: "Email/Phone",
      login_password: "Password",
      welcome_msg: "Welcome to Lien Hoa Healthcare System",
      register_account: "Join Lien Hoa Medical",
      register_title: "Register Account",
      register_email: "Email",
      register_phone: "Phone Number",
      register_password: "Password",
      btn_register: "Register Now"
    }
  };

  function switchLanguage(lang) {
    // Đổi tất cả nhãn có data-lang
    document.querySelectorAll('[data-lang]').forEach(el => {
      const key = el.getAttribute('data-lang');
      if (translations[lang][key]) {
        if (el.tagName.toLowerCase() === "input" || el.tagName.toLowerCase() === "textarea") {
          el.setAttribute('placeholder', translations[lang][key]);
        } else {
          el.textContent = translations[lang][key];
        }
      }
    });
    // Đổi page title
    document.title = translations[lang].pageTitle;

    // Đổi thẻ html lang
    document.documentElement.lang = lang.toLowerCase();
  }

  // Nút toggle ngôn ngữ
  document.querySelector('#langSwitch').addEventListener('change', function() {
    const lang = this.checked ? 'EN' : 'VI';
    document.querySelector('#langLabel').textContent = lang;
    switchLanguage(lang);
  });

  // Xử lý mở modal đăng ký - hỗ trợ đa ngôn ngữ
  const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
  document.getElementById('btnRegisterAccount').onclick = function() {
    let lang = document.querySelector('#langSwitch').checked ? 'EN' : 'VI';
    document.getElementById('registerModalLabel').textContent = translations[lang].register_title;
    
    // Đóng modal đăng nhập nếu đang mở trước khi mở đăng ký
    const loginModalEl = document.getElementById('loginModal');
    const loginModalInstance = bootstrap.Modal.getInstance(loginModalEl);
    if(loginModalInstance) {
        loginModalInstance.hide();
    }
    
    registerModal.show();
  };

  // Demo xử lý form đăng nhập/đăng ký (giữ nguyên)
  document.getElementById('loginForm').onsubmit = function(e) {
    e.preventDefault();
    alert('Đăng nhập thành công (DEMO)');
    bootstrap.Modal.getInstance(document.getElementById('loginModal')).hide();
  };
  document.getElementById('registerForm').onsubmit = function(e) {
    e.preventDefault();
    alert('Đăng ký tài khoản thành công (DEMO)');
    bootstrap.Modal.getInstance(document.getElementById('registerModal')).hide();
  };

  // Khởi tạo ngôn ngữ mặc định (VI)
  window.addEventListener('DOMContentLoaded', () => switchLanguage('VI'));
</script>
</body>
</html>