<?php 

require_once "../Model/dbConnection.php";
//call dbConnection
$db= new DBConnect();
$dbconnect = $db ->connect();

$sql = $dbconnect->prepare("SELECT * FROM m_notifications WHERE deleted_flag = 0 AND target != 'INSTRUCTORS' ");
$sql->execute();
$notiCount = $sql->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($notiCount);