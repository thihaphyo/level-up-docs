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
    <link rel="stylesheet" href="../View/resources/css/index.css" />
    <link rel="stylesheet" href="../View/resources/css/mystyles.css" />
    <link rel="stylesheet" href="../View/resources/css/InstructorProfile.css" />
    <!-- THIS PAGE SHARES STYLING WITH INSTRUCTOR PROFILE VIEW. -->
</head>

<body>
    <?php require_once('../View/sidebar.php') ?>

    <!-- start of container -->

    <div class="ip-container ml-0 pl-0">
        <div class="background-image" style="height:200px;">
            <img style="width:100%; height:200px; object-fit: cover;" src="../View/resources/img/cover_1.jpg" alt="">
        </div>
        <div class="ip-head">
            <img class="profile-img" src="../View/<?php echo $admin_details[0]['profile_image'] ?>" alt="Profile Picture" />
            <div class="ip-name-position">
                <h2 class="ip-head-name">
                    <?= $admin_details[0]['full_name'] ?>
                </h2>
                <h3 class="ip-head-position">
                    Admin at Level Up
                </h3>
            </div>
            <?php
                if($admin_details[0]['is_deleted'] === 1){
                    echo "<div class='ap-delete-txt'><br>THIS ADMIN WAS DELETED.</div>";
                    echo "<a href='".$admin_detail_route."?undo=".$admin_id."' class='ap-delete'><br>Undo Deletion</a>";
                } else {
                    echo "<a href='".$admin_detail_route."?delete=".$admin_id."' class='ap-delete'><br>Delete Admin</a>";
                }
            ?>
            
        </div>

        <div class="ip-content">
            <!-- 'bio' column is currently absent -->
            <!-- <div class="column pt-0">
                <h2 class="has-text-black has-text-weight-semibold is-size-5">About</h2>
            </div>
            <div class="column pt-0 pb-0 mb-0 has-text-black is-size-6 has-text-weight-medium">
                <?php // echo $admin_details[0]['bio']; 
                ?>
            </div>

            <hr class="mb-0" style="background-color: #D9D9D9;"> -->

            <div class="ip-body-details">
                <div>
                    <div class="m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                        Contact
                    </div>
                    <div class="m-0 p-0 mt-5">
                        <div class="is-flex is-flex-direction-row mt-5">
                            <div class="column is-2 m-0 p-0 has-text-black has-text-weight-semibold ">
                                Email
                            </div>
                            <div class="m-0 p-0 ml-1">
                                <div id="email" class="column m-0 p-0 has-text-black has-text-weight-medium ">
                                    <?= $admin_details[0]['email']?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-0 p-0 mt-5">
                        <div class="is-flex is-flex-direction-row mt-5">
                        <div class="column is-2 m-0 p-0 has-text-black has-text-weight-semibold ">
                                Phone
                            </div>
                            <div class="m-0 p-0 ml-1">
                                <div id="email" class="column m-0 p-0 has-text-black has-text-weight-medium ">
                                    <?= $admin_details[0]['phone_number']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="is-flex is-flex-direction-column mt-5">
                        <div class="is-2 m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                            Address
                        </div>
                        <div class="m-0 p-0 ml-1">
                            <div id="address" class="column m-0 p-0 has-text-black has-text-weight-semibold mt-4 is-size-6">
                                <?= $admin_details[0]['address']?>
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
    <!-- javascript files  -->
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>