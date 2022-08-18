<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="./resources/css/notification.css?v=<? time(); ?>">
    <link rel="stylesheet" href="./resources/css/paymentMethod.css?v=<? echo time(); ?>">
</head>

<body>
    <?php require_once('./header.php') ?>
    <?php require_once('../Controller/paymentController.php') ?>
    <main>
        <!-- start of container  -->
        <div class="container">
            <div class="paymentBox">
                <h2 class="title is-3">Choose Payment Method</h2>
                <div>
                    <!-- start payment card -->
                    <div class="paymentCards">
                        <label for="paypal">
                            <img id="paypalImg" src="../View/resources/img/header_footer/paypal.svg" alt="payment card" onclick="cardPaypal()">
                        </label>
                        <input type="radio" name="payment" id="paypal">
                        <label for="mastercard">
                            <img id="mastercardImg" src="../View/resources/img/header_footer/mastercard.svg" alt="payment card" onclick="cardMastercard()">
                        </label>
                        <input type="radio" name="payment" id="mastercard">
                        <label for="visa">
                            <img id="visaImg" src="../View/resources/img/header_footer/visa.svg" alt="payment card" onclick="cardVisa()">
                        </label>
                        <input type="radio" name="payment" id="visa">
                    </div>
                    <!-- end payment card -->
                    <div class="formInput">
                        <!-- start first line of form -->
                        <div class="firstForm">
                            <div id="cardHolder">
                                <label for="name">Card Holder</label>
                                <br />
                                <input type="text" id="name">
                            </div>
                            <div id="cardNumber">
                                <label for="number">Card Number</label>
                                <br />
                                <input type="number" id="number">
                            </div>
                        </div>
                        <!-- end first line of form -->
                        <!-- start sec line of form -->
                        <div class="secForm">
                            <div id="expiryDate">
                                <label>Expiry</label>
                                <br />
                                <select>
                                    <option value="Year" selected>Year</option>
                                    <?php
                                    for ($i = 20; $i < 50; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                                <select>
                                    <option value="Month" selected>Month</option>
                                    <?php
                                    for ($i = 1; $i < 13; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="cvc">
                                <label for="cvcNum">CVC</label>
                                <br />
                                <input type="number" id="cvcNum" placeholder="123" maxlength="3">
                                <img src="../View/resources/img/header_footer/important-icon-png-29.jpg" alt="">
                            </div>
                        </div>
                        <!-- end sec line of form -->
                    </div>
                    <div class="paymentCost">
                        <div class="cost">
                            <h2 class="title is-5">Total ( <span class="items"><?php echo count($finalResult['course']); ?> items</span>)</h2>


                            <?php

                            foreach ($finalResult['course'] as $key => $value) { ?>
                                <p class="courseName pl-4 pb-4">
                                    <?php echo $value['course_title']; ?>
                                </p>
                            <?php } ?>

                            <p class="promotion has-text-weight-medium ">Promotion</p>
                            <hr />
                            <h2 class="title is-5">Total Payment</h2>
                        </div>
                        <div class="price">
                            <h2 class="title is-5"><?php echo number_format($finalResult['total_price'])  ?> Ks</h2>
                            <?php
                            foreach ($finalResult['course'] as $key => $value) {
                                $promotion = 0;
                                $promotion += $value['price'] * ($value['promo_percent'] / 100);
                            ?>
                                <p class="coursePrice pb-4"><?php echo number_format($value['price']) ?> Ks</p>
                            <?php  } ?>
                            <p class="promoPrice has-text-weight-medium "><?php echo number_format($promotion)  ?> Ks</p>
                            <hr />
                            <p class="title is-5"><span id="totalAmount"><?php echo number_format($finalResult['total_price'] - $promotion)  ?></span>Ks</p>
                        </div>
                    </div>
                    <div class="submitDiv">
                        <button class="submitBtn button is-primary is-outlined has-text-weight-semibold" id="btnSubmit" onclick="paymentMethod()">Comfirm Payment</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of container -->
    </main>
    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="../View/resources/lib/jquery3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../View/resources/js/index.js"></script>
    <script src="../View/resources/js/paymentMethod.js?<?php echo time() ?>"></script>
</body>

</html>