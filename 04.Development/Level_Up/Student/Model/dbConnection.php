<?php

class DBConnect{
    private $hostname = "localhost";
    private $port = 3306;
    private $dbname = "levelup_db";
    private $username = "root";
    private $password = "";

    public function connect(){
        //connection
        try {

            $pdo = new PDO("mysql:host=$this->hostname;port=$this->port;dbname=$this->dbname",$this->username, $this->password);
            //set error reply
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
            
        } catch (PDOException $th) {
            echo $th;
        }
        
    }
}
?>