<?php

require_once "../Model/forgetpsDBtable.php";
require_once "../Controller/sendmailcontroller.php";

if (isset($_POST)) {

    $address = $_POST['email'];
    $vcode = generateCode();

    // set data form insert form to database 
    $sql = $pdo->prepare("
            INSERT INTO users(
                email,
                verify,
                verifyCode
                )
            VALUES (
               :address,
                0,
                :code
            );
            ");

    $sql->bindValue(":address", $address);

    $sql->bindValue(":code", $vcode);
    $sql->execute();

    $mailSend = new SendMail($vcode);
    $mailSend->sendMail();
} else {
    echo "Error";
}


function generateCode()
{
    $character = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomCode = "";
    for ($i = 0; $i < 128; $i++) {
        $randomCode .= $character[rand(0, strlen($character) - 1)];
    }
    return $randomCode;
}
