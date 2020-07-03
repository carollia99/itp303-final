<?php
require "./config.php";
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
} 
$mysqli->set_charset('utf8');

$sql_products = "SELECT * FROM products";
$results_products = $mysqli->query($sql_products);
if ($results_products == false) {
    echo $mysqli->error;
    exit();
}
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Buy Coffee</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="home.php">Coffee!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About </a>
                 </li>
            </ul>
            <ul class="navbar-nav mr-0">
                <li class="nav-item">
                    <a class="nav-link" href="profile.html">Profile </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.html">Cart </a>
                 </li>
            </ul>
        </div>
    </nav>  
    <div class="container my-3">
        <h2 class="my-3">
            Coffee for everyone.
        </h2>
        <div class="row">
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/dark_roast.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/medium_roast.jpg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/light_roast.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/cold_brew_organic.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/cold_brew_hazelnut.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/medium_whole.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/misty_espresso.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/columbia-altura.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/misty_espresso.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/chemex.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="col-10 col-md-5 col-lg-3 my-2 product">
                <form action="home.php" method="POST">
                    <?php 
                        $row = $results_products->fetch_assoc();
                    ?>
                    <input name="product-id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <img src="./photos/chemex-filters.jpeg" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="product-name center-block"><?php echo $row['name']; ?>: <?php echo $row['description'];?>: $<?php echo $row['price'];?></div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-dar btn-sm">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  

    <!-- JS, Popper.js, and jQuery -->
    <script src="home.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>