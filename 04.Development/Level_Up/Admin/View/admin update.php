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
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/admin update.css?<?php echo $time ?>">


</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <!-- start of container -->
    <div class="container">
        <h1 class="text">Admin Update</h1>
        <!-- start of admin update container -->
        <div class="admin-update-container">

            <div>
                <!-- start of profile image -->
                <div class="admin-update-profile">
                    <p>Profile Picture</p>
                    <div class="profile-image admin-update-image">
                        <!-- admin profile image is inserted as background image through javascript -->
                    </div>
                    <!-- <img src="./resources/img/admin profile picture/admin profile1.jpg" alt=""> -->
                    <input type="text">
                    <!-- start of action link -->
                    <div class="profile-action-link admin-update-action-link">
                        <a href="">Upload</a>
                        <a href="">Delete</a>

                    </div>
                    <!-- end of action link -->
                </div>
                <!-- end of profile input -->

                <!-- start of email input -->
                <div class="admin-update-input">
                    <p>Email</p>
                    <input type="text" placeholder="e.g. name@gmail.com"></input>
                </div>
                <!-- end of email input  -->

                <!-- start of phone input -->
                <div class="admin-update-input">
                    <p>Phone Number</p>
                    <input type="text" placeholder="e.g. +95 093250295"></input>
                </div>
                <!-- end of phone input  -->

                <!-- start of name input -->
                <div class="admin-update-input">
                    <p>Profile Name</p>
                    <input type="text" placeholder="e.g. michale3424"></input>
                </div>
                <!-- end of name input  -->


                <!-- start of address input -->
                <div class="admin-update-input">
                    <p>Address</p>
                    <input type="text" placeholder="e.g. St loa building 10."></input>
                </div>
                <!-- end of address input  -->
            </div>



        </div>
        <!-- end of admin update container -->

    </div>
    <!-- end of container -->
</body>

</html>