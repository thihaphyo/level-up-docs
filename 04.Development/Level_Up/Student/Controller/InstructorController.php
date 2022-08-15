<?php

require_once('../Model/InstructorModel.php');

// THE ENTRY POINT.
$controller_URL = 'http://localhost/Develop/level-up-docs/04.Development/Level_Up/Student/Controller/InstructorController.php';

$model = new InstructorModel();

if(isset($_GET['instructor_id'])){

    $instructor_details = $model->get_instructor_details($_GET['instructor_id']);

    // Rendering the View.
    require('../View/InstructorDetailView.php');

} else if (isset($_POST['i-search-input'])) {

    $instructor_list = $model->search_instructors($_POST['i-search-input']);

    // Rendering the View.
    require ('../View/InstructorListView.php');

} else {
    
    $instructor_list = $model->get_instructor_list();

    // Rendering the View.
    require ('../View/InstructorListView.php');
}

?>