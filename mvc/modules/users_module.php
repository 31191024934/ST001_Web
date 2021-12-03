<?php
function dangki($link, $username, $password, $hoten, $email)
{
    chayTruyVanKhongTraVeDL($link, "INSERT INTO nguoidung VALUES(NULL, '" . $username . "',
    '" . md5($password) . "','" . $hoten . "','', '', '', '', '" . $email . "')");
    $_SESSION['username'] = $username;
}

function dangnhap($link, $username, $password)
{
    $result = chayTruyVanTraVeDL($link, "select count(*) from nguoidung where username='" . mysqli_real_escape_string($link, $username) . "'
    and password='" . md5($password) . "'");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    if ($row[0] > 0) {
        $_SESSION['username'] = $username;
        return true;
    } else
        return false;
}

function dangxuat()
{
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        return true;
    } else
        return false;
}

function chinhsua($link, $hoten, $sdt, $diachi, $gioitinh, $email)
{
    if (isset($_SESSION['username'])) {
        chayTruyVanKhongTraVeDL($link, "UPDATE nguoidung SET hoten='" . $hoten . "', sdt='" . $sdt . "',diachi='" . $diachi . "',gioitinh='" . $gioitinh . "',email='" . $email . "' WHERE username=" . $_SESSION['username'] . "");
    }
}
