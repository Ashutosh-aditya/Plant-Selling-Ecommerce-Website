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

    <h1 class="heading">SEARCH RESULTS</h1>
    
    <div class="box-container" >
    
    <?php
    include "db_conn.php";
    if(isset($_GET['search_data_product'])){
        $search_data = $_GET['search_data'];
        $select1_query = "create or replace view search as select * from stock1 where ITEM_TITLE like '%$search_data%'";
        $result1_query = mysqli_query($conn, $select1_query);
        $select_query = "select * from search where ITEM_TITLE like '%$search_data%'";
        $result_query = mysqli_query($conn, $select_query);

        
        if ($result_query) {
            $num_rows = mysqli_num_rows($result_query);
            if ($num_rows > 0) {
                //echo "Number of rows: " . $num_rows;
            } else {
                //echo "No rows found";
            }
        } else {
            //echo "Query failed: " . mysqli_error($conn);
        }


        if ($num_rows == 0)
            {echo "<h2 class='heading'>No Match Found</h2>";} else {
                echo "<h2>Match Found</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query))
        {
            $p_title = $row['ITEM_TITLE'];
            $p_category = $row['ITEM_CATEGORY'];
            $p_img = $row['IMG_ID'];
            $p_price = $row['PRICE'];
            echo "<div class='box' style='border-radius: 30px;box-shadow: 2px 2px 2px rgb(3, 74, 3)'>
            <img src='./images/$p_img' alt=''>
            <div class='content'>
                <h3>$p_title</h3>
                <h2>Rs.$p_price</h2>
                <a href='index6.php' class='btn'>Buy now</a>
            </div>
        </div>";
        }
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