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
    <link rel="stylesheet" href="./resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <section class="container">
        <!-- title of the contact -->
        <div class="text">
            <h3 class="title is-3 has-text-weight-semibold">Contact Us Setting</h2>
        </div>
        <br /><br /><br />
        <div>
            <input class="input is-medium    input is-black" type="text" placeholder="Enter Phone Number">
            <br /><br />
            <input class="input is-medium input is-black" type="text" placeholder="Enter Email Address">
        </div>
        <br />
        <div class="file is-boxed">
            <label class="file-label">
                <input class="file-input" type="file" name="resume">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose a file…
                    </span>
                </span>
            </label>
        </div>
        <button class="button is-black  has-text-weight-semibold">Change</button>
        <div>
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