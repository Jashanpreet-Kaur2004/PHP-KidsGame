<?php
	session_start();
	include "./../functions/connection-functions.php";
	$password = trim($_REQUEST["password"]);
	$cpassword = trim($_REQUEST["cpassword"]);
  $userName = $_SESSION["forget_uname"];
  if($password != $cpassword) {
  header("location:./../../public/form/pw-update-form.php?error=1");
    exit();
  }else if (strlen($password)<8){
  header("location:./../../public/form/pw-update-form.php?error=2");
    exit();
  }else{
    $q = "select * from player where userName = '$userName'";
    $res = mysqli_query($conn, $q) or die(mysqli_error($conn));
    if(mysqli_num_rows($res)>0){
      while($row = mysqli_fetch_array($res)){
        $userId = intval($row["registrationOrder"]);
        $newHashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $newq = "update authenticator set passCode = '$newHashedPassword' where registrationOrder= '$userId'";
        mysqli_query($conn, $newq) or die(mysqli_error($conn));
        session_destroy();
        header("location:./../../public/form/signin-form.php?pw-updated=1");
      }
    }else{
    }
  }
   
?>