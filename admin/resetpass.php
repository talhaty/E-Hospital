<?php
	
	session_start();
	if(isset($_SESSION['rollno']))
	{
		echo "";
	}
	else
	{
		header('location:../login.php');
		session_destroy();
	}
?>
<html>
<head>
<title>Hospital Management System</title>
<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
<link type = "text/css" rel = "stylesheet" href = "../css/index.css" />
<style>

</style>
</head>
<body  >
	<div class = "login" align = "center" >
	<h1 style = " font-size : 40px;" >TY HOSPITAL</h1>
	</div>
	<h3 style = "margin-top : -38px; margin-left : 40px; color : #64994f ;" align = "left">
	<?php
		echo "Hi ".$_SESSION['name'];
	?>
	</h3>
	<h2 class = "addpatient" align = "center" style = "font-family : courier; " >Update Your Password</h2>
	<div class = "rpass1" >
	<form action = "resetpass.php" method = "post" >
	<div class = "rpass2" >
	<table align = "center" cellpadding = "8px" cellspacing = "1px">
		<br /><br />
		<tr>
			<td>New Password</td><td><input type = "password" name = "newpass" /></td>
		</tr>
		<tr>
			<td>Confirm Password</td><td><input type = "password" name = "confirm" /></td>
		</tr>
		<tr>
			<td colspan = "2" align = "center" ><input type = "submit" name = "submit" value = "Submit" /></td>
		</tr>
	</table>
	</div>
	</form>
	</div>
</body>
</html>

<?php
	include('../dbcon.php');
	$roll = $_SESSION['rollno'];
	if(isset($_POST['submit']))
	{	
		$newpass = $_POST['newpass'];
		$confirm = $_POST['confirm'];
		
		if($newpass != $confirm)
		{
			?>
			<script>
				alert("New and Confirm passwords are not matched !!!");
				window.open('resetpass.php', '_self');
			</script>
			<?php
		}
		else
		{
			$qry = "UPDATE `admin` SET `password` = '$newpass' WHERE `rollno` = '$roll'";
		
			$run = mysqli_query($con, $qry);
			if($run == True)
			{
				?>
				<script>
					alert("Password updated successfully !!");
					window.open('redirect1.php', '_self');
				</script>
				<?php
			}
			session_destroy();
		}
	}
	
?>
