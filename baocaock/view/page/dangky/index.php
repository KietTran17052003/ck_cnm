<?php
// session_start();
include('../../controller/cnguoidung.php');

if (isset($_POST['btDangky'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

    if ($gender === null || $gender === '') {
        echo "<script>alert('Vui lòng chọn giới tính!'); window.history.back();</script>";
        exit();
    }

    // Kiểm tra số điện thoại hợp lệ
    $phoneRegex = '/^(03|05|07|08|09)\d{8}$/';
    if (!preg_match($phoneRegex, $phone)) {
        echo "<script>alert('Số điện thoại không hợp lệ. Số điện thoại phải gồm 10 chữ số và bắt đầu là 03, 05, 07, 08, 09.'); window.history.back();</script>";
        exit();
    }

    // Kiểm tra mật khẩu và xác nhận mật khẩu
    $password = md5($_POST['password']); // Mã hóa mật khẩu bằng md5
    $confirm_password = md5($_POST['confirm_password']); // Mã hóa mật khẩu xác nhận
    if ($password !== $confirm_password) {
        echo "<script>alert('Mật khẩu và xác nhận mật khẩu không khớp!'); window.history.back();</script>";
        exit();
    }

    // Kiểm tra email đã tồn tại
    $obj = new CNguoiDung();
    $existingUser = $obj->kiemtraEmail($email);
    if ($existingUser) {
        echo "<script>alert('Email đã tồn tại, vui lòng sử dụng email khác!'); window.history.back();</script>";
        exit();
    } else {
        // Tạo câu lệnh SQL để thêm người dùng
        $sql = "INSERT INTO nguoidung (hoten, gioitinh, email, sdt, password, id_role, trangthai) 
                VALUES ('$fullname', '$gender', '$email', '$phone', '$password', 4, 1)";

        $result = $obj->dangkytk($sql);

        if ($result == 1) {
            echo "<script>
                alert('Đăng ký thành công!');
                setTimeout(function() {
                    window.location.href = '../page/index.php?page=dangnhap';
                }, 1000);
            </script>";
            exit();
        } else {
            echo "<p style='color:red; text-align:center;'>Đăng ký thất bại, vui lòng thử lại!</p>";
        }
    }
}
?>

<style>
  .container1 {
    background: url('https://noithatphacach.com/wp-content/uploads/2024/04/mau-nha-hang-dep-don-gian-hien-dai-6.jpg');
    background-size: cover;
    background-position: center;
  }
  .wrapper {
    min-height: 500px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  form {
    width: 350px; /* Giảm chiều rộng form */
    background: #F0F0F0;
    padding: 20px; /* Giảm padding */
    border-radius: 12px;
  }
  h3 {
    text-align: center;
    margin-bottom: 15px; /* Giảm khoảng cách dưới tiêu đề */
  }
  .input-group {
    margin-bottom: 12px; /* Giảm khoảng cách giữa các nhóm input */
    display: flex;
    align-items: center;
    border-bottom: 2px solid #d1d5db;
  }
  .input-group i {
    color: #4a5568;
    margin-right: 6px; /* Giảm khoảng cách giữa icon và input */
  }
  .input-group input, .input-group select {
    width: 100%;
    border: none;
    padding: 8px 0; /* Giảm padding của input */
    outline: none;
    background: #F0F0F0;
  }
  .input-group input:focus, .input-group select:focus {
    border-bottom-color: #3b82f6;
  }
  .button-group {
    display: flex;
    justify-content: center;
    margin-top: 12px; /* Giảm khoảng cách trên nút */
  }
  .button {
    padding: 8px 14px; /* Giảm padding của nút */
    border-radius: 8px;
    color: white;
    display: flex;
    align-items: center;
    border: none;
    cursor: pointer;
    font-size: 0.9rem; /* Giảm kích thước chữ */
  }
  .button-green {
    background-color: #10b981;
  }
  .error-message {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 2px;
    display: block;
    min-height: 18px;
  }
  .is-invalid {
    border-bottom: 2px solid #dc3545 !important;
  }
</style>

<head>
</head>
<body>
  <div class="container1">
    <div class='wrapper' style="font-family: 'Trebuchet MS', sans-serif; font-family: 'block-pro', 'Helvetica Neue', Verdana, Arial, sans-serif;">
      <form method="POST" action="">
        <h3>ĐĂNG KÝ</h3>
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="text" name="fullname" placeholder="Họ và tên" required />
          <span class="error-message"></span>
        </div>
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Email" required />
          <span class="error-message"></span>
        </div>
        <div class="input-group">
          <i class="fas fa-phone"></i>
          <input type="text" name="phone" placeholder="Số điện thoại" required />
          <span class="error-message"></span>
        </div>
        <div class="input-group">
          <i class="fas fa-venus-mars"></i>
          <select name="gender" required>
            <option value="" disabled selected>Giới tính</option>
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
            <option value="other">Khác</option>
          </select>
          <span class="error-message"></span>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Mật khẩu" required />
          <span class="error-message"></span>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu" required />
          <span class="error-message"></span>
        </div>
        <div class="button-group">
          <button type="submit" class="button button-green" name="btDangky">Đăng ký</button>
        </div>
      </form>
    </div>
  </div>

  <script>
function validateField(field, message, validator) {
  const errorSpan = field.parentElement.querySelector('.error-message');
  if (!validator(field.value.trim())) {
    errorSpan.textContent = message;
    field.classList.add("is-invalid");
    return false;
  } else {
    errorSpan.textContent = "";
    field.classList.remove("is-invalid");
    return true;
  }
}

window.onload = function() {
  const fullname = document.getElementsByName("fullname")[0];
  const email = document.getElementsByName("email")[0];
  const phone = document.getElementsByName("phone")[0];
  const gender = document.getElementsByName("gender")[0];
  const password = document.getElementsByName("password")[0];
  const confirm_password = document.getElementsByName("confirm_password")[0];

  fullname.addEventListener("blur", function() {
    validateField(fullname, "Họ và tên không được để trống.", v => v.length > 0);
  });

  email.addEventListener("blur", function() {
    validateField(email, "Email không hợp lệ.", v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
  });

  phone.addEventListener("blur", function() {
    validateField(phone, "Số điện thoại phải gồm 10 số và bắt đầu bằng 03, 05, 07, 08, 09.", v => /^(03|05|07|08|09)\d{8}$/.test(v));
  });

  gender.addEventListener("change", function() {
    validateField(gender, "Vui lòng chọn giới tính.", v => v !== "");
  });

  password.addEventListener("blur", function() {
    validateField(password, "Mật khẩu không được để trống.", v => v.length > 0);
  });

  confirm_password.addEventListener("blur", function() {
    validateField(confirm_password, "Xác nhận mật khẩu không được để trống.", v => v.length > 0);
    if (confirm_password.value !== password.value) {
      const errorSpan = confirm_password.parentElement.querySelector('.error-message');
      errorSpan.textContent = "Mật khẩu và xác nhận mật khẩu không khớp!";
      confirm_password.classList.add("is-invalid");
    }
  });

  // Validate khi submit
  document.querySelector("form").addEventListener("submit", function(e) {
    let isValid = true;
    isValid &= validateField(fullname, "Họ và tên không được để trống.", v => v.length > 0);
    isValid &= validateField(email, "Email không hợp lệ.", v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
    isValid &= validateField(phone, "Số điện thoại phải gồm 10 số và bắt đầu bằng 03, 05, 07, 08, 09.", v => /^(03|05|07|08|09)\d{8}$/.test(v));
    isValid &= validateField(gender, "Vui lòng chọn giới tính.", v => v !== "");
    isValid &= validateField(password, "Mật khẩu không được để trống.", v => v.length > 0);
    isValid &= validateField(confirm_password, "Xác nhận mật khẩu không được để trống.", v => v.length > 0);
    if (confirm_password.value !== password.value) {
      const errorSpan = confirm_password.parentElement.querySelector('.error-message');
      errorSpan.textContent = "Mật khẩu và xác nhận mật khẩu không khớp!";
      confirm_password.classList.add("is-invalid");
      isValid = false;
    }
    if (!isValid) e.preventDefault();
  });
};
</script>