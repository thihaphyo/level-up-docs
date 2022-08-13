<?php

$instructor_id = 5;
$pagination_limit = 3;

# Sample Path:
# http://localhost/level-up-docs_original/04.Development/Level_Up/Instructor/Controller/ReviewController.php/

require_once('../Model/ReviewModel.php');

$model = new ReviewModel();



if(isset($_POST['pageNum'])){

    //pageNum = 0 means the first page.

    $list_start = (int)($_POST['pageNum']) * $pagination_limit;
    
    $reviews = $model -> get_reviews ($instructor_id, $list_start, $pagination_limit);

    echo json_encode($reviews);


} else {
    $count = ($model->get_review_count($instructor_id))[0]['count'];

    $pages = ceil($count/$pagination_limit);

    $reviews = $model->get_reviews($instructor_id, 0, $pagination_limit);

    // echo "<pre>";
    // print_r($reviews);
    // echo "</pre>";  
    
    require('../View/ReviewView.php');
}


?>