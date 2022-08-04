    <!-- start of navigation bar -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <nav class="navbar is-transparent is-fixed-top p-4 ">
        <div class="navbar-brand">
            <a href="./index.php">
                <img width="100vw" src="./resources/img/header_footer/level up.svg" alt="">
            </a>

            <!-- start of mobile navigation -->
            <div class="navbar-burger" data-target="navbarExampleTransparentExample">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- end of mobile navigation -->
        </div>

        <!-- start of navigation link -->
        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start is-primary">
            </div>

            <div id="navMenu">
                <div class="navbar-end has-text-weight-medium">
                    <a id="lnk_home" class="navbar-item" href="./index.php">
                        Home
                    </a>
                    <a id="lnk_explore" class="navbar-item" href="./explore.php">
                        Explore
                    </a>
                    <a class="navbar-item" href="./InstructorListView.php">
                        Instructor
                    </a>
                    <a id="lnk_my_courses" class="navbar-item" href="./dashboard.php">
                        My Courses
                    </a>
                    <a class="navbar-item" href="">
                        <img src="./resources/img/header_footer/notification.svg" alt="">
                        <div class="badge is-hidden">
                            <p class="is-size-7">10</p>
                        </div>
                    </a>
                    <a class="navbar-item" href="./cart.php">
                        <img src="./resources/img/header_footer/cart.svg" alt="cart"></img>
                    </a>
                    <a class="navbar-item" href="">
                        <img src="./resources/img/header_footer/profile.svg" alt="profile"></img>
                    </a>
                    <a id="btn_register" class="button is-primary is-outlined has-text-weight-semibold" href="./signup.html">Register</a>
                    <a id="btn_logout" class="button is-primary is-outlined has-text-weight-semibold is-hidden" href="">Logout</a>
                </div>
            </div>
        </div>
        <!-- end of navigation link -->
    </nav>
    <!-- end of navigation bar -->