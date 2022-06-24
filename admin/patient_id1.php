<?php
	
	session_start();
	include('../dbcon.php');
	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('../login.php');
	}
?>

<?php
	
	$id = $_REQUEST['reg_id'];
	echo "Patient Reg. ID : ".$id;
?>

<h3 >Click <a href = "addpatient.php" >here</a> to add more patients </h3>

<h3 >Go to <a href = "admindash.php" >dashboard</a></h3>
