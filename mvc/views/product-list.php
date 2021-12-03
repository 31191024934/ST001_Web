<html lang="en">

<?php
if (!isset($_GET['page']) || $_GET['page'] == "") {
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./static/css/index.css" />
  <link rel="stylesheet" href="./static/css/pro-list.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet" />
  <title>Product List | Thriftink</title>
</head>

<body>
  <button onclick="backTop()" id="backTopBtn" title="Go to top">
    <img src="./static/svg/icon-arrow-up.svg" width="24px" height="24px" alt="back top" />
  </button>
  <!-- Header -->
  <div class="container-lg"><?php include_once 'common/header.php'; ?></div>

  <!-- Product list -->
  <section class="container-lg section-gap-t section-gap-b">
    <h1 class="section-title mb-0">Product list</h1>
    <div class="row">
      <?php
      $link = null;
      taoKetNoi($link);
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $page = is_numeric($page) ? $page : 1;
      $from = ($page - 1) * SO_SP_TREN_TRANG;

      $result = chayTruyVanTraVeDL($link, "select count(*) from sanpham");
      $row = mysqli_fetch_row($result);
      $total = ceil($row[0] / SO_SP_TREN_TRANG);

      $result = chayTruyVanTraVeDL($link, "select * from sanpham limit " . $from . ", " . SO_SP_TREN_TRANG);
      while ($rows = mysqli_fetch_assoc($result)) {
        echo "
          <div class='col-12 col-md-4 col-lg-3 mt-5'>
          <a href='index.php?masp=" . $rows['masp'] . "'>
          <div class='img-hover-zoom'>
            <img src='./static/img/" . $rows['img1'] . "' alt='" . $rows['alt1'] . "' class='hover-img img-responsive' />
          </div>
          </a>
          <a href='index.php?masp=" . $rows['masp'] . "'>
          <p class='product-title margin-bottom-10 margin-top-20 text-center'>" . strtoupper($rows['tensp']) . "</p>
          </a>
          <p class='product-price text-center'>$" . $rows['giasp'] . ".00</p>
          </div>
          ";
      }
      echo "<br style='clear:both;'/>
      <div class='pager'>
      <center class='mt-5'>
        <ul class='pagination justify-content-end'>
        <li class='page-item'>";
      $t = 1;
      // nút previous trở về trang sản phẩm trước đó
      while ($t <= $total) {
        if ($t == $_GET['page']) {
          if ($t == 1) {
            echo "
            <button class='page-link' lato-label='Previous'>
            <span lato-hidden='true'>&lt;</span>
            </button>
            ";
          } else {
            echo "
            <a class='page-link' href='./index.php?page=" . ($t - 1) . "' lato-label='Previous'>
            <span lato-hidden='true'>&lt;</span>
            </a>
            ";
          }
          echo "</li>";
          break;
        }
        $t++;
      }
      // liệt kê các trang hiện có
      for ($i = 1; $i <= $total; $i++) {
        if ($i == $_GET['page']) {
          echo "<li class='page-item active'><button class='page-link'>$i</button></li>";
        } else {
          echo "    
          <li class='page-item active'><a class='page-link' href='./index.php?page=" . $i . "'>$i</a></li>
          ";
        }
      }
      // nút next qua trang liệt kê sản phẩm tiếp theo
      echo "<li class='page-item'>";
      while ($t <= $total) {
        if ($t == $_GET['page']) {
          if ($t == $total) {
            echo "
            <button class='page-link' lato-label='Next'>
            <span lato-hidden='true'>&gt;</span>
            </button>
            ";
          } else {
            echo "
            <a class='page-link' href='./index.php?page=" . ($t + 1) . "' lato-label='Next'>
            <span lato-hidden='true'>&gt;</span>
            </a>
            ";
          }
          break;
        }
        $t++;
      }
      echo "</li>";
      echo " 
        </li>
        </ul>
      </center>
      </div>";
      ?>
    </div>
  </section>

  <hr />

  <!-- Footer -->
  <?php include_once 'common/footer.php'; ?>

  <script type="text/javascript" src="./static/js/index.js"></script>
  <script type="text/javascript" src="./static/js/pro-detail.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
</body>

</html>