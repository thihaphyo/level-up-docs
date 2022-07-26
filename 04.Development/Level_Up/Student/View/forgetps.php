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
</head>
<body >
    <div class="container is-fluid full-container">
        <div class="columns is-gapless is-desktop">
            <div class="column column-fill signin-left-section">
                <div class="column p-5">
                    <img width="100px" src="./resources/img/header_footer/level up.svg" alt="">
                </div>
                <div class="column mr-10 ml-10 mt-4">
                    <p id="p_title" class="is-size-2 has-text-weight-semibold m-auto">Sign In</p>
                    <div class="field mt-6">
                        <label class="label is-primay-label">Email</label>
                        <div class="control">
                          <input id="email" class="input text-box" type="email" placeholder="Eg.John123@gmail.com">
                        </div>
                    </div>
                    <div class="field mt-5">
                        <label class="label is-primay-label">Password</label>
                        <div class="control">
                          <input id="pass" class="input text-box" type="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="column is-4 is-offset-8 has-text-right is-size-7 sign-in">
                        <a class="" href="">Forgot password?</a>
                    </div>
                    <div class="column is-full">
                       <button id="btnSignInUp" class="button is-primary has-text-weight-semibold full-wd-btn mt-7" disabled>Sign In</button>
                    </div>
                    <div class="column is-full has-text-centered mt-5">
                        <label class="label">Continue with</label>
                    </div>
                    <div class="column is-full has-text-centered">
                        <button class="is-image-btn">
                            <img src="./resources/img/auth/google.png">
                        </button>
                        <button class="is-image-btn ml-5 mr-5">
                            <img src="./resources/img/auth/fb.png">
                        </button class="is-image-btn">
                        <button class="is-image-btn">
                            <img src="./resources/img/auth/twitter.png">
                        </button>
                    </div>
                    <div class="column is-full has-text-centered mt-5 has-text-black-ter">
                        <span id="sign_in_up_option_text">Not a member?&nbsp;&nbsp;</span><a id="btn_sigin_signup" class="is-underlined">Sign up now.</a>
                    </div>
                </div>
                
            </div>
            <div class="column column-fill is-hidden-mobile is-hidden-tablet-only sign-in-graphics">
                <img class="login_arc" src="./resources/img/auth/login_arc.png" alt="">
                <div class="column is-full has-text-centered">
                    <img src="./resources/img/auth/login_graphics.png" alt="">
               </div>
               <div class="column is-full has-text-centered mt-5 has-text-light-blue is-size-4 has-text-weight-bold">
                    To protect you from potienal threats.<br/>
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