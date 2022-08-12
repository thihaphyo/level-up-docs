<?php

require "../Model/contactDBtable.php";
require "../View/successful.php";
if (isset($_POST)) {
    $number = $_POST['phone-number'];
    $email = $_POST['email-address'];
    $image = $_FILES['image']['name'];
    $location = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($location, "../storage/$image")) {
        $sql = $pdo->prepare("
        UPDATE M_CONTACTS SET
            phone_number=:number,
            email=:email,
            profile_image=:image
            WHERE id=1;
            ");
        $sql->bindValue(":number", $number);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":image", $image);
        $sql->execute();
    }
}
