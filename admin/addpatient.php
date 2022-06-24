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
	<div class = "a3link" >
	<h3 style = "margin-top : 115px; margin-left : 40px; " align = "left"><a class = "a3link" title = "Back to Dashboard !" href = "admindash.php">Back</a></h3>
	</div>
	<div class = "table"> 
	<h2 class = "addpatient" align = "center"  >Patient Admission Form</h2>
	<form action = "addpatient.php" method = "post" enctype = "multipart/form-data" >
	<table border = "1" width = "50%" align = "center" cellpadding = "6px" cellspacing = "0px" bgcolor = " #aeb2e5 " style = "margin-top : -20px;">
		<tr>
			<td align = "center" >Full Name</td> <td><input type = "text" name = "name" style = "width : 53%; " placeholder = "Patient's Full Name" required /></td>
		</tr>
		<tr>
			<td align = "center" >Mother's Name</td> <td><input type = "text" name = "mname" style = "width : 53%; " placeholder = "Mother's Name" required  /></td>
		</tr>
		<tr>
			<td align = "center" >Father's Name</td> <td><input type = "text" name = "fname" style = "width : 53%; " placeholder = "Father's Name" required  /></td>
		</tr>
		<tr>
			<td align = "center" >Sex</td> <td> <input type="radio" name="sex" value="Male" required > Male <input type="radio" name="sex" value="Female" > Female </td>
		</tr>
		<tr>
			<td align = "center" >Marital Status</td> <td><input type="radio" name="mstatus" value="Married" required > Married <input type="radio" name="mstatus" value="Single" > Single <input type="radio" name="mstatus" value="Divorced" > Divorced <input type="radio" name="mstatus" value="Widow" > Widow </td>
			
		</tr>
		<tr>
			<td align = "center" >D.O.B.</td> <td><input type = "date" name = "dob" style = "width : 53%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Age</td> <td><input type = "number" name = "age" style = "width : 53%; " placeholder = "Patient's Age"  required /></td>
		</tr>
		<tr>
			<td align = "center" >Blood Group</td> 
			<td><select name = "bgroup" style = "width : 53%;" required >
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
			<td align = "center" >Occupation</td> <td><input type = "text" style = "width : 53%; " name = "occupation" placeholder = "Patient's Occupation" required /></td>
		</tr>
		<tr>
			<td align = "center" >Disease</td> 
			<td><select name = "disease" style = "width : 53%;" required >
				<option value="">---Please Select---</option>
				<option value="Acne">Acne</option>
				<option value="Asthma">Asthma</option>
				<option value="Allergy">Allergy</option>
				<option value="Blood Cancer">Blood Cancer</option>
				<option value="Body Pain">Body Pain</option>
				<option value="Brain Tumor">Brain Tumor</option>
				<option value="Brain Canser">Brain Canser</option>
				<option value="Breast Cancer">Breast Cancer</option>
				<option value="Burns">Burns</option>
				<option value="Cough & Cold">Cough & Cold</option>
				<option value="Dehydration">Dehydration</option>
				<option value="Dengu">Dengu</option>
				<option value="Diabetes">Diabetes</option>
				<option value="Fever">Fever</option>
				<option value="Headache">Headache</option>
				<option value="Heart Failure">Heart Failure</option>
				<option value="Lung Cancer">Lung Cancer</option>
				<option value="Skin Cancer">Skin Cancer</option>
				<option value="Stomach Tumor">Stomach Tumor</option>
				<option value="Stroke">Stroke</option>
				<option value="Surgery">Surgery</option>
				<option value="Tuberculosis">Tuberculosis</option>
				<option value="Ulcer">Ulcer</option>
			    </select></td>
		</tr>
		<tr>
			<td align = "center" >Consultant</td> 
			<td><select name = "consultant" style = "width : 53%;" required >
			<option value="">---Please Select---</option>
			<?php 
					$query = "SELECT `name` FROM `physician` WHERE 1";
					$query_run = mysqli_query($con, $query);
					while($a = mysqli_fetch_assoc($query_run))
					{	
						?>
						<option value="<?php echo $a['name']; ?>"><?php echo $a['name']; ?></option>
						<?php
					}
					?>
			</select></td>
		</tr>
		<tr>
			<td align = "center" >Bed No</td> <td><input type = "number" name = "bed_no" style = "width : 53%; " placeholder = "Patient's Bed Number" style = "width : 53%; "  required /></td>
		</tr>
		<tr>
			<td align = "center" >Ward No</td> <td><input type = "number" name = "ward_no" style = "width : 53%; "  placeholder = "Patient's Ward Number" required /></td>
		</tr>
		<tr>
			<td align = "center" >City</td> <td><input type = "text" name = "city" style = "width : 53%; " placeholder = "Residential City" required /></td>
		</tr>
		<tr>
			<td align = "center" >Contact</td> <td><input type = "text" name = "contact" style = "width : 53%; "  placeholder = "Phone Number" required /></td>
		</tr>
		<tr>
			<td align = "center" >Patient Image</td> <td><input type = "file" name = "image" /></td>
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
		
		
		$name = $_POST['name'];      $bed_no = $_POST['bed_no'];
		$fname = $_POST['fname'];		$dob = $_POST['dob'];
		$mstatus = $_POST['mstatus'];    $ward_no = $_POST['ward_no'];
		$age = $_POST['age'];		 $contact = $_POST['contact'];
		$sex = $_POST['sex'];		 $disease = $_POST['disease'];
		$admit_date = date("Y-m-d");	 $bgroup = $_POST['bgroup'];
		$occupation = $_POST['occupation'];		$consultant = $_POST['consultant'];
		$city = $_POST['city']; 				$mname = $_POST['mname'];
		$current_status = "Admitted";
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
		$qry = "INSERT INTO `patient`(`name`, `mname`, `fname`, `mstatus`, `dob`, `age`, `sex`, `bgroup`, `occupation`, `disease`, `consultant`, `bed_no`, `ward_no`, `admit_date`, `city`, `contact_no`, `image`) VALUES ('$name', '$mname', '$fname', '$mstatus', '$dob', '$age', '$sex', '$bgroup', '$occupation', '$disease', '$consultant', '$bed_no', '$ward_no', '$admit_date', '$city', '$contact', '$imagename')";
		$run = mysqli_query($con, $qry);
		$qry3 = "INSERT INTO `patient_history`(`name`, `mname`, `fname`, `mstatus`, `dob`, `age`, `sex`, `bgroup`, `occupation`, `disease`, `consultant`, `bed_no`, `ward_no`, `admit_date`, `city`, `contact_no`, `current_status`, `image`)
				VALUES ('$name', '$mname', '$fname', '$mstatus', '$dob', '$age', '$sex', '$bgroup', '$occupation', '$disease', '$consultant', '$bed_no', '$ward_no', '$admit_date', '$city', '$contact', '$current_status', '$imagename')";
		$run3 = mysqli_query($con, $qry3);
		$qrys = "SELECT * FROM `patient` WHERE `contact_no` = '$contact';";
		$runs = mysqli_query($con, $qrys);
		$datas = mysqli_fetch_assoc($runs);
		if($run == True)
		{
			?>
			<script>
				alert("Data Inserted Successfully !");
				window.open('patient_id1.php?reg_id=<?php echo $datas['id'];?>', '_self');
			</script>
			<?php
		}
		
	}
?>
