<?php
require "./config.php";
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
} 
$mysqli->set_charset('utf8');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "';";
    $results = $mysqli->query($sql);
    if(!$results) {
      echo $mysqli->error;
      exit();
    }

    if($results->num_rows > 0) {
        $error = "There is already another user with that email. Please register with a different email.";
    } else {
        $sql_insert = "INSERT INTO users(name, email, address, password) VALUES('" . 
            $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['address'] . "','" . $_POST['password'] . "');";
        $results = $mysqli->query($sql_insert);
        if(!$results) {
            echo $mysqli->error;
            exit();
        }
        $success="Account created - redirecting to home page now...";
        $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "';";
        $results = $mysqli->query($sql);
        $row = $results->fetch_assoc();
        $_SESSION["email"] = $row['email'];
        $_SESSION["id"] = $row['id'];
        header("Location: ./home.php");
    }
}

$mysqli->close();
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Coffee!</title>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-10 col-md-7 col-lg-5 mx-auto login">
                <div class="text-success mb-2">
                      <?php 
                        if (isset($success) && !empty($success)) {
                          echo $success;
                        }
                      ?>
                    </div>
                <h2>Welcome to Coffee!</h2>
                <h4>Make an account below.</h4>
                <form action="" method="POST" class="mt-5" id="registerForm">
                    <div class="form-group row">
                        <label for="registerName">Full Name</label>
                        <input type="text" name="name" class="form-control" id="registerName" required>
                    </div>
                    <div class="form-group row">
                        <label for="registerEmail">Email Address</label>
                        <input type="email" name="email" class="form-control" id="registerEmail" required>
                    </div>
                    <div class="form-group row">
                        <label for="registerAddress">Shipping Address</label>
                        <input type="text" name="address" class="form-control" id="registerAddress" required>
                    </div>
                    <div class="form-group row">
                        <label for="registerPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="registerPassword" required>
                    </div>
                    <div class="form-group row">
                        <label for="registerPasswordConfirm">Confirm Password</label>
                        <input type="password" name="passwordConfirm" class="form-control" id="registerPasswordConfirm" required>
                    </div>
                    <div class="text-danger" id="error"></div>
                    <div class="font-italize text-danger mb-2">
                      <?php 
                        if (isset($error) && !empty($error)) {
                          echo $error;
                        }
                      ?>
                    </div>
                    <div class="row">
                      <div class="col-10 col-md-7 col-lg-5">
                        <button type="submit" class="btn btn-secondary">Register</button>
                      </div>
                    </div>
                </form>
              </div>
          </div>
      </div>

    <script>
        document.querySelector("#registerForm").onsubmit = function(e) {
            e.preventDefault();
            if (document.querySelector("#registerPassword").value == document.querySelector("#registerPasswordConfirm").value) {
                document.querySelector("#registerForm").submit();
            } else {
                document.querySelector("#error").innerHTML = "Passwords do not match.";
            }
        }


    </script>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>