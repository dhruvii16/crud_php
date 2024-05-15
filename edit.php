<?php

include 'connection.php';

$id =$_GET["editid"];

$result = $con->query("select * from crudall where id='$id'");

$row = $result->fetch_object();

$city = $row->city;
$g = $row->gender;

$e = $row->education;
$e1= explode(",",$e);


// echo '<pre>';
// print_r($row);

// print_r($e1);


if(isset($_POST["submit"]))
{
	$fullname  = $_POST["fullname"];
	$address   = $_POST["address"];
	$city      = $_POST["city"];
	$gender    = $_POST["gender"];
	
	$education_array = $_POST["ch"];
	$education_string = implode(",", $education_array);

	
	$exe = $con->query("update crudall set fullname='$fullname', address='$address', city='$city', gender='$gender', education='$education_string' where id='$id'");
	
	if($exe)
	{
		header('location:read.php');
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
	<title>update in crud</title>
</head>
<body>
	<form method="post">
	<table border="1" align="center" cellpadding="10" cellspacing="0">
		<tr>
			<td>FullName</td>
			<td>
				<input type="text" id="fullname" name="fullname" value="<?php echo $row->fullname;?>">
			</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>
				<textarea id="address" name="address">
					<?php echo $row->address;?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>City</td>
			<td>
				<select id="city" name="city">
					<option value="">--Select City--</option>
					<option value="abd" <?php if($city=='abd') echo 'selected';?>>Ahmedabad</option>
					<option value="surat" <?php if($city=='surat') echo 'selected';?>>Surat</option>
					<option value="rajkot" <?php if($city=='rajkot') echo 'selected';?>>Rajkot</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type="radio" id="rdo1" name="gender" value="male" <?php if($g=='male') echo 'checked';?>>Male
				<input type="radio" id="rdo2" name="gender" value="female" 
				<?php if($g=='female') echo 'checked';?>>Female
			</td>
		</tr>
		<tr>
			<td>Education</td>
			<td>
				<input type="checkbox" id="chk1" name="ch[]" value="ssc" 
				<?php if(in_array("ssc", $e1)) echo "checked";?>>SSC
				<input type="checkbox" id="chk2" name="ch[]" value="hsc"
				<?php if(in_array("hsc", $e1)) echo "checked";?>>HSC
				<input type="checkbox" id="chk3" name="ch[]" value="be"
				<?php if(in_array("be", $e1)) echo "checked";?>>BE
				<input type="checkbox" id="chk4" name="ch[]" value="me"
				<?php if(in_array("me", $e1)) echo "checked";?>>ME
				
			</td>
		</tr>
		<tr>
				<td colspan="2" align="center">
					<input type="submit" id="submit" name="submit" value="Update">
				</td>
		</tr>

	</table>
</form>
</body>
</html>