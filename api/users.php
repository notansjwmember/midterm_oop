<?php
require_once "../config/db.php";

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    $limit = isset($_GET["limit"]) ? (int) $_GET["limit"] : 13;
    $page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;
    $offset = ($page - 1) * $limit; // complement for zero based index

    // get the length or count of users in db
    $countQuery = $conn->query("SELECT COUNT(*) as total FROM users");
    $totalUsers = $countQuery->fetch_assoc()["total"];

    // set the total pages from the users available and limit per page
    $totalPages = ceil($totalUsers / $limit);

    // prep query for fetching users with the pagination
    $query = $conn->prepare(
        "SELECT * FROM users ORDER BY user_id ASC LIMIT ? OFFSET ?"
    );

    // get the users from our controls
    $query->bind_param("ii", $limit, $offset);
    $query->execute();

    $result = $query->get_result();
    $users = $result->fetch_all(MYSQLI_ASSOC);

    if (!$result) {
        echo json_encode(["error" => mysqli_error($conn)]);
        exit();
    }

    // total pages is key here for the paginatio to work
    echo json_encode(["users" => $users, "totalPages" => $totalPages]);
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

    $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);

    $uploadDir = "../uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (
        isset($_FILES["user_photo"]) &&
        $_FILES["user_photo"]["error"] === UPLOAD_ERR_OK
    ) {
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
    } else {
        $data["user_photo"] = "../uploads/default.jpg";
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

if ($method == "PUT") {
    parse_str(file_get_contents("php://input"), $data);

    if (isset($data["password"]) && !empty($data["password"])) {
        $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
    } else {
        unset($data["password"]); // Prevent overriding with NULL
    }

    $uploadDir = "../uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (
        isset($_FILES["user_photo"]) &&
        $_FILES["user_photo"]["error"] === UPLOAD_ERR_OK
    ) {
        $fileTmp = $_FILES["user_photo"]["tmp_name"];
        $fileName = basename($_FILES["user_photo"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid("profile_", true) . "." . $fileType;
        $uploadPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmp, $uploadPath)) {
            $data["user_photo"] = $newFileName;
        } else {
            die(json_encode(["error" => "Failed to upload profile picture"]));
        }
    }

    if (empty($data)) {
        die(json_encode(["error" => "No fields provided for update"]));
    }

    $updates = [];
    $values = [];

    foreach ($data as $column => $value) {
        $updates[] = "$column = ?";
        $values[] = $value;
    }

    $query = "UPDATE users SET " . implode(", ", $updates) . " WHERE user_id = ?";
    $values[] = $data["user_id"];

    $stmt = $conn->prepare($query);
    $types = str_repeat("s", count($values) - 1) . "i";
    $stmt->bind_param($types, ...$values);

    if ($stmt->execute()) {
        echo json_encode(["success" => "User updated successfully"]);
    } else {
        echo json_encode(["error" => "Error while updating user"]);
    }

    $stmt->close();
}

mysqli_close($conn);
