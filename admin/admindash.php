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
	<h3 style = "margin-top : -40px; margin-left : 40px; " align = "left">
	<a class = "alink" title = "Click to add new Admin!" href = "addmin1.php">Add New Admin</a>
	</h3>
	<a class = "a1" href = "addpatient.php">Add Patient</a>
	<a class = "a2" href = "updatepatient.php">Update Patient</a><br />
	<a class = "a3" href = "delpatient.php">Delete Patient</a>
	<a class = "a4" href = "addphysician.php">Add Physician</a>
	<a class = "a5" href = "updatephysician.php">Update Physician</a>
	<a class = "a6" href = "delphysician.php">Delete Physician</a>
	<a class = "a7" href = "addstaff.php">Add Staff</a><br />
	<a class = "a8" href = "updatestaff.php">Update Staff</a>
	<a class = "a9" href = "delstaff.php">Delete Staff</a>
	<a class = "a10" href = "viewpatient.php">View All Patients</a>
	

<?php		
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$rollno = $_SESSION['rollno'];
		$image = $_SESSION['image'];
?>
	
	<div class = "profile" >
	<table align = "left" cellpadding = "8px" cellspacing = "1px" >
	<tr>
		<td><img src = "<?php echo "../dataimg/$image";?>" height = "270px" width = "239px" /></td>
	</tr>
	<tr>
		<td align = "center" ><h2 style = "font-family : courier; color : #8c5c2f ; margin-top : -10px;" ><?php echo $fname; echo " $lname"; ?></h2></td>
	</tr>
	<tr>
		<td align = "center" ><h3 style = "font-family : courier; color : #40a4d0 ; margin-top : -35px;" ><?php echo $rollno; ?></h3></td>
	</tr>
	</table>
	</div>
	<h3 style = "margin-top : 30px;  margin-left:80px;" >
	<a class = "noti" title = "Notifications" href = "notification.php" >Notifications</a>
	</h3>
	
</body>
</html>
