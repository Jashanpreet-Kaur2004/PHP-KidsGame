<?php 
session_start();
if(isset($_SESSION["user"])){
  header("location:game-form.php");
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
<form action="./../../src/features/signup.php" method="post" onsubmit="return Validate()">
  <div class="container-auth">
    <h1>GameY Signup</h1>
    <div class="d-grid">
      <span>First Name : </span>
      <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name ...">
      <p class="text-danger" id="fnameMSG"></p>
    </div>
    <div class="d-grid">
      <span>Last Name : </span>
      <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name ...">
      <p class="text-danger" id="lnameMSG"></p>
    </div>
    <div class="d-grid">
      <span>Username (Unique) : </span>
      <input type="text" name="uname" id="uname" class="form-control" placeholder="Enter Unique User Name ...">
      <p class="text-danger" id="unameMSG"></p>
    </div>
    <div class="d-grid">
      <span>Password : </span>
      <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password ...">
      <p class="text-danger" id="passMSG"></p>
    </div>
    <div class="d-grid">
      <span>Confirm Password : </span>
      <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Confirm Password ...">
      <p class="text-danger" id="cpassMSG"></p>
    </div>

    <div class="d-flex">
      <input type="submit" value="Signup" class="btn btn-danger">
      <a href="signin-form.php" class="btn btn-outline-primary">Login</a>
    </div>

  </div>
</form>

<?php include './../template/footer.php'; ?>

<script>
  let fname_error = true;
  let lname_error = true;
  let uname_error = true;
  let pass_error = true;
  let cpass_error = true;


  const myform = document.querySelector("#myform");
  const fname = document.querySelector("#fname");
  const lname = document.querySelector("#lname");
  const uname = document.querySelector("#uname");
  const pass = document.querySelector("#pass");
  const cpass = document.querySelector("#cpass");

  const fnameMSG = document.querySelector("#fnameMSG");
  const lnameMSG = document.querySelector("#lnameMSG");
  const unameMSG = document.querySelector("#unameMSG");
  const passMSG = document.querySelector("#passMSG");
  const cpassMSG = document.querySelector("#cpassMSG");

  
  function Validate() {
  if (fname_error === false && lname_error === false && uname_error === false && pass_error === false && cpass_error === false) {
    if ( pass.value != cpass.value ) {
      passMSG.style.display = "block"
      passMSG.textContent = "Password did not matched"
      return false
    }else{
      return true;
    }
  } else {
    if ( pass.value != cpass.value ) {
      passMSG.style.display = "block"
      passMSG.textContent = "Password did not matched"
      return false
    }else{
      return false;
    }
  }
}

  // First Name
  fnameMSG.style.display = "none"
  fname.addEventListener("keyup", function() {
    let first_name = fname.value.trim();
    $.ajax({
      type: "POST",
      url: "./../../src/signup-onkeyup/fname-ajax.php",
      data: { first_name: first_name },
      success: function(data) {
        if(data == 1) {
          fname_error = false
          fnameMSG.style.display = "none"
        }else{
          fnameMSG.style.display = "block"
          fnameMSG.textContent = data;
          fname_error = true
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error("Error:", errorThrown);
      }
    });
  });

  // Last Name
  lnameMSG.style.display = "none"
  lname.addEventListener("keyup", function() {
    let last_name = lname.value.trim();
    $.ajax({
      type: "POST",
      url: "./../../src/signup-onkeyup/lname-ajax.php",
      data: { last_name: last_name },
      success: function(data) {
        if(data == 1) {
          lname_error = false
          lnameMSG.style.display = "none"
        }else{
          lnameMSG.style.display = "block"
          lnameMSG.textContent = data;
          fname_error = true
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error("Error:", errorThrown);
      }
    });
  });

  // Username Name
  unameMSG.style.display = "none"
  uname.addEventListener("keyup", function() {
    let user_name = uname.value.trim();
    $.ajax({
      type: "POST",
      url: "./../../src/signup-onkeyup/uname-ajax.php",
      data: { user_name: user_name },
      success: function(data) {
        if(data == 1) {
          uname_error = false
          unameMSG.style.display = "none"
        }else{
          unameMSG.style.display = "block"
          unameMSG.textContent = data;
          uname_error = true
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error("Error:", errorThrown);
      }
    });
  });

  // Password
  passMSG.style.display = "none"
  pass.addEventListener("keyup", function() {
    let password = pass.value.trim();
    $.ajax({
      type: "POST",
      url: "./../../src/signup-onkeyup/pcode1-ajax.php",
      data: { password: password },
      success: function(data) {
        if(data == 1) {
          pass_error = false
          passMSG.style.display = "none"
        }else{
          passMSG.style.display = "block"
          passMSG.textContent = data;
          pass_error = true
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error("Error:", errorThrown);
      }
    });
  });

  // Confirm Password
  cpassMSG.style.display = "none"
  cpass.addEventListener("keyup", function() {
    let cpassword = cpass.value.trim();
    $.ajax({
      type: "POST",
      url: "./../../src/signup-onkeyup/pcode2-ajax.php",
      data: { cpassword: cpassword },
      success: function(data) {
        if(data == 1) {
          cpass_error =false
          cpassMSG.style.display = "none"
        }else{
          cpassMSG.style.display = "block"
          cpassMSG.textContent = data;
          cpass_error = true
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error("Error:", errorThrown);
      }
    });
  });

</script>
</body>
</html>
