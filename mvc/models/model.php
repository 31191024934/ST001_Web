<?php
// require_once "./mvc/models/sanpham.php";
require_once "./mvc/models/sanpham.php";
require_once "./mvc/models/nhomsp.php";
require_once "./mvc/models/nguoidung.php";
require_once "./mvc/modules/db_module.php";

class Model
{
    public function getproductlist()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from sanpham");
        $allproduct = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $sanpham = new Sanpham($rows['masp'], $rows['manhom'], $rows['tensp'], $rows['img1'], $rows['img2'], $rows['img3'], $rows['alt1'], $rows['alt2'], $rows['alt3'], $rows['giasp'], $rows['mota'], $rows['trangthai']);
            array_push($allproduct, $sanpham);
        }
        giaiPhongBoNho($link, $result);
        return $allproduct;
    }

    public function getnhomsp()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from nhomsp");
        $allnhomsp = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $nhomsp = new Nhomsp($rows['manhom'], $rows['tennhom']);
            array_push($allnhomsp, $nhomsp);
        }
        giaiPhongBoNho($link, $result);
        return $allnhomsp;
    }

    public function getnguoidung()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from nguoidung");
        $allnguoidung = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $nguoidung = new Nguoidung($rows['id_user'], $rows['username'], $rows['password'], $rows['hoten'], $rows['sdt'], $rows['ngaysinh'], $rows['diachi'], $rows['gioitinh'], $rows['email']);
            array_push($allnguoidung, $nguoidung);
        }
        giaiPhongBoNho($link, $result);
        return $allnguoidung;
    }
}
