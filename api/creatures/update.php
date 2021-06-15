<?php
header("Access-Control-Allow-Origin: *");
<<<<<<< Updated upstream
include('../../session2.php');

=======
include('../../session.php');
>>>>>>> Stashed changes
if (isset($_POST['nameCreature']) && isset($_POST['passwordCreature'])  && isset($_POST['idCreature'])) {

	require '../../dbConnect.php';

    $id = $_POST['idCreature'];
	$name = $_POST["nameCreature"];
	$password = $_POST["passwordCreature"];

    $update = "UPDATE creatures SET nameCreature=:nameCreature, passwordCreature=:passwordCreature  WHERE idCreature=:idCreature";


	try {
		$result = $conn->prepare($update);

        $result->bindParam(':idCreature', $id);
		$result->bindParam(':nameCreature', $name);
		$result->bindParam(':passwordCreature', $password);

		
		$result->execute();

	} catch (PDOException $e) {
	//	http_response_code(500);
		echo json_encode(
			array("message" => "Something went wrong:" . $e->getMessage())
		);
	}


	if ($result) {
	//	http_response_code(201);
		
		echo json_encode(
			array("message" => "Updated")
		);
	}

} else {
//	http_response_code(403);

	echo json_encode(
		array("message" => "No action")
	);
}
?>