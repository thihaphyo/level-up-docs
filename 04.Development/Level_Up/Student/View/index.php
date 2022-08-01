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
    <link rel="stylesheet" href="./resources/css/mystyles.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/root.css?<?php echo $time ?> ">


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->


</head>

<body>
    <?php require_once('./header.php') ?>

    <!-- start of main -->
    <main>
        <!-- start of hero section  -->
        <section class="hero">
            <div class="columns is-vcentered">
                <div class="column hero-body" data-aos="fade-right" data-aos-delay="200">
                    <p class="column has-text-weight-bold section-title">
                        Best Place to Level Up
                        Your <span class="hightlight">Knowledge</span>
                    </p>
                    <p class="column line-height section-subtitle">
                        We deliver the best contents to the students. Study at your home, get comfortable and improve your skills. Level up with us now.
                    </p>
                    <div class="column">
                        <a href="" class="button is-secondary has-text-weight-semibold">Explore Now</a>
                    </div>
                </div>
                <div class="column hero-image" data-aos="fade-left" data-aos-delay="200" id="hero-svg">
                    <?php echo file_get_contents('./resources/img/header_footer/hero image.svg') ?>
                    <!-- <img src="./resources/img/header_footer/hero image.svg" alt="hero image"></img> -->

                </div>
            </div>
        </section>
        <!-- end of hero section  -->

        <!-- start of message to students section -->
        <section class="hero is-medium message">
            <div class="message-background" data-aos="fade-left" data-aos-delay="200">
                <h1 class="has-text-weight-bold has-text-white section-title">
                    <span class="message-hightlight">
                        Discover
                        <svg class="path" width="129" height="34" viewBox="0 0 129 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="113" cy="16" r="16" fill="#6E81AD" />
                            <path d="M3 31C25.1505 24.1798 76.7613 11.9035 106 17.3597" stroke="#6E81AD" stroke-width="6" stroke-linecap="round" />
                        </svg>
                        <!-- <img src="./resources/img/header_footer/discover hightlight.svg" alt="hightlightLine"></img> -->
                    </span>
                    Topics To Inspire Your Learning
                </h1>
                <img class="message-background-image" src="./resources/img/header_footer/discover image.png" alt="discover image"></img>
            </div>
        </section>
        <!-- end of message to students section -->

        <!-- start of trending video section -->
        <section class="hero is-medium" data-aos="fade-up">
            <div class="hero-body ml-5">
                <h1 class="has-text-weight-bold mb-5 section-title">Trending Courses</h1>
                <div class="courses">
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                    <a href="./courseinfo.php">
                        <div class="cards">
                            <img src="./resources/img/explore/image.png" alt="" />
                            <div class="details">
                                <div class="detail">
                                    <ion-icon name="bar-chart-outline"></ion-icon>
                                    <div class="content">
                                        <span>Level</span>
                                        <h4>Intermediate</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="alarm-outline"></ion-icon>
                                    <div class="content">
                                        <span>Hours</span>
                                        <h4>6 Hours</h4>
                                    </div>
                                </div>
                                <div class="detail">
                                    <ion-icon name="clipboard-outline"></ion-icon>
                                    <div class="content">
                                        <span>Lectures</span>
                                        <h4>10 Lectures</h4>
                                    </div>
                                </div>
                            </div>
                            <h2>Importanes of Wireframes: Learn
                                to Make for Better Design</h2>
                            <div class="rating">
                                <p>By Daniel Walter</p>
                                <p>
                                    <ion-icon name="star" class="star"></ion-icon><span>4.6</span>/5(<span>5</span>)
                                </p>
                            </div>
                            <div class="price">
                                <p><span>20,000</span> Ks</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- end of trending video section -->

        <!-- start of special features  -->
        <section class="features">
            <div class="features-container">
                <div class="features-title">
                    <h1 class="has-text-weight-bold is-spaced has-text-white section-title">
                        <span class="message-hightlight">
                            Special
                            <svg class="path" width="129" height="34" viewBox="0 0 129 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="113" cy="16" r="16" fill="#F3B33E" />
                                <path d="M3 31C25.1505 24.1798 76.7613 11.9035 106 17.3597" stroke="#F3B33E" stroke-width="6" stroke-linecap="round" />
                            </svg>
                        </span>
                        Features to Polish Your Skills
                        </p>
                </div>
                <div class="features-chunk">
                    <div>
                        <!-- First feature card -->
                        <div class="features-card has-text-white feature-background-1">
                            <div class="features-img">
                                <img width="60%" class="" src="./resources/img/header_footer/feature1.svg" alt=""></img>

                            </div>

                            <!-- start of content  -->
                            <div class="">
                                <!-- title -->
                                <h1 class="has-text-white">
                                    Comfort of Home
                                </h1>

                                <!-- subtitle -->
                                <p class="">
                                    Why exhaust yourself in commuting
                                    when you can learn at home
                                </p>
                            </div>
                            <!-- end of content -->
                        </div>
                        <!-- End of first feature card -->

                        <!-- Second feature card -->
                        <div class="features-card has-text-white feature-background-2">
                            <div class="">
                                <img width="60%" src="./resources/img/header_footer/feature3.svg" alt=""></img>

                            </div>

                            <!-- start of content -->
                            <div class="has-text-centered">
                                <!-- title -->
                                <h1 class="has-text-primary">
                                    Quality Contents
                                </h1>

                                <!-- subtitle -->
                                <p class="has-text-primary pb-3">
                                    Amazing contents and services to our beloved audiences
                                </p>
                            </div>
                            <!-- end of content -->
                        </div>
                        <!-- End of Second feature card -->

                    </div>

                    <div>
                        <!-- First feature card -->
                        <div class="features-card has-text-white feature-background-2">
                            <div>
                                <img width="60%" src="./resources/img/header_footer/feature2.svg" alt=""></img>

                            </div>

                            <!-- start of content -->
                            <div class="has-text-centered">
                                <!-- title -->
                                <h1 class="has-text-primary">
                                    Learn From Anywhere
                                </h1>

                                <!-- subtitle -->
                                <p class="has-text-primary pb-3">
                                    Unlike traditional learning, you can study
                                    anytime, at your convience.
                                </p>
                            </div>
                            <!-- end of content -->
                        </div>
                        <!-- End of first feature card -->

                        <!-- Second feature card -->
                        <div class="features-card has-text-white feature-background-1">
                            <div>
                                <img width="60%" src="./resources/img/header_footer/feature4.svg" alt=""></img>
                            </div>

                            <!-- start of content -->
                            <div class="has-text-centered">
                                <!-- title -->
                                <h1 class="has-text-white">
                                    Study Materials
                                </h1>

                                <!-- subtitle -->
                                <p class="pb-4">
                                    We also provide materials and resouces
                                    to help with your studies.
                                </p>
                            </div>
                            <!-- end of content -->
                        </div>
                        <!-- End of Second feature card -->

                    </div>

                </div>
            </div>
        </section>
        <!-- end of special features  -->


        <!-- start of become instructor section -->
        <section class="hero is-medium mt-4 instructor">
            <div class="columns hero-body is-vcentered">

                <div class="column is-half" data-aos="fade-right" data-aos-delay="200">
                    <h1 class="has-text-weight-bold section-title">
                        <span class="message-hightlight">
                            Interested
                            <svg class="path" width="129" height="34" viewBox="0 0 129 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="113" cy="16" r="16" fill="#F3B33E" />
                                <path d="M3 31C25.1505 24.1798 76.7613 11.9035 106 17.3597" stroke="#F3B33E" stroke-width="6" stroke-linecap="round" />
                            </svg>
                        </span>
                        in teaching?
                    </h1>
                    <h1 class="has-text-weight-bold section-title">Become an Instructor.</h1>
                </div>

                <div class="columns is-half instructor-img m-auto" data-aos="fade-left" data-aos-delay="200">
                    <?php echo file_get_contents('./resources/img/header_footer/become instructor.svg') ?>

                    <!-- <img src="./resources/img/header_footer/become instructor.svg" alt="instructor image"></img> -->

                </div>
            </div>
        </section>
        <!-- end of become instructor section -->

        <!-- start of register now section -->
        <section class="hero is-medium" data-aos="fade-right" data-aos-delay="200">
            <div class="columns secondaryColor is-vcentered">
                <div class="column hero-body register-now">
                </div>
                <div class="column never-late-to-learn">
                    <h1 class="has-text-weight-bold has-text-white section-title" data-aos="fade-right" data-aos-delay="500">
                        Never Too Late To
                        Learn What You Love
                    </h1>
                    <div class=" is-align-content-center">
                        <a href="./apply instructor.php" class="has-text-weight-medium is-underlined" data-aos="fade-left" data-aos-delay="500">
                            Register Now
                        </a>
                        <svg class="" width="2vw" height="2vh" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2L7 9.16279L2 16" stroke="#01226F" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of register now section -->

    </main>
    <!-- end of main -->

    <?php require_once('./footer.php') ?>
    <!-- javascript file -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./resources/js/index.js?<?php echo $time ?>"></script>
    <script src="./resources/js/home.js"></script>
</body>

</html>