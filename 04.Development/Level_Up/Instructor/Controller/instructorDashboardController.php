<?php
require_once("../Model/dbConnection.php");


class InstructorDashboardController extends DBConnect
{
    // create admin
    public function getOrderList()
    {
        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare(
                "SELECT T_ORDER_LIST.*, M_COURSES.course_title,M_STUDENTS.full_name as stdname FROM T_ORDER_LIST
                INNER JOIN M_COURSES ON T_ORDER_LIST.course_id = M_COURSES.id AND T_ORDER_LIST.instructor_id =1 
                INNER JOIN M_STUDENTS ON T_ORDER_LIST.student_id = M_STUDENTS.id LIMIT 0,5"

            );
            $sql->bindValue(':id', $_SESSION['instId']);

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
            $sql = $gotConnection->prepare("SELECT M_COURSES.instructor_id,M_COURSES.course_title,M_COURSES.is_deleted,T_STUDENT_PURCHASED_COURSES.id,
            T_STUDENT_PURCHASED_COURSES.course_id,T_STUDENT_PURCHASED_COURSES.student_id,M_STUDENTS.full_name,M_STUDENTS.email
             FROM M_COURSES
            INNER JOIN T_STUDENT_PURCHASED_COURSES ON M_COURSES.id = T_STUDENT_PURCHASED_COURSES.course_id
            INNER JOIN M_STUDENTS ON T_STUDENT_PURCHASED_COURSES.id = M_STUDENTS.id
            WHERE M_COURSES.instructor_id =1 AND M_COURSES.is_deleted = 0");

            //execute the sql query
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function getReviewAndRating()
    {

        try {
            $gotConnection = $this->connect();

            // update sql query
            $sql = $gotConnection->prepare('SELECT M_INSTRUCTORS.id as instructor_id,
            M_INSTRUCTORS.full_name as instructor_name,
            M_COURSES.is_deleted as course_deleted,
            M_COURSES.course_title,
            M_COURSES.id as course_id,
            M_STUDENTS.id as student_id,
            T_COURSE_REVIEW_RATES.id as rating_id,
            T_COURSE_REVIEW_RATES.created_at,
            T_COURSE_REVIEW_RATES.rating as rating,
            M_STUDENTS.full_name as student_name FROM M_INSTRUCTORS INNER JOIN 
            M_COURSES ON M_INSTRUCTORS.id = M_COURSES.instructor_id 
            INNER JOIN T_COURSE_REVIEW_RATES ON M_COURSES.id = T_COURSE_REVIEW_RATES.course_id 
            INNER JOIN M_STUDENTS ON T_COURSE_REVIEW_RATES.student_id = M_STUDENTS.id
            WHERE M_INSTRUCTORS.id = :id AND M_COURSES.is_deleted = 0 LIMIT 0,5');

            $sql->bindValue(':id', $_SESSION['instId']);

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
            $sql = $gotConnection->prepare("SELECT COUNT(T_STUDENT_PURCHASED_COURSES.student_id) as total_student FROM M_COURSES INNER JOIN T_STUDENT_PURCHASED_COURSES 
            ON M_COURSES.id = T_STUDENT_PURCHASED_COURSES.course_id 
            WHERE M_COURSES.instructor_id = :id AND M_COURSES.is_deleted = 0");

            $sql->bindValue(':id', $_SESSION['instId']);

            //execute the sql query
            $sql->execute();
            $totalStudents = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $totalStudents;
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function getVideo()
    {

        try {
            $gotConnection = $this->connect();
            $sql = $gotConnection->prepare("SELECT COUNT(video_url) as total_videos FROM T_LECTURES WHERE instructor_id = :id");
            $sql->bindValue(':id', $_SESSION['instId']);

            $sql->execute();
            $totalVideo = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $totalVideo;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function getCourse()
    {

        try {
            $gotConnection = $this->connect();
            $sql = $gotConnection->prepare("SELECT COUNT(id) as total_courses FROM M_COURSES WHERE instructor_id = 1 AND is_deleted = 0");
            $sql->bindValue(':id', $_SESSION['instId']);
            $sql->execute();
            $totalCourses = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $totalCourses;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}

$dashboard = new InstructorDashboardController();
