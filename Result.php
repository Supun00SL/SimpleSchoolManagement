<!doctype html>
<html>
<head>
<link href="style_home.css" rel="stylesheet">
<meta charset="utf-8">
<title>Result</title>
<img src="Images/logo.png" width="100" height="100" alt="logo">
<div id="fixedheader">
<ul>
  <li><a class="active" href="Home.php">Home</a></li>
  <li1><a href="">Log Out </a></li1>
</ul>
</div>
</head>
<body>
<div class="tablescroll">
<table width=100% border=0>
  <tr>
    <th scope="col"><p1>Exam Date</p1></th>
    <th scope="col"><p1>Subject</p1></th>
    <th scope="col"><p1>Position</p1></th>
    <th scope="col"><p1>Marks</p1></th>   
  </tr>
  <?php
  	session_start();
	include('DB.php');
	$total=0;
	$stuid=mysqli_real_escape_string($connection,$_SESSION["idstudent"]);
	$result1=mysqli_query($connection,"select * from result where student_idstudent='$stuid'");
	$num_rows = mysqli_num_rows($result1);
	while($results=mysqli_fetch_assoc($result1)){
			$marks=$results["marks"];	
			$examday=$results["examday"];
			$resultday=$results["resultday"];
			$subject=$results["subject_idsubject"];
			$position=$results["position"];
			
			$total=$total+$marks;
			$subjresult=mysqli_query($connection,"select subject from subject where idsubject='$subject'");
			while($subj=mysqli_fetch_assoc($subjresult)){
				$su=$subj["subject"];
				}
			
  ?>
  <tr>
    <td><?php echo($examday); ?></td>
    <td><?php echo($su); ?></td>
    <td><?php echo($position); ?></td>
    <td><?php echo($marks); ?></td>
  </tr>
  <?php } ?>
</table>

</div>
<div class="center_details1">
<div id="star-six">
</div>
<p>Subject: <?php echo($su)?></p>
<p>Exam Date: <?php echo($examday)?></p>
<p>Result Date: <?php echo($resultday)?></p>
<div id="fixedfooter">
&copy; Copy Right
</div>
</div>
<div class="setmarks"> <p><?php echo($marks)."%"?></p></div>
<div class="setpositionposi"> <p>Position:<?php echo "- ".($position) ?></p></div>
<div class="markshead">
<p>Marks Archieved</p>
</div>
<div class="New">
<p>New!!!</p>
</div>
<div class="Aver">
<?php $averagemarks=$total/$num_rows;
 ?>
<p>Average marks:  <?php echo($averagemarks) ?> </p>
<p>Comment: <?php 
if(0<=$averagemarks&&$averagemarks<=35){
	echo('You Have to Improve');
}else if(35<$averagemarks&&$averagemarks<=65){
	echo('You Have to Improve some');
}else if(65<$averagemarks&&$averagemarks<=75){
	echo('Good');
	}else{
	echo('Very Good');	
		}
 ?> </p>
</div>
</body>
</html>