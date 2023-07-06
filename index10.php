<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeny</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style1.css">

</head>
<body>
<header>

    <div class="header-2">

        <a href="#" class="logo"> <i class="fas fa-seedling"></i> Greeny </a>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
        <?php
include "nb.php";
?><div id="id01" class="modal">

<form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>
</div>

<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    </div>

    <div class="header-3">

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#category">category</a>
        </nav>

        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-user-circle"></a>
        </div>

    </div>

</header>

<section class="home" id="home">

    <div class="swiper-container home-slider">
                
                <div class="box" style="background: url(slider1.jpg);">
                    <div class="content">
                        <span>Shop Now at </span>
                        <h3>Greeny</h3>
                        <a href="index2.php" class="btn">shop now</a>
                    </div>
            </div>
    </div>

</section>

<section class="category" id="category">

<h1 class="heading"> shop by category </h1>

<div class="box-container" >

    <div class="box" style="border-radius: 30px;box-shadow: 2px 2px 2px rgb(3, 74, 3)">
        <img src="cat1.jpg" alt="">
        <div class="content">
            <h3>bonsai</h3>
            <a href="index2.php" class="btn">shop now</a>
        </div>
    </div>
    <div class="box" style="border-radius: 30px;box-shadow: 2px 2px 2px rgb(3, 74, 3)">
        <img src="cat2.jpg" alt="">
        <div class="content">
            <h3>plants for house</h3>
            <a href="index3.php" class="btn">shop now</a>
        </div>
    </div>
    <div class="box"style="border-radius: 30px;box-shadow: 2px 2px 2px rgb(3, 74, 3)">
        <img src="cat3.jpg" alt="">
        <div class="content">
            <h3>plants for office</h3>
            <a href="index4.php" class="btn">shop now</a>
        </div>
    </div>
    <div class="box" style="border-radius: 30px;box-shadow: 2px 2px 2px rgb(3, 74, 3)">
        <img src="cat4.jpg" alt="">
        <div class="content">
            <h3>gift plants</h3>
            <a href="index5.php" class="btn">shop now</a>
        </div>
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
            <a href="#">home</a>
            <a href="#">category</a>
    
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

<a href="#home" class="scroll-top fas fa-angle-up"></a>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>