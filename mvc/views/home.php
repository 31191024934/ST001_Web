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
  <link rel="stylesheet" href="./static/css/home.css" />
  <title>The ultimate Blackpink goods thrift shop</title>
</head>

<body>
  <button onclick="backTop()" id="backTopBtn" title="Go to top">
    <img src="./static/svg/icon-arrow-up.svg" width="24px" height="24px" alt="back top" />
  </button>
  <!-- Header -->
  <div class="container-lg"><?php include_once 'common/header.php'; ?></div>

  <section class="container-fluid banner p-0">
    <button class="icon-btn" onclick="toggleMuteVideo()">
      <img id="soundIcon" src="./static/svg/icon-muted.svg" alt="icon muted" width="32px" height="32px" />
    </button>
    <div id="videoContainer">
      <video width="100%" height="85%" autoPlay muted loop style="object-fit: cover">
        <source src="./static/videos/banner-vid.mp4" type="video/mp4">
        </source>
        Your browser does not support the video tag.
      </video>
    </div>
    <div class="img-text">
      <h1 class="mb-3"><b>trusted<br /> thrift shop</b></h1>
      <p class="text-white fs-14 ps-2 banner-description">
        Thriftink is a thrift shop where you can buy all Blackpink goods, or trade your bias cards. We provide you a
        friendly website with all good condition products.
      </p>
      <button onclick="window.location.href='index.php?page=1'" class="secondary-btn banner-btn">View shop &nbsp;
        <span>
          <img class="banner-btn__arrow" src="./static/svg/right-arrow.svg" alt="right arrow" width="16px" height="16px" />
        </span>
      </button>
    </div>
    <img class="continue-arrow" src="./static/svg/down-arrow.svg" alt="down arrow" width="32px" height="32px" />
  </section>

  <section class="container-lg section-gap-b">
    <form method="get">
      <h1 class="section-title mb-0">featured products</h1>
      <div class="row">
        <?php
        $i = 0;
        foreach ($sanphams as $sanpham) {
          $i++;
          echo "
          <div class='col-12 col-md-4 col-lg-3 mt-5'>
          <a href='index.php?masp=" . $sanpham->getmasp() . "'>
            <div class='img-hover-zoom'>
              <img src='./static/img/" . $sanpham->getimg1() . "' alt='" . $sanpham->getalt1() . "' class='hover-img img-responsive' />
            </div>
          </a>
          <a href='index.php?masp=" . $sanpham->getmasp() . "'>
            <p class='product-title margin-bottom-10 margin-top-20 text-center'>" . strtoupper($sanpham->gettensp()) . "</p>
          </a>
          <p class='product-price text-center'>$" . $sanpham->getgiasp() . ".00</p>
          </div>
          ";
          if ($i > 7) break;
        }
        ?>
      </div>
    </form>
  </section>

  <section class="container-lg section-gap-b">
    <div class="col-12">
      <a href="search.php?search=Lisa">
        <img class="img-responsive" alt="LALISA-banner" src="./static/img/LALISA-banner.jpeg" />
      </a>
    </div>
  </section>

  <section class="container-lg section-gap-b">
    <h1 class="section-title text-right mb-3">Blackpink’s Lisa Makes Her Solo Debut With Lalisa</h1>
    <p class="text-right">Lisa is the latest member of Blackpink to make her solo debut with her newest single album,
      Lalisa, dropping the music video for the title track on Friday. In addition to its title track, Lalisa the album
      also includes the song “Money,” as well as instrumental versions of both songs. The high-concept visual for
      “Lalisa” pulls out all the stops, with Lisa on about thirty different sets, riding both a motorcycle and an ATV,
      as she, of course, flawlessly executes complicated choreography. One of the video’s final scenes also sees Lisa
      paying tribute to her Thai heritage with stunning costumes. The song, which was produced by frequent Blackpink
      collaborator Teddy, marks the latest of the Blackpink members’s solo ventures, including Jennie’s 2018 single
      “Solo” and Rosé’s R. Now we wait for Jisoo.</p>
  </section>

  <section class="container-lg section-gap-b">
    <h1 class="section-title mb-0">new drops</h1>
    <div class="row">
      <?php
      $i = 0;
      foreach ($sanphams as $sanpham) {
        $i++;
        echo "
            <div class='col-12 col-md-4 col-lg-3 mt-5'>
            <a href='index.php?masp=" . $sanpham->getmasp() . "'>
              <div class='img-hover-zoom'>
                <img src='./static/img/" . $sanpham->getimg1() . "' alt='" . $sanpham->getalt1() . "' class='hover-img img-responsive' />
              </div>
            </a>
            <a href='index.php?masp=" . $sanpham->getmasp() . "'>
              <p class='product-title margin-bottom-10 margin-top-20 text-center'>" . strtoupper($sanpham->gettensp()) . "</p>
            </a>
            <p class='product-price text-center'>$" . $sanpham->getgiasp() . ".00</p>
          </div>
          ";
        if ($i > 3) break;
      }
      ?>
    </div>
  </section>

  <hr style="border-bottom: 1px solid #000" />

  <!-- Footer -->
  <?php
  include_once 'common/footer.php';
  ?>



  <script type="text/javascript" src="./static/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
</body>

</html>