<?php

include 'config.php';
session_start();
error_reporting(0);

//if session is already set, redirect to page where user has previously logged in
if (isset($_SESSION['email'])) {
    header("Location: second0.php");
}

//user login - user logs in using his already registered email and password
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		header("Location: second0.php");
	}
}

//user login for new user to set email and password
if (isset($_POST['submit1']))
{
	$username = $_POST['username'];
	$email = $_POST['email'];
  $phoneno = $_POST['phoneno'];
  $address = $_POST['address'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword)
  {
		 $sql = "SELECT * FROM users WHERE email='$email'";
		 $result = mysqli_query($conn, $sql);
		 if (!$result->num_rows > 0)
     {
		    $sql = "INSERT INTO users (username, email, password,address,phoneno)
                VALUES ('$username', '$email', '$password','$address','$phoneno')";
			  $result = mysqli_query($conn, $sql);
			  if ($result)
				   echo "<script>alert('User Registration Completed.')</script>";
        else
				   echo "<script>alert('Something Wrong Went')</script>";
		 }
     else
        echo "<script>alert('Email Already Exists')</script>";
	 }
 else
    echo "<script>alert('Passwords don't match')</script>";
}


//contact-form on home page
  if (isset($_POST["submit-contact"]))
  {
    $contactname = $_POST["contact-name"];
    $contactemail = $_POST["contact-email"];
    $contactphone = $_POST["contact-number"];
    $contactmessage = $_POST["contact-message"];
    $sql = "INSERT INTO contactform (contactname, contactemail, contactmessage,contactphone)
            VALUES ('$contactname', '$contactemail','$contactmessage','$contactphone')";
    $result = mysqli_query($conn, $sql);
    if ($result)
      echo "<script>alert('Done')</script>";
    else
      echo "<script>alert('Something Wrong Went.')</script>";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="script1.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <!--login form for already registered users-->
    <div class="container1" id="container">
      <form action="" method="POST" class="login-email">
        <i class="fa-solid fa-xmark remove" id="remove" onclick="abc1('container')"></i>
        <p class="login-text">Login</p>
        <div class="input-group">
          <input type="email" id="email" placeholder="Email" name="email" required>
        </div>
        <div class="input-group">
          <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="input-group">
          <button name="submit" class="btn">LOGIN</button>
        </div>
      </form>
      </div>

    <!--registeration form for new users-->
    <div class="container1" id="container1">
      <form action="" method="POST" class="login-email">
        <i class="fa-solid fa-xmark" id="remove" onclick="abc1('container1')"></i>
        <p class="login-text">Register</p>
        <div class="input-group">
          <input type="text" placeholder="Name" name="username" required>
        </div>
        <div class="input-group">
          <input type="email" placeholder="Email" name="email" required>
        </div>
        <div class="input-group">
          <input type="number" placeholder="Phone Number" name="phoneno" required>
        </div>
        <div class="input-group">
          <input type="text" placeholder="Address" name="address" required>
        </div>
        <div class="input-group">
          <input type="password" placeholder="Password" name="password" required>
        </div>
            <div class="input-group">
        <input type="password" placeholder="Confirm Password" name="cpassword" required>
        </div>
        <div class="input-group">
        <button name="submit1" class="btn">Register</button>
        </div>
      </form>
   </div>

   <!--background image-->
   <div class="bg-cover">
     <img src="images/home/bg-cover1.jpeg">
   </div>

   <!--cover page content-->
   <div class="cover-upper">
    <div class="logo">
      <img src="images/home/logo1.png">
      <button type="button" name="button" id="login-button" class="login-button" onclick="abc('container')">Login</button>
      <button type="button" name="button" id="signup-button" class="signup-button" onclick="abc('container1')">Sign Up</button>
    </div>
   <div class="cover-text">
      <h4>Hungry?</h4>
      <p>Order your favourite food now!</p><br>
   </div>
   <form  action="second.php" method="post">
      <input type="submit" name="submit" id="submit" value="Find Food" class="button">
   </form>
  </div>

  <!--about us section-->
  <div class="about-us" id="about-us" name="about-us">
     <div class="about-us-wrap">
       <div class="about-us-img"></div>
       <div class="about-us-content">
       <p>Tasty Bites specializes in delicious food featuring fresh ingredients and masterful preparation by the Tasty Bites culinary team. Whether you’re ordering a multi-course meal or preffering home delivery or grabbing a drink and pizza at the bar, Tasty Bites' lively, casual yet upscale atmosphere makes it perfect for dining with friends, family, clients and business associates.</p>
       </div>
     </div>
  </div>

  <!--get the app section-->
  <div class="get-the-app" id="get-the-app">
    <img src="images/home/get-the-app.png">
  </div>

  <!--contact us section-->
  <div class="contact-us" id="contact-us">
    <div class="contact-us-container">
      <div class="contact-us-left">
        <hr>
        <div class="contact-us-content"><img src="images/home/address.png">123 Sunrise Avenue</div>
        <div class="contact-us-content"><img src="images/home/mobile.png">123-456-7890</div>
        <div class="contact-us-content"><img src="images/home/time.png"> Everyday: 9:00 am - 10:00 pm</div>
        <div class="contact-us-content"><img src="images/home/email.png"> contacts@tastybites.com</div>
        <hr>
      </div>
      <div class="contact-us-right">
        <p style="">Book a table</p>
        <form  action="" method="post">
          <table border=0 >
          <tr><td>Name </td></tr>
          <tr><td><input type="text" name="contact-name" ></td></tr>
          <tr><td>Email</td></tr>
          <tr><td><input type="email" name="contact-email" ></td></tr>
          <tr><td>Phone No</td></tr>
          <tr><td><input type="number" name="contact-number" ></td></tr>
          <tr><td>Message</td></tr>
          <tr><td><textarea name="contact-message" rows="10" cols="50"></textarea></td></tr>
          <tr><td><input class="contact-submit" type="submit" name="submit-contact" value="Book"></td></tr>
         </table>
       </form>
      </div>
    </div>
  </div>

  <!--footer-->
  <div class="footer">
    <div class="icon-container">
      <a href="https://www.linkedin.com/"><img src="images/home/linkedin.png"></i></a>
      <a href="https://www.pinterest.com/"><img src="images/home/pinterest.png"></i></a>
      <a href="https://www.facebook.com/"><img src="images/home/facebook.png"></a>
      <a href="https://www.instagram.com"><img src="images/home/instagram.png"></i></a>
      <a href="https://www.twitter.com/"><img src="images/home/twitter.png"></i></a>
      <a href="https://www.youtube.com/"><img src="images/home/youtube.png"></i></a>
    </div>
    <div class="footer-text">
      <a href="second.php"><p>Menu</p></a>
      <a href="#about-us"><p>About Us</p></a>
      <a href="#get-the-app"><p>Get App</p></a>
      <a href="#contact-us"><p>Book a Table</p></a>
      <a href="adminlogin.php"><p>Admin Login</p></a>
    </div>
    <div class="footer-copyright">©2022 Copyright Tasty Bites</div>
  </div>

</body>
</html>
