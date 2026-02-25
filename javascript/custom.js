const categoryList = document.getElementById("categoryList");
const productList = document.getElementById("productList");
const carouselWapper=document.getElementById("carouselWapper");//carousel div
const pagination=document.getElementById("pagination");
const searchForm=document.querySelector("form[role='search']");
const searchInput = document.getElementById("searchInput");
let cart=JSON.parse(localStorage.getItem("cart")) ||[];
const productDetails= document.getElementById("productDetails");

let allProducts=[];
let filterProducts=[];
let currentPage=1;
let limit=10;
// to fix old cart items already saved in localstorage......your old cart items may not have discounted price.

const params= new URLSearchParams(window.location.search);
let productid= params.get("id");
console.log(productid);

fetch(`https://dummyjson.com/products/${productid}`)
.then(res => res.json())
.then(product => {
    getProduct(product);
});

function getProduct(product) {

    const discountedPrice = Math.round(
        product.price - (product.price * product.discountPercentage / 100)
    );
    
    productDetails.innerHTML = `
        <div class="row single-product-container">
            <div class="col-md-6 text-center">
                <img src="${product.thumbnail}" class="img-fluid single-product-img">
            </div>

            <div class="col-md-6 single-product-info">
                <h2 class="product-title">${product.title}</h2>
                <p class="product-brand">Brand: ${product.brand}</p>

                <!-- Price Section -->
                <h4 class="product-price">
                    <span class="text-success fw-bold">
                        ₹ ${discountedPrice}
                    </span>
                    <br>
                    <small class="text-muted text-decoration-line-through">
                        ₹ ${product.price}
                    </small>
                </h4>

                <p class="text-success">
                    ${product.discountPercentage}% OFF
                </p>

                <p class="product-rating">⭐ ${product.rating}</p>
                <p class="product-description">${product.description}</p>

                <button class="btn nexora-cart-btn"
                    data-id="${product.id}"
                    onclick="addToCart(${product.id})">
                    Add to Cart
                </button>

            </div>
        </div>
    `;
}

function fixCartDiscount(){

    cart.forEach(item => {

        if(!item.originalPrice){

            const product = allProducts.find(p => p.id === item.id);

            if(product){

                item.originalPrice = product.price;

                item.discount = product.discountPercentage;

                item.price = Math.round(
                    product.price - (product.price * product.discountPercentage / 100)
                );
            }
        }

    });

    localStorage.setItem("cart", JSON.stringify(cart));
}


//load all products on page load
fetch('https://dummyjson.com/products?limit=100')
.then(res => res.json())
.then(data => {

    allProducts = data.products;

    filterProducts = allProducts;

    fixCartDiscount();   // ✅ ADD THIS

    currentPage = 1;

    render();

    rendercart();        // ✅ ADD THIS
});

// Search Filter
searchForm.addEventListener("submit",function(e){
    e.preventDefault();//stop page reload

    const keyword =searchInput.value.toLowerCase().trim();

    filterProducts=allProducts.filter(p =>  
        p.title.toLowerCase().includes(keyword)) ||
        p.brand.toLowerCase().includes(keyword)  ||
        p.category.toLowerCase().includes(keyword
        );
            // console.log(filterProducts);
    currentPage=1;
    render();                                  
});

function render(){
    displayProduct();
    setupPagination();
}

