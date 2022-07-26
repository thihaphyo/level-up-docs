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
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="forget.css">
</head>

<body>
    <div class="container is-fluid full-container">
        <div>
            <div class="columns is-gapless is-desktop">
                <div class="r column column-fill signin-left-section">
                    <div class="column p-5">
                        <img width="100px" src="contact image/Header.png" alt="Header">
                    </div>
                    <div class="column mr-10 ml-10 mt-4">
                        <p id="p_title" class="is-size-2 has-text-weight-semibold m-auto">Forget Password</p>
                        <div class="field mt-6">
                            <p class="is-size-6 has-text-weight-semibold m-auto"> Enter the email address you used in
                                registration and we will send you instructions to reset your password.</p>
                        </div>
                        <br>
                        <div class="field mt-5">
                            <div class="control">
                                <p class="is-size-6 has-text-weight-semibold m-auto"> For security reasons, we do NOT store
                                    your passwords, be assured that we will never send your password via email.</p>
                            </div>
                        </div>
                        <div class="field mt-5">
                            <label class="label is-primay-label">Email</label>
                            <div class="control">
                                <input id="email" class="input text-box" type="text" placeholder="Eg.John123@gmail.com">
                            </div>
                        </div>
                        <div>
                            <button class="button is-primary has-text-weight-semibold full-wd-btn mt-7">
                                Send Email Link</button>
                        </div>
                    </div>
                </div>
                <div class="column column-fill is-hidden-mobile is-hidden-tablet-only sign-in-graphics">
                    <div class="column is-full has-text-centered">
                        <img src="contact image/Group 33915.png" alt="">
                    </div>
                    <div class="column is-full has-text-centered mt-5 has-text-light-blue is-size-4 has-text-weight-bold">
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>