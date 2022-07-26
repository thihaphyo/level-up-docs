<?php
require_once('../BaseController.php');
header('Content-Type: application/json; charset=utf-8');

class AppealController extends BaseController
{
    function getAppealById()
    {
        try {
            $appID =  $_GET["appeal_id"];
           
            $getAppealByIdQuery =  "select a.id as blacklistID, a.reason as reason,
            b.id as appealID, b.solution, c.id as ins_id , c.full_name
             from levelupdb.T_BLACKLIST as a,
            levelupdb.T_APPLEALS as b,
            levelupdb.M_INSTRUCTORS as c
            where a.id = b.blacklist_id
            and a.instructor_id = c.id
            and b.instructor_id = c.id
            and b.status = 'PENDING'
            and a.is_deleted = 0
            and a.id = :appealID";

            $sql = $this->connection->prepare($getAppealByIdQuery);
            $sql->bindValue(':appealID', $appID);
            $sql->execute();

            $appealDetailData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($appealDetailData == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'Appeal not found'
                ]);
                echo $response;
            } else {
                $response = json_encode([
                    'code' => 200,
                    'data' => array(
                        'appeal' => $appealDetailData
                    )
                ]);
                echo $response;
            }
        } catch (PDOException $th) {
            echo $th;
        }
    }

    function stringEncryption($action, $string)
    {
        $output = false;

        $encrypt_method = 'AES-256-CBC';                // Default
        $secret_key = 'Some#Random_Key!';               // Change the key!
        $secret_iv = '!IV@_$2';  // Change the init vector!

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    function unBann() {
        try {
            $appID =  $_GET["appeal_id"];
           
            $getAppealByIdQuery =  "select a.id as blacklistID, a.reason as reason,
            b.id as appealID, b.solution, c.id as ins_id , c.full_name
             from levelupdb.T_BLACKLIST as a,
            levelupdb.T_APPLEALS as b,
            levelupdb.M_INSTRUCTORS as c
            where a.id = b.blacklist_id
            and a.instructor_id = c.id
            and b.instructor_id = c.id
            and b.status = 'PENDING'
            and a.is_deleted = 0
            and a.id = :appealID";

            $sql = $this->connection->prepare($getAppealByIdQuery);
            $sql->bindValue(':appealID', $appID);
            $sql->execute();

            $appealDetailData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($appealDetailData == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'Appeal not found'
                ]);
                echo $response;
            } else {

                //update T_APPEALS as RESOLVED
                $updateAppealStatusQuery = "UPDATE T_APPLEALS SET status='RESOLVED',updated_at=:upt WHERE id = :appealID";

                $sql = $this->connection->prepare($updateAppealStatusQuery);
                $sql->bindValue(':appealID', $appID);
                $sql->bindValue(':upt',  date('Y-m-d H:i:s'));
                $sql->execute();

                //delete T_BLACKLIST record
                $deleteBlackListStatusQuery = "UPDATE T_BLACKLIST SET is_deleted=1,updated_at=:upt WHERE id = :blacklistID";
                $sql = $this->connection->prepare($deleteBlackListStatusQuery);
                $sql->bindValue(':blacklistID', $appealDetailData["blacklistID"]);
                $sql->bindValue(':upt',  date('Y-m-d H:i:s'));
                $sql->execute();

                //unbann instructor M_INSTRUCTORS
                $unBannQuery = "UPDATE M_INSTRUCTORS SET is_banned=0,updated_at=:upt WHERE id = :instructorID";
                $sql = $this->connection->prepare($unBannQuery);
                $sql->bindValue(':instructorID', $appealDetailData["ins_id"]);
                $sql->bindValue(':upt',  date('Y-m-d H:i:s'));
                $sql->execute();

                //Success Unbanned
                $response = json_encode([
                    'code' => 200,
                    'message' => 'Successfully unbanned Instructor '.$appealDetailData["full_name"]
                ]);
                echo $response;
            }
        } catch (PDOException $th) {
            echo $th;
        }
    }
}