// fetch handles promises
// .then 
//1.load
fetch('https://dummyjson.com/products/category-list')
.then(res => res.json())
.then(categories => {
    categoryList.innerHTML ="";
    categories.forEach(category =>{
        let newCategory = category.replace(/-/g, " ");
         categoryList.innerHTML += `<li>
            <a class='dropdown-item' onclick="loadProduct('${category}')">
                ${newCategory}</a></li>`;
    })
});
//2.load all products on first page load
// fetch('https://dummyjson.com/products')
// .then(res => res.json())
// .then(data => displayProduct(data.products));
//3.load products by category & hide carousel
function loadProduct(cat){
   //hide carousel when category is clicked
    if (carouselWapper){
    carouselWapper.style.display="none";
   }
   fetch(`https://dummyjson.com/products/category/${cat}`)
   .then(res => res.json())
   .then(data => {
    allProducts = data.products;
    filterProducts=allProducts;
    currentPage = 1;
    render();
 } );
}
//4.display products
function displayProduct(){

    if(!productList) return;

    productList.innerHTML = "";

    if(filterProducts.length === 0){

        productList.innerHTML = `
        <div class="col-12 text-center mt-5">
            <h4 class="text-muted">No Product Found</h4>
        </div>`;

        return;
    }

    let start = (currentPage - 1) * limit;
    let end = start + limit;

    const pageItem = filterProducts.slice(start, end);

    pageItem.forEach(product => {

        // calculate discounted price
        const discountedPrice = Math.round(
            product.price - (product.price * product.discountPercentage / 100)
        );

        productList.innerHTML += `
        <div class="col-md-3 mb-4">  

            <div class="card h-100 shadow-lg p-3 mb-5 bg-white rounded">

                <img src="${product.thumbnail}" 
                     class="card-img-top"
                     style="height:200px; object-fit:contain;">

                <div class="card-body d-flex flex-column">
                    <h6 class="card-title">${product.title}</h6>


                    <!-- Discounted Price -->
                    <p class="card-text mb-1">

                        <span class="fw-bold text-success">
                            ₹${discountedPrice}
                        </span>

                        <br>

                        <!-- Original Price -->
                        <small class="text-muted text-decoration-line-through">
                            ₹${product.price}
                        </small>

                    </p>

                    <!-- Discount Percentage -->
                    <p class="text-success mb-2">
                        ${product.discountPercentage}% OFF
                    </p>

                    <!-- Stock -->
                    <p class="text-muted small">
                        Stock: ${product.stock}
                    </p>

                    <a href="product.php?id=${product.id}" 
                       class="btn nexora-view-btn btn-sm mt-auto">
                       View Details
                    </a>
                </div>

            </div>

        </div>`;
    });
}



//Math.ceil to take only int value(no decimal part)
function setupPagination(){
    if(!pagination) return;
    pagination.innerHTML= "";
    const pageCount = Math.ceil(filterProducts.length/limit);
    for (let i=1; i<= pageCount;i++){
        pagination.innerHTML+=`<li class="page-item ${i === currentPage ? 'active' : ''}">
        <a class='page-link' href='javascript:void(0)'
        onclick=changePage(${i})>${i}</a></li>`;
    }
}

function changePage(page){
    currentPage = page;
    displayProduct(allProducts);
    setupPagination(allProducts);
}

// let cart = JSON.parse(localStorage.getItem("cart")) || [];


// ADD TO CART
function addToCart(productId){

    const product = allProducts.find(p => p.id === productId);

    if(!product) return;

    const existingItem = cart.find(item => item.id === productId);

    // calculate discounted price
    const discountedPrice = Math.round(
        product.price - (product.price * product.discountPercentage / 100)
    );

    if(existingItem){

        existingItem.qty++;

    }else{

        cart.push({

            id: product.id,

            title: product.title,

            price: discountedPrice,   // ✅ store discounted price

            originalPrice: product.price,

            discount: product.discountPercentage,

            qty: 1
        });
    }

    saveCart();

    updateCartButton(productId);
}


 function updateCartButton(productId){
          
    const buttons =document.querySelectorAll(`[data-id='${productId}']`);
    buttons.forEach(btn =>{
        btn.innerText="Added ✓";
        btn.classList.remove("nexora-cart-btn");
        btn.classList.add("added-btn");
        btn.disabled=true;
    });
}
// SAVE CART
function saveCart(){

    localStorage.setItem("cart", JSON.stringify(cart));

    rendercart();
}


