<?php

include_once 'config.php';

$sql = "DELETE FROM subcategory WHERE subcategory_id='" . $_GET["subcategory_id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location:create_sub_category.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>