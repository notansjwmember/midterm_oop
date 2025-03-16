<?php
require_once "../config/db.php";

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
  $query = "SELECT * from users ORDER BY user_id DESC";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo json_encode(["error" => mysqli_error($conn)]);
    exit;
  }

  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo json_encode($users);

  mysqli_free_result($result);
}

$fields = [
  "first_name",
  "last_name",
  "email",
  "phone",
  "birthdate",
  "gender",
  "country",
  "city",
  "address",
  "postal_code",
  "username",
  "password",
  "bio",
  "user_photo",
];

$field_types = str_repeat("s", count($fields));

if ($method == "POST") {
  $data = $_POST;

  foreach ($fields as $field) {
    if ($field === "user_photo") {
      if (!isset($_FILES["user_photo"]) || $_FILES["user_photo"]["error"] !== UPLOAD_ERR_OK) {
        die(json_encode(["error" => "File upload error"]));
      }
      continue;
    }

    if (empty($data[$field])) {
      die(json_encode(["error" => "$field is required"]));
    }
  }

  $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

  $uploadDir = "../uploads/";
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  $fileTmp = $_FILES["user_photo"]["tmp_name"];
  $fileName = basename($_FILES["user_photo"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

  $newFileName = uniqid("profile_", true) . "." . $fileType;
  $uploadPath = $uploadDir . $newFileName;


  if (move_uploaded_file($fileTmp, $uploadPath)) {
    $data["user_photo"] = $uploadPath;
  } else {
    die(json_encode(["error" => "Failed to upload profile picture"]));
  }

  $placeholders = implode(", ", array_fill(0, count($fields), "?"));
  $columns = implode(", ", $fields);
  $query = "INSERT INTO users ($columns) VALUES ($placeholders)";

  $stmt = $conn->prepare($query);
  $stmt->bind_param($field_types, ...array_values($data));

  if ($stmt->execute()) {
    echo json_encode(["success" => "User added succesfully"]);
  } else {
    echo json_encode(["error" => "Error while adding user"]);
  }

  $stmt->close();
}

mysqli_close($conn);
