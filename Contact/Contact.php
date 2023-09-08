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
    <!-- <link rel="stylesheet" href="Style/comments.css"> -->
    <script src="../Script/ContactJS.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="../AboutMe/AboutMe.php" class="nav-link px-2 text-white">Over Mij</a></li>
          <li><a href="../Projects/projects.php" class="nav-link px-2 text-white">Projecten</a></li>
          <li><a href="#" class="nav-link px-2 text-secondary">Contact</a></li>
        </ul>


        <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                // Show the "Logout" link when logged in
                echo '<div class="dropdown text-end">';
                echo '<a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                echo '<img src="../Media/kirbe.png" alt="mdo" width="32" height="32" class="rounded-circle">';
                echo '</a>';
                echo '<ul class="dropdown-menu text-small">';
                echo '<li><a class="dropdown-item" href="../ADMIN/admincomments.php">Remove Comments</a></li>';
                echo '<li><a class="dropdown-item" href="../ADMIN/adminprojects.php">Remove Projects</a></li>';
                echo '<li><a class="dropdown-item" href="../ADMIN/adminupload.php">Upload Projects</a></li>';
                echo '<li><hr class="dropdown-divider"></li>';
                echo ' <li><a class="dropdown-item" href="../ADMIN/Login/logout.php">Sign out</a></li>';
                echo '</ul>';
            } else {
                // Show the "Login" link when not logged in
                echo '   <div class="text-end">';
                echo '   <a href="../ADMIN/Login/login.php"><button type="button" class="btn btn-outline-light me-2" >Login</button></a>';
                echo '  </div>';
            }
            ?>

        </header>
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
        <form class="mb-3" action="process.php" method="post">
            <label class="form-label" for="naam">Naam:</label>
            <input class="form-control" type="text" id="naam" name="naam" required><br>
        
            <label class="form-label" for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" required>
         
        <br/>
            <label class="form-label" for="telefoonnummer">Telefoonnummer:</label>
            <input type="tel" class="form-control" id="telefoonnummer" name="telefoonnummer" pattern="[0-9]+" title="Please enter only numbers" required>
         
        <br/>
            <label class="form-label" for="bedrijfnaam">Bedrijf Naam:</label>
            <input type="text" class="form-control" id="bedrijfnaam" name="bedrijfnaam"><br>
        
            <label class="form-label" for="message">Message:</label><br>
            <textarea class="form-control" id="message" name="message" rows="4" cols="50" maxlength="300" oninput="countCharacters(this)"></textarea><br>
            <span class="form-text" id="charCount">0 / 300 characters</span>
        
            <input class="btn btn-success" type="submit" value="Submit" id="submitBtn">
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
