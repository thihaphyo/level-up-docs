<?php

$instructor_id = 5;
$pagination_limit = 3;

# Sample Path:
# http://localhost/level-up-docs_original/04.Development/Level_Up/Instructor/Controller/OrderlistController.php/

require_once('../Model/OrderlistModel.php');

$model = new OrderlistModel ();

if(isset($_POST['pageNum'])){

    //pageNum = 0 means the first page.

    $list_start = (int)($_POST['pageNum']) * $pagination_limit;
    
    $orderlist = $model -> get_orderlist ($instructor_id, $list_start, $pagination_limit);

    echo json_encode($orderlist);


} else if (isset($_POST['downloadAll'])) {

    $instructor_id = $_POST['downloadAll'];
    $orderlist = $model -> get_all_orders($instructor_id);

    array_unshift($orderlist, array("course_title" => "Course_Title",
        "full_name" => "Student_Name",
        "email" => "Student_Email",
        "order_price" => "Purchase_Amount",
        "created_at" => "Purchase_Date"));

    $filename = time();

    $temp_file = fopen("../Controller/orderlistDownloads/$filename.csv", 'w');

    foreach($orderlist as $list){
        fputcsv($temp_file, $list);
    }

    fclose($temp_file);

    echo json_encode($filename);

} else if (isset($_POST['deleteCsv'])) {

    $filename_full = "../Controller/orderlistDownloads/" . $_POST['deleteCsv'] . ".csv";
    unlink($filename_full);

} else {

    $orderlist = $model -> get_orderlist ($instructor_id, 0, $pagination_limit);

    $orderCount = ($model->get_ordercount($instructor_id))[0]['count'];

    $pages = ceil($orderCount / $pagination_limit);

    // echo "<pre>";
    // print_r($orderlist);
    // echo "And here is the number of pages:";
    // print_r($pages);
    // echo "</pre>";  

    require('../View/OrderlistView.php');

}


?>