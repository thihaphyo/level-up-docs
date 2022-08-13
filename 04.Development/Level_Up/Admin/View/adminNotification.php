<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="./resources/css/index.css?v=<? time(); ?>">
    <link rel="stylesheet" href="../View/resources/css/adNotification.css?v=<? time(); ?>">
</head>

<body>
    <main>
        <?php require_once "../View/sidebar.php"; ?>
        <!-- start of container  -->
        <div class="container">
            <h2 class="title is-3">Notification</h2>
            <div class="notiForm">
                <form action="" id="sendNoti" method="post">
                    <h3 class="title is-5">Select Members</h3>
                    <input type="radio" name="Member" id="all" value="ALL" checked>
                    <label for="all" class="checkBox"><img src="../View/resources/img/Group.png">All Members</label>
                    <input type="radio" name="Member" id="students" value="STUDENTS">
                    <label for="students" class="checkBox"><img src="../View/resources/img/Group.png">Students</label>
                    <input type="radio" name="Member" id="instructor" value="INSTRUCTORS">
                    <label for="instructor" class="checkBox"><img src="../View/resources/img/Group.png">Instructors</label>
                    <br />
                    <label>Header text</label>
                    <br />
                    <input type="text" name="titleText" class="headerInput" placeholder="Title">
                    <br />
                    <label>Detail Contents</label>
                    <br />
                    <textarea name="detailContent" cols="30" rows="10" placeholder="Detail Contents"></textarea>
                    <br />
                    <div class="btns">
                        <a id="cancel">Cancel</a>
                        <button type="submit" id="save">Save</button>
                    </div>
                </form>
                <div class="line"></div>
                <div class="history">
                    <?php require_once "../Controller/notificationPaginationController.php"; ?>
                    <h3 class="title is-5">Notification History</h3>
                    <hr />
                    <div class="notiHistory"></div>
                    <div class="noti-pagination">
                        <nav class="pagination" role="navigation" aria-label="pagination">
                            <a class="pagination-previous noti-pagination-previous" title="This is the first page">Previous</a>
                            <a class="pagination-next  noti-pagination-next">Next page</a>
                            <span class="pagination-list" id="noti-list-pagination"></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of container -->
    </main>
    <!-- javascript file -->
    <script src="../View/resources/lib/jquery3.6.0.js"></script>
    <script>
        let historyList = <?= json_encode($historylist); ?>;
        let pages = <?= json_encode($pages); ?>;
        console.log(historyList, pages);
    </script>
    <script src="../View/resources/js/adminNotification.js?v=<? time() ?>"></script>
    <script src="../View/resources/js/index.js"></script>
</body>

</html>