<?php
  $password = $_REQUEST["password"];
  if ( $password == "" ){
    echo "Password Cannot Empty";
  }else if(strlen($password) < 8) {
    echo "Password Must At Least 8 Digits";
  }else{
    echo 1;
  }
?>