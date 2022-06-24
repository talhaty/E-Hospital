<?php

	include('../dbcon.php');
		
		$name = $_POST['name'];  	$email = $_POST['email'];
		$father = $_POST['father'];		$dob = $_POST['dob'];
		$mstatus = $_POST['mstatus']; 	$sex = $_POST['sex'];  
		$age = $_POST['age'];		 $contact = $_POST['contact'];
		$bgroup = $_POST['bgroup'];		$mother = $_POST['mother'];
		$qualification = $_POST['qualification'];		$hname = $_POST['hname'];
  		$city = $_POST['city'];			$achievement = $_POST['achievement'];
		$phone = $_POST['phone'];		$specialization = $_POST['specialization'];
		$exp = $_POST['exp'];
		
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		$id = $_REQUEST['sid'];

		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "UPDATE `physician` SET `name` = '$name', `mother` = '$mother' , `father` = '$father', `mstatus` = '$mstatus', `hname` = '$hname', `exp` = '$exp', `achievement` = '$achievement', `dob` = '$dob', `age` = '$age', `sex` = '$sex', `specialization` = '$specialization', `qualification` = '$qualification', `bgroup` = '$bgroup', `city` = '$city', `contact` = '$contact', `phone` = '$phone', `email` = '$email', `image` = '$imagename' WHERE `id` = '$id'";
		
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Updated Successfully !");
				window.open('updatephysician.php', '_self');
			</script>
			<?php
		}
		else
		{
			echo "Query not run !";
		}
?>
