<?php
  session_start();
  include "./../functions/connection-functions.php";
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $uname = $_POST["uname"];
  $pass = $_POST["pass"];
  $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
  $currentDateTime = date("Y-m-d H:i:s");

  $q = "insert into player (fName, lName,userName, registrationTime) values('$fname' , '$lname', '$uname', '$currentDateTime')";
  mysqli_query($conn, $q) or die(mysqli_error($conn));
  $lastInsertedID = mysqli_insert_id($conn);

  $q2 = "insert into authenticator (passCode, registrationOrder) values('$hashedPassword', '$lastInsertedID')";
  mysqli_query($conn, $q2) or die(mysqli_error($conn));
  $_SESSION["user"] = $lastInsertedID;
  header("location:./../../public/form/game-form.php");
?>