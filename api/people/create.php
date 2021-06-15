<?php
<<<<<<< Updated upstream
   include('../../session2.php');

=======
header("Access-Control-Allow-Origin: *");
include('../../session.php');
>>>>>>> Stashed changes
if (isset($_POST['namePeople']) && isset($_POST['passwordPeople'])) {

	require '../../dbConnect.php';

	$name = $_POST["namePeople"];
	$password = $_POST["passwordPeople"];


	$insert = "INSERT INTO people (namePeople, passwordPeople)
							VALUES (:namePeople, MD5(:passwordPeople))";

	try {
		$result = $conn->prepare($insert);


		$result->bindParam(':namePeople', $name);
		$result->bindParam(':passwordPeople', $password);

		
		$result->execute();

	} catch (PDOException $e) {
		//http_response_code(500);
		echo json_encode(
			array("message" => "Something went wrong:" . $e->getMessage())
		);
	}


	if ($result) {
		//http_response_code(201);
		
		echo json_encode(
			array("message" => "Created")
		);
	}

} else {
	//http_response_code(403);

	echo json_encode(
		array("message" => "No action")
	);
}
