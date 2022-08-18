<?php

class DBConnect
{
    private $hostname = "levelup.cdiydtaeuqms.ap-southeast-1.rds.amazonaws.com";
    private $port = 3306;
    private $dbname = "levelupdb";
    private $username = "admin";
    private $password = "levelup123";

    public function connect()
    {
        //connection
        try {
            $pdo = new PDO("mysql:host=$this->hostname;port=$this->port;dbname=$this->dbname", $this->username, $this->password);
            //set error reply
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
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
            return $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            return $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}
