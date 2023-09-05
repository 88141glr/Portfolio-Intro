<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <script src="Script/script.js"></script>
    <title>Portfolio</title>
</head>



<body>
    <div class="header">
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="#">Over Mij</a></li>
            <li><a href="Contact/Contact.php">Contact</a></li>
            <li><a href="Projects/projects.php">Projecten</a></li>
            
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                // Show the "Logout" link when logged in
                echo '<li><a href="ADMIN/admincomments.php">Admin</a></li>';
                echo '<li><a href="ADMIN/Login/logout.php">Logout</a></li>';
            } else {
                // Show the "Login" link when not logged in
                echo '<li><a href="ADMIN/Login/login.php">Login</a></li>';
            }
            ?>
        </ul>
    </div>

    <div class="center-container">
        <div class="centered-content">
            <img src="Media/dennis.jpg"><br/>
            Hallo, ik ben Dennis. Dit is een portfolio.
        </div>
    </div>
</body>
</html>
