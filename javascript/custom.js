const categoryList = document.getElementById("categoryList");
const productList = document.getElementById("productList");
const carouselWapper=document.getElementById("carouselWapper");//carousel div
const pagination=document.getElementById("pagination");
const searchInput = document.getElementById("searchInput");
let cart=JSON.parse(localStorage.getItem("cart")) ||[];

let allProducts=[];
let filterProducts=[];
let currentPage=1;
let limit=10;

//load all products on page load
fetch('https://dummyjson.com/products?limit=100')
.then(res => res.json())
.then(data => {
    allProducts = data.products;

    filterProducts=allProducts;
    currentPage = 1;
    render();
});

// Search Filter
searchInput.addEventListener("input",function(){
    const keyword =this.value.toLowerCase();

    filterProducts=allProducts.filter(p => p.title
                                      .toLowerCase()
                                      .includes(keyword));
    console.log(filterProducts);
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
    // filterProducts=allProducts;
    currentPage = 1;
    render();
 } );
}
//4.display products
function displayProduct(){
    productList.innerHTML ="";
    if(filterProducts.length===0){
        productList.innerHTML=`<div class="col-12 text-center mt-5">
        <h4 class="text-muted">No Product Found</h4>
        </div>`;
    }
    let start =(currentPage -1)*limit;
    let end =start + limit;
    const pageItem = filterProducts.slice(start,end);

    pageItem.forEach(product =>{
        // md=medium
        productList.innerHTML += `<div class="col-md-3 mb-4">  
            <div class="card h-100 shadow-lg p-3 mb-5 bg-white rounded">
                <img src ="${product.thumbnail}" class="card-img-top"></img>
            <div class="card-body">
                 <h6 class="card-title">${cleanTitle(product.title)}</h6>
                 <p class="card-text">${product.price}</p>
                 <p class="card-stock"> In Stock : ${product.stock}</p>
                 <p class="card-discount"> Discounted price: ${product.discountPercentage}</p>
                 <button class='btn btn-sm btn-primary' onclick='addToCart(${JSON.stringify(product)})'> Add to Cart</button>
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

function addToCart(product){
    const item=cart.find(c => c.id === product.id);
    if(item){
        item.qty++;
    } else{
        cart.push({
            id : product.id,
            title : cleanTitle (product.title),
            price : product.price,
            discounted : product.discountPercentage,
            qty : 1

        })
    }
    saveCart();
}

function saveCart(){
    localStorage.setItem("cart",JSON.stringify(cart));
    rendercart();
}

function rendercart(){
    const CartBody = document.getElementById("CartBody");
    const cartTotal = document.getElementById("cartTotal");
    CartBody.innerHTML ="";
    let total=0;
}

function cleanTitle(title){
    return title
        .replace(/[^a-zA-Z0-9 ]/g, '')
        .replace(/\s+/g, '_');
}
