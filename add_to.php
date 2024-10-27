<?php
include ("db_conn.php");
if(isset($_POST["option"])){
        if($_POST["option"]=="add_to_cart"){
            $book_id= $_POST['book_id'];
            $user_id=$_POST['user_id'];
            $seller_id=$_POST['seller_id'];
            $add=TRUE;
            
        $sql_find_done_cart_id="SELECT * FROM cart where user_id =".$_POST['user_id'];    
        
        $sql = "INSERT INTO cart (book_id,user_id,seller_id) VALUES (
          '$book_id'
          ,'$user_id'
          ,'$seller_id'
          )";
        

        $result = mysqli_query($conn,$sql_find_done_cart_id);
        $rows=array();

        
        while($x=mysqli_fetch_assoc($result)){
          // $rows[] = $x;
          // echo $x["book_id"];
          // echo count($x);
          
          
          if($book_id == $x["book_id"]){
                $add=FALSE;
                echo("You have added this product");
                break;
              }
              else{
                $add=TRUE;
              }
            }
            
            if($add==TRUE){
                                //执行SQL命令（添加数据）  
                              if(mysqli_query($conn, $sql)){
                                          
                                echo "Successfully added to cart";
                            
                              } else{
                                //echo "<script>alert('ERROR: Hush! Sorry $sql. mysqli_error($conn);');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
                                echo "ERROR: Hush! Sorry $sql. " 
                                    . mysqli_error($conn);
                              }
                          }
        }
        
        
        if($_POST["option"]=="add_to_wishlist"){
          $book_id= $_POST['book_id'];
          $user_id=$_POST['user_id'];
          $seller_id=$_POST['seller_id'];
          $add=TRUE;

          $sql_find_done_wishlist_id="SELECT * FROM wishlist where user_id =".$_POST['user_id'];

          $sql = "INSERT INTO wishlist (book_id,user_id) VALUES (
            '$book_id'
            ,'$user_id'
            )";

          $result = mysqli_query($conn,$sql_find_done_wishlist_id);
          $rows=array();  

          while($x=mysqli_fetch_assoc($result)){
            // $rows[] = $x;
            // echo $x["book_id"];
            // echo count($x);
            
            
            if($book_id == $x["book_id"]){
                  $add=FALSE;
                  echo("You have added this product");
                  break;
                }
                else{
                  $add=TRUE;
                }
              }
              
              if($add==TRUE){  

                //执行SQL命令（添加数据）  
                if(mysqli_query($conn, $sql)){
                            
                  echo "Successfully added to wishlist";

                } else{
                  //echo "<script>alert('ERROR: Hush! Sorry $sql. mysqli_error($conn);');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
                  echo "ERROR: Hush! Sorry $sql. " 
                      . mysqli_error($conn);
                }
              }
          }
}


?>