// RENDER CART
function rendercart(){

    const CartBody = document.getElementById("CartBody");
    const cartTotal = document.getElementById("cartTotal");
    const cartCount = document.getElementById("cartCount");

    if(cartCount){
        cartCount.innerText = cart.reduce((sum, item) => sum + item.qty, 0);
    }
    if(!CartBody) return;

    CartBody.innerHTML = "";

    let total = 0;

    cart.forEach(item => {

        const itemTotal = item.price * item.qty;

        total += itemTotal;

        CartBody.innerHTML += `
        <tr>

            <td>${item.title}</td>

            <td>

                <button class="btn btn-sm btn-secondary"
                onclick="decreaseQty(${item.id})">-</button>

                ${item.qty}

                <button class="btn btn-sm btn-secondary"
                onclick="increaseQty(${item.id})">+</button>

            </td>

            <td>
                ₹${item.price}
                <br>
                <small class="text-muted text-decoration-line-through">
                ₹${item.originalPrice}
                </small>

                </td>

            <td>₹${itemTotal}</td>

            <td>

                <button class="btn btn-sm btn-danger"
                onclick="removeFromCart(${item.id})">

                Remove

                </button>

            </td>

        </tr>
        `;
    });

    cartTotal.innerHTML = total;
}


// INCREASE QTY
function increaseQty(id){

    const item = cart.find(item => item.id === id);

    if(item){

        item.qty++;

        saveCart();

    }

}


// DECREASE QTY
function decreaseQty(id){

    const item = cart.find(item => item.id === id);

    if(item){

        item.qty--;

        if(item.qty <= 0){

            cart = cart.filter(item => item.id !== id);

        }

        saveCart();
    }
}


// REMOVE ITEM
function removeFromCart(id){

    cart = cart.filter(item => item.id !== id);

    saveCart();

}


// LOAD CART ON PAGE LOAD
rendercart();

function goToCheckout(){
if(cart.length ===0){
    alert("Your cart is empty!");
    return;
}
window.location.href ="checkout.php";
}

// ============CHECKOUT PAGE SCRIPT==============
document.addEventListener("DOMContentLoaded", function () {

    const checkoutDiv = document.getElementById("checkoutCart");
    const hiddenTotal = document.getElementById("hiddenTotal");

    if (!checkoutDiv || !hiddenTotal) return;

    function loadCheckout() {

        // Always fetch latest cart
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        if (cart.length === 0) {
            checkoutDiv.innerHTML = `
                <div class="text-danger text-center mt-4">
                    <h5>Your cart is empty</h5>
                </div>
            `;
            hiddenTotal.value = 0;
            return;
        }

        let total = 0;

        let output = `
            <div class="card p-4 shadow-sm rounded-4">
                
                <!-- Column Headings -->
                <div class="d-flex justify-content-between fw-bold border-bottom pb-2 mb-3">
                    <div style="flex:2;">Product</div>
                    <div style="flex:1;" class="text-center">Price</div>
                    <div style="flex:1;" class="text-center">Qty</div>
                    <div style="flex:1;" class="text-end">Subtotal</div>
                </div>
        `;

        cart.forEach(function(item) {

            const itemTotal = item.price * item.qty;
            total += itemTotal;

            output += `
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    
                    <div style="flex:2;">
                        ${item.title}
                    </div>

                    <div style="flex:1;" class="text-center">
                        ₹${item.price}
                    </div>

                    <div style="flex:1;" class="text-center">
                        ${item.qty}
                    </div>

                    <div style="flex:1;" class="text-end text-success fw-bold">
                        ₹${itemTotal}
                    </div>

                </div>
            `;
        });

        output += `
                <!-- Total Section -->
                <div class="d-flex justify-content-between mt-4 fw-bold fs-5">
                    <div>Total</div>
                    <div>₹${total}</div>
                </div>

            </div>
        `;

        checkoutDiv.innerHTML = output;
        hiddenTotal.value = total;
    }

    loadCheckout();
});