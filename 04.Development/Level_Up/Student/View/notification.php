    <main>
        <!-- start of container  -->
        <div class="notiContainer" id="box">
            <div class="header">
                <h2>Notifications</h2>
                <hr/>
            </div>
            <!--start noti items -->
            <div class="notiItem">
                <?php require_once "../Controller/notificationCountController.php"; ?>
                <!--start all Noti -->
                <div class="notiAll">
                    <?php
                    foreach ($notiCount as $key => $value) {
                        if ($value['target'] == 'STUDENTS' || $value['target'] == 'ALL') {
                            echo "<div class='notiCart'>";
                            echo "<div class='notiText'>";
                            echo "<h3 class='courseName title is-6'>" . $value['noti_title'];
                            echo "<span class='text'>".$value['noti_body']."</span></h3>";
                            echo "</div>";
                            echo "<a class='delete' id=".$value['id']." onclick='deleteData(this)'></a>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- end noti-item -->
        </div>
        <!-- end of container -->
    </main>

    <!-- javascript file -->
    <script src="./resources/lib/jquery3.6.0.js"></script>
    <script src="../View/resources/js/notification.js?v=<?time();?>"></script>
