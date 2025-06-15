<?php
// session_start();
include_once("../../controller/cBan.php");
$p = new CBan();
date_default_timezone_set('Asia/Ho_Chi_Minh'); // Múi giờ Việt Nam



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "cancel") {
    // Logic xử lý xóa đặt bàn
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_booking') {
    if (!isset($_SESSION['dangnhap'])) {
        echo "<script>alert('Vui lòng đăng nhập để đặt bàn!'); window.location.href = 'index.php?page=dangnhap';</script>";
        exit();
    }
    $tenkh = $_POST['name'];
    $ngaydatban = $_POST['datetime'];
    $sdt = $_POST['phone'];
    $iduser = $_SESSION['dangnhap']['id_user'];
    $email = $_POST['email'];
    $ghichu = $_POST['message'];
    $soluong = $_POST['quantity'];
    $trangthai = 0;

    if (!empty($tenkh) && !empty($ngaydatban) && !empty($sdt) && !empty($email) && !empty($soluong)) {
        // Tạo câu lệnh SQL để thêm đơn đặt bàn
        $sql = "INSERT INTO dondatban (tenkh, ngaydatban, sdt, email, ghichu, soluong, trangthai, id_user) 
                VALUES ('$tenkh', '$ngaydatban', '$sdt', '$email', '$ghichu', $soluong, $trangthai, $iduser)";
        
        // Gọi phương thức getthemddb để thực hiện thêm
        $result = $p->getthemddb($sql);

        if ($result === 1) {
            echo "<script>alert('Đặt bàn thành công!'); window.location.href = 'index.php?page=home';</script>";
        } else {
            echo "<script>alert('Đặt bàn thất bại!');</script>";
        }
    } else {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../layout/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        .big-image {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 80%;
            position: relative;
            overflow: hidden;
        }
        .big-image::before {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url("https://arcviet.vn/wp-content/webp-express/webp-images/uploads/2016/07/thiet-ke-noi-that-nha-hang3.jpg.webp");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            z-index: -2;
            animation: Inout 5s infinite;
        }
        @keyframes Inout {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
        .big-image::after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: black;
            opacity: 0.3;
            z-index: -2;
        }
        .big-image .big-image-content {
            text-align: center;
        }
        .big-image .big-image-content h2 {
            font-size: 50px;
            color: white;
            font-family: 'Dancing Script';
        }
        .big-image .big-image-content p {
            font-size: 20px;
            color: white;
            margin: 15px 0;
        }
        /* Slider */
        .slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slide {
            min-width: 100%;
            height: 400px;
            background-color: #ddd;
        }
        .slide-1 {
            background-image: url("https://arcviet.vn/wp-content/webp-express/webp-images/uploads/2016/07/thiet-ke-noi-that-nha-hang3.jpg.webp");
            background-size: cover;
            background-position: center;
        }
        .slide-2 {
            background-image: url('../../img/nha-hang-2.jpeg');
            background-size: cover;
            background-position: center;
        }
        .slide-3 {
            background-image: url('../../img/nha-hang-1.jpg');
            background-size: cover;
            background-position: center;
        }
        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        button {
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            cursor: pointer;
            padding: 10px;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-submit:active {
            transform: scale(1);
        }

        .flex-container {
            /* max-width: 600px; */
            display: flex;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1.section-heading {
            text-align: center;
            font-size: 24px;
            /* margin-bottom: 20px; */
            color: #333;
            text-transform: uppercase;
            font-family: 'Arial', sans-serif;
            letter-spacing: 1px;
        }

        input::placeholder, textarea::placeholder {
            color: #aaa;
            font-style: italic;
        }

        section.about-meal {
            margin-bottom: 50px; /* Khoảng cách phía dưới phần "ĐẶT BÀN ONLINE" */
        }

        section.top-products {
            margin-bottom: 50px; /* Tạo khoảng cách giữa phần "THỰC ĐƠN" và footer */
        }

.product-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
    justify-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.product {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 100%;
    text-align: center;
    padding: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.product-img {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.product-name {
    font-size: 18px;
    font-weight: bold;
    margin: 15px 0;
}

.price {
    color: #e74c3c;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

.flex-1 {
    flex: 1 1 50%;
    padding: 20px;
    box-sizing: border-box;
}
        footer {
            padding-top: 20px; /* Đảm bảo footer có khoảng cách bên trong */
        }

    .intro-section {
    padding: 30px 20px;
    background-color: #fff;
    margin-top: 40px;
}

.intro-content {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: center;
}

.intro-image {
    flex: 1 1 40%;
}

.intro-image img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.intro-text {
    flex: 1 1 60%;
    font-size: 16px;
    line-height: 1.6;
    color: #333;
}

@media (max-width: 768px) {
    .intro-content {
        flex-direction: column;
    }
}

.error-message {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 2px;
    min-height: 18px;
    display: block;
}
.is-invalid {
    border-color: #dc3545 !important;
}
    </style>
</head>
<body>
    <div class="slider-container">
        <div class="slides">
            <div class="slide slide-1"></div>
            <div class="slide slide-2"></div>
            <div class="slide slide-3"></div>
        </div>
        <div class="navigation">
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </div>
    <section class="intro-section">
    <div class="container">
        <h1 class="section-heading" id="gioithieu">Giới Thiệu Về Nhà Hàng</h1>
        <div class="intro-content">
            <div class="intro-image">
                <img src="https://xconsgroup.com.vn/upload/image/cache/data/tin-tuc/thiet-ke-nha-hang-5d4-crop-1400-540.jpg" alt="Nhà hàng sang trọng">
            </div>
            <div class="intro-text">
                <p>
                    Chào mừng bạn đến với <strong>Savoria Restaurant</strong> – điểm đến lý tưởng để thưởng thức ẩm thực tinh tế giữa không gian sang trọng và đậm chất nghệ thuật. 
                    Với thực đơn phong phú được chế biến bởi các đầu bếp tài năng, chúng tôi cam kết mang đến trải nghiệm ẩm thực tuyệt vời cho mọi thực khách.
                </p>
                <p>
                    Hãy để mỗi bữa ăn tại Savoria là một hành trình đầy cảm xúc, nơi bạn có thể tận hưởng hương vị đặc sắc trong không gian ấm cúng và phục vụ chuyên nghiệp.
                </p>
            </div>
        </div>
    </div>
</section>

    
    <section class="about-meal" id="datban">
    <div class="container">
        <h1 class="section-heading">ĐẶT BÀN ONLINE</h1>
        <div class="flex-container">
            <div class="flex-1">
                <!-- Form đặt bàn -->
                <form action="" method="POST">
                    <input type="hidden" name="action" value="add_booking">
                    <div class="form-group">
                        <label for="name">Tên của bạn</label>
                        <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="datetime">Ngày giờ</label>
                        <input type="datetime-local" id="datetime" name="datetime" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" id="quantity" name="quantity" placeholder="Nhập số lượng" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email của bạn</label>
                        <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung</label>
                        <textarea id="message" name="message" placeholder="Nhập nội dung"></textarea>
                        <span class="error-message"></span>
                    </div>
                    <div class="form-group">
                        <?php if (!isset($_SESSION['dangnhap'])): ?>
                            <button type="button" class="btn-submit" onclick="window.location.href='index.php?page=dangnhap'">Đăng nhập để đặt lịch</button>
                        <?php else: ?>
                            <button type="submit" class="btn-submit">ĐẶT LỊCH</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
            <div class="flex-1">
                <h2>Savoria Restaurant – nơi hội tụ tinh hoa ẩm thực và nghệ thuật phục vụ.</h2>
                <p>Với không gian ấm cúng, hiện đại và đội ngũ đầu bếp tâm huyết, Savoria mang đến cho bạn trải nghiệm ẩm thực 
                    đáng nhớ qua từng món ăn được chăm chút đến từng chi tiết.
                    Từ bữa trưa thanh lịch đến buổi tối lãng mạn, từ cuộc hẹn thân mật đến buổi gặp mặt gia đình –
                    mọi khoảnh khắc tại Savoria đều được nâng niu.
                    </p>
                    Đặt bàn và chọn món ngay hôm nay để cùng chúng tôi viết nên câu chuyện vị giác riêng của bạn.
                
                
                </div>
        </div>
    </div>
</section>
    <section class="top-products" id="thucdon">
        <div class="container">
            <h1 class="section-heading">THỰC ĐƠN</h1>
            <?php
            include("../../controller/cMonAn.php");
            $maLoaiMonAn = isset($_GET['loaiMonAnId']) ? $_GET['loaiMonAnId'] : '';
            $p = new CMonAn();
            $tblMonAn = $p->getAllMonAN();
            ?>

<!-- Hiển Thị Sản Phẩm -->
<div class="product-container">
<?php
if ($tblMonAn && $tblMonAn->num_rows > 0) {
    while ($r = $tblMonAn->fetch_assoc()) {
        echo "
        <div class='product'>
            <img alt='{$r['tenmonan']}' src='../../img/{$r['hinhanh']}' class='product-img' />
            <h3 class='product-name'>{$r['tenmonan']}</h3>
            <div class='price'>" . number_format($r['giaban'], 0, ',', '.') . " VNĐ</div>
            
        </div>
        ";
    }
} else {
    echo "<p>Không có món ăn nào phù hợp.</p>";
}
?>
</div>
                    </div>
    </section>
</body>
</html>
<script>
let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;

    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
}

function changeSlide(direction) {
    showSlide(currentSlide + direction);
}

// Tự động chuyển slide mỗi 3 giây
setInterval(() => {
    changeSlide(1);
}, 3000);

function showTableDetails(table) {
    document.getElementById('table-id-display').textContent = table.idban;
    document.getElementById('table-id').value = table.idban;

    document.getElementById('table-seats-display').textContent = table.soghe ? table.soghe : 'Không xác định';
    document.getElementById('table-floor-display').textContent = table.vitri;
    document.getElementById('table-status-value').textContent = table.trangthai == 0 ? 'Chưa sử dụng' : 'Đang sử dụng';

    const reserveBtn = document.getElementById('reserve-btn');
    const reservationDateInput = document.getElementById('reservation-date');

    if (table.trangthai == 0) {
        // Bàn chưa sử dụng
        reserveBtn.style.display = 'inline-block';
        reservationDateInput.value = ''; // Reset giá trị
        reservationDateInput.disabled = false;
    } else {
        // Bàn đang sử dụng
        reserveBtn.style.display = 'none';
        if (table.ngaydatban) {
            // Chuyển đổi thời gian từ cơ sở dữ liệu sang định dạng datetime-local
            const datetime = new Date(table.ngaydatban);
            const offset = datetime.getTimezoneOffset() * 60000; // Lấy offset múi giờ
            const localDatetime = new Date(datetime.getTime() - offset); // Chuyển sang giờ địa phương
            const formattedDatetime = localDatetime.toISOString().slice(0, 16); // Định dạng YYYY-MM-DDTHH:MM
            reservationDateInput.value = formattedDatetime;
        } else {
            reservationDateInput.value = '';
        }
        reservationDateInput.disabled = true;
    }

    document.getElementById('table-details').style.display = 'block';
}

function clearDetails() {
    document.getElementById('table-details').style.display = 'none';
}

// Kiểm tra số điện thoại và số lượng khi submit form đặt bàn
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action=""][method="POST"]');
    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            // Kiểm tra số điện thoại
            const phoneInput = form.querySelector('input[name="phone"]');
            const phone = phoneInput.value.trim();
            const phoneRegex = /^(03|05|07|08|09)\d{8}$/;
            if (!phoneRegex.test(phone)) {
                alert("Số điện thoại không hợp lệ. Số điện thoại phải gồm 10 chữ số và bắt đầu là 03, 05, 07, 08, 09.");
                phoneInput.focus();
                isValid = false;
            }
            // Kiểm tra số lượng
            const quantityInput = form.querySelector('input[name="quantity"]');
            const quantity = parseInt(quantityInput.value, 10);
            if (isNaN(quantity) || quantity <= 0) {
                alert("Số lượng phải là số nguyên dương và lớn hơn 0.");
                quantityInput.focus();
                isValid = false;
            }
            if (!isValid) e.preventDefault();
        });
    }
});

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

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action=""][method="POST"]');
    if (!form) return;

    const name = form.querySelector('input[name="name"]');
    const datetime = form.querySelector('input[name="datetime"]');
    const quantity = form.querySelector('input[name="quantity"]');
    const email = form.querySelector('input[name="email"]');
    const phone = form.querySelector('input[name="phone"]');
    const message = form.querySelector('textarea[name="message"]');

    // Validate realtime
    name.addEventListener("blur", function() {
        validateField(name, "Tên không được để trống.", v => v.length > 0);
    });
    datetime.addEventListener("blur", function() {
        validateField(datetime, "Vui lòng chọn ngày giờ.", v => v.length > 0);
    });
    quantity.addEventListener("blur", function() {
        validateField(quantity, "Số lượng phải là số nguyên dương.", v => {
            const n = parseInt(v, 10);
            return !isNaN(n) && n > 0;
        });
    });
    email.addEventListener("blur", function() {
        validateField(email, "Email không hợp lệ.", v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
    });
    phone.addEventListener("blur", function() {
        validateField(phone, "Số điện thoại phải gồm 10 số và bắt đầu bằng 03, 05, 07, 08, 09.", v => /^(03|05|07|08|09)\d{8}$/.test(v));
    });

    // Validate khi submit
    form.addEventListener('submit', function(e) {
        let isValid = true;
        isValid &= validateField(name, "Tên không được để trống.", v => v.length > 0);
        isValid &= validateField(datetime, "Vui lòng chọn ngày giờ.", v => v.length > 0);
        isValid &= validateField(quantity, "Số lượng phải là số nguyên dương.", v => {
            const n = parseInt(v, 10);
            return !isNaN(n) && n > 0;
        });
        isValid &= validateField(email, "Email không hợp lệ.", v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
        isValid &= validateField(phone, "Số điện thoại phải gồm 10 số và bắt đầu bằng 03, 05, 07, 08, 09.", v => /^(03|05|07|08|09)\d{8}$/.test(v));
        if (!isValid) e.preventDefault();
    });
});
</script>
