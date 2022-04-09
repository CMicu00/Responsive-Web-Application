<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>UCLAN Drip</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
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
    <img src="images/UCLan_Cyprus_logo_rgb.png" height=90px>
  </div>
  

  <div>
     <h3 >Welcome <?php echo $user_data['user_full_name'];?> to the UCLan Drip shop
      Here you can find the best hoodies, jumpers and tshirts</h3>
  </div>
  
  <?php
      
      
      
      
      if (mysqli_connect_errno())
      {
         echo "ERROR: could not connect to database: " . mysqli_connect_error();
      }
      
      ini_set('display_errors', '1');

      error_reporting(E_ALL);
      

      $sql = "Select * from tbl_offers";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
   // output data of each row
      echo '<div class="offer-container">';
      while($row = $result->fetch_assoc()) {
      echo '
      <div class="offer-box">
         <h3>'.$row['offer_title'].'</h3>
         <p>'.$row['offer_dec'].'</p>
      </div>';
      
         }
         echo '</div>';
      } else {
      echo "0 results";
      }
      $con->close();
      
      ?>
  
  <div class="iframe-container">
      <iframe class="responsive-iframe"
      src="https://www.youtube.com/embed/nHRbZW097Uk">
      </iframe>
      
  </div>


  
</body>
</html>