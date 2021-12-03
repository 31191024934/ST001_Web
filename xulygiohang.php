<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once './mvc/modules/cart_module.php';
require_once './mvc/modules/db_module.php';

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "Add to cart":
            $hang = array("masp" => $_POST['masp'], "tensp" => $_POST['tensp'], "giasp" => $_POST['giasp'], "quantity" => $_POST['quantity'], "img1" => $_POST['img1'], "alt1" => $_POST['alt1']);
            themhangvaogio($hang);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            break;
        case "update-minus":
            capnhathangtronggio($_POST['masp'], $_POST['quantity'] - 1);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            break;
        case "update-plus":
            capnhathangtronggio($_POST['masp'], $_POST['quantity'] + 1);
            header("Location: " . $_SERVER['HTTP_REFERER']);
            break;
        case "delete-product":
            xoahangkhoigio($_POST['masp']);
            if ($_SESSION['giohang'] != null) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                header("Location: cart.php?empty");
            }
            break;
        case "check-out":
            $giohang = $_SESSION['giohang'];
            $link = null;
            taoKetNoi($link);
            chayTruyVanKhongTraVeDL($link, "INSERT INTO giohang VALUES(NULL, '" . $_POST['iduser'] . "','" . $_POST['username'] . "','" . $_POST['tongtien'] . "','" . $_POST['ngay'] . "')");
            header("Location: index.php");
            foreach ($giohang as $v) {
                $result = chayTruyVanTraVeDL($link, "select * from giohang where username='" . $_SESSION['username'] . "' and ngay='" . $_POST['ngay'] . "'");
                $row = mysqli_fetch_row($result);
                chayTruyVanKhongTraVeDL($link, "INSERT INTO chitietgiohang VALUES(NULL,'" . $row[0] . "','" . $v['tensp'] . "','" . $v['quantity'] . "','" . $v['giasp'] * $v['quantity'] . "')");
            }
            unset($_SESSION['giohang']);
        default:
            break;
    }
}
