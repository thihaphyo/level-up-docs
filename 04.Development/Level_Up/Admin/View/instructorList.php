<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="../View/resources/css/instructorList.css?v=<? time() ?>">
</head>
<body>
    <main>
        <div class="sideNavbar"></div>
        <!-- start of container  -->
        <!-- <div class="container">
            <h2 class="title is-3">Instructors List<a href="./instructorRequest.php" class="view">View Instructor Requests</a></h2>
            <?php
            // require_once "../Model/showInstructorList.php";
            ?>
            <div class="instructors"> -->
        <?php
        // foreach ($result as $key => $value) {
        //     echo "<div class='instructor'>";
        //     echo "<div class='profile'>";
        //     echo "<img src='../View/resources/img/" . $value['profile_img'] . "'>";
        //     echo "<p class='detail'><a href='#'>more detail</a></p>";
        //     echo "</div>";
        //     echo "<div class='instructorName'>";
        //     echo "<div class='name'>Name";
        //     echo "<h2 class='title is-6'>" . $value['full_name'] . "</h2>";
        //     echo "</div>";
        //     echo "<div class='phone'>Phone";
        //     echo "<h2 class='title is-6'>" . $value['phone'] . "</h2>";
        //     echo "</div>";
        //     echo "</div>";
        //     echo "<div class='exprience'>Exprience";
        //     echo "<h2 class='title is-6'>" . $value['job_position'] . "</h2>";
        //     echo "</div>";
        //     echo "<div class='address'>";
        //     echo "<div class='road'>Address";
        //     echo "<h2 class='title is-6'>" . $value['address'] . "</h2>";
        //     echo "</div>";
        //     echo "<div class='email'>Email";
        //     echo "<h2 class='title is-6'>" . $value['email'] . "</h2>";
        //     echo "</div>";
        //     echo "</div>";
        //     echo "</div>";
        // }
        ?>
        <!-- <div class="instructor">
                    <div class="profile">
                        <img src="../View/resources/img/Group 33668.svg" alt="">
                        <p class="detail"><a href="#">more detail</a></p>
                    </div>
                    <div class="instructorName">
                        <div class="name">Name
                            <h2 class="title is-6">Michael John</h2>
                        </div>
                        <div class="phone">Phone
                            <h2 class="title is-6">+95 9358395039</h2>
                        </div>
                    </div>
                    <div class="exprience">Exprience
                        <h2 class="title is-6">Web Developer</h2>
                    </div>
                    <div class="address">
                        <div class="road">Address
                            <h2 class="title is-6">St. Taleat Tuabl</h2>
                        </div>
                        <div class="email">Email
                            <h2 class="title is-6">michale3049@gmail.com</h2>
                        </div>
                    </div>
                </div> -->

        </div>
        <?php require_once('../Controller/instructorListController.php'); ?>
        <div class="container">
            <h2 class="title is-3">Instructors List<a href="./instructorRequest.php" class="view">View Instructor Requests</a></h2>
            <div class="instructors"></div>
            <div class="o-pagination">
                <nav class="pagination" role="navigation" aria-label="pagination">
                    <a class="pagination-previous o-pagination-previous" title="This is the first page">Previous</a>
                    <span class="pagination-list" id="o-list-pagination"></span>
                    <a class="pagination-next  o-pagination-next">Next page</a>
                </nav>
            </div>
        </div>
        <!-- end of container -->
    </main>
    <!-- javascript file -->
    <script src="../View/resources/lib/jquery3.6.0.js"></script>
    <script>
        let instructorList = <?= json_encode($instructorlist); ?>;
        let pages = <?= json_encode($pages); ?>;
        console.log(instructorList, pages);
    </script>
    <script src="../View/resources/js/instructorList.js"></script>
</body>

</html>