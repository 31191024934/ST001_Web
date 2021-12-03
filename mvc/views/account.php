<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- favicon -->
    <link rel="icon" href="../favicon.png" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./static/css/index.css" />
    <link rel="stylesheet" href="./static/css/account.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <title>My Account | Thriftink</title>
</head>

<body>
    <!-- Header -->
    <div class="container-lg"><?php include_once 'common/header.php'; ?></div>

    <!-- Content -->

    <div class="container-fluid">
        <div class="row content d-flex justify-content-center">
            <div class="col-lg-3 col-12 box1">
                <div class="row left-top">
                    <div class="col-4 left-top__avt">
                        <img src="./static/img/avt.png" alt="">
                    </div>
                    <div class="col-8 left-top__name">
                        <h5><b><?php foreach ($nguoidungs as $nguoidung) {
                                    if ($nguoidung->getusername() == $_SESSION['username']) {
                                        echo $nguoidung->getusername();
                                    }
                                } ?></b></h5>
                    </div>
                    <div class="row left-bottom">
                        <div class="row">
                            <div class="row align-center">
                                <div class="col-2 left-bottom__account">
                                    <img src="./static/img/account-icon1.png" style="height:20px; margin-bottom:8px" alt="">
                                </div>
                                <div class="col-10 left-bottom__account">
                                    <h6>My account</h6>
                                </div>
                            </div>
                            <div class="col-12 left-bottom__file"><a href="./account.php?view" class="view-link">+ View account</a></div>
                            <div class="col-12 left-bottom__address"><a href="./account.php?edit" class="view-link">+ Edit account</a></div>
                            <div class="row align-center">
                                <div class="col-2 left-bottom__order">
                                    <img src="./static/img/account-icon2.png" style="height:20px; margin-bottom:8px" alt="">
                                </div>
                                <div class="col-10 left-bottom__order">
                                    <h6><a href="./account.php?order" class="buy-link">Purchase order</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="col-lg-7 col-12 box2-right">
                <?php
                if (isset($_GET['view'])) {
                    echo "
                    <div class='row right-title'>
                    <h4 class='right-title__profile'>MY PROFILE</h4>
                    </div>
                    ";
                    foreach ($nguoidungs as $nguoidung) {
                        if ($nguoidung->getusername() == $_SESSION['username']) {
                            echo "
                        <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label'>Name</label>
                        <div class='col-sm-8'>
                            <p class='fw-medium'>" . $nguoidung->gethoten() . "</p>
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label'>Email</label>
                        <div class='col-sm-8 d-flex'>
                        <p class='fw-medium'>" . $nguoidung->getemail() . "</p>
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label'>Phone Number</label>
                        <div class='col-sm-8'>
                        <p class='fw-medium'>" . $nguoidung->getsdt() . "</p>
                        </div>
                    </div>
                    <fieldset class='row mb-3'>
                        <legend class='col-sm-3 col-form-label' style='padding: 0;'>Gender</legend>
                        <div class='col-sm-8'>
                        <p class='fw-medium'>" . $nguoidung->getgioitinh() . "</p>
                        </div>
                    </fieldset>
                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label'>Address</label>
                        <div class='col-sm-8'>
                        <p class='fw-medium'>" . $nguoidung->getdiachi() . "</p>
                        </div>
                    </div>
                        ";
                        }
                    }
                } else if (isset($_GET['edit'])) {
                    foreach ($nguoidungs as $nguoidung) {
                        if ($nguoidung->getusername() == $_SESSION['username']) {
                            echo "
                    <div class='row right-title'>
                    <h4 class='right-title__profile'>MY PROFILE</h4>
                    </div>
                    <form action='./account.php' method='POST'>
                    <div class='row mb-3'>
                        <label for='inputName3' class='col-sm-3 col-form-label'>Name</label>
                        <div class='col-sm-8'>
                            <input type='text' name='hoten' value='" . $nguoidung->gethoten() . "' class='form-control' id='inputName3'>
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <label for='inputEmail3' class='col-sm-3 col-form-label'>Email</label>
                        <div class='col-sm-8 d-flex justify-content-end'>
                            <input type='email' name='email' value='" . $nguoidung->getemail() . "' class='form-control' id='inputEmail3'>
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <label for='inputAddress3' class='col-sm-3 col-form-label'>Address</label>
                        <div class='col-sm-8'>
                            <input type='text' value='" . $nguoidung->getdiachi() . "' name='diachi' class='form-control' id='inputPassword3'>
                        </div>
                    </div>
                    <div class='row mb-3'>
                        <label for='inputPhoneNumber3' class='col-sm-3 col-form-label'>Phone Number</label>
                        <div class='col-sm-8'>
                            <input type='text' value='" . $nguoidung->getsdt() . "' name='sdt' class='form-control' id='inputPhoneNumber3'>
                        </div>
                    </div>
                    <fieldset class='row mb-3'>
                        <legend class='col-sm-3 col-form-label' style='padding: 0;'>Gender</legend>
                        <div class='col-sm-8'>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='gioitinh' id='gridRadios1' value='Female' >
                                <label class='form-check-label' name='gioitinh' for='gridRadios1'>
                                    Female
                                </label>
                            </div>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='gioitinh' id='gridRadios2' value='Male'>
                                <label class='form-check-label' name='gioitinh' for='gridRadios2'>
                                    Male
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class='col-10 d-flex justify-content-end'>
                    <input type='hidden' value='" . $nguoidung->getusername() . "' name='username'>
                    <input type='hidden' value='" . $nguoidung->getid_user() . "' name='id_user'>
                    <input type='hidden' value='" . $nguoidung->getpassword() . "' name='password'>
                    <input type='submit' class=' login-form__btn--save text-center col-12 ' value='Save'>
                    </div>
                    </form>  
                    ";
                        }
                    }
                } else if (isset($_GET['order'])) {
                    echo "
                    <div class='row right-title'>
                    <h4 class='right-title__profile'>MY PURCHASE ORDER</h4>
                    </div>
                    ";
                    $result = chayTruyVanTraVeDL($link, "select * from giohang where username='" . $_SESSION['username'] . "'");
                    if (mysqli_num_rows($result) == 0) {
                        echo "
                        <div class='row mb-3'>
                        <h4 class='fw-medium text-center'>You have not purchased any products yet</h4>
                        <p class='text-center continue-text'>Please Continue Shopping ...</p>
                        <center>
                        <a href='./index.php?page=1'' class='primary-btn col-3'>View shop &nbsp;
                            <span>
                            <img src='./static/svg/right-arrow.svg' alt='right arrow' width='16px' height='16px' />
                            </span>
                        </a>
                        </center>
                        </div>
                        ";
                    } else {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $chitiet = chayTruyVanTraVeDL($link, "select * from chitietgiohang where id_giohang='" . $rows['id_giohang'] . "'");
                            while ($order = mysqli_fetch_assoc($chitiet)) {
                                foreach ($sanphams as $sanpham) {
                                    if ($order['tensp'] == $sanpham->gettensp()) {
                                        echo "
                                    <div class='row mb-3'>
                                    <img class='col-sm-3' style='margin:0 20px;' src='./static/img/" . $sanpham->getimg1() . "' alt=''>
                                    <div class='col-sm-8'>
                                    <a href='./index.php?masp=" . $sanpham->getmasp() . "'><h5 class='me-3 mb-2'>" . strtoupper($sanpham->gettensp()) . "</h5></a>
                                    <p>Date: " . $rows['ngay'] . "</p>
                                    <p>Quantity: " . $order['soluong'] . "</p>
                                    <p class='fw-medium'>Price: $" . $order['giatien'] . ".00</p>
                                    </div>
                                    </div>
                                    <hr>
                                ";
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>



    </div>


    <!-- Footer -->
    <?php include_once "common/footer.php"; ?>

    <script type="text/javascript" src="../static/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>