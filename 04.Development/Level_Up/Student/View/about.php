<?php time() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/mystyles.css">
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="./resources/css/notification.css?v=<? time() ?>">
    <link rel="stylesheet" href="./resources/css/about.css?v=<? time() ?>">
</head>

<body>
    <?php require_once('./header.php') ?>
    <main>
        <!-- start of container  -->
        <div class="container">
            <?php require_once "../Model/aboutDBtable.php"; ?>
            <div class="about">
                <?php
                foreach ($result as $key => $value) {
                    $data = $value['description'];
                    echo "<div class='itemBox'>";
                    echo "<h2 class='title is-3'>" . $value['title'] . "</h2>";
                    if (strlen($data) > 120) {
                        echo "<p class='aboutText'>" . substr($data, 0, 120) .
                            "<span id='dotted'>...</span><span id='more'>" .
                            substr($data, 121) . "</p>";
                        echo "<button class='readMore button is-primary is-outlined has-text-weight-semibold' onclick='readMoreBtn()' id='btnReadMore'>Read more</button>";
                    } else {
                        echo $data;
                    }
                    echo "</div>";
                    echo "<div class='img'>";
                    echo "<img src='../View/resources/img/" . $value['image'] . "'>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <!-- end of container -->
    </main>
    <?php require_once('./footer.php') ?>
    <!-- javascript file -->
    <script src="../View/resources/js/index.js"></script>
    <script src="../View/resources/js/about.js?v=<? time() ?>"></script>
</body>

</html>