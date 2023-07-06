<?php 
session_start();

if(isset($_SESSION['name'])) {
     if ($_SESSION['name'] == "admin") {
     $redirect_page = "admin.php";
     }  else {
     $redirect_page = "index0.php";
     }
} else {
     $redirect_page = "login.php";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 class="lout">Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>
     <a href="index0.php"><p style=" font-weight: 600;"> Go to homepage </p></a>
     <?php
$seconds = 5;
?>
<h1 class="lout">Redirecting to Homepage in <span id="countdown"></span> seconds</h1>
     <script>
     var seconds = <?php echo $seconds; ?>;
     function countdown() {
          seconds = seconds - 1;
          if (seconds < 0) {
               setTimeout(function(){
     window.location.href = "<?php echo $redirect_page; ?>";
     }, 1000);
          } else {
               document.getElementById("countdown").innerHTML = seconds;
               window.setTimeout("countdown()", 1000);
          }
     }
     countdown();
     </script>
</body>
</html>

<?php 
 ?>