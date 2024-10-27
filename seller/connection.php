<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "db_bookplanet";

$connect = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$connect) {
	echo "Connection failed!";
}

