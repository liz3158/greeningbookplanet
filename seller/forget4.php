<?php

include("connection.php");

$seller_email =$_REQUEST['seller_email'];
$query ="SELECT * FROM seller WHERE seller_email= '$seller_email'";
$result = mysqli_query($connect , $query) or die ;
$row = mysqli_fetch_assoc($result);

?>
<?php

if(isset($_POST['update']))
{

$seller_email =$_POST['seller_email'];
$seller_name =$_POST['seller_name'];
$seller_contactno =$_POST['seller_contactno'];
$seller_password =$_POST['seller_password'];
$seller_security_question =$_POST['seller_security_question'];
$seller_security_answer =$_POST['seller_security_answer'];
  
    $query1 ="UPDATE seller SET seller_email='$seller_email', seller_name='$seller_name', seller_contactno='$seller_contactno', seller_password='$seller_password', seller_security_question='$seller_security_question', seller_security_answer='$seller_security_answer' WHERE seller_email='$seller_email' ";
   
   
     $result1 = mysqli_query($connect, $query1) or die;
     
     
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
	<title>seller FORGOT PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="favicon" href="images/favicon.ico">
</head>

<body>
	<form action="forget4.php" method="post">

		<h2>seller FORGOT PASSWORD</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email Address</label>
		<input type="text" name="seller_email" readonly="readonly" value="<?php echo $row['seller_email']; ?>"><br>

		<label>Name</label>
		<input type="text" name="seller_name" required="required" value="<?php echo $row['seller_name']; ?>"><br>

		<label>Phone Number</label>
		<input type="text" name="seller_contactno" required="required" value="<?php echo $row['seller_contactno']; ?>"><br>

		<label>Password</label>
		<input type="password" name="seller_password" required="required" value="<?php echo $row['seller_password']; ?>"><br>

		<label>Security Question</label>
		<form method="post">
			<select required="required" name="seller_security_question" value="<?php echo $row['seller_security_answer']; ?>" >
			<option selected="">Choose Question</option>
			<option>What is your nickname?</option>
			</select>
		</form>

		<label>Security Answer</label>
		<input type="text" name="seller_security_answer" required="required" value="<?php echo $row['seller_security_answer']; ?>"><br>


		<br><br><br>
		<button type="submit" name="update" class="ca">Update</button><br><br>

	</form>

</body>

</html>