<?php
	
	session_start();
	
	if(isset($_SESSION['uid']))
	{
		echo "";
	}
?>

<?php
	include('header.php');
	include('titlehead.php');
?>
<h3 style = "margin-top : -40px; margin-left : 40px; " align = "left">
<a class = "alink" title = "Click to add new Admin!" href = "addmin1.php">Add New Admin</a>
</h3>
<h3 style = "margin-top : -140px; margin-right : 40px; " align = "right">
<a class = "alink" title = "Back to admin Dashboard" href = "admindash.php">Back</a>
</h3>

<h2 style = "margin-top : 140px; margin-left : 40px; color : white;" >Admin Requests</h2>

<?php
	include('../dbcon.php');
?>
<table align = "center" width = "80%" border = "1" cellpadding = "5px" cellspacing = "0px" >
		<tr style = "background-color : #a6cfe7 ; color : white;" >
			<th>Sr.No.</th>
			<th>Image</th>
			<th>Reg. Id</th>
			<th>Name</th>
			<th>Contact</th>
			<th>Email</th>
		</tr>
		<?php
		
		
		$qry = "SELECT * FROM `admin_request` WHERE 1";
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
						<td><?php echo $data['contact']; ?></td>
						<td><?php echo $data['email']; ?></td>
					</tr>
				
				<?php
			}
		}

?>
	
	</table>

