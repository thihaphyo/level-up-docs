<?php

require_once ('dbConnection.php');

class InstructorModel extends DBConnect {

    public function __construct()
    { $this->pdo = $this->connect(); }

    public function get_instructor_list () {

        /*  Gets the list of all instructors with their names, images, position and number of courses. */

        $query = "SELECT id, full_name, profile_image, job_position  FROM M_INSTRUCTORS WHERE status = 'APPROVED'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->query_instructor_list($arr);
        
    }

    public function get_instructor_details ($instructor_id) {

        /* Gets all info of a particular instructor. */

        // Query to M_INSTRUCTORS.
        $stmt = $this->pdo->prepare(
            "SELECT * FROM M_INSTRUCTORS WHERE id = :id"
        );
        $stmt->execute([':id' => $instructor_id]);
        $instructor_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Query to M_INSTRUCTOR_EXPERIENCES.
        $stmt = $this->pdo->prepare(
            "SELECT exp_title, exp_type, UNIX_TIMESTAMP(exp_start_date) as exp_start_date, UNIX_TIMESTAMP(exp_end_date) as exp_end_date FROM M_INSTRUCTOR_EXPERIENCES WHERE instructor_id = :id"
        );
        $stmt->execute([':id' => $instructor_id]);
        $instructor_details['experiences'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Query to M_INSTRUCTOR_SOCIALS.
        $stmt = $this->pdo->prepare(
            "SELECT * FROM M_INSTRUCTOR_SOCIALS WHERE instructor_id = :id"
        );
        $stmt->execute([':id' => $instructor_id]);
        $instructor_details['social_accounts'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Query to M_COURSES.
        $stmt = $this->pdo->prepare(
            "SELECT id, course_title, course_cover_image FROM M_COURSES WHERE instructor_id = :id"
        );
        $stmt->execute([':id' => $instructor_id]);
        $instructor_details['courses'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Query to T_COURSE_REVIEW_RATES.
        for($i = 0, $len = count($instructor_details['courses']); $i<$len; $i++){
            $course_id = $instructor_details['courses'][$i]['id'];
            $stmt = $this->pdo->prepare(
                "SELECT AVG(rating) as rating FROM T_COURSE_REVIEW_RATES WHERE course_id = $course_id"
            );
            $stmt->execute();
            $rating = (integer)($stmt->fetchAll(PDO::FETCH_ASSOC))[0]['rating'];
            $instructor_details['courses'][$i]['rating'] = $rating;
        }

        return $instructor_details;

    }

    public function search_instructors ($keyword) {

        /* Gets info of instructors whose name or job_title matches the keyword.*/

        $query = "SELECT id, full_name, profile_image, job_position  FROM M_INSTRUCTORS WHERE full_name LIKE :keyword or job_position LIKE :keyword AND status='APPROVED'";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':keyword', '%'.$keyword.'%');
        $stmt->execute();

        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->query_instructor_list($arr);

    }

    # Helper function to modify $instructor_list by adding course_count.
    private function query_instructor_list ($arr) {

        $stmt = $this->pdo->prepare(
            "SELECT instructor_id as id, COUNT(id) as total FROM M_COURSES GROUP BY instructor_id"
        );
        $stmt->execute();
        $course_count = $stmt->fetchAll(PDO::FETCH_ASSOC);

        for($i=0,$list_count=count($arr); $i<$list_count; $i++) {
            $arr[$i]['course_count'] = $this->help_find_courses($arr[$i]['id'], $course_count);
        }

        return $arr;
    }

    # Helper function to match instructor id with the number of courses.
    private function help_find_courses ($id, $course_count) {
        foreach($course_count as $course){
            if($course['id'] === $id){
                return $course['total'];
            }
        }
        return 0;
    }
}
