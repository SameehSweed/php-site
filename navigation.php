<?php
/* median nabwani - 207571498
sameeh sweed - 206444739  */
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Book Market</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
    </ul>
    <div>

    <?php
    if(isset($_SESSION['cart']))//if we have items in the cart
        {
        $count=count($_SESSION['cart']);//counting the items in the cart
        }
    else
        {
        $count=0;//in case there is no items in the cart
        }
    ?>

    <a class="btn btn-outline-success" href="logout.php">LOGOUT </a>
    <a href="mycart.php" class="btn btn-outline-success">MY CART (<?php echo $count; /* this prints the number of items in my cart in the navigation bar*/?>) </a> 
    </div>
  </div>
</nav>
</body>
</html>