<?php 
require "db.php";  

if(isset($_POST['register'])) {
          $name=$_POST['name'];
          $pass=$_POST['pass'];

          $result=mysqli_query($conn, "SELECT username FROM users WHERE username='$name'");

        if(mysqli_fetch_assoc($result) > 0){
                $error="User already exist";

        } else {
                $hash=password_hash($pass, PASSWORD_DEFAULT);
                  mysqli_query($conn, "INSERT INTO users(username,password) VALUES('$name', '$hash')") or die(mysqli_error($conn));
                  header("location: login.php");
        }        
}
?>

<!DOCTYPE html>
<html>
<head>
        <title>User Authentication</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>        
        <div class="container">
                <?php if(isset($error)) echo $error; ?>
                <form method="POST">
                        <label for="name">Username:</label>
                          <input id="name" name="name" type="text" placeholder="Enter your username" required>
                          <label for="pass">Password:</label>
                          <input id="pass" name="pass" type="password" placeholder="Enter your password" required>
                          <button type="submit" name="register">Submit</button>
                </form>
                <a href=login.php><p>Already have account? Login</p></a>
        </div>
</body>
</html>