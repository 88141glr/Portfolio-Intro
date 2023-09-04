<?php
// Start a session to manage user authentication
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: Login/login.php"); // Redirect to your login page
    exit();
}

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
    echo "<table border='1'>";
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
