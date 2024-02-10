<?php
  session_start();
  if (isset($_SESSION["user"])){
    header("location:public/form/game-form.php");
  } else{
    header("location:public/form/signin-form.php");    
  }
?>