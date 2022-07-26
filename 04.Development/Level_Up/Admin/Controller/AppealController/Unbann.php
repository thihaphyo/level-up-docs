<?php
require_once('./AppealController.php');
header('Content-Type: application/json; charset=utf-8');

$controller = new AppealController();

$data = $controller->unBann();

echo $data;

