<?php
include ("connection.php");

$sql = "SELECT * FROM request_list";
$result = mysqli_query($connect,$sql);
$rows=array();

while($r=mysqli_fetch_assoc($result)){
  $rows[]=$r;
}

echo json_encode($rows);
 

?>