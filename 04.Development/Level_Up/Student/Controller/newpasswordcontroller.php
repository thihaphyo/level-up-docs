<?php
require_once "../Model/newpasswordDBtable.php";
if (isset($_POST)) {

    $newpassword = $_POST['newpassword'];
    $email = $_POST['email'];

    // set data form insert form to database 
    $sql = $pdo->prepare("
            INSERT INTO t_login_in (
                email,
                password
            
                )
            VALUES (
                :email,
               :newpassword
            );
            ");
    $sql->bindValue(":email", $email);
    $sql->bindValue(":newpassword", $newpassword);
    $sql->execute();


     header("Location: ../View/newlognin.php");
} else {
    echo "Error";
} 

