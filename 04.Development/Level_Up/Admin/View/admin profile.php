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
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
</head>

<body>
    <?php require_once('./sidebar.php') ?>

    <!-- connect to the adminListController and it give the list of admins in database -->
    <?php
    require('../Controller/adminController/adminListController.php');
    $adminList = new AdminListController();
    $adminList = $adminList->viewAdmin($_SESSION['id']);
    ?>
    <!-- end of php code -->

    <!-- start of container -->
    <div class="container">
        <!-- start of admin update container -->
        <div class="admin-profile">
            <div class="profile-info">
                <div class="my-profile-image">
                    <?php if (!$adminList[0]['profile_image']) $adminList[0]['profile_image'] = "no image.png" ?>
                    <img src="./resources/img/admin profile picture/<?php echo $adminList[0]['profile_image'] ?>" alt="">
                </div>

                <!-- start of admin info -->
                <div class="my-profile-info">
                    <!-- start of name and edit button section -->
                    <div class="my-profile-name-n-edit">
                        <div>
                            <h2><?php echo ($adminList[0]["full_name"]); ?></h2>
                            <p>Admin at Level Up</p>
                        </div>
                        <?php if ($adminList[0]['id'] == $_SESSION['id'])
                            echo '<a href="./admin update.php' . $_SESSION['id'] . '">Edit</a>';
                        ?>
                    </div>
                    <!-- end of name and edit button section -->

                    <!-- start of contact and address button section -->
                    <div class="my-profile-contact-n-address">
                        <div class="my-profile-contact">
                            <h3>Contact</h3>
                            <p>Email - <?php echo ($adminList[0]["email"]); ?></p>
                            <p>Phone - <?php echo $adminList[0]["country_code"] . " " . $adminList[0]["phone_number"]; ?></p>
                        </div>
                        <div class="my-profile-address">
                            <h3>Address</h3>
                            <p>No - <?php echo ($adminList[0]["address"]); ?></p>
                        </div>
                    </div>
                    <!-- end of contact and address button section -->
                </div>
                <!-- end of admin info -->
            </div>
        </div>
        <!-- end of admin update container -->

        <!-- start of if statement -->
        <?php if ($_SESSION['message']['title'] == "Successful") { ?>

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

        <?php } else { ?>
            <!-- end of if and start of else statement-->

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
        <!-- end of else -->

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


    </div>
    <!-- end of container -->
    <!-- javascript file  -->
    <script src="./resources/js/admin notification.js?<?php echo $time ?>"></script>
</body>

</html>