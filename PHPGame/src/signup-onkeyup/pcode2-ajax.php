<?php
  $cpassword = $_REQUEST["cpassword"];
  if ( $cpassword == "" ){
    echo "Confirm Password Cannot Empty";
  }else if(strlen($cpassword) < 8) {
    echo "Confirm Password Must At Least 8 Digits";
  }else{
    echo 1;
  }
?>