<?php
require_once "../config/db.php";
require_once "./UserController.php";

header("Content-Type: application/json");

$database = new Database();
$db = $database->getConnection();

$controller = new UserController($db);

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
  case "GET":
    $data = $_GET;
    break;
  case "POST":
    $data = $_POST;
    break;
  case "DELETE":
    $rawInput = file_get_contents("php://input");
    $data = json_decode($rawInput, true);
    break;
  default:
    echo json_encode("DEPOTA");
}

$controller->handleRequest($method, $data);
