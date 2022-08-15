<?php

$controllerURL = 'http://localhost/Develop/level-up-docs/04.Development/Level_Up/Admin/Controller/InstructorReviewController.php';

require_once('../Model/InstructorReviewModel.php');

# Example Query String for Instructor List:
# http://localhost/level-up-docs_original/04.Development/Level_Up/Admin/Controller/InstructorReviewController.php

# Example Query String for Instructor Details:
# http://localhost/level-up-docs_original/04.Development/Level_Up/Admin/Controller/InstructorReviewController.php?instructor_id=2

$model = new InstructorReviewModel();

if(isset($_GET['instructor_id'])){
    
    $instructor_id = $_GET['instructor_id'];

    $instructor_details = $model->get_instructor_details($instructor_id);

    // echo "<pre>";
    // print_r($instructor_details);
    // echo "</pre>";

    // Rendering the View.
    require('../View/InstructorProfileView.php');

} else if ((isset($_GET['approve']))) {

    $model->update_instructor_status($_GET['approve'], "APPROVED");

    header("Location: " . $controllerURL);

} else if ((isset($_GET['reject']))) {

    $model->update_instructor_status($_GET['reject'], "REJECTED");

    header("Location: " . $controllerURL);

    
} else if ((isset($_GET['pend']))) {

    $model->update_instructor_status($_GET['pend'], "PENDING");

    header("Location: " . $controllerURL);

    
} else {
    
    $instructor_list = $model->get_instructor_list();

    // Rendering the View.
    require ('../View/InstructorReviewView.php');
}
