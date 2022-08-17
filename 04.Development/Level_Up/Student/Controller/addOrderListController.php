<?php
session_start();
require_once "../Model/dbConnection.php";

$db2 = new DBConnect();
$dbconnect = $db2->connect();

if (isset($_POST)) {
    print_r($_SESSION);

    try {
        foreach ($_SESSION['course_id_collection'] as $course) {

            $sql = $dbconnect->prepare("SELECT M_COURSES.id as course_id,M_COURSES.price, M_COURSES.promo_percent,M_COURSES.instructor_id FROM M_INSTRUCTORS LEFT JOIN M_COURSES ON M_INSTRUCTORS.id = M_COURSES.instructor_id WHERE M_COURSES.id IN ($course)");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) {
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
                $sql->bindValue(":course", $value['course_id']);
                $sql->bindValue(":instructor", $value['instructor_id']);
                $sql->bindValue(":price", $value['price'] -  ($value['price'] * ($value['promo_percent'] / 100)));
                $sql->bindValue(":create", date("Y/m/d"));
                $sql->bindValue(":update", date("Y/m/d"));
                $sql->execute();
            }
        }
    } catch (\Throwable $th) {
        echo $th;
    }





    // $in = $_SESSION["checkout"];
    // $sql = $dbconnect->prepare("SELECT * FROM 
    //                         M_INSTRUCTORS LEFT JOIN 
    //                         M_COURSES ON 
    //                         M_INSTRUCTORS.id = M_COURSES.instructor_id 
    //                         WHERE M_COURSES.id IN ($in)
    //                     ");
    // $sql->execute();
    // $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($result as $key => $value) {
    //     $sql = $dbconnect->prepare("
    //     INSERT INTO T_ORDER_LIST(
    //         student_id,
    //         course_id,
    //         instructor_id,
    //         order_number,
    //         order_price,
    //         created_at,
    //         updated_at
    //         )
    //     VALUES ( 
    //         1,
    //         :course,
    //         :instructor,
    //         :order_number,
    //         :price,
    //         :create,
    //         :update
    //     );
    // ");
    //     $sql->bindValue(":order_number", date("#YmdHis"));
    //     $sql->bindValue(":course", $value['id']);
    //     $sql->bindValue(":instructor", $value['instructor_id']);
    //     $sql->bindValue(":price", $value['price'] -  ($value['price'] * ($value['promo_percent'] / 100)));
    //     $sql->bindValue(":create", date("Y/m/d"));
    //     $sql->bindValue(":update", date("Y/m/d"));
    //     $sql->execute();
    // }
    // echo "../View/paymentMethod.php";
}
