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
	<h2 class = "addpatient" align = "center" style = "font-family : courier; " >Update Physician(s)</h2>
	</div>
	
	<div class = "f1">
	<form method = "post" action = "updatephysician.php" >
	<table cellpadding = "7px" cellspacing = "4px" align = "center" >
	<tr>
	<td><input type = "text" name = "name" placeholder = "Enter Doctor's Name" required /></td> 
	<td><select name = "specialization" style = "width : 100%; " required >
				<option value="">- - -Please Select- - -</option>
				<option value="allergist">Allergist</option>
				<option value="cardiologist">Cardiologist</option>
				<option value="dentist">Dentist</option>
				<option value="dermatologist">Dermatologist</option>
				<option value="ent">ENT Specialist</option>
				<option value="neurosurgeon">Neurosurgeon</option>
				<option value="physiologist">Physiologist</option>
				<option value="plastic_sur">Plastic Surgeon</option>
			    </select></td>
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
			<th>Physician ID</th>
			<th>Full Name</th>
			<th>Designation</th>
			<th>Edit</th>
		</tr>
		<?php
		
		include('../dbcon.php');
		
		$name = $_POST['name'];
		$specialization = $_POST['specialization'];
		
		$qry = "SELECT * FROM `physician` WHERE `name` LIKE '%$name%' AND `specialization` = '$specialization'";
	
		$run = mysqli_query($con, $qry);
		
		if(mysqli_num_rows($run) < 1)
		{
			echo "<tr align = 'center' ><td colspan = '6' >No records found !</td></tr>";
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
						<td><?php echo $data['id']; ?></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['specialization']; ?></td>
						<td><a class = "upform" href = "updateform_ph.php?sid=<?php echo $data['id'];?>" >Edit</a></td>
					</tr>
				
				<?php
			}
		}
	}
	
	?>
	</table>
</body>
</html>

