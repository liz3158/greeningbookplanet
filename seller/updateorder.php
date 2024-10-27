<?php
session_start();
include ("db_conn.php");

if (isset($_SESSION['seller_id']) && isset($_SESSION['seller_email'])) {
    echo "here";
    $order_id = $_GET['orderid'];
    $action = $_GET['action'];
    $status = "";
    if($action=="confirmorder"){
        $status = "orderconfirmed"; 
    }
    if($action=="delivery"){
        $status = "delivery"; 
    }
    
    $sql2 = "UPDATE orders SET order_status = '".$status."'  WHERE order_id = ".$order_id.";";
    $result1 = mysqli_query($conn, $sql2);
    echo "<script>location.href = 'today_order.php';</script>";
}
?>