<?php

require_once('../Model/InstructorModel.php');

# Example Query String for Instructor List:
# http://localhost/Student/Controller/InstructorController.php/

# Example Query String for Instructor Details:
# http://localhost/level-up-docs_original/04.Development/Level_Up/Student/Controller/InstructorController.php?instructor_id=2

$model = new InstructorModel();

if(isset($_GET['instructor_id'])){

    $instructor_details = $model->get_instructor_details($_GET['instructor_id']);

    // Rendering the View.
    require('../../Student/View/InstructorDetailView.php');

} else if (isset($_POST['i-search-input'])) {

    $instructor_list = $model->search_instructors($_POST['i-search-input']);

    // Rendering the View.
    require ('../../Student/View/InstructorListView.php');

} else {
    
    $instructor_list = $model->get_instructor_list();

    // Rendering the View.
    require ('../../Student/View/InstructorListView.php');
}

?>