<html lang="en">

<?php
require_once "./mvc/modules/db_module.php";
$link = null;
taoKetNoi($link);
if (str_word_count($_GET['search']) == 0) {
    unset($_GET['search']);
}
if (isset($_GET['manhom']) && $_GET['manhom'] === 'Product') {
    unset($_GET['manhom']);
}
if (isset($_GET['price'])) {
    if ($_GET['price'] == 'Price') {
        unset($_GET['price']);
    }
}
if (!isset($_GET['search']) && !isset($_GET['manhom']) && !isset($_GET['price'])) {
    header("Location: search.php");
}
?>

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
    <link rel="stylesheet" href="./static/css/search-Results.css" />
    <title><?php
            if (isset($_GET['search']) && isset($_GET['manhom']) && isset($_GET['price'])) {
                echo $_GET['search'];
            } else if (isset($_GET['manhom'])) {
                $tennhom = chayTruyVanTraVeDL($link, "select * from nhomsp");
                while ($rows = mysqli_fetch_assoc($tennhom)) {
                    if ($rows['manhom'] == $_GET['manhom']) {
                        echo $rows['tennhom'];
                    }
                }
            } else if (isset($_GET['search'])) {
                echo $_GET['search'];
            } else {
                echo strtoupper('Search Results');
            }
            ?> | Thriftink</title>
</head>

<body>
    <button onclick="backTop()" id="backTopBtn" title="Go to top">
        <img src="./static/svg/icon-arrow-up.svg" width="24px" height="24px" alt="back top" />
    </button>
    <!-- Header -->
    <div class="container-lg"><?php include_once 'common/header.php'; ?></div>

    <!-- Content -->
    <div class="container-lg mb-5">
        <div class="row search">
            <h1 class="section-title mb-3">search results</h1>
            <p class="mb-2 fs-18" style="color: rgba(0,0,0,0.5);"><i class="fas fa-search"></i> &nbsp; <?php if (isset($_GET['search']) && isset($_GET['manhom']) && isset($_GET['price'])) {
                                                                                                            echo strtoupper($_GET['search']);
                                                                                                        } else if (isset($_GET['manhom'])) {
                                                                                                            $tennhom = chayTruyVanTraVeDL($link, "select * from nhomsp");
                                                                                                            while ($rows = mysqli_fetch_assoc($tennhom)) {
                                                                                                                if ($rows['manhom'] == $_GET['manhom']) {
                                                                                                                    echo strtoupper($rows['tennhom']);
                                                                                                                }
                                                                                                            }
                                                                                                        } else if (isset($_GET['search'])) {
                                                                                                            echo strtoupper($_GET['search']);
                                                                                                        } else {
                                                                                                            echo strtoupper('Search Results');
                                                                                                        } ?></p>
        </div>
        <?php
        $truyvanPrice = null;
        if (isset($_GET['price'])) {
            if ($_GET['price'] == 'below20') {
                $truyvanPrice = 'giasp < 20';
            } else if ($_GET['price'] == '20to50') {
                $truyvanPrice = 'giasp between 20 and 49';
            } else if ($_GET['price'] == 'above50') {
                $truyvanPrice = 'giasp > 49';
            }
        }
        if (isset($_GET['search']) && !isset($_GET['manhom']) && !isset($_GET['price'])) {
            $result = chayTruyVanTraVeDL($link, "select * from sanpham where tensp like '%" . $_GET['search'] . "%'");
        } else if (!isset($_GET['search']) && isset($_GET['manhom']) && !isset($_GET['price'])) {
            $result = chayTruyVanTraVeDL($link, "select * from sanpham where manhom='" . $_GET['manhom'] . "'");
        } else if (!isset($_GET['search']) && !isset($_GET['manhom']) && isset($_GET['price'])) {
            $result = chayTruyVanTraVeDL($link, "select * from sanpham where " . $truyvanPrice . "");
        } else if (isset($_GET['search']) && isset($_GET['manhom']) && isset($_GET['price'])) {
            $result = chayTruyVanTraVeDL($link, "select * from sanpham where tensp like '%" . $_GET['search'] . "%' and manhom='" . $_GET['manhom'] . "' and " . $truyvanPrice . "");
        } else if (isset($_GET['manhom']) && isset($_GET['price'])) {
            $result = chayTruyVanTraVeDL($link, "select * from sanpham where manhom='" . $_GET['manhom'] . "' and " . $truyvanPrice . "");
        } else if (isset($_GET['search']) && isset($_GET['price'])) {
            $result = chayTruyVanTraVeDL($link, "select * from sanpham where tensp like '%" . $_GET['search'] . "%' and " . $truyvanPrice . "");
        } else if (isset($_GET['search']) && isset($_GET['manhom'])) {
            $result = chayTruyVanTraVeDL($link, "select * from sanpham where tensp like '%" . $_GET['search'] . "%' and manhom='" . $_GET['manhom'] . "'");
        }
        $i = 0;
        $sosp = 0;
        if (mysqli_num_rows($result) == 0) {
            echo "Chưa có sản phẩm bạn đang tìm kiếm. Hãy tìm kiếm những sản phẩm khác nhé!!";
        } else {
            while ($DLtimkiem = mysqli_fetch_assoc($result)) {
                $sosp++;
                if ($i < $sosp) {
                    if ($sosp != 1) {
                        echo "<hr/>";
                    }
                }
                echo "
                        <div class='row margin-60'>
                        <div class='col-12 col-lg-7'>
                        <div class='img-hover-zoom'>
                            <a href='index.php?masp=" . $DLtimkiem['masp'] . "'><img src='./static/img/" . $DLtimkiem['img1'] . "' width='100%' height='auto' alt='" . $DLtimkiem['alt1'] . "' class='hover-img' /></a>
                        </div>
                        </div>
                        <div class='col-12 col-lg-5'>
                        <div>
                            <a class='fs-24 fw-medium' href='index.php?masp=" . $DLtimkiem['masp'] . "'>
                                " . strtoupper($DLtimkiem['tensp']) . "
                             </a>
                            <p class='mt-4'>" . strtoupper($DLtimkiem['mota']) . "</p>
                            <h4 class='price mb-4'>$" . $DLtimkiem['giasp'] . ".00</h4>
                            <form method='POST' action='./xulygiohang.php'>
                            <button class='primary-btn add-cart-btn' name='action' value='Add to cart'>
                                <i class='fas fa-shopping-cart'></i>
                                Add to cart
                            </button>
                            <input type='hidden' name='masp' value='" . $DLtimkiem['masp'] . "'>
                            <input type='hidden' name='tensp' value='" . $DLtimkiem['tensp'] . "'>
                            <input type='hidden' name='giasp' value='" . $DLtimkiem['giasp'] . "'>
                            <input type='hidden' name='img1' value='" . $DLtimkiem['img1'] . "'>
                            <input type='hidden' name='alt1' value='" . $DLtimkiem['alt1'] . "'>
                            <input type='hidden' name='quantity' value='1'>
                            </form>
                        </div>
                        </div>
                        </div>
                        ";
            }
        }
        ?>
    </div>
    <!-- Content -->

    <hr />

    <!-- Footer -->
    <?php include_once 'common/footer.php'; ?>

    <script type="text/javascript" src="./static/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>