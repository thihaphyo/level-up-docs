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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../View/resources/css/mystyles.css">
    <link rel="stylesheet" href="../View/resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../View/resources/css/orderlist.css?<?php echo $time ?>">
</head>

<body>

    <?php require_once('../View/sidebar.php') ?>

    <section class="orderList container">

        <div class="text o-text">
            <h1>
                Order List
            </h1>
            <img id="o-download-list" src="../View/resources/img/icons/download.svg" alt="Download" />
        </div>

        <table class="o-table"></table>

        <div class="o-pagination">
            <nav class="pagination" role="navigation" aria-label="pagination">
                <a class="pagination-previous o-pagination-previous" title="This is the first page">Previous</a>
                <a class="pagination-next  o-pagination-next">Next page</a>
                <ul class="pagination-list" id="o-list-pagination"></ul>
            </nav>
        </div>


    </section>

    <script src="../View/resources/lib/jquery-3.6.0.min.js"></script>
    <script>
        let orderList = <?= json_encode($orderlist) ?>;
        let pages = <?= json_encode($pages) ?>;
        let controllerURL = <?= json_encode($controllerURL) ?>;
        let csvFolderURL = <?= json_encode($csvFolderURL) ?>;
        let instructorId = <?= json_encode($instructor_id) ?>;
        // console.log(orderList, pages);
    </script>
    <script src="../View/resources/js/orderlist.js"></script>
</body>

</html>