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
	<div class = "a3link" >
	<h3 style = "margin-top : 115px; margin-left : 40px; " align = "left"><a class = "a3link" title = "Back to Dashboard !" href = "admindash.php">Back</a></h3>
	</div>
	<div class = "table">
	<h2 class = "addpatient" align = "center" style = "font-family : courier;" >Doctors' Registration Form</h2>
	<form action = "addphysician.php" method = "post" enctype = "multipart/form-data" >
	<table border = "1" width = "50%" align = "center" cellpadding = "6px" cellspacing = "0px" bgcolor = " #aeb2e5" style = "margin-top : -20px;">
		<tr>
			<td align = "center" >Full Name</td> <td><input type = "text" name = "name" placeholder = "Doctor's Full Name" required /></td>
		</tr>
		<tr>
			<td align = "center" >Mother's Name</td> <td><input type = "text" name = "mother" placeholder = "Mother's Name" required /></td>
		</tr>
		<tr>
			<td align = "center" >Father's Name</td> <td><input type = "text" name = "father" placeholder = "Father's Name" required /></td>
		</tr>
		<tr>
			<td align = "center" >Sex</td> <td> <input type="radio" name="sex" value="Male" required > Male <input type="radio" name="sex" value="Female"> Female </td>
			
		</tr>
		<tr>
			<td align = "center" >Marital Status</td> <td><input type = "radio" name = "mstatus" value = "Married" required > Married <input type = "radio" name = "mstatus" value = "Single" > Single <input type = "radio" name = "mstatus" value = "Divorced" > Divorced <input type = "radio" name = "mstatus" value = "Widow" > Widow </td>
			
		</tr>
		<tr>
			<td align = "center" >D.O.B.</td> <td><input type = "date" name = "dob" required/></td>
		</tr>
		<tr>
			<td align = "center" >Age</td> <td><input type = "number" name = "age" placeholder = "Doctor's Age" required  style = "width : 55%; " /></td>
		</tr>
		<tr>
			<td align = "center" >Blood Group</td> 
			<td><select name = "bgroup" style = "width : 55%;" required >
				<option value="">---Please Select---</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
			    </select></td>
		</tr>
		<tr>
			<td align = "center" >Qualification(s)</td> <td><textarea rows="3" cols="50" name="qualification"  placeholder = "Enter text here..." required >
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >Specialization</td> 
			<td><select name = "specialization" style = "width : 55%; " required >
				<option value="">---Please Select---</option>
				<option value="Allergist">Allergist</option>
				<option value="Cardiologist">Cardiologist</option>
				<option value="Dentist">Dentist</option>
				<option value="Dermatologist">Dermatologist</option>
				<option value="ENT Specialist">ENT Specialist</option>
				<option value="Neurosurgeon">Neurosurgeon</option>
				<option value="Physiologist">Physiologist</option>
				<option value="Plastic Surgeon">Plastic Surgeon</option>
			    </select></td>
		</tr>
		<tr>
			<td align = "center" >Reference</td> <td><textarea rows="2" cols="50" name="hname"  placeholder = " Hospital name, if you have worked before ...">
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >Work Experience</td> <td><input type = "number" name = "exp" placeholder = "Working Experience in Yr." style = "width : 55%; " /></td>
		</tr>
		<tr>
			<td align = "center" >Acievements</td> <td><textarea rows="3" cols="50" name="achievement"  placeholder = "Enter text here..." required >
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >City</td> <td><input type = "text" name = "city" placeholder = "Residential City" required /></td>
		</tr>
		<tr>
			<td align = "center" >Contact</td> <td><input type = "text" name = "contact" placeholder = "Personal Contact" required /></td>
		</tr>
		<tr>
			<td align = "center" >Phone (Resident)</td> <td><input type = "text" name = "phone" placeholder = "Residential Phone" required /></td>
		</tr>
		<tr>
			<td align = "center" >E-mail</td> <td><input type = "email" name = "email" placeholder = "xyz@example.com" required /></td>
		</tr>
		<tr>
			<td align = "center" >Image</td> <td><input type = "file" name = "image" /></td>
		</tr>
		<tr>
			<td colspan = "2"><input style = "margin-left : 225px;" type = "reset" name = "reset" value = "Reset" /><input style = "margin-left : 5px;" type = "submit" name = "submit" value = "Submit" /></td>
		</tr>

	</table>
	</form>
	</div>
</body>
</html>

<?php
	
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		if($con == False)
		{
			echo "Not connect";
		}
		
		$name = $_POST['name'];  		$mother = $_POST['mother'];  
        $father = $_POST['father']; 		
		$age = $_POST['age'];		 $contact = $_POST['contact'];
		$sex = $_POST['sex'];		 $phone = $_POST['phone'];
		$dob = $_POST['dob']; 
		$mstatus = $_POST['mstatus']; 	$bgroup = $_POST['bgroup'];  
		$qualification = $_POST['qualification'];   $specialization = $_POST['specialization']; 
		$hname = $_POST['hname'];  $exp = $_POST['exp'];  $achievement = $_POST['achievement'];  
		$city = $_POST['city'];
  		$email = $_POST['email'];
		
		
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "INSERT INTO `physician`(`name`, `mother`, `father`, `dob`, `age`, `sex`, `mstatus`, `bgroup`, `qualification`, `specialization`, `hname`, `exp`, `achievement`, `city`, `contact`, `phone`, `email`, `image`)
				VALUES ('$name', '$mother', '$father', '$dob', '$age', '$sex', '$mstatus', '$bgroup', '$qualification', '$specialization', '$hname', '$exp', '$achievement', '$city', '$contact', '$phone', '$email', '$imagename')";
		
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

