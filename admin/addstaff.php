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
	<h2 class = "addpatient" align = "center" style = "font-family : courier;" >Staff Registration Form</h2>
	<form action = "addstaff.php" method = "post" enctype = "multipart/form-data" >
	<table border = "1" width = "50%" align = "center" cellpadding = "6px" cellspacing = "0px" bgcolor = " #aeb2e5 " style = "margin-top : -20px;">
		<tr>
			<td align = "center" >Name</td> <td><input type = "text" name = "name" placeholder = "Full Name" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Mother's Name</td> <td><input type = "text" name = "mother" placeholder = "Mother's Name" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Father's Name</td> <td><input type = "text" name = "father" placeholder = "Father's Name" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >D.O.B.</td> <td><input type = "date" name = "dob" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Age</td> <td><input type = "number" name = "age" placeholder = "Age" required  style = "width : 65%; "/></td>
		</tr>
		<tr>
			<td align = "center" >Sex</td> <td> <input type="radio" name="sex" value="Male" required > Male <input type="radio" name="sex" value="Female"> Female </td>
			
		</tr>
		<tr>
			<td align = "center" >Marital Status</td> <td><input type="radio" name="mstatus" value="Married"> Married <input type="radio" name="mstatus" value="Single"> Single <input type="radio" name="mstatus" value="Divorced"> Divorced <input type="radio" name="mstatus" value="Widow"> Widow </td>
		</tr>
		<tr>
			<td align = "center" >Blood Group</td> 
			<td><select name = "bgroup"  style = "width : 65%; " required >
				<option value="">---Select---</option>
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
			<td align = "center" >Qualification(s)</td> <td><textarea rows="3" cols="40" name="qualification"  placeholder = "Your Educational Qualifications ">
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >Reference</td> <td><textarea rows="2" cols="40" name="hname"  placeholder = "Hospital or Clinic name, if you worked before ">
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >Work Experience</td> <td><input type = "number" name = "exp" placeholder = "Working Experience in Yr." style = "width : 65%; " /></td>
		</tr>
		<tr>
			<td align = "center" >Designation</td> 
			<td><select name = "designation" style = "width : 65%; " required  >
				<option value="Select">- - -Select- - -</option>
				<option value="Nurse">Nurse</option>
				<option value="Compounder">Compounder</option>
				<option value="Sweaper">Sweaper</option>
				<option value="Receptionist">Ward Boy</option>
				<option value="Receptionist">Receptionist</option>
			    </select></td>
		</tr>
		<tr>
			<td align = "center" >Ward No*</td> <td><input type = "number" name = "ward_no" placeholder = "See the T&C Below"  style = "width : 65%; "/></td>
		</tr>
		<tr>
			<td align = "center" >City</td> <td><input type = "text" name = "city" placeholder = "Residential City" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Contact</td> <td><input type = "text" name = "contact" placeholder = "Personal Contact" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Phone (Resident)</td> <td><input type = "text" name = "phone" placeholder = "Residential Phone" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >E-mail</td> <td><input type = "email" name = "email" placeholder = "you@example.com" style = "width : 65%; " /></td>
		</tr>
		<tr>
			<td align = "center" >Employee Image</td> <td><input type = "file" name = "image" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td colspan = "2"><input style = "margin-left : 225px;" type = "reset" name = "reset" value = "Reset" /><input style = "margin-left : 5px;" type = "submit" name = "submit" value = "Submit" /></td>
		</tr>

	</table>
	</form>
	</div>
	<p> * This entry is applicble only for Nurses, Compounders & Sweapers ).</p>
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
		$dob = $_POST['dob']; 		 $ward_no = $_POST['ward_no'];  
		$mstatus = $_POST['mstatus']; 	$bgroup = $_POST['bgroup'];  
		$qualification = $_POST['qualification'];   $designation = $_POST['designation']; 
		$hname = $_POST['hname'];  $exp = $_POST['exp']; 
	  	$city = $_POST['city'];		$email = $_POST['email'];
				
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "INSERT INTO `staff`(`name`, `mother`, `father`, `dob`, `age`, `sex`, `mstatus`, `bgroup`, `qualification`, `hname`, `exp`, `designation`, `ward_no`, `city`, `contact`, `phone`, `email`, `image`)
				VALUES ('$name', '$mother', '$father', '$dob', '$age', '$sex', '$mstatus', '$bgroup', '$qualification', '$hname', '$exp', '$designation', '$ward_no', '$city', '$contact', '$phone', '$email', '$imagename')";
		
		$run = mysqli_query($con, $qry);
		if($run == True)
		{
			?>
			<script>
				alert("Data Inserted Successfully !");
				window.open('addstaff.php', '_self');
			</script>
			<?php
		}
		
	}
?>



