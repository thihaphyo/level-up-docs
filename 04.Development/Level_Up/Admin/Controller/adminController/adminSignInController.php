<?php
require_once('../BaseController.php');
header('Content-Type: application/json; charset=utf-8');

class AuthController extends BaseController
{
    function signIn()
    {
        try {
            $data = $this->jsonData();

            $emailInput = $data["email"];
            $passwordInput = $data["pWord"];

            $getAdminQuery = "SELECT id,full_name as fullName,email FROM M_ADMINS where email=:email AND password=:password";

            $sql = $this->connection->prepare($getAdminQuery);
            $sql->bindValue(':email', $emailInput);
            $sql->bindValue(':password', $passwordInput);
            $sql->execute();

            $adminData = $sql->fetch(PDO::FETCH_ASSOC);

            if ($adminData == null) {

                $response = json_encode([
                    'code' => 404,
                    'message' => 'Admin not found'
                ]);
                echo $response;
            } else {
                $studentData["access_token"] = $this->stringEncryption('encrypt', $adminData["id"]);
                session_start();
                $_SESSION['access_token'] = $studentData["access_token"];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                $response = json_encode([
                    'code' => 200,
                    'data' => array(
                        'admin' => $studentData
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
}
