<?php
require_once("../Model/dbConnection.php");


class StudentController extends DBConnect
{
    public function getStud()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare("SELECT * FROM M_INSTRUCTORS WHERE status = 'PENDING'");

            //execute the sql query
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}

$student = new StudentController();
