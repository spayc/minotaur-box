<?php
header("Access-Control-Allow-Origin: *");
<<<<<<< Updated upstream
include('../../session2.php');

=======
include('../../session.php')
>>>>>>> Stashed changes

if (isset($_POST['namePeople'])) {
	require '../../dbConnect.php';

	$name = $_POST["namePeople"];


	$remove = "DELETE FROM people WHERE namePeople=:namePeople";

	try {
		$result = $conn->prepare($remove);


		$result->bindParam(':namePeople', $name);

		
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
			array("message" => "Executed Successfully")
		);
	}

} else {
	//http_response_code(403);

	echo json_encode(
		array("message" => "No action")
	);
}
