<?php
$pagination_limit = 2;

require_once "../Model/notifiactionModel.php";

$model = new historylistModel();

if(isset($_POST['pageNum'])){

    //pageNum = 0 means the first page.
    $list_start = (int)($_POST['pageNum']) * $pagination_limit;
    $historylist = $model -> get_historylist ($list_start, $pagination_limit);
    echo json_encode($historylist);
    // require_once('../View/instructorList.php');
    
} else {

    $historylist = $model -> get_historylist (0, $pagination_limit);
    $historyCount = ($model-> get_historycount())[0]['count'];
    $pages = ceil($historyCount / $pagination_limit);
    
    // require_once('../View/instructorList.php');
};