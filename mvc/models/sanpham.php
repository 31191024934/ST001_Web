<?php
class Sanpham
{
    private $masp;
    private $manhom;
    private $tensp;
    private $img1;
    private $img2;
    private $img3;
    private $alt1;
    private $alt2;
    private $alt3;
    private $giasp;
    private $mota;
    private $trangthai;

    public function getmasp()
    {
        return $this->masp;
    }
    public function getmanhom()
    {
        return $this->manhom;
    }
    public function gettensp()
    {
        return $this->tensp;
    }
    public function getimg1()
    {
        return $this->img1;
    }
    public function getimg2()
    {
        return $this->img2;
    }
    public function getimg3()
    {
        return $this->img3;
    }
    public function getalt1()
    {
        return $this->alt1;
    }
    public function getalt2()
    {
        return $this->alt2;
    }
    public function getalt3()
    {
        return $this->alt3;
    }
    public function getgiasp()
    {
        return $this->giasp;
    }
    public function getmota()
    {
        return $this->mota;
    }
    public function gettrangthai()
    {
        return $this->trangthai;
    }

    public function __construct($masp, $manhom, $tensp, $img1, $img2, $img3, $alt1, $alt2, $alt3, $giasp, $mota, $trangthai)
    {
        $this->masp = $masp;
        $this->manhom = $manhom;
        $this->tensp = $tensp;
        $this->img1 = $img1;
        $this->img2 = $img2;
        $this->img3 = $img3;
        $this->alt1 = $alt1;
        $this->alt2 = $alt2;
        $this->alt3 = $alt3;
        $this->giasp = $giasp;
        $this->mota = $mota;
        $this->trangthai = $trangthai;
    }
}
