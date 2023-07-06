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
background-color: #04AA6D; /* Green */
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
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #e5e5e5;
    font-size: 14px;
    color: #333;
}

th {
    background-color: #f5f5f5;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f0f0f0;
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

    <h1 class="heading">Order Details</h1>
    
    <div class="box-container" >
    
    <?php
include "db_conn.php";$p_status= $_GET['dropdown'];
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
        $qty = $_GET['quantity'];
        $user_id = $_SESSION['id'];
        // Connect to the database
        // Check if the product already exists in the cart
        $result = mysqli_query($conn, "SELECT cart_id FROM cart WHERE user_id = '$user_id' AND ITEM_ID= '$product_id'");
        if (mysqli_num_rows($result) > 0) {
            // Update the quantity in the cart
            mysqli_query($conn, "UPDATE cart SET quantity = quantity + '$qty' WHERE user_id = '$user_id' AND ITEM_ID = '$product_id'");
        } else {
            // Add the product to the cart
            mysqli_query($conn, "INSERT INTO cart (user_id, ITEM_ID, quantity) VALUES ('$user_id', '$product_id', '$qty')");
        }
    }

        if (isset($_SESSION['id'])) {
            
            $user_id = $_SESSION['id'];
            // Connect to the database
            // Perform a query to retrieve the cart items
            $result = mysqli_query($conn, "SELECT p.ITEM_ID,p.ITEM_TITLE, p.PRICE, P.IMG_ID ,c.QUANTITY FROM STOCK1 p JOIN cart c ON p.ITEM_ID = c.ITEM_ID WHERE c.user_id = '$user_id'");
            // Display the cart items
            $result1 = mysqli_query($conn, "SELECT name,Address,phone from users where id=$user_id");
        while ($row = mysqli_fetch_array($result1)) {
            $Aname = $row['name'];
            $addr = $row['Address'];
            $ph = $row['phone'];
        }
            $totalcost = 0;
            $total_items = 0;

            while ($row = mysqli_fetch_array($result)) {
                if($row['QUANTITY']!=0){
                $name = $row['ITEM_TITLE'];
                $price = $row['PRICE'];
                $quantity = $row['QUANTITY'];
                $img = $row['IMG_ID'];
                $tempcost = 0;
                $tempcost = $quantity * $price;
                $totalcost = $totalcost + $tempcost;
                $pid = $row['ITEM_ID'];
                $total_items = $total_items +$quantity;
                }
            
            };
            $date = date("F j, Y, g:i a");            

            
        } else {
            echo "Please log in to view your cart.";
        }

        function generateOrderId() {
            $date = date('Ymd');
            $microtime = microtime();
            $microtime = explode(' ', $microtime);
            $microtime = $microtime[1] . substr($microtime[0], 2, 6);
            $rand = rand(0, 9999);
            $rand = str_pad($rand, 4, '0', STR_PAD_LEFT);
            return $date . $microtime . $rand;
        }
        $result3 = mysqli_query($conn, "SELECT COUNT(*) cnt FROM orders");
        $row = mysqli_fetch_array($result3);
        $c = $row['cnt'];
        $order_id = generateOrderId();
        $invoice = md5($order_id);
        $pid = md5($invoice);
    echo "<table>";
    echo "<tr><th>Order ID : </th> <th>".$order_id."</th></tr>";
    echo "<tr><th>User ID : </th> <th>".$user_id."</th></tr>";
    echo "<tr><th>Amount : </th> <th>Rs.".$totalcost."</th></tr>";
    echo "<tr><th>Invoice No : </th><th>".$invoice."</th></tr>";
    echo "<tr><th>Number of items : </th><th>".$total_items."</th></tr>";
    echo "<tr><th>Order Date : </th><th>".$date."</th></tr>";
    echo "<tr><th>Payment Status : </th><th>".$p_status."</th></tr>";


        if($p_status=='offline')
        {
        echo "</table>";
        $sql = "INSERT INTO orders (ORDER_ID,USER_ID,AMOUNT,INVOICE_NO,TOTAL_PRODUCTS,ORDER_DATE,ORDER_STATUS,Payment_ID,Cust_Address) 
        VALUES ('$order_id','$user_id','$totalcost','$invoice','$total_items','$date','$p_status','OFFLINE','$addr')";
        
        // /echo "".$sql."";
        if ($conn->query($sql) === TRUE) {
            ;
            echo '<br><h2>Order Accepted Successfully</h2>';
        } else {
            echo 'Error: ' . $sql . '<br>';
        }
    }
        


    if ($p_status == 'online')
        {
            echo "<tr><th>Payment ID : </th><th>".$pid."</th></tr></table>";;
            $sql = "INSERT INTO orders (ORDER_ID,USER_ID,AMOUNT,INVOICE_NO,TOTAL_PRODUCTS,ORDER_DATE,ORDER_STATUS,Payment_ID,Cust_Address) 
        VALUES ('$order_id','$user_id','$totalcost','$invoice','$total_items','$date','$p_status','$pid','$addr')";
        // '$pid'
        // echo "$sql";
        if ($conn->query($sql) === TRUE) {
            echo '<br><h2>Order Processed successfully</h2>';
        }
        echo "<form action='pay.php' method='get'>
        <input type='hidden' name='payment_id' value=$pid>
        <input type='submit' class='btn' value='Proceed to payment'>
        </form>";
    }

    $sql = "INSERT INTO payments (PAYMENT_ID,USER_ID,AMOUNT,PAYMENT_TYPE) 
        VALUES ('$pid','$user_id','$totalcost','$p_status')";
        if ($conn->query($sql) === TRUE) {
            ;
            echo '<br><h2>Order Accepted Successfully</h2>';
        } else {
            echo 'Error: ' . $sql . '<br>';
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
