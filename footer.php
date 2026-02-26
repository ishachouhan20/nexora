 <!-- Nexora Pink Footer -->
    <footer class="nexora-footer mt-5 pt-5 pb-3">
        <div class="container">
            <div class="row align-items-center">

                <!-- About Section -->
                 <h4 class="md-4 fw-bold text-center text-danger">
                       ABOUT US
                 </h4>
                <div class="col-md-6 mb-4">
                    <h5 class="footer-heading">Nexora</h5>
                    <p>
                        Nexora is your trusted online shopping destination
                        offering top rated and highly discounted products
                        with premium quality and fast delivery service.
                        Our mission is to make online shopping simple, affordable,
                        and enjoyable for everyone with premium quality products
                        and fast delivery service.
                    </p>
                </div>

                <!-- Contact Section -->
                <div class="col-md-6 mb-4 text-md-end">
                    <h5 class="footer-heading">Contact Us</h5>
                    <p>Email: support@nexora.com</p>
                    <p>Phone: +91 9876543210</p>
                </div>

            </div>

            <hr>

            <div class="text-center">
                <p class="mb-0">
                    © <?php echo date("Y"); ?> Nexora. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

<!-- Cart Offcanvas -->
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