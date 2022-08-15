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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../View/resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../View/resources/css/instructorReview.css?<?php echo $time ?>">
</head>

<body>

    <?php require_once('../View/sidebar.php') ?>

    <section class="container ir-wrapper">
        <div class="text">Instructor Applications</div>
        <div class="ir-container">
            <?php
                
                foreach($instructor_list as $instructor){
                    $date = new DateTime($instructor['created_at']);

                    echo "<div class='requestedBox'>";
                    echo "<div class='dateAndDelete'>";
                    echo "<p class='date'>". $date->format('M d') ."</p>";
                    
                    echo "<input type='checkbox' class='ir-delete-input' id='ir-del-".$instructor['id']."'/>";

                    echo "<div class='ir-confirm-modal'><p> Rejecting This Request? </p>";
                    echo "<div>";
                    echo "<a href='".$controllerURL."?reject=".$instructor['id']."' class='ir-btn ir-btn-confirm'> Confirm </a>";
                    echo "<label for='ir-del-".$instructor['id']."' class='ir-btn ir-btn-cancel'> Cancel </label></div></div>";

                    echo "<label for='ir-del-".$instructor['id']."'><img src='../View/resources/img/icons/delete_icon.svg' alt='Delete' class='delete'/></label>";

                    echo "</div>";

                    echo "<img src='../../Instructor/assets". $instructor['profile_image'] ."' alt='Profile Picture' class='ir-profile-img'>";
                    echo "<p class='name'>". $instructor['full_name'] ."</p>";
                    echo "<p class='email'>". $instructor['email'] ."</p>";
                    echo "<p class='ir-card-text'>". $instructor['bio'] ."</p>";
                    echo "<a class='info' href='".$controllerURL . "?instructor_id=" . $instructor['id'] ."'>More Info</a>";
                    echo "</div>";
                    }
                ?>
            </div>
    </section>

    <script>
        let instrList = <?php echo json_encode($instructor_list) ?>;
        let controllerURL = <?php echo json_encode($controllerURL) ?>;
        console.log(instrList);
    </script>
</body>

</html>