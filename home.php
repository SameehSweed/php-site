<?php
/* median nabwani - 207571498
sameeh sweed - 206444739  */
require_once("navigation.php");//for stying purpos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styling/homePage_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<div class="container mt-5">
        
        <div class="row">
            <div class="col-lg-3">
               <form form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/img2.jpg" height="250px" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Inferno Book</h5>
                        <p class="card-text">Price: 20$</p>
                        <button type="submit" name="Add_To_Cart" class="btn btn-info">Add  To Cart</button>
                        <input type="hidden" name="Item_Name" Value="Inferno Book">
                        <input type="hidden" name="Price" Value="20">
                    </div>
                </div>
               </form>
             </div>
             <div class="col-lg-3">
               <form form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/img4.jpg " height="250px" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">The Davinci Code</h5>
                        <p class="card-text">Price: 22$</p>
                        <button type="submit" name="Add_To_Cart" class="btn btn-info">Add  To Cart</button>
                        <input type="hidden" name="Item_Name" Value="The Davinci Code">
                        <input type="hidden" name="Price" Value="22">
                    </div>
                </div>
               </form>
             </div>
             <div class="col-lg-3">
               <form form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/img5.jpg" height="250px" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Angels And Demons</h5>
                        <p class="card-text">Price: 18$</p>
                        <button type="submit" name="Add_To_Cart" class="btn btn-info">Add  To Cart</button>
                        <input type="hidden" name="Item_Name" Value="Angels And Demons">
                        <input type="hidden" name="Price" Value="18">
                    </div>
                </div>
               </form>
             </div>
             <div class="col-lg-3">
               <form form action="manage_cart.php" method="POST">
                <div class="card">
                    <img src="images/img6.jpg" height="250px" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Origin</h5>
                        <p class="card-text">Price: 25$</p>
                        <button type="submit" name="Add_To_Cart" class="btn btn-info">Add  To Cart</button>
                        <input type="hidden" name="Item_Name" Value="Origin">
                        <input type="hidden" name="Price" Value="25">
                    </div>
                </div>
               </form>
             </div>
        </div>
    </div>
    <footer>
<form class="report_form" method="POST" action="report.php">
    <input type="text" name="report_submit">
    <button class="btn btn-outline-success" type="submit" >REPORT</button>
</form>
</footer>
</body>

</html>








