<?php

$servername = "localhost";
$username = "db88141";
$password = "Kaas1001!";
$dbname = "88141_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$description = $_POST['description'];

$image_path = "../Media/" . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

$sql = "INSERT INTO Projects (Name, Description, image_path) VALUES ('$name', '$description', '$image_path')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to adminupload.php
    header("Location: adminupload.php");
    exit; // Make sure to exit after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
