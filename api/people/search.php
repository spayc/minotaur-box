<?php
header("Access-Control-Allow-Origin: *");


if (isset($_POST['namePeople'])) {
	require '../../dbConnect.php';

	$name = $_POST["namePeople"];

	$stmt = $conn->prepare("SELECT idPeople, namePeople, passwordPeople FROM people WHERE namePeople='{$name}'");
	// $stmt = "SELECT idPeople, namePeople, passwordPeople FROM people WHERE namePeople='{$name}'";
	

	try{
		$stmt->execute();
	    $all_rows = [];
    	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    	$all_rows[] = $row;
    	}
	}catch (PDOException $e) {
		http_response_code(500);
		echo json_encode(
			array("message" => "Something went wrong:" . $e->getMessage())
		);
	}


	if ($stmt) {
		http_response_code(200);
		
		echo json_encode(array($all_rows));
	}

} else {
	http_response_code(400);

	echo json_encode(
		array("message" => "No action")
	);
}
