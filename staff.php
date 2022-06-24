<html>
<head>
<title>Hospital Management System</title>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link type = "text/css" rel = "stylesheet" href = "css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="patient.php">Patient Details <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="physician.php">Physicians</a>
      <a class="nav-item nav-link active" href="staff.php">Staff Members</a>
	  <a class="nav-item nav-link" href="login.php">Admin Login</a>
    </div>
  </div>
</nav>
<div class="alert alert-success" role="alert">
  Want to become Admin? Registrations are open. Click <a href = "admin_request.php" class = "request" >here</a>
</div>

<table align = "center" width = "80%" border = "1" cellpadding = "5px" cellspacing = "0px" >
		<tr style = "background-color : black; color : white;" >
			<th>No</th>
			<th>Image</th>
			<th>Name</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Designation</th>
			<th>Contact number</th>
		</tr>
		<?php
			include('dbcon.php');
			$qry = "SELECT * FROM `staff`";
			$run = mysqli_query($con, $qry);
		
		if(mysqli_num_rows($run) < 1)
		{
			echo "<tr align = 'center' ><td colspan = '7' >No Records !</td></tr>";
		}
		else
		{
			$count = 0;
			while($data = mysqli_fetch_assoc($run))
			{
				$count++;
				?>
					<tr align = "center"  style = "background-color :  darkslategray ; color:white" >
						<td><?php echo "$count"; ?></td>
						<td><img src = "dataimg/<?php echo $data['image']; ?>" style = "width : 50px; height : 60px; " /></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['age']; ?></td>
						<td><?php echo $data['sex']; ?></td>
						<td><?php echo $data['designation']; ?></td>
						<td><?php echo $data['contact']; ?></td>
					</tr>
				
				<?php
			}
		}
		?>
	
	</table>
</body>
</html>


