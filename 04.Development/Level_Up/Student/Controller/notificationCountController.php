<?php 

require_once "../Model/dbConnection.php";
//call dbConnection
$db= new DBConnect();
$dbconnect = $db ->connect();

$sql = $dbconnect->prepare("SELECT * FROM M_NOTIFICATIONS WHERE is_deleted = 0 AND target != 'INSTRUCTORS' ");
$sql->execute();
$notiCount = $sql->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($notiCount);