<?php

$time = time();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/admin dashboard.css?<?php echo $time ?>">
</head>

<body>

    <?php require_once('./sidebar.php') ?>
    <?php require('../Controller/adminController/adminDashboard.php');
    $appealList = $dashboard->getAppeal();
    $instructorRequestList = $dashboard->getInstructorRequest();
    $purchasedCourseByStud = $dashboard->getPurchasedCourse();

    $studentList = $dashboard->getStduent();
    $instructorList = $dashboard->getInstructor();
    $courseList = $dashboard->getCourse();
    ?>


    <!-- start of container -->
    <div class="container">
        <div>
            <h1 class="text">Dashboard</h1>
        </div>
        <div class="dashboard">
            <!-- start of left content -->
            <div class="left-content">
                <!-- start of status board section -->
                <div class="status-container">
                    <div class="status students">
                        <p>Students</p>
                        <h1 class="status-number"><?php echo $studentList[0]['count(id)']; ?></h1>
                        <p>The total active student in our website</p>
                    </div>
                    <svg width="2" height="162" viewBox="0 0 2 162" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 0L1.00001 162" stroke="white" stroke-opacity="0.7" />
                    </svg>

                    <div class="status courses">
                        <p>Courses</p>
                        <h1 class="status-number"><?php echo $courseList[0]['count(id)']; ?></h1>
                        <p>The total amount of courses in our website</p>
                    </div>
                    <svg width="2" height="162" viewBox="0 0 2 162" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 0L1.00001 162" stroke="white" stroke-opacity="0.7" />
                    </svg>
                    <div class="status instructors">
                        <p>Instructors</p>
                        <h1 class="status-number"><?php echo $instructorList[0]['count(id)']; ?></h1>
                        <p>The total amount of instructors in our website</p>
                    </div>
                </div>
                <!-- end of status board section -->

                <!-- start of summary student list -->
                <div class="student-table">
                    <div>
                        <h3>Summary Student List</h3>
                        <a href="./studentList.php">View All</a>
                    </div>
                    <div class="col-explain">
                        <p>*PC - Purchased Course*</p>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Profile Name</th>
                                <th>Email</th>
                                <th>Courses</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($purchasedCourseByStud)) {
                            ?>
                                <tr class="no-data-table">
                                    <td colspan="4">No Data Yet</td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <?php

                                foreach ($purchasedCourseByStud as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value['full_name'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td>
                                            <?php
                                            echo $value['total_course'] . ' PC'
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($value['is_deleted'] == 0) {
                                                echo 'Active';
                                            } else {
                                                echo 'Deleted';
                                            }

                                            ?>
                                        </td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- end of summary student list -->
            </div>
            <!-- end of left content -->

            <!-- start of right content -->
            <div class="right-content">
                <div class="instructor-request-list list-info">
                    <div>

                        <h3>Instructor Request List</h3>
                        <a href="./instructorRequest.php">View More</a>
                    </div>
                    <?php
                    if (empty($instructorRequestList)) {
                    ?>
                        <div class="no-data">
                            <h3>No Request Yet</h3>

                        </div>
                    <?php } else { ?>

                        <?php
                        foreach ($instructorRequestList as $key => $value) {
                        ?>

                            <div class="request-list">
                                <div class="icons">
                                    <i class="fa-regular fa-address-card fa-xl"></i>
                                </div>
                                <div>
                                    <p>
                                        <a href="./instructorRequestAbout/<?php echo $value['id'] ?>">
                                            <span><?php echo $value['full_name'] ?></span> request to review the form
                                        </a>
                                    </p>
                                    <p class="time-ago"><?php echo $value['created_at'] ?></p>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>

                </div>
                <div class="appeal-request-list list-info">
                    <div>

                        <h3>Appeal Request List</h3>
                        <a href="./request list.php">View More</a>
                    </div>
                    <?php
                    if (empty($appealList)) {
                    ?>
                        <div class="no-data">
                            <h3>No Request Yet</h3>

                        </div>
                    <?php } else { ?>
                        <?php
                        foreach ($appealList as $key => $value) {
                        ?>
                            <div class="request-list">
                                <div class="icons">
                                    <i class="fa-regular fa-file-lines fa-xl"></i>
                                </div>
                                <div>

                                    <p>
                                        <a href="./appealListDetail/<?php echo $value['id'] ?>">
                                            Appeal form from
                                            <span>
                                                <?php echo $value['full_name'] ?>
                                            </span>
                                        </a>

                                    </p>
                                    <p class="time-ago"><?php echo $value['created_at'] ?></p>
                                </div>
                            </div>

                    <?php }
                    }
                    ?>
                </div>
            </div>
            <!-- end of right content -->
        </div>

    </div>
    <!-- end of container -->

    <!-- start of if statement -->
    <?php
    // start of isset session
    if (isset($_SESSION['message'])) {


        // start of success message session
        if ($_SESSION['message']['status'] == "Successful") { ?>

            <!-- start of success or fail message notification section -->
            <div class="message-alert-box message-success slide-in-right">
                <div class="success-icon">
                    <i class="fa-solid fa-square-check fa-2xl"></i>
                </div>
                <div class="content">
                    <h4><?php echo $_SESSION['message']['title'] ?></h4>
                    <p><?php echo $_SESSION['message']['description'] ?></p>
                </div>
            </div>
            <!-- end of success or fail message notification section -->

        <?php }
        // end of success message session

        // start of fail message session
        else { ?>
            <!-- start of success or fail message notification section -->
            <div class="message-alert-box message-fail slide-in-right">
                <div class="fail-icon">
                    <i class="fa-solid fa-square-xmark fa-2xl"></i>
                </div>
                <div class="content">
                    <div>
                        <h4><?php echo $_SESSION['message']['title'] ?></h4>
                        <button id="showModal">view</button>
                    </div>


                    <p><?php echo $_SESSION['message']['description'] ?></p>
                </div>
            </div>
            <!-- end of success or fail message notification section -->

        <?php } ?>
        <!-- end of message session else -->
    <?php
    }
    // end of isset session else
    ?>
    <div class="error-modal-box-bg hidden">
        <div class="error-modal-box">
            <div>
                <h2>Error</h2>
                <button id="closeModal">Close</button>
            </div>
            <div>
                <p>
                    <?php
                    print_r($_SESSION['message']['error']);
                    unset($_SESSION['message']);

                    ?>
                </p>
            </div>
        </div>
    </div>


</body>
<!-- javascript file -->
<script src="./resources/js/admin dashboard.js?<?php echo $time; ?>"></script>
<script src="./resources/js/admin notification.js?<?php echo $time ?>"></script>

</html>