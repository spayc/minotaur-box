<?php
	
	$servername = "localhost";
	$db = "labyrinth";
	$usr = "root";
	$pwd = "";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db", $usr, $pwd);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "<p>Connected successfully</p>";
		
	} catch (PDOException $e) {
		// echo "<p>Connection failed: " . $e->getMessage() . "</p>";
		die();
	}

?>

		