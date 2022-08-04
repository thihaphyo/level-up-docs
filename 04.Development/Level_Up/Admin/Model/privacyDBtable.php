<?php
$hostname = "localhost";
$port = "3306";
$dbname = "levelupdb";
$username = "root";
$password = "";

$pdo = new PDO(
    "mysql:host=$hostname;
    port=$port;
    dbname=$dbname",
    $username,
    $password
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $pdo->prepare("SELECT * FROM m_policy");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($result);
