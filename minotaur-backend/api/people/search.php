<?php
header("Access-Control-Allow-Origin: *");


if (isset($_POST['namePeople'])) {
	require '../../dbConnect.php';

	$name = $_POST["namePeople"];


	$select = "SELECT namePeople, passwordPeople FROM people WHERE namePeople=:namePeople";

	try {
		$result = $conn->prepare($select);


		$result->bindParam(':namePeople', $name);

		
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
	http_response_code(403);

	echo json_encode(
		array("message" => "No action")
	);
}
?>
