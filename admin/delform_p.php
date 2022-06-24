<?php

	include('../dbcon.php');
		$id = $_GET['pid'];
		$current_status = "Discharged";
		$discharge_date = date("Y-m-d");
		$qry = "DELETE FROM `patient` WHERE `id` = '$id';";
		$qry2 = "UPDATE `patient` SET `discharge_date` = '$discharge_date' WHERE `id` = '$id';";
		$qry3 = "UPDATE `patient_history` SET `discharge_date` = '$discharge_date', `current_status` = '$current_status' WHERE `id` = '$id';";
		$run = mysqli_query($con, $qry);
		$run2 = mysqli_query($con, $qry2);
		$run3 = mysqli_query($con, $qry3);
		if($run == True)
		{
			?>
			<script>
				alert("Data Deleted Successfully !");
				window.open('delpatient.php', '_self');
			</script>
			<?php
		}
?>
