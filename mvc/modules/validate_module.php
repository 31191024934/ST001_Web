<?php
//Kiểm tra tính hợp lệ độ dài (độ dài từ 8 đến 30 kí tự)
function validateLenUP($up)
{
    return strlen($up) >= 8 && strlen($up) <= 30;
}

//Kiểm tra tính hợp lệ của email. Email phải có dạng abc@xyz.com
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) != false ? true : false;
}

//Kiểm tra tên username đã tồn tại trong csdl hay chưa?
function existsUsername($link, $username)
{
    $result = chayTruyVanTraVeDL($link, "select count(*) from nguoidung where username='" . $username . "'");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $row[0] > 0;
}
