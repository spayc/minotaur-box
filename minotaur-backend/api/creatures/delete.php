<?php
header("Access-Control-Allow-Origin: *");


if (isset($_POST['nameCreature'])) {
	require '../../dbConnect.php';

	$name = $_POST["nameCreature"];


	$remove = "DELETE FROM creatures WHERE nameCreature=:nameCreature";

	try {
		$result = $conn->prepare($remove);


		$result->bindParam(':nameCreature', $name);

		
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
			array("message" => "Executed Successfully")
		);
	}

} else {
	http_response_code(403);

	echo json_encode(
		array("message" => "No action")
	);
}
