<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$db="sgms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>