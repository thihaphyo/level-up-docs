<?php
$time = time();
//check edit or not
if (isset($_GET['id'])) {
    $guideid = $_GET['id'];
    $mode = 1; //mean add step
    $title = "Add";
    $disabled = true;
    require_once "../Controller/guideController/guideEditController.php";
} else {
    $disabled = false;
    $title = "Edit";
}
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

    <?php require_once('./sidebar.php'); ?>
    <form action="" enctype="multipart/form-data" id="formStep">
        <input type="hidden" name="id" value="<?= $guideid ?>">
        <section class="container mt-2 ml-0 pl-0">
            <!-- title of the Guide -->
            <div class="text">
                <h3 class=" is-size-3 has-text-weight-semibold"><?= $title ?> Step</h2>
            </div>
            <br /><br />
            <!--subtitle and textarea -->
            <div>
                <input name="seq" class="input is-normal  input is-black seq" value="<?= $seq  ?>" readonly="<?= $disabled  ?>" type="number" placeholder="Seq" required>
                <br /><br />
                <input id="title" name="title" class="input is-normal  input is-black" type="text" placeholder="Subtitle" required>
                <br /><br />
                <textarea id="details" name="details" class="textarea is-black guideText" placeholder="Textarea" required></textarea>
            </div>
            <br />
            <!-- select image -->
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
            <!-- save and done -->
            <button class="move button is-black  has-text-weight-semibold mt-6 mx-2" type="submit" id="addStep">Add</button>
    </form>


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