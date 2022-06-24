<?php

	include('../dbcon.php');
		$id = $_GET['sid'];
		$qry = "DELETE FROM `staff` WHERE `id` = '$id';";
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Deleted Successfully !");
				window.open('delstaff.php', '_self');
			</script>
			<?php
		}
?>
