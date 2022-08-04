<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="../View/resources/css/adminPrivacyPolicy.css">
</head>
<body>
    <main>
        <div class="sideNavbar"></div>
        <!-- start of container  -->
        <div class="container">
            <form action="../Controller/updatedPrivacyController.php" method="post">
                <h2 class="title">Edit</h2>
                <!--start edit privacy policy  -->
                <div class="createBox">
                    <div class="create">
                    <input type="hidden" name="idPrivacy" value="<?php echo $result[0]['id']?>">
                        <input type="text" name="titlePrivacy" placeholder="Title" value="<?php echo $result[0]['title']?>">
                        <br/>
                        <textarea cols="30" rows="10" name="description" placeholder="Description"><?php echo $result[0]['description']?></textarea>
                    </div>
                </div>
                <!--end edit privacy policy  -->
                <button type="submit" class="addBtn">Done</button>
            </form>
        </div>
        <!-- end of container -->
    </main>
    <!-- javascript file -->
    <script></script>
</body>

</html>