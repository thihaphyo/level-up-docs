<?php
require_once "../Model/dbConnection.php";
//call dbConnection

$db2 = new DBConnect();
$dbconnect = $db2->connect();
$result = array();

foreach ($_SESSION['course_id_collection'] as $course) {
    $sql = $dbconnect->prepare("SELECT * FROM 
                            M_COURSES LEFT JOIN 
                            M_INSTRUCTORS ON 
                            M_INSTRUCTORS.id = M_COURSES.instructor_id 
                            WHERE M_COURSES.id IN ($course)
                        ");
    $sql->execute();
    array_push($result, $sql->fetchAll(PDO::FETCH_ASSOC)[0]);
}
// echo "<pre>";
// print_r($result);