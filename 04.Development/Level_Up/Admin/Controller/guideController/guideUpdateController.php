<?php

require_once("../../Model/dbConnection.php");

$db =  new DBConnect();
$connection = $db->connect();

$id = $db->stringEncryption("decrypt", $_POST['id']);
$seq = $_POST['seq'];
$tilte  =$_POST['title'];
$details  = $_POST['details'];

$query = "
        INSERT INTO M_GUIDE_STEPS (
                sequence_number,
                guide_id,
                step_title,
                step_details,
                step_image,
                action_by,
                is_deleted,
                created_at,
                updated_at
        )
        VALUES (
                :seq,
                :guideid,
                :title,
                :detail,
                :image,
                :actby,
                0,
                :createdt,
                :updatedt
        );
        ";

$sql = $connection->prepare($query);
$sql->bindValue(":seq", $seq);
$sql->bindValue(":guideid", $id);
$sql->bindValue(":title", $tilte);
$sql->bindValue(":detail", $details);
$sql->bindValue(":image", $id);
$sql->bindValue(":actby", 1);
$sql->bindValue(":createdt",date("Y/m/d"));
$sql->bindValue(":updatedt", date("Y/m/d"));
$sql->execute();


echo "./guideAddEdit.php?id=".$_POST['id'];
