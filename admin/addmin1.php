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
	<h3 style = "margin-top : -45px; margin-left : 40px; " align = "left"><a class = "a3link" title = "Back to Dashboard !" href = "admindash.php">Back</a></h3>
	<br />
	<h2 class = "addpatient" align = "center" >Admin Registration Form</h2>
	<div class = "rpass1" >
	<form action = "addmin1.php" method = "post" enctype = "multipart/form-data" >
	<div class = "rpass2" >
	<table align = "center" cellpadding = "8px" cellspacing = "1px" style = "margin-top : -20px;">
		<tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr /><tr />
		<tr>
			<td>Username</td> <td><input type = "text" name = "username" style = " width : 100%; " placeholder = "Your Username" required/></td>
		</tr>
		<tr>
		<td>Password</td> <td><input type = "password" name = "password" style = " width : 100%; " placeholder = "Your Password" required/></td>
		</tr>
		<tr>
		<td>Confirm Password</td> <td><input type = "password" name = "confirm" style = " width : 100%; " placeholder = "Confirm Password" required/></td>
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
	
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		
		if($password != $confirm)
		{
			?>
				<script>
					alert('Your passwords are not matched !');
					window.open('addmin1.php', '_self');
				</script>
			<?php
			}
		else
		{
			$qry = "SELECT `username` FROM `admin` WHERE `username` = '$username'";
			
			$run = mysqli_query($con, $qry);
		
			if(mysqli_num_rows($run) >= 1)
			{
				?>
				<script>
					alert('Please choose another Username !');
					window.open('addmin1.php', '_self');
				</script>
				<?php
			}
			else
			{
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				?>
				<script>
					alert('Congrats ! Username & Passowrd accepted !');
					window.open('addmin2.php', '_self');
				</script>
				<?php
			}	
		}
	}
?>
