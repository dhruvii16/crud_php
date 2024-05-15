<?php
include 'connection.php';
$id = $_GET["delid"];
$exe = $con->query("delete from crudall where id='$id'");
if($exe)
{
	header('location:read.php');
}
else
{
	echo "Something went wrong.";
}



?>