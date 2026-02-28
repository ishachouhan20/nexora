<?php include('header.php'); ?>

<!-- WRAPPER (important for positioning) -->
<div class="filter-wrapper">

    <!-- FILTER ICON -->
    <div class="nexora-filter-icon">
        <i class="fa-solid fa-sliders"></i>
    </div>

    <!-- FILTER PANEL -->
    <div class="filter-panel" id="filterPanel">

        <div class="filter-header">
            <h4>Filters</h4>
        </div>

        <!-- Price -->
        <label>Price Range</label>
        <select id="priceFilter">
            <option value="all">All</option>
            <option value="0-500">₹0 - ₹500</option>
            <option value="500-1000">₹500 - ₹1000</option>
            <option value="1000-2000">₹1000 - ₹2000</option>
            <option value="2000-5000">₹2000 - ₹5000</option>
        </select>

        <!-- Rating -->
        <label>Minimum Rating</label>
        <select id="ratingFilter">
            <option value="all">All</option>
            <option value="4">4★ & above</option>
            <option value="3">3★ & above</option>
            <option value="2">2★ & above</option>
        </select>

        <!-- Brand -->
        <label>Brand</label>
        <select id="brandFilter">
            <option value="all">All</option>
        </select>

    </div>
</div>


<!-- PRODUCT CONTAINER -->
<div class="container mt-4">
    <div class="row" id="productList"></div>
</div>

<!-- PAGINATION -->
<nav class="mt-4">
    <ul class="pagination justify-content-center" id="pagination"></ul>
</nav>

<?php include('footer.php'); ?>