<html lang="en">

<?php
require_once './mvc/modules/db_module.php';
$link = null;
taoKetNoi($link);
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
  <link rel="stylesheet" href="./static/css/search.css" />
  <?php include_once "./mvc/modules/search-ajax.php"; ?>
  <title>Search | Thriftink</title>

</head>

<body>
  <button onclick="backTop()" id="backTopBtn" title="Go to top">
    <img src="./static/svg/icon-arrow-up.svg" width="24px" height="24px" alt="back top" />
  </button>
  <!-- Header -->
  <div class="container-lg"><?php include_once 'common/header.php'; ?></div>

  <!-- Content -->
  <form method="GET" action="search.php">
    <div class="container-lg search-wrapper d-flex flex-column justify-content-center align-items-start">
      <h1 class="search-title" for='search'>SEARCH</h1>
      <div class="d-flex flex-column align-items-start">
        <div class="mb-5 search-option-wrapper">
          <div class="input-group input-group-lg mb-4 search-box">
            <input type="text" class="form-control" autocomplete="off" id="search" name="search" placeholder="Whatever you want! Search here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button onclick="window.location.href='search.php'" class="input-group-text primary-bg text-white" id="basic-addon2"><i class="fas fa-search"></i></button>
            <div class="result"></div>
          </div>
          <div class="row" style="z-index: 2;">
            <div style="width:350px;" class="col-12 col-lg-6">
              <div class="option-seperator pb-5">
                <p class="mb-3 fw-700 text-left fw-medium">TRENDING SEARCHES</p>
                <?php
                $allSP = chayTruyVanTraVeDL($link, "select * from sanpham");
                $soluongSP = count($sanphams);
                $t = 0;
                while ($t < 3) {
                  $random = mt_rand(1, $soluongSP);
                  $result = chayTruyVanTraVeDL($link, "select * from sanpham where id_sp='" . $random . "'");
                  $row = mysqli_fetch_row($result);
                  echo "<a href='search.php?search=" . $row[3] . "' class='mb-2 no-style-btn'><i class='fas fa-search'></i> &nbsp; " . strtoupper($row[3]) . "</a> <br/>";
                  $t++;
                  $random = mt_rand(1, $soluongSP);
                }
                ?>
              </div>
            </div>
            <div style="width:350px;" class="col-12 col-lg-6">
              <div>
                <p class="mb-3 fw-700 text-left fw-medium"><i class="fas fa-filter"></i> &nbsp; FILTERS</p>
                <select class="form-select mb-2" aria-label="Product" name='manhom'>
                  <option selected>Product</option>
                  <?php
                  foreach ($nhomsps as $nhomsp) {
                    echo "<option value=" . $nhomsp->getmanhom() . ">" . $nhomsp->gettennhom() . "</option>";
                  }
                  ?>
                </select>
                <select class="form-select mb-2" aria-label="Price" name="price">
                  <option selected>Price</option>
                  <option value="below20">
                    < 20$</option>
                  <option value="20to50">20$ - 50$
                  </option>
                  <option value="above50">> 50$</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <hr />

  <!-- Footer -->
  <?php include_once 'common/footer.php'; ?>

  <script type="text/javascript" src="./static/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>