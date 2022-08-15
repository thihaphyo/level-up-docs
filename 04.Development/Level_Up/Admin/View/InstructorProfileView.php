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
</head>

<body>
    <?php require_once('../View/sidebar.php') ?>

    <!-- start of container -->

    <div class="ip-container ml-0 pl-0">
        <div class="background-image" style="height:200px;">
            <img style="width:100%; height:200px; object-fit: cover;" src="../View/resources/img/cover_1.jpg" alt="">
        </div>
        <div class="ip-head">
            <img class="profile-img" src="../../Instructor/assets<?php echo $instructor_details[0]['profile_image'] ?>" alt="Profile Picture" />
            <div class="ip-name-position">
                <h2 class="ip-head-name">
                    <?= $instructor_details[0]['full_name'] ?>
                </h2>
                <h3 class="ip-head-position">
                    <?= $instructor_details[0]['job_position']; ?>
                </h3>
            </div>
        </div>

        <div class="ip-content">
            <div class="column pt-0">
                <h2 class="has-text-black has-text-weight-semibold is-size-5">About</h2>
            </div>
            <div class="column pt-0 pb-0 mb-0 has-text-black is-size-6 has-text-weight-medium">
                <?= $instructor_details[0]['bio'] ?>
            </div>

            <hr class="mb-0" style="background-color: #D9D9D9;">

            <div class="ip-body-details">
                <div id="exp_container" class="">
                    <div class="m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                        Job Positions
                    </div>

                    <?php
                    foreach ($instructor_details['experiences'] as $exp) {
                        echo "<div class='ip-exp-card'>
                                <img src='../View/resources/img/info_badge.png' style='width: 37px;' class='ip-exp-img'/>
                                <div class='ip-exp-content'>
                                    <div class='m-0 p-0 has-text-black has-text-weight-semibold '>";
                        echo $exp['exp_title'];
                        echo "      </div>
                                    <div class='m-0 p-0 has-text-black has-text-weight-semibold is-size-7'>";
                        echo $exp['exp_type'];
                        echo "      </div>
                                    <div class='m-0 p-0 has-text-black has-text-weight-light is-size-7'>";
                        echo date('M-Y', $exp['exp_start_date']) . " to " . isset($exp['exp_end_date']) ? date('M-Y', $exp['exp_end_date']) : "Present";
                        echo "      </div>";
                        echo "   </div></div>";
                    }

                    ?>
                </div>
                <div>
                    <div class="m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                        Education
                    </div>
                    <div class="ip-education-txt">
                        <?= $instructor_details[0]['bio'] ?>
                    </div>

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
                                    <?= $instructor_details[0]['email'] ?>
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
                                    <?= $instructor_details[0]['phone'] ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-0 p-0 mt-6">
                        <div class="is-flex is-flex-direction-column mt-5">
                            <div class="is-2 m-0 p-0 has-text-black has-text-weight-semibold is-size-5">
                                Address
                            </div>
                            <div class="m-0 p-0 ml-1">
                                <div id="address" class="column m-0 p-0 has-text-black has-text-weight-semibold mt-4 is-size-6">
                                    <?= $instructor_details[0]['address'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ip-buttons">
                <?php
                    if($instructor_details[0]['status'] === 'APPROVED'){
                        echo "<div>Instructor has been Approved.</div>";

                    } else if($instructor_details[0]['status'] === 'REJECTED') {
                        echo "<div>Instructor has been Rejected.</div>";
                        echo "<a href='".$controllerURL."?pend=".$instructor_id."' class='ip-btn ip-btn-reject'>Undo</a>";

                    } else {
                        echo "<a href='".$controllerURL."?reject=".$instructor_id."' class='ip-btn ip-btn-reject'>Reject</a>";
                        echo "<a href='".$controllerURL."?approve=".$instructor_id."' class='ip-btn ip-btn-approve'>Approve</a>";
                    }
                ?>
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