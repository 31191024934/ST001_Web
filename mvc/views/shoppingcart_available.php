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
  <link rel="stylesheet" href="./static/css/shopping_cart.css" />
  <title>Shopping Cart</title>
</head>

<body>
  <button onclick="backTop()" id="backTopBtn" title="Go to top">
    <img src="./static/svg/icon-arrow-up.svg" width="24px" height="24px" alt="back top" />
  </button>
  <!-- Header -->
  <div class="container-lg"><?php require_once 'common/header.php'; ?></div>
  <?php
  include_once './mvc/modules/cart_module.php';
  $giohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : array();
  ?>
  <!--Available shopping cart-->
  <section class="container-lg">
    <h1 class="section-title my-5">shopping cart</h1>
    <div class="purchase row pace-top pace-bot justify-content-between">
      <div class="col-12 col-lg-8 mb-5 mb-lg-0">
        <h2>PRODUCT LIST</h2>
        <?php
        $i = 0;
        foreach ($giohang as $v) {
          echo "
          <form method=POST action='./xulygiohang.php'> 
            <div class='row mt-4'>
            <div class='col-12 col-lg-4'>
              <div class='img-wrapper'>
                <img width='100%' height='auto' src='./static/img/" . $v['img1'] . "' alt='" . $v['alt1'] . "' />
              </div>
            </div>
            <div class='col-12 col-lg-8'>
              <h4 class='me-3 mb-2'>" . $v['tensp'] . "</h4>
              <p class='fs-24 fw-medium'>$" . $v['giasp'] . ".00</p>
              <br />
              <h5 class='mb-4'>QUANTITY</h5>
              <div class='d-flex align-items-center'>
              ";
          if ($v['quantity'] == 1) {
            echo "
                <a style='cursor:pointer;' class='no-style-btn quantity-options me-3' title='minus'>-</a>
                ";
          } else {
            echo "
                <button class='no-style-btn quantity-options me-3' title='minus' name='action' value='update-minus'>-</button>
                ";
          }
          echo "
              <span id='productQuantity1'>" . $v['quantity'] . "</span>
              <button class='no-style-btn quantity-options mx-3' title='plus' name='action' value='update-plus'>+</button>
              <input type='hidden' name='quantity' value='" . $v['quantity'] . "' />
              <button title='delete' class='no-style-btn' name='action' value='delete-product'>
                <img width='16px' height='16px' alt='delete' src='./static/svg/delete.svg' />
              </button>
              <input type='hidden' name='masp' value='" . $v['masp'] . "' />
            </div>
            </div>
          </div>
          </form>
          ";
          while ($i < count($giohang) - 1) {
            $i++;
            echo "<hr />";
            break;
          }
        }
        ?>
      </div>

      <div class="col-12 col-lg-4">
        <h2 class="mb-3">TOTAL</h2>
        <?php
        foreach ($giohang as $v) {
          echo "
            <div class='d-flex align-items-center justify-content-between'>
            <p class='me-3 mb-2'>" . $v['tensp'] . "</p>
            <p class='fw-medium'>$" . $v['giasp'] . ".00 x " . $v['quantity'] . "</p>
            </div>
            ";
        }
        echo "
        <hr />
        <p class='fs-24 fw-medium text-right'>$" . tinhtien() . ".00</p>
        ";
        $tongtien = tinhtien();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay = date('Y-m-d H:i:s');
        if (isset($_SESSION['username'])) {
          foreach ($nguoidungs as $nguoidung) {
            if ($nguoidung->getusername() == $_SESSION['username']) {
              echo "
              <form method=POST action='./xulygiohang.php'>

              <a class='primary-btn w-100 mt-4' data-toggle='modal' data-target='#myModal' style='cursor: pointer;display: inline-block; text-align:center;'>CHECKOUT</a>
              <div class='modal  mt-5' id='myModal'>
        <div class='modal-dialog'>

            <div class='modal-content'>

                <!-- Modal Header -->
                <div class='modal-header'>
                   
                    <h3 style='  color:#d16882;   font-size: 30px;
                    font-family: 'Montserrat Medium';
                    font-weight: bold;
                    text-transform: uppercase;
                    border-bottom: 2px solid #000;'  class='welcome mt-3'><b>Purchase confirmation!!!</b></h3>
                 
                </div>
                <div class='modal-content'style='background :#e6dee7;'>
                    <div class='content' style ='margin-left : 20px;'>
                    <p class=''><b>TOTAL Price : </b>$" . $tongtien . ".00</p>
                    <p class=''>If satisfied, please press the 'Confirm' button. Thank you!!!</p>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn primary-btn ' name='action' value='check-out' style='border-radius: 99px;'>Confirm </button>
                    <button data-dismiss='modal' class='btn btn-danger'style='border-radius: 99px;'>Close</button>
                </div>
            </div>
        </div>
    </div>
              <input type='hidden' name='iduser' value='" . $nguoidung->getid_user() . "'>
              <input type='hidden' name='username' value='" . $_SESSION['username'] . "'>
              <input type='hidden' name='tongtien' value='" . $tongtien . "'>
              <input type='hidden' name='ngay' value='" . $ngay . "'>
              </form>
              ";
            }
          }
        } else {
          echo "
          <a class='primary-btn w-100 mt-3' style='display: inline-block; text-align:center;' href='./login.php'>CHECKOUT</a>
          ";
        }
        ?>

      </div>
    </div>
  </section>

  <hr />

  <!-- Footer -->
  <?php include_once 'common/footer.php'; ?>

  <script type="text/javascript" src="./static/js/index.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
</body>

</html>