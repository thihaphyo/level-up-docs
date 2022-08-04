<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="../View/resources/css/adminPrivacyPolicy.css?v=<?time();?>">
</head>

<body>
    <main>
        <div class="sideNavbar"></div>
        <!-- start of container  -->
        <div class="container">
            <form action="../Controller/addPrivacyController.php" method="post">
                <h2>Create Privacy Policy</h2>
                <!--start all privacy policy  -->
                <div class="createBox">
                    <div class="create">
                        <input type="text" name="titlePrivacy" placeholder="Title">
                        <br />
                        <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
                </div>
                <!--end all privacy policy  -->
                <button class="addBtn">Add</button>
            </form>
            <hr />
            <?php require "../Model/privacyDBtable.php";?>
            <h2 class="title"> Your Privacy Policy Page</h2>
            <!-- privacy policy box with title and text -->
            <div class="privacyBox">
                <?php 
                require "../Controller/showPrivacyController.php";
                foreach($result as $key => $value) {
                    echo "<div class='privacyParagraph'>";
                    echo "<h3>".$value['title'];
                    echo "<a class='editPage' href='../Controller/EditPrivacyIDController.php?id=".$value['id']."'>Edit</a>";
                    echo "<a class='delete' href='../Controller/deletePrivacyController.php?id=".$value['id']."'>Delete</a>" ;
                    echo "</h3>";
                    echo " <p class='text'>".$value['description']."</p>";
                    echo "</div>";
                }
                ?>
            </div>
            <!--end privacy policy box -->
        </div>
        <!-- end of container -->
    </main>
    <!-- javascript file -->
    <script src="../View/resources/js/adAbout.js"></script>
</body>

</html>