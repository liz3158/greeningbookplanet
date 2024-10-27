<?php 
session_start(); 
include "connection.php";

if (isset($_POST['seller_email']) && isset($_POST['seller_password'])
    && isset($_POST['seller_name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$seller_email = validate($_POST['seller_email']);
	$seller_password = validate($_POST['seller_password']);
	$re_pass = validate($_POST['re_password']);
	$seller_name = validate($_POST['seller_name']);
    $seller_contactno = validate($_POST['seller_contactno']);
	$seller_bank_acc = validate($_POST['seller_bank_acc']);
	$seller_bank_name = validate($_POST['seller_bank_name']);
	$seller_address = validate($_POST['seller_address']);
	$seller_state = validate($_POST['seller_state']);
	$seller_city = validate($_POST['seller_city']);
	$seller_zipcode = validate($_POST['seller_zipcode']);
	$seller_security_question = validate($_POST['seller_security_question']);
	$seller_security_answer = validate($_POST['seller_security_answer']);


	$user_data = 'seller_email='. $seller_email. '&seller_name='. $seller_name;


	if (empty($seller_email)) {
		header("Location: signup.php?error=Email Address is required&$user_data");
	    exit();
	}else if(empty($seller_password)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($seller_name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

    else if(empty($seller_contactno)){
        header("Location: signup.php?error=Phone Number is required&$user_data");
	    exit();
	}

	else if(empty($seller_bank_acc)){
        header("Location: signup.php?error=Bank Account Number is required&$user_data");
	    exit();
	}

	else if(empty($seller_bank_name)){
        header("Location: signup.php?error=Bank Account Name is required&$user_data");
	    exit();
	}

	else if(empty($seller_security_question)){
        header("Location: signup.php?error=Security question is required&$user_data");
	    exit();
	}

	else if(empty($seller_security_answer)){
        header("Location: signup.php?error=Security answer is required&$user_data");
	    exit();
	}

	else if(empty($seller_address)){
        header("Location: signup.php?error=Address is required&$user_data");
	    exit();
	}

	else if(empty($seller_state)){
        header("Location: signup.php?error=State is required&$user_data");
	    exit();
	}

	else if(empty($seller_city)){
        header("Location: signup.php?error=City is required&$user_data");
	    exit();
	}

	else if(empty($seller_zipcode)){
        header("Location: signup.php?error=Zip code is required&$user_data");
	    exit();
	}

	else if($seller_password !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        // $password = md5($password);

	    $sql = "SELECT * FROM seller WHERE seller_email='$seller_email' ";
		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The email is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO seller(seller_name, seller_contactno, seller_email, seller_password, seller_bank_acc, seller_bank_name,seller_security_question,seller_security_answer, seller_address, seller_state, seller_city, seller_zipcode) VALUES('$seller_name', '$seller_contactno', '$seller_email', '$seller_password', '$seller_bank_acc', '$seller_bank_name','$seller_security_question','$seller_security_answer', '$seller_address', '$seller_state', '$seller_city', '$seller_zipcode' )";
           $result2 = mysqli_query($connect, $sql2);
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