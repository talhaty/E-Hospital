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
	include('../dbcon.php');
?>


<table align = "center" width = "80%" border = "1" cellpadding = "5px" cellspacing = "0px" >
		<tr style = "background-color : black; color : white;" >
            <th>No</th>
            <th>ID</th>
			<th>Name</th>
            <th>age</th>
            <th>sex</th>
            <th>bgroup</th>
            <th>disease</th>
            <th>consultant</th>
            <th>bed#</th>
            <th>ward#</th>
            <th>admit-date</th>
            <th>Contact</th>
            <th>City</th>
		</tr>
		<?php
			$qry = "SELECT * FROM `patient`";
			$run = mysqli_query($con, $qry);
		
		if(mysqli_num_rows($run) < 1)
		{
			echo "<tr align = 'center' ><td colspan = '5' >No Records !</td></tr>";
		}
		else
		{
			$count = 0;
			while($data = mysqli_fetch_assoc($run))
			{
				$count++;
				?>
					<tr align = "center"  style = "background-color :darkslategray ; color:white;" >
						<td><?php echo "$count"; ?></td>
						<td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['name']; ?></td>
						<td><?php echo $data['age']; ?></td>
						<td><?php echo $data['sex']; ?></td>
						<td><?php echo $data['bgroup']; ?></td>
                        <td><?php echo $data['disease']; ?></td>
                        <td><?php echo $data['consultant']; ?></td>
                        <td><?php echo $data['bed_no']; ?></td>
                        <td><?php echo $data['ward_no']; ?></td>
                        <td><?php echo $data['admit_date']; ?></td>
                        <td><?php echo $data['contact_no']; ?></td>
                        <td><?php echo $data['city']; ?></td>
					</tr>
				
				<?php
			}
		}
		?>
	
	</table>