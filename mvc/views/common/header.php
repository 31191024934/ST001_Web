<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./mvc/modules/db_module.php";
include_once './mvc/modules/cart_module.php';
$link = null;
taoKetNoi($link);
$giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
?>

<body>
    <button onclick="backTop()" id="backTopBtn" title="Go to top">
        <img src="./static/svg/icon-arrow-up.svg" width="24px" height="24px" alt="back top" />
    </button>
    <header class="header">
        <div class="first-head">
            <div class="d-flex align-items-center">
                <div class="logo mt-4 mt-md-0" onclick="window.location.href='./index.php'" style="cursor: pointer;">
                    <img class="logo-img" src="./static/img/Logo.png" alt="LOGO" />
                </div>
                <!-- Navbar -->
                <div class="nav-bar justify-content-md-center justify-content-end">
                    <ul class="nav-list d-none d-lg-block">
                        <li><a href="index.php" class="fw-500 active">HOME</a></li>
                        <li><a href="index.php?page=1" class="fw-500">PRODUCTS</a></li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li><a href='account.php?view' class='fw-500'>ACCOUNT</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="d-none d-lg-flex align-items-center">
                <form method="GET" style="margin-top: 17px;" action="search.php">
                    <div class="d-none d-lg-block pe-3 search-box">
                        <input type="text" placeholder=" Search..." name="search" class="search-input" />
                        <button class='search-link no-style-btn' style="margin-right: -10px;"><i class='fas fa-search search-icon'></i></button>
                    </div>
                </form>
                <span class="d-flex align-items-center pe-3">
                    <a href='<?php if ($giohang != null) {
                                    echo "cart.php?addcart";
                                } else {
                                    echo "cart.php?empty";
                                } ?>' class="bags-shop"><i class="fas fa-shopping-bag"></i></a>
                    <span class="quantity-goods"><?php echo count($giohang); ?></span>
                </span>
                <?php
                if (isset($_SESSION['username'])) {
                    foreach ($nguoidungs as $nguoidung) {
                        if ($nguoidung->getusername() == $_SESSION['username']) {
                            echo "<a href='account.php?view' class='link-account fw-500 pe-3' style='color: #f6a5b9;'>" . $nguoidung->gethoten() . "</a>
                            <a href='logout.php' style='font-size:18px;' class='link-account fw-500'><i class='fas fa-sign-out-alt'></i></a>
                        ";
                        }
                    }
                } else {
                    echo "
                    <a href='login.php' class='link-account fw-500 pe-3'>Login</a>
                    <span class='primary-btn'>
                    <a href='register.php' class='link-account fw-500'>
                        Register
                    </a>
                    </span>
                    ";
                }
                ?>
            </div>
            <button class="btn pull-right d-block d-lg-none nav-collapse-btn m-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNav" aria-expanded="false" aria-controls="collapseNav">
                <span class="icon-bar"></span>
                <span class="icon-bar my-1"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </header>
    <div class="collapse" id="collapseNav">
        <ul class="ps-0 pt-3 mb-0 collapse-nav">
            <li><a href="index.php" class="fw-400 active">HOME</a></li>
            <li><a href="index.php?page=1" class="fw-400">PRODUCTS</a></li>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<li><a href='./account.php?view' class='fw-400'>ACCOUNT</a></li>";
            }
            ?>
            <?php
            if (isset($_SESSION['username'])) {
                foreach ($nguoidungs as $nguoidung) {
                    if ($nguoidung->getusername() == $_SESSION['username']) {
                        echo "<li><a href='./account.php?view' class='fw-400'>" . $nguoidung->gethoten() . "</a></li>
                        <li><a href='logout.php' class='fw-400'>LOG OUT</a></li>
                        ";
                    }
                }
            } else {
                echo "
                <li><a href='login.php' class='fw-400'>LOGIN</a></li>
                <li><a href='register.php' class='fw-400'>REGISTER</a></li>
                ";
            }
            ?>
            <li>
                <div class="d-flex align-items-center">
                    <span class="d-flex align-items-center pe-3">
                        <a href="<?php if ($giohang != null) {
                                        echo "cart.php?addcart";
                                    } else {
                                        echo "cart.php?empty";
                                    } ?>" class="bags-shop"><i class="fas fa-shopping-bag"></i></a>
                        <span class="quantity-goods"><?php echo count($giohang); ?></span>
                    </span>
                    <form method="GET" style="margin-top: 17px;" action="search.php">
                        <div class="pe-3">
                            <input type="text" name="search" placeholder=" Search..." class="search-input" />
                            <button class="search-link no-style-btn"><i class="fas fa-search search-icon"></i></button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>