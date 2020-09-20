<?php

	$dbUser = "root";
	$dbHost = "localhost";
	$dbPass = "";
	$dbData = "apps";

	$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbData);

	if (!$conn) {
		echo "<h1>Mysql Not Connected </h1>";
	}
?>