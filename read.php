<?php

include 'connection.php';

$result = $con->query("select * from crudall");


?>

<table border="1" align="center" cellspacing="0" cellpadding="15">
	<tr bgcolor="silver">
		<td>Id</td>
		<td>Fullname</td>
		<td>Address</td>
		<td>City</td>
		<td>Gender</td>
		<td>Education</td>
		<td>Delete</td>
		<td>Edit</td>
	</tr>
	<?php
		while ($row = $result->fetch_object())
	    {
			?>
				<tr>
					<td><?php echo $row->id;?></td>
					<td><?php echo $row->fullname;?></td>
					<td><?php echo $row->address;?></td>
					<td><?php echo $row->city;?></td>
					<td><?php echo $row->gender;?></td>
					<td><?php echo $row->education;?></td>
					<td><a href="delete.php?delid=<?php echo $row->id;?>">delete</a></td>
					<td><a href="edit.php?editid=<?php echo $row->id;?>">edit</a></td>
				</tr>
			<?php
		}

	?>
</table>