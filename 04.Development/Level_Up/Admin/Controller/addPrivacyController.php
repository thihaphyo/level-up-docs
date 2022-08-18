<?php
require_once "../Model/dbConnection.php";

if (isset($_POST)) {
    $title = $_POST['titlePrivacy'];
    $script = $_POST['description'];

    $db = new DBConnect();
    $connection = $db->Connect();
    //set data insert form to database
    $sql = $connection->prepare("
        INSERT INTO M_POLICY(
            title,
            description,
            is_deleted
            )
        VALUES ( 
            :header,
            :text,
            :deleted
        );
    ");
    $sql->bindValue(":header", $title);
    $sql->bindValue(":text", $script);
    $sql->bindValue(":deleted", $script);

    $sql->execute();
    header("Location: ../View/adminPrivacyPolicy.php");
} else {
    echo "Error";
}
