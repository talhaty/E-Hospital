<?php

	include('../dbcon.php');
		
		$name = $_POST['name'];      $bed_no = $_POST['bed_no'];
		$fname = $_POST['fname'];		$dob = $_POST['dob'];
		$mstatus = $_POST['mstatus'];    $ward_no = $_POST['ward_no'];
		$age = $_POST['age'];		 $contact = $_POST['contact'];
		$bgroup = $_POST['bgroup'];		$disease = $_POST['disease'];
		$sex = $_POST['sex'];			$city = $_POST['city'];	
		$occupation = $_POST['occupation'];		$consultant = $_POST['consultant'];
  		
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		$id = $_POST['sid'];

		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "UPDATE `patient` SET `name` = '$name', `fname` = '$fname', `mstatus` = '$mstatus', `dob` = '$dob', `age` = '$age', `sex` = '$sex', `bgroup` = '$bgroup', `occupation` = '$occupation', `disease` = '$disease', `consultant` = '$consultant', `bed_no` = '$bed_no', `ward_no` = '$ward_no', `city` = '$city', `contact_no` = '$contact', `image` = '$imagename' WHERE `id` = '$id'";
		
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Updated Successfully !");
				window.open('updatepatient.php', '_self');
			</script>
			<?php
		}
?>
