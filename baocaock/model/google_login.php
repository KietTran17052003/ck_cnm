<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/mnguoidung.php'; // Thêm dòng này
session_start();

$client = new Google_Client();
$client->setClientId('398479068391-dv84mhguemttesu97qsssldnjum3uoga.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost:82/cnm-main/baocaock/model/google_login.php');
$client->addScope('email');
$client->addScope('profile');

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
} else {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (isset($token['error'])) {
        echo "<pre>";
        print_r($token);
        echo "</pre>";
        exit();
    }
    $_SESSION['access_token'] = $token;
    $client->setAccessToken($token);

    $oauth2 = new Google_Service_Oauth2($client);
    $userinfo = $oauth2->userinfo->get();
    // Lưu thông tin vào session giống đăng nhập thường
    $mnd = new MNguoiDung();
    if ($mnd->kiemtraEmail($userinfo->email)) {
        // Nếu đã có user, lấy thông tin user từ DB
        $user = $mnd->getUserByEmail($userinfo->email);
        if ($user && is_array($user)) {
            $_SESSION['dangnhap'] = $user;
        }
    } else {
        // Nếu chưa có user, tự động đăng ký tài khoản mới
        $hoten = $userinfo->name;
        $email = $userinfo->email;
        // Lấy giới tính từ Google (male = 1, female = 0, mặc định = null)
        $gioitinh = null;
        if (isset($userinfo->gender)) {
            if ($userinfo->gender == 'male') $gioitinh = 1;
            elseif ($userinfo->gender == 'female') $gioitinh = 0;
        }
        $id_role = 4; // role mặc định
        $trangthai = 1; // trạng thái mặc định
        $sql = "INSERT INTO nguoidung (hoten, email, id_role, trangthai) VALUES ('$hoten', '$email', $id_role, $trangthai)";
        $mnd->dangky($sql);

        // Sau khi đăng ký, lấy lại thông tin user để lưu session
        $user = $mnd->dangnhap($email, null);
        if ($user && is_array($user)) {
            $_SESSION['dangnhap'] = $user;
        }
    }

    // Chuyển hướng về trang chính
    header('Location: /cnm-main/baocaock/view/page/index.php?page=home');
    exit();
}
?>