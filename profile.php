<?php
require "./config.php";
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
} 
$mysqli->set_charset('utf8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['full_name']) && isset($_POST['address']) 
  && !empty($_POST['email']) && !empty($_POST['full_name']) && !empty($_POST['address'])) {
    $sql = "UPDATE users
            SET name='" . $_POST['full_name'] . "',
            email = '" . $_POST['email'] . "',
            address = '" . $_POST['address'] . "'
            WHERE email= '" . $_SESSION['email'] . "';";
    $results = $mysqli->query($sql);
    if (!$results) {
      echo $mysqli->error;
      $error = "error with updating user info. Please try again.";
    } else {
      $success = "User information updated successfully.";
      $_SESSION["email"] = $_POST['email'];
    }
  } else {
      $error = "Please make sure all fields are filled.";
  }
}

$sql = "SELECT * FROM users WHERE email = '" . $_SESSION['email'] . "';";
$results = $mysqli->query($sql);
$user_info = $results->fetch_assoc();

$mysqli->close();
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>You!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="home.php">Coffee!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-0">
                <li class="nav-item active">
                    <a class="nav-link" href="profile.php">Profile </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart </a>
                 </li>
            </ul>
        </div>
    </nav>  
    <div class="container my-3">
        <h2 class="my-3">
            Edit Your Information
        </h2>
        <div class="row justify-content-center">
            <div class="col-10 col-md-5 col-lg-3 text-center">
                <img src="https://picsum.photos/200" class="img-fluid rounded">
                <h3><?php echo $user_info['name']; ?></h3>
            </div>
        </div>
        <form action="profile.php" method="POST">
            <fieldset disabled id="myfield">
              <div class="form-group">
                <label for="userEmail">Email</label>
                <input type="email" id="userEmail" name="email" class="form-control" value="<?php echo $user_info['email'];?>">
              </div>
              <div class="form-group">
                <label for="userName">Name</label>
                <input type="text" id="userName" name="full_name" class="form-control" value="<?php echo $user_info['name'];?>">
              </div>
              <div class="form-group">
                <label for="userAddress">Shipping Address</label>
                <input type="text" id="userAddress" name="address" class="form-control" value="<?php echo $user_info['address'];?>">
              </div>
            </fieldset>
            <span><button type="button" id="editButton" class="btn btn-secondary">Edit Info</button></span>
            <span><a href="welcome.php?user_id=<?php echo $_SESSION['id']; ?>" role="button" class="btn btn-light" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a></span>
            <?php if (isset($error) && !empty($error)): ?>
              <div class="text-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (isset($success) && !empty($success)): ?>
              <div class="text-success"><?php echo $success; ?></div>
            <?php endif; ?>
          </form>
    </div>

    <script>
      document.querySelector("#editButton").onclick = function(e) {
        if (document.querySelector("#myfield").disabled == true) {
          document.querySelector("#myfield").disabled = false;
          this.innerHTML = "Submit Edits";
        } else {
          document.querySelector("form").submit();
          document.querySelector("#myfield").disabled = true;
          this.innerHTML = "Edit Info";
        }
      }
    </script>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>