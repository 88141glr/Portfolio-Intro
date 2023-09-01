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

// Handle project deletion
if (isset($_GET['delete_project_id'])) {
    $project_id = $_GET['delete_project_id'];
    
    // Perform the deletion (you should validate input and handle errors)
    $sql = "DELETE FROM Projects WHERE project_id = $project_id";
    if ($conn->query($sql) === TRUE) {
        echo "Project deleted successfully.";
    } else {
        echo "Error deleting project: " . $conn->error;
    }
}

// Handle project editing (you should provide an edit form)
if (isset($_POST['edit_project_id'])) {
    $project_id = $_POST['edit_project_id'];
    $new_project_info = $_POST['new_project_info'];
    
    // Perform the update (you should validate input and handle errors)
    $sql = "UPDATE Projects SET project_info = '$new_project_info' WHERE project_id = $project_id";
    if ($conn->query($sql) === TRUE) {
        echo "Project updated successfully.";
    } else {
        echo "Error updating project: " . $conn->error;
    }
}

// Your code for displaying projects and edit/delete functionality goes here

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Projects</title>
</head>
<body>
    <h1>Manage Projects</h1>
    <!-- Display projects with edit and delete options -->
    <!-- Example Edit and Delete Links -->
    <!--
    <a href="?delete_project_id=1">Delete Project 1</a>
    <a href="?edit_project_id=1">Edit Project 1</a>
    -->
</body>
</html>
