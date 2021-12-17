<!doctype html>
<html>
<head>
<link href="style_home.css" rel="stylesheet">
<meta charset="utf-8">
<title>Position</title>
<?php 
	$userselect="";
	$image1="add_img\business_user.png";
	$age1="Age";
	$name1="Name";
	$batch1="Batch";
	$marks="00";

 ?>
<img src="Images/logo.png" width="100" height="100" alt="logo">
<div id="fixedheader">
<ul>
  <li><a class="active" href="Home.php">Home</a></li>
  <li1><a href="">Log Out </a></li1>
</ul>
</div>
</head>
<body>
<div class="selectsubject">
<P>Select the Subject:</P>
<form name="form" id="form" method="post" >
  <select name="jumpMenu" id="jumpMenu">
  	<?php
    include('DB.php');
	$result9=mysqli_query($connection,"select * from subject");
	while($subj0=mysqli_fetch_assoc($result9)){
		$subject=$subj0["subject"];
		?>
		<option><?php echo($subject) ?></option>
     <?php   
		}
	?> 
    
  </select>
  <input type="submit" name="go_button" id= "go_button" value="Go" >
 
</form>
</div>
<div class="center_details2">
<?php
	if(is_null($userselect)){
		
		}
	else{
	include('DB.php');
	include('getvalue_4rmcombo.php');
	$result6=mysqli_query($connection,"select * from subject where subject='$userselect'");
	while($subjj=mysqli_fetch_assoc($result6)){
		$suu=$subjj["idsubject"];
	$result7=mysqli_query($connection,"select * from result where position='1' and subject_idsubject='$suu'");
	while($place=mysqli_fetch_assoc($result7)){
		$firstplaceid=$place["student_idstudent"];
		$marks=$place["marks"];
	$result8=mysqli_query($connection,"select * from student where idstudent='$firstplaceid'");
	while($placeeka=mysqli_fetch_assoc($result8)){
		$id1=$placeeka["idstudent"];
		$name1=$placeeka["fname"]." ".$placeeka["mname"]." ".$placeeka["lname"];
		$image1=$placeeka["image"];
		$age1=$placeeka["age"];
		$batch1=$placeeka["batch_idbatch"];	
		}
	}
	}
	}
?>
<img src="<?php echo($image1) ?>" alt="1" class="pic-circle-corner">  
<br/>
<p><?php echo($name1) ?></p>
<p>
<?php
$result1=mysqli_query($connection,"select * from batch where idbatch='$batch1'");
while($batch1=mysqli_fetch_assoc($result1)){
	echo($batch1["batch"]);
	}
?>
</p>
<p>Marks : <?php echo($marks) ?></p>

<div id="fixedfooter">
&copy; Copy Right
</div>
</div>


<div class="center_details3">
<?php
	include('DB.php');
	include('getvalue_4rmcombo.php');
	$result6=mysqli_query($connection,"select * from subject where subject='$userselect'");
	while($subjj=mysqli_fetch_assoc($result6)){
		$suu=$subjj["idsubject"];
	$result7=mysqli_query($connection,"select * from result where position='2' and subject_idsubject='$suu'");
	while($place=mysqli_fetch_assoc($result7)){
		$firstplaceid=$place["student_idstudent"];
		$marks=$place["marks"];
	$result8=mysqli_query($connection,"select * from student where idstudent='$firstplaceid'");
	while($placeeka=mysqli_fetch_assoc($result8)){
		$id1=$placeeka["idstudent"];
		$name1=$placeeka["fname"]." ".$placeeka["mname"]." ".$placeeka["lname"];
		$image1=$placeeka["image"];
		$age1=$placeeka["age"];
		$batch1=$placeeka["batch_idbatch"];	
		}
	}
	}
	
?>
<img src="<?php echo($image1) ?>" alt="1" class="pic-circle-corner">  
<br/>
<p><?php echo($name1) ?></p>
<p>
<?php
$result1=mysqli_query($connection,"select * from batch where idbatch='$batch1'");
while($batch1=mysqli_fetch_assoc($result1)){
	echo($batch1["batch"]);
	}
?>
</p>
<p>Marks : <?php echo($marks) ?></p>

</div>


<div class="center_details4">
<?php
	include('DB.php');
	include('getvalue_4rmcombo.php');
	$result6=mysqli_query($connection,"select * from subject where subject='$userselect'");
	while($subjj=mysqli_fetch_assoc($result6)){
		$suu=$subjj["idsubject"];
	$result7=mysqli_query($connection,"select * from result where position='3' and subject_idsubject='$suu'");
	while($place=mysqli_fetch_assoc($result7)){
		$firstplaceid=$place["student_idstudent"];
		$marks=$place["marks"];
	$result8=mysqli_query($connection,"select * from student where idstudent='$firstplaceid'");
	while($placeeka=mysqli_fetch_assoc($result8)){
		$id1=$placeeka["idstudent"];
		$name1=$placeeka["fname"]." ".$placeeka["mname"]." ".$placeeka["lname"];
		$image1=$placeeka["image"];
		$age1=$placeeka["age"];
		$batch1=$placeeka["batch_idbatch"];	
		}
	}
	}
	
?>
<img src="<?php echo($image1) ?>" alt="1" class="pic-circle-corner">  
<br/>
<p><?php echo($name1) ?></p>
<p>
<?php
$result1=mysqli_query($connection,"select * from batch where idbatch='$batch1'");
while($batch1=mysqli_fetch_assoc($result1)){
	echo($batch1["batch"]);
	}
?>
</p>
<p>Marks : <?php echo($marks) ?></p>
</div>
<div class="subjecteka">
<p>Subject: <?php echo($userselect) ?></p>
</div>
</body>
</html>