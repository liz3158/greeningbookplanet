<?php session_start(); ?>
<?php
include("connection.php"); //connect to database

if (isset($_POST['submit'])) {

	$seller_email = $_POST['seller_email'];

	$sql = "SELECT * FROM seller where seller_email ='$seller_email'";

	$result = mysqli_query($connect, $sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (mysqli_num_rows($result) == 1) {
		//attribute success inserted
		$_SESSION['seller_email'] = $seller_email;
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
	<title>seller FORGOT PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="favicon" href="images/favicon.ico">
</head>

<body>
	<form action="forget1.php" method="post">
		<h2>SELLER FORGOT PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address <sub style="color: red;">*</sub></label>
		<input type="text" name="seller_email" placeholder="example@gmail.com"><br><br>

		<button name="submit" class="ca">Check</button><br><br>
	</form>

</body>

</html>