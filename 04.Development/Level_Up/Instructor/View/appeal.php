<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="../View/resources/css/appeal.css">
</head>
<body>
    <main>
        <!-- for side nav bar -->
        <div class="sideNavbar"></div>
        <!-- start of container  -->
        <div class="container">
            <!-- show reason for banned -->
            <?php require_once "../Controller/showAppealController.php" ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Appeal Form</h1>
                <?php
                foreach ($result as $key => $value) {
                    echo "<label for='bannedReason'>Reason of banning</label>";
                    echo "<br/>";
                    echo "<textarea id='bannedReason' cols='30' rows='10' readonly>" . $value['reason'] . "</textarea>";
                    echo "<br/>";
                }
                ?>
            </form>
            <!-- <label for="bannedReason">Reason of banning</label>
                <br />
                <textarea name="" id="bannedReason" cols="30" rows="10" readonly>eg.Lorem ipsum, dolor sit amet consectetur adipisicing elitepudiandae, eos. Esse quibusdam illum quialiqipsLorem ipsum, dolor sit amet consectetur adipicing elit.</textarea> -->

                <!-- add solution -->
            <form action="../Controller/appealSolutionController.php" method="post">
                <label for="msg">Message</label>
                <br />
                <textarea name="tSolution" id="msg" cols="30" rows="10"></textarea>
                <br />
                <button type="submit" class="btnSumbit">Send Form</button>
            </form>
        </div>
        <!-- end of container -->
    </main>
    <!-- javascript file -->
    <script src="../View/resources/js/about.js"></script>
</body>

</html>