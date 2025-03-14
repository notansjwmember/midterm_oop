<?php
require_once "../config/db.php";

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
  $query = "SELECT * from users ORDER BY id DESC";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo json_encode(["error" => mysqli_error($conn)]);
    exit;
  }

  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo json_encode($users);

  mysqli_free_result($result);
}

mysqli_close($conn);