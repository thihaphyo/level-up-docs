<?php
// session_start();

// $courseId = $_SESSION["checkout"];

require_once "../Model/dbConnection.php";
//call dbConnection
$db2 = new DBConnect();
$dbconnect = $db2->connect();

$in = 1;
$sql = $dbconnect->prepare("SELECT * FROM 
                            M_COURSES LEFT JOIN 
                            M_INSTRUCTORS ON 
                            M_INSTRUCTORS.id = M_COURSES.instructor_id 
                            WHERE M_COURSES.id IN ($in)
                        ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $dbconnect->prepare("SELECT SUM(price) AS price FROM 
                            M_COURSES 
                            WHERE M_COURSES.id IN ($in)
                        ");
$sql->execute();
$totalAmount = $sql->fetchAll(PDO::FETCH_ASSOC);
