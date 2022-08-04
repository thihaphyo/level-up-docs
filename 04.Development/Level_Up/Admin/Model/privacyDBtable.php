<?php
$hostname = "levelup.cdiydtaeuqms.ap-southeast-1.rds.amazonaws.com";
$port = "3306";
$dbname = "levelupdb";
$username = "admin";
$password = "levelup123";

$pdo = new PDO(
    "mysql:host=$hostname;
    port=$port;
    dbname=$dbname",
    $username,
    $password
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $pdo->prepare("SELECT * FROM M_POLICY where is_deleted = 0");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($result);
