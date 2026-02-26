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
          <a class="nav-link" aria-current="page" href="shop.php">Shop</a>
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

            <!-- cart button -->

        <div class="cart-btn-wrapper me-3">
    <button class="nexora-cart-btn" 
        data-bs-toggle="offcanvas" 
        data-bs-target="#offcanvasExample">
        
        🛒 Cart
        <span id="cartCount" class="cart-badge">0</span>
    </button>
</div>
      <form id="searchForm" class="d-flex me-2">
        <input class="form-control me-2"
         id="searchInput"
          type="search"
           placeholder="Search product" 
           aria-label="Search">

        <button class="btn nexora-search-btn"
         type="submit">Search</button> 
      </form>
       <a class="btn nexora-search-btn ms-2" href="login.php"> Login </a>
 </div>
  </div>
</nav>

<!-- =====================CART OFFCANVAS====================== -->
 <div class="offcanvas offcanvas-start"
     tabindex="-1"
     id="offcanvasExample">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">
          My Cart
        </h5>
        <button type="button"
        class="btn-close"
        data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody id="CartBody"></tbody>
        </table>
        <h5 class="text-end me-3">
            Total: <span id="cartTotal">0</span>
        </h5>

        <!-- checkout button -->
         <div class="text-end me-3 mt-3">
            <button class="btn btn-success w-100" 
            onclick="goToCheckout()">
            Proceed to Checkout
        </button></div>
    </div>
    </div>