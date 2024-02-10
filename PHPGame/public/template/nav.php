<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./../../index.php">GameY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./../../index.php">Home</a>
        </li>
        <li class="nav-item">
          <?php
            if( isset($_SESSION["user"])) {
              echo '<a class="nav-link" href="./../form/history-table.php">History</a>';
            } 
            ?>
        </li>
        <li class="nav-item">
          <?php
            if( !isset($_SESSION["user"])) {
              echo '<a class="nav-link" href="./../form/signin-form.php">Login</a>';
            } else {
              echo '<a class="nav-link" href="./../../src/features/signout.php">Logout</a>';
            }
          ?>
        </li>
        <li>
      </ul>
    </div>
  </div>
</nav>