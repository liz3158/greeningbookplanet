<?php session_start(); ?>
<?php
 include("connection.php");//sambung ke pangkalan data
$seller_email =$_SESSION['seller_email'];



$query = "SELECT * FROM seller WHERE seller_email ='$seller_email'" ;

     $result = mysqli_query($connect, $query);
    
    if(mysqli_num_rows($result) >0)
   {
    while ($row= mysqli_fetch_array($result))
    {
    
//attribute berdasarkan pangkalan data
   $seller_email=$row['seller_email'];
   $seller_name=$row['seller_name'];
   $seller_contactno=$row['seller_contactno'];
   $seller_password=$row['seller_password'];

   $seller_security_question=$row['seller_security_question'];
   $seller_security_answer=$row['seller_security_answer'];
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
	<form action="forget4.php?seller_email=<?php echo $seller_email;?>" method="post">

		<h2>SELLER FORGOT PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address</label>
		<input readonly="readonly" type="text" name="seller_email" value="<?php echo $seller_email;?>"><br>

		<label>Name</label>
		<input readonly="readonly" type="text" name="seller_name" value="<?php echo $seller_name;?>"><br>

		<label>Phone Number</label>
		<input readonly="readonly" type="text" name="seller_contactno" value="<?php echo $seller_contactno;?>"><br>

		<label>Password <sub style="color: red;">*</sub></label>
		<input type="password" name="seller_password" value="<?php echo $seller_password;?>"><br>

		<label>Security Question</label>
		<input readonly="readonly" type="text" name="seller_security_question" value="<?php echo $seller_security_question;?>"><br>

		<label>Security Answer</label>
		<input readonly="readonly" type="text" name="seller_security_answer" value="<?php echo $seller_security_answer;?>"><br>

		<input class="create" type="button" onclick="window.location.href='forget2.php';" value="Back"><br><br><br>

		
		<input type="submit" name="update" class="create" value="Update">
		
		<br><br>

	</form>

</body>

</html>
