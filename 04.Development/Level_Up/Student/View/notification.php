<!-- start of container  -->
<div class="notiContainer" id="box">
    <div class="notiHeader">
        <h2>Notifications</h2>
        <button class="delete" onclick="toggleNoti()"></button>
    </div>
    <hr />

    <!--start noti items -->
    <div class="notiItem">
        <?php require_once "../Controller/notificationCountController.php"; ?>
        <!--start all Noti -->
        <div class="notiAll">
            <div class='notiCart'>
                <div class='notiText'>
                    <h3 class='courseName title is-6'>
                        Suumer time
                        <span class='text'>This is someting</span>
                    </h3>
                </div>
                <a href='../Controller/notificationIDController.php'></a>
            </div>
            <?php
            foreach ($notiCount as $key => $value) {
                if ($value['target'] == 'Students' || $value['target'] == 'All') {
                    echo "<div class='notiCart'>";
                    echo "<div class='notiText'>";
                    echo "<h3 class='courseName title is-6'>" . $value['noti-title'];
                    echo "<span class='text'>" . $value['noti-body'] . "</span></h3>";
                    echo "</div>";
                    echo "<a href='../Controller/notificationIDController.php?id=" . $value['id'] . "' class='delete'></a>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
    <!-- end noti-item -->
</div>
<!-- end of container -->


<!-- javascript file -->
<script src=" ../View/resources/js/notification.js?v=<? time() ?>"></script>