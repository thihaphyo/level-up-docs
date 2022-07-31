<?php

$fistname = $_POST["username"];
$lastname = $_POST["contact-no"];
$email = $_POST["email"];
$question = $_POST["question"];
$conn = mysqli_connect("localhost", "root", "", "contact_database") or die("connection failed");
$sql = "INSERT INTO contact_form(Username, Contact_number, Email, Question) VALUES ('{$fistname}','{$lastname}','{$email}','{$question}' )";
$result = mysqli_query($conn, $sql) or die("Query Failed!");
header("location:http://localhost:81/New%20folder/04.Development/Level_Up/Student/View/contact.php");
mysqli_close($conn);
?>