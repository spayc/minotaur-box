<?php
	
	$servername = "localhost";
	$db = "labyrinth";
	$usr = "root";
	$pwd = "";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db", $usr, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
	} catch (PDOException $e) {		
		die();
	}

?>

		