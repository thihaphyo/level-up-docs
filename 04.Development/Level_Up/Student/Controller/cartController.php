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
            $sql = $gotConnection->prepare("SELECT T_STUDENT_CART.id,T_STUDENT_CART.student_id, M_COURSES.course_title, M_COURSES.price, M_COURSES.course_cover_image,T_STUDENT_CART.is_deleted, M_INSTRUCTORS.full_name FROM T_STUDENT_CART INNER JOIN M_COURSES ON T_STUDENT_CART.course_id = M_COURSES.id INNER JOIN M_INSTRUCTORS ON M_COURSES.instructor_id = M_INSTRUCTORS.id LIMIT 0, 10
            ");

            $sql->bindValue(':id', $_SESSION['stid']);

            $sql->execute();
            $cartResult = $sql->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($cartResult);
        } catch (\Throwable $th) {
            echo $th;
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
