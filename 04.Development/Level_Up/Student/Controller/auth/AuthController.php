<?php
require_once('../BaseController.php');
require_once('./SendMail.php');
header('Content-Type: application/json; charset=utf-8');

class AuthController extends BaseController
{
    function getLoginState()
    {
        echo $_SESSION['logged in'];
    }

    function signIn()
    {

        try {
            $data = $this->jsonData();

            $emailInput = $data["email"];
            $passwordInput = $data["pWord"];

            $getStudentQuery = "SELECT id,full_name as fullName,email,is_verified FROM M_STUDENTS where email=:email AND password=:password";

            $sql = $this->connection->prepare($getStudentQuery);
            $sql->bindValue(':email', $emailInput);
            $sql->bindValue(':password', $this->stringEncryption('encrypt', $passwordInput));
            $sql->execute();

            $studentData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($studentData == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'User not found'
                ]);
                echo $response;
            } else {
                if ($studentData['is_verified'] == 0) {
                    $response = json_encode([
                        'code' => 403,
                        'message' => 'Please verify the account.'
                    ]);
                    echo $response;
                } else {

                    $studentData["access_token"] = $this->stringEncryption('encrypt', $studentData["id"]);
                    $response = json_encode([
                        'code' => 200,
                        'data' => array(
                            'students' => $studentData
                        )
                    ]);
                    echo $response;
                }
            }
        } catch (PDOException $th) {
            echo $th;
        }
    }

    function signUp()
    {

        try {

            $data = $this->jsonData();
            $fullname = $data["uName"];
            $email = $data["email"];
            $pass = $data["pass"];

            //$vcode = generateCode();

            $getStudentQuery = "SELECT * FROM M_STUDENTS where email=:email";

            $sql = $this->connection->prepare($getStudentQuery);
            $sql->bindValue(':email', $email);
            $sql->execute();

            $studentData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($studentData != null) {

                $response = json_encode([
                    'code' => 409,
                    'message' => 'User already registered'
                ]);

                echo $response;

                return;
            }

            $studentInsertQuery = "INSERT into M_STUDENTS(
            full_name,
            email,
            password,
            vcode,
            is_verified,
            created_at
        )
        VALUES(
            :full_name,
            :email,
            :password,
            :vcode,
            :is_verified,
            :created_at
        );";

            $vcode = $this->generateCode();

            $sql = $this->connection->prepare($studentInsertQuery);
            $sql->bindValue(':full_name', $fullname);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', $this->stringEncryption('encrypt', $pass));
            $sql->bindValue(':vcode', $vcode);
            $sql->bindValue(':is_verified', false);
            $sql->bindValue(':created_at', date('Y-m-d H:i:s'));
            $sql->execute();


            $mailSend = new SendMail($vcode);
            $mailSend->sendMail($email);

            $response = json_encode([
                'code' => 201,
                'message' => 'Registered new user, Please verify'
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

    function generateCode()
    {
        $character = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randomCode = "";
        for ($i = 0; $i < 128; $i++) {
            $randomCode .= $character[rand(0, strlen($character) - 1)];
        }
        return $randomCode;
    }

    function edit()
    {

        $data = $this->jsonData();
        $userId = $this->stringEncryption('decrypt', $data["id"]);
        $email = $data['email'];
        $userName = $data['userName'];

        if ($userId == null || $userId == '') {

            $response = json_encode([
                'code' => 401,
                'message' => 'Token expired'
            ]);

            echo $response;

            return;
        }

        try {

            $getStudentQuery = "SELECT full_name as fullName,email,profile_image as profile FROM M_STUDENTS where id=:id";

            $sql = $this->connection->prepare($getStudentQuery);
            $sql->bindValue(':id', $userId);
            $sql->execute();

            $studentData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($studentData == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'User not found'
                ]);
                echo $response;
            } else {

                $updateQuery = "UPDATE M_STUDENTS SET full_name = :name, email = :email, updated_at = :utTime WHERE id = :uID";

                $sql = $this->connection->prepare($updateQuery);
                $sql->bindValue(':uID', $userId);
                $sql->bindValue(':name', $userName);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':utTime', date('Y-m-d H:i:s'));
                $sql->execute();


                $response = json_encode([
                    'code' => 200,
                    'message' => 'Successfully Updated!'
                ]);
                echo $response;
            }
        } catch (PDOException $th) {

            $response = json_encode([
                'code' => 500,
                'message' => $th
            ]);

            echo $response;
        }
    }

    function getUser()
    {

        $userId = $this->stringEncryption('decrypt', $_POST["id"]);
        if ($userId == null || $userId == '') {

            $response = json_encode([
                'code' => 401,
                'message' => 'Token expired'
            ]);

            echo $response;

            return;
        }

        try {

            $getStudentQuery = "SELECT full_name as fullName,email,profile_image as profile FROM M_STUDENTS where id=:id";

            $sql = $this->connection->prepare($getStudentQuery);
            $sql->bindValue(':id', $userId);
            $sql->execute();

            $studentData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($studentData == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'User not found'
                ]);
                echo $response;
            } else {
                $response = json_encode([
                    'code' => 200,
                    'data' => array(
                        'student' => $studentData
                    )
                ]);
                echo $response;
            }
        } catch (PDOException $th) {

            $response = json_encode([
                'code' => 500,
                'message' => $th
            ]);

            echo $response;
        }
    }

    function verify()
    {

        $data = $this->jsonData();

        $vCode = $data["vCode"];

        $vCodeQuery = "SELECT * from M_STUDENTS where vcode = :vcode AND is_verified=0";
        $sql = $this->connection->prepare($vCodeQuery);
        $sql->bindValue(':vcode', $vCode);
        $sql->execute();

        $vCodeResult = $sql->fetch(PDO::FETCH_ASSOC);

        if ($vCodeResult == null) {
            $response = json_encode([
                'code' => 404,
                'message' => "User not found"
            ]);
            echo $response;
        } else {

            $vCodeUpdQuery = "UPDATE M_STUDENTS SET is_verified=1,updated_at= :upTime WHERE vcode = :vcode";
            $sql = $this->connection->prepare($vCodeUpdQuery);
            $sql->bindValue(':vcode', $vCode);
            $sql->bindValue(':upTime', date('Y-m-d H:i:s'));
            $sql->execute();

            $response = json_encode([
                'code' => 200,
                'message' => "User verified"
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
