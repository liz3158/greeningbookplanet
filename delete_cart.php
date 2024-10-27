<?php

include_once 'db_conn.php';

$sql = "DELETE FROM cart WHERE cart_id='" . $_GET["cart_id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location:mycart.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>