<?php
require_once('../BaseController.php');
header('Content-Type: application/json; charset=utf-8');

class DashbaordController extends BaseController
{

    function getPageSize()
    {

        $userId = $this->stringEncryption('decrypt', $_GET["uid"]);
        if ($userId == null || $userId == '') {

            $response = json_encode([
                'code' => 401,
                'message' => 'Token expired'
            ]);

            echo $response;

            return;
        }

        try {

            $getLearningListQuery = "SELECT COUNT(*) as size from T_STUDENT_PURCHASED_COURSES where student_id = :uID and is_deleted = 0";

            $sql = $this->connection->prepare($getLearningListQuery);
            $sql->bindValue(':uID', $userId);
            $sql->execute();

            $size = $sql->fetch(PDO::FETCH_ASSOC);

            $response = json_encode([
                'code' => 200,
                'data' => array(
                    'totalSize' => $size
                )
            ]);
            echo $response;
        } catch (PDOException $th) {

            $response = json_encode([
                'code' => 500,
                'message' => $th
            ]);

            echo $th;
        }
    }

    function getPageSizeWishList()
    {

        $userId = $this->stringEncryption('decrypt', $_GET["uid"]);
        if ($userId == null || $userId == '') {

            $response = json_encode([
                'code' => 401,
                'message' => 'Token expired'
            ]);

            echo $response;

            return;
        }

        try {

            $getwishListQuery = "SELECT COUNT(*) as size from T_STUDENT_WHISHLIST where student_id = :uID and is_deleted = 0";

            $sql = $this->connection->prepare($getwishListQuery);
            $sql->bindValue(':uID', $userId);
            $sql->execute();

            $size = $sql->fetch(PDO::FETCH_ASSOC);

            $response = json_encode([
                'code' => 200,
                'data' => array(
                    'totalSize' => $size
                )
            ]);
            echo $response;
        } catch (PDOException $th) {

            $response = json_encode([
                'code' => 500,
                'message' => $th
            ]);

            echo $th;
        }
    }


    function getLearningList()
    {

        $userId = $this->stringEncryption('decrypt', $_GET["uid"]);
        $page = $_GET["pageNo"];
        if ($userId == null || $userId == '') {

            $response = json_encode([
                'code' => 401,
                'message' => 'Token expired'
            ]);

            echo $response;

            return;
        }

        try {

            $getLearningListQuery = "SELECT a.id as pCID, a.course_id as cID,
            a.progress, b.course_title, b.course_info, b.course_description, b.course_target,
            b.course_cover_image, b.duration, c.full_name, d.level_name as level,
            (
                SELECT SUM(rating) from levelupdb.T_COURSE_REVIEW_RATES z
                WHERE z.course_id = a.course_id
                
            ) as total_rating,
            (
                SELECT COUNT(*) from levelupdb.T_COURSE_REVIEW_RATES z
                WHERE z.course_id = a.course_id
                
            ) as total_rated,
            (
                SELECT COUNT(f.id) from levelupdb.T_LECTURES f, levelupdb.T_CHAPTERS h
                WHERE f.chapter_id = h.id
                AND h.course_id = a.course_id
                
            ) as lectureCount
            FROM levelupdb.T_STUDENT_PURCHASED_COURSES a, 
            levelupdb.M_COURSES b, levelupdb.M_INSTRUCTORS c ,
            levelupdb.M_COURSE_LEVELS d
            where a.course_id = b.id
            and b.instructor_id = c.id
            and d.id = b.level_id
            and a.is_deleted = 0
            and student_id = :uID LIMIT 4 OFFSET " . ($page);

            $sql = $this->connection->prepare($getLearningListQuery);
            $sql->bindValue(':uID', $userId);
            $sql->execute();

            $learningList = $sql->fetchAll(PDO::FETCH_ASSOC);

            $response = json_encode([
                'code' => 200,
                'data' => array(
                    'learnings' => $learningList
                )
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

    function getWishList()
    {
        $userId = $this->stringEncryption('decrypt', $_GET["uid"]);
        $page = $_GET["pageNo"];
        if ($userId == null || $userId == '') {

            $response = json_encode([
                'code' => 401,
                'message' => 'Token expired'
            ]);

            echo $response;

            return;
        }

        try {

            $getwishListQuery = "SELECT a.id as pCID, a.course_id as cID, b.course_title, b.course_info, b.course_description, b.course_target,
            b.course_cover_image, b.duration, c.full_name, d.level_name as level, b.price,
            (
                SELECT SUM(rating) from levelupdb.T_COURSE_REVIEW_RATES z
                WHERE z.course_id = a.course_id
                
            ) as total_rating,
            (
                SELECT COUNT(*) from levelupdb.T_COURSE_REVIEW_RATES z
                WHERE z.course_id = a.course_id
                
            ) as total_rated,
            (
                SELECT COUNT(f.id) from levelupdb.T_LECTURES f, levelupdb.T_CHAPTERS h
                WHERE f.chapter_id = h.id
                AND h.course_id = a.course_id
                
            ) as lectureCount
            FROM levelupdb.T_STUDENT_WHISHLIST a, 
            levelupdb.M_COURSES b, levelupdb.M_INSTRUCTORS c ,
            levelupdb.M_COURSE_LEVELS d
            where a.course_id = b.id
            and b.instructor_id = c.id
            and d.id = b.level_id
            and a.is_deleted = 0
            and student_id = :uID LIMIT 4 OFFSET " . ($page);

            $sql = $this->connection->prepare($getwishListQuery);
            $sql->bindValue(':uID', $userId);
            $sql->execute();

            $wishList = $sql->fetchAll(PDO::FETCH_ASSOC);

            $response = json_encode([
                'code' => 200,
                'data' => array(
                    'wishList' => $wishList
                )
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
}
