<?php

require_once("../Model/dbConnection.php");
session_start();

class CartController extends DBConnect
{
    // create admin
    public function getCartItems()
    {

        try {
            $gotConnection = $this->connect();
            $sql = $gotConnection->prepare("SELECT T_STUDENT_CART.id,T_STUDENT_CART.student_id, M_COURSES.course_title, 
            M_COURSES.price, M_COURSES.course_cover_image,
            T_STUDENT_CART.is_deleted as cart_deleted, 
            M_COURSES.is_deleted as course_deleted,
            M_INSTRUCTORS.full_name FROM T_STUDENT_CART
            INNER JOIN M_COURSES 
                ON T_STUDENT_CART.course_id = M_COURSES.id 
                    AND T_STUDENT_CART.student_id = :stid
                    AND T_STUDENT_CART.is_deleted = 0
                    AND M_COURSES.is_deleted = 0
            INNER JOIN M_INSTRUCTORS 
                ON M_COURSES.instructor_id = M_INSTRUCTORS.id 
            LIMIT 0, 10
            ");

            $sql->bindValue(':stid', $_SESSION['stid']);

            $sql->execute();
            $cartResult = $sql->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode(['data' => $cartResult, 'status' => 200]);
        } catch (\Throwable $th) {
            echo json_encode(['data' => $th, 'status' => 500]);
        }
    }
    public function delCartItems($cartid)
    {
        try {

            $gotConnection = $this->connect();
            $sql = $gotConnection->prepare("UPDATE `T_STUDENT_CART` SET `is_deleted` = '1' WHERE (`id` = :id );");

            $sql->bindValue(':id', $cartid);

            $sql->execute();
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
if (isset($_POST)) {
    $cartResult = new CartController();
    if (isset($_GET['delete'])) {
        $cartResult->delCartItems($cartid = $_GET['delete']);
    } else {
        $cartResult->getCartItems();
    }
    // print_r($cartResult);
} else if (isset($_GET)) {
    echo "GET";
} else {
    echo "<h1>Something went wrong.</h1>";
}
