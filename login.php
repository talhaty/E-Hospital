<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		header('location:admin/admindash.php');
	}
?>

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



	<div class = "t1" >
	<form action = "login.php" method = "post" >
	<div class = "t2" >
	<table align = "center" cellpadding = "11px" cellspacing = "2px">	
	<tr>
	<div class = "sign">
	<td style = " font-size : 30px; color :white; ">Sign In</td>
	</div>
	</tr>
	<div class = "uandP">
	<tr>
	<td><img src = "images/admin.png" width = "245px" height = "185px"  style = " margin-left : 65px; " /></td>
	</tr>
	<tr>
	<td><input type = "text" name = "uname" style = " width : 125%; height : 40px; " placeholder = "Username" required /></td>
	</tr></br >
	<tr>
	<td><input type = "password" name = "pass" style = " width : 125%; height : 40px; " placeholder = "Password" /></td>
	</tr><br />
	<tr>
	<td align = "center" ><input type = "submit" name = "login" value = "LOG IN" style = " width : 125%; height : 40px; border: none;
	outline: none; padding: 10px 20px; border-radius: 50px; color: #333; background: #fff; margin-bottom: 50px; box-shadow: 0 3px 20px 0 #0000003b;cursor: pointer;" /></td>
	</tr>
	<tr>
	<td><p align = "right" style = " margin-right : -77px; margin-top : -5px; " ><a class = "upform" href = "admin/fpassword.php" >Forgot Password ?</a></p></td>
	</tr>
	</div>
	
</table>
</div>
</form>
</div>

</body>
</html>
<?php

	include('dbcon.php');
	
	if(isset($_POST['login']))
	{
		$username = $_POST['uname'];
		$password = $_POST['pass'];
			
		$qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password';";
		
		$run = mysqli_query($con, $qry);
		$row = mysqli_num_rows($run);
		
		if($row < 1)
		{
			?>
			<script>
				alert("Username or Password is incorrect !!!");
				window.open('login.php', '_self');
			</script>
			<?php
		}
		else
		{
			$data = mysqli_fetch_assoc($run);
			$id = $data['id'];
			$name = $data['fname'];
			$rollno = $data['rollno'];
			$age = $data['age'];
			$_SESSION['uid'] = $id;
			$_SESSION['name'] = $name;
			$_SESSION['rollno'] = $rollno;
			$_SESSION['age'] = $age;
			$_SESSION['fname'] = $data['fname'];
			$_SESSION['lname'] = $data['lname'];
			$_SESSION['rollno'] = $data['rollno'];
			$_SESSION['image'] = $data['image'];
			header('location:admin/admindash.php');
		}
	}

?>
