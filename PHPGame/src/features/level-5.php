<?php
  session_start();
  $question__1 = $_REQUEST["question__1"];
  $question__2 = $_REQUEST["question__2"];
  $question__3 = $_REQUEST["question__3"];
  $question__4 = $_REQUEST["question__4"];
  $question__5 = $_REQUEST["question__5"];
  $question__6 = $_REQUEST["question__6"];

  $small = $_REQUEST["small"];
  $large = $_REQUEST["large"];

  $questions = [$question__1, $question__2, $question__3, $question__4, $question__5, $question__6];

  if( min($questions) == $small && max($questions) == $large ) {
    $_SESSION["score"] = $_SESSION["score"] + 10;
    $_SESSION["level"] = 6;
    $_SESSION["flash"] = 1;
  }else{
    $lives = $_SESSION["lives"];
    if($lives>=1){
      $_SESSION["lives"] = $lives - 1;
    }
    $_SESSION["flash"] = 0;
  }
  header("location:./../../public/form/game-form.php");
?>