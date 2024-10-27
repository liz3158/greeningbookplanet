<?PHP session_start(); ?>
<?php
include("db_conn.php");

$user_email = $_SESSION['user_email'];

if (isset($_POST['submit1'])) {

	$user_email = $_POST['user_email'];

	$securityQuestion = $_POST['securityQuestion'];

	$securityAnswer = $_POST['securityAnswer'];



	//insert data
	$sql = "SELECT * FROM user where user_email ='$user_email' AND securityQuestion ='$securityQuestion' AND securityAnswer ='$securityAnswer'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if (mysqli_num_rows($result) == 1) {
		//success
		$_SESSION['user_email'] = $user_email;
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
	<title>USER FORGET PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
	<link rel="favicon" href="images/favicon.ico">
</head>

<body>
	<form action="forget2.php" method="post">
		<h2>USER FORGET PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address <sub style="color: red;">*</sub></label>
		<input type="text" name="user_email" readonly="true" value="<?php echo $user_email; ?>"><br>

		<label>Security Question <sub style="color: red;">*</sub></label>
		
		<form method="post">
			<select class="select" required="required" name="securityQuestion">
				<option>What is your nickname?</option>
				<option>What is your parents name?</option>
				<option>What is your favorite color?</option>
			</select>
			<br>
			<label>Answer <sub style="color: red;">*</sub></label>
			<input type="text" name="securityAnswer">
			<br><br>

			<button name="submit1" class="ca">Submit</button><br><br><br>
			<button name="submit2" class="ca">Cancel</button><br><br>

		</form>

</body>

</html>