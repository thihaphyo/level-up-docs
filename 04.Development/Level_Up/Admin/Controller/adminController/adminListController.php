<?php

require_once("..//Model/dbConnection.php");

class AdminListController extends DBConnect
{
    public function showAdmin()
    {
        $gotConnection = $this->connect();

        $sql = $gotConnection->prepare("SELECT * FROM M_ADMINS WHERE is_deleted IS NULL");

        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}


// header('location: ../../View/admin list.php', $data = "hello");
