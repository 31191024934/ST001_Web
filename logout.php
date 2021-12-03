<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./mvc/modules/db_module.php";
require_once "./mvc/modules/users_module.php";

$link = null;
taoKetNoi($link);
if (isset($_SESSION['username'])) {
    if (dangxuat()) {
        giaiPhongBoNho($link, true);
        header("Location: index.php");
    } else {
        giaiPhongBoNho($link, true);
        header("Content-type: text/html; charset=utf-8");
        echo "Không thể đăng xuất!";
    }
} else {
    header("Location: index.php");
}
