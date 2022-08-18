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
    <link rel="stylesheet" href="./resources/css/notification.css">
    <link rel="stylesheet" href="./resources/css/checkout.css?v=<? echo time(); ?>">
</head>

<body>
    <?php require_once "./header.php" ?>
    <?php require_once('../Controller/checkoutController.php') ?>
    <main>
        <!-- start of container  -->
        <div class="container checkBox">

            <div class="checkOutBox">
                <h1>Courses Checkout</h1>

                <div class="cartAndPrice">
                    <!-- start carts -->
                    <div class="checkCarts" id="check">
                        <?php
                        $total = 0; //course total initial
                        $promotion = 0; //course promotion initial
                        foreach ($result as $key => $value) {
                            $total += $value['price'];
                            $promotion += $value['price'] * ($value['promo_percent'] / 100); //promotion 
                        ?>
                            <div class="cart">
                                <a href="#"><img class="videoCart" src="../View/resources/img/header_footer/discover image.png" alt=""></a>
                                <div class="text">
                                    <h2><?php echo $value['course_title']; ?></h2>
                                    <p><a href="#">By <?php echo $value['full_name'] ?></a></p>
                                    <div>
                                        <img src="../View/resources/img/header_footer/Rating.svg" alt=""> 4.6/5 (5)
                                        <p class="hrAndLectures"> <?php echo $value['duration'] ?> hr of Videos </p>
                                    </div>
                                    <div class="has-text-weight-medium price-show-on-mobile"><?php echo number_format($value['price']); ?> Ks</div>

                                </div>
                                <div>

                                </div>
                                <div class="price"><?php echo number_format($value['price']); ?> Ks</div>
                            </div>
                        <?php } ?>

                    </div>
                    <!-- end carts -->
                    <!--start checkout cost -->
                    <div class="paymentCost" id="cost">

                        <div>
                            <div class="cost">
                                <h2 class="title is-6">Total</h2>
                                <p class="promotion has-text-weight-medium ">Promotion</p>
                            </div>
                            <div class="price">
                                <h2 class="title is-6"><?php echo number_format($total); ?> Ks</h2>
                                <p class="promoPrice has-text-weight-medium "><?php echo '-' . number_format($promotion) ?> Ks</p>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="cost">
                                <h2 class="title is-6">Total Cost</h2>
                            </div>
                            <div class="price">
                                <p class="title is-6"><?php echo number_format($total - $promotion) ?> Ks</p>
                                <input type="hidden" name="id" value="">
                            </div>
                        </div>

                        <a href="./paymentMethod.php"><button class="checkout">Checkout</button></a>



                    </div>

                    <!-- end checkout cost -->
                </div>
            </div>
            <div class="relatedCourse">
                <h2 class="title is-3">Course You May Like</h2>

                <!-- courses -->
                <div class="courses">
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>

                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>

                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>

                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- end courses -->
        </div>
        <!-- end of container -->
    </main>
    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
    <script src="./resources/js/index.js"></script>
    <script src="../View/resources/js/checkOut.js"></script>
</body>

</html>