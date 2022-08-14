<!-- Variables " " and " " will be sent from the controller. -->

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
    <link rel="stylesheet" href="../View/resources/css/mystyles.css">
    <link rel="stylesheet" href="../View/resources/css/root.css">
    <link rel="stylesheet" href="../View/resources/css/instructorListView.css?<?php echo $time; ?>">

</head>

<body>
    <?php
    require_once('../View/header.php')
    ?>

    <main>
        <div class="container i-wrapper">
            <div class="i-search-bar">
                <form method="POST" action="<?= $controller_URL ?>" id="i-search-form">
                    <!-- <label for="i-search-type">
                        Search for
                    </label>
                    <select id="i-search-type" name="search-type">
                        <option value="Instructors">Instructors</option>
                        <option value="Courses">Courses</option>
                    </select> -->
                    <input type="text" name="i-search-input" placeholder="Search" />
                    <button class="button is-primary is-outlined has-text-weight-semibold">Search</button>
                </form>
            </div>

            <div class="i-instructor-list"></div>

            <div class="i-pagination">
                <nav class="pagination" role="navigation" aria-label="pagination">
                    <a class="pagination-previous i-pagination-previous" title="This is the first page">Previous</a>
                    <a class="pagination-next i-pagination-next">Next page</a>
                    <ul class="pagination-list" id="i-list-pagination"></ul>
                </nav>
            </div>
        </div>

    </main>

    <?php require_once('../View/footer.php') ?>

    <!-- javascript files -->
    <script src="../View/resources/js/index.js"></script>
    <script src="../View/resources/lib/jquery-3.6.0.min.js"></script>
    <script>
        let instrList = <?= json_encode($instructor_list); ?>;
        let controllerURL = <?= json_encode($controller_URL); ?>;
        console.log(instrList);
    </script>
    <script src="../View/resources/js/instructorListScr.js" type="module"></script>
</body>

</html>