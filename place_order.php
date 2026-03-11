<?php
include('header.php');

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$total=$_POST['total_amount'];
?>

<div class="container mt-5">
    <div class="card shadow p-5 text-center">
        <h2 class="text-success">Order Placed Successfully 🎉</h2>
        <p>Thank you <b><?php echo $name; ?></b> for your order.</p>
        <P>Total Amount:<b>₹<?php echo $total; ?></b></P>
        <p>We will contact you at<b><?php echo $mobile; ?></b></p>
        
        <a href="index.php"class="btn btn-primary mt-3">
            Continue Shopping
        </a>
    </div>
</div>
<script>
    localStorage.removeItem("cart");
</script>
<?php include('footer.php'); ?>