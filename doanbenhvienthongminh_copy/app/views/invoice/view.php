<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn Điện Tử - <?= htmlspecialchars($data['so_hoa_don']) ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #e0e0e0; font-family: "Times New Roman", Times, serif; color: #000; }
        .invoice-a4 {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border-radius: 5px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .invoice-title { color: #d32f2f; font-weight: bold; font-size: 24px; text-transform: uppercase; }
        .table-invoice { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table-invoice th, .table-invoice td { border: 1px solid #000; padding: 10px; }
        .table-invoice th { background-color: #f5f5f5; text-align: center; font-weight: bold; }
        .seal-signature {
            border: 3px solid #d32f2f;
            border-radius: 50%;
            width: 130px;
            height: 130px;
            margin: 20px auto 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #d32f2f;
            font-weight: bold;
            font-size: 14px;
            transform: rotate(-15deg);
            opacity: 0.8;
            padding: 10px;
        }
        
        @media print {
            body { background: white; margin: 0; padding: 0; }
            .invoice-a4 { box-shadow: none; margin: 0; padding: 0; width: 100%; min-height: auto; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body>

    <div class="text-center my-3 no-print">
        <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer"></i> In Hóa Đơn (Tải PDF)</button>
        <button onclick="window.close()" class="btn btn-secondary ms-2">Đóng</button>
    </div>

    <div class="invoice-a4">
        <!-- Tên Đơn vị -->
        <div class="row border-bottom border-dark pb-3 mb-4">
            <div class="col-8">
                <h4 class="mb-1 fw-bold">BỆNH VIỆN LIÊN HOA</h4>
                <p class="mb-1">Mã số thuế: 0101234567</p>
                <p class="mb-0">Địa chỉ: 123 Đường Điện Biên Phủ, Quận 3, TP.HCM</p>
            </div>
            <div class="col-4 text-end">
                <p class="mb-1">Mẫu số: <strong>01GTKT0/001</strong></p>
                <p class="mb-1">Ký hiệu: <strong><?= htmlspecialchars($data['ky_hieu']) ?></strong></p>
                <p class="mb-0">Số: <strong class="text-danger" style="font-size: 1.2rem;"><?= htmlspecialchars($data['so_hoa_don']) ?></strong></p>
            </div>
        </div>

        <!-- Tiêu đề Hóa đơn -->
        <div class="text-center mb-5">
            <h1 class="invoice-title">HÓA ĐƠN GIÁ TRỊ GIA TĂNG</h1>
            <p class="mb-0 fst-italic">(Bản thể hiện của Hóa đơn điện tử)</p>
            <?php $date = strtotime($data['ngay_lap']); ?>
            <p class="fw-bold mt-2">Ngày <?= date('d', $date) ?> tháng <?= date('m', $date) ?> năm <?= date('Y', $date) ?></p>
        </div>

        <!-- Thông tin khách hàng -->
        <div class="mb-4">
            <p class="mb-2">Mã tra cứu hóa đơn trực tuyến: <strong><?= htmlspecialchars($data['ma_tra_cuu']) ?></strong></p>
            <p class="mb-2">Họ tên người mua hàng: Khách lẻ bệnh viện</p>
            <p class="mb-2">Hình thức thanh toán: TM/CK</p>
        </div>

        <!-- Bảng Dịch Vụ -->
        <?php 
            $tongTienTruocThue = round($data['tong_tien'] / 1.08); // Giả sử VAT 8%
            $tienThue = $data['tong_tien'] - $tongTienTruocThue;
        ?>
        <table class="table-invoice">
            <thead>
                <tr>
                    <th width="10%">STT</th>
                    <th width="40%">Tên Hàng Hóa, Dịch Vụ</th>
                    <th width="15%">Đơn vị tính</th>
                    <th width="35%">Thành Tiền (VND)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td>Chi phí dịch vụ khám chữa bệnh / Thuốc</td>
                    <td class="text-center">Lần</td>
                    <td class="text-end"><?= number_format($tongTienTruocThue, 0, ',', '.') ?></td>
                </tr>
                <!-- Dòng trống -->
                <tr style="height: 100px;">
                    <td class="border-top-0 border-bottom-0 border-dark"></td>
                    <td class="border-top-0 border-bottom-0 border-dark"></td>
                    <td class="border-top-0 border-bottom-0 border-dark"></td>
                    <td class="border-top-0 border-bottom-0 border-dark"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Cộng tiền hàng (Chưa thuế):</td>
                    <td class="text-end fw-bold"><?= number_format($tongTienTruocThue, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Thuế suất GTGT: 8% &nbsp;&nbsp;&nbsp;&nbsp; Tiền thuế GTGT:</td>
                    <td class="text-end fw-bold"><?= number_format($tienThue, 0, ',', '.') ?></td>
                </tr>
                <tr class="bg-light border-dark">
                    <td colspan="3" class="text-end fw-bold text-uppercase fs-5">Tổng tiền thanh toán:</td>
                    <td class="text-end fw-bold text-danger fs-5"><?= number_format($data['tong_tien'], 0, ',', '.') ?></td>
                </tr>
            </tfoot>
        </table>

        <!-- Chữ ký số -->
        <div class="row mt-5">
            <div class="col-6 text-center">
                <p class="fw-bold">Người mua hàng</p>
                <p class="fst-italic">(Ký, ghi rõ họ tên)</p>
            </div>
            <div class="col-6 text-center position-relative">
                <p class="fw-bold">Người bán hàng</p>
                <div class="seal-signature">
                    LIÊN HOA<br>HOSPITAL<br>KÝ ĐIỆN TỬ
                </div>
                <p class="mt-4 fw-bold text-primary">Ký bởi: BỆNH VIỆN LIÊN HOA</p>
                <p class="text-muted small">Thời gian ký: <?= date('d/m/Y H:i', strtotime($data['ngay_tao'])) ?></p>
            </div>
        </div>
    </div>

    <!-- Tự động mở Print Menu nếu action=download -->
    <?php if ($action === 'download'): ?>
    <script>
        window.onload = function() {
            setTimeout(() => {
                window.print();
            }, 500);
        }
    </script>
    <?php endif; ?>

</body>
</html>
