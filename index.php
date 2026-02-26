<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexora</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

                       <!-- slider -->

<div id="carouselWapper">
                       <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-50" src="img/clothes.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="img/ring.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="img/img3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button"data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<!-- PRODUCT SECTION -->
<div class="container mt-5">

  <h3 class="mb-4 fw-bold text-center">⭐ Top 5 Rating Products</h3>
  <div class="row" id="topRatedList"></div>

  <hr class="my-5">

  <h3 class="md-4 fw-bold text-center text-success">
    🔥 Discounted Products (More than 10% OFF)
  </h3>
  <div class="row" id="discountList"></div>
</div>
<div class="container mt-5">
  <div id="productDetails">
</div>
</div>
<div class="row" id="productList"></div>
<div id="pagination"></div>
<!-- <script src="./javascript/bootstrap.bundle.min.js"></script>
 <script src="./javascript/custom.js"></script> -->
</body>
</html>
<?php include('footer.php'); ?>