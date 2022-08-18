<?php
$time = time();
session_start();
// session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- <link rel="stylesheet" href="./courselist.css"> -->
    <link rel="stylesheet" href="./resources/css/courselist.css?v=<?= $time; ?>">
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">

</head>

<body>
    <?php require_once('./sidebar.php') ?>

    <section class="sections"></section>
    <section class="course-list section">
        <div class="header">
            <h2 class="has-text-weight-bold">My Courses</h2>
            <a href="../Controller/uploadNewCourseController.php" class=" button is-one-fifth">Add New Course</a>
        </div>

        <div class="card-container">
            <?php
            // $delete = 1;
            // require_once "./showCourseListController.php";
            require_once "../Controller/showCourseListController.php";

            foreach ($result as $key => $value) {
            ?>
                <a href="#">
                    <div class="cards">
                        <img src="./resources/img/<?php echo $value['course_cover_image']; ?>" alt="" />
                        <div class="details">
                            <div class="detail">
                                <ion-icon name="bar-chart-outline"></ion-icon>
                                <div class="content">
                                    <span>Level</span>
                                    <h4><?php echo $value['level'] ?></h4>
                                </div>
                            </div>
                            <div class="detail">
                                <ion-icon name="time-outline"></ion-icon>
                                <div class="content">
                                    <span>Hours</span>
                                    <h4><?php echo $value['duration'] ?> Hours</h4>
                                </div>
                            </div>
                            <div class="detail">
                                <ion-icon name="laptop-outline"></ion-icon>
                                <div class="content">
                                    <span>Lectures</span>
                                    <h4><?php echo $value['lectureCount']; ?> Lectures</h4>
                                </div>
                            </div>
                        </div>
                        <h2><?php echo $value['course_title']; ?></h2>
                        <div class="info">
                            <a href="#" class="title is-6 has-text-weight-bold">Edit</a>
                        </div>
                        <div class="rating">
                            <i class="fa-solid fa-star fa-sm"></i>
                            <p class="has-text-weight-bold"><?php echo number_format($value['total_rating'] / $value['total_rated']) ?>/5</p>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </section>

    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);

        window.onunload = function() {
            null
        };
    </script>
</body>

</html>