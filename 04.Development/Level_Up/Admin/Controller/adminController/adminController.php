<?php

require_once("../../Model/dbConnection.php");


class AdminController extends DBConnect
{
    public function createAdmin(array $insertInfo)
    {
        print_r($insertInfo);
        // parent::connect();
        $gotConnection = $this->connect();

        $sql = $gotConnection->prepare("INSERT INTO M_ADMINS (full_name,password,email,phone_number,country_code,address,profile_image,created_at) VALUES (:adminName, :adminPassword, :adminEmail, :adminPhone, :adminCountryCode, :adminAddress, :adminProfile,:adminCreated)");

        $sql->bindValue(':adminName', $insertInfo['adminName']);
        $sql->bindValue(':adminPassword', $insertInfo['adminPassword']);
        $sql->bindValue(':adminEmail', $insertInfo['adminEmail']);
        $sql->bindValue(':adminPhone', $insertInfo['adminPhone']);
        $sql->bindValue(':adminCountryCode', $insertInfo['adminCountryCode']);
        $sql->bindValue(':adminAddress', $insertInfo['adminAddress']);
        $sql->bindValue(':adminProfile', $insertInfo['adminProfile']);
        $sql->bindValue(':adminCreated', $insertInfo['adminCreated']);

        $sql->execute();
        $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (isset($_POST)) {

    $theAdmin = new AdminController();
    try {
        if (($_FILES['profile']['name'] != "")) {
            // Where the file is going to be stored
            $targetDirectory = "../../View/resources/img/admin profile picture/";
            $file = $_FILES['profile']['name'];


            //break down file into serval peices
            $path = pathinfo($file);

            //get the file name
            $filename = $path['basename'];

            //get the file from temp
            $tempName = $_FILES['profile']['tmp_name'];

            //concat the pieces of the file to get full url
            $fullPath = $targetDirectory . $filename;

            if (!file_exists($fullPath)) {
                move_uploaded_file($tempName, $fullPath);
                echo "Congratulations! File Uploaded Successfully.";
            }
        }

        date_default_timezone_set('Asia/Yangon');
        $createdTime = date('Y-m-d H:i:s');

        $adminInfo = array("adminName" => $_POST['name'], "adminPassword" =>  $_POST['pwd'], "adminEmail" => $_POST['email'], "adminPhone" => $_POST['phone'], "adminCountryCode" => $_POST['countryCode'], "adminAddress" => $_POST['address'], "adminCreated" => $createdTime, "adminProfile" => $_FILES['profile']['name']);


        $theAdmin->createAdmin($adminInfo);
        header('location: ../../View/admin insert.php');
        
    } catch (PDOException $th) {
        echo $th;
    }
} else {
    echo "<h1>Bad Request</h1>";
}
