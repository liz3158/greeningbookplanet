<?php

include_once 'config.php';

$sql = "DELETE FROM seller WHERE seller_id='" . $_GET["seller_id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location:admin_seller.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>