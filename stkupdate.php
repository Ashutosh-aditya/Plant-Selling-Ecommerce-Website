<?php 
include "lc.php";
include "db_conn.php";
if (isset($_POST['modify_product']))
{
    
    $ptitle = $_POST['product_title'];
    $pcat = $_POST['product_category'];
    $pstk = $_POST['product_stock'];
    $pstatus = $_POST['product_status'];
    $pprice = $_POST['product_price'];
    $pimg = $_FILES['product_img']['name'];
    $ptempimg = $_FILES['product_img']['tmp_name'];
    $pdid = $_POST['product_id'];
    move_uploaded_file($ptempimg,"./images/$pimg");
    $qry = "update stock1 
    set ITEM_TITLE='$ptitle',ITEM_CATEGORY='$pcat',IN_STOCK1='$pstk',IMG_ID='$pimg',STATUS='$pstatus',PRICE=$pprice
    where ITEM_ID='$pdid';";
    $result_qry = mysqli_query($conn,$qry);
    if($result_qry)
    {
        echo "<script>alert('Record updated successfully')</script>";
    }
}
else {
    $mid = $_POST['modify_id'];
    echo $mid;
}

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
body
{
    /* color:lightgrey; */
    background-color:lightgrey ;
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

.input1 {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
    margin-top: 20px;
    margin-bottom: 20px;
}
.input1:focus {
    border-color: darkgreen;
    background-color:#ccc;
}
.label1 {
	color: #888;
	font-size: 18px;
	padding: 10px;
    margin-top: 40px;
    margin-bottom: 20px;
}
.form1 {
	/* width: 500px; */
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
	opacity: 0.85;
	border-radius: 30px;
    width: 50%; /* or any other width */
    margin: 0 auto;
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
            <a href="insertproduct.php" style="margin: 0 10px;">Insert plant</a>
            <a href="modifystk.php" style="margin: 0 10px;">Modify Stock</a>
            <a href="adminorder.php" style="margin: 0 10px;">Orders</a>
            <a href="index5.php" style="margin: 0 10px;">Payment Records</a></h1>
            
        </nav>

    </div>

</header>

<section class="category" id="category">
    <h1 class="heading">Update Product - Admin Dashboard <a href="#" class="fas fa-user-circle"></a></h1>
    <form action="" method="post" enctype="multipart/form-data" class="form1">
        <div>
            <!-- <label for="product_id" class="label1">Product ID</label> -->
            <input type="hidden" name=<?php echo $mid; ?> id="product_id" placeholder="Enter Product ID" class="input1" autocomplete="off" required="required"><br>
            
            <label for="product_title" class="label1">Product Title</label>
            <input type="text" name="product_title" id="product_title" placeholder="Enter Product Title" class="input1" autocomplete="off" required="required"><br>
            </div>
            <div>
            <label for="product_category" class="label1">Product Category</label>
            <select name="product_category" id="" class="input1">
                <option value="BONSAI">BONSAI</option>
                <option value="HOUSE_PLANTS">HOUSE_PLANTS</option>
                <option value="OFFICE_PLANTS">OFFICE_PLANTS</option>
                <option value="GIFT_PLANTS">GIFT_PLANTS</option>
            </select>

            </div><div>
            <label for="product_stock" class="label1">Product Stock</label>
            <input type="text" name="product_stock" id="product_stock" placeholder="Enter Product Amount" class="input1" autocomplete="off" required="required"><br>
            
            <label for="product_status" class="label1">Product Status</label>
            <input type="text" name="product_status" id="product_status" placeholder="Enter Product Status" class="input1" autocomplete="off" required="required"><br>
            
            <label for="product_price" class="label1">Product Price</label>
            <input type="text" name="product_price" id="product_price" placeholder="Enter Product Price (in Rs.)" class="input1" autocomplete="off" required="required"><br>
            
</div>
<div>
            <label for="product_img" class="label1">PRODUCT IMAGE</label>
            <input type="file" name="product_img" id="product_img"  class="input1"  required="required"><br>
            
            </div>
            <?php echo $mid; ?>
        <input type="submit" name="modify_product" class="btn" value="modify_product">
    </form>
    
    <!--  -->
    </section>

    
            <section class="footer" style="background-color: black;">

                <div class="box-container">
            
                    <div class="box">
                        <h3><a href="aboutus.html">about us</a></h3>
                        <p>Buy Plants at Greeny with free shipping! Make your day greener with greeny!!</p>
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