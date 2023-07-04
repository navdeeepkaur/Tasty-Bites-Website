<?php
//page for previous orders
include 'config.php';
error_reporting(0);
session_start();

if (!isset($_SESSION['adminname']))
{
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <link rel="stylesheet" href="tables.css">
  </head>
  <body>
    <img src="images/admin/admin-header1.jpg">
      <div class="header">
        <p>Previous Orders</p>
        <div>
          <a href="booking.php">Bookings</a>
          <a href="admin.php">Orders</a>
          <a href="logout.php">Logout</a>
        </div>
      </div>
      <table class="admin-table">
        <tr class="table-row">
          <th>Id</th>
          <th>Old Id</th>
          <th>Order No.</th>
          <th>Title</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Date</th>
          <th>Time</th>
          <th>Email</th>
          <th>Customer Name</th>
          <th>Phone No</th>
          <th>Address</th>
        </tr>
        <?php
        $query="SELECT ordersdone.id,oldid,orderno,title,quantity,price,dt,tm,ordersdone.email,username,
                users.phoneno,users.address FROM ordersdone INNER JOIN users ON ordersdone.email = users.email
                ORDER BY ordersdone.id;";
	      $result = mysqli_query($conn, $query);
	      if (mysqli_num_rows($result) > 0)
        {
	         while ($row = mysqli_fetch_assoc($result))
           {
	      ?>
        <tr class="table-row">
          <td><?php  echo $row['id']; ?></td>
          <td><?php  echo $row['oldid']; ?></td>
          <td><?php  echo $row['orderno']; ?></td>
          <td><?php  echo $row['title']; ?></td>
          <td><?php  echo $row['quantity']; ?></td>
          <td><?php  echo $row['price']; ?></td>
          <td><?php  echo $row['dt']; ?></td>
          <td><?php  echo $row['tm']; ?></td>
          <td><?php  echo $row['email']; ?></td>
          <td><?php  echo $row['username']; ?></td>
          <td><?php  echo $row['phoneno']; ?></td>
          <td><?php  echo $row['address']; ?></td>
        </tr>
        <?php
            }
        }
        ?>
      </table>
    </body>
</html>
