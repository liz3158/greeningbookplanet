<?php session_start(); ?>
<?php
include("db_conn.php"); //connect to database

if (isset($_POST['submit'])) {

	$user_email = $_POST['user_email'];

	$sql = "SELECT * FROM user where user_email ='$user_email'";

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (mysqli_num_rows($result) == 1) {
		//attribute success inserted
		$_SESSION['user_email'] = $user_email;
		echo "<script>alert('Congrats you have success and able to next page');
        	window.location='forget2.php'</script>";
	} else {
		//attribute failed inserted
		echo "<script>alert('Sorry, email doesn't exists');
             window.location='index.php'</script>";
	}
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>USER FORGOT PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="favicon" href="images/favicon.ico">
</head>

<body>
	<form action="forget1.php" method="post">
		<h2>USER FORGOT PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address <sub style="color: red;">*</sub></label>
		<input type="text" name="user_email" placeholder="example@gmail.com"><br><br>

		<button name="submit" class="ca">Check</button><br><br>
	</form>

</body>

</html>