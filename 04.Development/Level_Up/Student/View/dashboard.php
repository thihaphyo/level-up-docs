<?php
$time = time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="./resources/img/common/favicon.png">
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="./resources/css/auth.css">
    <link rel="stylesheet" href="./resources/css/dashboard.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
<div id="loading_container" class="loader-wrapper columns is-gapless is-flex is-align-items-center is-justify-content-center" style="position: absolute; top:0; z-index: 999;width: 100%; margin:0;padding: 0; height:220%; background-color: rgba(0, 0, 0, 0.286);">
        <div class="card bodymovinanim" style="width: 7rem; border-radius: 0.6rem; position:absolute; top:20%;"></div>
 </div>
    <?php 
        require_once('./header.php');
        if ($_GET["screen_mode"] == 'profile') {
           echo "<script>
           const collection = document.getElementsByClassName('navbar-item');
           for (let i = 0; i < collection.length; i++) {
             collection[i].setAttribute('class', 'navbar-item');
           }
           </script>";
        } else {
           echo "<script>
           const collection = document.getElementsByClassName('navbar-item');
           for (let i = 0; i < collection.length; i++) {
             collection[i].setAttribute('class', 'navbar-item');
           }
           document.getElementById('lnk_my_courses').setAttribute('class', 'navbar-item active');
           </script>";
        }
    ?>
    <main>
        <!-- start of container  -->
        <div class="container">
            <div>
                <div class="columns ml-5-mobile">
                    <div class="column is-1 no-padding">
                        <img id="profile_img" class="user-profile">
                    </div>
                    <div class="column ml-1">
                        <div id="userName" class="column is-size-5 has-text-weight-semibold no-padding">
                            Loading...
                        </div>
                        <div id="email" class="column is-size-7 no-padding mt-1 has-text-primary-light">
                            Loading...
                        </div>
                        <div class="column is-size-7 no-padding mt-1 has-text-primary-light">

                            <a class="button is-primary is-outlined has-text-weight-semibold is-size-7 mt-2" href="./studentProfile.html">Edit profile</a>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="tabs ml-10-responsive no-margin-bot">
                    <ul>
                        <li id="tab_learning" class="is-active"><a>Learning</a></li>
                        <li id="tab_my_courses"><a>Wishlist</a></li>
                    </ul>
                </div>
                <div id="item_container" class="ml-8-responsive column is-full">
                    <!-- <div class="row is-flex">
                        <div class="column is-one-third">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-4by1">
                                        <img src="./resources/img/header_footer/course image.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="details is-flex is-justify-content-space-between">
                                        <div class="detail is-size-7">
                                            <ion-icon name="bar-chart-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Level</span>
                                                <h5 class="has-text-primary-light">Intermediate</h5>
                                            </div>
                                        </div>
                                        <div class="detail ml-4 mr-4 is-size-7">
                                            <ion-icon name="alarm-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Hours</span>
                                                <h5 class="has-text-primary-light">6 Hours</h5>
                                            </div>
                                        </div>
                                        <div class="detail is-size-7">
                                            <ion-icon name="clipboard-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Lectures</span>
                                                <h5 class="has-text-primary-light">10 Lectures</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content has-text-primary has-text-weight-bold no-margin-bot">
                                        Importanes of Wireframes: Learn to Make for Better Design
                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <progress class="progress is-yellow short-progress" value="10" max="100">90%</progress>

                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <div class="is-flex is-justify-content-space-between">
                                            <div class="has-text-primary-light mt-2 is-size-7">
                                                By Daniel Walter
                                            </div>
                                            <div class="has-text-primary mt-2 is-size-7">
                                                <img src="./resources/img/header_footer/Rating.svg" alt="" style="width: 10px; height:10px;" /> 4.5/5
                                            </div>
                                        </div>

                                    </div>
                                    <div class="price">
                                        <p><span>20,000</span> Ks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-one-third">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-4by1">
                                        <img src="./resources/img/header_footer/course image.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="details is-flex is-justify-content-space-between">
                                        <div class="detail is-size-7">
                                            <ion-icon name="bar-chart-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Level</span>
                                                <h5 class="has-text-primary-light">Intermediate</h5>
                                            </div>
                                        </div>
                                        <div class="detail ml-4 mr-4 is-size-7">
                                            <ion-icon name="alarm-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Hours</span>
                                                <h5 class="has-text-primary-light">6 Hours</h5>
                                            </div>
                                        </div>
                                        <div class="detail is-size-7">
                                            <ion-icon name="clipboard-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Lectures</span>
                                                <h5 class="has-text-primary-light">10 Lectures</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content has-text-primary has-text-weight-bold no-margin-bot">
                                        Importanes of Wireframes: Learn to Make for Better Design
                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <progress class="progress is-yellow short-progress" value="10" max="100">90%</progress>

                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <div class="is-flex is-justify-content-space-between">
                                            <div class="has-text-primary-light mt-2 is-size-7">
                                                By Daniel Walter
                                            </div>
                                            <div class="has-text-primary mt-2 is-size-7">
                                                <img src="./resources/img/header_footer/Rating.svg" alt="" style="width: 10px; height:10px;" /> 4.5/5
                                            </div>
                                        </div>

                                    </div>
                                    <div class="price">
                                        <p><span>20,000</span> Ks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row is-flex">
                        <div class="column is-one-third">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-4by1">
                                        <img src="./resources/img/header_footer/course image.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="details is-flex is-justify-content-space-between">
                                        <div class="detail is-size-7">
                                            <ion-icon name="bar-chart-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Level</span>
                                                <h5 class="has-text-primary-light">Intermediate</h5>
                                            </div>
                                        </div>
                                        <div class="detail ml-4 mr-4 is-size-7">
                                            <ion-icon name="alarm-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Hours</span>
                                                <h5 class="has-text-primary-light">6 Hours</h5>
                                            </div>
                                        </div>
                                        <div class="detail is-size-7">
                                            <ion-icon name="clipboard-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Lectures</span>
                                                <h5 class="has-text-primary-light">10 Lectures</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content has-text-primary has-text-weight-bold no-margin-bot">
                                        Importanes of Wireframes: Learn to Make for Better Design
                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <progress class="progress is-yellow short-progress" value="10" max="100">90%</progress>

                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <div class="is-flex is-justify-content-space-between">
                                            <div class="has-text-primary-light mt-2 is-size-7">
                                                By Daniel Walter
                                            </div>
                                            <div class="has-text-primary mt-2 is-size-7">
                                                <img src="./resources/img/header_footer/Rating.svg" alt="" style="width: 10px; height:10px;" /> 4.5/5
                                            </div>
                                        </div>

                                    </div>
                                    <div class="price">
                                        <p><span>20,000</span> Ks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-one-third">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-4by1">
                                        <img src="./resources/img/header_footer/course image.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="details is-flex is-justify-content-space-between">
                                        <div class="detail is-size-7">
                                            <ion-icon name="bar-chart-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Level</span>
                                                <h5 class="has-text-primary-light">Intermediate</h5>
                                            </div>
                                        </div>
                                        <div class="detail ml-4 mr-4 is-size-7">
                                            <ion-icon name="alarm-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Hours</span>
                                                <h5 class="has-text-primary-light">6 Hours</h5>
                                            </div>
                                        </div>
                                        <div class="detail is-size-7">
                                            <ion-icon name="clipboard-outline"></ion-icon>
                                            <div class="content has-text-primary-light">
                                                <span>Lectures</span>
                                                <h5 class="has-text-primary-light">10 Lectures</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content has-text-primary has-text-weight-bold no-margin-bot">
                                        Importanes of Wireframes: Learn to Make for Better Design
                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <progress class="progress is-yellow short-progress" value="10" max="100">90%</progress>

                                    </div>

                                    <div class="content no-margin-bot mt-2">
                                        <div class="is-flex is-justify-content-space-between">
                                            <div class="has-text-primary-light mt-2 is-size-7">
                                                By Daniel Walter
                                            </div>
                                            <div class="has-text-primary mt-2 is-size-7">
                                                <img src="./resources/img/header_footer/Rating.svg" alt="" style="width: 10px; height:10px;" /> 4.5/5
                                            </div>
                                        </div>

                                    </div>
                                    <div class="price">
                                        <p><span>20,000</span> Ks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="is-flex is-justify-content-center">
                    <div id="pagination_container" class="page mr-10 mb-5" style="width: 17rem;">
                        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                            <a class="pagination-previous"> <img style="width: 10px; " src="./resources/img/header_footer/left_arrow.png"> </a>
                            <a class="pagination-next"><img style="width: 10px; " src="./resources/img/header_footer/right_arrow.png"></a>
                            <ul class="pagination-list" id="paging_list">
                                <!-- <li><a class="pagination-link is-current" aria-label="Goto page 1" aria-current="page">1</a></li>
                                <li><a class="pagination-link" aria-label="Goto page 2">2</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>
                                <li><a class="pagination-link" aria-label="Goto page 45">45</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <!-- end of container -->
    </main>



    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./resources/js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.3/lottie_svg.min.js" type="text/javascript"></script>
    <script src="./resources/js/dashboard/dashboard.js"></script>
</body>

</html>