<?php
$time = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/mystyles.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/root.css?<?php echo $time ?> ">
    <link rel="stylesheet" href="./resources/css/cart.css?<?php echo $time ?> ">

</head>

<body>
    <?php require_once('./header.php') ?>

    <!-- start of main -->
    <main>
        <!-- start of container -->
        <div class="container has-background-white p-6">
            <h1 class="title">My Cart</h1>

            <!-- start of course card  -->
            <label class="checkbox is-flex">
                <input class="" type="checkbox">

                <!-- start of course image -->
                <img class="cart-course-image-size p-2" height="50px" src="./resources/img/header_footer/course image.png" alt="course image">
                </img>
                <!-- end of course image -->

                <!-- start of course's instructor name and rating section -->
                <div class="cart-course-footer p-2">
                    <!-- start of course name  -->
                    <a class="" href="">
                        <h1 class="is-size-5 has-text-weight-bold">
                            Importanes of Wireframes: Learn
                            to Make for Better Design By Making
                        </h1>
                    </a>
                    <!-- end of course name -->

                    <!-- start of instructor name and rating -->
                    <div class="is-flex is-justify-content-space-between pt-4">
                        <a class="has-text-weight-medium">By Daniel Walter</a>
                        <div>
                            <img class="pr-1" src="./resources/img/header_footer/Rating.svg" alt="">
                            <a class="has-text-weight-medium">4.5/5(20)</a>
                        </div>
                    </div>
                    <!-- end of instructor name and rating -->

                </div>
                <!-- end of course's instructor name and rating section -->


                <!-- start of course price and remove section -->
                <div class="cart-course-price ml-auto">
                    <h1 class="is-size-5 has-text-weight-bold">30,000 MMK</h1>
                    <a class="is-underlined" href="">Remove</a>
                </div>
                <!-- end of course price and remove section -->

            </label>
            <hr>
            <!-- end of course card -->

            <!-- start of course card  -->
            <label class="checkbox is-flex">
                <input class="" type="checkbox">

                <!-- start of course image -->
                <img class="cart-course-image-size p-2" height="50px" src="./resources/img/header_footer/course image.png" alt="course image">
                </img>
                <!-- end of course image -->

                <!-- start of course's instructor name and rating section -->
                <div class="cart-course-footer p-2">
                    <!-- start of course name  -->
                    <a class="" href="">
                        <h1 class="is-size-5 has-text-weight-bold">
                            Importanes of Wireframes: Learn
                            to Make for Better Design By Making
                        </h1>
                    </a>
                    <!-- end of course name -->

                    <!-- start of instructor name and rating -->
                    <div class="is-flex is-justify-content-space-between pt-4">
                        <a class="has-text-weight-medium">By Daniel Walter</a>
                        <div>
                            <img class="pr-1" src="./resources/img/header_footer/Rating.svg" alt="">
                            <a class="has-text-weight-medium">4.5/5(20)</a>
                        </div>
                    </div>
                    <!-- end of instructor name and rating -->

                </div>
                <!-- end of course's instructor name and rating section -->


                <!-- start of course price and remove section -->
                <div class="cart-course-price ml-auto">
                    <h1 class="is-size-5 has-text-weight-bold">30,000 MMK</h1>
                    <a class="is-underlined" href="">Remove</a>
                </div>
                <!-- end of course price and remove section -->

            </label>
            <hr>
            <!-- end of course card -->

        </div>
        <!-- end of container -->
    </main>
    <!-- end of main -->


    <?php require_once('./footer.php') ?>
</body>

</html>