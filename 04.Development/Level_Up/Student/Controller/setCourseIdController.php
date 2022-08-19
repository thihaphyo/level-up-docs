<?php

session_start();
$id = $_GET['id'];

$_SESSION['courseId'] = $id;

header("Location: ../View/courseinfo.php");
