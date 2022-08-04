<?php
time();
require_once "../Model/dbConnection.php";

if (isset($_POST)) {
    $title = $_POST['titlePrivacy'];
    $script = $_POST['description'];
    $id = $_POST['idPrivacy'];
        $db = new DBConnect();
        $connection = $db->Connect();
        //set data update form to database
        $sql = $connection->prepare("
            UPDATE M_POLICY SET 
            title = :header,
            description = :text
            WHERE id = :id
        ");
    $sql->bindValue(":header", $title);
    $sql->bindValue(":text", $script);
    $sql->bindValue(":id", $id);
    $sql->execute();
    header("Location: ../View/adminPrivacyPolicy.php");
} else {
    echo "Error";
}