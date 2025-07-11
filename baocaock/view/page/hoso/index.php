<?php

$id_user = isset($_SESSION['dangnhap']['id_user']) ? $_SESSION['dangnhap']['id_user'] : null;
if ($id_user === null) {
    header("Location: ../page/index.php?page=dangnhap");
    exit();
}

// include_once("../layout/sidebar.php");
include("../../controller/cnguoidung.php");
$p = new CNguoiDung();
$r = $p->getMaND($id_user);  // Lấy thông tin nguoidung

// Hiển thị sidebar nếu id_role là 2 hoặc 3
if (isset($r['id_role']) && in_array($r['id_role'], [1,2, 3])) {
    include_once("../layout/sidebar.php");
}


if (isset($_POST['btnMK'])) {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $MatKhauCu = $p->getPasswordFromAccount($id_user); // Lấy mật khẩu từ bảng nguoidung
    // Kiểm tra mật khẩu cũ có đúng không
    if (md5($oldPassword) === $MatKhauCu) {
        // Kiểm tra mật khẩu mới và xác nhận mật khẩu có trùng khớp không
        if ($newPassword === $confirmPassword) {
            // Mã hóa mật khẩu mới bằng MD5
            $newPasswordHash = md5($newPassword);
            // Cập nhật mật khẩu mới vào cơ sở dữ liệu
            $p->updatePassword($id_user, $newPasswordHash);
            echo "<script>alert('Mật khẩu đã được cập nhật thành công!');</script>";
        } else {
            echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!');</script>";
        }
    } else {
        echo "<script>alert('Mật khẩu cũ không đúng!');</script>";
    }
}
?>
<style>
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #f5f5f5, #ffffff); 
    color: #333;
    margin: 0;
    padding: 0;
}

.container.qlnl {
    max-width: 700px;
    /* margin: 50px auto; */  /* Xóa dòng này */
    margin: 40px 0 0 0;       /* Thêm dòng này: chỉ cách top một chút, không căn giữa */
    background: #ffffff;
    border-radius: 20px;
    padding: 50px;
    box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease-in-out;
}

/* Hover effect on container */
.container.qlnl:hover {
    box-shadow: 0px 25px 60px rgba(0, 0, 0, 0.2);
}

/* Header */
.container h2 {
    text-align: center;
    font-size: 38px;
    color: rgb(57, 69, 85);
    margin-bottom: 30px;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 2px;
}

/* Form Elements */
.form-group {
    margin-bottom: 25px;
}

.form-group label {
    font-weight: 500;
    color: #444; 
    font-size: 18px;
    transition: color 0.3s ease;
}

.form-group .col-sm-6 {
    font-size: 18px;
    padding: 10px;
    color: #555;
    background: #fdfdfd;
    border-radius: 12px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Buttons */
button, .btn {
    border-radius: 30px;
    padding: 12px 30px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-group-btn {
    text-align: center;
    margin-top: 30px;
}

.btn-success {
    background-color: #3498db;
    color: white;
    border: none;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
}

.btn-success:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

/* Danger Button */
.btn-danger {
    background-color: #e74c3c;
    color: white;
    border: none;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.12);
}

.btn-danger:hover {
    background-color: #c0392b;
    transform: translateY(-2px);
}

/* Modal Styles */
.modal-header {
    background: rgb(57, 69, 85);
    color: white;
    border-bottom: none;
}

.modal-title {
    font-weight: bold;
    font-size: 20px;
}

.modal-footer .btn {
    margin: 0 15px;
}

.modal-footer .huy {
    border-radius: 10px;
    background-color: #bdc3c7;
    color: white;
    border: none;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
}

.modal-footer .huy:hover {
    background-color: #95a5a6;
}

.modal-footer .luu {
    border-radius: 10px;
    background-color: rgb(57, 69, 85);
    color: white;
    border: none;
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
}

/* Modal Backdrop */
.modal-backdrop.show {
    z-index: 0;
}

/* Body Text in Modal */
.modal-body {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 576px) {
    .form-group .col-sm-4, 
    .form-group .col-sm-6 {
        width: 100%;
        text-align: left;
    }

    .form-group label {
        margin-bottom: 5px;
    }
}

.content {
    flex-grow: 1;
    padding: 40px 0 0 0; /* Thêm padding top cho nội dung cách top */
    display: flex;
    align-items: flex-start; /* Đặt về flex-start để không căn giữa dọc */
    justify-content: center;
    background: transparent;
}
</style>


<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="wrapper" style="display: flex; min-height: 100vh;">
        <?php
        // Hiển thị sidebar nếu id_role là 1, 2 hoặc 3
        if (isset($r['id_role']) && in_array($r['id_role'], [1, 2, 3])) {
            include_once("../layout/sidebar.php");
        }
        ?>
        <div class="content" style="flex-grow:1; display:flex; align-items:center; justify-content:center; background:transparent;">
            <div class="container qlnl">
                <h2 class="d-flex justify-content-center font-weight-bold" style="color: #333;">Hồ Sơ Của Bạn</h2>
                <div class="form-group row py-2">
                    <label for="" class="col-sm-4 col-form-label">Họ Và Tên</label>
                    <div class="col-sm-6">
                        <?=$r['hoten']?>
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="" class="col-sm-4 col-form-label">Giới tính</label>
                    <div class="col-sm-6">
                        <?= $r['gioitinh'] == 1 ? "Nam" : ($r['gioitinh'] == 0 ? "Nữ" : "Không xác định") ?>
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="" class="col-sm-4 col-form-label">Số điện thoại</label>
                    <div class="col-sm-6">
                        <?=$r['sdt']?>
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <?=$r['email']?>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="form-group-btn">
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#changePasswordModal" style="background: rgb(57, 69, 85); color: white; border-radius: 10px;">
                            Đổi mật khẩu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Đổi Mật Khẩu -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Đổi Mật Khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="oldPassword">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                            
                        </div>

                        <div class="form-group">
                            <label for="newPassword">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="huy" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="luu" name="btnMK">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
