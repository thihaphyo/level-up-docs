<?php
require_once("../Model/dbConnection.php");


class AdminDashboard extends DBConnect
{
    // create admin
    public function getInstructorRequest()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare("SELECT T_APPLEALS.id,T_APPLEALS.status, T_APPLEALS.created_at, M_INSTRUCTORS.full_name
            FROM T_APPLEALS , M_INSTRUCTORS
            WHERE T_APPLEALS.instructor_id = M_INSTRUCTORS.id");

            //execute the sql query
            $sql->execute();
            $appealResult = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $appealResult;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function getAppeal()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare("SELECT T_APPLEALS.id,T_APPLEALS.status, T_APPLEALS.created_at, M_INSTRUCTORS.full_name
            FROM T_APPLEALS , M_INSTRUCTORS
            WHERE T_APPLEALS.instructor_id = M_INSTRUCTORS.id");

            //execute the sql query
            $sql->execute();
            $appealResult = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $appealResult;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function getStduent()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare("SELECT count(id) FROM M_STUDENTS WHERE is_verified = 1 AND is_deleted = 0");

            //execute the sql query
            $sql->execute();
            $totalStudents = $sql->fetchAll(PDO::FETCH_ASSOC);


            return $totalStudents;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function getInstructor()
    {

        try {
            $gotConnection = $this->connect();
            $sql = $gotConnection->prepare("SELECT count(id) FROM M_INSTRUCTORS WHERE status = 'APPROVED' AND is_banned = 0");
            $sql->execute();
            $totalInstructors = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $totalInstructors;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function getCourse()
    {

        try {
            $gotConnection = $this->connect();
            $sql = $gotConnection->prepare("SELECT count(id) FROM M_COURSES WHERE  is_deleted = 0");
            $sql->execute();
            $totalCourses = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $totalCourses;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}

$dashboard = new AdminDashboard();
$appealList = $dashboard->getAppeal();
$studentList = $dashboard->getStduent();
$instructorList = $dashboard->getInstructor();
$courseList = $dashboard->getCourse();
