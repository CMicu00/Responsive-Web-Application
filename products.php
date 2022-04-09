<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UCLAN Drip Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <script src="cart.js"></script>
  <script src="main.js"></script>
</head>
<body>

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
 <div class="logo">
    <img src="images/UCLan_Cyprus_logo_rgb.png" height="90px">
  </div>
  
  <!--Row 1-->
  <main id="main" class="main">
    
    <!--jump to sections-->
    <div class="product-types">
      <a href="#" class="nav-prod-anchor">
        Hoodies
      </a>
      <a href="#35" class="nav-prod-anchor">
        Jumpers
      </a>
      <a href="#75" class="nav-prod-anchor">
        T-Shirts
      </a>
    </div>
    <selection id="products">
      <!--products start here-->
      <?php
      

      if (mysqli_connect_errno())
      {
         echo "ERROR: could not connect to database: " . mysqli_connect_error();
      }
      
      ini_set('display_errors', '1');

      error_reporting(E_ALL);
      

      $sql = "Select * from tbl_products";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
   // output data of each row
      
      while($row = $result->fetch_assoc()) {
      echo '
      <div class="product-card" id="'.$row['product_id'].'">
            <div class="image-box">
                <img class="product-image" src="'.$row['product_image'].'" width="200" alt="product-image">
            </div>
            <div class="product-info-container">
                <h4 class="product-type">
                '.$row['product_title'].'
                </h4>
                
                <h5 class="product-price">
                '.$row['product_price'].'
                </h5>
                <input type="button" onclick="viewDetails(1)" value="Details">
                <input type="button" onclick="addToCart(1)" class="addToCartBtn" value="ADD TO CART">
            </div>
        </div>';
      
         }
         echo '</div>';
      } else {
      echo "0 results";
      }
      $con->close();
      
      ?>
      
    </selection>

    
  
  </main>
  
</body>
</html>