<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['user_email']) && isset($_POST['user_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$user_email = validate($_POST['user_email']);
	$user_password = validate($_POST['user_password']);

	if (empty($user_email)) {
		header("Location: index.php?error=Email Address is required");
	    exit();
	}else if(empty($user_password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM user WHERE user_email='$user_email' AND user_password='$user_password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_email'] === $user_email && $row['user_password'] === $user_password) {
            	$_SESSION['user_email'] = $row['user_email'];
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['user_id'] = $row['user_id'];
            	header("Location: homepage.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect Email or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect Email or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}