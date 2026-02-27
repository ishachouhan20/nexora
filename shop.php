<?php include('header.php'); ?>
<div class="nexora-filter-icon" onclick="toggleFilter()">
  <i class="fa-solid fa-sliders"></i>
</div>

<div class="filter-panel" id="filterPanel">

<h4>Filter By</h4>

<label>price</label>
<select id="priceFilter">
  <option value="all">All</option>
  <option value="500-1000">₹500 - ₹1000</option>
  <option value="1000-2000">₹1000 - ₹2000</option>
  <option value="2000-5000">₹2000 - ₹5000</option>
</select>

<label>Rating</label>
<select id="ratingFilter">
  <option value="all">All</option>
  <option value="4">4★ & above</option>
  <option value="3">3★ & above</option>
  <option value="2">2★ & above</option>
</select>
</div>

<div class="container mt-4">
  <div class="row" id="productList"></div>
</div>

<nav class="mt-4">
    <ul class="pagination justify-content-center" id="pagination"></ul>
</nav>
<?php include('footer.php'); ?>
