<?php
session_start();
require_once "../Model/dbConnection.php";

$db2 = new DBConnect();
$dbconnect = $db2->connect();

if (isset($_POST)) {
    $in = $_SESSION["checkout"];
    $sql = $dbconnect->prepare("SELECT * FROM 
                            m_instructors LEFT JOIN 
                            m_courses ON 
                            m_instructors.id = m_courses.instructor_id 
                            WHERE m_courses.id IN ($in)
                        ");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        $sql = $dbconnect->prepare("
        INSERT INTO t_order_list(
            student_id,
            course_id,
            instructor_id,
            order_number,
            order_price,
            created_at,
            updated_at
            )
        VALUES ( 
            1,
            :course,
            :instructor,
            :order_number,
            :price,
            :create,
            :update
        );
    ");
        $sql->bindValue(":order_number", date("#YmdHis"));
        $sql->bindValue(":course", $value['id']);
        $sql->bindValue(":instructor", $value['instructor_id'] );
        $sql->bindValue(":price",$value['price'] -  ($value['price']*($value['promo_percent']/100)));
        $sql->bindValue(":create", date("Y/m/d"));
        $sql->bindValue(":update", date("Y/m/d"));
        $sql->execute();
    }
    echo "../View/paymentMethod.php";
}
