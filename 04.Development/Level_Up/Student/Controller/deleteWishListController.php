<?php


require_once "../Model/dbConnection.php";

session_start();
$db = new DBConnect();
$connection = $db->connect();

$studentId = $_SESSION['studentId'];
$courseId = $_SESSION['courseId'];

$sql = $connection->prepare('DELETE FROM T_STUDENT_WHISHLIST WHERE student_id = :studentId AND course_id = :courseId');

$sql->bindValue(":studentId", $studentId);
$sql->bindValue(":courseId", $courseId);
$sql->execute();
