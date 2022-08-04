<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="./resources/css/notification.css">
</head>

<body>
    <?php require_once('./header.php') ?>

    <main>
        <!-- start of container  -->
        <div class="container">
            <h2 class="title is-3">Privacy Policy</h2>
            <?php require "../Model/privacyDBtable.php"; ?>
            <div class="privacyBox">
                <!-- privacy policy box with title and text -->
                <?php
                foreach ($result as $key => $value) {
                    echo "<div class='privacyParagraph'>";
                    echo "<h2 class='title is-6'>" . $value['title']."</h2>";
                    echo " <p class='text'>" . $value['description'] . "</p>";
                    echo "</div>";
                }
                ?>
                <!--end privacy policy box -->
            </div>
        </div>
        <!-- end of container -->
    </main>

    <?php require_once('./footer.php') ?>

    <!-- javascript file -->
    <script src="../View/resources/js/index.js"></script>
</body>

</html>