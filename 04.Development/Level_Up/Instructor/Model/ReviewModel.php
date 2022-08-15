<?php

require('dbConnection.php');

class ReviewModel extends DBConnect {

    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    public function get_reviews ($instructor_id, $start, $limit){

        $stmt = $this->pdo->prepare(
            "SELECT * FROM (SELECT t.*, M_STUDENTS.full_name FROM 
            (SELECT `T_COURSE_REVIEW_RATES`.*,
                    `M_COURSES`.course_title,
                    `M_COURSES`.instructor_id 
            FROM `T_COURSE_REVIEW_RATES` JOIN `M_COURSES` 
            ON `T_COURSE_REVIEW_RATES`.course_id = `M_COURSES`.id) 
            AS `t`
            JOIN `M_STUDENTS`
            ON `t`.student_id = M_STUDENTS.id) AS a
            WHERE `a`.instructor_id = :id LIMIT $start, $limit"
        );
        $stmt->execute([':id' => $instructor_id]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Formatting the data to meet Controller's needs.

        $formatted = [];

        /** THE WAY FORMATTING WORKS:
         * reviews are grouped into respective courses, in the following format.
         * [
         *     [course_id] => [
         *                      0: course_title
         *                      1: first review
         *                      2: second review 
         *                     ]
         * ]
         */

        for($i=0,$count=count($reviews); $i<$count; $i++){
            if(!isset($formatted[$reviews[$i]['course_id']])){
                $formatted[$reviews[$i]['course_id']] = [["title" =>  $reviews[$i]['course_title']]];
            }
            array_push($formatted[$reviews[$i]['course_id']], $reviews[$i]);
        }

        foreach($formatted as $key => $value){
            $formatted[$key][0]['average'] = ($this->average_rating($key));
        }

        return $formatted;
    
    }

    # Helper function that returns average rating:
    public function average_rating ($id){
        $stmt = $this->pdo->prepare(
            "SELECT CAST(AVG(rating) as DECIMAL(10,1)) as average FROM `T_COURSE_REVIEW_RATES` WHERE course_id = $id"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_review_count ($instructor_id){
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(t.id) as count FROM 
            (SELECT T_COURSE_REVIEW_RATES.id, M_COURSES.instructor_id
            FROM `T_COURSE_REVIEW_RATES` JOIN `M_COURSES` 
            ON `T_COURSE_REVIEW_RATES`.course_id = `M_COURSES`.id) 
            AS `t`
            WHERE `t`.instructor_id = :id"
        );
        $stmt->execute([':id' => $instructor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}





?>