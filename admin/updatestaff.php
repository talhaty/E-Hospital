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
	<h3 style = "margin-top : -45px; margin-left : 40px; " align = "left">
	<a class = "a3link" title = "Back to Dashboard !" href = "admindash.php">Back</a>
	</h3>
 
	<div class = "table" >
	<h2 class = "addpatient" align = "center" style = "font-family : courier; " >Update Staff</h2>
	</div>
	
	<div class = "f1">
	<form method = "post" action = "updatestaff.php" >
	<table cellpadding = "7px" cellspacing = "4px" align = "center" >
	<tr>
	<td><input type = "text" name = "name" placeholder = "Enter Employee's Name" required = "required" /></td> 
	<td><select name = "designation" style = "width : 100%; " required >
				<option value="">- - -Designation- - -</option>
				<option value="Nurse">Nurse</option>
				<option value="Compounder">Compounder</option>
				<option value="Sweaper">Sweaper</option>
				<option value="Ward Boy">Ward Boy</option>
				<option value="Receptionist">Receptionist</option>
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
			<th>Sr.No.</th>
			<th>Image</th>
			<th>Reg.No.</th>
			<th>Name</th>
			<th>Father's Name</th>
			<th>Designation</th>
			<th>Edit</th>
		</tr>
		<?php
		include('../dbcon.php');
		
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		
		$qry = "SELECT * FROM `staff` WHERE `name` LIKE '%$name%' AND `designation` = '$designation'";
	
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
						<td><?php echo $data['id']; ?></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['father']; ?></td>
						<td><?php echo $data['designation']; ?></td>
						<td><a class = "upform" href = "updateform_s.php?sid=<?php echo $data['id'];?>" >Edit</a></td>
					</tr>
				
				<?php
			}
		}
	}

?>
	
	</table>

</body>
</html>

