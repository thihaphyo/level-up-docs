<?php

require_once("../Model/dbConnection.php");
session_start();

class QuizController extends DBConnect
{
    // create admin
    public function getQuiz()
    {

        try {
            $gotConnection = $this->connect();
            $sql = $gotConnection->prepare("SELECT * FROM T_QUIZS WHERE lecture_id = :lid AND is_deleted = 0");

            $sql->bindValue(':lid', $_SESSION['lid']);

            $sql->execute();
            $cartResult = $sql->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($cartResult);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function checkQuiz()
    {
        try {
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
if (isset($_POST)) {
    $quiz = new QuizController();
    $quiz->getQuiz();

    // print_r($cartResult);
} else {
    echo "<h1>Something went wrong.</h1>";
}
