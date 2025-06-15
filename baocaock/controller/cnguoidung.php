<?php
include_once("../../model/mnguoidung.php");

class CNguoiDung {
    public function getAllND() {
        $p = new MNguoiDung();
        $tblSP = $p->SelectAllND();
        
        if (!$tblSP) {
            return -1; 
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP; 
            } else { 
                return 0; 
            }
        }
    }

        // Lấy nguoidung theo mã
        public function getMaND($id) {
            $p = new MNguoiDung();
            $tblND = $p->selectMaND($id);

            if ($tblND) {
                return $tblND;
            } else {
                return null; // Không có nv với id đó
            }
        }

    public function dangnhaptaikhoan($email, $password) {
        $password = md5($password); // vì trong DB đang lưu dưới dạng md5
        $p = new MNguoiDung();
        $result = $p->dangnhap($email, $password);
        return $result;
    }
    public function dangkytk($sql){
        $p = new MNguoiDung();
        // Xử lý SQL injection tại đây
     
        $result= $p->dangky($sql);
        if (!$result) {
            return -1;  // Lỗi khi cập nhật
        } else {
            return 1;  // Thành công
        }
    }

    public function kiemtraEmail($email) {
        $p = new MNguoiDung();
        return $p->kiemtraEmail($email);
    }

    public function getPasswordFromAccount($id) {
    // Kết nối tới cơ sở dữ liệu
    $p = new ketnoi();
    $con = $p->connect();
    $con->set_charset('utf8');  // Đặt mã hóa ký tự

    // Kiểm tra kết nối cơ sở dữ liệu
    if ($con) {
        // Câu lệnh SQL để lấy mật khẩu cũ từ bảng taikhoan
        $sql = "SELECT password FROM nguoidung WHERE id_user = ?";

        // Sử dụng prepared statement để tránh SQL Injection
        if ($stmt = $con->prepare($sql)) {
            // Gắn tham số vào prepared statement
            $stmt->bind_param("i", $id);  // 'i' là kiểu dữ liệu integer cho MaNV

            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                // Lấy kết quả
                $stmt->bind_result($matKhauCu); // Biến $matKhauCu nhận giá trị mật khẩu
                $stmt->fetch(); // Lấy dữ liệu từ kết quả truy vấn

                $stmt->close(); // Đóng statement
                $p->dongKetNoi($con); // Đóng kết nối cơ sở dữ liệu

                return $matKhauCu; // Trả về mật khẩu cũ
            } else {
                $stmt->close();
                $p->dongKetNoi($con);
                return null; // Nếu có lỗi trong việc thực thi câu lệnh
            }
        } else {
            $p->dongKetNoi($con);
            return null; // Nếu không thể chuẩn bị câu lệnh SQL
        }
    } else {
        return null; // Nếu kết nối cơ sở dữ liệu thất bại
    }
}

public function updatePassword($id, $newPasswordHash) {
    // Kết nối tới cơ sở dữ liệu
    $p = new ketnoi();
    $con = $p->connect();
    $con->set_charset('utf8');  // Đặt mã hóa ký tự

    // Kiểm tra kết nối cơ sở dữ liệu
    if ($con) {
        // Câu lệnh SQL để cập nhật mật khẩu
        $sql = "UPDATE nguoidung SET password = ? WHERE id_user = ?";
        
        // Sử dụng prepared statement để tránh SQL Injection
        if ($stmt = $con->prepare($sql)) {
            // Gắn tham số vào prepared statement
            $stmt->bind_param("si", $newPasswordHash, $id);
            
            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                $stmt->close(); // Đóng statement sau khi thực thi
                $p->dongKetNoi($con); // Đóng kết nối cơ sở dữ liệu
                return true; // Trả về true nếu thành công
            } else {
                $stmt->close();
                $p->dongKetNoi($con);
                return false; // Trả về false nếu có lỗi
            }
        } else {
            $p->dongKetNoi($con);
            return false; // Nếu không thể chuẩn bị câu lệnh SQL
        }
    } else {
        return false; // Nếu kết nối cơ sở dữ liệu thất bại
    }
}
}
?>
