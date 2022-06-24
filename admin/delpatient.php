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
 
	<div class = "table" >
	<h2 class = "addpatient" align = "center" style = "font-family : courier; " >Delete Patient(s)</h2>
	</div>
	
	<div class = "f1">
	<form method = "post" action = "delpatient.php" >
	<table cellpadding = "7px" cellspacing = "4px" align = "center" >
	<tr>
	<td><input type = "number" name = "id" placeholder = "Enter Patient's ID" required /></td>
	<td><input type = "submit" name = "submit" value = "Search" /></td>
	</tr>
	</table>
	</form>
	</div>
	<?php

	if(isset($_POST['submit']))
	{
		?>	
		<table align = "center" width = "80%" border = "1" cellpadding = "5px" cellspacing = "0px" >
		<tr style = "background-color : #a6cfe7 ; color : white;" >
			<th>No</th>
			<th>Image</th>
			<th>Name</th>
			<th>Father's Name</th>
			<th>Ward No</th>
			<th>Edit</th>
		</tr>
		<?php
		include('../dbcon.php');
		
		$id = $_POST['id'];
		
		$qry = "SELECT * FROM `patient` WHERE `id` = '$id'";
	
		$run = mysqli_query($con, $qry);
		
		if(mysqli_num_rows($run) < 1)
		{
			echo "<tr align = 'center' ><td colspan = '6' >No record found !</td></tr>";
		}
		else
		{
			$count = 0;
			while($data = mysqli_fetch_assoc($run))
			{
				$count++;
				?>
					<tr align = "center"  style = "background-color : #fae0f9 ;" >
						<td><?php echo "$count"; ?></td>
						<td><img src = "../dataimg/<?php echo $data['image']; ?>" style = "width : 60px; height : 70px; " /></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['fname']; ?></td>
						<td><?php echo $data['ward_no']; ?></td>
						<td><a class = "upform" href = "delform_p.php?pid=<?php echo $data['id'];?>" >Delete</a></td>
					</tr>
				
				<?php
			}
		}
	}

?>
	
	</table>
</body>
</html>

