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
    <title>Cập nhật món ăn</title>
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
        height: 110vh;
    }
    .content {
        flex-grow: 1;
        padding: 20px 0;
        background-color: #F0F0F0;
        overflow-y: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }

    .form-group {
        display: flex;
        align-items: flex-start;
        margin-bottom: 5px; /* giảm khoảng cách giữa các ô */
        padding-top: 0;
        width: 100%;
    }

    .form-group label {
        font-weight: bold;
        text-align: right;
        padding-right: 15px;
        width: 22%;
        min-width: 120px;
        margin-top: 10px;
    }

    .form-group > div {
        width: 78%;
    }

    .form-control {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px 12px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        margin-bottom: 0;
    }

    .form-actions {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .form-actions button {
        font-size: 1rem;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
        color: inherit;
    }

    .form-actions button a {
        text-decoration: none;
        color: inherit;
    }

    .form-actions button:hover {
        text-decoration: underline;
    }

    img {
        margin-top: 10px;
        max-width: 100%; /* Đảm bảo hình ảnh không vượt quá khung */
        height: auto;
        border-radius: 5px;
    }

    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 3px;
        display: block;
        min-height: 18px;
    }
</style>
</head>
<body>
<div class="wrapper">
    <?php
    
    include_once("xuly.php"); // Include file xử lý
    include_once("../../model/mMonAn.php");
    include_once("../layout/sidebar.php");
    include_once("../../controller/cMonAn.php");
    include_once("../../controller/cLoaiMonAn.php");
    $pMonAn = new CMonAN();
    $pLoaiMonAn = new CLoaiMonAN();
    
    $idMonAn = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$idMonAn) {
        echo "<script>alert('Không tìm thấy món ăn!'); window.location.href = '../quanlymonan';</script>";
        exit();
    }
    
    $monAn = $pMonAn->getMaMonAn($idMonAn);
    if (!$monAn) {
        echo "<script>alert('Không tìm thấy món ăn!'); window.location.href = '../quanlymonan';</script>";
        exit();
    }
    
    $loaiMonAnList = $pLoaiMonAn->getAllLoaiMonAn();
    if (!$loaiMonAnList || $loaiMonAnList->num_rows == 0) {
        echo "<script>alert('Không có dữ liệu loại món ăn!');</script>";
    }
    ?>
    <div class="content">
        <h2 style="text-align: center; padding-bottom: 10px;">CẬP NHẬT MÓN ĂN</h2>
        <form id="formCapNhat" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idmonan" value="<?php echo $monAn['idmonan']; ?>">

            <!-- Tên món ăn -->
            <div class="form-group">
                <label for="tenmonan">Tên món ăn</label>
                <div style="width: 100%;">
                    <input type="text" id="tenmonan" class="form-control" name="tenmonan" value="<?php echo $monAn['tenmonan']; ?>" required>
                    <span class="error-message"></span>
                </div>
            </div>

            <!-- Loại món ăn -->
            <div class="form-group">
                <label for="idloaimonan">Loại món ăn</label>
                <div style="width: 100%;">
                    <select id="idloaimonan" class="form-control" name="idloaimonan" required>
                        <option value="">- Chọn loại món ăn -</option>
                        <?php
                        if ($loaiMonAnList && $loaiMonAnList->num_rows > 0) {
                            while ($row = $loaiMonAnList->fetch_assoc()) {
                                $selected = ($row['idloaimon'] == $monAn['idloaimonan']) ? 'selected' : '';
                                echo "<option value='{$row['idloaimon']}' $selected>{$row['tenloai']}</option>";
                            }
                        } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                        }
                        ?>
                    </select>
                    <span class="error-message"></span>
                </div>
            </div>

            <!-- Giá bán -->
            <div class="form-group">
                <label for="giaban">Giá bán (VNĐ)</label>
                <div style="width: 100%;">
                    <input type="number" id="giaban" class="form-control" name="giaban" value="<?php echo $monAn['giaban']; ?>" required>
                    <span class="error-message"></span>
                </div>
            </div>

            <!-- Mô tả -->
            <div class="form-group">
                <label for="mota">Mô tả</label>
                <div style="width: 100%;">
                    <textarea id="mota" class="form-control" name="mota" rows="3" required><?php echo $monAn['mota']; ?></textarea>
                    <span class="error-message"></span>
                </div>
            </div>

            <!-- Trạng thái -->
            <div class="form-group">
                <label for="trangthai">Trạng thái</label>
                <div style="width: 100%;">
                    <select id="trangthai" class="form-control" name="trangthai" required>
                        <option value="1" <?php echo $monAn['trangthai'] == 1 ? 'selected' : ''; ?>>Đang có</option>
                        <option value="2" <?php echo $monAn['trangthai'] == 2 ? 'selected' : ''; ?>>Hết món</option>
                    </select>
                    <span class="error-message"></span>
                </div>
            </div>

            <!-- Hình ảnh -->
            <div class="form-group">
                <label for="hinhanh">Hình ảnh</label>
                <div style="width: 100%;">
                    <input type="file" id="hinhanh" class="form-control" name="hinhanh">
                    <span class="error-message"></span>
                    <div style="margin-top: 10px;">
                        <p>Hình ảnh hiện tại:</p>
                        <?php
                        $imagePath = "../../img/" . $monAn['hinhanh'];
                        if (!empty($monAn['hinhanh']) && file_exists($imagePath)) {
                            echo "<div style='text-align: center;'>";
                            echo "<img src='$imagePath' alt='Hình ảnh món ăn' style='width: 200px; height: auto; border-radius: 5px;'>";
                            echo "</div>";
                            echo "<input type='hidden' name='hinhanh_cu' value='{$monAn['hinhanh']}'>";
                        } else {
                            echo "<p style='color: red;'>Hình ảnh không tồn tại</p>";
                            echo "<input type='hidden' name='hinhanh_cu' value=''>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Hành động -->
            <div class="form-actions py-3">
                <button class="btn btn-primary" style="border: none; background: none; padding: 0;">
                    <a href="index.php?page=quanly/quanlymonan" style="text-decoration: none; color: inherit;">Quay lại</a>
                </button>
                <button type="reset" class="btn btn-secondary" style="border: none; background: none; padding: 0;">
                    <i class="fas fa-times"></i> Hủy
                </button>
                <button type="submit" class="btn btn-success" name="btnUpdate" id="btnUpdate" style="border: none; background: none; padding: 0;">
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

    // Hình ảnh (chỉ kiểm tra nếu có chọn file mới)
    if (hinhanh) {
        hinhanh.addEventListener("change", function() {
            validateField(
                hinhanh,
                "Vui lòng chọn hình ảnh (jpg, jpeg, png, gif).",
                v => {
                    if (v.length === 0) return true; // Cho phép bỏ qua nếu không chọn file mới
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
                    if (v.length === 0) return true;
                    const allowed = ['jpg', 'jpeg', 'png', 'gif'];
                    const ext = v.split('.').pop().toLowerCase();
                    return allowed.includes(ext);
                }
            );
        });
    }

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
            if (v.length === 0) return true;
            const allowed = ['jpg', 'jpeg', 'png', 'gif'];
            const ext = v.split('.').pop().toLowerCase();
            return allowed.includes(ext);
        }
    );
    isValid &= validateField(idloaimonan, "Vui lòng chọn loại món ăn.", v => v !== "");
    isValid &= validateField(mota, "Mô tả không được để trống.", v => v.length > 0);
    isValid &= validateField(trangthai, "Vui lòng chọn trạng thái.", v => v !== "");

    if (isValid) {
        return confirm("Bạn có chắc chắn muốn cập nhật món ăn này không?");
    }
    return false;
}
</script>
</body>
</html>