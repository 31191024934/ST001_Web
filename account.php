<?php
require_once "./mvc/controllers/controller.php";
$controller = new Controller();
require_once "./mvc/modules/db_module.php";
require_once "./mvc/modules/users_module.php";
$link = null;
taoKetNoi($link);
if (isset($_POST['username'])) {
    chayTruyVanKhongTraVeDL($link, "update nguoidung set hoten='" . $_POST['hoten'] . "', sdt='" . $_POST['sdt'] . "',ngaysinh='',diachi='" . $_POST['diachi'] . "',gioitinh='" . $_POST['gioitinh'] . "',email='" . $_POST['email'] . "' where username='" . $_POST['username'] . "'");
    header("Location: account.php?view");
} else {
    $controller->account();
}
