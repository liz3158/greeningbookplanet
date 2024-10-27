<?php
include ("db_conn.php");


if(isset($_POST["option"])){

    if($_POST["option"]=="setorder"){
            $user_id = $_POST["user_id"];
            $seller_id = $_POST["seller_id"];
            $payment_method = $_POST["payment_method"];
            $order_date = date("d/m/Y");
            $order_status = "pending";
            $receipt_path = $_POST["receipt_path"];
            $order_id = $_POST["order_id"];
            $book_id = $_POST["book_id"];
            $cart_id = $_POST["cart_id"];
            $shippingPrice = getshippingprice($seller_id,$user_id);
         
            $sql2 = "INSERT INTO orders(user_id, seller_id, book_id,payment_method,order_date, shippingPrice,order_status, receipt_path) VALUES('$user_id', '$seller_id', '$book_id',  '$payment_method',now(),'$shippingPrice',  '$order_status', '$receipt_path')";
            $result1 = mysqli_query($conn, $sql2);
           $sql2 = "DELETE FROM cart WHERE cart_id=".$cart_id.";";
           $result2 = mysqli_query($conn, $sql2);
           if ($result1) {
            $order_id = $conn->insert_id;
           	    echo $order_id ;
                 
           }else {
	           	echo "fail";
           }
		
    }
    if($_POST["option"]=="uploadReceiptPayment"){
        uploadReceiptPayment();
    }
    if($_POST["option"]=="getshippingprice"){
        $seller_id = $_POST["seller_id"];
        $user_id = $_POST["user_id"];
        echo getshippingprice($seller_id,$user_id);
    }
 
}
function uploadReceiptPayment(){
    global $conn;
   
        $receipt = $_POST["receipt"];
        $receiptdata = $_POST["receiptdata"];
    

        $full_file_path = getcwd()."/images/receipt/".$receipt;
        base64_to_jpeg($receiptdata,$full_file_path) ;
      
}
function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}

function getshippingprice($seller_id,$user_id){
    global $conn;
    $is_seller_from_west = false;
    $is_customer_from_west = false;

    $sql = "SELECT * FROM user where user_id =".$user_id;
    $result = mysqli_query($conn,$sql);
    $east = array("sabah","sarawak");
    while($x=mysqli_fetch_assoc($result)){
      $user_state = strtolower($x["user_state"]) ;
     
     if(in_array($user_state,$east)==false){
         $is_customer_from_west = true;
     }
      
    }
    $sql = "SELECT * FROM seller where seller_id =".$seller_id;
    $result = mysqli_query($conn,$sql);
   
    while($x=mysqli_fetch_assoc($result)){
      $seller_state = strtolower($x["seller_state"]) ;
     
     if(in_array($seller_state,$east)==false){
         $is_seller_from_west = true;
     }
      
    }
    $shippingPrice = 0.0;
    if($is_customer_from_west==$is_seller_from_west){ // if both is same. then rate of rm7. if both user and seller come from different east and west then rm 10
        $shippingPrice = 7.0;
    }else{
        $shippingPrice = 10.0;

    }
    return $shippingPrice;
}
?>