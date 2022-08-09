<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();
$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $requirement = $data['requirement'];

    $sql = $connection->prepare("
        INSERT INTO T_COURSE_REQUIREMENTS(
            instructor_id,
            course_id,
            requirement_title
        )VALUES(
            :instructorId,
            :courseId,
            :requirement
        );
    ");

    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":requirement", $requirement);
    $sql->execute();

    // get select all data from database
    $sql = $connection->prepare("SELECT * FROM T_COURSE_REQUIREMENTS WHERE instructor_id = $instructorId AND course_id = $courseId;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} else {
    // get select all data from database
    $sql = $connection->prepare("SELECT * FROM T_COURSE_REQUIREMENTS WHERE instructor_id = $instructorId AND course_id = $courseId;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
