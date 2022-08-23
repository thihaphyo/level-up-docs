<?php
session_start();
$time = time();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/mystyles.css?v=<?= $time; ?>">
    <link rel="stylesheet" href="./resources/css/root.css?v=<?= $time; ?>">

    <script type=" module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <?php
    require_once('./header.php');
    require_once('../Controller/showCourseDetailsController.php');
    ?>

    <main>
        <!-- start of container  -->
        <div class="container">
            <div class="info">
                <div class="cards">
                    <img src="../../Storage/images/<?php echo $course[0]['course_cover_image'] ?>" alt="" />
                    <div class="price">
                        <p class="is-size-5 has-text-weight-bold"><?php echo $course[0]['promo_price'] ?> ks</p>
                        <p class="is-size-5"><?php echo $course[0]['price'] ?> ks</p>
                        <p class="is-size-5"><?php echo $course[0]['promo_percent'] ?>% off</p>
                    </div>
                    <div class="buttons">
                        <a class="button is-primary has-text-weight-semibold" id="addToCart">Add to cart</a>
                        <a class="button is-primary has-text-weight-semibold hide" id="removeFromCart">Cancel</a>
                        <a class="button is-primary is-outlined has-text-weight-semibold" id="buyNow">Buy now</a>
                    </div>
                    <div class="wish">
                        <ion-icon name="heart-outline" id="heartOutline"></ion-icon>
                        <ion-icon name="heart" class="hide" id="heartFill"></ion-icon>
                    </div>
                </div>
                <div class="details">
                    <p class="is-size-3 has-text-weight-bold"><?php echo $course[0]['course_title'] ?></p>
                    <p class="is-size-5"><?php echo $course[0]['course_info'] ?></p>
                    <p class="is-size-5">
                        <ion-icon name="star" class="star"></ion-icon><?php echo number_format($course[0]['total_rating'] / $course[0]['total_rated']) ?>/5 (<?php echo number_format($course[0]['total_rating']) ?> students)
                    </p>
                    <p class="is-size-5">Duration - <?php echo $course[0]['duration'] ?> hours</p>
                    <p class="is-size-5 has-text-weight-semibold">Created By <a href="#"><?php echo $course[0]['instructorName'] ?></a></p>
                </div>
            </div>

            <div class="profit">
                <p class="is-size-4 has-text-weight-bold">What you will learn</p>
                <div class="lists">
                    <ul>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                        <li>
                            <ion-icon name="checkmark"></ion-icon>Learn the most popular language to search
                        </li>
                    </ul>
                </div>
            </div>

            <div class="requirements">
                <p class="is-size-4 has-text-weight-bold">Requirements</p>
                <div class="lists">
                    <ul>
                        <li>
                            <ion-icon name="checkmark-circle-outline"></ion-icon>at least 4Gb ram or highter laptop
                        </li>
                        <li>
                            <ion-icon name="checkmark-circle-outline"></ion-icon> internet connection
                        </li>
                    </ul>
                </div>
            </div>

            <div class="description">
                <p class="is-size-4 has-text-weight-bold">Description</p>
                <p>
                    <?php echo $course[0]['course_description'] ?>
                </p>
            </div>

            <div class="coursefor">
                <p class="is-size-4 has-text-weight-bold">Who this course is for</p>
                <p>
                    <?php echo $course[0]['course_target'] ?>
                </p>
            </div>
        </div>
        <!-- end of container -->
    </main>



    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./resources/js/index.js?v=<?= $time; ?>"></script>
</body>

</html>