<?php

include_once 'config.php';

$sql = "DELETE FROM user WHERE user_id='" . $_GET["user_id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location:admin_user.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>