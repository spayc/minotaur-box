<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include('../../session2.php');


if (isset($_POST['nameCreature'])) {
	require '../../dbConnect.php';

	$name = $_POST["nameCreature"];


	$select = "SELECT idCreature, nameCreature, passwordCreature FROM creatures WHERE nameCreature=:nameCreature";

	try {
		$result = $conn->prepare($select);


		$result->bindParam(':nameCreature', $name);

		
		$result->execute();

        $all_rows = [];
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $all_rows[] = $row;
        }

	} catch (PDOException $e) {
		http_response_code(500);
		echo json_encode(
			array("message" => "Something went wrong:" . $e->getMessage())
		);
	}
	
	if ($result) {
		http_response_code(200);
		
		echo json_encode(array($all_rows));
	}

} else {
	http_response_code(400);

	echo json_encode(
		array("message" => "No action")
	);
}
