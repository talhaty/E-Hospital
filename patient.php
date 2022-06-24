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
      <a class="nav-item nav-link active" href="patient.php">Patient Details <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="physician.php">Physicians</a>
      <a class="nav-item nav-link" href="staff.php">Staff Members</a>
	  <a class="nav-item nav-link" href="login.php">Admin Login</a>
    </div>
  </div>
</nav>
<div class="alert alert-success" role="alert">
  Want to become Admin? Registrations are open. Click <a href = "admin_request.php" class = "request" >here</a>
</div>







<form method = "post" action = "patient.php" >
<input type = "number" name = "reg_no" style = "width : 20%; margin-left : 38%;" placeholder = "Enter Patient's Registration No." required />
<input type = "submit" name = "submit" value = "Search" />
</form>
	<?php	
		if(isset($_POST['submit']))
		{
			include('dbcon.php');
			
			$reg_no = $_POST['reg_no'];
			
			$qry = "SELECT * FROM `patient_history` WHERE `id` = '$reg_no';";
			$run = mysqli_query($con, $qry);
			$rows = mysqli_num_rows($run);
			if($rows < 1)
			{
				?>
					<script>
						alert("Unauthorized Patient Reg. Id !");
						window.open('patient.php', '_self');
					</script>
				<?php
			}
			$data = mysqli_fetch_assoc($run);
			if($run == True)
			{
				?>
				<div class = "details text-light" >
				<img alt = "Image Not Available" src = "<?php echo "dataimg/".$data['image']; ?>"  width="240px" height="280px" style="margin-left:60px; margin-top : 25px; "  />
				<h3 style = "margin-left:400px; margin-top:-280px;">Registration Id : <?php echo $data['id'];?> </h3>
				<h3 style = "margin-left:400px; " >Name : <?php echo $data['name'];?></h3>
				<h3 style = "margin-left:400px; " >Mother's Name : <?php echo $data['mname'];?></h3>
				<h3 style = "margin-left:400px; " >Father's Name : <?php echo $data['fname'];?></h3>
				<h3 style = "margin-left:400px; " >Age : <?php echo $data['age'];?></h3>
				<h3 style = "margin-left:400px; " >Admit Date : <?php echo $data['admit_date'];?></h3>
				<h3 style = "margin-left:400px; " >Discharge Date : <?php echo $data['discharge_date'];?></h3>
				<h3 style = "margin-left:800px; margin-top:-285px;" >City : <?php echo $data['city'];?></h3>
				<h3 style = "margin-left:800px; " >Bed No : <?php echo $data['bed_no'];?></h3>
				<h3 style = "margin-left:800px; " >Ward No : <?php echo $data['ward_no'];?></h3>
				<h3 style = "margin-left:800px; " >Disease : <?php echo $data['disease'];?></h3>
				<h3 style = "margin-left:800px; " >Consultant : <?php echo $data['consultant'];?></h3>
				<h3 style = "margin-left:800px; " >Current Status : </h3>
				<h3 style = "margin-left:1040px; margin-top : -41px; color : red;" ><?php echo $data['current_status'];?></h3>
				</div>
				<?php
			}
		}
	?>
