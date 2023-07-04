<?php
include 'config.php';
session_start();
error_reporting(0);

//fetching records of the user who has logged in
$email=$_SESSION['email'];
$query  = "SELECT * FROM users where email='$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $username=$row['username'];
    $phoneno=$row['phoneno'];
    $address=$row['address'];
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>User Account</title>
    <link rel="stylesheet" href="tables.css">
    <style>
        h4{
          color:#6E7173;
        }
        details{
          padding-top:20px;
          line-height: 40px;
        }
    </style>
  </head>
  <body>
    <!--Displaying details of user-->
    <div class="header">
      <p>User Details</p>
    </div>
    <div class="details">
    <?php echo "<h4>Username: ".$username."<br>
               Email: ".$email."<br>
               Phone No.: ".$phoneno."<br>
               Address: ".$address."</h4>";?>
    </div>
    <!--Current Orders of user-->
    <div class="header">
      <p>Current Orders</p>
    </div>
    <table class="admin-table">
      <tr class="table-row">
        <th>Order No.</th>
        <th>Title</th>
        <th>Price(in )</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
      <?php
      $query="SELECT orderno,title,quantity,price,dt,tm FROM orders WHERE email='$email' ORDER BY id";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
        {
      ?>
      <tr class="table-row">
        <td><?php  echo $row['orderno']; ?></td>
        <td><?php  echo $row['title']; ?></td>
        <td><?php  echo $row['quantity']; ?></td>
        <td><?php  echo $row['price']; ?></td>
        <td><?php  echo $row['dt']; ?></td>
        <td><?php  echo $row['tm']; ?></td>
      </tr>
      <?php
        }
      }
      ?>
      </table>
      <!--Previous orders that were already received by user-->
      <div class="header">
        <p>Previous Orders</p>
      </div>
      <table class="admin-table">
        <tr class="table-row">
          <th>Order No.</th>
          <th>Title</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Date</th>
          <th>Time</th>
        </tr>
      <?php
      $query="SELECT orderno,title,quantity,price,dt,tm FROM ordersdone WHERE email='$email' ORDER BY id";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
        {
      ?>
      <tr class="table-row">
        <td><?php  echo $row['orderno']; ?></td>
        <td><?php  echo $row['title']; ?></td>
        <td><?php  echo $row['quantity']; ?></td>
        <td><?php  echo $row['price']; ?></td>
        <td><?php  echo $row['dt']; ?></td>
        <td><?php  echo $row['tm']; ?></td>
      </tr>
      <?php
        }
      }
      ?>
      </table>
  </body>
</html>
