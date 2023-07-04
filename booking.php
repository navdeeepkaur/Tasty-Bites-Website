<?php
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
    <title>BOOKINGS</title>
    <link rel="stylesheet" href="tables.css">
  </head>
  <body>
    <img src="images/admin/admin-header1.jpg">
    <div class="header">
      <p>Bookings</p>
        <div>
          <a href="admin.php">Orders</a>
          <a href="admin0.php">Previous Orders</a>
          <a href="logout.php">Logout</a>
        </div>
    </div>
    <table class="admin-table">
      <tr class="table-row">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Message</th>
      </tr>
     <?php
     $query="SELECT * FROM contactform";
	   $result = mysqli_query($conn, $query);
	   if (mysqli_num_rows($result) > 0)
     {
	      while ($row = mysqli_fetch_assoc($result))
        {
	   ?>
     <tr class="table-row">
       <td><?php  echo $row['id']; ?></td>
       <td><?php  echo $row['contactname']; ?></td>
       <td><?php  echo $row['contactemail']; ?></td>
       <td><?php  echo $row['contactphone']; ?></td>
       <td><?php  echo $row['contactmessage']; ?></td>
     </tr>
     <?php
        }
    }
    ?>
    </table>
  </body>
</html>
