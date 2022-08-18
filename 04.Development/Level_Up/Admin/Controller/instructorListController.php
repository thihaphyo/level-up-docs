<?php
$pagination_limit = 2;

require_once "../Model/instructorListModel.php";

$model = new instructorlistModel();

if (isset($_POST['pageNum'])) {

    //pageNum = 0 means the first page.
    $list_start = (int)($_POST['pageNum']) * $pagination_limit;
    $instructorlist = $model->get_instructorlist($list_start, $pagination_limit);
    echo json_encode($instructorlist);
    // require_once('../View/instructorList.php');

} else {

    $instructorlist = $model->get_instructorlist(0, $pagination_limit);
    $instructorCount = ($model->get_instructorcount())[0]['count'];
    $pages = ceil($instructorCount / $pagination_limit);

    // require_once('../View/instructorList.php');
};
