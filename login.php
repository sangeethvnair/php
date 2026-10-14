<?php require "db.php";  

if(isset($_POST['login'])) {
          $name=$_POST['name'];
          $pass=$_POST['pass'];

          $result=mysqli_query($conn, "SELECT password FROM users WHERE username='$name'");
        $row= mysqli_fetch_assoc($result);

        if($row && password_verify($pass, $row['password'])){
                header("location: index.php");
                exit();

        } else {
                $error="Password or Username Invalid";
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
                <?php if(isset($error)) echo "<p style=color:red>$error</p>"; ?>
                <form method="POST">        
                        <label for="name">Username:</label>
                          <input id="name" name="name" type="text" placeholder="Enter your undername" required>
                          <label for="pass">Password:</label>
                          <input id="pass" name="pass" type="password" placeholder="Enter your password" required>
                          <button type="submit" name="login">Submit</button>
                </form>
                <a href=register.php><p>No account? Register</p></a>
        </div>
</body>
</html>