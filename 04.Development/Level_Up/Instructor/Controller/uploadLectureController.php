<?php

session_start();
require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];
$lectureId = $_SESSION['lectureId'];

if (count($_POST)) {
    // $date = date('Y-m-d H:i:s');
    $lectureTitle = $_POST["lectureTitle"];
    $lectureDescription = $_POST["lectureDescription"];
    $lectureScript = $_POST["lectureScripts"];

    
    // $videoFile = $_FILES["video"]["name"];
    // $location = $_FILES["video"]["tmp_name"];

    if (move_uploaded_file($location, "../Storage/videos/$videoFile")) {
        try {
            $sql = $connection->prepare("
            UPDATE T_LECTURES SET
            lecture_title = :lectureTitle,
            lecture_description = :lectureDescription,
            lecture_script = :lectureScript,
            updated_at = :updatedDate
            WHERE id = :lectureId;
        ");

            $sql->bindValue(":lectureId", $lectureId);
            // $sql->bindValue(":lectureVideo", $videoFile);
            $sql->bindValue("lectureTitle", $lectureTitle);
            $sql->bindValue(":lectureDescription", $lectureDescription);
            $sql->bindValue(":lectureScript", $lectureScript);
            $sql->bindValue(":updatedDate", date("Y/m/d"));
            $sql->execute();

            $sql = $connection->prepare("
                SELECT * FROM T_LECTURES WHERE instructor_id = $instructorId AND course_id = $courseId AND chapter_id = $chapterId;
            ");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            header("Location: ../View/addChapters.php");
            die();
        } catch (PDOException $th) {
            var_dump($th);
        }
    }
} else {
    $sql = $connection->prepare("
    INSERT INTO T_LECTURES (
        instructor_id,
        course_id,
        chapter_id,
        created_at
        )VALUES(
            :instructorId,
            :courseId,
            :chapterId,
            :createdDate
        );
    ");
    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":chapterId", $chapterId);
    $sql->bindValue(":createdDate", date("Y/m/d"));
    $sql->execute();

    $sql = $connection->prepare("SELECT MAX(id) AS id FROM T_LECTURES;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['lectureId'] = $result[0]['id'];

    require "./showLectureController.php";

    header("Location: ../View/uploadlecture.php");
}


// Die Function 
// function redirect($url, $statusCode = 303)
// {
//    header('Location: ' . $url, true, $statusCode);
//    die();
// }
