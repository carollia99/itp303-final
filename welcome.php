<?php
require "./config.php";
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
} 
$mysqli->set_charset('utf8');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
  if ( empty($_POST['email']) || empty($_POST['password']) ) {
    $error = "Please enter email and password.";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "';";
    echo "<hr>" . $sql . "<hr>";
    $results = $mysqli->query($sql);

    if(!$results) {
      echo $mysqli->error;
      exit();
    }

    $row = $results->fetch_assoc();

    if($results->num_rows > 0) {
      $_SESSION["email"] = $email;
      $_SESSION["id"] = $row['id'];
      header("Location: ./home.php");
    }
    else {
      $error = "Invalid email or password.";
    }
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
    <title>Some Coffee</title>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-10 col-md-7 col-lg-5 mx-auto login">
                <h2>Welcome to Coffee!</h2>
                <h4>To see our products and shop around, please log in or make an account.</h4>
                <form action="" method="POST" class="mt-5">
                    <div class="font-italize text-danger">
                      <?php 
                        if (isset($error) && !empty($error)) {
                          echo $error;
                        }
                      ?>
                    </div>
                    <div class="form-group row">
                        <label for="loginEmail">Email Address</label>
                        <input type="email" name="email" class="form-control" id="loginEmail">
                    </div>
                    <div class="form-group row">
                        <label for="loginPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword">
                    </div>
                    <div class="row">
                      <div class="col-10 col-md-7 col-lg-5">
                        <button type="submit" class="btn btn-secondary">Log in</button>
                        <button type="submit" class="btn btn-light">I don't have an account - register</button>
                      </div>
                    </div>
                </form>
              </div>
          </div>
      </div>


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>