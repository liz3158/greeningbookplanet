<?php
include ("db_conn.php");


if(isset($_POST["option"])){

    if($_POST["option"]=="display_wishlist"){
      $sql = "SELECT * FROM wishlist 
      INNER  JOIN book 
      ON wishlist.book_id = book.book_id
      where user_id =".$_POST['user_id'];

        $result = mysqli_query($conn,$sql);
        $rows=array();
    
        while($x=mysqli_fetch_assoc($result)){
          $rows[] = $x;
        }
       echo json_encode($rows);
      }
    }
    

  
?>