<?php 
include "lc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeny</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="line.css">    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="style1.css">
<!-- <link rel="stylesheet" href="w3.css"> -->
<!-- <link rel="stylesheet" href="m1.css"> -->

<style>



.inpt {
/* Add some basic styles */
padding: 12px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
font-size: 2em;
/* Add some hover effect */
transition: 0.5s;
}

.inp {
  /* Add some basic styles */
padding: 12px 20px;
margin: 8px 0;
box-sizing: border-box;
border: 2px solid #ccc;
border-radius: 4px;
/* Add some hover effect */
transition: 0.5s;
}

.inp:focus {
  /* Add some styles when input is focused */
  border: 2px solid rgb(0, 83, 9);
}

    
.button {
background-color: #04AA6D;
border: none;
color: white;
padding: 20px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
}

.button1 {border-radius: 2px;}
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;}
.button4 {border-radius: 12px;}
.button5 {border-radius: 50%;}
    
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}

td, th {
border: 1px solid #dddddd;
text-align: left;
padding: 8px;
font-size: 2em;
text-align: center;
border-color: #96D4D4;
}

tr:nth-child(even) {
background-color: #dddddd;
}

.cst
{
    text-align: right;
    font-size: 3em;
}

</style>

</head>
<body>
    
<header>


    <div class="header-2">

        <a href="index0.php" class="logo"> <i class="fas fa-seedling"></i> Greeny </a>
        
        <form action="search.php" method="get" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search" name="search_data">
            <!-- <label for="search-bar" class="fas fa-search"></label> -->
            <input type="submit" value="search" class="btn" name="search_data_product">
        </form>
        <?php
include "nb.php";
?></div>

    <div class="header-3">

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar"style="margin:0 200px; justify-content:space-around;">
            <a href="index0.php" style="margin: 0 25px;">Home</a>
            <a href="index2.php" style="margin: 0 25px;">Bonsai</a>
            <a href="index3.php" style="margin: 0 25px;">House plants</a>
            <a href="index4.php" style="margin: 0 25px;">Office Plants</a>
            <a href="index5.php" style="margin: 0 25px;">for Gift </a>
        </nav>

    </div>

</header>

<section class="category" id="category">

    <h1 class="heading">Online Payment</h1>
    
    <div class="box-container" >
    
    <?php
include "db_conn.php";
$payment_id = $_GET['payment_id'];
// $user_id = $_SESSION['id'];
// $product_id = $_GET['product_id'];
// $quantity = $_GET['quantity'];
//     echo "user id --> $user_id, $product_id , $quantity ";
    if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
        // Check if the user is logged in
        if (!isset($_SESSION['id'])) {
            echo "Please log in to add items to your cart.";
            exit();
        }
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'];
        $user_id = $_SESSION['id'];
        // Connect to the database
        // Check if the product already exists in the cart
        $result = mysqli_query($conn, "SELECT cart_id FROM cart WHERE user_id = '$user_id' AND ITEM_ID= '$product_id'");
        if (mysqli_num_rows($result) > 0) {
            // Update the quantity in the cart
            mysqli_query($conn, "UPDATE cart SET quantity = quantity + '$quantity' WHERE user_id = '$user_id' AND ITEM_ID = '$product_id'");
        } else {
            // Add the product to the cart
            mysqli_query($conn, "INSERT INTO cart (user_id, ITEM_ID, quantity) VALUES ('$user_id', '$product_id', '$quantity')");
        }
    }

        if (isset($_SESSION['id'])) {
            $totalcost = 0;
            $user_id = $_SESSION['id'];
            // Connect to the database
            // Perform a query to retrieve the cart items
            // $result = mysqli_query($conn, "SELECT p.ITEM_ID,p.ITEM_TITLE, p.PRICE, P.IMG_ID ,c.QUANTITY FROM STOCK1 p JOIN cart c ON p.ITEM_ID = c.ITEM_ID WHERE c.user_id = '$user_id'");
            $result = mysqli_query($conn, "SELECT AMOUNT FROM orders WHERE Payment_ID = '$payment_id'");
        $row = mysqli_fetch_array($result);
            $totalcost = $row['AMOUNT'];
            // Display the cart items
            // $totalcost = 0;
            // while ($row = mysqli_fetch_array($result)) {
            //     if($row['QUANTITY']>0){
            //     $name = $row['ITEM_TITLE'];
            //     $price = $row['PRICE'];
            //     $quantity = $row['QUANTITY'];
            //     $img = $row['IMG_ID'];
            //     $tempcost = 0;
            //     $tempcost = $quantity * $price;
            //     $totalcost = $totalcost + $tempcost;
            //     $pid = $row['ITEM_ID'];
            //     }
            // }
        } else {
            echo "Please log in to view your cart.";
        }
    echo "<form action='paysuccess.php' method='get'>
    <label for='card-number' class='inpt'>Card Number</label>
    <input type='text' id='card-number' name='card-number' class='inp'>

    <label for='expiration-date' class='inpt'>Expiration Date</label>
    <input type='text' id='expiration-date' name='expiration-date' class='inp'>

    <label for='cvv' class='inpt'>CVV</label>
    <input type='text' id='cvv' name='cvv' class='inp'>

    <input type='submit' value='Pay $totalcost' class='inp'>
</form>";
?>


</div>
</div>
</section>
<section class="footer" style="background-color: black;">

                <div class="box-container">
            
                    <div class="box">
                        <h3><a href="aboutus.html">about us</a></h3>
                        <p>Buy Plants at Greeny with free shipping! Make your day greener with greeny!</p>
                    </div>
                    <div class="box">
                        <h3>quick links</h3>
                        <a href="#home">home</a>
                        <a href="#category">category</a>
                
                    </div>
                    <div class="box">
                        <h3>follow us</h3>
                        <a href="#">facebook</a>
                        <a href="#">twitter</a>
                        <a href="#">instagram</a>
                        <a href="#">linked</a>
                    </div>
            
                </div>
                
            </section>

</body>
</html>