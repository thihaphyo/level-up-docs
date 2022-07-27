<?php
$time = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Level Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="./resources/css/index.css" />
    <link rel="stylesheet" href="./resources/css/mystyles.css" />
</head>

<body>
    <?php require_once('./sidebar.php') ?>

    <!-- start of container -->
    <div class="background-image">
        <img style="width:100%; height:200px; object-fit: cover;" src="./resources/img/cover_1.jpg" alt="">
    </div>
    <div class="container ml-0 pl-0">
        <!-- start of admin update container -->
        <div class="mt-6">
            <div class="columns mt-4 pt-3 pb-0">
                <div class="my-profile-image">
                    <img id="profile_img"  alt="" />
                </div>
                <div class="column my-profile-info pb-0">
                    <div class="my-profile-name-n-edit pt-3 pl-1 pb-0">
                        <div class="mt-0">
                            <h2 id="lbl_name" class="has-text-weight-bold has-text-black is-size-5">
                                Michael Jordan
                            </h2>
                            <h3 id="lbl_position" class="has-text-weight-semibold has-text-black is-size-6 mt-1">
                                Web Designer, Data Engineer
                            </h3>
                        </div>
                        <a id="btn_edit">Edit</a>
                    </div>
                </div>
            </div>
            <div class="column pt-0">
                <h2 class="has-text-weight-medium has-text-black is-size-5">About</h2>
            </div>
            <div id="lbl_bio" class="column pt-0 pb-0 mb-0 has-text-black is-size-6 has-text-weight-medium">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu
                turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec
                fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus
                elit sed risus. Maecenas eget condimentum velit, sit amet feugiat
                lectus. Class aptent taciti sociosqu ad litora torquent per conubia
                nostra, per inceptos himenaeos.
            </div>
            <hr class="mb-0" style="background-color: #D9D9D9;">
            <div class="column p-0 mt-3">
                <div class="is-flex is-flex-direction-row">
                    <div id="exp_container" class="column is-half">
                        <div class="column m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                            Experience
                        </div>
                        <!-- <div class="column m-0 p-0">
                            <div class="is-flex is-flex-direction-row mt-5">
                                <div class="column is-1 m-0 p-0">
                                    <img src="./resources/img/info_badge.png" style="width: 37px;">
                                </div>
                                <div class="column m-0 p-0 ml-1">
                                    <div class="column m-0 p-0 has-text-black has-text-weight-semibold ">
                                        Web Designer at Meta
                                    </div>
                                    <div class="column m-0 p-0 has-text-black has-text-weight-semibold is-size-7">
                                        Full-time
                                    </div>
                                    <div class="column m-0 p-0 has-text-black has-text-weight-light is-size-7">
                                        May 2016 - present (6 years)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column m-0 p-0">
                            <div class="is-flex is-flex-direction-row mt-5">
                                <div class="column is-1 m-0 p-0">
                                    <img src="./resources/img/info_badge.png" style="width: 37px;">
                                </div>
                                <div class="column m-0 p-0 ml-1">
                                    <div class="column m-0 p-0 has-text-black has-text-weight-semibold ">
                                        Web Designer at Meta
                                    </div>
                                    <div class="column m-0 p-0 has-text-black has-text-weight-semibold is-size-7">
                                        Full-time
                                    </div>
                                    <div class="column m-0 p-0 has-text-black has-text-weight-light is-size-7">
                                        May 2016 - present (6 years)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column m-0 p-0">
                            <div class="is-flex is-flex-direction-row mt-5">
                                <div class="column is-1 m-0 p-0">
                                    <img src="./resources/img/info_badge.png" style="width: 37px;">
                                </div>
                                <div class="column m-0 p-0 ml-1">
                                    <div class="column m-0 p-0 has-text-black has-text-weight-semibold ">
                                        Web Designer at Meta
                                    </div>
                                    <div class="column m-0 p-0 has-text-black has-text-weight-semibold is-size-7">
                                        Full-time
                                    </div>
                                    <div class="column m-0 p-0 has-text-black has-text-weight-light is-size-7">
                                        May 2016 - present (6 years)
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <div class="column is-half">
                        <div class="column m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                            Contact
                        </div>
                        <div class="column m-0 p-0 mt-5">
                            <div class="is-flex is-flex-direction-row mt-5">
                                <div class="column is-2 m-0 p-0 has-text-black has-text-weight-semibold ">
                                    Email
                                </div>
                                <div class="column m-0 p-0 ml-1">
                                    <div id="email" class="column m-0 p-0 has-text-black has-text-weight-medium ">
                                        - michaeljordan@gmail.com
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column m-0 p-0 mt-5">
                            <div class="is-flex is-flex-direction-row mt-5">
                                <div class="column is-2 m-0 p-0 has-text-black has-text-weight-semibold ">
                                    Phone
                                </div>
                                <div class="column m-0 p-0 ml-1">
                                    <div id="phone" class="column m-0 p-0 has-text-black has-text-weight-medium ">
                                        - +459683021
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column m-0 p-0 mt-6">
                            <div class="is-flex is-flex-direction-column mt-5">
                                <div class="column is-2 m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                                    Address
                                </div>
                                <div class="column m-0 p-0 ml-1">
                                    <div id="address" class="column m-0 p-0 has-text-black has-text-weight-semibold mt-4 is-size-6">
                                        No-32. Washidan Road, California
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of admin update container -->
    </div>
    <!-- end of container -->
    <!-- javascript file  -->
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./resources/js/instructorprofile.js"></script>

</html>