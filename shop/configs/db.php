<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbmame = "business";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbmame);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>