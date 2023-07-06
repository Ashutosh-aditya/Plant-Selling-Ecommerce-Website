<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$str=$_SESSION['name'];
?><?php 
}else{
    $str = "Login";
}




?>