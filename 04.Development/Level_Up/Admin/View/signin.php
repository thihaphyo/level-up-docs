<?php
session_start();
if (isset($_SESSION['access_token'])) {
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
    } else {
        echo '<script> window.location.replace("./index.php");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Level up - Sign In</title>
    <link rel="icon" type="image/x-icon" href="./resources/img/logo.png">
    <link rel="stylesheet" href="./resources/css/mystyles.css" />
    <link rel="stylesheet" href="./resources/css/auth/login.css">
</head>

<body>
    <div class="columns is-flex is-vcentered is-centered is-primary full-heigt">
        <div class="column  is-two-thirds-mobile is-one-third-tablet is-admin-primary rounded-corner ">
            <div class="has-text-centered mt-4 mb-6">
                <img src="./resources/img/logo.png" alt="" style="width: 8rem;">
            </div>

            <div class="ml-7 mr-7 mb-4">
                <div class="is-flex is-flex-direction-row">
                    <button class="switch is-admin-secondary"></button>
                    <button class="ml-2 switch is-gray"></button>
                </div>
                <div class="has-text-white is-size-7 mt-2 has-text-weight-semibold">
                    Login as admin
                </div>
            </div>
            <div class="field mt-6 ml-7 mr-7">
                <div class="control">
                    <input id="email" class="input text-box" type="email" placeholder="michaeljordan@gmail.com">
                </div>
            </div>
            <div class="field mt-6 ml-7 mr-7">
                <div class="control">
                    <input id="pass" class="input text-box" type="password" placeholder="XXXXXXXXXX">
                </div>
            </div>
            <div class="field mt-6 ml-7 mr-7">
                <button id="btnSignIn" class="button is-admin-secondary has-text-weight-semibold has-text-white full-wd-btn" disabled>LOGIN</button>
            </div>
            <div class="field mt-5 ml-7 mr-7 has-text-white is-size-7 has-text-weight-medium has-text-centered">
                Forget your password?
            </div>
            <div class="field mt-3 ml-7 mr-7 has-text-white is-size-6 has-text-weight-medium has-text-centered">
                <a class="is-underlined" style="color: #247BEB;">Get help Signed in.</a>
            </div>
            <div class="field mt-6 mb-5 ml-7 mr-7 has-text-white is-size-7 has-text-weight-medium has-text-centered">
                <a class="has-text-white">Terms of use. Privacy Policy</a>
            </div>

        </div>
    </div>

</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./resources/js/signin.js"></script>

</html>