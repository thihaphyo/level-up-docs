<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$id = $_GET['id'];

$sql = $connection->prepare('SELECT * FROM t_lectures WHERE id = :id');
$sql->bindValue(":id", $id);
$sql->execute();

$result = $sql->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($result);

foreach ($result as $key => $value) {
    echo $key;
}

// header("Location: ../View/updateLecture.php");

// require "../View/updateLecture.php";
