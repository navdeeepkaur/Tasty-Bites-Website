<?php
error_reporting(0);
$server = "localhost";
$user = "root";
$pass = "";
$database = "project1";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}



$recs=json_decode($_POST['recs']);
print_r($recs);


foreach ($recs as $rec)
{
$title=$rec->title;
$price=$rec->price;
$quantity=$rec->quantity;
$total=$rec->total;
print_r($price);
print_r($title);
print_r($quantity);
print_r($total);
$sql = "INSERT INTO orders (title, price, quantity, total, dt, tm) VALUES ('$title', '$price', '$quantity', '$total',CURDATE(),CURTIME())";
$result =$conn->query($sql);
}



?>
