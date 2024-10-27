<?php

include_once 'config.php';

$sql = "DELETE FROM category WHERE category_id='" . $_GET["category_id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location:create_category.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>