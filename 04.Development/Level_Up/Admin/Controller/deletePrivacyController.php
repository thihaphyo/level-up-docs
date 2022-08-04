<?php 
require_once "../Model/dbConnection.php";
$id = $_GET['id'];
$db = new DBConnect();
$connection = $db->Connect();

//Logical Delete
$sql = $connection->prepare("
    UPDATE M_POLICY SET 
    is_deleted = 1
    WHERE id = :id 
");
$sql->bindValue(":id", $id);
$sql->execute();
header("Location: ../View/adminPrivacyPolicy.php");