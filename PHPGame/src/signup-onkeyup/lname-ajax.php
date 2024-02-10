<?php
  $last_name = $_REQUEST["last_name"];
  if ( $last_name == "" ){
    echo "Last Name Cannot Empty";
  }else if (!ctype_alpha($last_name[0])) {
    echo "Last Name Must Start with an Alphabet";
  }else{
    echo 1;
  }
?>