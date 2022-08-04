<?php 

require_once "../Model/dbConnection.php";
//call dbConnection
$db2 = new DBConnect();
$dbconnect = $db2->connect();

$sql = $dbconnect->prepare("SELECT * FROM m_notification WHERE delete_flag = 0");
$sql->execute();

$notiCount = $sql->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($result);