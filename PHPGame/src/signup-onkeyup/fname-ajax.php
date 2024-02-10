<?php
  $first_name = $_REQUEST["first_name"];
  if ( $first_name == "" ){
    echo "First Name Cannot Empty";
  }else if (!ctype_alpha($first_name[0])) {
    echo "First Name Must Start with an Alphabet";
  }else{
    echo 1;
  }
?>