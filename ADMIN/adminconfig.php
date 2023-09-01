<?php
$servername = "localhost";
$username = "db88141";
$password = "Kaas1001!";
$dbname = "88141_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
