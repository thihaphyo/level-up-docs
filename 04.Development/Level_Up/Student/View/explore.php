<?php
$time = time();

session_start();

// $_SESSION['studentId'] = 1;
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
    <link rel="stylesheet" href="./resources/css/explore.css?v=<?= $time; ?>">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <?php require_once('./header.php') ?>

    <main>
        <!-- start of container  -->
        <div class="container">
            <div class="home_content">
                <div class="text">
                    <p>Thousands of Courses</p>
                    <p>To Help With Your</p>
                    <p>Passion<span><img src="./resources/img/explore/Vector80.png" alt=""></span></p>
                </div>
                <div class="img">
                    <img src="./resources/img/explore/CoursesCoverImage.png" alt="">
                </div>
            </div>
            <div class="start_learning">
                <p class="is-size-3 has-text-weight-bold">Start Learning</p>
                <div class="categories">
                    <p class="category active" id="all" onclick="changeCategory(this)">All Categories</p>
                    <?php
                    require_once "../Controller/showCourseCategoryController.php";

                    foreach ($courseCategories as $key => $value) {
                    ?>
                        <p class="category" id="<?php echo $value['id'] ?>" onclick="changeCategory(this)"><?php echo $value['category_name'] ?></p>
                    <?php
                    }
                    ?>
                    <!-- <p class="category">Web Development</p>
                    <p class="category">Machine Learning</p>
                    <p class="category">Cyber Security</p>
                    <p class="category">UI/UX Design</p>
                    <p class="category">Photography</p> -->
                </div>
            </div>

            <div class="courses">
                <p class="noCourse mb-6 is-size-4 has-text-weight-bold" id="noCourse">Sorry, there is nothing to show for this category.</p>
                <?php
                // $delete = 1;
                // require_once "./showCourseListController.php";
                require_once "../Controller/showCourseListController.php";

                foreach ($course as $key => $value) {
                ?>
                    <a href="../Controller/setCourseIdController.php?id=<?php echo $value['cID'] ?>" id="<?php echo $value['category_id'] ?>" class="course">
                        <div class="cards">
                            <img src="../../Storage/images/<?php echo $value['course_cover_image'] ?>" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4><?php echo $value['LEVEL'] ?></h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4><?php echo $value['duration'] ?> Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4><?php echo $value['lectureCount'] ?> Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo $value['course_title'] ?></h2>
                            <div class="rating">
                                <p>By <?php echo $value['instructorName'] ?></p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span><?php echo number_format($value['total_rating'] / $value['total_rated']) ?></span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span><?php echo number_format($value['price']) ?></span> Ks</p>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>

            <div class="is-size-5 has-text-weight-bold">Popular Courses</div>

            <div class="courses">
                <?php
                // $delete = 1;
                // require_once "./showCourseListController.php";
                require_once "../Controller/showCourseListController.php";

                foreach ($course as $key => $value) {
                ?>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="../../Storage/images/<?php echo $value['course_cover_image'] ?>" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4><?php echo $value['LEVEL'] ?></h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4><?php echo $value['duration'] ?> Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4><?php echo $value['lectureCount'] ?> Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo $value['course_title'] ?></h2>
                            <div class="rating">
                                <p>By <?php echo $value['instructorName'] ?></p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span><?php echo number_format($value['total_rating'] / $value['total_rated']) ?></span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span><?php echo number_format($value['price']) ?></span> Ks</p>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>

            <div class="is-size-5 has-text-weight-bold">Best Seller Courses</div>

            <div class="courses">
                <?php
                // $delete = 1;
                // require_once "./showCourseListController.php";
                require_once "../Controller/showCourseListController.php";

                foreach ($course as $key => $value) {
                ?>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="../../Storage/images/<?php echo $value['course_cover_image'] ?>" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4><?php echo $value['LEVEL'] ?></h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4><?php echo $value['duration'] ?> Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4><?php echo $value['lectureCount'] ?> Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo $value['course_title'] ?></h2>
                            <div class="rating">
                                <p>By <?php echo $value['instructorName'] ?></p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span><?php echo number_format($value['total_rating'] / $value['total_rated']) ?></span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span><?php echo number_format($value['price']) ?></span> Ks</p>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- end of container -->
    </main>



    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./resources/js/index.js?v=<?= $time; ?>"></script>
    <script src="./resources/js/explore.js"></script>
</body>

</html>