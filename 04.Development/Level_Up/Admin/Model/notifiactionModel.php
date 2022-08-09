<?php
require_once('dbConnection.php');

class historylistModel extends DBConnect
{
    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    public function get_historylist($start, $limit)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM m_notifications LIMIT $start, $limit");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_historycount () {

        $stmt = $this->pdo->prepare("SELECT COUNT(id) AS count FROM m_notifications");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_all_orders () {

        $stmt = $this->pdo->prepare("SELECT* FROM m_notifications");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
}
