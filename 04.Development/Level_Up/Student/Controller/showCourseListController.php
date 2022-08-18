<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->connect();

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $courseCategoryId = $data['courseCategoryId'];

    if ($courseCategoryId == "all") {
        $sql = $connection->prepare("
            SELECT
            a.id AS pCID,
            a.course_id AS cID,
            b.instructor_id,
            b.course_title,
            b.price,
            b.course_cover_image,
            b.category_id,
            b.duration,
            d.level_name AS LEVEL,
            c.full_name AS instructorName,
            e.category_name,
            (
            SELECT
                SUM(rating)
            FROM
                levelupdb.T_COURSE_REVIEW_RATES z
            WHERE
                z.course_id = a.course_id
        ) AS total_rating,
        (
            SELECT
                COUNT(*)
            FROM
                levelupdb.T_COURSE_REVIEW_RATES z
            WHERE
                z.course_id = a.course_id
        ) AS total_rated,
        (
            SELECT
                COUNT(f.id)
            FROM
                levelupdb.T_LECTURES f,
                levelupdb.T_CHAPTERS h
            WHERE
                f.chapter_id = h.id AND h.course_id = a.course_id
        ) AS lectureCount
        FROM
            levelupdb.T_STUDENT_PURCHASED_COURSES a,
            levelupdb.M_COURSES b,
            levelupdb.M_INSTRUCTORS c,
            levelupdb.M_COURSE_LEVELS d,
            levelupdb.M_COURSE_CATEGORIES e
        WHERE
            a.course_id = b.id AND b.instructor_id = c.id AND d.id = b.level_id AND e.id = 1 AND a.is_deleted = 0
    ");
        $sql->execute();
        $course = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $sql = $connection->prepare("
            SELECT
                a.id AS pCID,
                a.course_id AS cID,
                b.instructor_id,
                b.course_title,
                b.price,
                b.course_cover_image,
                b.category_id,
                b.duration,
                d.level_name AS LEVEL,
                c.full_name AS instructorName,
                e.category_name,
            (
            SELECT
                SUM(rating)
            FROM
                levelupdb.T_COURSE_REVIEW_RATES z
            WHERE
                z.course_id = a.course_id
                ) AS total_rating,
            (
            SELECT
                COUNT(*)
            FROM
                levelupdb.T_COURSE_REVIEW_RATES z
            WHERE
                    z.course_id = a.course_id
                ) AS total_rated,
            (
            SELECT
                COUNT(f.id)
            FROM
                levelupdb.T_LECTURES f,
                levelupdb.T_CHAPTERS h
            WHERE
                    f.chapter_id = h.id AND h.course_id = a.course_id
                ) AS lectureCount
            FROM
                levelupdb.T_STUDENT_PURCHASED_COURSES a,
                levelupdb.M_COURSES b,
                levelupdb.M_INSTRUCTORS c,
                levelupdb.M_COURSE_LEVELS d,
                levelupdb.M_COURSE_CATEGORIES e
            WHERE
                a.course_id = b.id AND 
                b.instructor_id = c.id AND 
                d.id = b.level_id AND 
                b.category_id = e.id AND 
                b.category_id = :courseCategoryId AND 
                a.is_deleted = 0
    ");
        $sql->bindValue(":courseCategoryId", $courseCategoryId);
        $sql->execute();
        $course = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    $sql = $connection->prepare("
    SELECT
    a.id AS pCID,
    a.course_id AS cID,
    b.instructor_id,
    b.course_title,
    b.price,
    b.course_cover_image,
    b.category_id,
    b.duration,
    d.level_name AS LEVEL,
    c.full_name AS instructorName,
    e.category_name,
    (
    SELECT
        SUM(rating)
    FROM
        levelupdb.T_COURSE_REVIEW_RATES z
    WHERE
        z.course_id = a.course_id
) AS total_rating,
(
    SELECT
        COUNT(*)
    FROM
        levelupdb.T_COURSE_REVIEW_RATES z
    WHERE
        z.course_id = a.course_id
) AS total_rated,
(
    SELECT
        COUNT(f.id)
    FROM
        levelupdb.T_LECTURES f,
        levelupdb.T_CHAPTERS h
    WHERE
        f.chapter_id = h.id AND h.course_id = a.course_id
) AS lectureCount
FROM
    levelupdb.T_STUDENT_PURCHASED_COURSES a,
    levelupdb.M_COURSES b,
    levelupdb.M_INSTRUCTORS c,
    levelupdb.M_COURSE_LEVELS d,
    levelupdb.M_COURSE_CATEGORIES e
WHERE
    a.course_id = b.id AND b.instructor_id = c.id AND d.id = b.level_id AND e.id = 1 AND a.is_deleted = 0
    ");
    $sql->execute();
    $course = $sql->fetchAll(PDO::FETCH_ASSOC);
}
