<?php
  session_start();
  include "./../../src/functions/connection-functions.php";
  if(!isset($_SESSION["user"])){
    header("location:signin-form.php");
  }
  $userId = $_SESSION["user"];
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
<form action="./../../src/features/signin.php" method="post">
  <div class="container-auth container-history">
    <h1>GameY History</h1>
    <div class="d-flex-table">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <td>id</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Game Result</td>
          <td>lives Used</td>
          <td>Date and Time</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $getidQ = "select * from player where registrationOrder ='$userId'";
          $res = mysqli_query($conn,$getidQ);
          $id = 0;
          while($row1 = mysqli_fetch_array($res)){
            $id = $row1["id"];
          }
          $q = "select * from history where id ='$id'";
          $r = mysqli_query($conn, $q);
          while($row = mysqli_fetch_array($r)){
            ?>
            <tr>
              <td> <?php echo $row["id"] ?> </td>
              <td> <?php echo $row["fName"] ?> </td>
              <td> <?php echo $row["lName"] ?> </td>
              <td> <?php echo $row["result"] ?> </td>
              <td> <?php echo $row["livesUsed"] ?> </td>
              <td> <?php echo $row["scoreTime"] ?> </td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
    </div>
  </div>
</form>

<?php include './../template/footer.php'; ?>

</body>
</html>
