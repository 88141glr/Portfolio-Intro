<?php
include('config.php');
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user'])) header('Location: ../admincomments.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Style/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav id='menu'>
        <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
        <ul>
            <li></li>
        </ul>
    </nav>
    <br>
    <div id="frm">
        <div id="notificationDiv" <?php if (isset($_SESSION['logged'])) echo "style='display:block;'" ?>>
            <?php
            if (isset($_SESSION['logged'])) {
                echo "<i class='fa fa-check' style='color:green;'></i> Uw account is aangemaakt.";
            }
            unset($_SESSION['logged']);
            echo "<script>
        setTimeout(function() {
            let div = document.getElementById('notificationDiv');
            div.style.display = 'none';
        }, 4000);
    </script>";
            ?>
        </div>
        <h1>Login</h1>
        <?php if (isset($_SESSION['error'])) {
            echo "<p style=color:red>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        } ?>
        <form name="f1" action="authentication.php" method="POST">
            <p>
                <label for="user"> Username: </label>
                <input type="text" id="user" name="user" />
            </p>
            <p>
                <label for="pass"> Password: </label>
                <input type="password" id="pass" name="pass" />
            </p>
            <p>
                <input type="submit" class="btn" value="Login" />
            </p>
        </form>
<!--    <a class="btn" href='register.php'>Register</a> -->
    </div>

</html>