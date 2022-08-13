<?php

require_once "../Model/dbConnection.php";

$id = $_GET['id'];
// echo $id;
$db = new DBConnect();
$connection = $db->Connect();

//get select ID data from database
$sql = $connection->prepare("SELECT * FROM M_INSTRUCTORS WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

$result = $sql->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($result);
require "../View/InstructorProfileView.php";
// header("Location: ../View/notiHistory.php");
