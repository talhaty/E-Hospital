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
<html>
<head>
<title>Hospital Management System</title>
<style>
.login
{
	background-color :#7a84f9;
	color :#ec7063;
	margin-left : 10px;
	margin-right : 10px;
	margin-top : -27px;
	height : 150px;
	line-height : 150px;
}
.alink
{
	text-decoration : none;
	color : white;
}
.alink:hover
{
	text-decoration : underline;
}
</style>
</head>
<body style = " background-color : #29506a; " >
<div class = "login" align = "center" >
	<h1 style = " font-size : 60px;" >24/7 Life Care HOSPITAL</h1>
</div>
<h3 style = "margin-left : 10px;" >Click <a class = "alink" href = "addmin1.php">here</a> to add more admin(s) or go to <a class = "alink" href = "admindash.php" >Dashboard</a> !</h3>
</body>
</html>
