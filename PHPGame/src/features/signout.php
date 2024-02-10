<?php
  session_start();

  $userId = $_SESSION["user"];
  $level = $_SESSION["level"];
  $score = $_SESSION["score"];
  $lives = $_SESSION["lives"];
  $currentDateTime = date("Y-m-d H:i:s");

  session_destroy();
  if($level > 1 || $lives < 6){
    include "./../functions/connection-functions.php";
    $lives_user = 6 - $lives;
    $cancelQ = "insert into score (scoreTime, result, livesUsed, registrationOrder) values('$currentDateTime','incomplete','$lives_user', '$userId')";
    mysqli_query($conn, $cancelQ) or die(mysqli_error($conn));
  }
  header('Location: ./../../public/form/signin-form.php');
  exit();
?>