<?php

require_once "../Model/forgetpsDBtable.php";
$code = $_GET['code'];

$db = new DBConnect();
$connection = $db->Connect();

// get select all data from database
$sql = $connection->prepare("SELECT * FROM M_Student WHERE verifyCode = :code");
$sql->bindValue(':code', $code);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


if(count($result) > 0){
    $id =$result[0]['id'];

    $sql = $connection->prepare("
              UPDATE M_Student SET
              verify = 1
              WHERE id = :id
            ");
    $sql->bindValue(":id", $id);
    $sql->execute();

   echo "Verification was Successfully.";
   echo "<a href='http://localhost/Register/View/login.php'>Login</a>";

    
}else{
    echo "Your Verification Code was Wrong.";
}

