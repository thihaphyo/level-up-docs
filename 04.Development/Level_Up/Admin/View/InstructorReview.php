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
    <link rel="stylesheet" href="../View/resources/css/InstructorReview.css?<?php echo $time ?>">
</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <section class="container">
        <div class="text">Instructor Applications</div>
        <div class="ir-container">
            <div class="requestedList">
                <div class="requestedBox">
                    <div class="dateAndDelete">
                        <p class="date">Feb 24 <img src="../View/resources/img/ion_trash-bin.svg" alt="" class="delete"></p>
                        <img src="../View/resources/img/icons/delete_icon.svg" alt="Delete">
                    </div>
                    <img src="../View/resources/img/icons/delete_icon.svg" alt="Delete" class="profile">
                    <p class="name">Mrak jame</p>
                    <p class="email">mark571@gmail.com</p>
                    <p class="text">Lorem ipsum, doloameconsec  Lorem ipsum, dolor sit amet consec </p>
                    <button class="info">More Info</button>
                </div>
            </div>
        </div>
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