<?php
session_start();
require_once("../../Model/dbConnection.php");


class AdminController extends DBConnect
{

    // create admin
    public function createAdmin()
    {

        try {

            $request_body = file_get_contents('php://input');
            $data = json_decode($request_body, true);
            $insertInfo = $data['info'];

            date_default_timezone_set('Asia/Yangon');
            $createdTime = date('Y-m-d H:i:s');

            $gotConnection = $this->connect();

            $sql = $gotConnection->prepare("INSERT INTO M_ADMINS (full_name,password,created_at,is_deleted,is_new) VALUES (:adminName, :adminPassword, :adminCreated, :deleted, :newUser)");

            $sql->bindValue(':adminName', $insertInfo['username']);
            $sql->bindValue(':adminPassword', $insertInfo['password']);
            $sql->bindValue(':adminCreated', $createdTime);
            $sql->bindValue(':deleted', 0);
            $sql->bindValue(':newUser', true);

            $sql->execute();
            $sql->fetchAll(PDO::FETCH_ASSOC);
            echo "*Successfully inserted into database*.<br />*Note: Please reload again to create new admin again*";
        } catch (\Throwable $th) {
            echo "Fail, something went wrong. Please try reload again.";
        }
    }

    // update admin
    public function updateAdmin($updateInfo)
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare("UPDATE M_ADMINS SET full_name = :adminName, password = :adminPassword,email = :adminEmail,phone_number = :adminPhone,country_code = :adminCountryCode,address = :adminAddress,profile_image = :adminProfile,updated_at = :adminUpdated, is_new = :isNew  WHERE id = :adminId AND is_deleted = 0");

            // bind each of every admin info
            $sql->bindValue(':adminId', $updateInfo['adminId']);
            $sql->bindValue(':adminName', $updateInfo['adminName']);
            $sql->bindValue(':adminPassword', $updateInfo['adminPassword']);
            $sql->bindValue(':adminEmail', $updateInfo['adminEmail']);
            $sql->bindValue(':adminPhone', $updateInfo['adminPhone']);
            $sql->bindValue(':adminCountryCode', $updateInfo['adminCountryCode']);
            $sql->bindValue(':adminAddress', $updateInfo['adminAddress']);
            $sql->bindValue(':adminProfile', $updateInfo['adminProfile']);
            $sql->bindValue(':adminUpdated', $updateInfo['adminUpdated']);
            $sql->bindValue(':isNew', $updateInfo['adminNewUpdate']);

            //execute the sql query
            $sql->execute();
            $sql->fetchAll(PDO::FETCH_ASSOC);


            if ($updateInfo['adminIsNew'] == true) {

                //add success message to sessions
                $message = array('status' => 'Successful', 'title' => 'Welcome,' . $updateInfo['adminName'], 'description' => 'The data is successfully updated in the database.');
            } else {
                //add success message to sessions
                $message = array('title' => 'Successful', 'description' => 'The data is successfully updated in the database.');
            }
            $_SESSION['message'] = $message;
        } catch (\Throwable $th) {
            //add fail message to sessions
            $message = array('title' => 'Fail', 'description' => 'Something went wrong.Please try again.', 'error' => $th);
            $_SESSION['message'] = $message;
        } finally {
            $_SESSION['adminId'] = $updateInfo['adminId'];
        }
    }
    // for file management
    public function manageFile($fileInfo)
    {
        try {
            if (($fileInfo['profile']['name'] != "")) {
                // Where the file is going to be stored
                $targetDirectory = "../../View/resources/img/admin profile picture/";
                $file = $fileInfo['profile']['name'];


                //break down file into serval peices
                $path = pathinfo($file);

                //get the file name
                $filename = $path['basename'];

                //get the file from temp
                $tempName = $fileInfo['profile']['tmp_name'];

                //concat the pieces of the file to get full url
                $fullPath = $targetDirectory . $filename;

                if (!file_exists($fullPath)) {
                    move_uploaded_file($tempName, $fullPath);
                    echo "Congratulations! File Uploaded Successfully.";
                }
                return $file;
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}

if (isset($_POST)) {

    $theAdmin = new AdminController();
    try {

        echo "<pre>";

        if (!empty(file_get_contents('php://input'))) {
            $extractContent = file_get_contents(('php://input'));
            $extractContent = json_decode($extractContent);
            $routeName = $extractContent->{'info'}->{'path'};
        } else {
            $path = $theAdmin->stringEncryption('decrypt', $_POST['adminId']);

            $routeName = explode("-", $path)[1];
            $adminId = explode("-", $path)[0];
        }
        if ($routeName == "list") {
            $theAdmin->createAdmin();
        }
        if ($routeName == "insert" || $routeName == "update") {

            $file = $theAdmin->manageFile($_FILES);
            date_default_timezone_set('Asia/Yangon');
            $updatedTime = date('Y-m-d H:i:s');

            $_POST['pwd'] = $theAdmin->stringEncryption('encrypt', $_POST['pwd']);

            $adminInfo = array("adminId" => $adminId, "adminName" => $_POST['name'], "adminPassword" =>  $_POST['pwd'], "adminEmail" => $_POST['email'], "adminPhone" => $_POST['phone'], "adminCountryCode" => $_POST['countryCode'],     "adminAddress" => $_POST['address'], "adminUpdated" => $updatedTime, "adminProfile" => $file, "adminNewUpdate" => 0);

            if ($routeName == "insert") {
                $adminInfo['adminIsNew'] = true;
            }
            $theAdmin->updateAdmin($adminInfo);

            if ($routeName == "insert") {
                header('location: ../../View/dashboard.php');
            } else {
                header('location: ../../View/adminProfile.php');
            }
        }
    } catch (PDOException $th) {
        echo $th;
    }
} else {
    echo "<h1>Bad Request</h1>";
}
