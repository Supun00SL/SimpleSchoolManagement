<?php
session_start();
include('DB.php');
$uname=mysqli_real_escape_string($connection,$_POST['username']);
$pwrd=mysqli_real_escape_string($connection,$_POST['passwrd']);
$attempts=0;
$fetch=mysqli_query($connection,"SELECT username FROM login WHERE username='$uname' and password='$pwrd' and usertype='admin'");
    $count=mysqli_num_rows($fetch);
if($attempts<3){
if($count!=""){
	$_SESSION['username'] = $_POST['username'];
	header("Location:Register_Student.php");
	}else if($count==""){
	header("Location:admin_login.php");
	$attempts++;
		}
}else if($attempts>=3){
	
	}
?>
