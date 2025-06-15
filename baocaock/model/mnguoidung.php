<?php
include_once("ketnoi.php");

class MNguoiDung {
    public function SelectAllND() {
        $p = new ketnoi();
        $con = $p->connect();
        
        if ($con) {
            $str = "SELECT * FROM nguoidung";
            $tblND = $con->query($str);
            $p->dongKetNoi($con);
            return $tblND;
        } else {
            return false; 
        }
    } 

    // Lấy một nguoidung theo id
        public function SelectMaND($id) {
            $p = new ketnoi();
            $con = $p->connect();
            $con->set_charset('utf8');
            if ($con) {
                $str = "SELECT * FROM nguoidung WHERE id_user = ?";
                $stmt = $con->prepare($str);
                $stmt->bind_param("i", $id); // Sử dụng prepared statement để bảo vệ khỏi SQL Injection
                $stmt->execute();
                $result = $stmt->get_result();
                $p->dongKetNoi($con);

                if ($result->num_rows > 0) {
                    return $result->fetch_assoc(); // Trả về 1 dòng kết quả
                } else {
                    return false; // Không tìm thấy nv với id đó
                }
            } else {
                return false; // Không thể kết nối đến CSDL
            }
        }

    public function dangnhap($email, $password) {
        $p = new ketnoi();
        $con = $p->connect();

        if ($con) {
            $stmt = $con->prepare("SELECT id_user, hoten, gioitinh, email, sdt, id_role, trangthai 
                                   FROM nguoidung 
                                   WHERE email = ? AND password = ?");
            if (!$stmt) {
                die("Lỗi prepare: " . $con->error);
            }

            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $stmt->bind_result($uid, $hoten, $gioitinh, $emailResult, $sdt, $id_role, $trangthai);

            if ($stmt->fetch()) {
                $stmt->close();
                $p->dongKetNoi($con);

                return array(
                    "id_user" => $uid,
                    "hoten" => $hoten,
                    "gioitinh" => $gioitinh,
                    "email" => $emailResult,
                    "sdt" => $sdt,
                    "id_role" => $id_role,
                    "trangthai" => $trangthai
                );
            } else {
                $stmt->close();
                $p->dongKetNoi($con);
                return 0;
            }
        } else {
            return false;
        }
    }
    public function dangky($sql) {
        $p = new ketnoi();
        $con = $p->connect();
        
        if ($con) {
            if ($con->query($sql) === TRUE) {
                // Đóng kết nối sau khi thực hiện truy vấn thành công
                $p->dongKetNoi($con);
                return true;
            } else {
                // Đóng kết nối sau khi truy vấn không thành công
                $p->dongKetNoi($con);
                return false;
            }
        } else {
            return false;
        }
    }

    public function kiemtraEmail($email) {
        $p = new ketnoi();
        $con = $p->connect();

        if ($con) {
            $stmt = $con->prepare("SELECT email FROM nguoidung WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                return true; // Email đã tồn tại
            } else {
                return false; // Email chưa tồn tại
            }
        } else {
            return false; // Lỗi kết nối
        }
    }
    public function getUserByEmail($email) {
        $p = new ketnoi();
        $con = $p->connect();
        if ($con) {
            $sql = "SELECT * FROM nguoidung WHERE email='$email' LIMIT 1";
            $result = mysqli_query($con, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            }
        }
        return false;
    }
}
?>

