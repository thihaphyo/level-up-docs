<?php
session_start();
require_once "../Model/dbConnection.php";

$db2 = new DBConnect();
$dbconnect = $db2->connect();

if (isset($_POST)) {
    try {
        foreach ($_SESSION['course_id_collection'] as $course) {

            $sql = $dbconnect->prepare("SELECT M_COURSES.id as course_id,M_COURSES.price, M_COURSES.promo_percent,M_COURSES.instructor_id FROM M_INSTRUCTORS LEFT JOIN M_COURSES ON M_INSTRUCTORS.id = M_COURSES.instructor_id WHERE M_COURSES.id IN ($course)");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql = $dbconnect->prepare("
                INSERT INTO T_ORDER_LIST(
                    student_id,
                    course_id,
                    instructor_id,
                    order_number,
                    order_price,
                    created_at,
                    updated_at
                    )
                VALUES ( 
                    :stid,
                    :course,
                    :instructor,
                    :order_number,
                    :price,
                    :create,
                    :update
                );
            ");
            $sql->bindValue(":stid", 1);
            $sql->bindValue(":order_number", date("#YmdHis"));
            $sql->bindValue(":course", $result[0]['course_id']);
            $sql->bindValue(":instructor", $result[0]['instructor_id']);
            $sql->bindValue(":price", $result[0]['price'] -  ($result[0]['price'] * ($result[0]['promo_percent'] / 100)));
            $sql->bindValue(":create", date('Y-m-d H:i:s'));
            $sql->bindValue(":update", date('Y-m-d H:i:s'));
            $sql->execute();

            $sql = $dbconnect->prepare("
        INSERT INTO T_STUDENT_PURCHASED_COURSES(
            student_id,
            course_id,
            created_at
            )
        VALUES ( 
            :stid,
            :course,
            :create
        );
        ");
            $sql->bindValue(":stid", 1);
            $sql->bindValue(":course", $result[0]['course_id']);
            $sql->bindValue(":create",  date('Y-m-d H:i:s'));
            $sql->execute();
        }
        unset($_SESSION['course_id_collection']);
    } catch (\Throwable $th) {
        echo $th;
    }
}
