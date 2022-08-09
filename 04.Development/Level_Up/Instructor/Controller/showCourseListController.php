<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$sql = $connection->prepare("
        SELECT * FROM m_courseinfo WHERE updatedDate IS NOT null ORDER BY id DESC ;
    ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $connection->prepare("
    SELECT count(id) AS lectureNumber FROM m_chapter GROUP BY courseId;
");
$sql->execute();
$result1 = $sql->fetchAll(PDO::FETCH_ASSOC);
