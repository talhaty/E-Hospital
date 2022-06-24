<?php

	include('../dbcon.php');
		$id = $_GET['pid'];
		$qry = "DELETE FROM `physician` WHERE `id` = '$id';";
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Deleted Successfully !");
				window.open('delphysician.php', '_self');
			</script>
			<?php
		}
?>
