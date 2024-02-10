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
<form action="./../../src/features/forget.php" method="post">
  <div class="container-auth">
    <h1>Forget Password</h1>
   <?php
      if(isset($_REQUEST["error"]) && $_REQUEST["error"] == 1){
        echo ' <center><p class="text-danger">This Username is Not Registered</p></center>';
      }
   ?>
    <div class="d-grid">
      <span>Username : </span>
      <input type="text" name="username" class="form-control" placeholder="Enter Username ..." required>
    </div>
    <div class="d-flex">
      <input type="submit" value="Verify" class="btn btn-danger">
      <a href="signin-form.php" class="btn btn-outline-primary">Back</a>
    </div>
  </div>
</form>

<?php include './../template/footer.php'; ?>

</body>
</html>
