<?php

	include('../dbcon.php');
		
		$name = $_POST['name'];      $mother = $_POST['mother'];
		$father = $_POST['father'];		$dob = $_POST['dob'];
		$mstatus = $_POST['mstatus'];    $ward_no = $_POST['ward_no'];
		$age = $_POST['age'];			 $contact = $_POST['contact'];
		$bgroup = $_POST['bgroup'];		$qualification = $_POST['qualification'];
		$sex = $_POST['sex'];			$city = $_POST['city'];	
		$hname = $_POST['hname'];		$designation = $_POST['designation'];
		$exp = $_POST['exp'];			$phone = $_POST['phone'];
  		$email = $_POST['email'];	
		
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		$id = $_REQUEST['sid'];

		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "UPDATE `staff` SET `name` = '$name', `father` = '$father', `mother` = '$mother', `mstatus` = '$mstatus', `qualification` = '$qualification', `designation` = '$designation', `dob` = '$dob', `age` = '$age', `hname` = '$hname', `exp` = '$exp', `sex` = '$sex', `bgroup` = '$bgroup', `ward_no` = '$ward_no', `city` = '$city', `contact` = '$contact', `phone` = '$phone', `email` = '$email', `image` = '$imagename' WHERE `id` = '$id'";
		
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Updated Successfully !");
				window.open('updatestaff.php', '_self');
			</script>
			<?php
		}
		else
		{
			echo "Query Not run !";
		}
?>
