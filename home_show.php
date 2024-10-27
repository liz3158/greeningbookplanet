<?php
include ("db_conn.php");


if(isset($_POST["option"])){

    if($_POST["option"]=="display"){
        $sql = "SELECT * FROM book";
        $result = mysqli_query($conn,$sql);
        $rows=array();
    
        while($x=mysqli_fetch_assoc($result)){
          $book_status = $x["book_status"];
          if($book_status=="onShop"){
          $rows[] = $x;
          }
        }
       echo json_encode($rows);
      }

      // if($_POST["option"]=="display"){
      //   $sql = "SELECT * FROM book";
      //   $result = mysqli_query($conn,$sql);
      //   $rows=array();
    
      //   while($x=mysqli_fetch_assoc($result)){
      //     $rows[] = $x;
      //   }
      //  echo json_encode($rows);
      // }

      if($_POST["option"]=="display_one"){
        $category_id = $_POST["category_id"];
        $sql = "SELECT * FROM book where category_id=".$category_id;
        $result = mysqli_query($conn,$sql);
        $rows=array();
    
        while($x=mysqli_fetch_assoc($result)){
          $book_status = $x["book_status"];
          if($book_status=="onShop"){
          $rows[] = $x;
          }
        }
       echo json_encode($rows);
      }

      if($_POST["option"]=="display_two"){
        $category_id = $_POST["category_id"];
        $sql = "SELECT * FROM book where category_id=".$category_id;
        $result = mysqli_query($conn,$sql);
        $rows=array();
    
        while($x=mysqli_fetch_assoc($result)){
          $book_status = $x["book_status"];
          if($book_status=="onShop"){
          $rows[] = $x;
        }
      }
       echo json_encode($rows);
      }

      if($_POST["option"]=="display_three"){
        $category_id = $_POST["category_id"];
        $sql = "SELECT * FROM book where category_id=".$category_id;
        $result = mysqli_query($conn,$sql);
        $rows=array();
    
        while($x=mysqli_fetch_assoc($result)){
          $book_status = $x["book_status"];
          if($book_status=="onShop"){
          $rows[] = $x;
        }
      }
       echo json_encode($rows);
      }

      if($_POST["option"]=="display_four"){
        $category_id = $_POST["category_id"];
        $category_id_2 = $_POST["category_id_2"];
        $category_id_3 = $_POST["category_id_3"];
        $sql = "SELECT * FROM book where category_id >=".$category_id;
        $result = mysqli_query($conn,$sql);
        $rows=array();
    
        while($x=mysqli_fetch_assoc($result)){
          $book_status = $x["book_status"];
          if($book_status=="onShop"){
          $rows[] = $x;
        }
      }
       echo json_encode($rows);
      }

    }
    

  
?>