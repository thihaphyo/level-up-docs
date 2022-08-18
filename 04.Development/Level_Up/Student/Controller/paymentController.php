<?php

require_once "../Model/dbConnection.php";
//call dbConnection
$db2 = new DBConnect();
$dbconnect = $db2->connect();

$finalResult = array();
$finalResult['course'] = array();
$finalResult['total_price'] = 0;


foreach ($_SESSION['course_id_collection'] as $course) {
    echo "hello";
    $sql = $dbconnect->prepare("SELECT M_COURSES.id,M_COURSES.price,M_COURSES.course_title,M_COURSES.promo_percent FROM 
                            M_COURSES LEFT JOIN 
                            M_INSTRUCTORS ON 
                            M_INSTRUCTORS.id = M_COURSES.instructor_id 
                            WHERE M_COURSES.id IN ($course)
                        ");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
    array_push($finalResult['course'], $result);
    $finalResult['total_price'] += $result['price'];

    //     $sql = $dbconnect->prepare("SELECT SUM(price) AS price FROM 
    //                             M_COURSES 
    //                             WHERE M_COURSES.id IN ($in)
    //                     ");
    // $sql->execute();
    // $totalAmount = $sql->fetchAll(PDO::FETCH_ASSOC);

}
