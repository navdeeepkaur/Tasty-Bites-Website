<?php

session_start();

if (isset($_SESSION['email'])) {
    header("Location: second0.php");

}
?>
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



//$query="SELECT * FROM orders where orderno=(SELECT max(orderno) from orders);";
 $query="SELECT * FROM orders ORDER BY orderno DESC LIMIT 1;";
 $result = mysqli_query($conn, $query);
 if (mysqli_num_rows($result) > 0) {
 while ($row = mysqli_fetch_assoc($result)) {
   $orderno=$row['orderno'];
  }
 }
echo "<h1 id='orderno' style='display:none;'>$orderno</h1>";

 $recs=json_decode($_POST['recs']);
 print_r($recs);
 foreach ($recs as $rec)
 {
 $title=$rec->title;
 $price=$rec->price;
 $quantity=$rec->quantity;
 $total=$rec->total;
 $email1=$rec->email1;
 $orderno=$rec->orderno;
 $address1=$rec->address1;
 $username1=$rec->username1;
 $phoneno1=$rec->phoneno1;
 print_r($price);
 print_r($title);
 print_r($quantity);
 print_r($total);
 $sql = "INSERT INTO orders (title, price, quantity, total, email, orderno, dt, tm) VALUES ('$title', '$price', '$quantity', '$total', '$email1','$orderno',CURDATE(),CURTIME())";
 $result =$conn->query($sql);
 $sql = "SELECT * FROM users WHERE email='$email1'";
 $result = mysqli_query($conn, $sql);
 if (!$result->num_rows > 0) {
   $sql = "INSERT INTO users (username, email,address,phoneno) VALUES ('$username1', '$email1','$address1','$phoneno1')";
   $result = mysqli_query($conn, $sql);
 }
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script1.js">

    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>
  </head>
  <body>
    <div class="nav">
      <div class="nav-inner-logo">
        <img src="images/second/nav-logo.png">
      </div>
      <div class="nav-name">


        <img class="nav-name" src="images/second/nav-name.png">
      </div>
    </div>
<div class="header">

  <a href="#chinese-section"><img src="images/second/header/chinese.jpg"></a>
  <a href="#non-veg-section"><img src="images/second/header/chicken.jpg"></a>
  <a href="#vegetarian-section"><img src="images/second/header/veg.jpg"></a>
  <a href="#drinks-desserts-section"><img src="images/second/header/desserts.jpg"></a>

</div>
<div class="search-bar">
    <input type="text" name="" value="" class="search-item" id="search-item" placeholder="Search your favourite food"onkeyup="search1()">
    <img src="search.png">
</div>
<div class="sections" id="parent">
<div class="food-sections">
  <div class="sub2" id="product-list">
  <div class="section-header" id="section-header" style="grid-column:1/4">
    <p> <b> Fast food </b></p>
    <hr>
  </div>
  <div class="card shop-item" >
    <img class="shop-item-image" src="images/second/fast-food/cheeseballs.jpg">
    <div class="card-internal">
    <p class="shop-item-title"> <b> Cheese Balls </b></p>
    <hr>
    <h6 class="shop-item-price">$3</h6>
    </div>
    <small> Crispy cheeseballs with overwhelming cheesey crust</small>
    <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
  </div>

    <div class="card shop-item" >
     <img class="shop-item-image" src="images/second/fast-food/burger.jpg">
     <div class="card-internal">
     <p class="shop-item-title"> <b> Cheese Burger </b></p>
     <hr>
     <h6 class="shop-item-price">$2</h6>
     </div>
     <small> Cheese filled in classic burger with a lot of veggies and crisp patty</small>
     <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
    </div>
      <div class="card shop-item" >
   <img class="shop-item-image" src="images/second/fast-food/green-wave-pizza.jpg">
   <div class="card-internal">
   <p class="shop-item-title"> <b> Green Wave Pizza </b></p>
   <hr>
   <h6 class="shop-item-price">$4</h6>
   </div>
   <small> Delightful combination of crisp onion, capsicum, tomato & jalepino</small>
   <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
  <div class="card shop-item" >
   <img class="shop-item-image" src="images/second/fast-food/garlic-bread.jpg">
   <div class="card-internal">
   <p class="shop-item-title"> <b> Garlic Bread </b></p>
   <hr>
   <h6 class="shop-item-price">$2</h6>
   </div>
   <small> Freshly baked stuff garlic bread with cheese, onion and paneer tikka fillings </small>
   <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
  </div>

<div class="card shop-item" >
<img class="shop-item-image" src="images/second/fast-food/potato-chips.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Potato Chips </b></p>
<hr>
<h6 class="shop-item-price">$1</h6>
</div>
<small> Crisp potato chips that taste like the one you never had before</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/fast-food/taco-mexican-veg.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Mexican Veg Taco </b></p>
<hr>
<h6 class="shop-item-price">$3</h6>
</div>
<small> Truely irresistable! Crispy Taco with veg patty graced with mexican spices and sauce</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
  <div class="card shop-item" >
<img class="shop-item-image" src="images/second/fast-food/hotdog.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Hot Dog </b></p>
<hr>
<h6 class="shop-item-price">$2</h6>
</div>
<small> Super fresh hot dog with veg patty and a lot of veggies</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/fast-food/french-fries.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> French Fries </b></p>
<hr>
<h6 class="shop-item-price">$1</h6>
</div>
<small> Peri Peri topped fried to perfection! Your perfect pizza partner</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/fast-food/sandwich.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Sandwich </b></p>
<hr>
<h6 class="shop-item-price">$2</h6>
</div>
<small> Fresh grilled bread with cheese, juicy corn, veggies and sauce</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="section-header" id="section-header"  style="grid-column:1/4">
  <p id="vegetarian-section"> <b> Vegetarian </b></p>
  <hr>
</div>
      <div class="card shop-item" >
   <img class="shop-item-image" src="images/second/vegetarian/chilly-paneer.jpg">
   <div class="card-internal">
   <p class="shop-item-title"> <b> Chilly Paneer </b></p>
   <hr>
   <h6 class="shop-item-price">$6</h6>
   </div>
   <small> Spicy chilly paneer that is such as delicious treat on a pleasent morning</small>
   <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/vegetarian/curry.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Curry </b></p>
 <hr>
 <h6 class="shop-item-price">$4</h6>
 </div>
 <small> Perfectly made indian curry full of spices that is for sure irresistable</small>
 <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/vegetarian/mix-veg.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Mix Veg </b></p>
 <hr>
 <h6 class="shop-item-price">$4</h6>
 </div>
 <small> Delightful combination of capsicum, cauliflower, carrots, onion and tomato</small>
 <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>

<div class="card shop-item" >
<img class="shop-item-image" src="images/second/vegetarian/biryani.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Biryani</b></p>
<hr>
<h6 class="shop-item-price">$3</h6>
</div>
<small> Perfectly made rice combined with veggies that make your stomach super satisfied </small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/vegetarian/chana-masala.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Chana Masala </b></p>
<hr>
<h6 class="shop-item-price">$5</h6>
</div>
<small> Try tasty channa masala made with indian spices topped with corriander </small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/vegetarian/chapatti.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Chapatti </b></p>
<hr>
<h6 class="shop-item-price">$1</h6>
</div>
<small> Perfectly circular soft chapatti that is perfect to try with any indian dish</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>

  <div class="card shop-item" >
<img class="shop-item-image" src="images/second/vegetarian/salad.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Mix Green Salad </b></p>
<hr>
<h6 class="shop-item-price">$2</h6>
</div>
<small> A mix of cucumbers, tomato, onions, raddish and carrot that make perfect pair for full meal</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/vegetarian/boondi-raita.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Boondi Raita </b></p>
<hr>
<h6 class="shop-item-price">$3</h6>
</div>
<small> Curd topped with corriander and filled with boondi and indian spices</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/vegetarian/soup.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Soup </b></p>
<hr>
<h6 class="shop-item-price">$1</h6>
</div>
<small> Delicious soup that has perfect consistency and delightful taste</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="section-header" id="section-header" style="grid-column:1/4">
  <p id="chinese-section"> <b> Chinese </b></p>
  <hr>
</div>

      <div class="card shop-item" >
   <img class="shop-item-image" src="images/second/chinese/noodles.jpg">
   <div class="card-internal">
   <p class="shop-item-title"> <b> Noodles </b></p>
   <hr>
   <h6 class="shop-item-price">$2</h6>
   </div>
   <small> Long, Spicy, Flavourful noodles having a lot of veggies that is super mouthwatering</small>
   <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/chinese/manchurian.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Manchurian </b></p>
 <hr>
 <h6 class="shop-item-price">$3</h6>
 </div>
 <small> Perfectly made soft manchurian balls with spicy gravy</small>
 <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/chinese/spring-roll.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Spring Rolls </b></p>
 <hr>
 <h6 class="shop-item-price">$3</h6>
 </div>
 <small> Cripy spring rolls with noodles filled in that are so tempting</small>
 <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>


<div class="card shop-item" >
<img class="shop-item-image" src="images/second/chinese/steamed-momos.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Steamed Momos </b></p>
<hr>
<h6 class="shop-item-price">$3</h6>
</div>
<small> Perfectly steamed momos combined with white and red sauce </small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/chinese/creamy-veg-pasta.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Creamy Veg Pasta </b></p>
<hr>
<h6 class="shop-item-price">$4</h6>
</div>
<small> Tasty Pasta with creamy culinary dressing sprinkled with olives and onion</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/chinese/redsauce-pasta.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Red Sauce Pasta </b></p>
<hr>
<h6 class="shop-item-price">$4</h6>
</div>
<small> Tasty Pasta with red sauce culinary dressing sprinkled with olives and onion</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
  <div class="card shop-item" >
<img class="shop-item-image" src="images/second/chinese/fried-rice.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Fresh Fried Rice </b></p>
<hr>
<h6 class="shop-item-price">$3</h6>
</div>
<small> Perfectly made spicy rice combined with a lot of veggies</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/chinese/sushi.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Sushi </b></p>
<hr>
<h6 class="shop-item-price">$5</h6>
</div>
<small> Japanese speciality at Tasty Bites that is perfect combo of sweet and salty</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/chinese/spaghetti.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Spaghetti </b></p>
<hr>
<h6 class="shop-item-price">$5</h6>
</div>
<small> Italian speciality at Tasty Bites, must have long spicy pasta dish</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="section-header" id="section-header" style="grid-column:1/4">
  <p id="drinks-desserts-section"> <b> Drinks and Desserts </b></p>
  <hr>
</div>
      <div class="card shop-item" >
   <img class="shop-item-image" src="images/second/drinks-desserts/tea.jpg">
   <div class="card-internal">
   <p class="shop-item-title"> <b> Tea </b></p>
   <hr>
   <h6 class="shop-item-price">$1</h6>
   </div>
   <small> Classic tea that makes you feel calm. Perfect for a breezy evening</small>
   <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/drinks-desserts/coffee.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Coffee </b></p>
 <hr>
 <h6 class="shop-item-price">$2</h6>
 </div>
 <small>Tasteful, perfect consistency coffee that is a way too amazing</small>
 <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/drinks-desserts/mojito.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Mojito </b></p>
 <hr>
 <h6 class="shop-item-price">$3</h6>
 </div>
 <small> Classic lemon mojito with a twist, speciality at Tasty Bites.</small>
 <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>

  <div class="card shop-item" >
<img class="shop-item-image" src="images/second/drinks-desserts/blue-lagoon.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Blue Lagoon </b></p>
<hr>
<h6 class="shop-item-price">$4</h6>
</div>
<small> A must have drink at Tasty Bites that is such a delightful experience</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/drinks-desserts/pastry.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Pastry </b></p>
<hr>
<h6 class="shop-item-price">$2</h6>
</div>
<small> Perfectly baked pastry that is perfect combo of sweetness and deliciousness</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/drinks-desserts/ice-cream.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Ice Cream </b></p>
<hr>
<h6 class="shop-item-price">$1</h6>
</div>
<small> Chilled ice cream available in numerous flavours all of which are a must try</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
  <div class="card shop-item" >
<img class="shop-item-image" src="images/second/drinks-desserts/cupcakes.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Cup Cakes </b></p>
<hr>
<h6 class="shop-item-price">$2</h6>
</div>
<small> Chocolate lovers delight! Indulgent, gooey molten lava inside cup cake</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/drinks-desserts/gulab-jamun.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Gulab Jamnun </b></p>
<hr>
<h6 class="shop-item-price">$2</h6>
</div>
<small> Mouthwatering freshly made Gulab jamuns that are extra sweet and super tasty</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/drinks-desserts/donut.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Donuts </b></p>
<hr>
<h6 class="shop-item-price">$2</h6>
</div>
<small> A truely extravagent experience with freshly made super tasty donuts</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="section-header" id="section-header" style="grid-column:1/4">
  <p id="non-veg-section"> <b> Non-Vegetarian </b></p>
  <hr>
</div>

      <div class="card shop-item" >
   <img class="shop-item-image" src="images/second/nonveg/chicken-fingers.jpg">
   <div class="card-internal">
   <p class="shop-item-title"> <b> Chicken Fingers </b></p>
   <hr>
   <h6 class="shop-item-price">$5</h6>
   </div>
   <small> Super fresh chicken fingers that are soft inside nad crisp outside</small>
   <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/nonveg/chicken-chunks.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Spicy Chicken Chunks </b></p>
 <hr>
 <h6 class="shop-item-price">$5</h6>
 </div>
 <small> Must try chicken recipie that spicy and truely irresistable</small>
 <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>

<div class="card shop-item" >
 <img class="shop-item-image" src="images/second/nonveg/meatballs.jpg">
 <div class="card-internal">
 <p class="shop-item-title"> <b> Cheesy Meatballs </b></p>
 <hr>
 <h6 class="shop-item-price">$6</h6>
 </div>
 <small> Cheesy delicious chicken meatballs coated with a layer of spicy tangy sauces and exotic toppings</small>
  <button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>

<div class="card shop-item" >
<img class="shop-item-image" src="images/second/nonveg/grilled-chicken-burger.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Grilled Chicken Burger </b></p>
<hr>
<h6 class="shop-item-price">$6</h6>
</div>
<small> Cheese filled in classic burger with a lot of veggies and crisp chicken patty</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/nonveg/chicken-pizza.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Pepperoni Topped Pizza </b></p>
<hr>
<h6 class="shop-item-price">$7</h6>
</div>
<small> A classic American taste! Relish the delectable flavor of Chicken Pepperoni, topped with cheese</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item" >
<img class="shop-item-image" src="images/second/nonveg/chicken-biryani.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Chicken Biryani </b></p>
<hr>
<h6 class="shop-item-price">$5</h6>
</div>
<small> Perfectly made rice combined with chicken and veggies that make your stomach super satisfied</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
  <div class="card shop-item" >
<img class="shop-item-image" src="images/second/nonveg/chiken-tikka.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Chicken Tikka </b></p>
<hr>
<h6 class="shop-item-price">$7</h6>
</div>
<small> Chicken recipie loaded with a lot of spices that is perfect for a full meal </small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item">
<img class="shop-item-image" src="images/second/nonveg/nuggets.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Peppy Chicken Nuggets </b></p>
<hr>
<h6 class="shop-item-price">$6</h6>
</div>
<small> Oven baked soft tender boneless nuggets sprinkled with peri peri seasoning</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
<div class="card shop-item">
<img class="shop-item-image" src="images/second/nonveg/chicken-soup.jpg">
<div class="card-internal">
<p class="shop-item-title"> <b> Chicken Soup </b></p>
<hr>
<h6 class="shop-item-price">$4</h6>
</div>
<small> Delicious chicken soup that has perfect consistency and delightful taste</small>
<button type="button" class="btn btn-primary shop-item-button" name="addtocart"><b>ADD TO CART</b></button>
</div>
</div>

</div>

<div class="container content-section" id="cart">
    <h2><center class="section-header">CART</center></h2>
    <div class="cart-row">
        <span class="cart-item cart-header cart-column">ITEM</span>
        <span class="cart-price cart-header cart-column">PRICE</span>
        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
    </div>
    <div class="cart-items">
    </div>
    <div class="cart-total">
        <strong class="cart-total-title">Total:</strong>
        <span class="cart-total-price">$0</span>
    </div>
    <div class="details-header">
      <hr style="width:20px;height:2px;border:none;background-color:#cc5500;">
      <p style="color:#cc5500;"> Details </p>
      <hr style="width:350px;height:2px;border:none;background-color:#cc5500;">
    </div>
    <div class="details">
    <form action="" method="POST">
      <table border=0 >
      <tr><td>Name</td></tr>
      <tr><td><input type="text" id="username1"></td></tr>
      <tr><td>Email</td></tr>
      <tr><td> <input type="text" id="email1"></td></tr>
      <tr><td>Phone No</td></tr>
      <tr><td><input type="number" id="phoneno1"></td></tr>
      <tr><td>Address</td></tr>
      <tr><td><textarea type="text" id="address1"></textarea></td></tr>
      </table>
   </form>
   </div>
    <button class="btn btn-primary btn-purchase" type="button" onclick="purchaseClicked2()">PURCHASE</button>
</div>
</div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
            <script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


  </body>
</html>
