<?php session_start(); ?>
<?php
 include("db_conn.php");//sambung ke pangkalan data
$user_email =$_SESSION['user_email'];



$query = "SELECT * FROM user WHERE user_email ='$user_email'" ;

     $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) >0)
   {
    while ($row= mysqli_fetch_array($result))
    {
    
//attribute berdasarkan pangkalan data
   $user_email=$row['user_email'];
   $user_name=$row['user_name'];
   $user_contactno=$row['user_contactno'];
   $user_password=$row['user_password'];

   $securityQuestion=$row['securityQuestion'];
   $securityAnswer=$row['securityAnswer'];
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
	<form action="forget4.php?user_email=<?php echo $user_email;?>" method="post">

		<h2>USER FORGOT PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address</label>
		<input readonly="readonly" type="text" name="user_email" value="<?php echo $user_email;?>"><br>

		<label>Name</label>
		<input readonly="readonly" type="text" name="user_name" value="<?php echo $user_name;?>"><br>

		<label>Phone Number</label>
		<input readonly="readonly" type="text" name="user_contactno" value="<?php echo $user_contactno;?>"><br>

		<label>Password <sub style="color: red;">*</sub></label>
		<input type="password" name="user_password" value="<?php echo $user_password;?>"><br>

		<label>Security Question</label>
		<input readonly="readonly" type="text" name="securityQuestion" value="<?php echo $securityQuestion;?>"><br>

		<label>Security Answer</label>
		<input readonly="readonly" type="text" name="securityAnswer" value="<?php echo $securityAnswer;?>"><br>

		<input class="create" type="button" onclick="window.location.href='forget2.php';" value="Back"><br><br><br>

		
		<input type="submit" name="update" class="create" value="Update">
		
		<br><br>

	</form>

</body>

</html>
