<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

    include "db_conn.php";

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
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT user_password
                FROM user WHERE 
                user_id='$user_id' AND user_password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE user SET user_password='$np' WHERE user_id='$user_id'";
        	mysqli_query($conn, $sql_2);
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