<?php
//1. Create a database connection
$dbhost="localhost";
$dbuser="root";
$dbpass="123";
$dbname="project";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	if(!$connection){
		die("not connect");
		}
	
?>