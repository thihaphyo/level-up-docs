<?php

require_once ("../Model/dbConnection.php");

$db =  new DBConnect();
$connection = $db->connect();

$query = "SELECT * FROM M_GUIDES WHERE is_deleted = 0";

$sql = $connection->prepare($query);
$sql->execute();

$guideList = $sql->fetchAll(PDO::FETCH_ASSOC);

