<?php 
require_once "../Model/dbConnection.php";
$id = $_GET['id'];
$db = new DBConnect();
$connection = $db->Connect();

//Logical Delete
$sql = $connection->prepare("
    UPDATE m_notification SET 
    delete_flag = 1
    WHERE id = :id 
");
$sql->bindValue(":id", $id);
$sql->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
