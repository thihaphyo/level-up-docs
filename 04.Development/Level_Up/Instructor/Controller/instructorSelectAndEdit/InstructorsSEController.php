<?php
require_once('../BaseController.php');
header('Content-Type: application/json; charset=utf-8');

class InstructorsSEController extends BaseController
{
    function getInstructorById()
    {
        try {
            $insID =  $_GET["ins_id"];

            $getInstructorIdQuery =  "select id,full_name,profile_image,job_position,bio,email,phone,address from M_INSTRUCTORS where id = :instructorID";

            $sql = $this->connection->prepare($getInstructorIdQuery);
            $sql->bindValue(':instructorID', $insID);
            $sql->execute();

            $instructorDetailData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($instructorDetailData == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'Instructor not found'
                ]);
                echo $response;
            } else {

                $getInstructorExpQuery =  "select exp_title,exp_type,exp_start_date,exp_end_date from  M_INSTRUCTOR_EXPERIENCES 
                where instructor_id = :instructorID";

                $sql = $this->connection->prepare($getInstructorExpQuery);
                $sql->bindValue(':instructorID', $insID);
                $sql->execute();
                $instructorExpData = $sql->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i <count($instructorExpData) ; $i++) { 
                    $start = new DateTime($instructorExpData[$i]["exp_start_date"]);
                    $end = new DateTime($instructorExpData[$i]["exp_end_date"]);

                    if ($instructorExpData[$i]["exp_end_date"] == null) {
                        $instructorExpData[$i]["years"] = $start->diff(new DateTime())->y;
                        $instructorExpData[$i]["exp_duration"] = date_format($start,"M Y")." - present";
                    } else {
                        $instructorExpData[$i]["years"] = $start->diff($end)->y;
                        $instructorExpData[$i]["exp_duration"] = date_format($start,"M Y")." - ".date_format($end,"M Y");
                    }
                    
                }

                $instructorDetailData["exps"] = $instructorExpData;

                $response = json_encode([
                    'code' => 200,
                    'data' => array(
                        'instructor' => $instructorDetailData,
                    )
                ]);
                echo $response;
            }
        } catch (PDOException $th) {
            echo $th;
        }
    }
}
