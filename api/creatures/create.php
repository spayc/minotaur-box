<?php
header("Access-Control-Allow-Origin: *");

if (isset($_POST["nameCreature"]) && isset($_POST["passwordCreature"])) {

	require '../../dbConnect.php';

	$name = $_POST["nameCreature"];
	$password = $_POST["passwordCreature"];


	$insert = "INSERT INTO creatures (nameCreature, passwordCreature)
							VALUES (:nameCreature, MD5(:passwordCreature))";

	try {
		$result = $conn->prepare($insert);


		$result->bindParam(':nameCreature', $name);
		$result->bindParam(':passwordCreature', $password);

		
		$result->execute();

	} catch (PDOException $e) {
		http_response_code(500);
		echo json_encode(
			array("message" => "Something went wrong:" . $e->getMessage())
		);
	}


	if ($result) {
		http_response_code(201);
		
		echo json_encode(
			array("message" => "Created")
		);
	}

} else {
	http_response_code(403);

	echo json_encode(
		array("message" => "No action")
	);
}
