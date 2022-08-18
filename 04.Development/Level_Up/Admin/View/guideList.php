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
    <link rel="stylesheet" href="./resources/css/auth.css">
    <link rel="stylesheet" href="./resources/css/guide.css?<?php echo $time ?>">
</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <section class="container mt-2 ml-0 pl-0">
        <!-- title of the Guide and view guide -->
        <div class="text">
            <div class="columns">
                <div class="is-size-3 column  is four-quarters has-text-weight-semibold"> Guide List </div>
                <div class="view is-size-5 column  is-3 has-text-weight-bold"><u>Add Guide</u> </div>
            </div>
        </div>

        <div class="text">
            <div class="columns">
                <div class="is-size-6 column  has-text-weight-regular">
                    <?php
                    require_once("../Controller/guideController/guideListController.php");
                    $count = 1;
                    foreach ($guideList as $guide) { ?>
                        <p class="mb-4">
                            <span><?= $count++ . "." ?>
                            </span><?= $guide['guide_title'] ?>
                            <span class="mx-6 is-underlined">
                                <a href=<?= "./guideAddEdit.php?id=" . $db->stringEncryption("encrypt", $guide['id']) ?>>Edit</a>
                            </span>
                            <span class="is-underlined">
                                <a href="">Delete</a>
                            </span>
                        </p>
                    <?php }
                    ?>
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


8/3