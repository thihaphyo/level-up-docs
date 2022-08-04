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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/admin dashboard.css?<?php echo $time ?>">


</head>

<body>

    <?php require_once('./sidebar.php') ?>
    <?php require('../Controller/adminController/adminDashboard.php');
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
                        <p>The total amount of student in our website</p>
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
                        <a href="">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Profile Name</th>
                                <th>Email</th>
                                <th>Phone Numer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>mitle34</td>
                                <td>bilste@gmail.com</td>
                                <td>0953959393</td>
                                <td>Active</td>
                            </tr>
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
                        <a href="./request list.php">View More</a>
                    </div>

                    <div class="request-list">
                        <div class="icons">
                            <i class="fa-regular fa-address-card fa-xl"></i>
                        </div>
                        <div>
                            <p>miete34ss request to approve this request</p>
                            <p>2hr ago</p>
                        </div>
                    </div>
                </div>
                <div class="appeal-request-list list-info">
                    <div>

                        <h3>Appeal Request List</h3>
                        <a href="./request list.php">View More</a>
                    </div>

                    <?php
                    foreach ($appealList as $key => $value) {
                    ?>
                        <div class="request-list">
                            <div class="icons">
                                <i class="fa-regular fa-file-lines fa-xl"></i>
                            </div>
                            <div>
                                <p>
                                    Appeal form from
                                    <span>
                                        <?php echo $value['full_name'] ?>
                                    </span>
                                </p>
                                <p>2hr ago</p>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <!-- end of right content -->
        </div>

    </div>
    <!-- end of container -->


</body>
<!-- javascript file -->
<script src="./resources/js/admin dashboard.js"></script>

</html>