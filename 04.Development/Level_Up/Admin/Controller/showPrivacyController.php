<?php 

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

//get all data from database
$sql = $connection->prepare("SELECT * FROM M_POLICY WHERE is_deleted = 0"); 
//  WHERE deleted = 0
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);