<?php

require_once('dbConnection.php');

class OrderlistModel extends DBConnect {
    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    public function get_orderlist ($instructor_id, $start, $limit) {
        $stmt = $this->pdo->prepare(
            "   SELECT * FROM 
                    (SELECT t.*, m_students.full_name, m_students.email FROM
                        (SELECT t_order_list.*, m_courses.course_title 
                        FROM t_order_list JOIN m_courses 
                        ON t_order_list.course_id = m_courses.id) AS t
                        JOIN m_students
                    ON t.student_id = m_students.id) AS a
                WHERE a.instructor_id = :id
                LIMIT $start, $limit"
        );

        $stmt->execute([
            ':id' => $instructor_id,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_ordercount ($instructor_id) {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(id) as count FROM t_order_list WHERE instructor_id = :id"
        );
        $stmt->execute([':id' => $instructor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_orders ($instructor_id) {
        $stmt = $this->pdo->prepare(
            "   SELECT a.course_title, a.full_name, a.email, a.order_price, a.created_at FROM 
                    (SELECT t.*, m_students.full_name, m_students.email FROM
                        (SELECT t_order_list.id,
                        t_order_list.student_id, t_order_list.instructor_id, t_order_list.order_price, t_order_list.created_at, m_courses.course_title 
                        FROM t_order_list JOIN m_courses 
                        ON t_order_list.course_id = m_courses.id) AS t
                        JOIN m_students
                    ON t.student_id = m_students.id) AS a
                WHERE a.instructor_id = :id"
        );

        $stmt->execute([
            ':id' => $instructor_id,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>