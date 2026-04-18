/**
 * FILE: script.js
 * Quản lý các tương tác người dùng và kiểm tra dữ liệu phía Client.
 */

document.addEventListener("DOMContentLoaded", function () {

    // Lắng nghe sự kiện Submit của Form đặt lịch
    const bookingForm = document.querySelector("form[action*='booking/store']");

    if (bookingForm) {
        bookingForm.addEventListener("submit", function (event) {
            let isValid = true;
            let errorFields = [];

            // 1. Chỉ định và lấy các DOM phần tử cần kiểm tra bắt buộc
            const patientNameInput = document.getElementById("patient_name");
            const phoneInput = document.getElementById("phone");
            const appointmentDateInput = document.getElementById("appointment_date");

            // 2. Logic kiểm tra rỗng đối với từng trường
            if (patientNameInput && patientNameInput.value.trim() === "") {
                isValid = false;
                errorFields.push("Họ và tên bệnh nhân");
                patientNameInput.style.borderColor = "red";
            } else if (patientNameInput) {
                patientNameInput.style.borderColor = "#dce1e6";
            }

            if (phoneInput && phoneInput.value.trim() === "") {
                isValid = false;
                errorFields.push("Số điện thoại liên hệ");
                phoneInput.style.borderColor = "red";
            } else if (phoneInput) {
                // Có thể bổ sung regex kiểm tra sdt VN (vd: /^(0[3|5|7|8|9])+([0-9]{8})$/)
                phoneInput.style.borderColor = "#dce1e6";
            }

            if (appointmentDateInput && appointmentDateInput.value.trim() === "") {
                isValid = false;
                errorFields.push("Ngày, giờ khám dự kiến");
                appointmentDateInput.style.borderColor = "red";
            } else if (appointmentDateInput) {
                appointmentDateInput.style.borderColor = "#dce1e6";
            }

            // 3. Xử lý khi có lỗi xảy ra (form không hợp lệ)
            if (!isValid) {
                event.preventDefault(); // Ngăn chặn trình duyệt gửi yêu cầu POST đến Server

                let errorMessage = "CẢNH BÁO: Vui lòng điền đầy đủ các thông tin sau:\n";
                // Chèn gạch đầu dòng cho từng lỗi
                errorFields.forEach(field => {
                    errorMessage += ` - ${field}\n`;
                });

                alert(errorMessage);
            }
        });
    }

});
