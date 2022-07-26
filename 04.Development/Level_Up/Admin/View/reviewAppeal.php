<?php
session_start();
if (isset($_SESSION['access_token'])) {
    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo '<script> window.location.replace("./signin.php");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./resources/css/index.css">
    <link rel="stylesheet" href="./resources/css/mystyles.css" />
    <link rel="stylesheet" href="./resources/css/auth/reviewAppeal.css">

</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <!-- start of container -->
    <div class="container mt-2 ml-0 pl-0">
        <div class="column">
            <div class="is-size-5 has-text-weight-bold is-text-black">
                Review Appeal
            </div>
            <div class="field mt-6">
                <label class="label is-primay-label has-text-weight-medium">Instructor Name</label>
                <div class="control mt-3">
                    <input id="ins_name" class="input text-box" type="text" placeholder="John123" readonly>
                </div>
            </div>

            <div class="field mt-5">
                <label class="label is-primay-label has-text-weight-medium">Reason of Banning</label>
                <div class="control mt-3">
                    <textarea id="reason" class="textarea has-fixed-size text-area" placeholder="Banned reason" readonly></textarea>
                  </div>
            </div>

            <div class="field mt-5">
                <label class="label is-primay-label has-text-weight-medium">Instructor Appeal</label>
                <div class="control mt-3">
                    <textarea id="solution" class="textarea has-fixed-size text-area" placeholder="Please input reason" readonly></textarea>
                  </div>
            </div>

            <div class="column is-3 is-offset-9 has-text-right">
                <button id="btnUnBann" class="full-wd-btn is-admin-primary has-text-white has-text-weight-semibold is-size-6">Unbann</button>
            </div>
            
        </div>
    </div>
    <!-- end of container -->
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./resources/js/reviewappleal.js"></script>
</html>