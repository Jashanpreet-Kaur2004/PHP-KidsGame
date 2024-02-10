<?php
	session_start();
	include "./../functions/connection-functions.php";
	$username = $_REQUEST["username"];
	$q = "select * from player where userName = '$username'";
	$res = mysqli_query($conn, $q) or die(mysqli_error($conn));
  if(mysqli_num_rows($res)>0){
		$_SESSION["forget_uname"] = $username;
		header("location:./../../public/form/pw-update-form.php");
	}else{
		header("location:./../../public/form/forget-password-form.php?error=1");
	}
?>