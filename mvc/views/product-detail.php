<html lang="en">
<?php
if ($_GET['masp'] == "") {
  header("Location: ./index.php");
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
  <!-- tabs -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./static/css/index.css" />
  <link rel="stylesheet" href="./static/css/pro-detail.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet" />
  <title><?php
          foreach ($sanphams as $sanpham) {
            if (isset($_GET['masp']) && ($sanpham->getmasp() == $_GET['masp'])) {
              echo strtoupper($sanpham->gettensp());
            }
          }
          ?> | Thriftink</title>
</head>

<body>
  <button onclick="backTop()" id="backTopBtn" title="Go to top">
    <img src="./static/svg/icon-arrow-up.svg" width="24px" height="24px" alt="back top" />
  </button>
  <!-- Header -->
  <div class="container-lg"><?php include_once 'common/header.php'; ?></div>

  <!-- Product detail -->
  <div class="container-lg">
    <div class="product-detail">
      <div class="product-info">
        <div class="product-name">
          <h1 class="section-title"><?php
                                    foreach ($sanphams as $sanpham) {
                                      if (isset($_GET['masp']) && ($sanpham->getmasp() == $_GET['masp'])) {
                                        echo strtoupper($sanpham->gettensp());
                                      }
                                    }
                                    ?></h1>
        </div>
        <div class="row info-detail">
          <div class="col-12 col-md-6 wrap-img">
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php
                foreach ($sanphams as $sanpham) {
                  if ($sanpham->getmasp() == $_GET['masp']) {
                    $url = array($sanpham->getimg1());
                    echo "
                        <div class='carousel-item active product-carousel-item-container' data-scale='2.5' data-bs-interval='100000'>
                          <img src='./static/img/" . $sanpham->getimg1() . "' class='d-block w-100 product-carousel-item' alt='" . $sanpham->getalt1() . "'>
                        </div>
                        ";
                    if ($sanpham->getimg2() != null) {
                      array_push($url, $sanpham->getimg2());
                      echo "
                          <div class='carousel-item product-carousel-item-container' data-scale='2.5' data-bs-interval='100000'>
                            <img src='./static/img/" . $sanpham->getimg2() . "' class='d-block w-100 product-carousel-item' alt='" . $sanpham->getalt2() . "'>
                          </div>
                          ";
                    }
                    if ($sanpham->getimg3() != null) {
                      array_push($url, $sanpham->getimg3());
                      echo "
                          <div class='carousel-item product-carousel-item-container' data-scale='2.5' data-bs-interval='100000'>
                            <img src='./static/img/" . $sanpham->getimg3() . "' class='d-block w-100 product-carousel-item' alt='" . $sanpham->getalt3() . "'>
                          </div>
                          ";
                    }
                  }
                }
                ?>
              </div>
              <div class="carousel-indicators">
                <?php
                for ($t = 0; $t < count($url); $t++) {
                  if ($t == 0) {
                    echo "
                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                    ";
                  } else {
                    print "
                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='" . $t . "' aria-label='Slide " . $t . "'></button>
                    ";
                  }
                }
                ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-12 col-md-1"></div>
          <div class="col-12 col-md-5">
            <div class="product-type">
              <?php
              foreach ($sanphams as $sanpham) {
                if ($sanpham->getmasp() == $_GET['masp']) {
                  echo "
                <p class='my-5'>
                  <span class='product-price fw-700'>$" . $sanpham->getgiasp() . ".00</span>
                </p>
                    ";
                }
              }
              ?>
              <form method='POST' action='./xulygiohang.php'>
                <?php
                echo "
                <div class='row'>
                  <div class='col-12 col-md-6'>
                    <div class='character-pro'>
                      <p class='character-name'>QUANTITY</p>
                      <div class='select-quantity'>
                        <i class='fas fa-minus minus btn-detail'></i>
                        <input class='input-quantity' name='quantity' id='input' type='text' value='1' />
                        <i class='fas fa-plus plus btn-detail'></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='mt-5'>";
                foreach ($sanphams as $sanpham) {
                  if ($sanpham->getmasp() == $_GET['masp']) {
                    echo "<button class='primary-btn add-cart-btn' name='action' value='Add to cart'>
                    <i class='fas fa-shopping-cart'></i>
                    Add to cart
                  </button>
                  <input type='hidden' name='masp' value='" . $sanpham->getmasp() . "'>
                  <input type='hidden' name='tensp' value='" . $sanpham->gettensp() . "'>
                  <input type='hidden' name='giasp' value='" . $sanpham->getgiasp() . "'>
                  <input type='hidden' name='img1' value='" . $sanpham->getimg1() . "'>
                  <input type='hidden' name='alt1' value='" . $sanpham->getalt1() . "'>
                  </div>";
                  }
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-lg margin-60">
      <h1 class="section-title">DESCRIPTION</h1>
      <div class="mt-5">
        <?php
        foreach ($sanphams as $sanpham) {
          if ($sanpham->getmasp() == $_GET['masp']) {
            echo "
              " . strtoupper($sanpham->getmota()) . "
            ";
          }
        }
        ?>
      </div>
    </div>
  </div>

  <hr />

  <!-- Footer -->
  <?php
  include_once 'common/footer.php';
  ?>

  <!-- jQuery -->
  <script type="text/javascript" src="./static/js/jquery.min.js"></script>
  <script type="text/javascript" src="./static/js/pro-detail.js"></script>
  <!-- TABS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- End tabs -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
</body>

</html>