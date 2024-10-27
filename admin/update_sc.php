<?php

include_once 'config.php';

    $subcategory_id = $_POST['subcategory_id'];
    $category_id = $_POST['category_id'];
    $subcategory_name = $_POST['subcategory_name'];

    $query = mysqli_query($conn, "UPDATE subcategory set category_id='$category_id',subcategory_name='$subcategory_name' where subcategory_id='$subcategory_id'");
    if ($query) {
        echo "<script>alert('Category has been updated');</script>";
        header("Location: create_sub_category.php?subcategory_id=".$subcategory_id);
    }
    else {
        echo "<script>alert('Category has not been updated');</script>";
        header("Location: action_subcategory.php?subcategory_id=".$subcategory_id);
    }


?>