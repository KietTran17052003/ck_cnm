<?php
// session_start();
if (!isset($_SESSION["dangnhap"])) {
    header("Location: ../../index.php?page=dangnhap");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý món ăn</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .wrapper {
            display: flex;
            height: 100vh;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #F0F0F0;
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);    
        }

/* Nhãn và ô nhập liệu */
.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    padding-top: 10px;
}

.form-group label {
    font-weight: bold;
    text-align: right;
    padding-right: 15px;
}

.form-control {
    width: 80%;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

/* Hiệu ứng hover và focus */
.form-control:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
}

/* Nút radio và select */
input[type="radio"] {
    margin-right: 5px;
}

select.form-control {
    cursor: pointer;
}

/* Trạng thái lỗi */
.is-invalid {
    border-color: #dc3545;
}

.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 5px;
    display: block; /* Đảm bảo nằm dưới */
}

button {
    padding: 10px 10px;
    font-size: 1rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

button.btn-primary:hover {
    background-color: #0056b3;
}

button.btn-secondary:hover {
    background-color: #5a6268;
}

button.btn-success:hover {
    background-color: #218838;
}

button a {
    text-decoration: none;
    color: inherit;
}

button a:hover {
    text-decoration: underline;
}

/* Khoảng cách và căn chỉnh */
.form-actions {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 20px;
}

.row {
    margin: 0;
    padding: 5px;
}

.col-sm-2 {
    flex: 0 0 25%;
    max-width: 25%;
}

.col-sm-5 {
    flex: 0 0 75%;
    max-width: 75%;
}
    </style>
</head>
<body>

<div class="wrapper">
    <?php 
    include_once("../layout/sidebar.php"); 
    include_once("../../controller/cLoaiMonAn.php");
    $p = new CLoaiMonAN();
    include_once("xuly.php");
    ?>
    <div class="content">
    <form action="" method="post" enctype="multipart/form-data">
  <h2 style="text-align: center; padding-bottom: 10px;">THÊM MÓN ĂN</h2>

  <!-- Tên món ăn -->
  <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Tên món ăn</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="tenmonan" placeholder="Nhập tên món ăn" required />
      <span class="error-message"></span>
    </div>
  </div>

  <!-- Giá bán -->
  <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Giá bán (VNĐ)</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" name="giaban" placeholder="Nhập giá bán" required />
      <span class="error-message"></span>
    </div>
  </div>

  <!-- Hình ảnh -->
  <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Hình ảnh</label>
    <div class="col-sm-5">
      <input type="file" class="form-control" name="hinhanh" required />
      <span class="error-message"></span>
    </div>
  </div>

  <!-- Loại món ăn -->
  <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Loại món ăn</label>
    <div class="col-sm-5">
      <select class="form-control" name="idloaimonan" required>
        <option value="">- Chọn loại món ăn -</option>
        <?php
        $loaimonan = $p->getAllLoaiMonAn();
        if ($loaimonan && $loaimonan !== -1 && $loaimonan !== 0) {
        while ($r = mysqli_fetch_array($loaimonan)) {
          echo '<option value="' . $r["idloaimon"] . '">' . $r["tenloai"] . '</option>';
        }
} else {
            echo '<option value="">Không có dữ liệu</option>';
        }
        ?> 
              </select>
      <span class="error-message"></span>
    </div>
  </div>

  <!-- Mô tả -->
  <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Mô tả</label>
    <div class="col-sm-5">
      <textarea class="form-control" name="mota" rows="3" placeholder="Nhập mô tả món ăn" required></textarea>
      <span class="error-message"></span>
    </div>
  </div>

  <!-- Trạng thái -->
  <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Trạng thái</label>
    <div class="col-sm-5">
      <select class="form-control" name="trangthai" required>
        <option value="">- Chọn trạng thái -</option>
        <option value="1">Đang có</option>
        <option value="0">Tạm hết</option>
      </select>
      <span class="error-message"></span>
    </div>
  </div>

  <!-- Hành động -->
  <div class="form-actions py-3">
        <button class="btn btn-primary">
          <a href="index.php?page=quanly/quanlymonan" style="text-decoration: none; color: inherit;">Quay lại</a>
        </button>
         
        <button type="reset" class="btn btn-secondary">
          <i class="fas fa-times"></i> Hủy
        </button>
        <button type="submit" class="btn btn-success" onclick="return validateForm()" name="btnAdd">
          <i class="far fa-save"></i> Lưu
        </button>
      </div>
</form>
    </div>
    
</div>

<script>
// Hàm kiểm tra từng trường
function validateField(field, message, validator) {
    const errorSpan = field.nextElementSibling;
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

// Gắn sự kiện kiểm tra real-time cho từng trường
window.onload = function() {
    const tenmonan = document.getElementsByName("tenmonan")[0];
    const giaban = document.getElementsByName("giaban")[0];
    const hinhanh = document.getElementsByName("hinhanh")[0];
    const idloaimonan = document.getElementsByName("idloaimonan")[0];
    const mota = document.getElementsByName("mota")[0];
    const trangthai = document.getElementsByName("trangthai")[0];

    // Tên món ăn
    tenmonan.addEventListener("input", function() {
        validateField(tenmonan, "Tên món ăn không được để trống.", v => v.length > 0);
    });
    tenmonan.addEventListener("blur", function() {
        validateField(tenmonan, "Tên món ăn không được để trống.", v => v.length > 0);
    });

    // Giá bán
    giaban.addEventListener("input", function() {
        validateField(
            giaban,
            "Giá bán phải là số dương và không được âm.",
            v => {
                const num = parseFloat(v);
                return !isNaN(num) && num > 0;
            }
        );
    });
    giaban.addEventListener("blur", function() {
        validateField(
            giaban,
            "Giá bán phải là số dương và không được âm.",
            v => {
                const num = parseFloat(v);
                return !isNaN(num) && num > 0;
            }
        );
    });

    // Hình ảnh
    hinhanh.addEventListener("change", function() {
        validateField(
            hinhanh,
            "Vui lòng chọn hình ảnh (jpg, jpeg, png, gif).",
            v => {
                if (v.length === 0) return false;
                const allowed = ['jpg', 'jpeg', 'png', 'gif'];
                const ext = v.split('.').pop().toLowerCase();
                return allowed.includes(ext);
            }
        );
    });
    hinhanh.addEventListener("blur", function() {
        validateField(
            hinhanh,
            "Vui lòng chọn hình ảnh (jpg, jpeg, png, gif).",
            v => {
                if (v.length === 0) return false;
                const allowed = ['jpg', 'jpeg', 'png', 'gif'];
                const ext = v.split('.').pop().toLowerCase();
                return allowed.includes(ext);
            }
        );
    });

    // Loại món ăn
    idloaimonan.addEventListener("change", function() {
        validateField(idloaimonan, "Vui lòng chọn loại món ăn.", v => v !== "");
    });
    idloaimonan.addEventListener("blur", function() {
        validateField(idloaimonan, "Vui lòng chọn loại món ăn.", v => v !== "");
    });

    // Mô tả
    mota.addEventListener("input", function() {
        validateField(mota, "Mô tả không được để trống.", v => v.length > 0);
    });
    mota.addEventListener("blur", function() {
        validateField(mota, "Mô tả không được để trống.", v => v.length > 0);
    });

    // Trạng thái
    trangthai.addEventListener("change", function() {
        validateField(trangthai, "Vui lòng chọn trạng thái.", v => v !== "");
    });
    trangthai.addEventListener("blur", function() {
        validateField(trangthai, "Vui lòng chọn trạng thái.", v => v !== "");
    });
};

// Kiểm tra tất cả khi submit
function validateForm() {
    const tenmonan = document.getElementsByName("tenmonan")[0];
    const giaban = document.getElementsByName("giaban")[0];
    const hinhanh = document.getElementsByName("hinhanh")[0];
    const idloaimonan = document.getElementsByName("idloaimonan")[0];
    const mota = document.getElementsByName("mota")[0];
    const trangthai = document.getElementsByName("trangthai")[0];

    let isValid = true;

    isValid &= validateField(tenmonan, "Tên món ăn không được để trống.", v => v.length > 0);
    isValid &= validateField(
        giaban,
        "Giá bán phải là số dương và không được âm.",
        v => {
            const num = parseFloat(v);
            return !isNaN(num) && num > 0;
        }
    );
    isValid &= validateField(
        hinhanh,
        "Vui lòng chọn hình ảnh (jpg, jpeg, png, gif).",
        v => {
            if (v.length === 0) return false;
            const allowed = ['jpg', 'jpeg', 'png', 'gif'];
            const ext = v.split('.').pop().toLowerCase();
            return allowed.includes(ext);
        }
    );
    isValid &= validateField(idloaimonan, "Vui lòng chọn loại món ăn.", v => v !== "");
    isValid &= validateField(mota, "Mô tả không được để trống.", v => v.length > 0);
    isValid &= validateField(trangthai, "Vui lòng chọn trạng thái.", v => v !== "");

    if (isValid) {
        return confirm("Bạn có chắc chắn muốn thêm món ăn này không?");
    }
    return false;
}
</script>

</body>
</html>
