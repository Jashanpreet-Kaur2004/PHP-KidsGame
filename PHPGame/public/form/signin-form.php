<?php
  session_start();
  if(isset($_SESSION["user"])){
    header("location:game-form.php");
  }
  include './../template/head.php';
 ?>
<style>
  body{
  background-color: black;
  font-family: sans-serif;
  color: white;
  }
</style>
<body>

<?php include './../template/header.php'; ?>

<?php include './../template/nav.php'; ?>
<form action="./../../src/features/signin.php" method="post">
  <div class="container-auth">
    <h1>GameY Login</h1>
   <?php
      if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 1){
        echo ' <center><p class="text-danger">This Username is Not Registered</p></center>';
      }else if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 2){
        echo ' <center><p class="text-danger">Wrong Password</p></center>';
      }else if(isset($_REQUEST["pw-updated"]) && $_REQUEST["pw-updated"] == 1){
        echo ' <center><p class="text-success">Password Updated Successfully. Pleae Login</p></center>';
      }
   ?>
    <div class="d-grid">
      <span>Username : </span>
      <input type="text" name="username" class="form-control" placeholder="Enter Username ..." required>
    </div>

    <div class="d-grid">
      <span>Password : </span>
      <input type="password" name="password" class="form-control" placeholder="Enter Password ..." required>
      <a href="forget-password-form.php">Forget Password</a>
    </div>

    <div class="d-flex">
      <input type="submit" value="Login" class="btn btn-danger">
      <a href="signup-form.php" class="btn btn-outline-primary">Signup</a>
    </div>

  </div>
</form>

<?php include './../template/footer.php'; ?>

</body>
</html>
