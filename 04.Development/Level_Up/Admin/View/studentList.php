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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/admin dashboard.css?<?php echo $time ?>">


</head>

<body>

    <?php require_once('./sidebar.php') ?>
    <?php require('../Controller/adminController/adminDashboard.php');
    $purchasedCourseByStud = $dashboard->getPurchasedCourse();
    $allStudentList  = $dashboard->getAllStudent();
    ?>


    <!-- start of container -->
    <div class="container">
        <div>
            <h1 class="text">Student List</h1>
            <!-- start of student list by pc -->
            <div class="student-table">
                <div>
                    <h3>Student List By Purchased Course (Total <?php echo count($purchasedCourseByStud); ?>)</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Verified</th>
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

                                        echo 'PC-' . $value['total_course']

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value['is_verified'] == 0) {
                                            echo 'Not Yet';
                                        } else {
                                            echo 'Done';
                                        }

                                        ?></td>
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
            <!-- end of summary student list by pc -->

            <!-- start of student list by pc -->
            <div class="student-table">
                <div>
                    <h3>All Student (Total <?php echo count($allStudentList); ?>)</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($allStudentList)) {

                        ?>
                            <tr class="no-data-table">
                                <td colspan="4">No Data Yet</td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <?php

                            foreach ($allStudentList as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['full_name'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td>
                                        <?php
                                        if ($value['is_verified'] == 0) {
                                            echo 'Not Yet';
                                        } else {
                                            echo 'Done';
                                        }
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
            <!-- end of summary student list by pc -->
        </div>
    </div>
    <!-- end of container -->


</body>
<!-- javascript file -->
<script src="./resources/js/admin dashboard.js"></script>

</html>