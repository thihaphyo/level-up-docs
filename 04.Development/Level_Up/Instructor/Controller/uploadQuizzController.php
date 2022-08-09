<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();

$instructorId = $_SESSION["instructorId"];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION["chapterId"];
$lectureId = $_SESSION['lectureId'];

if (count($_POST)) {
    $data =  json_decode($_POST["send"], true);

    $question = $data['question'];
    $answer1 = $data['answer1'];
    $answer2 = $data['answer2'];
    $answer3 = $data['answer3'];
    $realAnswer = $data["realAnswer"];

    $sql = $connection->prepare("
            INSERT INTO T_QUIZS(
                instructor_id,
                course_id,
                chapter_id,
                lecture_id,
                question,
                answer1,
                answer2,
                answer3,
                correct_answer
            )VALUES(
                :instructorId,
                :courseId,
                :chapterId,
                :lectureId,
                :question,
                :answer1,
                :answer2,
                :answer3,
                :realAnswer
            );
    ");

    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":chapterId", $chapterId);
    $sql->bindValue(":lectureId", $lectureId);
    $sql->bindValue(":question", $question);
    $sql->bindValue(":answer1", $answer1);
    $sql->bindValue(":answer2", $answer2);
    $sql->bindValue(":answer3", $answer3);
    $sql->bindValue(":realAnswer", $realAnswer);
    $sql->execute();

    // get select all data from database
    $sql = $connection->prepare("SELECT * FROM T_QUIZS WHERE instructor_id = $instructorId AND course_id = $courseId AND chapter_id = $chapterId AND lecture_id = $lectureId;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} else {
    // get select all data from database
    $sql = $connection->prepare("SELECT * FROM T_QUIZS WHERE instructor_id = $instructorId AND course_id = $courseId AND chapter_id = $chapterId AND lecture_id = $lectureId;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
