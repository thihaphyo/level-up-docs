<?php
require_once "../Model/dbConnection.php";
$db = new DBConnect();
$connection = $db->Connect();
//set data insert form to database
$sql = $connection->prepare("SELECT * FROM T_BLACKLIST");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);