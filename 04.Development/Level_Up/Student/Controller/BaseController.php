<?php

require_once('../../Model/dbConnection.php');

class BaseController {
    
    public $connection;

    function __construct() {
        $pdo = new DBConnect();
        $this->connection = $pdo -> connect();
    }

    public function jsonData() {
        return json_decode(file_get_contents('php://input'), true);
    }
}