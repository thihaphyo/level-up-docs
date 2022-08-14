<?php

require_once ('dbConnection.php');

class InstructorReviewModel extends DBConnect {

    public function __construct()
    { $this->pdo = $this->connect(); }

    public function get_instructor_list () {

        /*  Gets the list of all instructors with their names, images and position. */

        $query = "SELECT id, profile_image, full_name, email, bio, created_at FROM M_INSTRUCTORS WHERE M_INSTRUCTORS.status = 'PENDING'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);        
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

        return $instructor_details;

    }

    public function update_instructor_status($instructor_id, $status){
        $stmt = $this->pdo->prepare(
            "UPDATE M_INSTRUCTORS SET M_INSTRUCTORS.status = :new_status WHERE M_INSTRUCTORS.id = :id"
        );
        $stmt->execute([':new_status' => $status,':id' => $instructor_id]);
    }
}

?>