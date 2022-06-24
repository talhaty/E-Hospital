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
	
	$sid = $_GET['sid'];

	$qry = "SELECT * FROM `patient` WHERE `id` = '$sid'";
	$run = mysqli_query($con, $qry);
	$data = mysqli_fetch_assoc($run);
?>
	
	<h3 style = "margin-top : -45px; margin-left : 40px; " align = "left"><a class = "a3link" title = "Back to Update Patient !" href = "updatepatient.php">Back</a></h3>
 
	<div class = "table" >
	<h2 class = "addpatient" align = "center" style = "font-family : courier; " >Update Patient Details</h2>
	</div>
	
	<form action = "updatedata_p.php" method = "post" enctype = "multipart/form-data" >
		<table border = "1" width = "50%" align = "center" cellpadding = "6px" cellspacing = "0px" bgcolor = " #f9e9bb " style = "margin-top : -20px;" >
			<tr>
				<td align = "center" >Name</td> <td><input type = "text" name = "name" value = "<?php echo $data['name']; ?>" /></td>
			</tr>
			<tr>
				<td align = "center" >Father's Name</td> <td><input type = "text" name = "fname" value = "<?php echo $data['fname']; ?>" /></td>
			</tr>
		
			<tr>
				<td align = "center" >Sex</td> <td> <input type = "radio" name = "sex" value = "Male" required > Male <input type = "radio" name = "sex" value = "Female"> Female </td>
			
			</tr>
			<tr>
				<td align = "center" >Marital Status</td> 
				<td><input type = "radio" name = "mstatus" value = "Married" required > Married <input type = "radio" name = "mstatus" value = "Single" > Single <input type = "radio" name = "mstatus" value = "Divorced" > Divorced <input type = "radio" name = "mstatus" value = "Widow"> Widow </td>
			
			</tr>
			<tr>
				<td align = "center" >D.O.B.</td> <td><input type = "date" name = "dob" value = "<?php echo $data['dob']; ?>" /></td>
			</tr>
			<tr>
				<td align = "center" >Age</td> <td><input type = "number" name = "age" style = "width : 53%; " value = "<?php echo $data['age']; ?>" /></td>
			</tr>
			<tr>
				<td align = "center" >Blood Group</td> 
				<td><select name = "bgroup" style = "width : 53%; " required >
					<option value = "" >---Please Select---</option>
					<option value = "O+">O+</option>
					<option value = "O-">O-</option>
					<option value = "A+">A+</option>
					<option value = "A-">A-</option>
					<option value = "B+">B+</option>
					<option value = "B-">B-</option>
					<option value = "AB+">AB+</option>
					<option value = "AB-">AB-</option>
					</select></td>
			</tr>
			<tr>
				<td align = "center" >Occupation</td> <td><input type = "text" name = "occupation" value = "<?php echo $data['occupation']; ?>" /></td>
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
				<td align = "center" >Consultant</td> <td><input type = "text" name = "consultant" value = "<?php echo $data['consultant']; ?>" /></td>
			</tr>
			<tr>
				<td align = "center" >Bed No</td> <td><input type = "number" name = "bed_no" value = "<?php echo $data['bed_no']; ?>" style = "width : 53%; " /></td>
			</tr>
			<tr>
				<td align = "center" >Ward No</td> <td><input type = "number" name = "ward_no" value = "<?php echo $data['ward_no']; ?>" style = "width : 53%; " /></td>
			</tr>
			<tr>
				<td align = "center" >City</td> <td><input type = "text" name = "city" value = "<?php echo $data['city']; ?>" required = "required" /></td>
			</tr>
			<tr>
				<td align = "center" >Contact</td> <td><input type = "text" name = "contact" value = "<?php echo $data['contact_no']; ?>" /></td>
			</tr>
			<tr>
				<td align = "center" >Patient Image</td> <td><input type = "file" name = "image" /></td>
			</tr>
			<tr>
				<td colspan = "2">
				<input type = "hidden" name = "sid" value = "<?php echo $data['id']; ?>" />
				<input style = "margin-left : 225px;" type = "reset" name = "reset" value = "Reset" />
				<input style = "margin-left : 5px;" type = "submit" name = "submit" value = "Submit" />
				</td>
			</tr>
		
		</table>
		</form>
	

