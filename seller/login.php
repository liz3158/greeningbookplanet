<?php
session_start();
include "connection.php";

if (isset($_POST['seller_email']) && isset($_POST['seller_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$seller_email = validate($_POST['seller_email']);
	$seller_password = validate($_POST['seller_password']);

	if (empty($seller_email)) {
		header("Location: index.php?error=Email Address is required");
	    exit();
	}else if(empty($seller_password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM seller WHERE seller_email='$seller_email' AND seller_password='$seller_password'";

		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['seller_email'] === $seller_email && $row['seller_password'] === $seller_password) {
            	$_SESSION['seller_email'] = $row['seller_email'];
            	$_SESSION['seller_name'] = $row['seller_name'];
            	$_SESSION['seller_id'] = $row['seller_id'];
            	header("Location: today_order.php");
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