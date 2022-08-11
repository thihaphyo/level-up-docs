<?php


require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();
$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $chapterTitle = $data["chapterTitle"];

    $sql = $connection->prepare("
        UPDATE T_CHAPTERS SET chapter_title = :chapterTitle, updated_at = :updatedDate WHERE id = :chapterId;
    ");

    $sql->bindValue(":chapterTitle", $chapterTitle);
    $sql->bindValue(":updatedDate", date("Y/m/d"));
    $sql->bindValue(":chapterId", $chapterId);
    $sql->execute();

    echo "../View/uploadCourse.php";
} else {
    $sql = $connection->prepare("
        INSERT INTO T_CHAPTERS(
            instructor_id,
            course_id,
            chapter,
            created_at
        )VALUES(
            :instructorId,
            :courseId,
            (SELECT IF(Max(chapter)>0,Max(chapter),0) + 1 AS chapterNo FROM T_CHAPTERS AS m_c WHERE m_c.instructor_id = :instructorNo AND m_c.course_id = :courseNo),
            :createdDate
        );
    ");

    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":createdDate", date("Y/m/d"));
    $sql->bindValue(":instructorNo", $instructorId);
    $sql->bindValue(":courseNo", $courseId);
    $sql->execute();

    $sql = $connection->prepare("
    SELECT MAX(id) AS chapterId FROM T_CHAPTERS");
    $sql->execute();
    $chapterId = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['chapterId'] = $chapterId[0]['chapterId'];

    header("Location: ../View/addChapters.php");
}
