<?php
session_start();

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$courseId = $_SESSION['courseId'];

if (isset($_POST)) {

    $courseTitle = $_POST["courseTitle"];
    $aboutCourse = $_POST["aboutCourse"];
    $courseDescription = $_POST['courseDescription'];
    $whoCourse = $_POST['whoCourse'];
    $courseCoverPhoto = $_FILES["file"]["name"];
    $location = $_FILES["file"]["tmp_name"];
    $coursePrice = $_POST['coursePrice'];
    $courseDuration = $_POST['courseDuration'];
    $courseLevel = $_POST['courseLevel'];
    $courseCategory = $_POST['courseCategory'];
    $coursePercentage = $_POST['coursePercentage'];
    $coursePromotedPrice = $_POST['coursePromotedPrice'];

    if (move_uploaded_file($location, "../images/$courseCoverPhoto")) {
        try {
            $sql = $connection->prepare("
            UPDATE M_COURSES SET
            course_title = :courseTitle,
            course_info = :aboutCourse,
            course_description = :courseDescription,
            course_target = :whoCourse,
            course_cover_image = :courseCoverPhoto,
            duration = :courseDuration,
            level_id = :courseLevel,
            category_id = :courseCategory,
            promo_percent = :coursePromotion,
            price = :coursePrice,
            promo_price = :coursePromotedPrice,
            updated_at = :updatedDate
            WHERE id = :courseId;
        ");

            $sql->bindValue(":courseTitle", $courseTitle);
            $sql->bindValue(":aboutCourse", $aboutCourse);
            $sql->bindValue(":courseDescription", $courseDescription);
            $sql->bindValue(":whoCourse", $whoCourse);
            $sql->bindValue(":courseCoverPhoto", $courseCoverPhoto);
            $sql->bindValue(":courseDuration", $courseDuration);
            $sql->bindValue(":courseLevel", $courseLevel);
            $sql->bindValue(":courseCategory", $courseCategory);
            $sql->bindValue(":coursePromotion", $coursePercentage);
            $sql->bindValue(":coursePrice", $coursePrice);
            $sql->bindValue(":coursePromotedPrice", $coursePromotedPrice);
            $sql->bindValue(":updatedDate", date("Y/m/d"));
            $sql->bindValue(":courseId", $courseId);
            $sql->execute();

            echo "./courselist.php";
        } catch (PDOException $th) {
            var_dump($th);
        }
    }
} else {
    // get select all data from database
    // $sql = $connection->prepare("SELECT * FROM t_benefits;");
    // $sql->execute();
    // $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    // echo json_encode($result);

    echo "ERROR";
}
