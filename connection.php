<?php

$con = new mysqli("localhost","root", "", "adrelease");
$errno =$con->connect_errno;
if($errno!=0)
{
	echo $con->connect_error;
	exit;
}
?>