<?php 
  session_start();
  include "./../../src/functions/connection-functions.php";
  if(!isset($_SESSION["user"])){
    header("location:signin-form.php");
  }
  $game_canelled = false;
  $userId = $_SESSION["user"];
  if(isset($_POST["play_again"])){
    $_SESSION["level"] = 1;
    $_SESSION["score"] = 0;
    $_SESSION["lives"] = 6;
  }
  $currentDateTime = date("Y-m-d H:i:s");
  $level = $_SESSION["level"];
  $score = $_SESSION["score"];
  $lives = $_SESSION["lives"];

  if(isset($_REQUEST["cancel_game"])){
    if($level > 1 || $lives < 6){
      $game_canelled = true;
    }
  }

  include './../template/head.php';
  ?>
<style>
  body{
  background-color: black;
  font-family: sans-serif;
  color: white;
  }
</style>
<body>

<?php include './../template/header.php'; ?>

<?php include './../template/nav.php'; ?>
  <div class="container-auth">
    <div class="d-flex-game-stats">
      <span><strong>Level : </strong> <?php echo $level; ?> </span>
      <span><strong>Score : </strong> <?php echo $score; ?> </span>
      <div class="d-flex-lives">
      <img src="./../assets/media/image/green-heart.png" alt="">
      <span> : <?php echo $lives; ?> </span>
      </div>
    </div>
    <h1>Game</h1>
    <div class="container-game" id="level1">
      <?php
        if(isset($_SESSION['flash']) && $_SESSION["flash"] == 1){
          echo '<p class="msg won">Hurrah ! You Have Won Previous Level</p>';
        }else if(isset($_SESSION['flash']) && $_SESSION["flash"] == 0){
          echo '<p class="msg lost">Oops ! Your Answer was Wrong</p>';
        }
        unset($_SESSION['flash']);
      ?>
      <!-- Game Level 1: Order 6 letters in ascending order  -->
      <?php
        include "./../../src/features/game.php";
        if($level == 1 && $lives > 0 && !$game_canelled){
            $questions = generate_letters();
          ?>
            <div class="game">
              <span class="text-danger">Arrange These Letters in Descending Order</span>
              <br> <br>
              <div class="question">
                <?php
                foreach($questions as $question){
                  echo "<p>".$question."</p>";
                }
                ?>
              </div>
              <form action="./../../src/features/level-1.php" method="post">
              <p>Fill These Fileds with above letters in descending order</p>
              <div class="answer">
                <input type="hidden" name="question__1" value="<?php echo $questions[0] ?>">
                <input type="text" name="answer__1" class="form-control" required>

                <input type="hidden" name="question__2" value="<?php echo $questions[1] ?>">
                <input type="text" name="answer__2" class="form-control" required>

                <input type="hidden" name="question__3" value="<?php echo $questions[2] ?>">
                <input type="text" name="answer__3" class="form-control" required>

                <input type="hidden" name="question__4" value="<?php echo $questions[3] ?>">
                <input type="text" name="answer__4" class="form-control" required>

                <input type="hidden" name="question__5" value="<?php echo $questions[4] ?>">
                <input type="text" name="answer__5" class="form-control" required>

                <input type="hidden" name="question__6" value="<?php echo $questions[5] ?>">
                <input type="text" name="answer__6" class="form-control" required>
              </div>
                <div class="d-flex justify-content-center mt-3">
                  <input type="submit" value="Submit Answer" class="btn btn-success">
                  <a type="button" class="btn btn-outline-danger"> Cancel Game </a>
                </div>
              </form>
            </div>
          <?php
        }
        if($level == 2 && $lives > 0 && !$game_canelled){
          $questions = generate_letters();
        ?>
          <div class="game">
            <span class="text-danger">Arrange These Letters in Ascending Order</span>
            <br> <br>
            <div class="question">
              <?php
              foreach($questions as $question){
                echo "<p>".$question."</p>";
              }
              ?>
            </div>
            <form action="./../../src/features/level-2.php" method="post">
            <p>Fill These Fileds with above Letters in ascending order</p>
              <div class="answer">
                <input type="hidden" name="question__1" value="<?php echo $questions[0] ?>">
                <input type="text" name="answer__1" class="form-control" required>

                <input type="hidden" name="question__2" value="<?php echo $questions[1] ?>">
                <input type="text" name="answer__2" class="form-control" required>

                <input type="hidden" name="question__3" value="<?php echo $questions[2] ?>">
                <input type="text" name="answer__3" class="form-control" required>

                <input type="hidden" name="question__4" value="<?php echo $questions[3] ?>">
                <input type="text" name="answer__4" class="form-control" required>

                <input type="hidden" name="question__5" value="<?php echo $questions[4] ?>">
                <input type="text" name="answer__5" class="form-control" required>

                <input type="hidden" name="question__6" value="<?php echo $questions[5] ?>">
                <input type="text" name="answer__6" class="form-control" required>
              </div>
              <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Submit Answer" class="btn btn-success">
                <a href="game-form.php?cancel_game" type="button" class="btn btn-outline-danger"> Cancel Game </a>
              </div>
            </form>
          </div>
        <?php
        } 
        if($level == 3 && $lives > 0 && !$game_canelled){
          $questions = generate_numbers();
        ?>
          <div class="game">
            <span class="text-danger">Arrange These Numbers in Ascending Order</span>
            <br> <br>
            <div class="question">
              <?php
              foreach($questions as $question){
                echo "<p>".$question."</p>";
              }
              ?>
            </div>
            <form action="./../../src/features/level-3.php" method="post">
            <p>Fill These Fileds with above Numbers in ascending order</p>
              <div class="answer">
                <input type="hidden" name="question__1" value="<?php echo $questions[0] ?>">
                <input type="number" name="answer__1" class="form-control" required>

                <input type="hidden" name="question__2" value="<?php echo $questions[1] ?>">
                <input type="number" name="answer__2" class="form-control" required>

                <input type="hidden" name="question__3" value="<?php echo $questions[2] ?>">
                <input type="number" name="answer__3" class="form-control" required>

                <input type="hidden" name="question__4" value="<?php echo $questions[3] ?>">
                <input type="number" name="answer__4" class="form-control" required>

                <input type="hidden" name="question__5" value="<?php echo $questions[4] ?>">
                <input type="number" name="answer__5" class="form-control" required>

                <input type="hidden" name="question__6" value="<?php echo $questions[5] ?>">
                <input type="number" name="answer__6" class="form-control" required>
              </div>
              <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Submit Answer" class="btn btn-success">
                <a href="game-form.php?cancel_game" type="button" class="btn btn-outline-danger"> Cancel Game </a>
              </div>
            </form>
          </div>
        <?php
        }
        if($level == 4 && $lives > 0 && !$game_canelled){
          $questions = generate_numbers();
        ?>
          <div class="game">
            <span class="text-danger">Arrange These Numbers in Descending Order</span>
            <br> <br>
            <div class="question">
              <?php
              foreach($questions as $question){
                echo "<p>".$question."</p>";
              }
              ?>
            </div>
            <form action="./../../src/features/level-4.php" method="post">
            <p>Fill These Fileds with above Numbers in descending order</p>
              <div class="answer">
                <input type="hidden" name="question__1" value="<?php echo $questions[0] ?>">
                <input type="number" name="answer__1" class="form-control" required>

                <input type="hidden" name="question__2" value="<?php echo $questions[1] ?>">
                <input type="number" name="answer__2" class="form-control" required>

                <input type="hidden" name="question__3" value="<?php echo $questions[2] ?>">
                <input type="number" name="answer__3" class="form-control" required>

                <input type="hidden" name="question__4" value="<?php echo $questions[3] ?>">
                <input type="number" name="answer__4" class="form-control" required>

                <input type="hidden" name="question__5" value="<?php echo $questions[4] ?>">
                <input type="number" name="answer__5" class="form-control" required>

                <input type="hidden" name="question__6" value="<?php echo $questions[5] ?>">
                <input type="number" name="answer__6" class="form-control" required>
              </div>
              <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Submit Answer" class="btn btn-success">
                <a href="game-form.php?cancel_game" type="button" class="btn btn-outline-danger"> Cancel Game </a>
              </div>
            </form>
          </div>
        <?php
        }
        if($level == 5 && $lives > 0 && !$game_canelled){
          $questions = generate_letters();
        ?>
          <div class="game">
            <span class="text-danger">Find Smallest and Largest Letter</span>
            <br> <br>
            <div class="question">
              <?php
              foreach($questions as $question){
                echo "<p>".$question."</p>";
              }
              ?>
            </div>
            <form action="./../../src/features/level-5.php" method="post">
            <p>Fill First Field With Smallest and second field with largest letter</p>
              <div class="answer">
                <input type="hidden" name="question__1" value="<?php echo $questions[0] ?>">
                <input type="hidden" name="question__2" value="<?php echo $questions[1] ?>">
                <input type="hidden" name="question__3" value="<?php echo $questions[2] ?>">
                <input type="hidden" name="question__4" value="<?php echo $questions[3] ?>">
                <input type="hidden" name="question__5" value="<?php echo $questions[4] ?>">
                <input type="hidden" name="question__6" value="<?php echo $questions[5] ?>">
                Smallest: <input type="text" name="small" class="form-control" >
                Largest: <input type="text" name="large" class="form-control" >

              </div>
              <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Submit Answer" class="btn btn-success">
                <a href="game-form.php?cancel_game" type="button" class="btn btn-outline-danger"> Cancel Game </a>
              </div>
            </form>
          </div>
        <?php
        }
        if($level == 6 && $lives > 0 && !$game_canelled){
          $questions = generate_numbers();
        ?>
          <div class="game">
            <span class="text-danger">Find Smallest and Largest Number</span>
            <br> <br>
            <div class="question">
              <?php
              foreach($questions as $question){
                echo "<p>".$question."</p>";
              }
              ?>
            </div>
            <form action="./../../src/features/level-6.php" method="post">
            <p>Fill First Field With Smallest and second field with largest number</p>
              <div class="answer">
                <input type="hidden" name="question__1" value="<?php echo $questions[0] ?>">
                <input type="hidden" name="question__2" value="<?php echo $questions[1] ?>">
                <input type="hidden" name="question__3" value="<?php echo $questions[2] ?>">
                <input type="hidden" name="question__4" value="<?php echo $questions[3] ?>">
                <input type="hidden" name="question__5" value="<?php echo $questions[4] ?>">
                <input type="hidden" name="question__6" value="<?php echo $questions[5] ?>">
                Smallest: <input type="number" name="small" class="form-control" >
                Largest: <input type="number" name="large" class="form-control" >

              </div>
              <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Submit Answer" class="btn btn-success">
                <a href="game-form.php?cancel_game" type="button" class="btn btn-outline-danger"> Cancel Game </a>
              </div>
            </form>
          </div>
        <?php
        }else if($level == 7 && $lives > 0 && !$game_canelled){
            echo "<h4 class='text-success'> Congratultions ! You are Champion<h4><br><br>";
          ?>
          <form action="game-form.php" method="post">
            <div class="d-flex mb-4 px-2 py-2">
              <strong>Your Score:</strong> <?php echo $score ?>
              <strong>Level Reached:</strong> <?php echo $level ?>
            </div>
            <center><input type="submit" value="Play Again" name="play_again" class="btn btn-primary"></center>
          </form>
          <?php
           $lives_user = 6 - $lives;
           $cancelQ = "insert into score (scoreTime, result, livesUsed, registrationOrder) values('$currentDateTime','win','$lives_user', '$userId')";
           mysqli_query($conn, $cancelQ) or die(mysqli_error($conn));
            $_SESSION["level"] = 1;
            $_SESSION["score"] = 0;
            $_SESSION["lives"] = 6;
        }
         else if($lives == 0 || $game_canelled){
          if($lives == 0){
            echo "<h4 class='text-danger'>Oops ! You Lost The Game<h4><br><br>";
            $lives_user = 6 - $lives;
            $cancelQ = "insert into score (scoreTime, result, livesUsed, registrationOrder) values('$currentDateTime','gameover','$lives_user', '$userId')";
            mysqli_query($conn, $cancelQ) or die(mysqli_error($conn));
          }else{
            echo "<h4 class='text-danger'> Game Cancelled by User<h4><br><br>";
            $lives_user = 6 - $lives;
            $cancelQ = "insert into score (scoreTime, result, livesUsed, registrationOrder) values('$currentDateTime','incomplete','$lives_user', '$userId')";
            mysqli_query($conn, $cancelQ) or die(mysqli_error($conn));
          }
          ?>
          <form action="game-form.php" method="post">
            <div class="d-flex mb-4 px-2 py-2">
              <strong>Your Score:</strong> <?php echo $score ?>
              <strong>Level Reached:</strong> <?php echo $level ?>
            </div>
            <center><input type="submit" value="Play Again" name="play_again" class="btn btn-primary"></center>
          </form>
          <?php
            $_SESSION["level"] = 1;
            $_SESSION["score"] = 0;
            $_SESSION["lives"] = 6;
          }
      ?>
    </div>
  </div>

<?php include './../template/footer.php'; ?>
<script src="./../assets/js/main.js"></script>
</body>
</html>
