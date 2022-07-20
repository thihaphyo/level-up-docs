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
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <div class="text logo-text">
                    <span class="name">Level Up</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">

                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <span class="text nav-text">Instructor List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">

                            <span class="text nav-text">Course List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">

                            <span class="text nav-text">Admin List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">

                            <span class="text nav-text">Order List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">

                            <span class="text nav-text">Appeal List</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <span class="text nav-text">Settings</span>
                    </li>
                    <li class="nav-link">
                        <a href="#">

                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>



                </ul>
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">Dashboard</div>
    </section>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })
    </script>
</body>

</html>