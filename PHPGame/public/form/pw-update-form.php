<?php
  session_start();
  if(isset($_SESSION["user"])){
    header("location:game-form.php");
  }

  if(!isset($_SESSION["forget_uname"])){
    header("location:forget-password-form.php");
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
<form action="./../../src/features/pw-update.php" method="post">
  <div class="container-auth">
    <h1>Update Password</h1>
   <?php
      if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 1){
        echo ' <center><p class="text-danger">Password Did Not Matched</p></center>';
      }else if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 2){
        echo ' <center><p class="text-danger">Password Should be Minimum 8 digits long</p></center>';
      }
   ?>
    <div class="d-grid">
      <span>Enter New Password : </span>
      <input type="password" name="password" class="form-control" placeholder="Enter New Password ..." required>
    </div>
    <div class="d-grid">
      <span>Confirm New Password : </span>
      <input type="password" name="cpassword" class="form-control" placeholder="Enter New Password Again ..." required>
    </div>
    <div class="d-flex">
      <input type="submit" value="Change" class="btn btn-danger">
      <a href="signin-form.php" class="btn btn-outline-primary">Back</a>
    </div>
  </div>
</form>

<?php include './../template/footer.php'; ?>

</body>
</html>
