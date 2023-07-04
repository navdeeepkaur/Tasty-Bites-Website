<?php
include 'config.php';
session_start();
error_reporting(0);

if (isset($_SESSION['adminname']))
{
    header("Location: admin.php");
}
if(isset($_POST['submit_admin']))
{
  $username_admin=$_POST['username_admin'];
  $password_admin=$_POST['password_admin'];
  if($username_admin=="admin" && $password_admin=="food")
  {
    $_SESSION['adminname'] = "good";
    header("Location: admin.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="adminlogin.css">
    <title></title>
  </head>
  <body>
    <img src="images/admin/admin-login.jpg">
    <div class="container">
      <form class="admin-form" action="" method="POST">
        <input class="input-group" type="text" name="username_admin" placeholder="Username">
        <input class="input-group" type="password" name="password_admin" placeholder="Password">
        <button name="submit_admin">LOGIN</button>
      </form>
    </div>
  </body>
</html>
