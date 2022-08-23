<?php


require_once "../Model/dbConnection.php";

session_start();
$db = new DBConnect();
$connection = $db->connect();

// $courseId = $_SESSION['courseId'];

if (isset($_SESSION['studentId'])) {
    $studentId = $_SESSION['studentId'];

    echo "./checkout.php";
}

echo "./signup.html";
