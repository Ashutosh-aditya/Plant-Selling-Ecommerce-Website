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

<style>
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

.circular-button {
    background-color: darkgreen;
border-radius: 50%; 
width:  30px; 
height: 30px; 
text-align: center;
padding-top: 15px; 
color: white;  
font-weight: bold; 
padding-top : 0%;
font-size: 25px;

    }
    .circular-button:hover {
    background-color: green;
    }
    a:visited {
color: darkgreen;
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
    <h1 class="heading">Cart <a href="cart.php" class="fas fa-user-circle"></a></h1>
    <!-- <h1 style="float:right;"><a href="cart.php" class="fas fa-user-circle"></a></h1><br> -->
    
    <div class="box-container" >
    <?php
    $chck = 1;
include "db_conn.php";
    $count = 0;
    if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
        // Check if the user is logged in
        if (!isset($_SESSION['id'])) {
            $chck=0;
            echo "Please log in to add items to your cart.";
            exit();
        }
        $product_id = $_GET['product_id'];
        $qty = $_GET['quantity'];
        $user_id = $_SESSION['id'];
        // Connect to the database
        // Check if the product already exists in the cart
        $result01 = mysqli_query($conn, "SELECT cart_id FROM cart WHERE user_id = '$user_id' AND ITEM_ID= '$product_id'");
        if (mysqli_num_rows($result01) > 0) {
            $count--;
            // Update the quantity in the cart
            mysqli_query($conn, "UPDATE cart SET quantity = quantity + '$qty' WHERE user_id = '$user_id' AND ITEM_ID = '$product_id'");
            mysqli_query($conn, "UPDATE stock1 SET IN_STOCK1 = IN_STOCK1 - '$qty' WHERE ITEM_ID = '$product_id'");
            
            // $qty1 = -$qty;
            // $stockupdate= "CALL StockCount($product_id,$qty1)";
            // mysqli_query($conn, $stockupdate);
        } else {
            // Add the product to the cart
            mysqli_query($conn, "INSERT INTO cart (user_id, ITEM_ID, quantity) VALUES ('$user_id', '$product_id', '$qty')");
            mysqli_query($conn, "UPDATE stock1 SET IN_STOCK1 = IN_STOCK1 - '$qty' WHERE ITEM_ID = '$product_id'");
            // $qty1 = 1;
            // $stockupdate= "CALL StockCount($product_id,$qty1)";
            // mysqli_ query($conn, $stockupdate);
        }
    }

        if (isset($_SESSION['id'])) {
            
            $user_id = $_SESSION['id'];
            // Perform a query to retrieve the cart items
            $result = mysqli_query($conn, "SELECT p.ITEM_ID,p.ITEM_TITLE, p.PRICE, P.IMG_ID ,c.QUANTITY FROM STOCK1 p JOIN cart c ON p.ITEM_ID = c.ITEM_ID WHERE c.user_id = '$user_id'");
            
            // Display the cart items
            $totalcost = 0;
        //     $row = mysqli_fetch_array($result);
        // $x = $row['QUANTITY'];
        // echo "$x";
            // if(($row1 = mysqli_fetch_array($result))!=0)
            {
                echo "<h1>can't add more than 2 items</h1><table>
                <tr>
                <th>Image</th>
                <th>Name</th>
                <th colspan='3'>Quantity</th>
                <th>Price</th>
                <th>Total Cost</th>
                </tr>";
            }

        $itmcount = 0;
        while (($row = mysqli_fetch_array($result))) {
            //echo "$count-<br>";
            {
                $count++;
                if ($row['QUANTITY'] != 0) {
                    $name = $row['ITEM_TITLE'];
                    $price = $row['PRICE'];
                    $quantity = $row['QUANTITY'];
                    $img = $row['IMG_ID'];
                    $tempcost = 0;
                    $tempcost = $quantity * $price;
                    $totalcost = $totalcost + $tempcost ;
                    $totalcost = $totalcost + (0.1 * $totalcost);
                    $pid = $row['ITEM_ID'];
                    $itmcount = $itmcount + 1;
                    
                if($itmcount>2)
                {
                    echo "<script>alert('Can't insert more items limit reach')</script>";
                    // echo "<h1>can't add more than 2 items</h1>";
                }
                    
                    echo "<tr>
                <td><img src='./images/$img' alt='' style='width:200px; height:auto;'></td>
                <td>$name</td>
                <td style='border:none;'>
                        <form action='cart.php' method='get'>
                        <input type='hidden' name='product_id' value=$pid>
                        <input type='hidden' name='quantity' value='-1'>
                        <input type='submit' class='circular-button' value='-'>
                        </form></td><td style='border:none;'>
                $quantity</td><td style='border:none;'>
                        <form action='cart.php' method='get'>
                        <input type='hidden' name='product_id' value=$pid>
                        <input type='hidden' name='quantity' value='1'>
                        <h1><input type='submit' class='circular-button'  value='+'></h1>
                        </form>
                </td>
                <td>Rs.$price</td>
                <td>Rs.$tempcost</td>
                
                </tr>";
                if($itmcount>2)
                    {
                        echo "<script>alert('Can't insert more items limit reach')</script>";
                        echo "<h1>can't add more than 2 items</h1>";
                        $row = mysqli_fetch_array($result);
                    }
                }
            }
            }
        echo "<tr>
            <td></td>
            <td></td>
            <td colspan='4'> Total Cost</td>
            <td> <strong>Rs.$totalcost</strong> </td>
            </tr></table><br><br>;count=$count;";
            
        } else {
            echo "Please log in to view your cart.";
        $chck = 0;
        }
        // && $count<12
    if ($chck == 1 ) {
        echo "<form action='orders.php' method='GET'>
        <H1><label for='dropdown'>Select Payment Mode:</label>
        <select name='dropdown' id='dropdown'>
            <option value='online'>ONLINE</option>
            <option value='offline'>OFFLINE</option>
        </select><br>
        <input type='submit' class='button button1' value='Submit'></H1>
        </form>
        </div>";
    }
?>    
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