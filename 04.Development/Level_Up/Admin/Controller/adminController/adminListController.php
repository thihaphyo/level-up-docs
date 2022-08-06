<?php

require_once("..//Model/dbConnection.php");

class AdminListController extends DBConnect
{
    public function showAllAdmin()
    {
        $gotConnection = $this->connect();

        $sql = $gotConnection->prepare("SELECT * FROM M_ADMINS WHERE is_deleted IS NULL AND email IS NOT NULL");

        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function viewAdmin($adminID)
    {
        $gotConnection = $this->connect();

        $sql = $gotConnection->prepare("SELECT * FROM M_ADMINS WHERE id= :id AND is_deleted IS NULL");
        $sql->bindValue(':id', $_SESSION['adminId']);

        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}


// header('location: ../../View/admin list.php', $data = "hello");
