<?php
class Nguoidung
{
    private $id_user;
    private $username;
    private $password;
    private $hoten;
    private $sdt;
    private $ngaysinh;
    private $diachi;
    private $gioitinh;
    private $email;

    public function getid_user()
    {
        return $this->id_user;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function gethoten()
    {
        return $this->hoten;
    }
    public function getsdt()
    {
        return $this->sdt;
    }
    public function getngaysinh()
    {
        return $this->ngaysinh;
    }
    public function getdiachi()
    {
        return $this->diachi;
    }
    public function getgioitinh()
    {
        return $this->gioitinh;
    }
    public function getemail()
    {
        return $this->email;
    }

    public function __construct($id_user, $username, $password, $hoten, $sdt, $ngaysinh, $diachi, $gioitinh, $email)
    {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->password = $password;
        $this->hoten = $hoten;
        $this->sdt = $sdt;
        $this->ngaysinh = $ngaysinh;
        $this->diachi = $diachi;
        $this->gioitinh = $gioitinh;
        $this->email = $email;
    }
}
