<?php
  function generate_numbers(){
    $numbers = array();
    while (count($numbers) < 6) {
      $randomNumber = rand(0, 99);
      if (!in_array($randomNumber, $numbers)) {
        $numbers[] = $randomNumber;
      }
    }
    return $numbers;
  }

  function generate_letters(){
    $alphabets = array();
    while (count($alphabets) < 6) {
      $randomAlphabet = chr(rand(65, 90));
      if (!in_array($randomAlphabet, $alphabets)) {
        $alphabets[] = $randomAlphabet;
      }
    }
    return $alphabets;
  }

?>