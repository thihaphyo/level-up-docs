<?php

require_once "../Model/dbConnection.php";

$id = $_GET['id'];
$db = new DBConnect();
$connection = $db->Connect();

//get select ID data from database
$sql = $connection->prepare("SELECT * FROM m_policy WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

$result = $sql->fetchAll(PDO::FETCH_ASSOC);
require "../View/adminPrivacyPolicyEdit.php";
?>