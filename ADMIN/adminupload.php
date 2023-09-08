<?php
// Start a session to manage user authentication
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: Login/login.php"); // Redirect to your login page
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Upload a Project</h1>
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
          <li><a href="../Contact/Contact.php" class="nav-link px-2 text-white">Contact</a></li>
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
    <form action="uploadprocess.php" method="post" enctype="multipart/form-data">
        <label class="form-label" for="name">Project Name:</label>
        <input class="form-control" type="text" name="name" required><br>
        
        <label class="form-label" for="description">Link</label>
        <textarea class="form-control" name="description" required></textarea><br>
        
        <label class="form-label" for="image">Image:</label>
        <input class="form-control" type="file" name="image" required><br>
        
      
        
        <input class="btn btn-success" type="submit" value="Upload">
    </form>
</body>
</html>
