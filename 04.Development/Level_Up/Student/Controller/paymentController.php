<?php 
session_start();

$courseId = $_SESSION["checkout"];

require_once "../Model/dbConnection.php";
//call dbConnection
$db2 = new DBConnect();
$dbconnect = $db2->connect();

$in = $_SESSION["checkout"];
$sql = $dbconnect->prepare("SELECT * FROM 
                            m_courses LEFT JOIN 
                            m_instructors ON 
                            m_instructors.id = m_courses.instructor_id 
                            WHERE m_courses.id IN ($in)
                        ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $dbconnect->prepare("SELECT SUM(price) AS price FROM 
                            m_courses 
                            WHERE m_courses.id IN ($in)
                        ");
$sql->execute();
$totalAmount = $sql->fetchAll(PDO::FETCH_ASSOC);
