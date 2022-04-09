<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UCLAN Drip Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <script src="main.js"></script>
</head>
<body >


<header class="header" >
    <div class="container">
        <div class="row align-items-center justify-content-between">
        <div class="logo"> <h1>UCLAN Drip Shop</h1></div>
            <input type="checkbox" id="nav-check">
           <label for="nav-check" class="nav-toggler">
              <span></span>
           </label>
           <nav class="nav">
              <ul>
                 <li><a href="index.php">Home</a></li>
                 <li><a href="products.php">Products</a></li>
                 <li><a href="cart.php">Cart</a></li>
                 <?php 
                     if(isset($_SESSION['user_id'])){
                        echo '<li><a href="logout.php">Logout</a></li>';
                     }else{
                        echo '<li><a href="login.php">Login</a></li>';
                     }
                 ?>
                 
                 <li><a href="signup.php">Sign Up</a></li>
              </ul>
           </nav>
        </div>
    </div>
 </header>

 <div class="tradeOffer">
     <img src="tradeOffer.jpg" width="100%">
     <img src="BTC.png">
 </div>
<body>
    
</body>
</html>