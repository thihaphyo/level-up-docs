<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();


$chapterId = $_SESSION['chapterId'];
$lectureId = $_SESSION['lectureId'];

$sql = $connection->prepare("
    DELETE FROM T_QUIZS 
    WHERE lecture_id = $lectureId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM T_LECTURES 
    WHERE id = $lectureId;
");
$sql->execute();

header("Location: ../View/addChapters.php");
