<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level up - Sign In</title>
    <link rel="icon" type="image/x-icon" href="./resources/img/common/favicon.png">
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/auth.css">
    <link rel="stylesheet" href="forget.css">
</head>

<body>
    <div class="container is-fluid full-container">
        <div class="columns is-gapless is-desktop">
            <div class="column column-fill signin-left-section">
                <div class="column p-5">
                    <img width="100px" src="./resources/img/header_footer/level up.svg" alt="">
                </div>
                <div class="column mr-10 ml-10 mt-3">
                    <p id="p_title" class="is-size-2 has-text-weight-bold m-auto">forget password</p>
                    <div class="field mt-6">
                        <label class="label is-primay-label">
                            <p id="p_title" class="is-size-6 has-text-weight-semibold m-auto">Enter the email address
                                you used in registration and we will send you instructions to reset your password.</p>
                        </label>
                    </div>
                    <div class="field mt-5">
                        <label class="label is-primay-label">
                            <p id="p_title" class="is-size-6 has-text-weight-semibold m-auto">For security reasons, we
                                do NOT store your passwords, be assured that we will never send your password via email.
                            </p>
                        </label>
                    </div>
                    <form action="sendmail.php" method="POST">
                        <div class="field mt-6">
                            <label class="label is-primay-label">Email Address</label>
                            <div class="control">
                                <input id="email" name="email" class="input text-box" type="email" placeholder="Eg.John123@gmail.com">
                            </div>
                        </div>
                        <div class="column is-full">
                            <button  name="password_reset_link" class="   button is-primary is-focused is-size-6 has-text-weight-bold ">Send Email
                                link</button>
                        </div>
                    </form>
                </div>  
            </div>
            <div class="column column-fill is-hidden-mobile is-hidden-tablet-only sign-in-graphics">
                <img class="login_arc" src="./resources/img/auth/login_arc.png" alt="">
                <div class="column is-full has-text-centered">
                    <img src="./resources/img/auth/login_graphics.png" alt="">
                </div>
                <div class="column is-full has-text-centered mt-5 has-text-light-blue is-size-4 has-text-weight-bold">
                    To protect you from potienal threats.<br />
                    We take security seriously.
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="./resources/js/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./resources/js/auth/signin.js"></script>

</html>