-- Tạo database
CREATE DATABASE IF NOT EXISTS smart_hospital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE smart_hospital;

-- 1. Bảng Chuyên Khoa
CREATE TABLE IF NOT EXISTS chuyen_khoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_khoa VARCHAR(100) NOT NULL,
    mo_ta TEXT
);

-- 2. Bảng Bác Sĩ
CREATE TABLE IF NOT EXISTS bac_si (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ho_ten VARCHAR(100) NOT NULL,
    id_chuyen_khoa INT NOT NULL,
    hinh_anh VARCHAR(255),
    tieu_su TEXT,
    FOREIGN KEY (id_chuyen_khoa) REFERENCES chuyen_khoa(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- 3. Bảng Gói Khám
CREATE TABLE IF NOT EXISTS goi_kham (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_goi VARCHAR(255) NOT NULL,
    gia_tien DECIMAL(15,2) NOT NULL,
    mo_ta TEXT
);

-- 4. Bảng Đặt Lịch
CREATE TABLE IF NOT EXISTS dat_lich (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_benh_nhan VARCHAR(150) NOT NULL,
    so_dien_thoai VARCHAR(20) NOT NULL,
    id_bac_si INT NULL,
    ngay_hen DATETIME NOT NULL,
    trang_thai ENUM('dang_cho', 'da_xac_nhan', 'hoan_thanh', 'da_huy') DEFAULT 'dang_cho',
    ghi_chu TEXT,
    ngay_tao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_bac_si) REFERENCES bac_si(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- ==========================================================
-- CHÈN DỮ LIỆU MẪU (MOCK DATA)
-- ==========================================================

-- Dữ liệu Chuyên khoa
INSERT INTO chuyen_khoa (ten_khoa, mo_ta) VALUES 
('Tim Mạch', 'Điều trị các bệnh lý liên quan đến tim và mạch máu.'),
('Nội Tiết', 'Khám và điều trị các bệnh rối loạn nội tiết tố, tiểu đường.'),
('Nhi Khoa', 'Khám, chữa bệnh và chăm sóc sức khỏe sơ sinh và trẻ em.'),
('Tiêu Hoá', 'Điều trị các bệnh về dạ dày, đường ruột và hệ tiêu hóa.'),
('Nha Khoa', 'Chăm sóc, khám và điều trị các bệnh lý về răng miệng thẩm mỹ.');

-- Dữ liệu Bác Sĩ
INSERT INTO bac_si (ho_ten, id_chuyen_khoa, hinh_anh, tieu_su) VALUES 
('Nguyễn Văn An', 1, 'https://cdn-icons-png.flaticon.com/512/3774/3774299.png', 'Hơn 15 năm kinh nghiệm trong phẫu thuật tim mạch.'),
('Trần Thị Bình', 3, 'https://cdn-icons-png.flaticon.com/512/3774/3774221.png', 'Bác sĩ nhi đồng tận tâm, đạt nhiều bằng khen ưu tú.'),
('Lê Minh Tâm', 2, 'https://cdn-icons-png.flaticon.com/512/3774/3774299.png', 'Chuyên gia nội tiết, nguyên tu nghiệp tại CH Pháp.'),
('Phạm Quang Khải', 4, 'https://cdn-icons-png.flaticon.com/512/3774/3774299.png', 'Chuyên khoa tiêu hoá, ứng dụng nội soi công nghệ không đau.'),
('Hoàng Thị Hạnh', 5, 'https://cdn-icons-png.flaticon.com/512/3774/3774221.png', 'Chuyên gia phục hình răng và chỉnh nha thẩm mỹ cao cấp.');

-- Dữ liệu Gói Khám
INSERT INTO goi_kham (ten_goi, gia_tien, mo_ta) VALUES 
('Gói Khám Tổng Quát Cơ Bản', 1500000.00, 'Bao gồm khám lâm sàng tổng quát, xét nghiệm máu cơ bản, X-Quang phổi và siêu âm ổ bụng.'),
('Gói Tầm Soát Ung Thư Nữ', 3500000.00, 'Tầm soát chuyên sâu đánh giá các bệnh ung thư phổ biến ở nữ giới (vú, tử cung, tuyến giáp).'),
('Gói Tầm Soát Ung Thư Nam', 3200000.00, 'Tầm soát sớm ung thư và các bệnh lý nội tạng phổ biến ở nam giới (gan, phổi, dạ dày, tuyến tiền liệt).'),
('Gói Khám Sức Khỏe Tiền Hôn Nhân', 2500000.00, 'Khám tổng quát, đánh giá sức khoẻ sinh sản và các bệnh truyền nhiễm vi sinh trước hôn nhân.'),
('Gói Chăm Sóc Nha Khoa Toàn Diện', 800000.00, 'Lấy cao răng siêu âm, đánh bóng, kiểm tra chi tiết các bệnh lý răng miệng và tư vấn thẩm mỹ MIỄN PHÍ.');

-- Dữ liệu Đặt lịch
INSERT INTO dat_lich (ten_benh_nhan, so_dien_thoai, id_bac_si, ngay_hen, trang_thai, ghi_chu) VALUES 
('Trương Văn Cường', '0912345678', 1, '2026-04-15 09:00:00', 'da_xac_nhan', 'Khám định kỳ tư vấn bệnh mạch vành.'),
('Lương Thị Mai', '0987654321', 2, '2026-04-16 14:30:00', 'dang_cho', 'Bé có dấu hiệu sốt đêm qua và ho nhiều.'),
('Đỗ Hữu Thắng', '0933221144', 4, '2026-04-12 10:15:00', 'hoan_thanh', 'Tư vấn đăng ký lịch nội soi dạ dày không đau tuần tới.'),
('Vũ Bích Ngọc', '0909090909', NULL, '2026-04-20 08:00:00', 'dang_cho', 'Tôi muốn tư vấn về chi phí gói khám thai sản.'),
('Lý Tiểu Long', '0888777666', 5, '2026-04-17 15:45:00', 'da_huy', 'Viêm tủy răng ê buốt kéo dài.');