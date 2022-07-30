<?php
require_once('./InstructorsSEController.php');
header('Content-Type: application/json; charset=utf-8');

$controller = new InstructorsSEController();

$data = $controller->updateContents();

echo $data;

