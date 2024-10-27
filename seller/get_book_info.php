<?php
include ("connection.php");


if(isset($_POST["option"])){

  if($_POST["option"]=="getbookinfo"){
    $sql = "SELECT * FROM book where book_id = ".$_POST["book_id"];
    $result = mysqli_query($connect,$sql);
    $rows=array();

    while($x=mysqli_fetch_assoc($result)){
      $rows[] = $x;
    }
   echo json_encode($rows);
  }
}

?>