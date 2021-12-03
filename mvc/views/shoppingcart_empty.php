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
  <div class="container-lg"><?php include_once 'common/header.php'; ?></div>

  <!--Empty shopping cart-->
  <section class="container-lg" style="padding-bottom: 116px;">
    <h1 class="section-title my-5">SHOPPING CART</h1>
    <center>
      <img src="./static/svg/box.svg" width="100px" height="auto" alt="empty cart" />
    </center>
    <p class="text-center empty-text">It Appears That Your Cart Is Currently Empty!</p>
    <p class="text-center continue-text">Please Continue Shopping ...</p>
    <center>
      <button onclick="window.location.href='./index.php?page=1'" class="primary-btn">View shop &nbsp;
        <span>
          <img src="./static/svg/right-arrow.svg" alt="right arrow" width="16px" height="16px" />
        </span>
      </button>
    </center>
  </section>
  <hr />

  <!-- Footer -->
  <?php include_once 'common/footer.php'; ?>

  <script type="text/javascript" src="./static/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
</body>

</html>