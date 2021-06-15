<?php
header("Access-Control-Allow-Origin: *");
<<<<<<< Updated upstream
include('../../session2.php');

=======
include('../../session.php')
>>>>>>> Stashed changes
if (isset($_POST['namePeople']) && isset($_POST['passwordPeople']) && isset($_POST['idPeople'])) {

	require '../../dbConnect.php';

    $id = $_POST['idPeople'];
	$name = $_POST["namePeople"];
	$password = $_POST["passwordPeople"];

    $update = "UPDATE people SET namePeople=:namePeople, passwordPeople=MD5(:passwordPeople)  WHERE idPeople=:idPeople";


	try {
		$result = $conn->prepare($update);

        $result->bindParam(':idPeople', $id);
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
			array("message" => "Updated")
		);
	}

} else {
	//http_response_code(403);

	echo json_encode(
		array("message" => "No action")
	);
}
?>