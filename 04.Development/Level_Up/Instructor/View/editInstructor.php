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
    <link rel="stylesheet" href="./resources/css/editIns.css">
</head>

<body>
    <?php require_once('./sidebar.php') ?>

    <!-- start of container -->
    <div class="container ml-0 pl-0 pt-5 has-text-black has-text-weight-semibold">
        <!-- start of admin update container -->
        <div class="column mb-0 pb-0 mt-3">
            <div class="is-flex is-flex-direction-row">
                <div class="column is-6 pl-6">
                    <div class="column mb-3 pb-0">
                        Profile Picture
                    </div>
                    <div class="column is-11 p-0 m-0 has-text-centered">
                        <img id="profile_img" style="width: 150px;height: 150px;object-fit: cover;" alt="" srcset="">
                    </div>
                    <div class="column is-11 p-0 has-text-right">
                        <a id="btnDelete" class="is-underlined has-text-black is-size-6">Delete</a>
                        <a id="btnUpload" class="is-underlined ml-2 has-text-black is-size-6">Upload</a>
                        <input id="file-input" type="file" name="name" style="display: none;" />
                    </div>
                    <hr class="mb-0 mr-6" style="background-color: #00000060;">
                    <div class="column has-text-black is-size-6 mt-5 pl-0">
                        Bio
                    </div>
                    <div class="field mr-6 mt-2">
                        <div class="control">
                            <textarea id="bio" class="textarea has-fixed-size text-area" placeholder="Banned reason" rows="8"></textarea>
                        </div>
                    </div>
                </div>
                <div style="width: 2px;background-color:black;height: 85vh;">
                    <p style="visibility: hidden;">a</p>
                </div>
                <div class="column is-5 ml-6">
                    <div class="field">
                        <label class="label is-primay-label has-text-weight-medium has-text-black is-size-6">Profile Name</label>
                        <div class="control mt-2">
                            <input id="ins_name" class="input text-box" type="text" placeholder="John123">
                        </div>
                    </div>
                    <div class="field mt-5">
                        <label class="label is-primay-label has-text-weight-medium has-text-black is-size-6">Position</label>
                        <div class="control mt-2">
                            <input id="position" class="input text-box" type="text" placeholder="Web Developer, Data Engineer">
                        </div>
                    </div>
                    <div class="field mt-5 mb-0">
                        <label class="label is-primay-label has-text-weight-medium has-text-black is-size-6">Email Address</label>
                        <div class="control mt-2">
                            <input id="email" class="input text-box" type="email" placeholder="michaeljordan@gmail.com">
                        </div>
                    </div>
                    <div class="column has-text-right mt-1 pt-0 pr-0 mb-0 pb-0">
                        <a id="add_links" class="js-modal-trigger is-underlined has-text-black is-size-7 has-text-weight-bold" data-target="modal-js-example">Add links</a>
                    </div>
                    <div id="links_container" class="column mt-1 pt-0 pr-0 mb-0 pl-0">
                        <!-- <a id="add_links" class="is-underlined has-text-black is-size-7 has-text-weight-bold" data-target="modal-js-example">Facebook</a> -->
                    </div>
                    <div class="field">
                        <label class="label is-primay-label has-text-weight-medium has-text-black is-size-6">Phone Number</label>
                        <div class="control">
                            <input id="phone" class="input text-box" type="text" placeholder="+95945620198">
                        </div>
                    </div>
                    <div class="field mt-5">
                        <label class="label is-primay-label has-text-weight-medium">Address</label>
                        <div class="control mt-3">
                            <textarea id="address" class="textarea has-fixed-size text-area" placeholder="No.32. Washiton Road, California"></textarea>
                        </div>
                    </div>
                    <div class="column has-text-right pr-0 mt-2 pt-6">
                        <button id="btnBack" class="button has-text-black has-text-weight-semibold is-size-7 btn_border mt-2">Cancel</button>
                        <button id="btnSave" class="button has-text-white has-text-weight-semibold is-size-7 btn_fill ml-2 mt-2">Save</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- end of admin update container -->
    </div>
    <!-- end of container -->
    <!-- javascript file  -->
    <div id="modal-js-example" class="modal">
        <div class="modal-background"></div>

        <div class="modal-content">
            <div class="box" style="background-color: #fefbf6; border-radius: 0.4rem; border: 1px solid black;">

                <div class="field mt-5 mr-6 ml-6">
                    <div class="select has-text-black">
                        <select id="sel_social">
                            <option value="">Select dropdown</option>
                            <option value="Github">Github</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Facebook">Facebook</option>
                        </select>
                    </div>
                    <!-- <div class="control mt-2">
                        <input id="ins_name" class="input text-box" type="text" placeholder="Github">
                    </div> -->
                </div>
                <div class="field mt-4 mr-6 ml-6">
                    <div class="control mt-2">
                        <input id="social_url" class="input text-box" type="text" placeholder="https://github.con/MichaelJordan">
                    </div>
                </div>
                <div class="field mt-5 mb-3 mr-6 ml-6 has-text-right">
                    <button id="btn_cancel" class="button has-text-black has-text-weight-semibold is-size-7 btn_border">Cancel</button>
                    <button id="btn_add_social" class="button has-text-white has-text-weight-semibold is-size-7 btn_fill ml-2">Add</button>
                </div>
            </div>
        </div>

        <button class="modal-close is-large" aria-label="close"></button>
    </div>
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./resources/js/editins.js"></script>

</html>