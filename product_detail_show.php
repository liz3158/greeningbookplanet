<?php
include ("db_conn.php");


if(isset($_POST["option"])){

    if($_POST["option"]=="display"){
        // $sql = "SELECT * FROM book ";
        // $sql = "SELECT * FROM book where book_id >=".$book_id;
        // $sql = "SELECT * FROM book where book_id ="."12";


        // $sql = "SELECT * FROM book 
        // INNER  JOIN seller 
        // ON book.seller_id = seller.seller_id
        // INNER JOIN category 
        // ON book.category_id = category.category_id
        // INNER JOIN subcategory 
        // ON book.subcategory_id = subcategory.subcategory_id
        // where book_id ="."12";


        $sql = "SELECT * FROM book
        INNER  JOIN seller
        ON book.seller_id = seller.seller_id
        INNER JOIN category
        ON book.category_id = category.category_id
        INNER JOIN subcategory
        ON book.subcategory_id = subcategory.subcategory_id
        where book_id =".$_POST["book_id"];
        $result = mysqli_query($conn,$sql);
        $rows=array();
    
        while($x=mysqli_fetch_assoc($result)){
          $rows[] = $x;
        }
       echo json_encode($rows);
      }

    }
   
?>