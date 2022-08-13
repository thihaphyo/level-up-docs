<?php
require_once "../Model/dbConnection.php";
require_once "./notificationCountController.php";
if (isset($_POST)) {
    if ($_POST['action'] == "delete") {

        $id = $_POST['id'];
        $db = new DBConnect();
        $connection = $db->Connect();

        //Logical Delete
        $sql = $connection->prepare("
            UPDATE m_notifications SET 
            deleted_flag = 1
            WHERE id = :id 
        ");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        $sql = $dbconnect->prepare("SELECT * FROM m_notifications WHERE deleted_flag = 0 AND target != 'INSTRUCTORS' ");
        $sql->execute();
        $notiCount = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo count($notiCount);
    } else {
        echo "Can't Find Action";
    }
} else {
    echo "error";
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
