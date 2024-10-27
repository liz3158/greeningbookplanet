<?php
include ("config.php");


if(isset($_POST["option"])){

  if($_POST["option"]=="readcategory"){
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn,$sql);
    $rows=array();

    while($x=mysqli_fetch_assoc($result)){
      $rows[] = $x;
    }
   echo json_encode($rows);
  }

  if($_POST["option"]=="readsubcategory"){
    $sql = "SELECT * FROM subcategory";
    $result = mysqli_query($conn,$sql);
    $rows=array();

    while($x=mysqli_fetch_assoc($result)){
      $rows[] = $x;
    }
   echo json_encode($rows);
  }

  if($_POST["option"]=="readcategoryname"){
    $category_id = $_POST["category_id"];
    $sql = "SELECT category_name FROM category where category_id=".$category_id;
    $result = mysqli_query($conn,$sql);
    $rows=array();
    $id = "";
    while($x=mysqli_fetch_assoc($result)){
      $rows[] = $x;
    }
   echo $rows[0]["category_name"];
  }
}


?>