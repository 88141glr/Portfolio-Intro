<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit();
}

// Database configuration
$servername = "localhost";
$username = "db88141";
$password = "Kaas1001!";
$dbname = "88141_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle comment deletion
if (isset($_GET['delete_comment_id'])) {
    $comment_id = $_GET['delete_comment_id'];
    
    // Perform the deletion (you should validate input and handle errors)
    $sql = "DELETE FROM Comments WHERE comment_id = $comment_id";
    if ($conn->query($sql) === TRUE) {
        echo "Comment deleted successfully.";
    } else {
        echo "Error deleting comment: " . $conn->error;
    }
}

// Handle comment editing (you should provide an edit form)
if (isset($_POST['edit_comment_id'])) {
    $comment_id = $_POST['edit_comment_id'];
    $new_comment_text = $_POST['new_comment_text'];
    
    // Perform the update (you should validate input and handle errors)
    $sql = "UPDATE Comments SET comment_text = '$new_comment_text' WHERE comment_id = $comment_id";
    if ($conn->query($sql) === TRUE) {
        echo "Comment updated successfully.";
    } else {
        echo "Error updating comment: " . $conn->error;
    }
}

// Your code for displaying comments and edit/delete functionality goes here

