<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];

$sql = $connection->prepare("
            SELECT * FROM T_LECTURES WHERE instructor_id = $instructorId AND course_id = $courseId AND chapter_id = $chapterId;
        ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
