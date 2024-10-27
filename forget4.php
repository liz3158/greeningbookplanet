<?php

include("db_conn.php");

$user_email =$_REQUEST['user_email'];
$query ="SELECT * FROM user WHERE user_email= '$user_email'";
$result = mysqli_query($conn , $query) or die ;
$row = mysqli_fetch_assoc($result);

?>
<?php

if(isset($_POST['update']))
{

$user_email =$_POST['user_email'];
$user_name =$_POST['user_name'];
$user_contactno =$_POST['user_contactno'];
$user_password =$_POST['user_password'];
$securityQuestion =$_POST['securityQuestion'];
$securityAnswer =$_POST['securityAnswer'];
  
    $query1 ="UPDATE user SET user_email='$user_email', user_name='$user_name', user_contactno='$user_contactno', user_password='$user_password', securityQuestion='$securityQuestion', securityAnswer='$securityAnswer' WHERE user_email='$user_email' ";
   
   
     $result1 = mysqli_query($conn, $query1) or die;
     
     
if($result1)
  {
       //data berjaya masuk
        echo "<script>alert('Data updated.');
        window.location='index.php'</script>";
         }
    
         else
         {
        //data gagal masuk
        echo 'Sorry, there are trouble when updating the data!';
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
	<form action="forget4.php" method="post">

		<h2>USER FORGOT PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address</label>
		<input type="text" name="user_email" readonly="readonly" value="<?php echo $row['user_email']; ?>"><br>

		<label>Name</label>
		<input type="text" name="user_name" required="required" value="<?php echo $row['user_name']; ?>"><br>

		<label>Phone Number</label>
		<input type="text" name="user_contactno" required="required" value="<?php echo $row['user_contactno']; ?>"><br>

		<label>Password</label>
		<input type="password" name="user_password" required="required" value="<?php echo $row['user_password']; ?>"><br>

		<label>Security Question</label>
		<form method="post">
			<select required="required" name="securityQuestion" value="<?php echo $row['securityAnswer']; ?>">
			<option selected="">Choose Question</option>
			<option>What is your nickname?</option>
			</select>
		</form>

		<label>Security Answer</label>
		<input type="text" name="securityAnswer" required="required" value="<?php echo $row['securityAnswer']; ?>"><br>


		<br><br><br>
		<button type="submit" name="update" class="ca">Update</button><br><br>

	</form>

</body>

</html>