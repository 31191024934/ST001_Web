<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./mvc/controllers/controller.php";
$controller = new Controller();
require_once "./mvc/modules/db_module.php";
require_once "./mvc/modules/users_module.php";
$link = null;
taoKetNoi($link);

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (dangnhap($link, $_POST['username'], $_POST['password'])) {
        if (true) {
            giaiPhongBoNho($link, true);
            $controller->invoke();
        }
    } else {
        giaiPhongBoNho($link, true);
        header("Location: login.php?msg=login-fail");
    }
} else {
    giaiPhongBoNho($link, true);
    $controller->login();
}
if (isset($_SESSION['username'])) {
    $controller->invoke();
}
