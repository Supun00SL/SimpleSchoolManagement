<!doctype html>
<html>
<head>
<link href="style_home.css" rel="stylesheet">
<meta charset="utf-8">
<title>Student Registration</title>
<?php $image1="add_img\business_user.png"; ?>
<?php
	include('DB.php');
	$result_max_id=mysqli_query($connection,"select max(idstudent) from student");
		while($max=mysqli_fetch_row($result_max_id)){
			$maxid=$max[0]+1;
			if(strlen($maxid)==1){
				$maxid = "000".($maxid);
			}else if(strlen($maxid)==2){
				$maxid = "00".($maxid);
			}
			else if(strlen($maxid)==3){
				$maxid = "0".($maxid);
			}
		}
?>
<script>
function image(){
	<?php
session_start();
$target_dir = "add_img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$_SESSION['directory'] = $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			saveUser();
		 	saveStudent();
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
?>
	document.getElementById("imageid").src=<?php session_start(); echo($_SESSION['directory']) ?>; 
	}
function saveUser(){
	<?php
		$usname=$_POST['username1'];
		$password=$_POST['password'];
		$utype='client';
		$query_usersave=mysqli_query($connection,"insert into login values ('{$usname}','{$password}','{$utype}')");	
	?>
	
	}
	
function saveStudent(){
	<?php
		$id1=$_POST['id'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$lname=$_POST['lname'];
		$no=$_POST['no'];
		$street=$_POST['street'];
		$city=$_POST['city'];
		$DOB=$_POST['DOB'];
		$age=$_POST['age'];
		$mobile=$_POST['mobile'];
		$telephone=$_POST['telephone'];
		$batch=$_POST['batch'];
		$usname=$_POST['username1'];
		$batch_result1=mysqli_query($connection,"select idbatch from batch where batch='$batch'");
			while($ba=mysqli_fetch_assoc($batch_result1)){
			$batch1=$ba["idbatch"];
			}
		$query_save=mysqli_query($connection,"insert into student values ('{$id1}','{$fname}','{$mname}','{$lname}','{$no}','{$street}','{$city}','{$mobile}','{$telephone}','{$DOB}','{$age}','{$batch1}','{$usname}','{$_SESSION['directory']}')");
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
<form name="add_student" id="add_student" method="post" >
<div class="center_details_add_student_1">
		<p>Student ID:</p><input type="text" name="id" placeholder="Student ID" value="<?php echo($maxid)?>">
		<p>First Name:</p><input type="text" name="fname" placeholder="First Name" >
		<p>Middle Name:</p><input type="text" name="mname" placeholder="Middle Name">
		<p>Last Name:</p><input type="text" name="lname" placeholder="Last Name">
     	<p>Date of Birth:</p><input type="date" name="DOB" >
        <p>Age:</p><input type="text" name="age" placeholder="Age">
</div>
<div class="center_details_add_student_2">
		<p>No:</p><input type="text" name="no" placeholder="No">
		<p>Street:</p><input type="text" name="street" placeholder="Street"> 
		<p>City:</p><input type="text" name="city" placeholder="City">
		<p>Mobile:</p><input type="text" name="mobile" placeholder="Mobile">
        <p>Telephone:</p><input type="text" name="telephone" placeholder="Telephone">
</div> 
<div class="center_details_add_student_3">
		<p>Batch:</p>
		<select name="batch" id="batch">
		  <?php
	$result=mysqli_query($connection,"select * from batch");
	while($bat=mysqli_fetch_assoc($result)){
		$batch=$bat["batch"];
		?>
		<option><?php echo($batch) ?></option>
     <?php   
		}
	?>
    	</select>
    	<p>Username:</p><input type="text" name="username1" placeholder="Username">
    	<p>Password:</p><input type="password" name="password" placeholder="Password">
        <button type="button" id="eye" onclick="if(password.type=='text')password.type='password'; else password.type='text';">
    Show
</button>
        <br/>
        <input name="genarate" type="button" value="Genarate Username &amp; Password" style="margin-top:10px;">
</div>
<div class="center_details_add_student_4">
		<img src="<?php echo($image1) ?>" alt="1" class="pic-circle-corner" id="imageid"> <br/>
		<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<div class="center_details_add_student_5">
		<input type="submit" name="Save"  value="Save" onClick="image();">
</div>
</form>
<!--<form  method="post" enctype="multipart/form-data" id="form_img" >
<div class="center_details_add_student_4">
		<img src="" alt="1" class="pic-circle-corner" id="imageid"> <br/>
		<input type="file" name="fileToUpload" id="fileToUpload">
    	<input name="Submit" type="submit" value="Upload Image"  onClick="
        image();
        ">
</div>
</form>-->
<div id="fixedfooter">
&copy; Copy Right
</div>
</body>
</html>