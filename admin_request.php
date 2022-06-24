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
      <a class="nav-item nav-link" href="staff.php">Staff Members</a>
	  <a class="nav-item nav-link active" href="login.php">Admin Login</a>
    </div>
  </div>
</nav>
<div class="alert alert-success" role="alert">
  Want to become Admin? Registrations are open. Click <a href = "admin_request.php" class = "request" >here</a>
</div>
<br><br>
<form action = "admin_request.php" method = "post" enctype = "multipart/form-data" >
	<table border = "1" width = "50%" align = "center" cellpadding = "6px" cellspacing = "0px" style = "margin-top : -20px; background-color:darkslategray; color:white">
		<tr>
			<td align = "center" >Full Name</td> <td><input type = "text" name = "name" style = "width : 53%; " placeholder = "Full Name" required /></td>
		</tr>
		<tr>
			<td align = "center" >Father's Name</td> <td><input type = "text" name = "father" style = "width : 53%; " placeholder = "Father's Name" required /></td>
		</tr>
		<tr>
			<td align = "center" >Sex</td> <td> <input type="radio" name="sex" value="Male" required > Male <input type="radio" name="sex" value="Female" > Female </td>
		</tr>
		<tr>
			<td align = "center" >D.O.B.</td> <td><input type = "date" name = "dob" style = "width : 53%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Educational Qualification</td> <td><textarea rows="3" cols="30" name="qualification"  placeholder = "Write here..." required >
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >Why you want to be Admin ?</td> <td><textarea rows="3" cols="30" name="reason"  placeholder = "Write here..." required >
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >City</td> <td><input type = "text" name = "city" style = "width : 53%; " placeholder = "Residential City" required /></td>
		</tr>
		<tr>
			<td align = "center" >Contact</td> <td><input type = "text" name = "contact" style = "width : 53%; "  placeholder = "Phone Number" required /></td>
		</tr>
		<tr>
			<td align = "center" >Email</td> <td><input type = "email" name = "email" style = "width : 53%; "  placeholder = "xyz@example.com" required /></td>
		</tr>
		<tr>
			<td align = "center" >Image</td> <td><input type = "file" name = "image" /></td>
		</tr>
		<tr>
			<td colspan = "2"><input style = "margin-left : 225px;" type = "reset" name = "reset" value = "Reset" /><input style = "margin-left : 5px;" type = "submit" name = "submit" value = "Submit" /></td>
		</tr>
		
	</table>
	</form>
	
</body>
</html>


<?php
	
	if(isset($_POST['submit']))
	{
		include('dbcon.php');
		if($con == False)
		{
			echo "Not connect";
		}
		
		$name = $_POST['name'];    
        $father = $_POST['father']; 			 $contact = $_POST['contact'];
		$sex = $_POST['sex'];		
		$dob = $_POST['dob']; 
		$reason = $_POST['reason'];   
		$qualification = $_POST['qualification'];  
		$city = $_POST['city'];
		$email = $_POST['email'];
		
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($tempname, "dataimg/$imagename");
		
		$qry = "INSERT INTO `admin_request`(`name`, `father`, `sex`, `dob`, `edu_qulification`, `reason`, `city`, `contact`, `email`, `image`)
				VALUES ('$name', '$father', '$sex', '$dob', '$qualification', '$reason', '$city', '$contact', '$email', '$imagename')";
		
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Inserted Successfully !");
			</script>
			<?php
		}
		
	}
?>

