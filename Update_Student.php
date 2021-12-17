<!doctype html>
<html>
<head>
<link href="style_home.css" rel="stylesheet">
<meta charset="utf-8">
<title>Student Registration</title>
<?php 
			$image1="add_img\business_user.png";
			$id1="";
			$fname="";
			$mname="";
			$lname="";
			$no="";
			$street="";
			$city="";
			$DOB="";
			$age="";
			$mobile="";
			$telephone="";
			$usname="";
			$batch1="";


 ?>
<script>
function searchStudent(){
	<?php
		session_start();
		include('DB.php');
		$getid=$_POST['id'];
		$sturesult1=mysqli_query($connection,"select * from student where idstudent='$getid'");
			while($student=mysqli_fetch_assoc($sturesult1)){
			
			$id1=$student['idstudent'];
			$fname=$student['fname'];
			$mname=$student['mname'];
			$lname=$student['lname'];
			$no=$student['adr_no'];
			$street=$student['adr_strt'];
			$city=$student['adr_city'];
			$DOB=$student['DOB'];
			$age=$student['age'];
			$mobile=$student['mobile'];
			$telephone=$student['telephone'];
			$batch=$student['batch_idbatch'];
			$usname=$student['login_username'];
			$image1=$student['image'];
			$batch_result1=mysqli_query($connection,"select batch from batch where idbatch='$batch'");
				while($ba=mysqli_fetch_assoc($batch_result1)){
				$batch1=$ba["batch"];
				}		
			}	
	?>
	
	}
</script>
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
</head>
<body>
<form name="search_student" id="search_student" method="post">
<div class="center_details_add_student_1">
		<p>Student ID:</p><input type="text" name="id" placeholder="Student ID" value="<?php echo($id1) ?>">
		<p>First Name:</p><input type="text" name="fname1" placeholder="First Name" value="<?php echo($fname) ?>" >
		<p>Middle Name:</p><input type="text" name="mname1" placeholder="Middle Name" value="<?php echo($mname) ?>">
		<p>Last Name:</p><input type="text" name="lname1" placeholder="Last Name" value="<?php echo($lname) ?>">
     	<p>Date of Birth:</p><input type="date" name="DOB1" value="<?php echo($DOB) ?>">
        <p>Age:</p><input type="text" name="age1" placeholder="Age" value="<?php echo($age) ?>">
</div>
<div class="center_details_add_student_2">
		<p>No:</p><input type="text" name="no1" placeholder="No" value="<?php echo($no) ?>">
		<p>Street:</p><input type="text" name="street1" placeholder="Street" value="<?php echo($street) ?>"> 
		<p>City:</p><input type="text" name="city1" placeholder="City" value="<?php echo($city) ?>">
		<p>Mobile:</p><input type="text" name="mobile1" placeholder="Mobile" value="<?php echo($mobile) ?>">
        <p>Telephone:</p><input type="text" name="telephone1" placeholder="Telephone" value="<?php echo($telephone) ?>">
</div> 
<div class="center_details_add_student_3">
		<p>Batch:</p><input type="text" name="batch1" placeholder="Batch" value="<?php echo($batch1) ?>">
    	<p>Username:</p><input type="text" name="username1" placeholder="Username" value="<?php echo($usname) ?>">
</div>
<div class="center_details_add_student_4">
		<img src="<?php echo($image1) ?>" alt="1" class="pic-circle-corner" id="imageid"> <br/>
</div>
<div class="center_details_add_student_5">
<input type="submit" name="go_button" id= "go_button1" value="Go" onClick="searchStudent();" >
</div>
</form>
<div id="fixedfooter">
&copy; Copy Right
</div>
</body>
</html>