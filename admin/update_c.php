<?php

include_once 'config.php';

    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    $query = mysqli_query($conn, "UPDATE category set category_name='$category_name',category_description='$category_description' where category_id='$category_id'");
    if ($query) {
        echo "<script>alert('Category has been updated');</script>";
        header("Location: create_category.php?category_id=".$category_id);
    }
    else {
        echo "<script>alert('Category has not been updated');</script>";
        header("Location: action_category.php?category_id=".$category_id);
    }


?>