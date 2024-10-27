<?PHP session_start(); ?>
<?php
include("connection.php");

$seller_email = $_SESSION['seller_email'];

if (isset($_POST['submit1'])) {

	$seller_email = $_POST['seller_email'];

	$seller_security_question = $_POST['seller_security_question'];

	$seller_security_answer = $_POST['seller_security_answer'];



	//insert data
	$sql = "SELECT * FROM seller where seller_email ='$seller_email' AND seller_security_question ='$seller_security_question' AND seller_security_answer ='$seller_security_answer'";

	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (mysqli_num_rows($result) == 1) {
		//success
		$_SESSION['seller_email'] = $seller_email;
		echo "<script>alert('Congrats, your information are true.');
         window.location='forget3.php'</script>";
	} else {
		//failed
		echo "<script>alert('Sorry, your information are wrong!');
         window.location='forget1.php'</script>";
	}
}

if(isset($_POST["submit2"])){
	header("Location: index.php");
	}

?>



<!DOCTYPE html>
<html>

<head>
	<title>SELLER FORGET PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
	<link rel="favicon" href="images/favicon.ico">
</head>

<body>
	<form action="forget2.php" method="post">
		<h2>seller FORGET PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address <sub style="color: red;">*</sub></label>
		<input type="text" name="seller_email" readonly="true" value="<?php echo $seller_email; ?>"><br>

		<label>Security Question <sub style="color: red;">*</sub></label>
		
		<form method="post">
			<select class="select" required="required" name="seller_security_question">
				<option>What is your nickname?</option>
				<option>What is your parents name?</option>
				<option>What is your favorite color?</option>
			</select>
			<br>
			<label>Answer <sub style="color: red;">*</sub></label>
			<input type="text" name="seller_security_answer">
			<br><br>

			<button name="submit1" class="ca">Submit</button><br><br><br>
			<button name="submit2" class="ca">Cancel</button><br><br>

		</form>

</body>

</html>