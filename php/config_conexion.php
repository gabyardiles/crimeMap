<?php
	$server = "localhost";
	$username = "root";
	$password = "gaby1234";
	$dbname = "crimeMap";
	try {
		$conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
   		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conn->exec("SET CHARACTER SET utf8");
	} catch (Exception $e) {
		die("error:".$e->getMessage());
	}

 ?>