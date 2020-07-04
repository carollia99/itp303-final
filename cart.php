<?php
require "./config.php";
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
} 
$mysqli->set_charset('utf8');

$sql = "SELECT product_id FROM carts WHERE user_id=" . $_SESSION['id'] . ";";
$results = $mysqli->query($sql);
if ($results == false) {
    echo $mysqli->error;
    exit();
}

if ($results->num_rows == 0) {
    $empty = "Nothing in your cart yet! Keep shopping.";
}

$items_cost = 0;
?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Cart</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cart.php">Cart </a>
                 </li>
            </ul>
        </div>
    </nav>  
    <div class="container mt-5">
       <div class="row">
           <div class="col-11 col-md-6 mb-5">
               <h3>Items</h3>
               <?php if (isset($empty) && !empty($empty)): ?>
                    <div><?php echo $empty; ?></div>
               <?php endif; ?>
               <div class="container-fluid">
                   <?php while ($row = $results->fetch_assoc()): 
                        $sql = "SELECT * FROM products WHERE id=" . $row['product_id'] . ";";
                        $product_results = $mysqli->query($sql);
                        $product_result = $product_results->fetch_assoc();
                        $items_cost = $items_cost + $product_result['price'];
                    ?>
                        <h5 class="mt-3"><?php echo $product_result['name']; ?>: $<?php echo $product_result['price']; ?></h5>
                        <div><?php echo $product_result['description']; ?></div>
                    <?php endwhile; ?>
                </div>  
           </div>
           <div class="col-11 col-md-6">
               <h3>Overview</h3>
                <div class="container-fluid">
                    <div>Items Cost: $<?php echo $items_cost; ?></div>
                    <div>Shipping + Handling: <?php if ($items_cost > 0) {echo "$5";} else {echo "$0.00";} ?></div>
                    <div>Taxes: $<?php $taxes = 0.10*$items_cost; echo $taxes; ?></div>
                    <hr>
                    <div>Total: $<?php if ($items_cost > 0) { echo $items_cost + 5 + $taxes;} else {echo "$0.00";}?></div>
                </div>
                <button type="button" id="checkoutButton" class="btn btn-secondary btn-block my-3">Check out!</button>
                <div id="sorry"></div>
           </div>
       </div>
    </div>

    <script>
        document.querySelector("#checkoutButton").onclick = function() {
            document.querySelector("#sorry").innerHTML = "We apologize - Coffee! has not yet set up their online payment APIs yet. To make up for it, reach out to Carol Liang at USC and she will make you a custom drink :)"
        }
    </script>
  

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>