<?php
  session_start();
  include "./../functions/connection-functions.php";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $q = "select * from player where userName = '$username'";
  $res = mysqli_query($conn, $q) or die(mysqli_error($conn));
  if(mysqli_num_rows($res)>0){
    $id = 0;
    while($row = mysqli_fetch_array($res)){
      $id = $row["registrationOrder"];
      $q2 = "select * from authenticator where registrationOrder = '$id'";
      $result = mysqli_query($conn, $q2) or die(mysqli_error($conn));
      while($row2 = mysqli_fetch_array($result)){
        $pass = $row2["passCode"];
        if (password_verify($password, $pass)) {
          $_SESSION["user"] = $id;
          $_SESSION["level"] = 1;
          $_SESSION["score"] = 0;
          $_SESSION["lives"] = 6;
          header("location:./../../public/form/game-form.php");
        } else {
          header("location:./../../public/form/signin-form.php?error=2");
        }
      }
    }
  }else{
    header("location:./../../public/form/signin-form.php?error=1");
  }
  $lastInsertedID = mysqli_insert_id($conn);
?>