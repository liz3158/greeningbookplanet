<?php
include ("db_conn.php");
if($_POST["option"]=="getbookname"){
    getbookname();
      
}
if($_POST["option"]=="getbookprice"){
    getbookprice();
      
}

if($_POST["option"]=="getshippingprice"){
    shippingprice();
      
}
if($_POST["option"]=="orderstatus"){
    orderstatus();
      
}
if($_POST["option"]=="userid"){
    getuserid();
      
} 
if($_POST["option"]=="receiveorder"){
    receiveorder();
      
} 
// orderstatus userid receiveorder
function receiveorder(){
    global $conn;
    $order_id = $_POST['order_id'];
    $book_id = $_POST['book_id'];
    $sql2 = "UPDATE orders SET order_status = 'received',admin_bank_in_status='pending'  WHERE order_id = ".$order_id.";";
    $sql3 = "UPDATE book SET book_status = 'selled'  WHERE book_id = ".$book_id.";";
    $result1 = mysqli_query($conn, $sql2);
    $result2 = mysqli_query($conn, $sql3);
    if (($result1==true)&&($result2==true)) {
        echo "ok";
    }else{
        echo "err";
    }
}

function getuserid(){
    global $conn;
    $sql = "SELECT * FROM orders where order_id =".$_POST['order_id'];

    $result = mysqli_query($conn,$sql);

    while($x=mysqli_fetch_assoc($result)){
      $user_id = $x["user_id"];
      echo $user_id;
      
    }
}


function orderstatus(){
    global $conn;
    $sql = "SELECT * FROM orders where order_id =".$_POST['order_id'];

    $result = mysqli_query($conn,$sql);

    while($x=mysqli_fetch_assoc($result)){
      $order_status = $x["order_status"];
      echo $order_status;
      
    }
}



function getbookname(){
    global $conn;
    $sql = "SELECT * FROM orders where order_id =".$_POST['order_id'];

    $result = mysqli_query($conn,$sql);

    while($x=mysqli_fetch_assoc($result)){
      $book_id = $x["book_id"];
      $sql2 = "SELECT * FROM book where book_id =".$book_id;

      $result2 = mysqli_query($conn,$sql2);

      while($y=mysqli_fetch_assoc($result2)){
            echo $y["book_name"];
      }
    }
}

function getbookprice(){
    global $conn;
    $sql = "SELECT * FROM orders where order_id =".$_POST['order_id'];

    $result = mysqli_query($conn,$sql);

    while($x=mysqli_fetch_assoc($result)){
      $book_id = $x["book_id"];
      $sql2 = "SELECT * FROM book where book_id =".$book_id;

      $result2 = mysqli_query($conn,$sql2);

      while($y=mysqli_fetch_assoc($result2)){
            echo $y["book_price"];
      }
    }
}
function shippingprice(){
    global $conn;
    $sql = "SELECT * FROM orders where order_id =".$_POST['order_id'];

    $result = mysqli_query($conn,$sql);

    while($x=mysqli_fetch_assoc($result)){
      $shippingPrice = $x["shippingPrice"];
      echo $shippingPrice;
      
    }
}
?>