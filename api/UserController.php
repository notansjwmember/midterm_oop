<?php
require_once "./User.php";

class UserController
{
  private $userModel;

  public function __construct($db)
  {
    $this->userModel = new User($db);
  }

  public function handleRequest($method, $data)
  {
    switch ($method) {
      case "GET":
        if ($data["action"] === "all") {
          $limit = isset($data["limit"]) ? (int) $data["limit"] : 13;
          $page = isset($data["page"]) ? (int) $data["page"] : 1;
          $offset = ($page - 1) * $limit;

          $response = $this->userModel->fetchAll($limit, $offset);
          echo json_encode($response);
        } elseif ($data["action"] === "single") {
          $user = $this->userModel->fetchUser($data["user_id"]);
          echo json_encode($user);
        }
        break;

      case "POST":
        if ($data["action"] === "create") {
          unset($data["action"]);
          if ($this->userModel->createUser($data)) {
            echo json_encode(["success" => "User added successfully"]);
          } else {
            echo json_encode(["error" => "Failed to add user"]);
          }
        } elseif ($data["action"] === "update") {
          unset($data["action"]);
          if ($this->userModel->updateUser($data)) {
            echo json_encode(["success" => "User updated successfully"]);
          } else {
            echo json_encode(["error" => "Failed to update user"]);
          }
        }
        break;

      case "DELETE":
        if (!isset($data["user_id"])) {
          echo json_encode([$data["user_id"],  "error" => "user_id is required"]);
          return;
        }

        if ($this->userModel->deleteUser($data["user_id"])) {
          echo json_encode(["success" => "User deleted successfully"]);
        } else {
          echo json_encode(["error" => "Failed to delete user"]);
        }
        break;

      default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
    }
  }
}
