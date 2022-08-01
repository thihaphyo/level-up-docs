<?php
require_once('./AuthController.php');
header('Content-Type: application/json; charset=utf-8');

$controller = new AuthController();

$data = $controller->edit();

echo $data;