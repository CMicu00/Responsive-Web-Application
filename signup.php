<!DOCTYPE html>

<?php
    session_start();
    include("connection.php");
    include("functions.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user = $_POST['user'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        if(!empty($user) && !empty($pass)){
            if($pass != $cpass){
                echo("Passwords don't match");
            } 
            else{
                $query = "insert into tbl_users (user_full_name,user_address,user_email,user_pass) values ('$user','$address','$email','$pass')";
                mysqli_query($con,$query);

                header("Location: login.php");
                die;
            }
            
        }else{
            echo "Please enter your information";
        }
    }
?>

<html>
<head>
  <title>UCLAN Drip Item</title>
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
    <img src="images/UCLan_Cyprus_logo_rgb.png" height="90px">
  </div>
<main>
        <h2 style="text-align: center;">Sign Up</h2>
        <div class="centerForm">
            <form  method="post" class="registerForm">
				    <p>Please fill out all required fields in order to sign up.</p>
				<br>
                <label>
                    User Full Name:<br>
                    <input type="text" name="user" class="inputField" minlength="6" maxlength="26" required=""><br>
                </label>

                <label>
                    User Delivery Address:<br>
                    <input type="text" name="address" class="inputField" minlength="6" required=""><br>
                </label>

                <label>
                    User Email:<br>
                    <input type="text" name="email" class="inputField" minlength="6" required=""><br>
                </label>

                <label>
                    Password:<br>
                    <input type="password" name="pass" class="inputField" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="16" required=""><br>
                </label>

                <div id="pswReq">
                    <p style="margin-top: 0">Password must contain the following:</p>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid" style="margin-bottom: 0">Minimum <b>8 characters</b></p>
                </div>

                <label>
                    Confirm Password:<br>
                    <input type="password" name="cpass" class="inputField" maxlength="16" required=""><br>
                </label>

                <input type="Submit" name="register" class="submitBtn">
				
            </form>
        </div>
    </main>
</body>
</html>