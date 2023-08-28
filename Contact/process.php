<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$servername = "localhost";
$username = "db88141";
$password = "Kaas1001!";
$dbname = "88141_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$naam = $_POST['naam'];
$email = $_POST['email'];
$telefoonnummer = $_POST['telefoonnummer'];
$bedrijfnaam = $_POST['bedrijfnaam'];
$message = $_POST['message'];

$sql = "INSERT INTO Comments (naam, email, telefoonnummer, bedrijfnaam, messages)
        VALUES ('$naam', '$email', '$telefoonnummer', '$bedrijfnaam', '$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: Contact.html"); // Redirect back to the form page
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
