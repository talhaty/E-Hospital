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
	<h2 class = "addpatient" align = "center" style = "font-family : courier; " >Delete Physician(s)</h2>
	</div>
	
	<div class = "f1">
	<form method = "post" action = "delphysician.php" >
	<table cellpadding = "7px" cellspacing = "4px" align = "center">
	<tr>
	<td><input type = "text" name = "name" placeholder = "Enter Physician's Name" required /></td>
	<td>
	<select name = "specialization"  required >
				<option value="">---Please Select---</option>
				<option value="Allergist">Allergist</option>
				<option value="Cardiologist">Cardiologist</option>
				<option value="Dentist">Dentist</option>
				<option value="Dermatologist">Dermatologist</option>
				<option value="ENT Specialist">ENT Specialist</option>
				<option value="Neurosurgeon">Neurosurgeon</option>
				<option value="Physiologist">Physiologist</option>
				<option value="Plastic Surgeon">Plastic Surgeon</option>
	</select>
	</td>
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
			<th>S.No.</th>
			<th>Reg.ID</th>
			<th>Image</th>
			<th>Name</th>
			<th>Father's Name</th>
			<th>Specialization</th>
			<th>Action</th>
		</tr>
		<?php
		include('../dbcon.php');
		
		$name = $_POST['name'];
		$specialization = $_POST['specialization'];
		
		$qry = "SELECT * FROM `physician` WHERE `name` LIKE '%$name%' AND `specialization` = '$specialization'";
	
		$run = mysqli_query($con, $qry);
		if($run == False)
		{
			echo "Query not run !";
		}
		
		if(mysqli_num_rows($run) < 1)
		{
			echo "<tr align = 'center' ><td colspan = '7' >No record found !</td></tr>";
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
						<td><?php echo $data['id']; ?></td>
						<td><img src = "../dataimg/<?php echo $data['image']; ?>" style = "width : 60px; height : 70px; " /></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['father']; ?></td>
						<td><?php echo $data['specialization']; ?></td>
						<td><a class = "upform" href = "delform_ph.php?pid=<?php echo $data['id'];?>" >Delete</a></td>
					</tr>
				
				<?php
			}
		}
	}

?>
	</table>
</body>
</html>

