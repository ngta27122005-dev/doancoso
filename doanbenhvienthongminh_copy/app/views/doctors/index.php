<?php require_once APP_DIR . '/views/layouts/header.php'; ?>

<div class="container my-4">
    <h1 class="text-center text-primary fw-bold mb-4">Đội Ngũ Bác Sĩ Của Chúng Tôi</h1>
    <p class="text-center text-muted mb-5">Danh sách các chuyên gia, y bác sĩ đầu ngành đang làm việc tại bệnh viện.</p>
    
    <div class="doctor-grid">
        <?php if (!empty($doctors)): ?>
            <?php foreach ($doctors as $doctor): ?>
                <div class="doctor-card">
                    <?php 
                        $imgSrc = !empty($doctor['hinh_anh']) ? $doctor['hinh_anh'] : 'https://cdn-icons-png.flaticon.com/512/3774/3774299.png'; 
                    ?>
                    <img src="<?= htmlspecialchars($imgSrc) ?>" alt="Bác sĩ <?= htmlspecialchars($doctor['ho_ten']) ?>" class="doctor-avatar">
                    <h3 class="doctor-name">BS. <?= htmlspecialchars($doctor['ho_ten']) ?></h3>
                    <p class="doctor-specialty"><?= htmlspecialchars($doctor['chuyen_khoa']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center text-muted p-5 bg-white shadow-sm rounded-4 w-100" style="grid-column: 1/-1;">
                <h4 class="fw-normal">Hiện tại chưa có dữ liệu bác sĩ nào trong hệ thống.</h4>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once APP_DIR . '/views/layouts/footer.php'; ?>
