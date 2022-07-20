<?php

require_once ('dbConnection.php');

class LectureModel extends DBConnect
{
    // Each LectureModel will have an instance based on course_id.
    public function __construct(private $course_id){
        $this->pdo = $this->connect();
    }

    // Gets a list of chapter in a course.
    public function get_chap_list () {
        $query = "SELECT id, chapter_title FROM t_chapters WHERE course_id = $this->course_id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Gets all lectures in a chapter.
    public function get_chap_details ($chapter_id) {
        $query = "SELECT * FROM t_lectures WHERE chapter_id = $chapter_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Gets all quizzes in a lecture.
    public function get_quiz ($lecture_id) {
        $query = "SELECT * FROM t_quizs WHERE lecture_id = $lecture_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}



?>