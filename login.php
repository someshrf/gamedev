<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>user login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header1">
        <h2>Login</h2>
    </div>

    <form method="post" action="login.php">
         <!-- error messages -->
       <?php include('errors.php'); ?>
       
       <div class="input-group">
          <label>Username</label>
          <input type="text" name="username">
       </div>
       <div class="input-group">
          <label>Password</label>
          <input type="password" name="password">
       </div>
       <div class="input-group">
          <button type="submit" name="login" class="btn">Login</button>   
       </div>
       <p>
          Not yet a member? <a href="register.php"> Sign up</a>
       </p>
    </form>

</body>
<html>