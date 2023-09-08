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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Portfolio</title>
</head>
<body>

<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="AboutMe/AboutMe.php" class="nav-link px-2 text-white">Over Mij</a></li>
          <li><a href="Projects/projects.php" class="nav-link px-2 text-white">Projecten</a></li>
          <li><a href="Contact/Contact.php" class="nav-link px-2 text-white">Contact</a></li>
        </ul>


        <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                // Show the "Logout" link when logged in
                echo '<div class="dropdown text-end">';
                echo '<a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                echo '<img src="Media/kirbe.png" alt="mdo" width="32" height="32" class="rounded-circle">';
                echo '</a>';
                echo '<ul class="dropdown-menu text-small">';
                echo '<li><a class="dropdown-item" href="ADMIN/admincomments.php">Remove Comments</a></li>';
                echo '<li><a class="dropdown-item" href="ADMIN/adminprojects.php">Remove Projects</a></li>';
                echo '<li><a class="dropdown-item" href="ADMIN/adminupload.php">Upload Projects</a></li>';
                echo '<li><hr class="dropdown-divider"></li>';
                echo ' <li><a class="dropdown-item" href="ADMIN/Login/logout.php">Sign out</a></li>';
                echo '</ul>';
            } else {
                // Show the "Login" link when not logged in
                echo '   <div class="text-end">';
                echo '   <a href="ADMIN/Login/login.php"><button type="button" class="btn btn-outline-light me-2" >Login</button></a>';
                echo '  </div>';
            }
            ?>

        </header>


    <div class="center-container">
        <div class="centered-content">
            <img src="Media/dennis.jpg"><br/>
            Hallo, ik ben Dennis. Dit is een portfolio.
        </div>
    </div>
</body>
</html>
