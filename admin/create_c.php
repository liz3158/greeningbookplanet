<?php
include ("config.php");

$sql = "SELECT * FROM category";
$result = mysqli_query($conn,$sql);
$rows=array();

while($r=mysqli_fetch_assoc($result)){
  $rows[]=$r;
}

echo json_encode($rows);


?>