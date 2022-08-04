<?php
require_once('dbConnection.php');

class instructorlistModel extends DBConnect
{
    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    public function get_instructorlist($start, $limit)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM M_INSTRUCTORS LIMIT $start, $limit");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_instructorcount () {

        $stmt = $this->pdo->prepare("SELECT COUNT(id) AS count FROM M_INSTRUCTORS");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_all_orders () {

        $stmt = $this->pdo->prepare("SELECT * FROM M_INSTRUCTORS");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
}
