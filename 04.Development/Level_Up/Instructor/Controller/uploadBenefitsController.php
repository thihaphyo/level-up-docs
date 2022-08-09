<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();
$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $benefit = $data['benefit'];

    $sql = $connection->prepare("
        INSERT INTO T_COURSE_PROFITS(
            instructor_id,
            course_id,
            benefits
        )VALUES(
            :instructorId,
            :courseId,
            :benefit
        );
    ");

    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":benefit", $benefit);
    $sql->execute();

    // get select all data from database
    $sql = $connection->prepare("SELECT * FROM T_COURSE_PROFITS WHERE instructor_id = $instructorId AND course_id = $courseId;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} else {
    // get select all data from database
    $sql = $connection->prepare("SELECT * FROM T_COURSE_PROFITS WHERE instructor_id = $instructorId AND course_id = $courseId;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
