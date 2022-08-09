<?php

require_once "../Model/dbConnection.php";
// require_once "./DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

// if ($delete == 1) {
//     $sql = $connection->prepare("
//         DELETE FROM m_courseinfo WHERE updatedDate is NULL;
//     ");
//     $sql->execute();
// }


$sql = $connection->prepare("
        SELECT * FROM M_COURSES WHERE updated_at IS NOT null;
    ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $connection->prepare("
    SELECT count(id) AS lectureNumber FROM T_CHAPTERS GROUP BY course_id;
");
$sql->execute();
$result1 = $sql->fetchAll(PDO::FETCH_ASSOC);
