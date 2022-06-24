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

	$qry = "SELECT * FROM `staff` WHERE `id` = '$sid'";
	$run = mysqli_query($con, $qry);
	$data = mysqli_fetch_assoc($run);
?>

<h3 style = "margin-top : -45px; margin-left : 40px; " align = "left">
<a class = "a3link" title = "Back to Update Patient !" href = "updatepatient.php">Back</a>
</h3> 
<div class = "table">
	<h2 class = "addpatient" align = "center" style = "font-family : courier;" >Staff Updation</h2>
	<form action = "updatedata_s.php" method = "post" enctype = "multipart/form-data" >
	<table border = "1" width = "50%" align = "center" cellpadding = "6px" cellspacing = "0px" bgcolor = " #aeb2e5 " style = "margin-top : -20px;">
		<tr>
			<td align = "center" >Name</td> <td><input type = "text" name = "name" value = "<?php echo $data['name']; ?>" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Mother's Name</td> <td><input type = "text" name = "mother" value = "<?php echo $data['mother']; ?>" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Father's Name</td> <td><input type = "text" name = "father" value = "<?php echo $data['father']; ?>" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >D.O.B.</td> <td><input type = "date" name = "dob" value = "<?php echo $data['dob']; ?>" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Age</td> <td><input type = "number" name = "age" value = "<?php echo $data['age']; ?>" required  style = "width : 65%; "/></td>
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
			<td align = "center" >Qualification(s)</td> <td><textarea rows="3" cols="40" name="qualification"  ><?php echo $data['qualification']; ?>
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >Reference</td> <td><textarea rows="2" cols="40" name="hname"  ><?php echo $data['hname']; ?>
</textarea></td>
		</tr>
		<tr>
			<td align = "center" >Work Experience</td> <td><input type = "number" name = "exp" value = "<?php echo $data['exp']; ?>" style = "width : 65%; " /></td>
		</tr>
		<tr>
			<td align = "center" >Designation</td> 
			<td><select name = "designation" style = "width : 65%; " required  >
				<option value="">- - -Select- - -</option>
				<option value="Nurse">Nurse</option>
				<option value="Compounder">Compounder</option>
				<option value="Sweaper">Sweaper</option>
				<option value="Receptionist">Ward Boy</option>
				<option value="Receptionist">Receptionist</option>
			    </select></td>
		</tr>
		<tr>
			<td align = "center" >Ward No*</td> <td><input type = "number" name = "ward_no" value = "<?php echo $data['ward_no']; ?>"  style = "width : 65%; "/></td>
		</tr>
		<tr>
			<td align = "center" >City</td> <td><input type = "text" name = "city" value = "<?php echo $data['city']; ?>" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Contact</td> <td><input type = "text" name = "contact" value = "<?php echo $data['contact']; ?>" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >Phone (Resident)</td> <td><input type = "text" name = "phone" value = "<?php echo $data['phone']; ?>" style = "width : 65%; " required /></td>
		</tr>
		<tr>
			<td align = "center" >E-mail</td> <td><input type = "email" name = "email" value = "<?php echo $data['email']; ?>" style = "width : 65%; " /></td>
		</tr>
		<tr>
			<td align = "center" >Employee Image</td> <td><input type = "file" name = "image" style = "width : 65%; " required /></td>
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
	</div>
	<p> * This entry is applicble only for Nurses, Compounders & Sweapers ).</p>
