<?php
function themhangvaogio($hang)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        if (!array_key_exists($hang['masp'], $giohang)) {
            $giohang[$hang['masp']] = $hang;
        } else {
            $giohang[$hang['masp']]['quantity'] += $hang['quantity'];
        }
        $_SESSION['giohang'] = $giohang;
    } else {
        $giohang[$hang['masp']] = $hang;
        $_SESSION['giohang'] = $giohang;
    }
}
function xoahangkhoigio($key)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        unset($giohang[$key]);
        $_SESSION['giohang'] = $giohang;
    }
}
function capnhathangtronggio($key, $soluong)
{
    if (isset($_SESSION['giohang'])) {
        $giohang = $_SESSION['giohang'];
        $giohang[$key]['quantity'] = $soluong;
        $_SESSION['giohang'] = $giohang;
    }
}
function tinhtien()
{
    $sum = 0;
    $giohang = $_SESSION['giohang'];
    foreach ($giohang as $v) {
        $sum += $v['quantity'] * $v['giasp'];
    }
    return number_format($sum);
}
