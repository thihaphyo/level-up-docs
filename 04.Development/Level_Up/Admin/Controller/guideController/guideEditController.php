<?php

require_once("../Model/dbConnection.php");

$db =  new DBConnect();
$connection = $db->connect();


if ($mode == 0) { // show step list
        $id = $db->stringEncryption("decrypt", $_GET['id']);

        $query = "
        SELECT * FROM M_GUIDES AS a  
        LEFT JOIN M_GUIDE_STEPS AS b  
        ON  a.id = b.guide_id 
        WHERE a.is_deleted = 0 
        AND a.is_deleted = 0 
        AND a.id = :id";

        $sql = $connection->prepare($query);
        $sql->bindValue(":id", $id);
        $sql->execute();

        $stepList = $sql->fetchAll(PDO::FETCH_ASSOC);
} else if ($mode == 1) { //add pre step 
        $id = $db->stringEncryption("decrypt", $_GET['id']);
        $query = "
        SELECT MAX(sequence_number) AS seq FROM M_GUIDE_STEPS  WHERE guide_id = :id";

        $sql = $connection->prepare($query);
        $sql->bindValue(":id", $id);
        $sql->execute();

        $seq = $sql->fetch(PDO::FETCH_ASSOC)['seq'] ?? 0;
        $seq++;
} else if ($mode == 2) { // add post step 

}
