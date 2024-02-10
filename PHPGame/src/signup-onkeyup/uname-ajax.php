<?php
  $user_name = $_REQUEST["user_name"];
  include "./../functions/connection-functions.php";

  $q = "select * from player where userName = '$user_name'";
  $res = mysqli_query($conn, $q) or die(mysqli_error($conn));

  if ( $user_name == "" ){
    echo "Username Cannot Empty";
  }else if (!ctype_alpha($user_name[0])) {
    echo "Username Must Start with an Alphabet";
  }else if(strlen($user_name) < 8) {
    echo "Username Must At Least 8 Digits";
  }else if(mysqli_num_rows($res)>0){
    echo "This Username is already taken";
  }
  else{
    echo 1;
  }
?>