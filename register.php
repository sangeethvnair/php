<?php
include "db.php";
if(isset($_POST['register']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$hash=password_hash($password,PASSWORD_DEFAULT);
	
	mysqli_query($conn,"insert into users values('$username','$hash')");
	echo "registration successfull";
}
?>

<h2>register</h2>
<form method="POST">
username:
	<input type="text" name="username"><br><br>
password:
	<input type="number" name="password"><br>
	
	<input type="submit" name="register" value="register"><br>
	<a href="login.php">login</a>
</form>

