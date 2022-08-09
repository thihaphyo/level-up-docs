<?php

require_once "../Model/dbConnection.php";
session_start();

$db = new DBConnect();
$connection = $db->Connect();

$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];
$lectureId = $_SESSION['lectureId'];


if (isset($_POST)) {
        $data = json_decode($_POST["send"], true);

        $lectureVideo = $data['videoURL'];

        $sql = $connection->prepare("
            UPDATE t_lectures SET
                lectureVideo = :lectureVideo,
                updatedDate = :updatedDate
                WHERE id = :lectureId;
        ");

        $sql->bindValue(":lectureVideo", $lectureVideo);
        $sql->bindValue(":updatedDate", date("Y/m/d"));
        $sql->bindValue(":lectureId", $lectureId);

        $sql->execute();
}

// echo "../View/uploadlecture.php";


// Die Function 
// function redirect($url, $statusCode = 303)
// {
//    header('Location: ' . $url, true, $statusCode);
//    die();
// }
