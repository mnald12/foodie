<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="style.css?v=<?= time(); ?>" />
<style>
  h1{
    color: darkcyan;
    font-weight: bolder;
    font-size: 30px;
    text-align: center;
    margin: 15px;
  }
</style>
</head>
<body>
  <form class="modal-content animate" action="action_page.php" method="post">
    <h1>FOODIE</h1>
    <?php if(isset($_SESSION['error_message'])): ?>
       	<div class="error-message">
            <?= $_SESSION['error_message']; ?>
        </div>
    <?php unset($_SESSION['error_message']); ?>
    <?php endif ?>
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <a class="reg" href="register.php">dont have an account?</a>
      </label>
      <br>
      <br>
    </div>
  </form>
</body>
</html>