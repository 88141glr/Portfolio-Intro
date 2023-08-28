<?php
$servername = "localhost";
$username = "db88141";
$password = "Kaas1001!";
$dbname = "Comments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate user inputs
$naam = mysqli_real_escape_string($conn, $_POST['naam']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefoonnummer = mysqli_real_escape_string($conn, $_POST['telefoonnummer']);
$bedrijfnaam = mysqli_real_escape_string($conn, $_POST['bedrijfnaam']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// You can add more validation checks if needed

$sql = "INSERT INTO comments (naam, email, telefoonnummer, bedrijfnaam, message)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $naam, $email, $telefoonnummer, $bedrijfnaam, $message);

if ($stmt->execute()) {
    header("Location: Contact.php"); // Redirect back to the form page
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
