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
	<td><input type = "text" name = "name" placeholder = "Enter Patient's Name" required /></td>
	<td><input type = "number" name = "ward_no" placeholder = "Ward Number" required /></td>
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
		
		$name = $_POST['name'];
		$ward_no = $_POST['ward_no'];
		
		$qry = "SELECT * FROM `patient` WHERE `name` LIKE '%$name%' AND `ward_no` = '$ward_no'";
	
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
				$id = $data['id'];
				?>
					<tr align = "center"  style = "background-color : #fae0f9 ;" >
						<td><?php echo "$count"; ?></td>
						<td><img src = "../dataimg/<?php echo $data['image']; ?>" style = "width : 60px; height : 70px; " /></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['fname']; ?></td>
						<td><?php echo $data['ward_no']; ?></td>
						<td><input type = "submit" name = "delete" value = "Delete" />
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>"/> 
					</tr>
					
				<?php
				if ($_POST['delete'] && $_POST['id'])
				{
					if($_POST['delete'] == 'Delete')
					{
						?>
						<script>
						if(confirm('Are You Sure ?') == true)
						{
							</script>
							<?php
							$qry = "DELETE FROM `patient` WHERE `id` = '$id'";
							$run = mysqli_query($con, $qry);
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
							<script>
						}
						else
						{
						
						}
					
				
				</script>
				<?php
					}
				}

			}
		}
	}
?>
</table>
</body>
</html>






