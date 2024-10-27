<!DOCTYPE html>
<html>

<head>
	<title>USER LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="favicon" href="images/favicon.ico">
</head>

<body>
	<form action="login.php" method="post">

		<h2>USER LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address <sub style="color: red;">*</sub></label>
		<input type="text" name="user_email" placeholder="example@gmail.com"><br>

		<label>Password <sub style="color: red;">*</sub></label>
		<input type="password" name="user_password" placeholder="Password">
		<a href="forget1.php" class="forgot">Forgot password?</a><br><br><br>

		<button type="submit" class="ca">Login</button><br><br>
		<input class="create" type="button" onclick="window.location.href='signup.php';" value="Create An Account"><br><br><br>

	</form>

</body>

</html>