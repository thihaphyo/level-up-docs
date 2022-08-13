<?php

require_once('../Model/AdminProfileModel.php');

# Example Query String for admin Details:
# http://localhost/level-up-docs_original/04.Development/Level_Up/Admin/Controller/ProfileController.php?admin_id=2

$admin_detail_route = "http://localhost/level-up-docs_original/04.Development/Level_Up/Admin/Controller/ProfileController.php";

$model = new AdminProfileModel();

if(isset($_GET['admin_id'])){
    
    $admin_id = $_GET['admin_id'];

    $admin_details = $model->get_admin_details($admin_id);

    // echo "<pre>";
    // print_r($admin_details);
    // echo "</pre>";

    // Rendering the View.
    require('../View/AdminProfileView.php');

} else if (isset($_GET['delete'])){

    $admin_id = $_GET['delete'];
    
    $model->change_status($admin_id, 1);

    $admin_details = $model->get_admin_details($admin_id);

    // echo "<pre>";
    // print_r($admin_details);
    // echo "</pre>";

    // Rendering the View.
    require('../View/AdminProfileView.php');

} else if (isset($_GET['undo'])){

    $admin_id = $_GET['undo'];
    
    $model->change_status($admin_id, 0);

    $admin_details = $model->get_admin_details($admin_id);

    // echo "<pre>";
    // print_r($admin_details);
    // echo "</pre>";

    // Rendering the View.
    require('../View/AdminProfileView.php');
    

} else {
    
    // Shows Admin List
}

?>

