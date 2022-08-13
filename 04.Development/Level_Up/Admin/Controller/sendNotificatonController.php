<?php
require_once "../Model/dbConnection.php";

if (isset($_POST)) {
    $title = $_POST['titleText'];
    $detailText = $_POST['detailContent'];
    if ($_POST['Member']) {
        $target = $_POST['Member'];
        $db = new DBConnect();
        $connection = $db->Connect();
        //set data insert form to database
        $sql = $connection->prepare("
        INSERT INTO m_notifications(
            noti_title,
            noti_body,
            target,
            created_at,
            updated_at
            )
        VALUES ( 
            :headerText,
            :text,
            :member,
            :create,
            :update
        );
    ");
        $sql->bindValue(":headerText", $title);
        $sql->bindValue(":text", $detailText);
        $sql->bindValue(":member", $target);
        $sql->bindValue(":create", date("Y/m/d"));
        $sql->bindValue(":update", date("Y/m/d"));
        $sql->execute();
        header("Location: ../View/adminNotification.php");
    }else {
        echo "You need to select member!";
    }
} else {
    echo "Error";
}
