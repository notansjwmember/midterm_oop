<?php
require_once "../config/db.php";
require_once "./UserController.php";

header("Content-Type: application/json");

$database = new Database();
$db = $database->getConnection();

$controller = new UserController($db);

$method = $_SERVER["REQUEST_METHOD"];
$data = ($method === "GET") ? $_GET : json_decode(file_get_contents("php://input"), true);

$controller->handleRequest($method, $data);
