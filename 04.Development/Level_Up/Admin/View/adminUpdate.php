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
    <link rel="stylesheet" href="./resources/css/admin update.css?<?php echo $time ?>">


</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <!-- connect to the adminListController and it give the list of admins in database -->
    <?php
    require('../Controller/adminController/adminListController.php');
    $adminList = new AdminListController();
    $adminList = $adminList->viewAdmin($_SESSION['adminId']);
    ?>
    <!-- end of php code -->

    <!-- start of container -->
    <div class="container">
        <h1 class="text">Update Admin</h1>
        <!-- start of admin update container -->
        <div class="admin-update-container">

            <form class="admin-form" method="post" action="../Controller/adminController/adminController.php" enctype="multipart/form-data">
                <?php
                require_once('../Model/dbConnection.php');
                $encryption = new DBConnect();
                ?>
                <input type="hidden" value="<?php echo $encryption->stringEncryption('encrypt', $_SESSION['adminId'] . '-update') ?>" name="adminId">
                <div>
                    <!-- start of profile image -->
                    <div class="admin-update">
                        <p>Profile Picture</p>
                        <label class="profile" for="image-upload">
                            <div class="profile-image">

                                <?php if (!$adminList[0]['profile_image']) {
                                    $adminList[0]['profile_image'] = "no image.png";
                                    echo "<h5>Click to upload</h5>";
                                    echo '<img width="140%" src="./resources/img/admin profile picture/' . $adminList[0]['profile_image'] . '" alt="no image"></img>';
                                } else {
                                    echo '<h5 id="image-name" class="update-image-name" >Click to upload</h5>';
                                    echo '<img id="image-background" width="100%" src="./resources/img/admin profile picture/' . $adminList[0]['profile_image'] . '" alt="profile image"></img>';
                                }
                                ?>

                            </div>
                            <input id="image-upload" type="file" name="profile" value="<?php echo $adminList[0]['profile_image'] ?>"></input>
                        </label>
                    </div>
                    <!-- end of profile input -->

                    <!-- start of name input -->
                    <div class="admin-update-input">
                        <p>Profile Name</p>
                        <input class="input-validate" type="text" placeholder="e.g. michale3424" name="name" value="<?php echo $adminList[0]['full_name']; ?>" required></input>
                        <p class="warning">*Username should be at least 4 length *</p>

                    </div>
                    <!-- end of name input  -->

                    <!-- start of password input -->
                    <div class="admin-update-input">
                        <p>Password</p>
                        <!-- decrypt the pwd -->
                        <?php
                        $theAdmin = new AdminListController();
                        $adminList[0]['password'] = $theAdmin->stringEncryption('decrypt', $adminList[0]['password']);
                        ?>
                        <!-- end of decrypt the pwd -->

                        <input class="input-validate" type="password" placeholder="e.g. ******" name="pwd" value="<?php echo $adminList[0]['password']; ?>" required></input>
                        <div class="warning hidden password-must-contain">
                            <h4>*The password has at least*</h4>
                            <p>*8 character long *</p>
                            <p>*One Uppercase Letter*</p>
                            <p>*One Lowercase Letter*</p>
                            <p>*One Digit*</p>
                            <p>*One Special Character*</p>
                        </div>
                    </div>
                    <!-- end of passwod input  -->

                    <!-- start of email input -->
                    <div class="admin-update-input">
                        <p>Email</p>
                        <input class="input-validate" type="text" placeholder="e.g. name@gmail.com" name="email" value="<?php echo $adminList[0]['email']; ?>" required></input>
                        <p class="warning">*Please enter the email correctly.*</p>
                    </div>
                    <!-- end of email input  -->
                </div>

                <svg width="2" height="500" viewBox="0 0 2 1182" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="1" y1="4.37114e-08" x2="0.999948" y2="1182" stroke="#B8B8B8" stroke-width="2" />
                </svg>

                <div>
                    <!-- start of country code input -->
                    <div class="admin-update-input">
                        <p>Country Code</p>
                        <select name="countryCode">
                            <option value="<?php echo $adminList[0]['country_code']; ?>"><?php echo $adminList[0]['country_code'] ?></option>
                            <option value="1">+1 United State</option>
                            <option value="95">+95 Myanmar</option>
                            <option value="66">+66 Thailand</option>
                            <option value="65">+65 Singapore</option>
                            <option value="81">+81 Japan</option>
                            <option value="84">+84 Vietnam</option>
                        </select>
                    </div>
                    <!-- end of country code input  -->

                    <!-- start of phone input -->
                    <div class="admin-update-input">
                        <p>Phone Number</p>
                        <input class="input-validate" type="number" placeholder="e.g. 93250295" name="phone" value="<?php echo $adminList[0]['phone_number']; ?>" required></input>
                        <p class="warning">*Phone number must be 9 digits.*</p>

                    </div>
                    <!-- end of phone input  -->

                    <!-- start of address input -->
                    <div class="admin-update-input">
                        <p>Address</p>
                        <input class="input-validate" type="text" placeholder="e.g. St loa building 10." name="address" value="<?php echo $adminList[0]['address']; ?>" required></input>
                    </div>
                    <!-- end of address input  -->

                    <div class="submit-button">
                        <p class="final-warning"></p>
                        <div class="update-go-back-btn">
                            <a class="update-go-back" onclick="history.back();">Go Back</a>
                        </div>
                        <button class="admin-submit" id="updateBtn" type="submit">Update Now</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- end of admin update container -->

    </div>
    <!-- end of container -->
    <!-- javascript file  -->
    <script type="module" src="./resources/js/admin control.js?<?php echo $time ?>"></script>
</body>

</html>