<?php
// Start a session or resume the existing session.
session_start();

// Check if the user is authenticated.
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php'); // Redirect to the login page if not authenticated.
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <ul>
        <li><a href="AdminComments.php">Manage Comments</a></li>
        <li><a href="AdminProjects.php">Manage Projects</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
