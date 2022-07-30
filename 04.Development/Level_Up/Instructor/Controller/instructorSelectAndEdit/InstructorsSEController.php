<?php
require_once('../BaseController.php');
header('Content-Type: application/json; charset=utf-8');

class InstructorsSEController extends BaseController
{

    function getSocialNetworks()
    {
        try {

            $getSocialsQuery =  "select id,name from M_SOCIAL_NETWORKS";

            $sql = $this->connection->prepare($getSocialsQuery);
            $sql->execute();

            $socialList = $sql->fetchAll(PDO::FETCH_ASSOC);

            if ($socialList == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'Social List not found'
                ]);
                echo $response;
            } else {

                $response = json_encode([
                    'code' => 200,
                    'data' => array(
                        'socials' => $socialList,
                    )
                ]);
                echo $response;
            }
        } catch (PDOException $th) {
            echo $th;
        }
    }

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

                for ($i = 0; $i < count($instructorExpData); $i++) {
                    $start = new DateTime($instructorExpData[$i]["exp_start_date"]);
                    $end = new DateTime($instructorExpData[$i]["exp_end_date"]);

                    if ($instructorExpData[$i]["exp_end_date"] == null) {
                        $instructorExpData[$i]["years"] = $start->diff(new DateTime())->y;
                        $instructorExpData[$i]["exp_duration"] = date_format($start, "M Y") . " - present";
                    } else {
                        $instructorExpData[$i]["years"] = $start->diff($end)->y;
                        $instructorExpData[$i]["exp_duration"] = date_format($start, "M Y") . " - " . date_format($end, "M Y");
                    }
                }

                $instructorDetailData["exps"] = $instructorExpData;

                $getInstructorSocialsQuery =  "select a.social_id as socialID, a.social_url,
                b.name as socialName
                from M_INSTRUCTOR_SOCIALS a , M_SOCIAL_NETWORKS b
                where a.social_id = b.id
                and
                instructor_id = :instructorID";

                $sql = $this->connection->prepare($getInstructorSocialsQuery);
                $sql->bindValue(':instructorID', $insID);
                $sql->execute();
                $instructorSocialData = $sql->fetchAll(PDO::FETCH_ASSOC);

                $instructorDetailData["socials"] = $instructorSocialData;

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

    function uploadImage()
    {

        $id = $_POST["id"];
        $data = $this->jsonData();

        if (!empty($_FILES["image"]["name"])) {

            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg');

            if (in_array($fileType, $allowTypes)) {
                $new_name = time() . '.' . $fileType;
                move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/' . $new_name);

                $updatePhotoQuery = "UPDATE M_INSTRUCTORS SET profile_image = :newImage where id = :id";

                $sql = $this->connection->prepare($updatePhotoQuery);
                $sql->bindValue(':id', $id);
                $sql->bindValue(':newImage', '../assets/' . $new_name);
                $sql->execute();

                $response = json_encode([
                    'code' => 201,
                    'message' => 'Instrcutor photo uploaded!',
                    'data' => array(
                        'new_profile' => $new_name
                    )
                ]);

                echo $response;
            } else {
                $response = json_encode([
                    'code' => 400,
                    'message' => 'File not supported'
                ]);

                echo $response;
            }
        } else {
            $response = json_encode([
                'code' => 200,
                'message' => 'No Image uploaded'
            ]);

            echo $response;
        }
    }

    function updateContents() {

        try {

            $data = $this->jsonData();
            $insID = $data['id'];
            $name = $data['name'];
            $position = $data['postion'];
            $bio = $data['bio'];
            $email = $data['email'];
            $phone = $data['phone'];
            $address = $data['address'];
            $utTime = date('Y-m-d H:i:s');
            $socials = $data['socials'];

            
            $updateQuery =  "UPDATE M_INSTRUCTORS SET
                    full_name = :name, job_position = :position,
                    bio = :bio,email = :email, phone = :phone, address = :address,
                    updated_at = :utTime
                    where id = :id";

            $sql = $this->connection->prepare($updateQuery);
            $sql->bindValue(':id', $insID);
            $sql->bindValue(':name', $name);
            $sql->bindValue(':position', $position);
            $sql->bindValue(':bio', $bio);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':phone', $phone);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':utTime', $utTime);
            $sql->execute();

            for ($i=0; $i < count($socials); $i++) { 
                $socialID = $socials[$i]['socialID'];
                $socialurl = $socials[$i]['social_url'];

                $checkIfExistQuery = "SELECT * FROM M_INSTRUCTOR_SOCIALS WHERE id=:id AND instructor_id= :insID";
                $sql = $this->connection->prepare($checkIfExistQuery);
                $sql->bindValue(':id', $socialID);
                $sql->bindValue(':insID', $insID);
                $sql->execute();
                $socialList = $sql->fetchAll(PDO::FETCH_ASSOC);

                if (count($socialList) == 0) {
                    //insert 
                    $insertSocialQuery = "INSERT into M_INSTRUCTOR_SOCIALS(
                        instructor_id, social_id, social_url, created_at, updated_at
                    )
                    VALUES(
                        :insID,
                        :id,
                        :url,
                        :created_at,
                        :updated_at
                    );";
                    $sql = $this->connection->prepare($insertSocialQuery);
                    $sql->bindValue(':url', $socialurl);
                    $sql->bindValue(':id', $socialID);
                    $sql->bindValue(':insID', $insID);
                    $sql->bindValue(':created_at', $utTime);
                    $sql->bindValue(':updated_at', $utTime);
                    $sql->execute();

                } else {
                    $updateSocialQuery =  "UPDATE M_INSTRUCTOR_SOCIALS SET 
                    social_url = :url,updated_at = :utTime
                    where social_id = :id AND instructor_id= :insID";
                    $sql = $this->connection->prepare($updateSocialQuery);
                    $sql->bindValue(':url', $socialurl);
                    $sql->bindValue(':id', $socialID);
                    $sql->bindValue(':insID', $insID);
                    $sql->bindValue(':utTime', $utTime);
                    $sql->execute();
                }

            }

            $response = json_encode([
                'code' => 200,
                'message' => 'Successfully updated'
            ]);
            echo $response;
            

        } catch (PDOException $th) {

            $response = json_encode([
                'code' => 500,
                'message' => $th
            ]);
            echo $response;
        }
    }

    function removePhotoAndUpdate()
    {

        try {

            $data = $this->jsonData();
            $insID = $data['id'];
            $name = $data['name'];
            $position = $data['postion'];
            $bio = $data['bio'];
            $email = $data['email'];
            $phone = $data['phone'];
            $address = $data['address'];
            $utTime = date('Y-m-d H:i:s');
            $socials = $data['socials'];

            $pic = str_replace("../","../../",$data["profilePic"]);

            if (!unlink($pic)) {
                $response = json_encode([
                    'code' => 500,
                    'message' => 'Problem Deleting file'
                ]);
                echo $response;
                return;
            }
            
            $updateQuery =  "UPDATE M_INSTRUCTORS SET profile_image = null,
                    full_name = :name, job_position = :position,
                    bio = :bio,email = :email, phone = :phone, address = :address,
                    updated_at = :utTime
                    where id = :id";

            $sql = $this->connection->prepare($updateQuery);
            $sql->bindValue(':id', $insID);
            $sql->bindValue(':name', $name);
            $sql->bindValue(':position', $position);
            $sql->bindValue(':bio', $bio);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':phone', $phone);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':utTime', $utTime);
            $sql->execute();

            for ($i=0; $i < count($socials); $i++) { 
                $socialID = $socials[$i]['socialID'];
                $socialurl = $socials[$i]['social_url'];

                $checkIfExistQuery = "SELECT * FROM M_INSTRUCTOR_SOCIALS WHERE id=:id AND instructor_id= :insID";
                $sql = $this->connection->prepare($checkIfExistQuery);
                $sql->bindValue(':id', $socialID);
                $sql->bindValue(':insID', $insID);
                $sql->execute();
                $socialList = $sql->fetchAll(PDO::FETCH_ASSOC);

                if (count($socialList) == 0) {
                    //insert 
                    $insertSocialQuery = "INSERT into M_INSTRUCTOR_SOCIALS(
                        instructor_id, social_id, social_url, created_at, updated_at
                    )
                    VALUES(
                        :insID,
                        :id,
                        :url,
                        :created_at,
                        :updated_at
                    );";
                    $sql = $this->connection->prepare($insertSocialQuery);
                    $sql->bindValue(':url', $socialurl);
                    $sql->bindValue(':id', $socialID);
                    $sql->bindValue(':insID', $insID);
                    $sql->bindValue(':created_at', $utTime);
                    $sql->bindValue(':updated_at', $utTime);
                    $sql->execute();

                } else {
                    $updateSocialQuery =  "UPDATE M_INSTRUCTOR_SOCIALS SET 
                    social_url = :url,updated_at = :utTime
                    where social_id = :id AND instructor_id= :insID";
                    $sql = $this->connection->prepare($updateSocialQuery);
                    $sql->bindValue(':url', $socialurl);
                    $sql->bindValue(':id', $socialID);
                    $sql->bindValue(':insID', $insID);
                    $sql->bindValue(':utTime', $utTime);
                    $sql->execute();
                }

            }

            $response = json_encode([
                'code' => 200,
                'message' => 'Successfully updated'
            ]);
            echo $response;
            

        } catch (PDOException $th) {

            $response = json_encode([
                'code' => 500,
                'message' => $th
            ]);
            echo $response;
        }
    }
}
