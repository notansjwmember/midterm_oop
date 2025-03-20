<?php
class Database
{

  private $host = "127.0.0.1";
  private $user = "root";
  private $pass = "skibiditoilet";
  private $db = "oop_php";

  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

    if ($this->conn->connect_error) {
      die(json_encode(["error" => "Database connection failed: " . $this->conn->connect_error]));
    }
  }

  public function getConnection()
  {
    return $this->conn;
  }
}
