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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</body>
</html>
<?php

// Include your database connection file
include("adminconfig.php");

// Function to delete a comment by ID
function deleteComment($conn, $commentID) {
    $sql = "DELETE FROM Comments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $commentID);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Handle comment deletion
if (isset($_POST['delete_comment'])) {
    $commentID = $_POST['comment_id'];
    
    if (deleteComment($conn, $commentID)) {
        echo "Comment deleted successfully!";
    } else {
        echo "Error deleting comment.";
    }
}

// Fetch and display comments from the database
$sql = "SELECT id, naam, email, telefoonnummer, bedrijfnaam, messages FROM Comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<tr><th>Name</th><th>Email</th><th>Phone Number</th><th>Company Name</th><th>Message</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['naam'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['telefoonnummer'] . "</td>";
        echo "<td>" . $row['bedrijfnaam'] . "</td>";
        echo "<td>" . $row['messages'] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='comment_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='delete_comment' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No comments found.";
}

// Close the database connection
$conn->close();
?>


