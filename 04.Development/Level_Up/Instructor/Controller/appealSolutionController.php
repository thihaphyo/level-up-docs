<?php
require_once "../Model/dbConnection.php";
if (isset($_POST)) {
    $instructorReply = $_POST['tSolution'];
        $db = new DBConnect();
        $connection = $db->Connect();
        //set data insert form to database
        $sql = $connection->prepare(" INSERT INTO t_appleals(solution) VALUES (:reply) ");
        $sql->bindValue(":reply", $instructorReply);
        $sql->execute();
        header("Location: ../View/appeal.php");
} else {
    echo "Error";
}