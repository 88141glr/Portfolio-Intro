<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="../Style/style.css">
    <script src="../Script/script.js"></script>
</head>
<body>
<div class="header">
<ul>
  <li><a href="../index.php">Home</a></li>
  <li><a href="#">Over Mij</a></li>
  <li><a href="Contact.html">Contact</a></li>
  <li><a class="active" href="Comments.php">Comments</a></li>
</ul>

    <h2>Comments</h2>
    <?php
    $servername = "localhost";
    $username = "db88141";
    $password = "Kaas1001!";
    $dbname = "88141_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>Name:</strong> " . $row['naam'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Phone:</strong> " . $row['telefoonnummer'] . "</p>";
            echo "<p><strong>Company:</strong> " . $row['bedrijfnaam'] . "</p>";
            echo "<p><strong>Message:</strong> " . $row['messages'] . "</p><hr>";
        }
    } else {
        echo "No comments yet.";
    }

    $conn->close();
    ?>
</body>
</html>
