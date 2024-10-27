<?php
session_start();
include "db_conn.php";

if (isset($_POST['user_email']) && isset($_POST['user_password'])
    && isset($_POST['user_name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$user_email = validate($_POST['user_email']);
	$user_password = validate($_POST['user_password']);
	$re_pass = validate($_POST['re_password']);
	$user_name = validate($_POST['user_name']);
    $user_contactno = validate($_POST['user_contactno']);
	$user_address = validate($_POST['user_address']);
	$user_state = validate($_POST['user_state']);
	$user_city = validate($_POST['user_city']);
	$user_zipcode = validate($_POST['user_zipcode']);
	$securityQuestion = validate($_POST['securityQuestion']);
	$securityAnswer = validate($_POST['securityAnswer']);


	$user_data = 'user_email='. $user_email. '&user_name='. $user_name;


	if (empty($user_email)) {
		header("Location: signup.php?error=Email Address is required&$user_data");
	    exit();
	}else if(empty($user_password)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($user_name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if(empty($user_contactno)){
        header("Location: signup.php?error=Phone Number is required&$user_data");
	    exit();
	}

    else if(empty($user_address)){
        header("Location: signup.php?error=Address is required&$user_data");
	    exit();
	}

	else if(empty($user_state)){
        header("Location: signup.php?error=State is required&$user_data");
	    exit();
	}

	else if(empty($user_city)){
        header("Location: signup.php?error=City is required&$user_data");
	    exit();
	}

	else if(empty($user_zipcode)){
        header("Location: signup.php?error=Zip code is required&$user_data");
	    exit();
	}

	else if(empty($securityQuestion)){
        header("Location: signup.php?error=Security question is required&$user_data");
	    exit();
	}

	else if(empty($securityAnswer)){
        header("Location: signup.php?error=Security answer is required&$user_data");
	    exit();
	}

	else if($user_password !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        // $password = md5($password);

	    $sql = "SELECT * FROM user WHERE user_email='$user_email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The email is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO user(user_name, user_contactno, user_email, user_password, user_address, user_state, user_city, user_zipcode, securityQuestion, securityAnswer) VALUES('$user_name', '$user_contactno', '$user_email', '$user_password', '$user_address', '$user_state', '$user_city', '$user_zipcode', '$securityQuestion', '$securityAnswer' )";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}