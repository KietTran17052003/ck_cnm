<?php
include_once("ketnoi.php");

class MVaiTro {
    public function selectVaiTroForNhanVien() {
        $p = new ketnoi();
        $con = $p->connect();
        

        if ($con) {
            $str = "SELECT * FROM vaitro WHERE id_role IN (2, 3)";
            $tblCV = $con->query($str);
            $p->dongketnoi($con);
            return $tblCV;
        } else {
            return false; 
        }
    }
    
    
}
?>
