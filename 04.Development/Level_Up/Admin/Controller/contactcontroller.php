<?php

require "../Model/contactDBtable.php";
if(isset($_POST)){
    $number = $_POST['phone-number'];
    $email = $_POST['email-address'];
       
            
    $sql = "INSERT INTO  M_CONTACTS(phone_number,email)
            VALUES ($number,$email)";
    ;

}
