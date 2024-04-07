<?php

$con = mysqli_connect("localhost","root","pass123","NSBM_CampusHomes");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>