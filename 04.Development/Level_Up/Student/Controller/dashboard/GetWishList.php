<?php
require_once('./DashbaordController.php');
header('Content-Type: application/json; charset=utf-8');

$controller = new DashbaordController();

$data = $controller->getWishList();

echo $data;