<?php


require_once "../Model/dbConnection.php";

session_start();
$db = new DBConnect();
$connection = $db->connect();

$courseId = $_SESSION['courseId'];

if (isset($_SESSION['studentId'])) {
    $studentId = $_SESSION['studentId'];
    // $studentId = 1;
    $sql = $connection->prepare('
    INSERT INTO T_STUDENT_CART (
        student_id,
        course_id,
        created_at)
    VALUES(
        :studentId,
        :courseId,
        :created_at
        );
');

    $sql->bindValue(":studentId", $studentId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(':created_at', date("Y/m/d"));
    $sql->execute();
}

echo "./signup.html";
