    <!-- start of navigation bar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../View/resources/css/notification.css?<?php echo $time; ?>">
    <link rel="stylesheet" href="../View/resources/css/izToast.min.css">
    <script src="../View/resources/js/izToast.js"></script>

    <nav class="navbar is-transparent is-fixed-top p-4 ">
        <div class="navbar-brand">
            <a href="index.php">
                <img width="100vw" src="../View/resources/img/header_footer/level up.svg" alt="">
            </a>

            <!-- start of mobile burger -->
            <div class="mobile-nav-switch">
                <button class="navbar-item" id="noti-icon" onclick="toggleNoti()">
                    <img width="20vw" src="../View/resources/img/header_footer/notification.svg" alt="">
                    <div class="badge">
                        <?php require_once "../Controller/notificationCountController.php"; ?>
                        <p class="is-size-7" id="countNoti"><?php echo count($notiCount) ?></p>
                    </div>
                </button>
                <button id="nav-burg">
                    <i class="fa-solid fa-bars fa-lg" onclick="openMobile();"></i>
                </button>
            </div>
            <!-- end of mobile burger -->
            <!-- start of mobile navigation -->
            <!-- <div class="navbar-burger" data-target="navbarExampleTransparentExample" onclick="openMobile()">
                <span></span>
                <span></span>
                <span></span>
            </div> -->
            <!-- end of mobile navigation -->

        </div>

        <!-- start of navigation link -->
        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start is-primary">
            </div>

            <div id="navMenu">
                <div class="navbar-end has-text-weight-medium">
                    <a class="navbar-item active" href="./index.php">
                        Home
                    </a>
                    <a id="lnk_explore" class="navbar-item" href="./explore.php">
                        Explore
                    </a>
                    <a id="lnk_ins" class="navbar-item" href="./InstructorListView.php">
                        Instructor
                    </a>
                    <a id="lnk_my_courses" class="navbar-item" href="./dashboard.php">
                        My Courses
                    </a>

                    <button class="navbar-item" id="noti-icon" onclick="toggleNoti()">
                        <img src="../View/resources/img/header_footer/notification.svg" alt="">
                        <div class="badge">
                            <?php require_once "../Controller/notificationCountController.php"; ?>
                            <p class="is-size-7" id="countNoti"><?php echo count($notiCount) ?></p>
                        </div>
                    </button>

                    <a id="lnk_cart" class="navbar-item" href="./cart.php">
                        <img src="../View/resources/img/header_footer/cart.svg" alt="cart"></img>
                    </a>
                    <a id="lnk_profile" class="navbar-item" href="./dashboard.php?screen_mode=profile">
                        <img src="../View/resources/img/header_footer/profile.svg" alt="profile"></img>
                    </a>

                    <div class="login-btn">
                        <a id="btn_register" class="button is-primary is-outlined has-text-weight-semibold" href="./signup.html">Register</a>
                        <a id="btn_logout" class="button is-primary is-outlined has-text-weight-semibold is-hidden" href="">Logout</a>
                    </div>

                </div>
            </div>

        </div>
        <!-- end of navigation link -->


        <!-- start of mobile nav -->
        <div class="mobile-nav is-hidden">
            <i class="fa-solid fa-xmark fa-xl close-button" onclick="closeMobile()"></i>
            <div>
                <a href="" class="mobile-active">Home</a>
                <a href="">Explore</a>
                <a href="">Instructor</a>
                <a href="">My Courses</a>
            </div>
            <div>
                <a href="">Cart</a>
                <a href="">Profile</a>
                <a href="">Register</a>
                <a href="">Logout</a>
            </div>
        </div>
        <!-- end of mobile nav -->

    </nav>
    <!-- end of navigation bar -->