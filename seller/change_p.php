<?php 
session_start();

if (isset($_SESSION['seller_id']) && isset($_SESSION['seller_email'])) {

    include "connection.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: change_password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change_password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change_password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	// $op = md5($op);
    	// $np = md5($np);
        $seller_id = $_SESSION['seller_id'];

        $sql = "SELECT seller_password
                FROM seller WHERE 
                seller_id='$seller_id' AND seller_password='$op'";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE seller
        	          SET seller_password='$np'
        	          WHERE seller_id='$seller_id'";
        	mysqli_query($connect, $sql_2);
        	header("Location: change_password.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: change_password.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: change_password.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}