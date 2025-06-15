<?php
include_once("../../controller/cMonAn.php");
$pp = new cMonAN();

if (isset($_POST["btnUpdate"])) {
    $idmonan = isset($_POST["idmonan"]) ? intval($_POST["idmonan"]) : null;
    $tenmonan = $_POST["tenmonan"];
    $idloaimonan = $_POST["idloaimonan"];
    $giaban = $_POST["giaban"];
    $mota = $_POST["mota"];
    $tinhtrang = $_POST["trangthai"];
    $hinhanh_cu = isset($_POST["hinhanh_cu"]) ? $_POST["hinhanh_cu"] : '';

    // Kiểm tra dữ liệu đầu vào
    if (empty($idmonan) || empty($tenmonan) || empty($idloaimonan) || empty($giaban) || empty($mota) || empty($tinhtrang)) {
        echo "<script>
            alert('Vui lòng điền đầy đủ thông tin!');
            window.location.href = 'index.php?page=quanly/quanlymonan/';
        </script>";
        exit();
    }

    // Xử lý upload hình ảnh
    $filename_new = $hinhanh_cu; // Mặc định giữ nguyên hình ảnh cũ
    if (!empty($_FILES["hinhanh"]["name"])) {
        // Kiểm tra file upload có phải là ảnh không
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES["hinhanh"]["type"];
        $file_ext = strtolower(pathinfo($_FILES["hinhanh"]["name"], PATHINFO_EXTENSION));
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($file_type, $allowed_types) || !in_array($file_ext, $allowed_exts)) {
            echo "<script>
                alert('File tải lên không phải là ảnh hợp lệ (jpg, jpeg, png, gif)! Vui lòng chọn lại file ảnh.');
                window.history.back();
            </script>";
            exit();
        }

        $filename_new = rand(111, 999) . "_" . basename($_FILES["hinhanh"]["name"]);

        // Ensure the target directory exists
        $target_dir ="../../img/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Update the target path
        $target_path = $target_dir . $filename_new;

        if (!move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_path)) {
            echo "<script>
                alert('Upload ảnh thất bại! Vui lòng thử lại.');
                window.location.href = 'index.php?page=quanly/quanlymonan/';
            </script>";
            exit();
        }
    }

    // Sử dụng prepared statement để cập nhật dữ liệu
    $sql = "UPDATE monan 
            SET tenmonan = '$tenmonan', mota = '$mota', giaban = '$giaban', hinhanh = '$filename_new', trangthai = '$tinhtrang', idloaimonan = '$idloaimonan' 
            WHERE idmonan = '$idmonan'";

    if ($pp->getSua($sql)) {
        echo "<script>
            alert('Cập nhật món ăn thành công!');
            window.location.href = 'index.php?page=quanly/quanlymonan/';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Cập nhật thất bại! Vui lòng thử lại.');
            window.location.href = 'index.php?page=quanly/quanlymonan/';
        </script>";
        exit();
    }
}
?>