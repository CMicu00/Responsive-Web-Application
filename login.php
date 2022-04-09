<!DOCTYPE html>

<?php
    session_start();
    include("connection.php");
    include("functions.php");
    

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(!empty($email) && !empty($pass)){

            $query = "select * from tbl_users where user_email = '$email' limit 1";
            $result = mysqli_query($con,$query);

            if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['user_pass'] === $pass)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
            echo "wrong username or password";
            
        }else{
            echo "wrong username or password";
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
                 <li><a href="login.php">Login</a></li>
                 <li><a href="signup.php">Sign Up</a></li>
              </ul>
           </nav>
        </div>
    </div>
 </header>
 <div class="logo">
    <img src="images/UCLan_Cyprus_logo_rgb.png" height="90px">
  </div>
<main class="main-register">
        <h2 style="text-align: center;">Log in</h2>
        <div class="centerForm">
            <form  method="post" class="registerForm">
				    <p>Please fill out all required fields in order to Log in.</p>
				<br>
                <label>
                    email:<br>
                    <input type="text" name="email" class="inputField" minlength="6" maxlength="26" required=""><br>
                </label>

                <label>
                    Password:<br>
                    <input type="password" name="pass" class="inputField" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="16" required=""><br>
                </label>

                <input type="Submit" name="register" class="submitBtn">
				
            </form>
        </div>
    </main>
</body>
</html>