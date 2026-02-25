<?php include('header.php'); ?>

<div class="container mt-5 mb-5">

    <h2 class="mb-4">Checkout</h2>

    <div class="row">

        <!-- ================= BILLING FORM ================= -->
        <div class="col-md-6">

            <div class="card shadow p-4">
                <h5 class="mb-3">Billing Details</h5>

                <form method="POST" action="place_order.php" onsubmit="return validateCheckout()">

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3" required></textarea>
                    </div>

                    <!-- Hidden total field -->
                    <input type="hidden" name="total_amount" id="hiddenTotal">

                    <button type="submit" class="btn btn-success w-100">
                        Place Order
                    </button>

                </form>
            </div>

        </div>

        <!-- ================= ORDER SUMMARY ================= -->
        <div class="col-md-6">

            <div class="card shadow p-4">
                <h5 class="mb-3">Order Summary</h5>

                <div id="checkoutCart"></div>

            </div>

        </div>

    </div>

</div>
<?php include('footer.php'); ?>