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
</head>

<body>
    <?php require_once('./header.php') ?>

    <!-- start of main -->
    <main>
        <!-- start of hero section  -->
        <section class="hero is-large">
            <div class="columns is-vcentered">
                <div class="column hero-body">
                    <p class="column is-size-1 is-11 has-text-weight-bold is-spaced">
                        Best Place to Level Up
                        Your <span class="hightlight">Knowledge</span>
                    </p>
                    <p class="column subtitle is-10 line-height">
                        We deliver the best contents to the students. Study at your home, get comfortable and improve your skills. Level up with us now.
                    </p>
                </div>
                <div class="column">
                    <img src="./resources/img/header_footer/hero image.svg" alt="hero image"></img>
                </div>
            </div>
        </section>
        <!-- end of hero section  -->

        <!-- start of message to students section -->
        <section class="hero is-medium">
            <div class="columns ">
                <div class="column hero-body message-background">
                    <h1 class="is-size-1 has-text-weight-bold has-text-white ml-5">
                        <span class="message-hightlight">
                            Discover
                            <img src="./resources/img/header_footer/discover hightlight.svg" alt="hightlightLine"></img>
                        </span>
                        TopicsTo Inspire Your Learning
                    </h1>
                </div>
                <div class="column message-background-image">
                    <!-- image is inserted through css as a background image. You can find it in the root css -->
                </div>
            </div>
        </section>
        <!-- end of message to students section -->

        <!-- start of trending video section -->
        <section class="hero is-medium">
            <div class="hero-body ml-5">

                <h1 class="is-size-1 has-text-weight-bold mb-5">Trending Courses</h1>

                <div class="columns overflow">

                    <!-- start course card  -->
                    <div class="card column is-3 mr-4 p-0">
                        <img src="./resources/img/header_footer/course image.png" alt="course image">

                        <!-- start of course status  -->
                        <div class="is-flex pb-2">
                            <!-- level status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/level.svg" alt="">
                                <div class="p-2">
                                    <p class="status-content">Level</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">Intermediate</p>
                                </div>
                            </div>

                            <!-- students status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/students.svg" alt="">
                                <div class="p-2">
                                    <p class="status-content">Students</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 Stud</p>
                                </div>
                            </div>

                            <!-- lectures status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/lecture.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Lectures</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 lect</p>
                                </div>
                            </div>
                        </div>
                        <!-- end of course status -->

                        <!-- start of course title -->
                        <div>
                            <a href="">
                                <p class="is-size-5 has-text-weight-bold p-4">Importanes of Wireframes: Learn
                                    to Make for Better Design
                                </p>
                            </a>
                        </div>
                        <!-- end of course title -->

                        <!-- start of instructor name and rating -->
                        <div class="is-flex is-justify-content-space-between pt-5 p-4">
                            <a class="has-text-weight-medium">By Daniel Walter</a>
                            <div class="is-flex">
                                <img class="pr-1" src="./resources/img/header_footer/Rating.svg" alt="">
                                <a class="has-text-weight-medium">4.5/5(20)</a>

                            </div>
                        </div>
                        <!-- end of instructor name and rating -->
                    </div>
                    <!-- end of course card -->


                    <!-- start course card  -->
                    <div class="card column is-3 mr-4 p-0">
                        <img src="./resources/img/header_footer/course image.png" alt="course image">

                        <!-- start of course status  -->
                        <div class="is-flex pb-2">
                            <!-- level status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/level.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Level</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">Intermediate</p>
                                </div>
                            </div>

                            <!-- students status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/students.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Students</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 Stud</p>
                                </div>
                            </div>

                            <!-- lectures status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/lecture.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Lectures</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 lect</p>
                                </div>
                            </div>
                        </div>
                        <!-- end of course status -->

                        <!-- start of course title -->
                        <div>
                            <a href="">
                                <p class="is-size-5 has-text-weight-bold p-4">Importanes of Wireframes: Learn
                                    to Make for Better Design
                                </p>
                            </a>
                        </div>
                        <!-- end of course title -->

                        <!-- start of instructor name and rating -->
                        <div class="is-flex is-justify-content-space-between pt-5 p-4">
                            <a class="has-text-weight-medium" style="color:#4F6494;">By Daniel Walter</a>
                            <div class="is-flex">
                                <img class="pr-1" src="./resources/img/header_footer/Rating.svg" alt="">
                                <a class="has-text-weight-medium" style="color:#4F6494;">4.5/5(20)</a>

                            </div>
                        </div>
                        <!-- end of instructor name and rating -->
                    </div>
                    <!-- end of course card -->



                    <!-- start course card  -->
                    <div class="card column is-3 mr-4 p-0">
                        <img src="./resources/img/header_footer/course image.png" alt="course image">

                        <!-- start of course status  -->
                        <div class="is-flex pb-2">
                            <!-- level status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/level.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Level</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">Intermediate</p>
                                </div>
                            </div>

                            <!-- students status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/students.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Students</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 Stud</p>
                                </div>
                            </div>

                            <!-- lectures status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/lecture.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Lectures</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 lect</p>
                                </div>
                            </div>
                        </div>
                        <!-- end of course status -->

                        <!-- start of course title -->
                        <div>
                            <a href="">
                                <p class="is-size-5 has-text-weight-bold p-4">Importanes of Wireframes: Learn
                                    to Make for Better Design
                                </p>
                            </a>
                        </div>
                        <!-- end of course title -->

                        <!-- start of instructor name and rating -->
                        <div class="is-flex is-justify-content-space-between pt-5 p-4">
                            <a class="has-text-weight-medium" style="color:#4F6494;">By Daniel Walter</a>
                            <div class="is-flex">
                                <img class="pr-1" src="./resources/img/header_footer/Rating.svg" alt="">
                                <a class="has-text-weight-medium" style="color:#4F6494;">4.5/5(20)</a>

                            </div>
                        </div>
                        <!-- end of instructor name and rating -->
                    </div>
                    <!-- end of course card -->


                    <!-- start course card  -->
                    <div class="card column is-3 mr-4 p-0">
                        <img src="./resources/img/header_footer/course image.png" alt="course image">

                        <!-- start of course status  -->
                        <div class="is-flex pb-2">
                            <!-- level status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/level.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Level</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">Intermediate</p>
                                </div>
                            </div>

                            <!-- students status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/students.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Students</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 Stud</p>
                                </div>
                            </div>

                            <!-- lectures status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/lecture.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Lectures</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 lect</p>
                                </div>
                            </div>
                        </div>
                        <!-- end of course status -->

                        <!-- start of course title -->
                        <div>
                            <a href="">
                                <p class="is-size-5 has-text-weight-bold p-4">Importanes of Wireframes: Learn
                                    to Make for Better Design
                                </p>
                            </a>
                        </div>
                        <!-- end of course title -->

                        <!-- start of instructor name and rating -->
                        <div class="is-flex is-justify-content-space-between pt-5 p-4">
                            <a class="has-text-weight-medium" style="color:#4F6494;">By Daniel Walter</a>
                            <div class="is-flex">
                                <img class="pr-1" src="./resources/img/header_footer/Rating.svg" alt="">
                                <a class="has-text-weight-medium" style="color:#4F6494;">4.5/5(20)</a>

                            </div>
                        </div>
                        <!-- end of instructor name and rating -->
                    </div>
                    <!-- end of course card -->


                    <!-- start course card  -->
                    <div class="card column is-3 mr-4 p-0">
                        <img src="./resources/img/header_footer/course image.png" alt="course image">

                        <!-- start of course status  -->
                        <div class="is-flex pb-2">
                            <!-- level status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/level.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Level</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">Intermediate</p>
                                </div>
                            </div>

                            <!-- students status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/students.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Students</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 Stud</p>
                                </div>
                            </div>

                            <!-- lectures status -->
                            <div class="is-flex m-auto">
                                <img width="24vw" src="./resources/img/header_footer/lecture.svg" alt="">
                                <div class="p-2">
                                    <p class="statusContent">Lectures</p>
                                    <p class="is-size-7 has-text-weight-medium has-text-primary">10 lect</p>
                                </div>
                            </div>
                        </div>
                        <!-- end of course status -->

                        <!-- start of course title -->
                        <div>
                            <a href="">
                                <p class="is-size-5 has-text-weight-bold p-4">Importanes of Wireframes: Learn
                                    to Make for Better Design
                                </p>
                            </a>
                        </div>
                        <!-- end of course title -->

                        <!-- start of instructor name and rating -->
                        <div class="is-flex is-justify-content-space-between pt-5 p-4">
                            <a class="has-text-weight-medium" style="color:#4F6494;">By Daniel Walter</a>
                            <div class="is-flex">
                                <img class="pr-1" src="./resources/img/header_footer/Rating.svg" alt="">
                                <a class="has-text-weight-medium" style="color:#4F6494;">4.5/5(20)</a>

                            </div>
                        </div>
                        <!-- end of instructor name and rating -->
                    </div>
                    <!-- end of course card -->

                </div>

            </div>
        </section>
        <!-- end of trending video section -->

        <!-- start of feature section -->
        <section class="hero is-large mt-6">
            <div class="columns is-vcentered has-background-primary">
                <div class="column hero-body ">
                    <p class="column is-size-1 is-11 has-text-weight-bold is-spaced has-text-white">
                        <span class="message-hightlight">
                            Special
                            <img src="./resources/img/header_footer/hightlight2.svg" alt="hightlightLine"></img>
                        </span>
                        Features to Polish Your Skills
                    </p>
                </div>

                <!-- Container of Right Side -->
                <div class="column">

                    <!--  Container of 4 features div -->
                    <div class="columns is-flex-wrap-wrap">

                        <!-- First feature card -->
                        <div class="column is-half has-text-white 
                                    feature-background-1 is-flex is-flex-direction-column 
                                    is-justify-space-between">
                            <img class="p-6" src="./resources/img/header_footer/feature1.svg" alt=""></img>

                            <!-- start of content  -->
                            <div class="has-text-centered">
                                <!-- title -->
                                <h1 class="title is-size-4 has-text-white">
                                    Comfort of Home
                                </h1>

                                <!-- subtitle -->
                                <p class="is-size-6 pb-4">
                                    Why exhaust yourself in commuting
                                    when you can learn at home
                                </p>
                            </div>
                            <!-- end of content -->


                        </div>
                        <!-- End of first feature card -->

                        <!-- Second feature card -->
                        <div class="column is-half
                                    feature-background-2 is-flex is-flex-direction-column 
                                    is-justify-content-space-between">
                            <img class="m-auto" src="./resources/img/header_footer/feature2.svg" alt=""></img>

                            <!-- start of content -->
                            <div class="has-text-centered">
                                <!-- title -->
                                <h1 class="title is-size-5">
                                    Quality Contents
                                </h1>

                                <!-- subtitle -->
                                <p class="is-size-6 pb-4">
                                    Quality contents and services to
                                    our amazing audiences
                                </p>
                            </div>
                            <!-- end of content -->

                        </div>
                        <!-- End of second feature card -->

                        <!-- Third feature card -->
                        <div class="column is-half
                                    feature-background-2 is-flex is-flex-direction-column 
                                    is-justify-content-space-between">
                            <img class="m-auto" src="./resources/img/header_footer/feature3.svg" alt=""></img>

                            <!-- start of content -->
                            <div class="has-text-centered">
                                <!-- title -->
                                <h1 class="title is-size-5">
                                    Learn From Anywhere
                                </h1>

                                <!-- subtitle -->
                                <p class="is-size-6 pb-3">
                                    Unlike traditional learning, you can study
                                    anytime, at your convience.
                                </p>
                            </div>
                            <!-- end of content -->

                        </div>
                        <!-- End of third feature card -->

                        <!-- Fourth feature card -->
                        <div class="column is-half has-text-white feature-background-1 is-flex is-flex-direction-column is-justify-space-between">
                            <img class="p-6" src="./resources/img/header_footer/feature4.svg" alt=""></img>

                            <div class="has-text-centered">
                                <!-- title -->
                                <h1 class="title is-size-5 has-text-white">
                                    Study Materials
                                </h1>

                                <!-- subtitle -->
                                <p class="is-size-6 pb-4">
                                    We also provide materials and resouces
                                    to help with your studies.
                                </p>
                            </div>


                        </div>
                        <!-- End of fourth feature card -->

                    </div>
                </div>

            </div>
        </section>
        <!-- end of feature section -->

        <!-- start of become instructor section -->
        <section class="hero is-medium mt-4">
            <div class="columns hero-body is-vcentered">
                <div class="column is-half ml-5">
                    <h1 class="is-size-1 has-text-weight-bold">
                        <span class="message-hightlight">
                            Interested
                            <img src="./resources/img/header_footer/hightlight2.svg" alt="hightlightLine"></img>
                        </span>
                        in teaching?
                    </h1>
                    <h1 class="is-size-1 has-text-weight-bold">Become an Instructor.</h1>
                </div>
                <div class="columns is-half">
                    <img src="./resources/img/header_footer/become instructor.svg" alt="instructor image"></img>

                </div>
            </div>
        </section>
        <!-- end of become instructor section -->

        <!-- start of register now section -->
        <section class="hero is-medium">
            <div class="columns secondaryColor is-vcentered">
                <div class="column hero-body register-now">

                </div>
                <div class="column">
                    <h1 class="is-size-1 has-text-weight-bold has-text-white">
                        Never Too Late To
                        Learn What You Love
                    </h1>
                    <div class="is-flex is-align-content-center">
                        <a href="./apply instructor.php" class="has-text-weight-medium is-flex is-underlined">
                            Register Now
                            <svg class="m-auto" width="2vw" height="2vh" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2L7 9.16279L2 16" stroke="#01226F" stroke-width="3" stroke-linecap="round" />
                            </svg>
                        </a>
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
    <script src="./resources/js/index.js"></script>
    <script src="./resources/js/home.js"></script>
</body>

</html>