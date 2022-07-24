<!-- Variables "chapter_list" and "chapter_details" will be sent from the controller. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="../View/resources/css/mystyles.css">
    <link rel="stylesheet" href="../View/resources/css/root.css">
    <link rel="stylesheet" href="../View/resources/css/lectureView.css">
</head>

<body>
    <?php require_once('../View/header.php'); ?>

    <main>
        <!-- Javascript will control the elements. -->
        <div class="container l-wrapper">
            <div class="l-nav">
                <h3 class="l-course-title"><?= $course_title ?></h3>
                <!-- <progress class="progress" value="10" max="100">90%</progress> -->
            </div>
            <hr class="l-nav-hr" />
            <div class="l-body"></div>
        </div>

        <div class="modal l-modal">
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">QUIZZES</p>
                    <button class="delete l-modal-close" aria-label="close"></button>
                </header>
                <form class="l-quiz-form modal-card-body"></form>
                <footer class="l-modal-foot modal-card-foot">
                    <a class="l-quiz-submit bl-body-next button is-primary has-text-weight-semibold">Submit</a>
                </footer>
            </div>
        </div>

    </main>

    <?php require_once('../View/footer.php') ?>

    <!-- javascript files -->
    <script src="../View/resources/js/index.js"></script>
    <script src="../View/resources/lib/jquery-3.6.0.min.js"></script>
    <script>
        let chapList = <?= json_encode($chapter_list); ?>;
        let chapDetails = <?= json_encode($chapter_details); ?>;
        let courseID = <?= json_encode($course_id); ?>;
    </script>
    <script src="../View/resources/js/lecture.js" type="module"></script>
</body>

</html>