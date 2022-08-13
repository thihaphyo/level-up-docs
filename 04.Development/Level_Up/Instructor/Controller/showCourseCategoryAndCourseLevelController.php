<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$sql = $connection->prepare("SELECT * FROM M_COURSE_CATEGORIES WHERE is_deleted = 0;");
$sql->execute();
$courseCategories = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $connection->prepare("SELECT * FROM M_COURSE_LEVELS WHERE is_deleted = 0;");
$sql->execute();
$courseLevel = $sql->fetchAll(PDO::FETCH_ASSOC);
