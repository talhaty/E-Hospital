<?php

	session_start();
	
	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location:../login.php');
	}
?>

<?php
	include('header.php');
	include('titlehead.php');
?>
	<h3 style = "margin-top : -45px; margin-left : 40px; " align = "left"><a class = "a3link" title = "Go back to reset your Username or Password !" href = "addmin1.php">Back</a></h3>
	<br />
	<h2 class = "addpatient" align = "center" >Admin Registration Form</h2>
	<div class = "adtable1" >
	<form action = "addmin2.php" method = "post" enctype = "multipart/form-data" >
	<div class = "adtable2" >
	<table border = "1" width = "50%" align = "center" cellpadding = "6px" cellspacing = "0px" bgcolor = " #aeb2e5 " style = "margin-top : -20px;">
		<tr>
			<td align = "center" >First Name</td> <td><input type = "text" name = "fname" style = " width : 80%; " placeholder = "First Name" required /></td>
		</tr>
		<tr>
			<td align = "center" >Last Name</td> <td><input type = "text" name = "lname" style = " width : 80%; " placeholder = "Last Name" /></td>
		</tr>
		<tr>
			<td align = "center" >College Id</td> <td><input type = "text" name = "rollno" style = " width : 80%; " placeholder = "Your Unique College Id" required /></td>
		</tr>
		<tr>
			<td align = "center" >Sex</td> <td> <input type="radio" name="sex" value="Male" required> Male <input type="radio" name="sex" value="Female" required> Female </td>
		</tr>
		<tr>
			<td align = "center" >Security Question</td> 
			<td><select name = "question" style = " width : 80%; " required >
				<option value = "">---Please Select---</option>
				<option value = "My favorite high school teacher ?">My favorite high school teacher ?</option>
				<option value = "My favorite sport game ?">My favorite sport game ?</option>
				<option value = "My favorite animal ?">My favorite animal ?</option>
				<option value = "My best friend ?">My best friend ?</option>
				<option value = "Where was you born ?">Where was you born ?</option>
				<option value = "My favorite car ?">My favorite car ?</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align = "center" >Your Answer</td> <td><input type = "text" name = "qans" style = " width : 80%; " placeholder = "Type Here" required /></td>
		</tr>
		<tr>
			<td align = "center" >Contact</td> <td><input type = "text" name = "contact" style = " width : 80%; " placeholder = "Mobile Number" required /></td>
		</tr>
		<tr>
			<td align = "center" >Email</td> <td><input type = "email" name = "email" style = " width : 80%; " placeholder = "xyz@example.com" required /></td>
		</tr>
		<tr>
			<td align = "center" >Image</td> <td><input type = "file" name = "image" required /></td>
		</tr>
		<tr>
			<td colspan = "2"><input style = "margin-left : 225px;" type = "reset" name = "reset" value = "Reset" /><input style = "margin-left : 5px;" type = "submit" name = "submit" value = "Submit" /></td>
		</tr>
	</table>
	</div>
	</form>
	</div>
	
</body>
</html>

<?php
	
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
			
		$username = $_SESSION['username'];  $password = $_SESSION['password']; 	
		$fname = $_POST['fname'];  $lname = $_POST['lname'];
		$rollno = $_POST['rollno'];  $sex = $_POST['sex'];
		$question = $_POST['question'];		$qans = $_POST['qans']; 
		$contact = $_POST['contact'];  	$email = $_POST['email'];
		
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "INSERT INTO `admin`(`username`, `password`, `fname`, `lname`, `sex`, `question`, `qans`, `rollno`, `contact`, `email`, `image`) VALUES ('$username', '$password', '$fname', '$lname', '$sex', '$question', '$qans', '$rollno', '$contact', '$email', '$imagename');";
		
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Inserted Successfully !");
				window.open('redirect2.php', '_self');
			</script>
			<?php
		}
	}
?>
		

