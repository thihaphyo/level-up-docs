<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();

$courseId = $_SESSION['courseId'];

$sql = $connection->prepare("
    DELETE FROM T_QUIZS 
    WHERE course_id = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM T_LECTURES 
    WHERE course_id = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM T_CHAPTERS 
    WHERE course_id = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM T_COURSE_PROFITS 
    WHERE course_id = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM T_COURSE_REQUIREMENTS 
    WHERE course_id = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM M_COURSES 
    WHERE id = $courseId;
");
$sql->execute();

header("Location: ../View/courselist.php");
