<?php
require_once "./mvc/models/model.php";
class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke()
    {
        if (!isset($_GET['masp']) && !isset($_GET['page'])) {
            $sanphams = $this->model->getproductlist();
            $nguoidungs = $this->model->getnguoidung();
            include "./mvc/views/home.php";
        } else if (isset($_GET['masp'])) {
            $sanphams = $this->model->getproductlist();
            $nguoidungs = $this->model->getnguoidung();
            include "./mvc/views/product-detail.php";
        } else if (isset($_GET['page'])) {
            $sanphams = $this->model->getproductlist();
            $nguoidungs = $this->model->getnguoidung();
            include "./mvc/views/product-list.php";
        }
    }

    public function timKiem()
    {
        if (!isset($_GET['search'])) {
            $sanphams = $this->model->getproductlist();
            $nguoidungs = $this->model->getnguoidung();
            $nhomsps = $this->model->getnhomsp();
            include "./mvc/views/search-empty.php";
        } else {
            $sanphams = $this->model->getproductlist();
            $nguoidungs = $this->model->getnguoidung();
            include "./mvc/views/search-Results.php";
        }
    }

    public function cart()
    {
        $nguoidungs = $this->model->getnguoidung();
        if (isset($_GET['addcart'])) {
            include "./mvc/views/shoppingcart_available.php";
        } else if (isset($_GET['empty'])) {
            include "./mvc/views/shoppingcart_empty.php";
        } else
            header("Location: index.php");
    }
    public function login()
    {
        include "./mvc/views/login.php";
    }
    public function register()
    {
        include "./mvc/views/register.php";
    }
    public function account()
    {
        $nguoidungs = $this->model->getnguoidung();
        $sanphams = $this->model->getproductlist();
        if (isset($_GET['view'])) {
            include "./mvc/views/account.php";
        } else if (isset($_GET['edit'])) {
            include "./mvc/views/account.php";
        } else if (isset($_GET['order'])) {
            include "./mvc/views/account.php";
        } else {
            header("Location: index.php");
        }
    }
}
