<?php
session_start();
require_once("../Model/dbConnection.php");


class ApplyInstructor extends DBConnect
{
    // create admin
    public function applyNow($instructorInfo)
    {

        try {

            date_default_timezone_set('Asia/Yangon');
            $createdTime = date('Y-m-d H:i:s');
            $graduatedYear = $instructorInfo['from'] . "-" . $instructorInfo['to'];

            $gotConnection = $this->connect();

            $sql = $gotConnection->prepare("INSERT INTO M_INSTRUCTORS (full_name,email,phone,address,graduated_degree,graduated_year,job_position, apply_reason,status,created_at) VALUES (:fullname, :email, :phone,:address,:degree,:gyear,:position,:reason,:status,:createdTime)");

            print_r($instructorInfo);

            $sql->bindValue(':fullname', ucwords($instructorInfo['fullname']));
            $sql->bindValue(':email', $instructorInfo['email']);
            $sql->bindValue(':phone', $instructorInfo['countryCode'] . $instructorInfo['phone']);
            $sql->bindValue(':address', ucwords($instructorInfo['address']));
            $sql->bindValue(':degree', ucwords($instructorInfo['degree']));
            $sql->bindValue(':gyear', $graduatedYear);
            $sql->bindValue(':position', ucwords($instructorInfo['position']));
            $sql->bindValue(':reason', $instructorInfo['reason']);
            $sql->bindValue(':status', 'pending');
            $sql->bindValue(':createdTime', $createdTime);

            // $sql->execute();
            // $sql->fetchAll(PDO::FETCH_ASSOC);

            // header('location: ../View/apply instructor success.php');
        } catch (\Throwable $th) {
            echo $th;
            $message = array('title' => 'Fail', 'description' => 'Something went wrong. Please try again. Sorry for inconvenience');
            $_SESSION['message'] = $message;
            header('location: ../View/apply instructor.php');
        }
    }
}
if (isset($_POST)) {

    $theInstructor = new ApplyInstructor();
    try {

        echo "<pre>";
        print_r($_POST);

        $instructorInfo = array("fullname" => $_POST['fullname'], "email" => $_POST['email'], "countryCode" =>  $_POST['countryCode'], "phone" =>  $_POST['phone'], "address" => $_POST['address'], "degree" => $_POST['degree'], "gyear" => $_POST['gyear'], "position" => $_POST['position'], "from" => $_POST['from'], "to" => $_POST['to'], "reason" => $_POST['reason']);

        $theInstructor->applyNow($instructorInfo);
    } catch (PDOException $th) {

        //add fail message to sessions
        $message = array('title' => 'Fail', 'description' => 'Something went wrong. Please try again. Sorry for inconvenience');
        $_SESSION['message'] = $message;
        header('location: ../View/apply instructor.php');
    }
} else {
    echo "<h1>Bad Request</h1>";
}
