
<?php
require_once "../config/db.php";

class User
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function fetchAll($limit, $offset)
  {
    $query = $this->conn->prepare("SELECT * FROM users ORDER BY user_id ASC LIMIT ? OFFSET ?");
    $query->bind_param("ii", $limit, $offset);
    $query->execute();

    $result = $query->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function fetchUser($user_id)
  {
    $query = $this->conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $query->bind_param("i", $user_id);
    $query->execute();

    return $query->get_result()->fetch_assoc();
  }

  public function createUser($data)
  {
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

    $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);

    $uploadDir = "../uploads/";

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

    $field_types = str_repeat("s", count($fields));
    $placeholders = implode(", ", array_fill(0, count($fields), "?"));
    $columns = implode(", ", $fields);

    $query = "INSERT INTO users ($columns) VALUES ($placeholders)";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param($field_types, ...array_values($data));

    return $stmt->execute();
  }

  public function updateUser($data)
  {
    if (isset($data["password"]) && !empty($data["password"])) {
      $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
    } else {
      unset($data["password"]);
    }

    $uploadDir = "../uploads/";
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

    $updates = [];
    $values = [];

    foreach ($data as $column => $value) {
      $updates[] = "$column = ?";
      $values[] = $value;
    }

    $query = "UPDATE users SET " . implode(", ", $updates) . " WHERE user_id = ?";
    $values[] = $data["user_id"];

    $stmt = $this->conn->prepare($query);
    $types = str_repeat("s", count($values) - 1) . "i";
    $stmt->bind_param($types, ...$values);

    return $stmt->execute();
  }

  public function deleteUser($user_id)
  {
    $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);

    return $stmt->execute();
  }
}
?>
