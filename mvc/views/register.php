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
    <link rel="stylesheet" href="static/css/index.css" />
    <link rel="stylesheet" href="static/css/Register.css" />
    <title>Register for BlackPink | Thriftink</title>
</head>

<body>


    <!-- Content -->

    <div class="contain">
        <!-- Header -->
        <div class="content__header">
            <div class=" content__header-navbar">
                <img class="content__header__logo" src="./static/img/Logo.png" alt="">
                <a href="index.php" class="content__header__home">Home</a>
            </div>
        </div>
        <div class="container form-register">
            <h1 class="register-form__welcome">CREATE AN ACCOUNT</h1>
            <?php include_once "./mvc/modules/msg.php"; ?>
            <form action="./register.php" method="POST">
                <div class="col-sm-6 col-10 content-main__input">
                    <div class="col-12">
                        <input required name="name" type="text" class="form-main__yourname mb-2 mr-sm-2 col-12" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ""; ?>" placeholder=" Enter your name">
                    </div>
                    <div class="col-12 mt-4">
                        <input required name="username" type="text" class="form-main__username mb-2 mr-sm-2 col-12" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ""; ?>" placeholder=" Enter user name">
                    </div>
                    <div class="col-12 mt-4">
                        <input required name="email" type="email" class="form-main__email mb-2 mr-sm-2 col-12" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ""; ?>" placeholder=" Enter your email">
                    </div>
                    <div class="col-12 mt-4">
                        <div class="row input-password">
                            <input required name="password" type="password" class="col-6 form-main__password mb-2 mr-sm-2" placeholder=" Enter password">
                            <input required name="password2" type="password" class="col-6 form-main__createpassword mb-2 mr-sm-2" placeholder=" Create password">
                        </div>
                    </div>
                    <div class="col-12 mt-5 form-main__newto  text-center ">
                        <div class="row">
                            <hr class="col-3 form-main__hr ">
                            <p class="col-5">New to Thriftink ?</p>
                            <hr class="col-3 form-main__hr">
                        </div>
                    </div>
                    <div class="col-12 mt-4 d-flex justify-content-center ">
                        <input type="submit" value="Register" class="register-form__btn--register text-center col-md-8 col-12">
                    </div>
                </div>

            </form>
        </div>
    </div>


    </div>



    <!-- Footer -->

    <!-- <script type="text/javascript" src="../static/js/index.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>



<!-- <form action="./xulydangky.php" method="POST">
    <h3>Đăng kí</h3>
    <div class="frm_row">
        <div class="cls_caption">Họ và tên:</div>
        <div class="cls_input">
            <input type="text" name="name" value="<?php //echo isset($_GET['name']) ? $_GET['name'] : ""; 
                                                    ?>">
        </div>
    </div><br style="clear:both;" />
    <div class="frm_row">
        <div class="cls_caption">Tên tài khoản:</div>
        <div class="cls_input">
            <input type="text" name="username" value="<?php //echo isset($_GET['username']) ? $_GET['username'] : ""; 
                                                        ?>">
        </div>
    </div><br style="clear:both;" />
    <div class="frm_row">
        <div class="cls_caption">Mật khẩu:</div>
        <div class="cls_input"><input type="password" name="password"></div>
    </div><br style="clear:both;" />
    <div class="frm_row">
        <div class="cls_caption">Nhắc lại mật khẩu:</div>
        <div class="cls_input"><input type="password" name="password2"></div>
    </div><br style="clear:both;" />
    <div class="frm_row">
        <div class="cls_caption">Email:</div>
        <div class="cls_input"><input type="email" name="email" value="<?php //echo isset($_GET['email']) ? $_GET['email'] : ""; 
                                                                        ?>"></div>
    </div><br style="clear:both;" />
    <div class="img_row">
        <input type="submit" value="Sign up">
        <input type="reset" value="Xóa Form">
    </div><br style="clear:both;" />
</form> -->