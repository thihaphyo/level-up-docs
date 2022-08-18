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
    <link rel="stylesheet" href="../View/resources/css/index.css?<?php echo $time ?>">
    <link rel="stylesheet" href="../View/resources/css/mystyles.css">
    <link rel="stylesheet" href="../View/resources/css/reviews.css?<?php echo $time ?>">
</head>

<body>

    <?php require_once('../View/sidebar.php') ?>

    <section class="review container">

        <div class="r-text">Community (Review and Rating)</div>

        <div class="r-cards-container"></div>

        <div class="r-pagination">
            <nav class="pagination" role="navigation" aria-label="pagination">
                <a class="pagination-previous r-pagination-previous" title="This is the first page">Previous</a>
                <a class="pagination-next  r-pagination-next">Next page</a>
                <ul class="pagination-list" id="r-list-pagination"></ul>
            </nav>
        </div>


    </section>

    <script src="../View/resources/lib/jquery-3.6.0.min.js"></script>
    <script>
        let reviews = <?= json_encode($reviews) ?>;
        let pages = <?= json_encode($pages) ?>;
        let controllerURL = <?= json_encode($controllerURL); ?>;
        console.log(reviews, pages);
    </script>
    <script src="../View/resources/js/reviews.js"></script>
</body>

</html>