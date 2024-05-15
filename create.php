<?php

$con = new mysqli("localhost","root", "", "mydatabase_alpha");
$errno =$con->connect_errno;
if($errno!=0)
{
	echo $con->connect_error;
	exit;
}

if(isset($_POST["submit"]))
{
	$fullname  = $_POST["fullname"];
	$address   = $_POST["address"];
	$city      = $_POST["city"];
	$gender    = $_POST["gender"];
	
	$education_array = $_POST["ch"];
	$education_string = implode(",", $education_array);

	$exe = $con->query("insert into crudall(fullname,address,city,gender,education) values('$fullname','$address','$city','$gender','$education_string')");
	
	if($exe)
	{
		echo "Record Inserted Successfully";
	}
	else
	{
		echo "Something Went Wrong.";
	}
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>Crud In ALL Fields</title>
</head>
<body>
	<form method="post">
	<table border="1" align="center" cellpadding="10" cellspacing="0">
		<tr>
			<td>FullName</td>
			<td><input type="text" id="fullname" name="fullname"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td>
				<textarea id="address" name="address"></textarea>
			</td>
		</tr>
		<tr>
			<td>City</td>
			<td>
				<select id="city" name="city">
					<option value="">--Select City--</option>
					<option value="abd">Ahmedabad</option>
					<option value="surat">Surat</option>
					<option value="rajkot">Rajkot</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type="radio" id="rdo1" name="gender" value="male">Male
				<input type="radio" id="rdo2" name="gender" value="female">Female
			</td>
		</tr>
		<tr>
			<td>Education</td>
			<td>
				<input type="checkbox" id="chk1" name="ch[]" value="ssc">SSC
				<input type="checkbox" id="chk2" name="ch[]" value="hsc">HSC
				<input type="checkbox" id="chk3" name="ch[]" value="be">BE
				<input type="checkbox" id="chk4" name="ch[]" value="me">ME
				
			</td>
		</tr>
		<tr>
				<td colspan="2" align="center">
					<input type="submit" id="submit" name="submit" value="Submit">
				</td>
		</tr>

	</table>
</form>
</body>
</html>