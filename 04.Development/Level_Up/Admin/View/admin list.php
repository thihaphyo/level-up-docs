<?php

$time = time();
session_start();
$_SESSION["id"] = "3";
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
    <link rel="stylesheet" href="./resources/css/admin list.css?<?php echo $time ?>">

</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <!-- start of container -->
    <div class="container">
        <!-- connect to the adminListController and it give the list of admins in database -->
        <?php
        require('../Controller/adminController/adminListController.php');
        $adminList = new AdminListController();
        $adminList = $adminList->showAdmin();
        ?>
        <!-- end of php code -->

        <h1 class="text">Admin List</h1>

        <?php
        //Loop all admin list.
        foreach ($adminList as $key => $value) {
        ?>
            <div class="admin-list-container">
                <div class="profile">
                    <!-- start of profile image -->
                    <div class="profile-image">
                        <!-- admin profile image is inserted as background image through javascript -->
                    </div>
                    <!-- end of profile image -->

                    <!-- start of action links -->
                    <div class="profile-action-link">

                        <?php
                        if ($value['id'] == $_SESSION['id']) {
                            echo '<a href="./admin update.php?id=' . $value["id"] . '"' . '>Update</a>';
                        } else {
                            echo '<a href="./admin profile.php?id=' . $value["id"] . '"' . '>View</a>';
                        };

                        ?>


                    </div>
                    <!-- end of action links -->
                </div>

                <!-- start of admin info -->
                <div class="admin-info">
                    <!-- start of info-chunk -->
                    <div class="info-chunk">
                        <label>Name</label>
                        <h3><?php echo $value['full_name'] ?></h3>
                    </div>
                    <!-- end of info-chunk -->

                    <!-- start of info-chunk -->
                    <div class="info-chunk">
                        <label>Phone</label>
                        <h3><?php echo $value['country_code'] ?><?php echo $value['phone_number'] ?></h3>
                    </div>
                    <!-- end of info-chunk -->

                </div>
                <!-- end of admin info -->

                <!-- start of admin info -->
                <div class="admin-info">
                    <div class="info-chunk">
                        <label>Address</label>
                        <h3><?php echo $value['address'] ?></h3>
                    </div>

                    <div class="info-chunk">
                        <label>Email</label>
                        <h3><?php echo $value['email'] ?></h3>
                    </div>
                </div>
                <!-- end of admin info -->
            </div>

        <?php } ?>

    </div>
    <!-- end of container -->
</body>

</html>