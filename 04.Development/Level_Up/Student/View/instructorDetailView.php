

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="../View/resources/css/mystyles.css">
    <link rel="stylesheet" href="../View/resources/css/root.css">
    <link rel="stylesheet" href="../View/resources/css/instructorDetailView.css">

</head>

<body>
    <?php require_once('../View/header.php'); ?>

    <main>
        <div class="container i-details">
            <div class="i-head">
                <div class="i-head-img">
                    <img src="../View/resources/img/assets<?= $instructor_details[0]['profile_image'] ?>" alt="<?= $instructor_details[0]['full_name'] ?>" />
                    <div class="i-details-head-img-helper"></div>
                </div>
                <div class="i-head-txt">
                    <p class="i-head-title"><?= $instructor_details[0]['full_name'] ?></p>
                    <!-- PLEASE CHANGE THIS TO APPROPRIATE FIELD -->
                    <p class="i-head-edu"><?= $instructor_details[0]['bio'] ?></p>
                </div>
            </div>
            <div class="i-about">
                <p class="i-details-title">About Me</p>
                <hr class="i-details-hr"/>
                <p class="i-head-about"><?= $instructor_details[0]['bio'] ?></p>
            </div>
            <div class="i-experiences">
                <p class="i-details-title">Experiences</p>
                <hr class="i-details-hr"/>
                <div class="i-experiences-wrapper">

                    <?php
                    # Helper function to convert number of seconds into day-month-year.
                    function getInterval($seconds)
                    {
                        $obj = new DateTime();
                        $obj->setTimeStamp(time() + $seconds);
                        $diffArr = (array)$obj->diff(new DateTime());
                        if ($diffArr['y'] > 0) {
                            return $diffArr['y'] . ' year' . ($diffArr['y'] > 1 ? 's' : '');
                        } else if ($diffArr['m'] > 0) {
                            return $diffArr['m'] . ' month' . ($diffArr['m'] > 1 ? 's' : '');
                        } else if ($diffArr['d'] > 0) {
                            return $diffArr['d'] . ' day' . ($diffArr['d'] > 1 ? 's' : '');
                        } else {
                            return '';
                        }
                    }

                    foreach ($instructor_details['experiences'] as $experience) {

                        $duration = getInterval($experience['exp_end_date'] - $experience['exp_start_date']);

                        echo "<div class='i-experience-card'>";
                        echo "<img src='../View/resources/img/icons/exp_icon.png'/>";
                        echo "<div class='i-experience-txt'>";
                        echo "<p class='i-experience-title'>" . $experience['exp_title'] . "</p>";
                        echo "<p class='i-experience-type'>" . $experience['exp_type'] . "</p>";
                        echo "<p class='i-experience-duration'>" . "<span>" . (date('Y-m-d', $experience['exp_start_date'])) . "</span>" . " to " . "<span>" . (date('Y-m-d', $experience['exp_end_date'])) . " (" . $duration . ")" .  "</p>";
                        echo "</div></div>";
                    }
                    ?>
                </div>
            </div>
            <div class="i-details-courses">
                <p class="i-details-title">Courses</p>
                <hr class="i-details-hr"/>

                <div class="i-courses-wrapper">

                    <?php
                    foreach ($instructor_details['courses'] as $course) {
                        echo "<div class='i-course-card'>";
                        echo "<img src='../View/" . $course['course_cover_image'] . "' alt = 'Course Cover Photo'/>";
                        echo "<div class='i-course-details'>";
                        echo "<a class='i-course-title'>" . $course['course_title'] . "</a>";
                        if (isset($course['rating'])) {
                            echo "<p class='i-course-rating'>";
                            echo "<img src='../View/resources/img/icons/rating_icon.png'/>";
                            echo "<span>" . $course['rating'] . "/5 </span></p>";
                        }
                        echo "</div></div>";
                    }
                    ?>

                </div>
            </div>
            <div class="i-contact">
                <p class="i-details-title">Contact</p>
                <hr class="i-details-hr"/>
                <div class='i-contacts-wrapper'>
                    <?php

                    # Helper function that will add the contact field if it exists.
                    function add_if_exists($field, $icon_full_name)
                    {
                        if (isset($field)) {
                            echo "<div class='i-contact-element'>";
                            echo "<img src='../View/resources/img/icons/" . $icon_full_name ."'/>";
                            echo "<p>" . $field . "</p>";
                            echo "</div>";
                        }
                    }
                    add_if_exists($instructor_details[0]['phone'], 'phone_icon.png');
                    add_if_exists($instructor_details[0]['email'], 'mail_icon.png');
                    foreach ($instructor_details['social_accounts'] as $account) {
                        add_if_exists($account, 'social_icon.png');
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>

    <?php require_once('../View/footer.php') ?>

    <!-- javascript files -->
    <script src="../View/resources/js/index.js"></script>
</body>

</html>