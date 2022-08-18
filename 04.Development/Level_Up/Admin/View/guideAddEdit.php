<?php
$time = time();
//check edit or not
$mode = 0;//mean edit guide
if (isset($_GET['id']))
    require_once "../Controller/guideController/guideEditController.php";
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
    <link rel="stylesheet" href="./resources/css/guide.css?<?php echo $time ?>">
    <script src="./resources/lib/jquery-3.6.0.min.js"></script>
    <script src="./resources/js/guide.js?<?php echo $time ?>"></script>
</head>

<body>

    <?php require_once('./sidebar.php') ?>

    <section class="container mt-2 ml-0 pl-0">
        <!-- title of the Guide and view guide -->
        <div class="text">
            <div class="columns">
                <div class="is-size-3 column  is four-quarters has-text-weight-semibold"> Guide Setting </div>
                <a href=<?= "./guideStepAdd.php?id=" .$_GET['id'] ?> class="view is-size-5 column  is-3 has-text-weight-bold"><u>Add Step</u> </a>
            </div>
        </div>
        <br />
        <!-- Title of the Add step and Add more-->
        <div>
            <input class="input is-medium  input is-black" type="text" placeholder="Title" value="<?= count($stepList) > 0 ? $stepList[0]['guide_title'] : '' ?>">
        </div>
        <br />

        <!-- Steps -->
        <div id="steps">
            <?php
            foreach ($stepList as $key => $step) { ?>
                <section class="section">
                    <div class="tile is-ancestor">
                        <div class="tile is-parent">
                            <article class="tile is-7 is-child">
                                <label class="
                            label title is-4 has-text-weight-medium "> <?= $step['step_title'] ?></label>
                                <br />
                                <div>
                                    <p class="subtitle is-6 has-text-weight-medium">
                                        <?= $step['step_details'] ?></p>

                                    <div class="columns">
                                        <div class="column is-1 has-text-weight-bold editStep"> <u>Edit</u> </div>
                                        <div class="column is-1 has-text-weight-bold deleteStep"><u>Delete</u> </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            <?php }
            ?>
        </div>

        <!-- Save button -->
        <button class="button is-black  has-text-weight-semibold">Save</button>
    </section>
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
        // toggle.addEventListener("click", () => {
        //     sidebar.classList.toggle("close");
        // })
    </script>
</body>

</html>