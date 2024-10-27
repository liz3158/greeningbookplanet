<!DOCTYPE html>
<html>
<head>
	<title>SELLER LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="favicon" href="img/favicon.ico">
</head>
<body>
	<form action="login.php" method="post">
     	<h2>SELLER LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email Address <sub style="color: red;">*</sub></label>
     	<input type="text" name="seller_email" placeholder="example@gmail.com"><br>

     	<label>Password <sub style="color: red;">*</sub></label>
     	<input type="password" name="seller_password" placeholder="Password">
		<a href="forget1.php" class="forgot">Forgot Password?</a><br><br><br>

     	<button type="submit">Login</button>
		<input class="create" type="button" onclick="window.location.href='terms.php';" value="Create an account">
		<input class="create" type="button" onclick="window.location.href='../homepage.php';" value="Back To Homepage">
		
		
     </form>

</body>
</html>