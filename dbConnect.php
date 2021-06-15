<?php
	
	$servername = "localhost";
	$db = "labyrinth";
	$usr = "root";
	$pwd = "";
	//$pwd = "bQXHS5KnfGAHaa383nFjT42AUMyWb";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db", $usr, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
	} catch (PDOException $e) {		
		die();
	}

?>

		