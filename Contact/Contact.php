<!DOCTYPE html>
<?php
session_start();
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="Style/comments.css">
    <script src="../Script/ContactJS.js"></script>
</head>
<body>
<div class="header">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Over Mij</a></li>
            <li><a class="active" href="#">Contact</a></li>
            <li><a href="../Projects/projects.php">Projecten</a></li>
            
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                // Show the "Logout" link when logged in
                echo '<li><a href="../ADMIN/admincomments.php">Admin</a></li>';
                echo '<li><a href="../ADMIN/Login/logout.php">Logout</a></li>';
            } else {
                // Show the "Login" link when not logged in
                echo '<li><a href="../ADMIN/Login/login.php">Login</a></li>';
            }
            ?>
        </ul>
    </div>
    <?php
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        echo '<p class="success-message">Submission successful!</p>';
    } elseif ($_GET['status'] === 'error') {
        echo '<p class="error-message">Submission failed. Please try again.</p>';
    }
}
?>
        <h2>Contact</h2>
        <form action="process.php" method="post">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required><br>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" required>
         
        <br/>
            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="tel" id="telefoonnummer" name="telefoonnummer" pattern="[0-9]+" title="Please enter only numbers" required>
         
        <br/>
            <label for="bedrijfnaam">Bedrijf Naam:</label>
            <input type="text" id="bedrijfnaam" name="bedrijfnaam"><br>
        
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" maxlength="300" oninput="countCharacters(this)"></textarea><br>
            <span id="charCount">0 / 300 characters</span>
        
            <input type="submit" value="Submit" id="submitBtn">
        </form>

        <h2>Comments</h2>
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
    
        $sql = "SELECT * FROM Comments";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Name:</strong> " . $row['Naam'] . "</p>";
                echo "<p><strong>Email:</strong> " . $row['Email'] . "</p>";
                echo "<p><strong>Phone:</strong> " . $row['Telefoonnummer'] . "</p>";
                echo "<p><strong>Company:</strong> " . $row['Bedrijfnaam'] . "</p>";
                echo "<p><strong>Message:</strong> " . $row['Messages'] . "</p><hr>";
            }
        } else {
            echo "No comments yet.";
        }
    
        $conn->close();
        ?>

        
</body>
</html>
