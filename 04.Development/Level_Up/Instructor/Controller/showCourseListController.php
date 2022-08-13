<?php

require_once "../Model/dbConnection.php";
// require_once "./DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$sql = $connection->prepare("
    SELECT a.id as pCID, a.course_id as cID, b.course_title,
    b.course_cover_image, b.duration, d.level_name as level,
    (
        SELECT SUM(rating) from levelupdb.T_COURSE_REVIEW_RATES z
        WHERE z.course_id = a.course_id
        
    ) as total_rating,
    (
        SELECT COUNT(*) from levelupdb.T_COURSE_REVIEW_RATES z
        WHERE z.course_id = a.course_id
        
    ) as total_rated,
    (
        SELECT COUNT(f.id) from levelupdb.T_LECTURES f, levelupdb.T_CHAPTERS h
        WHERE f.chapter_id = h.id
        AND h.course_id = a.course_id
        
    ) as lectureCount
    FROM levelupdb.T_STUDENT_PURCHASED_COURSES a, 
    levelupdb.M_COURSES b, levelupdb.M_INSTRUCTORS c ,
    levelupdb.M_COURSE_LEVELS d
    where a.course_id = b.id
    and b.instructor_id = c.id
    and d.id = b.level_id
    and a.is_deleted = 0
    ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $connection->prepare("
    SELECT count(id) AS lectureNumber FROM T_CHAPTERS GROUP BY course_id;
");
$sql->execute();
$result1 = $sql->fetchAll(PDO::FETCH_ASSOC);
