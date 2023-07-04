<?php
//page for currebt orders
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
    <!--Header text and links to other only admin accessible pages-->
    <div class="header">
      <p>Orders</p>
      <div>
        <a href="booking.php">Bookings</a>
        <a href="admin0.php">Previous Orders</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
    <!--Table that displays all the current orders to admin-->
    <table class="admin-table">
      <tr class="table-row">
        <th>Id</th>
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
        <th>Status</th>
      </tr>
      <?php
        $query="SELECT orders.id,orderno,title,quantity,price,dt,tm,orders.email,username,users.phoneno,users.address
                FROM orders INNER JOIN users ON orders.email = users.email ORDER BY orders.id;";
	      $result = mysqli_query($conn, $query);
	      if (mysqli_num_rows($result) > 0)
        {
	         while ($row = mysqli_fetch_assoc($result))
           {
	    ?>
      <tr class="table-row">
        <td><?php  echo $row['id']; ?></td>
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
        <!--button that acts when an order has been successfully sent to update the current orders list-->
        <td> <form method="post">
          <input type="hidden" name="id" value="<?php  echo $row['id'];?>">
          <input class="sent" type="submit" id="on" name="delete" value="sent"></form>
        </td>
      </tr>
      <?php
            }
        }
        //functioning of 'sent' button that is available for every order
        if(isset($_POST['delete']))
        {
          $id = $_POST['id'];
          $insert="INSERT INTO `ordersdone` (oldid, title, price, quantity, total, email, orderno, dt, tm)
                   SELECT id, title, price, quantity, total, email, orderno, dt, tm FROM orders where orders.id='$id'";
          $result = mysqli_query($conn,$insert);
          $delete ="DELETE FROM `orders` WHERE id = '$id'";
          $result = mysqli_query($conn,$delete);
        }
      ?>
    </table>
  </body>
</html>
