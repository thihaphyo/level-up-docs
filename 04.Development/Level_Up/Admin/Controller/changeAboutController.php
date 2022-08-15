<?php
// dbconnection
require_once "../Model/dbConnection.php";
if (isset($_POST)) {
    $header = $_POST['title'];
    $text = $_POST['description'];

    $file = $_FILES['imgPic']['name'];
    $location = $_FILES['imgPic']['tmp_name'];

    if (isset($file)) {
        $db = new DBConnect();
        $connection = $db->Connect();
        if (move_uploaded_file($location, "../../Student/View/resources/img/$file")) {
            //set data update form to database
            $sql = $connection->prepare("
            UPDATE M_ABOUT SET 
            title = :header,
            description = :text,
            image = :img
            WHERE id = 1
        ");
            $sql->bindValue(":header", $header);
            $sql->bindValue(":text", $text);
            $sql->bindValue(":img", $file);
            $sql->execute();
        } else {
            echo "Error";
        }
    } else {
        $sql = $connection->prepare("
        UPDATE M_ABOUT SET 
            title = :header,
            description = :text,
            WHERE id = 1
    ");
        $sql->bindValue(":header", $header);
        $sql->bindValue(":text", $text);
        $sql->execute();
    }
    header("Location: ../View/adminAbout.php");
} else {
    echo "Error, can't find File";
}
