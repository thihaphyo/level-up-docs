<?php

require_once "../Model/forgetpsDBtable.php";
require_once "./sendmailcontroller.php";
require "../Controller/verifycontroller.php";
if (isset($_POST)) {


    $email = $_POST['email'];





        $vcode = generateCode();

        $db = new DBConnect();
        $connection = $db->Connect();
        // set data form insert form to database 
        $sql = $connection->prepare("
            INSERT INTO users(
                email,
                verification_code,
                email_verified_at	

                )
            VALUES (
                :email,
                0,
                :code
            );
            ");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":code", $vcode);
        $sql->execute();
        

        $mailSend->sendMail();

    }
else {
    echo "Error";
}


function generateCode()
{
    $character = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomCode = "";
    for ($i=0; $i < 128 ; $i++) { 
         $randomCode .= $character[rand(0, strlen($character)-1)];
    }
    return $randomCode;
}