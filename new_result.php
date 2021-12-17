<?php
	if(isset($_POST['add'])){
	include('DB.php');
	$studentid=$_POST['Student_ID'];
	$examday=$_POST['exam_day'];
	$resultday=$_POST['result_day'];
	$subject=$_POST['subject'];
	$marks=$_POST['marks'];
	$position=$_POST['position'];
	$pass_Syatus=0;
	$result2=mysqli_query($connection,"select idsubject from subject where subject='$subject'");
	while($sub=mysqli_fetch_assoc($result2)){
		$subject1=$sub['idsubject'];
		}
	if($marks<40){
		$pass_Syatus=0;
	}else{
		$pass_Syatus=1;	
	}
	
  	$query=mysqli_query($connection,"insert into result (marks, examday, resultday, student_idstudent, subject_idsubject, position, pass_status) values ('{$marks}','{$examday}','{$resultday}','{$studentid}','{$subject1}','{$position}','{$pass_Syatus}')");
	header("Location:Add_result.php");
	}else{
	header("Location:Add_result.php");
		}
	?>