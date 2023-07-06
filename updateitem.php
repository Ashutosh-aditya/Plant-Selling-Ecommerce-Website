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
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="m1.css">

<style>

.material-icons {vertical-align:-14%}


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
            <h1><a href="admin.php"  style="margin: 0 10px;">Stock Record</a>
            <a href="index2.php" style="margin: 0 10px;">Insert plant</a>
            <a href="modifystk.php" style="margin: 0 10px;">Modify Stock</a>
            <a href="index4.php" style="margin: 0 10px;">Orders</a>
            <a href="index5.php" style="margin: 0 10px;">Payment Records</a></h1>
            
        </nav>

    </div>

</header>

<section class="category" id="category">
    <h1 class="heading">Item Update <a href="cart.php" class="fas fa-user-circle"></a></h1>
    <!-- <h1 style="float:right;"><a href="cart.php" class="fas fa-user-circle"></a></h1><br> -->
    
    <div class="box-container" >
    <?php
    $chck = 1;
include "db_conn.php";

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
    }
    if(isset($_GET['modify_id']))
    {
        $iid = $_GET['modify_id'];
        $q= "DELETE FROM stock1 WHERE ITEM_ID = '$iid';";
        $r = mysqli_query($conn, $q);
        echo "Record Deleted with Item-id=$iid";
    }
        ;
        if (isset($_SESSION['id'])) {
            
            $user_id = $_SESSION['id'];
            // Perform a query to retrieve the cart items
            $result = mysqli_query($conn, "SELECT * from stock1;");
            
            // Display the cart items
            $totalcost = 0;
        //     $row = mysqli_fetch_array($result);
        // $x = $row['QUANTITY'];
        // echo "$x";
            // if(($row1 = mysqli_fetch_array($result))!=0)
            {
                echo "<table>
                <tr>
                <th>Sno.</th>
                <th>Item-id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Options</th>
                </tr>";
            }
        $count = 0;
        while (($row = mysqli_fetch_array($result))) {
            //echo "$count-<br>";
            $count++;{
                $iid = $row['ITEM_ID'];
                $name = $row['ITEM_TITLE'];
                $price = $row['PRICE'];
                $quantity = $row['IN_STOCK1'];
                $img = $row['IMG_ID'];
                $cat = $row['ITEM_CATEGORY'];
                $tempcost = 0;
                $tempcost = $quantity * $price;
                $totalcost = $totalcost + $tempcost;
                echo "<tr>
                <td>$count.</td>
                <td>$iid</td>
                <td><img src='./images/$img' alt='' style='width:200px; height:auto;'></td>
                <td>$name</td>
                <td>$cat</td>
                <td>$quantity</td>
                <td>$price</td>
                <td>
                <form action='deleteplant.php' method='get'>
                        <input type='hidden' name='delete_id' value=$iid>
                        <input type='submit' class='btn' value='Delete Item'>
                    </form>
                <form action='updateitem.php' method='get'>
                        <input type='hidden' name='product_id' value=$iid>
                        <input type='submit' class='btn' value='Update Item'>
                    </form>
                </td>
                </tr>";
                }
            }
            // resp
            echo "<tr>
            <td colspan='7'> End Of List</td>
            </tr></table><br><br>";
            
        } else {
            echo "Please log in to view your cart.";
        $chck = 0;
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