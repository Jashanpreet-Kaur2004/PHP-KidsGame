<?php
  session_start();
  $question__1 = $_REQUEST["question__1"];
  $question__2 = $_REQUEST["question__2"];
  $question__3 = $_REQUEST["question__3"];
  $question__4 = $_REQUEST["question__4"];
  $question__5 = $_REQUEST["question__5"];
  $question__6 = $_REQUEST["question__6"];

  $answer__1 = $_REQUEST["answer__1"];
  $answer__2 = $_REQUEST["answer__2"];
  $answer__3 = $_REQUEST["answer__3"];
  $answer__4 = $_REQUEST["answer__4"];
  $answer__5 = $_REQUEST["answer__5"];
  $answer__6 = $_REQUEST["answer__6"];

  $questions = [$question__1, $question__2, $question__3, $question__4, $question__5, $question__6];
  asort($questions);
  $questions = array_values($questions);
  $answers = [$answer__1, $answer__2, $answer__3, $answer__4, $answer__5, $answer__6];
  if( $questions == $answers ) {
    $_SESSION["score"] = $_SESSION["score"] + 10;
    $_SESSION["level"] = 3;
    $_SESSION["flash"] = 1;
  }else{
    echo "Not Equal";
    $lives = $_SESSION["lives"];
    if($lives>=1){
      $_SESSION["lives"] = $lives - 1;
    }
    $_SESSION["flash"] = 0;
  }
  header("location:./../../public/form/game-form.php");
?>