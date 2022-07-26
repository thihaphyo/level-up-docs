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
    <!-- start of container -->
    <div class="container">
        <h1 class="text">Create Admin</h1>
        <!-- start of admin update container -->
        <div class="admin-update-container">

            <form class="admin-form" method="post" action="../Controller/adminController/adminController.php" enctype="multipart/form-data" onsubmit="event.preventDefault();">
                <!-- <input type="file"> -->

                <!-- start of profile image -->
                <div class="admin-update">
                    <p>Profile Picture</p>
                    <label class="profile" for="image-upload">
                        <div class="profile-image">
                            <h5 id="image-name">Click To Upload</h5>
                        </div>
                        <input id="image-upload" type="file" name="profile"></input>
                    </label>
                    <!-- <div class="profile-image admin-insert-image image-upload">
                    </div> -->
                </div>
                <!-- end of profile input -->

                <!-- start of name input -->
                <div class="admin-update-input">
                    <p>Profile Name</p>
                    <input class="input-validate" type="text" placeholder="e.g. michale3424" name="name" required></input>
                    <p class="warning">*Username should be at least 4 length *</p>

                </div>
                <!-- end of name input  -->

                <!-- start of email input -->
                <div class="admin-update-input">
                    <p>Email</p>
                    <input class="input-validate" type="text" placeholder="e.g. name@gmail.com" name="email" required></input>
                    <p class="warning">*Please enter the email correctly.*</p>
                </div>
                <!-- end of email input  -->

                <!-- start of country code input -->
                <div class="admin-update-input">
                    <p>Country Code</p>
                    <select name="countryCode">
                        <option value="+1">+1 United State</option>
                        <option value="+95">+95 Myanmar</option>
                        <option value="+66">+66 Thailand</option>
                        <option value="+65">+65 Singapore</option>
                        <option value="+81">+81 Japan</option>
                        <option value="+84">+84 Vietnam</option>
                    </select>
                </div>
                <!-- end of country code input  -->

                <!-- start of phone input -->
                <div class="admin-update-input">
                    <p>Phone Number</p>
                    <input class="input-validate" type="number" placeholder="e.g. 93250295" name="phone" required></input>
                    <p class="warning">*Phone number must be 9 digits.*</p>

                </div>
                <!-- end of phone input  -->



                <!-- start of address input -->
                <div class="admin-update-input">
                    <p>Address</p>
                    <input class="input-validate" type="text" placeholder="e.g. St loa building 10." name="address" required></input>
                </div>
                <!-- end of address input  -->

                <div class="submit-button">
                    <p class="final-warning"></p>
                    <button class="admin-submit" id="insertBtn" type="submit">Insert Now</button>
                </div>
            </form>

        </div>
        <!-- end of admin update container -->

    </div>
    <!-- end of container -->

    <!-- javascript file  -->
    <script src="./resources/js/admin validation.js?<?php echo $time ?>"></script>
</body>

</html>