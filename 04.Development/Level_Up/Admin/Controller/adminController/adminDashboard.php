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
            $sql = $gotConnection->prepare("SELECT * FROM M_INSTRUCTORS WHERE status = 'PENDING'");

            //execute the sql query
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function getPurchasedCourse()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare("SELECT
            M_COURSES.is_deleted,
            COUNT(T_STUDENT_PURCHASED_COURSES.id) as total_course,
            M_STUDENTS.full_name,
            M_STUDENTS.email,
            M_STUDENTS.is_verified,
            M_STUDENTS.is_deleted
          FROM M_COURSES
          JOIN T_STUDENT_PURCHASED_COURSES
            ON M_COURSES.id = T_STUDENT_PURCHASED_COURSES.course_id AND M_COURSES.is_deleted = 0
          JOIN M_STUDENTS
            ON T_STUDENT_PURCHASED_COURSES.student_id = M_STUDENTS.id;");

            //execute the sql query
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function getAllStudent()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare("SELECT * FROM M_STUDENTS");

            //execute the sql query
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function getAppeal()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare('SELECT T_APPLEALS.id,T_APPLEALS.status, T_APPLEALS.created_at, M_INSTRUCTORS.full_name, M_INSTRUCTORS.status, M_INSTRUCTORS.is_banned
            FROM T_APPLEALS , M_INSTRUCTORS
            WHERE T_APPLEALS.instructor_id = M_INSTRUCTORS.id AND T_APPLEALS.status = "PENDING" AND M_INSTRUCTORS.status = "APPROVED" AND M_INSTRUCTORS.is_banned = 0 ORDER BY created_at LIMIT 0,5');

            //execute the sql query
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
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
