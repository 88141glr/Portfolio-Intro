<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$servername = "localhost";
$username = "db88141";
$password = "Kaas1001!";
$dbname = "88141_database";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $bedrijfnaam = $_POST['bedrijfnaam'];
    $message = $_POST['message'];

    // Use prepared statements to prevent SQL injection
    $stmt = $pdo->prepare("INSERT INTO Comments (naam, email, telefoonnummer, bedrijfnaam, messages) VALUES (:naam, :email, :telefoonnummer, :bedrijfnaam, :message)");
    
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefoonnummer', $telefoonnummer);
    $stmt->bindParam(':bedrijfnaam', $bedrijfnaam);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        header("Location: Contact.php?status=success"); // Redirect with success status
    } else {
        header("Location: Contact.php?status=error"); // Redirect with error status
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null; // Close the PDO connection
?>
