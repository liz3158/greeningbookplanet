<?php

include_once 'db_conn.php';

$sql = "DELETE FROM wishlist WHERE wishlist_id='" . $_GET["wishlist_id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location:wishlist.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>