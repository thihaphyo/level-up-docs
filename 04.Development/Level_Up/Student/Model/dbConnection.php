<?php

class DBConnect{
    private $hostname = "levelup.cdiydtaeuqms.ap-southeast-1.rds.amazonaws.com";
    private $port = 3306;
<<<<<<< HEAD
    private $dbname = "level_up";
    private $username = "root";
    private $password = "";
=======
    private $dbname = "levelupdb";
    private $username = "admin";
    private $password = "levelup123";
>>>>>>> 470edd4e98c14fd7c83f7833a55b2430e390b099

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