<?php

require_once "../Model/forgetpsDBtable.php";
require_once "../View/successful.php";
$code = $_GET['code'];


// get select all data from database
$sql = $pdo->prepare("SELECT * FROM users WHERE verifyCode = :code");
$sql->bindValue(':code', $code);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


if(count($result) > 0){
    $id =$result[0]['id'];

    $sql = $pdo->prepare("
              UPDATE users SET
              verify = 1
              WHERE id = :id
            ");
    $sql->bindValue(":id", $id);
    $sql->execute();

  

    
}else{
    echo "Your Verification Code was Wrong.";
}

