<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="m1.css">
<style>
.material-icons {vertical-align:-14%}
</style>
</head>
<body>
	<form action="login.php" method="post">
	<a href="index0.php"><i class="material-icons w3-large">home</i></a>
		<h2>LOGIN</h2>
		
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>User Name</label>
		<input type="text" name="uname" placeholder="User Name"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
		<a href="signup.php" class="ca">Create an account</a>
	</form>
</body>
</html>