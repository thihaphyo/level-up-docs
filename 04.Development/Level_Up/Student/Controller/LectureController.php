<?php

require_once ('../Model/LectureModel.php');

# THE ENTRY POINT
// http://localhost/Develop/level-up-docs/04.Development/Level_Up/Student/Controller/LectureController.php?course_id=1

$controllerURL = 'http://localhost/Develop/level-up-docs/04.Development/Level_Up/Student/Controller/LectureController.php?course_id=1';


if(isset($_POST['newChapID'])){
// When a new chapter is requested:

    $model = new LectureModel($_POST['course_id']); // $course_id is sent from JS.
    echo json_encode($model->get_chap_details($_POST['newChapID']));
    
} else if (isset($_POST['quizForLecture'])){
// When the quiz list is requested:

    $model = new LectureModel($_POST['course_id']); // $course_id is sent from JS.
    echo json_encode($model->get_quiz($_POST['quizForLecture']));

} else if (isset($_GET['course_id'])){
// Initial Loading:

    $course_id = $_GET['course_id'];
    $course_title = $_GET['course_title'] ?? 'Anon';

    $model = new LectureModel($course_id);
    $chapter_list = $model->get_chap_list();
    $chapter_details = $model->get_chap_details($chapter_list[0]['id']);

    // Rendering the View.
    require ('../../Student/View/LectureView.php');
    
} else {
    echo "PLEASE SPECIFY COURSE";
}

?>