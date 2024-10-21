<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "medical";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Failed to connect database: " . $conn->connect_error);
}
?>
