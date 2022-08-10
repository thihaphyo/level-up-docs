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

            $sql->execute();
            $sql->fetchAll(PDO::FETCH_ASSOC);

            // header('location: ../View/apply instructor success.php');
        } catch (\Throwable $th) {
            echo $th;
            $message = array('title' => 'Fail', 'description' => 'Something went wrong. Please try again. Sorry for inconvenience');
            $_SESSION['message'] = $message;
            header('location: ../View/apply instructor.php');
        }
    }
    public function getInstructorId($email)
    {
        $gotConnection = $this->connect();

        $sql = $gotConnection->prepare("SELECT id FROM M_INSTRUCTORS WHERE email = :email");
        $sql->bindValue(':email', $email);

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertExperience($expInfo, $instId)
    {
        try {

            echo "Heloo";
            date_default_timezone_set('Asia/Yangon');
            $createdTime = date('Y-m-d H:i:s');

            $gotConnection = $this->connect();

            $sql = $gotConnection->prepare("INSERT INTO M_INSTRUCTOR_EXPERIENCES (instructor_id,exp_title, exp_type, exp_start_date,exp_end_date,created_at) VALUES (:instId,:position,:worktype,:startfrom,:endfrom,:createdTime)");

            $sql->bindValue(':instId', $instId);
            $sql->bindValue(':position', ucwords($expInfo[0] . " at " . $expInfo[4]));
            $sql->bindValue(':worktype', $expInfo[3]);
            $sql->bindValue(':startfrom', $expInfo[1]);
            $sql->bindValue(':endfrom', $expInfo[2]);
            $sql->bindValue(':createdTime', $createdTime);
            print_r($sql);

            $sql->execute();
            $sql->fetchAll(PDO::FETCH_ASSOC);

            header('location: ../View/apply instructor success.php');
        } catch (\Throwable $th) {
            echo $th;
            $message = array('title' => 'Fail', 'description' => 'Something went wrong. Please try again. Sorry for inconvenience');
            $_SESSION['message'] = $message;
            header('location: ../View/apply instructor.php');
        }
    }
}
if (isset($_POST)) {

    $count = 0;
    $theInstructor = new ApplyInstructor();
    try {

        echo "<pre>";

        $instructorInfo = array("fullname" => $_POST['fullname'], "email" => $_POST['email'], "countryCode" =>  $_POST['countryCode'], "phone" =>  $_POST['phone'], "address" => $_POST['address'], "degree" => $_POST['degree'], "gyear" => $_POST['gyear'], "position" => $_POST['position1'], "from" => $_POST['from1'], "to" => $_POST['to1'], "reason" => $_POST['reason']);


        // print_r($expInfo);
        $theInstructor->applyNow($instructorInfo);
        $instId = $theInstructor->getInstructorId($_POST['email']);
        foreach ($_POST as $key => $value) {
            if (
                strpos($key, "position") !== false ||
                strpos($key, "from") !== false ||
                strpos($key, "to") !== false ||
                strpos($key, "worktype") !== false ||
                strpos($key, "company") !== false
            ) {
                $expInfo[$count] = $value;
                $count += 1;
                if (strpos($key, "company") !== false) {
                    $theInstructor->insertExperience($expInfo, $instId[0]['id']);
                    unset($expInfo);
                    $count = 0;
                }
            }
        }
    } catch (PDOException $th) {

        //add fail message to sessions
        $message = array('title' => 'Fail', 'description' => 'Something went wrong. Please try again. Sorry for inconvenience');
        $_SESSION['message'] = $message;
        header('location: ../View/apply instructor.php');
    }
} else {
    echo "<h1>Bad Request</h1>";
}
