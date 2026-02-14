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
          <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src= "img/nexora_logo-removebg-preview.png" width="70"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a> 
        </li>
         <li class="nav-item">
          <a class="nav-link" aria-current="page" href="shop.html">Shop</a>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" 
          data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
            <ul class="dropdown-menu" id="categoryList" data-bs-auto-close="outside">
            <li> Loading.....</li>
          </ul>
          </li>
      </ul>
      <form class="d-flex me-2" role="search">
        <input class="form-control me-2" id="searchInput" type="text" placeholder="Search product" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button> 
      </form>
       <a class="btn btn-outline-success ms-2" href="login.php"> Login </a>
 </div>
  </div>
</nav>
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

<div class="container mt-4">
  <div class="row" id="productList"></div>
</div>
       <script src="./javascript/bootstrap.bundle.min.js"></script>
 <script src="./javascript/custom.js"></script>
</body>
</html>