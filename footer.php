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
    <script src="./javascript/bootstrap.bundle.min.js"></script>
 <script src="./javascript/custom.js"></script> 