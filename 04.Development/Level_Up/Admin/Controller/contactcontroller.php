<?php

require "../Model/contactDBtable.php";
if (isset($_POST)) {
    $number = $_POST['phone-number'];
    $email = $_POST['email-address'];
print_r($_POST);
    $image = $_FILES['image']['name'];
    $location = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($location, "../storage/$image")) {
        $sql = $pdo->prepare("
        INSERT INTO  M_CONTACTS(
            phone_number,email,profile_image)
            VALUES (:number,:email,:image
            )");

        $sql->bindValue(":number", $number);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":image", $image);
        $sql->execute();
    }
}
