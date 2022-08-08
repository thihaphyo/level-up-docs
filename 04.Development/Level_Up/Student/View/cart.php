<?php
$time = time();
session_start();
$_SESSION['stid'] = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./resources/css/mystyles.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/root.css?<?php echo $time ?> ">
    <link rel="stylesheet" href="./resources/css/notification.css">
    <link rel="stylesheet" href="./resources/css/cart.css?<?php echo $time ?> ">


</head>

<body>
    <?php require_once('./header.php') ?>

    <!-- start of main -->
    <main>

        <!-- connect to the adminListController and it give the list of admins in database -->

        <!-- end of php code -->

        <!-- start of container -->
        <div class="cart-container has-background-white">
            <h1>My Cart</h1>
            <div class="my-cart-items">

            </div>
            <div class="go-to-checkout">
                <a class="button is-primary has-text-weight-semibold" href="">Go to Checkout</a>
            </div>
        </div>

        <div>
        </div>

        <!-- end of container -->
    </main>
    <!-- end of main -->

    <div id="modal-js-example" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <p>Are you sure?</p>
                <p>you want to remove this item in your cart?</p>
                <button class="button is-primary rn has-text-weight-semibold is-mobile cancel-item" id="deleteCartItem">Remove Now</button>
                <button class="button is-primary is-outlined rn rn has-text-weight-semibold cancel-item">Cancel</button>

                <!-- Your content -->
            </div>
        </div>

        <button class="modal-close is-large" aria-label="close"></button>
    </div>

    <?php require_once "./footer.php" ?>
</body>
<script src="./resources/js/cart.js?<?php echo $time; ?>"></script>

</html>