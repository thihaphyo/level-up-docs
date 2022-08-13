<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();

$chapterId = $_SESSION['chapterId'];

$sql = $connection->prepare("
    DELETE FROM T_QUIZS 
    WHERE chapter_id = $chapterId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM T_LECTURES 
    WHERE chapter_id = $chapterId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM T_CHAPTERS 
    WHERE id = $chapterId;
");
$sql->execute();

header("Location: ../View/uploadCourse.php");
