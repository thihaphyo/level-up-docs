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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/setting.css?<?php echo $time ?>">
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
            <h1 class="text">Settings</h1>
            <!-- start of setting -->
            <div class="setting-container">
                <!-- start of guide -->
                <a>
                    <i class="fa-solid fa-book fa-2xl"></i>

                    <div>
                        <h2>Guide</h2>
                        <p>Customize <span>guide</span> information on guide page.</p>

                    </div>

                </a>
                <!-- end of guide -->

                <!-- start of service -->
                <a>
                    <i class="fa-solid fa-handshake-angle"></i>
                    <div>
                        <h2>Service</h2>
                        <p>Customize <span>service</span> information displayed for users.</p>
                    </div>
                </a>
                <!-- end of service -->

            </div>
            <!-- end of setting -->

            <!-- start of setting -->
            <div class="setting-container">
                <!-- start of policy -->
                <a href="./adminPrivacyPolicy.php">
                    <i class="fa-solid fa-file-shield"></i>
                    <div>
                        <h2>Policy</h2>
                        <p>Customize <span>policy</span> information for policy page.</p>
                    </div>
                </a>
                <!-- end of policy -->

                <!-- start of contact -->
                <a>
                    <i class="fa-solid fa-address-book"></i>
                    <div>

                        <h2>Contact</h2>

                        <p>Customize <span>contact</span> information on contact page.</p>
                    </div>
                </a>
                <!-- end of contact -->

            </div>
            <!-- end of setting -->

            <!-- start of setting -->
            <div class="setting-container">
                <!-- start of about -->
                <a href="./adminAbout.php">
                    <i class="fa-solid fa-building"></i>
                    <div>
                        <h2>About Us</h2>
                        <p>Customize <span>about us</span> information on guide page.</p>
                    </div>

                </a>
                <!-- end of about -->

                <!-- start of profile -->
                <a>
                    <i class="fa-solid fa-user"></i>
                    <div>
                        <h2>My Profile</h2>
                        <p>About my <span>personal information</span></p>
                    </div>
                </a>
                <!-- end of profile  -->

            </div>
            <!-- end of setting -->
        </div>
    </div>
    <!-- end of container -->


</body>
<!-- javascript file -->
<script src="./resources/js/admin dashboard.js"></script>

</html>