<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" href="Style/admin.css">
   <script src="checkpass.js" defer></script>
</head>
<nav id='menu'>
   <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
   <ul>
      <li></li>
   </ul>
</nav>
<br>

<form action="reg_processing.php" method="post">

   <p>
      <label for="user">Username</label>
      <input type="text" name="user" id="user">
   </p>


   <p>
      <label for="pass">Wachtwoord</label>
      <input type="password" name="pass" id="pass">
   </p>
   <p>
      <label for="passchk">Bevestig Wachtwoord</label>
      <input type="password" name="CONFIRM_PASS" id="CONFIRM_PASS" onkeyup='check();' />
      <span id='message'></span>
   </p>
   <br>
   <input class="btn" id="registerbtn2" type="submit" value="Submit">
</form>
<p><a class="btn" href='login.php'>Back to Login</a></p>
</center>
</body>

</html>
</head>
<!-- <input id="registerbtn" type="submit" value="Submit"> -->