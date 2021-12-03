<?php
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/login.css" />
    <title>Login | Thriftink</title>
</head>

<body>
    <div class="contain">
        <div class="row col-12 content-navbar">
            <a href="./index.php" class="content-home">Home</a>
        </div>
        <div class="container">
            <h1 class="login-form__welcome">WELCOME TO BLACKPINK AREA</h1>
            <p class="login-form__text">Sign in for updates from BLACKPINK</p>
            <?php include_once "./mvc/modules/msg.php";
            ?>
            <form action="./login.php" class="login-form" method="POST">
                <div class="col-3"></div>
                <div class="mb-3 mt-3 login-form--style col-md-4 col-12">
                    <input required type="text" class="login-form__email col-12" id="email" placeholder="Enter username" name="username">
                </div>
                <div class="mb-3 mt-3 login-form--style col-md-4 col-12">
                    <input required type="password" class="login-form__password col-12" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="col-3 "></div>
                <div class="login-form__btn col-8 d-flex justify-content-center flex-wrap">
                    <input type="submit" value="Login" class=" login-form__btn--login text-center col-md-6 col-10" />
                    <a href="register.php" class="login-form__btn--register text-center col-md-8 col-12 mt-4">Register</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
</body>

</html>