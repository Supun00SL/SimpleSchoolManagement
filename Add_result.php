<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Code Institute</title>
<link href="style_home.css" rel="stylesheet">
</head>
<img src="Images/logo.png" width="100" height="100" alt="logo" style="position:fixed">
<br/>
<div id="fixedheader">
<ul>
  <li><a class="active" href="Register_Student.php">Add New Student</a></li>
  <li><a href="Update_Student.php">View Student </a></li>
  <li><a href="Add_result.php">Add Result</a></li>
  <li1><a href="">Log Out</a></li1>
</ul>
</div>
	<?php
	//include('new_result.php');
	$image1="add_img\business_user.png";
	?>
<body>
<form name="add_result" id="add_result" method="post" action="new_result.php">
  <div class="addresult_1">
  <p>Student ID:</p>
  <select name="Student_ID" id="Student_ID">
  	<?php
	include('DB.php');
	//$result=mysql_query("select idstudent from student");
  	$result=mysqli_query($connection,"select idstudent from student");
		while($id=mysqli_fetch_assoc($result)){
  	?>
	  <option><?php echo($id['idstudent'])?></option>
      <?php
		}
	  ?>
  </select>
  </div>
  <div class="result_student">
  	<img src="<?php echo($image1) ?>" alt="1" class="pic-circle-corner">
  	<p>Name:  </p>
    <p>Batch:  </p>
  </div><br>
  <div class="addresult_2">
	<p>Exam Day:  </p><input name="exam_day" type="date">
    <p>Result Day:  </p><input name="result_day" type="date">
    <p>Subject:  </p>
    <select name="subject" id="subject">
  	<?php
	include('DB.php');
  	$result1=mysqli_query($connection,"select subject from subject");
		while($subject=mysqli_fetch_assoc($result1)){
  	?>
	  <option><?php echo($subject['subject'])?></option>
      <?php
		}
	  ?>
  </select>
  <p>Marks:  </p><input name="marks" type="text">
  <p>Position:  </p><input name="position" type="text">
  </div>
  <div class="addresult_3">
  <input name="add" type="submit" value="Add Details">
  </div>
</form>
<div id="fixedfooter">
&copy; Copy Right
</div>
</body>
</html>
