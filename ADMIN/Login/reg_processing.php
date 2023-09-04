<?php
session_start();
require 'config.php';
// Pakt de USER en PASS in de tabel
$user =  $_POST['user'];
$pass = $_POST['pass'];
$pass = password_hash($pass, PASSWORD_DEFAULT);
// Query word gebruikt
$query = "INSERT INTO `Users` (`ID`,`Username`, `Password`)
    VALUES ('NULL', '$user', '$pass')";
if (mysqli_query($mysqli, $query)) {
    $_SESSION['logged'] = true;
    header('Location: login.php');
} else {
    echo "ERROR: $sql. "
        . mysqli_error($conn);
}
?>