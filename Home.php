<!doctype html>
<html>
<head>
<link href="style_home.css" rel="stylesheet">
<meta charset="utf-8">
<title>Home</title>
<img src="Images/logo.png" width="100" height="100" alt="logo">
<?php
	session_start();
	include('DB.php');
	$username=mysqli_real_escape_string($connection,$_SESSION["username"]);
	$result=mysqli_query($connection,"select * from student where login_username='$username'");
	while($student=mysqli_fetch_assoc($result)){
		$id=$student["idstudent"];
		$name=$student["fname"]." ".$student["mname"]." ".$student["lname"];
		$image=$student["image"];
		$age=$student["age"];
		$DOB=$student["DOB"];
		$adressno=$student["adr_no"];
		$adressstrt=$student["adr_strt"];
		$adresscity=$student["adr_city"];
		$mobile=$student["mobile"];
		$telephone=$student["telephone"];
		$batch=$student["batch_idbatch"];
		$_SESSION["idstudent"]=$id;	
		$_SESSION["batch_idbatch"]=$batch;	
		}
?>
<?php 
	$result2=mysqli_query($connection,"select count(subject) from subject");
	while($complete=mysqli_fetch_row($result2)){
		$count=$complete[0];
	}
?>
<?php
	$result3=mysqli_query($connection,"select count(idresult) from result where student_idstudent='$id' and pass_status='1'");
	while($degreecomplete=mysqli_fetch_row($result3)){
		$count1=$degreecomplete[0];
		$percentage_degree=($count1/$count)*100;
	}
?>
<div id="fixedheader">
<ul>
  <li><a class="active" href="Home.php">Home</a></li>
  <li1><a class="active" href="Home.php">Log Out</a></li1>
</ul>
</div>
</head>
<body>

<div class="center_details">

<img src="<?php echo($image) ?>" alt="1" class="pic-circle-corner">  
<br/>
<p><?php echo($name) ?></p>
<p>
<?php
$result1=mysqli_query($connection,"select * from batch where idbatch='$batch'");
while($batch=mysqli_fetch_assoc($result1)){
	echo($batch["batch"]);
	}
?>
</p>
<p>Age : <?php echo($age) ?></p>
<p>Position : 01</p>

<div class="progressbar_posi">
<p>Degree Complete</p>
<div class="w3-progress-container w3-light-blue">
  <div id="myBar" class="w3-progressbar w3-blue" style="width:20%">
    <div class="w3-center w3-text-white"><?php echo($percentage_degree)."%" ?></div>
  </div>
</div>
</div>
<body onLoad="move()">
<script>
function move() {
  var elem = document.getElementById("myBar");   
  var width = 0;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= <?php  echo($percentage_degree) ?>) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      document.getElementById("demo").innerHTML = width * 1  + '%';
    }
  }
}
</script>
<div class="otherdetails_posi">
<p1>OTHER DETAILS</p1>
<p><?php echo($adressno)?></p>
<p><?php echo($adressstrt)?></p>
<p><?php echo($adresscity)?></p>
<br/>
<p>Mobile:<?php echo($mobile)?></p>
<p>Telephone:<?php echo($telephone)?></p>
<br/>
<p>DOB:<?php echo($DOB)?></p>
</div>

<div class="complete_details">
<p1>CODE INSTITUTE</p1>
<p>SQA Regisered/ Acedemic Year 2016</p>
</div>
<div id="fixedfooter">
&copy; Copy Right
</div>
<div class="home_buttons">

    <input name="View_Result" type="button" value="View Results" onClick="window.location.href='Result.php'">   
    <input name="View_Result" type="button" value="View Top 3 Positions" onClick="window.location.href='position.php'">
  
</div>
</body>
</html>