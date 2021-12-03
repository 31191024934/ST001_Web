<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./mvc/controllers/controller.php";
require_once "./mvc/modules/db_module.php";
require_once "./mvc/modules/validate_module.php";
require_once "./mvc/modules/users_module.php";
$controller = new Controller();
$link = null;
taoKetNoi($link);
if (isset($_SESSION['username'])) {
    $controller->invoke();
}
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['name']) && isset($_POST['email'])) {
    $valid = $_POST['password'] == $_POST['password2']; //kiểm tra 2 ô pass có giống nhau hay không
    $valid = $valid && validateLenUP($_POST['username']); //username phải lớn hơn 8 và nhỏ hơn 30 ký tự
    $valid = $valid && validateLenUP($_POST['password']); //password phải lớn hơn 8 và nhỏ hơn 30 ký tự
    $valid = $valid && validateEmail($_POST['email']);
    if ($valid) { //nếu các điều kiện của dữ liệu nhập vào thỏa mãn
        if (existsUsername($link, $_POST['username'])) { //nếu username đã tồn tại trong CSDL
            giaiPhongBoNho($link, true);
            header("Location: register.php?msg=duplicate&name=" . $_POST['name'] . "&username=" . $_POST['username'] . "&email=" . $_POST['email'] . "");
        } else {
            dangki($link, $_POST['username'], $_POST['password'], $_POST['name'], $_POST['email']);
            $_SESSION['username'] = $_POST['username'];
            giaiPhongBoNho($link, true);
            $controller->invoke();
        }
    } else {
        giaiPhongBoNho($link, true);
        header("Location: register.php?msg=unvalid-data&name=" . $_POST['name'] . "&username=" . $_POST['username'] . "&email=" . $_POST['email'] . "");
    }
} else {
    $controller->register();
}
