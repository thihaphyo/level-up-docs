<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="../View/resources/css/index.css" />
    <link rel="stylesheet" href="../View/resources/css/instructorList.css?v=<? time() ?>">
</head>

<body>
    <main>
        <?php require_once('../View/sidebar.php') ?>
        <?php require_once('../Controller/instructorListController.php'); ?>
        <!-- start container -->
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
    <script src="../View/resources/js/index.js"></script>
</body>

</html>