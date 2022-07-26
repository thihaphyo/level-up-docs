<?php
require_once('./adminSignInController.php');
header('Content-Type: application/json; charset=utf-8');

$controller = new AuthController();

$data = $controller->signIn();

echo $data;

