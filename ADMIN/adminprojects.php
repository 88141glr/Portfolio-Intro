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
    <title>Delete Projects</title>
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
$servername = "localhost";
$username = "db88141";
$password = "Kaas1001!";
$dbname = "88141_database";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a project has been deleted
if (isset($_GET['delete_status']) && $_GET['delete_status'] === 'success') {
    echo '<p style="color: green;">Project deleted successfully.</p>';
}

// Check if a project ID is provided via GET request
if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    // Prepare and execute a DELETE statement
    $sql = "DELETE FROM Projects WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $project_id);
        if ($stmt->execute()) {
            header("Location: adminprojects.php?delete_status=success");
            exit();
        } else {
            echo "Error deleting project: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Retrieve projects from the database
$sql = "SELECT ID, Name, Description, image_path FROM Projects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h1>Delete Projects</h1>';
    echo '<table class="table">';
    echo '<tr><th>ID</th><th>Name</th><th>Description</th><th>Image Path</th><th>Action</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['ID'] . '</td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Description'] . '</td>';
        echo '<td>' . $row['image_path'] . '</td>';
        echo '<td><a href="adminprojects.php?project_id=' . $row['ID'] . '">Delete</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No projects found.';
}

// Close the database connection
$conn->close();
?>

