<?php 

session_start();

$_SESSION["checkout"] = "2,3";

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
// echo "<pre>";
// print_r($result);