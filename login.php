<?php
include "db.php";
if(isset($_POST['login.php']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$result=mysqli_query($conn,"select * from users where username ='$username'");

	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_assoc(result);
		if(password_verify($password,$row['password']))
		{
			echo "login successfull";
		}
		else
		{
			echo"invalid pasword";
		}
	}
	else
	{
		echo "username not found";
	}
}
?>

<h2>login</h2>
<form method="POST" action="well10.php">
username:
	<input type="text" name="username"><br>
password:
	<input type="password" name="password"><br>
	
	<input type="submit" name="login" value="login">
	<a href="register.php">register</a>
</form>
