<?php
$host = "127.0.0.1";
$user = "root";
$pass = "skibiditoilet";
$db = "oop_php";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("connection failed: " . mysqli_connect_error());
}

