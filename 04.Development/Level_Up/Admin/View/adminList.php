<?php

$time = time();
session_start();
$_SESSION['adminId'] = "11"
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
        $adminList = $adminList->showAllAdmin();
        ?>
        <!-- end of php code -->

        <div class="admin-list-new-admin">
            <h1 class="text">Admin List
            </h1>
            <button id="addNewAdmin">New Admin</button>
        </div>
        <?php

        // echo "<pre>";
        // print_r($_SESSION['message']);
        //Loop all admin list.
        foreach ($adminList as $key => $value) {
        ?>
            <div class="admin-list-container">
                <div class="profile">
                    <!-- start of profile image -->
                    <div class="profile-image">
                        <?php if (!$value['profile_image']) $value['profile_image'] = "no image.png" ?>
                        <img src="./resources/img/admin profile picture/<?php echo $value['profile_image'] ?>" alt="">

                    </div>
                    <!-- end of profile image -->

                    <!-- start of action links -->
                    <div class="profile-action-link">

                        <?php
                        if ($value['id'] == $_SESSION['adminId']) {
                            echo '<a href="./adminProfile.php">View</a>';
                        } else {
                            echo '<a href="./adminProfile.php?id=' . $value["id"] . '"' . '>View</a>';
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
                        <h3 class="capitalize"><?php echo $value['full_name'] ?></h3>
                    </div>
                    <!-- end of info-chunk -->

                    <!-- start of info-chunk -->
                    <div class="info-chunk">
                        <label>Phone</label>
                        <h3 class="capitalize"><?php echo $value['country_code'] ?><?php echo $value['phone_number'] ?></h3>
                    </div>
                    <!-- end of info-chunk -->

                </div>
                <!-- end of admin info -->

                <!-- start of admin info -->
                <div class="admin-info">
                    <div class="info-chunk">
                        <label>Address</label>
                        <h3 class="capitalize"><?php echo $value['address'] ?></h3>
                    </div>

                    <div class="info-chunk">
                        <label>Email</label>
                        <h3><?php echo $value['email'] ?></h3>
                    </div>
                </div>
                <!-- end of admin info -->
            </div>

        <?php } ?>
        <!-- end of loop -->

        <!-- start of php code of auto random generated username & password -->

        <?php

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $username = substr(str_shuffle($chars), 0, 8);
        $password = substr(str_shuffle($chars), 0, 8);

        ?>

        <!-- end of php code of auto random generated username & password -->

        <!-- start of create admin modal box -->
        <div class="create-admin-modal-box-bg hidden">

            <div class="create-admin-modal-box">
                <div>
                    <h2>Create Admin</h2>
                    <button id="closeCreateAdminModal">close</button>
                </div>
                <div>
                    <label>Username</label>
                    <div class="input-with-copy">
                        <input type="text" name="admin-username" value="<?php echo $username ?>" readonly></input>
                        <i class="fa-regular fa-copy fa-lg"></i>

                    </div>
                </div>
                <div>
                    <label>Password</label>
                    <div class="input-with-copy">
                        <input type="text" name="admin-password" value="<?php echo $password ?>" readonly></input>
                        <i class="fa-regular fa-copy fa-lg"></i>

                    </div>
                </div>
                <p id="createAdminMessage"></p>
                <div>
                    <button id="createNewAdmin">Confirm New Admin</button>
                </div>
            </div>

        </div>
        <!-- end of create admin modal box -->


    </div>
    <!-- end of container -->
    <!-- javascript file  -->
    <script src="./resources/js/admin insert.js?<?php echo $time ?>"></script>

</body>

</html>