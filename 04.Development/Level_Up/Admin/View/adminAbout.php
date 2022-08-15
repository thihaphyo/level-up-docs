<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="./resources/css/index.css">
    <link rel="stylesheet" href="../View/resources/css/adAbout.css?v=<? echo time() ?>">
</head>

<body>
    <main>
        <!-- <div class="sideNavbar"></div> -->
        <?php require_once "./sidebar.php"; ?>
        <?php require_once "../Model/aboutDBtable.php"; ?>
        <!-- start of container  -->
        <div class="container">
            <form action="../Controller/changeAboutController.php" method="post" enctype="multipart/form-data">
                <h2>Change About Page</h2>
                <input class="aboutTitle" name="title" type="text" placeholder="Title" value="<?php echo $result[0]['title']; ?>">
                <br />
                <textarea cols="30" rows="10" name="description" placeholder="description"><?php echo $result[0]['description']; ?></textarea>
                <br />
                <h3>Change Photo or Picture</h3>
                <div class="selectImg">

                    <label for="file"><img src="../View/resources/img/carbon_export.png" alt="" />
                        Select
                        <input type="file" id="file" name="imgPic" accept="image/*" onchange="previewImg(event)">
                    </label>


                    <img id="preview" />
                </div>
                <button class="changeBtn">Change</button>
            </form>
        </div>
        <!-- end of container -->
    </main>
    <!-- javascript file -->
    <script src="../View/resources/js/adAbout.js"></script>
    <script src="../View/resources/js/index.js"></script>
</body>

</html>