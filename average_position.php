<?php
	session_start();
	include('DB.php');
	$g=0;
	$positotal=0;
	$setid=array();
	$setavermarks=array();
	$currentid='';
	$stuid1=mysqli_real_escape_string($connection,$_SESSION["idstudent"]);
	$result4=mysqli_query($connection,"select * from student");
	$num_rows = mysqli_num_rows($result4);
	while($studentids=mysqli_fetch_assoc($result4)){
			$ideka=$studentids["idstudent"];
			$setid[$g]=$ideka;
			$g++;
			echo($setid[0])." - ".($setid[0]) ;				
	}
	for($i=0;$i<$num_rows;$i++){
		$result5=mysqli_query($connection,"select student_idstudent,marks from result where student_idstudent=$setid[$i]");
		while($studenmarks=mysqli_fetch_assoc($result5)){
			$mar=$studenmarks["marks"];
			$studentidd=$studenmarks["student_idstudent"];
			$positotal=$positotal+$mar;		
			}
			$setavermarks[$setid[$i]]=$positotal;		
			sort($setavermarks);		
	}
	echo($setavermarks['1']);		
?>