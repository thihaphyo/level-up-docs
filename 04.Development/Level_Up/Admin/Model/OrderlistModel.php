<?php

require_once('dbConnection.php');

class OrderlistModel extends DBConnect
{
    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    public function get_orderlist($start, $limit)
    {
        $stmt = $this->pdo->prepare(
            "   SELECT * FROM 
                    (SELECT t.*, M_STUDENTS.full_name, M_STUDENTS.email FROM
                        (SELECT T_ORDER_LIST.*, M_COURSES.course_title 
                        FROM T_ORDER_LIST JOIN M_COURSES 
                        ON T_ORDER_LIST.course_id = M_COURSES.id) AS t
                        JOIN M_STUDENTS
                    ON t.student_id = M_STUDENTS.id) AS a
                LIMIT $start, $limit"
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_ordercount()
    {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(id) as count FROM T_ORDER_LIST"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_orders()
    {
        $stmt = $this->pdo->prepare(
            "   SELECT a.course_title, a.full_name, a.email, a.order_price, a.created_at FROM 
                    (SELECT t.*, M_STUDENTS.full_name, M_STUDENTS.email FROM
                        (SELECT T_ORDER_LIST.id,
                        T_ORDER_LIST.student_id, T_ORDER_LIST.instructor_id, T_ORDER_LIST.order_price, T_ORDER_LIST.created_at, M_COURSES.course_title 
                        FROM T_ORDER_LIST JOIN M_COURSES 
                        ON T_ORDER_LIST.course_id = M_COURSES.id) AS t
                        JOIN M_STUDENTS
                    ON t.student_id = M_STUDENTS.id) AS a"
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
