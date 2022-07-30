<?php

require_once('../../Model/dbConnection.php');

class BaseController
{

    public $connection;

    function __construct()
    {
        $pdo = new DBConnect();
        $this->connection = $pdo->connect();
        $this->cleanPics();
    }

    function cleanPics()
    {
        $path    = '../../assets';
        $files = array_diff(scandir($path), array('.', '..'));

        $getInstructorQuery =  "select profile_image from M_INSTRUCTORS";

        $sql = $this->connection->prepare($getInstructorQuery);
        $sql->execute();

        $instructorList = $sql->fetchAll(PDO::FETCH_ASSOC);

        $imagesInDb = array_filter(array_map(function ($ins) {
            return $ins["profile_image"];
        }, $instructorList));

        foreach ($files as $key => $value) {
            if (in_array("../assets/" . $value, $imagesInDb) == false) {
                unlink("../../assets/" . $value);
            }
        }
    }

    public function jsonData()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}
