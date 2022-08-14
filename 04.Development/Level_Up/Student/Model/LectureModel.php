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
        $query = "SELECT id, chapter_title FROM T_CHAPTERS WHERE course_id = :id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $this->course_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Gets all lectures in a chapter.
    public function get_chap_details ($chapter_id) {
        $query = "SELECT * FROM T_LECTURES WHERE chapter_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $chapter_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Gets all quizzes in a lecture.
    public function get_quiz ($lecture_id) {
        $query = "SELECT * FROM T_QUIZS WHERE lecture_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $lecture_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}



?>