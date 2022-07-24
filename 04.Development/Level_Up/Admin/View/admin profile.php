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
</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <!-- start of container -->
    <div class="background-image">
        <!-- <img width="100%" src="./resources/img/admin profile picture/no image.png" alt=""> -->
    </div>
    <div class="container">
        <!-- start of admin update container -->
        <div class="admin-profile">
            <div class="profile-info">
                <div class="my-profile-image">
                    <img src="./resources/img/admin profile picture/admin profile1.jpg" alt="">
                </div>
                <div class="my-profile-info">
                    <div class="my-profile-name-n-edit">
                        <div>
                            <h2>Michale</h2>
                            <p>Admin at Level Up</p>
                        </div>
                        <a href="./admin update.php">Edit</a>
                    </div>
                    <div class="my-profile-contact-n-address">
                        <div class="my-profile-contact">
                            <h3>Contact</h3>
                            <p>Email - hello142@gmail.com</p>
                            <p>Phone - +95 9353098530</p>
                        </div>
                        <div class="my-profile-address">
                            <h3>Address</h3>
                            <p>No - 32 Washidan Road 54 Ward Thatw Township</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of admin update container -->

    </div>
    <!-- end of container -->
    <!-- javascript file  -->
</body>

</html>